
$(document).ready(function(){
    var modalDrpDown_addTopicStatus = $('#modalDrpDown_addTopicStatus');
    var modalDrpDown_uploadFileStatus = $('#modalDrpDown_uploadFileStatus');
    var container_mediaContentsID = $('#container_media');

    modalDrpDown_addTopicStatus.prop('disabled',true);
    modalDrpDown_addTopicStatus.css("background-color", "lightgrey");
    modalDrpDown_uploadFileStatus.prop('disabled',true);
    modalDrpDown_uploadFileStatus.css("background-color", "lightgrey");
    container_mediaContentsID.hide();

    loadAllTopicsToTable();
    loadToDrpDown_assignToTopic();
});

//CHANGE LISTENERS
$(document).on('click', '#modalInputCB_pasteUrl', function(){
    var modalInputCB_pasteUrl = $('#modalInputCB_pasteUrl');
    var modalInputCB_upload = $('#modalInputCB_uploadFrmGallery');
    var modalInput_pasteURL = $('#modalInput_pasteURL');
    var modalBtn_browseVideo = $('#modalBtn_browseVideo');

    if(this.checked){
        modalInput_pasteURL.prop('disabled', false);
        modalInput_pasteURL.css("background-color", "white");
        modalInputCB_upload.prop('checked', false);
        modalBtn_browseVideo.prop('disabled', true);
        modalBtn_browseVideo.css("background-color", "lightgrey");

    }else if(!this.checked){
        modalInput_pasteURL.prop('disabled', true);
        modalInput_pasteURL.css("background-color", "lightgrey");
        modalBtn_browseVideo.prop('disabled', true);
        modalBtn_browseVideo.css("background-color", "lightgrey");

    }

})

$(document).on('click', '#modalInputCB_uploadFrmGallery', function(){
    var modalInputCB_pasteUrl = $('#modalInputCB_pasteUrl');
    var modalInput_pasteURL = $('#modalInput_pasteURL');
    var modalBtn_browseVideo = $('#modalBtn_browseVideo');

    if(this.checked){
        modalInputCB_pasteUrl.prop('checked', false);
        modalInput_pasteURL.prop('disabled', true);
        modalInput_pasteURL.css("background-color", "lightgrey");
        modalBtn_browseVideo.prop('disabled', false);
        modalBtn_browseVideo.css("background-color", "#3cabd0");

    }else if(!this.checked){
        modalInput_pasteURL.prop('disabled', true);
        modalInput_pasteURL.css("background-color", "lightgrey");
        modalBtn_browseVideo.prop('disabled', true);
        modalBtn_browseVideo.css("background-color", "lightgrey");
    }

})

$(document).on('click', '#modalInputCB_renameVideo', function(){
    var modalInput_renameVideo = $('#modalInput_renameVideo');

    if(this.checked){
        modalInput_renameVideo.prop('disabled', false);
        modalInput_renameVideo.css("background-color", "white");

    }else if(!this.checked){
        modalInput_renameVideo.prop('disabled', true);
        modalInput_renameVideo.css("background-color", "lightgrey");
    }

})

//SHOW MODAL CALL IN
$(document).on('click','#pageBtn_addNewTopic',showModal_addNewTopic);
$(document).on('click','#pageBtn_uploadContent',showModal_uploadContent);
$(document).on('click', '#pageBtn_uploadVideo', showModal_uploadVideo);
$(document).on('click', '#modalBtn_addNewLesson', showModal_addNewLesson);

//CANCEL MODAL CALL IN
$(document).on('click', '#modalBtn_addNewTopic_cancel', closeModal_addNewTopic);
$(document).on('click', '#modalBtn_uploadFile_cancel', closeModal_uploadContent);
$(document).on('click','#modalBtn_uploadVideo_cancel',closeModal_uploadVideo);


//CLOSE MODAL CALL IN
$(document).on('click', '.close_openTopicDetails', closeModal_openTopicDetails);
$(document).on('click', '.close_addNewTopic', closeModal_addNewTopic);
$(document).on('click','.close_uploadContent',closeModal_uploadContent);
$(document).on('click','.close_uploadVideo',closeModal_uploadVideo);

//ADD/CREATE CALL IN
$(document).on('click', '#modalBtn_addNewTopic_add', validateAddNewTopic);
$(document).on('click', '#modalBtn_uploadVideo_upload', validateUploadNewVideo);


//EDIT CALL IN

//DELETE CALL IN

//LOAD TO TABLE CALL IN

//REFRESH CALL IN

//SEARCH CALL IN

//NAVIGATION CALL IN



//SHOW MODAL FUNCTIONS
function showModal_addNewTopic(){
    $('#container_modalAddNewTopic').show();
}
function showModal_uploadContent() {
    $('#container_modalUploadContent').show();

}
function showModal_uploadVideo(){
    $('#container_modalUploadVideo').show();
}
function showModal_OpenTopicLessons(pTopicId){
    var intPtopicId = parseInt(pTopicId);
    var modalInput_topicTitle = $('#modalInput_topicTitle');
    var modalBtn_topicTitle_save = $('#modalBtn_topicTitle_save');

    console.log(typeof intPtopicId);
    $('#modal_header_label').text('Topic Details');
    $.ajax({
        url: 'controller/get_topic_by_id.php',
        type: 'POST',
        data : { id : intPtopicId },
        dataType : 'json',
        success: function (topic) {
            console.log("test success");

            var topicID = topic ['topicId'];
            console.log(topicID);
            var topicTitle = topic['topicTitle'];
            console.log(topicTitle);

            $("#modalInput_topicTitle").val(topicTitle);
        },
        error: function (x, e) {
            if (x.status == 0) {
                alert('You are offline!!\n Please Check Your Network.');
            } else if (x.status == 404) {
                alert('Requested URL not found.');
            } else if (x.status == 500) {
                alert('Internal Server Error.');
            } else if (e == 'parsererror') {
                alert('Error.\nParsing JSON Request failed.');
            } else if (e == 'timeout') {
                alert('Request Time out.');
            } else {
                alert('Unknown Error.\n' + x.responseText);
            }
        }

    });
    $('#container_modalOpenTopicDetails').show();
    modalInput_topicTitle.prop('disabled', true);
    modalInput_topicTitle.css("background-color", "lightgrey");
    modalBtn_topicTitle_save.prop('disabled', true);
    modalBtn_topicTitle_save.css("background-color", "lightgrey");
    
}
function showModal_addNewLesson(){
    $('#container_modalAddNewLesson').show();
}

//CLOSE MODAL FUNCTIONS
function closeModal_addNewTopic(){
    $('#container_modalAddNewTopic').hide();
}
function closeModal_uploadContent(){
    $('#container_modalUploadContent').hide();
}
function closeModal_openTopicDetails(){
    $('#container_modalOpenTopicDetails').hide();
}
function closeModal_uploadVideo(){
    $('#container_modalUploadVideo').hide();
}

//VALIDATIONS
function validateAddNewTopic(){
    if($('#modalInput_addTopicTitle').val().length===0){
        $('#modalLbl_errorDisplay').text("Topic Title Field Cannot be Empty.");
    }else{
        addNewTopic();
    }
}
function validateUploadNewVideo(){
    var modalInputCB_pasteUrl = $('#modalInputCB_pasteUrl');
    var modalInputCB_uploadFrmGallery = $('#modalInputCB_uploadFrmGallery');

    if(modalInputCB_pasteUrl.is(':checked') || modalInputCB_uploadFrmGallery.is(':checked') ){
        $('#modalLbl_uploadVideoError').text(" ");
        uploadNewVideo();
    }else{
        $('#modalLbl_uploadVideoError').text("Please select a video origin.");
    }
}
function validateTopicLessons(){

}


//ADD/CREATE/UPLOAD FUNCTIONS
function addNewTopic(){

    var topicTitle =$("#modalInput_addTopicTitle").val();
    $.ajax({
        url:"controller/add_topic.php",
        type:"POST",
        data:{
            modalInput_addTopicTitle:topicTitle
        },
        success: function(isSuccessful){
            alert("isSuccessful: "+isSuccessful);
            alert("Successfully Added Topic!.");
            $('#container_modalAddNewTopic').hide();
        },
        error: function (x, e) {
            if (x.status == 0) {
                alert('You are offline!!\n Please Check Your Network.');
            } else if (x.status == 404) {
                alert('Requested URL not found.');
            } else if (x.status == 500) {
                alert('Internal Server Error.');
            } else if (e == 'parsererror') {
                alert('Error.\nParsing JSON Request failed.');
            } else if (e == 'timeout') {
                alert('Request Time out.');
            } else {
                alert('Unknown Error.\n' + x.responseText);
            }
        }
    });
}
function uploadNewVideo(){
    alert('MAY CHECK ANG ISA');
}

//EDIT FUNCTIONS
function edit_TopicTitle(){
    var modalInput_topicTitle = $('#modalInput_topicTitle');
    var btn_edit = $('#modalBtn_topicTitle_edit');
    var btn_save = $('#modalBtn_topicTitle_save');

}

//GET FUNCTIONS
function getTopicByID(topicId){
    $.ajax({
        url: 'controller/get_all_topic_record.php',
        type: 'POST',
        data:{id: parseInt(topicId)},
        dataType: 'json',
        success: function (user) {
            console.log(user);
            var userId = user['id'];
            var userName = user['username'];
            var password = user['password'];
            var lastName = user['lastname'];
            var firstName = user['firstname']
            var middleInitial = user['middleinitial'];
            var roleId = user['roleId']
            var roleName = user['roleName'];
            var isActive = user['isactive'] === 1? "Active" : "Inactive";
            if(roleName.trim() === 'Administrator'){
                $('#input_studentid').val('');
                $("#input_studentid").prop("disabled", true); //disable the dropdown
                $("#section_dropdown").prop("disabled", true); //disable the dropdown
                $("#teacher_dropdown").prop("disabled", true); //disable the dropdown
                $("#input_studentid").css("background-color","lightgrey"); //color the textfield grey
                $("#section_dropdown").css("background-color","lightgrey"); //color the dropdown grey
                $("#teacher_dropdown").css("background-color","lightgrey"); //color the dropdown grey
                $("#section_dropdown").val($("#section_dropdown option:first").val());
                $("#teacher_dropdown").val($("#teacher_dropdown option:first").val());
            }else if(roleName.trim() === 'Teacher'){
                $('#input_studentid').val('');
                $("#input_studentid").prop("disabled", true); //disable the dropdown
                $("#teacher_dropdown").css("background-color","lightgrey"); //color the dropdown grey
                $("#teacher_dropdown").val($("#teacher_dropdown option:first").val());
                $("#teacher_dropdown").prop("disabled", true); //disable the dropdown
                $("#section_dropdown").prop("disabled", false); //disable the dropdown
            }else if(roleName.trim() === 'Student'){
                $("#section_dropdown").prop("disabled", false); //disable the dropdown
            }
            $("#roledropdown").val(roleId);
            $("#user_status_dropdown").val(isActive);
            $('#input_username').val(userName);
            $('#input_password').val(password);
            $('#input_confirm_password').val(password);
            $('#input_lastname').val(lastName);
            $('#input_firstname').val(firstName);
            $('#input_middleinitial').val(middleInitial);
        },
        error: function (x, e) {
            if (x.status == 0) {
                alert('You are offline!!\n Please Check Your Network.');
            } else if (x.status == 404) {
                alert('Requested URL not found.');
            } else if (x.status == 500) {
                alert('Internal Server Error.');
            } else if (e == 'parsererror') {
                alert('Error.\nParsing JSON Request failed.');
            } else if (e == 'timeout') {
                alert('Request Time out.');
            } else {
                alert('Unknown Error.\n' + x.responseText);
            }
        }


    });
    $('#container_modalAddNewUser').show();

}

//DELETE FUNCTIONS

//LOAD TO DROPDOWN FUNCTIONS
function loadToDrpDown_assignToTopic(){
    var modalDrpDown_assignToTopic = $('#modalDrpDown_assignToTopic');
    $.ajax({
        url: 'controller/get_all_topic_record.php',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            //alert("Successful retrieved JSON from PHP.");
            var len = data.length;
            //$("#roledropdown").empty();
            modalDrpDown_assignToTopic.append("<option value='" + topicId + "'>" + 'Select' + "</option>");
            for (var i = 0; i < len; i++) {
                console.log(data[i]['topicId']+", "+data[i]['topicTitle']);
                var topicId = data[i]['topicId'];
                var topicTitle = data[i]['topicTitle'];
                modalDrpDown_assignToTopic.append("<option value='" + topicId + "'>" + topicTitle + "</option>");
            }
        },
        error: function (x, e) {
            if (x.status == 0) {
                alert('You are offline!!\n Please Check Your Network.');
            } else if (x.status == 404) {
                alert('Requested URL not found.');
            } else if (x.status == 500) {
                alert('Internal Server Error.');
            } else if (e == 'parsererror') {
                alert('Error.\nParsing JSON Request failed.');
            } else if (e == 'timeout') {
                alert('Request Time out.');
            } else {
                alert('Unknown Error.\n' + x.responseText);
            }
        }
    });
}

//LOAD TO TABLE FUNCTIONS

//REFRESH FUNCTIONS

//SEARCH FUNCTIONS

//NAVIGATION FUNCTIONS
function openTab(evt, tabName) {
    var i, tabContent, tabLinks;

    tabcontent = document.getElementsByClassName("tabContent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tabLinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className  += " active";
}
//DEFAULT TAB DISPLAY
document.getElementById("Topics").click();


//LOAD TOPIC RECORDS TO TABLE
function loadAllTopicsToTable(){
    var loadTopicsToTable = $('#table_topic_record');
    $.ajax({
        url: 'controller/get_all_topic_record.php',
        type: 'POST',
        dataType: 'json',
        success: function(topicData){
            console.log("Length: "+topicData.length);
            var len = topicData.length;
            loadTopicsToTable.find("tr:not(:first)").remove();
            for (var i = 0; i < len; i++) {
                var topicId = topicData[i]['topicId'];
                var topicTitle = topicData[i]['topicTitle'];

                $('#table_topic_record').append(
                    "<tr><td>" + topicId + "</td>" +
                    "<td>" + topicTitle + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "-" + "</td>" +
                    "<td>" + "<a id='"+topicId+"' class='open' href=''>Open</a>" + "</td>" +
                    "<td>" + "<a id='' href='#'>" + "Delete" + "</a>" + "</td>" +
                    "</tr>"
                );
            }
            $('.open').click(function(ev){
                ev.preventDefault();
                //do something with click
                showModal_OpenTopicLessons(ev.target.id);
            });
        },
        error: function (x, e) {
            if (x.status == 0) {
                alert('You are offline!!\n Please Check Your Network.');
            } else if (x.status == 404) {
                alert('Requested URL not found.');
            } else if (x.status == 500) {
                alert('Internal Server Error.');
            } else if (e == 'parsererror') {
                alert('Error.\nParsing JSON Request failed.');
            } else if (e == 'timeout') {
                alert('Request Time out.');
            } else {
                alert('Unknown Error.\n' + x.responseText);
            }
        }
    });
}

//REFRESH TOPIC RECORDS ON TABLE
function refreshTopicRecord(){
    $.ajax({

    });

}

//SEARCH TOPIC
function searchTopic(){

}

//DELETE TOPIC AND ALL SUBS
function deleteTopic(){

}

//CHOOSE FILE TO BE UPLOADED
function uploadFile(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#iFrame').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function addNewSection(){
    var modal = document.getElementById('container_modalAddNewSection');
    var btn = document.getElementById("btn_AddNewSection");
    var span = document.getElementsByClassName("close_addNewSection")[0];

    modal.style.display = "block";

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function transferSection(){
    var modal = document.getElementById('container_modalTransfer');
    var btn = document.getElementById("btn_Transfer");
    var span = document.getElementsByClassName("close_transfer")[0];

    modal.style.display = "block";

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function createNewReviewer(){
    var modal = document.getElementById('container_modalCreateNewReviewer');
    var btn = document.getElementById("btn_NewReviewer");
    var span = document.getElementsByClassName("close_createNewReviewer")[0];

    modal.style.display = "block";

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function createNewSY(){
    var modal = document.getElementById('container_modalCreateNewSY');
    var btn = document.getElementById("btn_NewSchoolYear");
    var span = document.getElementsByClassName("close_createNewSY")[0];

    modal.style.display = "block";

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
//DATE PICKER
$( function() {
    $( ".datepicker" ).datepicker();
} );

function openMediaTab(evt, mediaName) {
    var i, tabContent_Media, tabLinks_Media;
    tabContent_Media = document.getElementsByClassName("tabContent_Media");
    for (i = 0; i < tabContent_Media.length; i++) {
        tabContent_Media[i].style.display = "none";
    }
    tabLinks_Media = document.getElementsByClassName("tabLinks_Media");
    for (i = 0; i < tabLinks_Media.length; i++) {
        tabLinks_Media[i].className = tabLinks_Media[i].className.replace(" active"," ");
    }
    document.getElementById(mediaName).style.display = "block";
    evt.currentTarget.className += " active";
}


