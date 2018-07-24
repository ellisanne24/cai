


/*SHOW MODAL CALL IN*/
$(document).on('click', '#modalBtn_addNewLesson', showModal_addNewLesson);

//CLOSE MODAL CALL IN.
$(document).on('click', '.close_addNewLesson', closeModal_addNewLesson);

//CANCEL MODAL CALL IN
$(document).on('click', '#modalBtn_addNewLesson_cancel', closeModal_addNewLesson);

//SHOW MODAL FUNCTIONS
function showModal_addNewLesson(){
    $('#container_modalAddNewLesson').show();
}

//CLOSE MODAL FUNCTIONS
function closeModal_addNewLesson(){
    $('#container_modalAddNewLesson').hide();
}