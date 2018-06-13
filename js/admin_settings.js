//DOCUMENT READY

$(document).ready(function(){
    loadAllTopicsToTable();
});

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

document.getElementById("Topics").click();

function addImage(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#iFrame').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

function showModal_uploadContent() {
    var modal = document.getElementById('container_modalUploadContent');
    var btn = document.getElementById("btn_Upload");
    var span = document.getElementsByClassName("close_uploadContent")[0];
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

function showModal_addNewTopic(){
    var modal = document.getElementById('container_modalAddNewTopic');
    var btn = document.getElementById("btn_addNewTopic");
    var span = document.getElementsByClassName("close_addNewTopic")[0];
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

$(document).on('click', '#btn_addNewTopicCreate', addNewTopic);

function addNewTopic(){

    var topicTitle =$("#input_topicTitle").val();
    $.ajax({
        url:"controller/add_topic.php",
        type:"POST",
        data:{
            topictitle:topicTitle
        },
        success: function(isSuccessful){
            alert("isSuccessful: "+isSuccessful);
            alert("Successfully added topic!.");
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
//END ADD NEW TOPIC

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

//REFRESH TOPIC
function refreshTopicRecord(){
    $.ajax({

    });

}
//LOAD TO TABLE
function loadAllTopicsToTable(){
    $.ajax({
        url: 'controller/get_all_topic_record.php',
        type: 'POST',
        dataType: 'json',
        success: function(topicData){
            console.log("Length: "+topicData.length);
            var len = topicData.length;
            $('#table_topic_record').find("tr:not(:first)").remove();
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
                    "<td>" + "<a id='"+topicId+"' class='edit' href=''>Edit</a>" + "</td>" +
                    "<td>" + "<a id='' href='#'>" + "Delete" + "</a>" + "</td>" +
                    "</tr>"
                );
            }
            $('.edit').click(function(ev){
                ev.preventDefault();
                //do something with click
                show_edit_user_modal(ev.target.id);
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