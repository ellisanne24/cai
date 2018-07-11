
$(document).ready(function(){
    var topic_modal_add_topic_status = $('#modalDrpDown_addTopicStatus');
    var modalDrpDown_uploadFileStatus = $('#modalDrpDown_uploadFileStatus');
    var container_mediaContentsID = $('#container_media');

    topic_modal_add_topic_status.prop('disabled',true);
    topic_modal_add_topic_status.css("background-color", "lightgrey");
    modalDrpDown_uploadFileStatus.prop('disabled',true);
    modalDrpDown_uploadFileStatus.css("background-color", "lightgrey");
    container_mediaContentsID.hide();

    loadAllTopicsToTable();
    loadToDrpDown_assignToTopic();
});


function getYoutubeVideoId(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}

$('#modalInput_pasteURL').on('input',function(e){
    var videoUrl = $('#modalInput_pasteURL').val().trim();
    var videoId = getYoutubeVideoId(videoUrl);
    $('#modalContainer_videoPreview').html('<iframe width="510" height="200" src="//www.youtube.com/embed/' + videoId + '" frameborder="0" allowfullscreen></iframe>');
});

$("#modalBtn_choose_video_file").on('change',function(event){
    $('#modalInput_pasteURL').val('');
    var fileInput = document.getElementById('modalBtn_choose_video_file');
    var fileUrl = window.URL.createObjectURL(fileInput.files[0]);
    //console.log("Video URL: "+fileUrl);
    //$(".video").attr("src", fileUrl);
    var video = $('<video />', {
        id: 'video',
        src: fileUrl,
        controls: true,
        width: 510,
        height: 200
    });
    $('#modalContainer_videoPreview').html(video);
});


function hasInputFileLoaded(){
    var hasYoutubeURLInput = $('#modalInput_pasteURL').val().trim().length > 0;
    var hasFileInputLoaded = (document.getElementById("modalBtn_choose_video_file").files.length > 0 );
    if(hasYoutubeURLInput || hasFileInputLoaded){
        return true;
    }else{
        return false;
    }
}

function isYoutubeUrl(){
    return $('#modalInputCB_pasteUrl').is(':checked');
}

function isVideoUpload(){
    return $('#modalInputCB_uploadFrmGallery').is(':checked');
}

$('#modalBtn_uploadVideo_upload').on('click',function(event){
    event.preventDefault();
    var errorMessageLabel = $('#modalLbl_uploadVideoError');
    if(hasInputFileLoaded()){
        errorMessageLabel.text('');
        if(isYoutubeUrl()){
            uploadYoutubeUrl();
        }else if(isVideoUpload()){
            uploadVideo();
        }
    }else{
        errorMessageLabel.text("Please select a video to upload or supply a youtube URL.");
    }
});

function uploadYoutubeUrl(){
    var successMessageLabel = $('#modalLbl_uploadVideoSuccess');
    var youtubeUrl = $('#modalInput_pasteURL').val().trim();
    var youtubeVideoId = getYoutubeVideoId(youtubeUrl);
    var youtubeEmbedUrl = "www.youtube.com/embed/";
    var completeYoutubeUrl = (youtubeEmbedUrl + youtubeVideoId);
    var youtubeVideoTitle = $('#youtube_video_title').val().trim();
    console.log('Youtube Embed URL: '+completeYoutubeUrl);

    var formData = new FormData();
    formData.append('completeYoutubeUrl',completeYoutubeUrl);
    formData.append('youtubeVideoTitle',youtubeVideoTitle);
    $.ajax({
        url: 'controller/upload_youtube_video.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response){
            successMessageLabel.text(response);
        },
        error: function(x,e){
            handleError(x,e);
        }
    });
}

function uploadVideo() {
    var successMessageLabel = $('#modalLbl_uploadVideoSuccess');
    var videoTitle = $('#modalInput_renameVideo').val().trim();
    var videoFile = $('#modalBtn_choose_video_file')[0].files[0];
    var formData = new FormData();
    formData.append('file', videoFile);
    formData.append('videoTitle',videoTitle);

    $.ajax({
        url: 'controller/upload_video.php',
        type: 'POST',
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success: function (response) {
            successMessageLabel.text(response);
        },
        error: function (x, e) {
            handleError(x,e);
        }
    });
}

function handleError(x,e){
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

//CHANGE LISTENERS
$(document).on('click', '#modalInputCB_pasteUrl', function(){
    var modalInputCB_pasteUrl = $('#modalInputCB_pasteUrl');
    var modalInputCB_upload = $('#modalInputCB_uploadFrmGallery');
    var modalInput_pasteURL = $('#modalInput_pasteURL');
    var modalBtn_browseVideo = $('#modalBtn_browseVideo');
    var modalBtn_choose_video_file = $('#modalBtn_choose_video_file');
    var videoPreviewDivContainer = $('#modalContainer_videoPreview');

    if(this.checked){
        videoPreviewDivContainer.html('');
        modalBtn_choose_video_file.val('');
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
});

$(document).on('click', '#modalInputCB_uploadFrmGallery', function(){
    var modalInputCB_pasteUrl = $('#modalInputCB_pasteUrl');
    var modalInput_pasteURL = $('#modalInput_pasteURL');
    var modalBtn_browseVideo = $('#modalBtn_browseVideo');
    var modalInput_pasteURL = $('#modalInput_pasteURL');
    var videoPreviewDivContainer = $('#modalContainer_videoPreview');

    if(this.checked){
        videoPreviewDivContainer.html('');
        modalInput_pasteURL.val('');
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
});

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


function resetModalForm(){
    var modalInput_pasteURL = $('#modalInput_pasteURL');
    var videoPreviewDivContainer = $('#modalContainer_videoPreview');
    var modalBtn_choose_video_file = $('#modalBtn_choose_video_file');
    var cbPasteUrl = $('#modalInputCB_pasteUrl');
    var cbRenameVideo = $('#modalInputCB_renameVideo');
    var cbUploadFromGaller = $('#modalInputCB_uploadFrmGallery');
    cbPasteUrl.prop('checked',false);
    cbRenameVideo.prop('checked',false);
    cbUploadFromGaller.prop('checked',false);
    modalInput_pasteURL.val('');
    videoPreviewDivContainer.html('');
    modalBtn_choose_video_file.val('');
}
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
    resetModalForm();
}

//VALIDATIONS
function validateAddNewTopic(){
    if($('#modalInput_addTopicTitle').val().length===0){
        $('#modalLbl_errorDisplay').text("Topic Title Field Cannot be Empty.");
    }else{
        addNewTopic();
    }
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


