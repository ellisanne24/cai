
$(document).ready(function(){
    var modalDrpDown_uploadFileStatus = $('#modalDrpDown_uploadFileStatus');

    modalDrpDown_uploadFileStatus.prop('disabled',true);
    modalDrpDown_uploadFileStatus.css("background-color", "lightgrey");

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
//DEFAULT TAB DISPLAY
document.getElementById("Topics").click();


//SHOW MODAL CALL IN
$(document).on('click','#pageBtn_uploadFile', showModal_uploadNewFile);
$(document).on('click', '#pageBtn_publishFile', showModal_publishFile);



//CANCEL MODAL CALL IN
$(document).on('click', '#modalBtn_uploadFile_cancel', closeModal_uploadNewFile);
$(document).on('click', '#modalBtn_publishFile_cancel', closeModal_publishFile);


//CLOSE MODAL CALL IN
$(document).on('click', '.close_uploadFile', closeModal_uploadNewFile);
$(document).on('click', '.close_publishFile', closeModal_publishFile);


//ADD/CREATE CALL IN



//EDIT CALL IN

//DELETE CALL IN

//LOAD TO TABLE CALL IN

//REFRESH CALL IN

//SEARCH CALL IN

//NAVIGATION CALL IN



//SHOW MODAL FUNCTIONS
function showModal_uploadNewFile(){
    $('#container_modalUploadNewFile').show();
}
function showModal_publishFile(){
    $('#container_modalPublishFile').show();
}


//CLOSE MODAL FUNCTIONS
function closeModal_uploadNewFile(){
    $('#container_modalUploadNewFile').hide();
}

function closeModal_publishFile(){
    $('#container_modalPublishFile').hide();
}

//VALIDATIONS

