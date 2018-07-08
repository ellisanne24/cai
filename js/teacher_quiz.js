$(document).ready(function(){
    var modalDrpDown_testStatus = $('#modalDrpDown_testStatus');

    modalDrpDown_testStatus.prop('disabled',true);
    modalDrpDown_testStatus.css("background-color", "lightgrey");

});

//SHOW MODAL CALL IN
$(document).on('click','#pageBtn_createNewTest',showModal_createNewTest);
$(document).on('click', '#pageBtn_publishTest',showModal_publishTest);

//CANCEL MODAL CALL IN
$(document).on('click', '#modalBtn_createNewTest_cancel', closeModal_createNewTest );
$(document).on('click', '#modalBtn_publishTest_cancel', closeModal_publishTest);

//CLOSE MODAL CALL IN
$(document).on('click', '.close_createNewTest', closeModal_createNewTest );
$(document).on('click', '.close_publishTest', closeModal_publishTest);

//ADD/CREATE CALL IN
$(document).on('click', '#modalBtn_createNewTest_create', validate_teacher_createNewTest);
$(document).on('click', '#modalBtn_publishTest_publish', validate_teacher_publishTest);


//EDIT CALL IN

//DELETE CALL IN

//LOAD TO TABLE CALL IN

//REFRESH CALL IN

//SEARCH CALL IN

//NAVIGATION CALL IN

//SHOW MODAL FUNCTIONS
function showModal_createNewTest(){
    $('#container_modalCreateNewTest').show();
}
function showModal_publishTest(){
    $('#container_modalPublishTest').show();
}

//CLOSE MODAL FUNCTIONS
function closeModal_createNewTest(){
    $('#container_modalCreateNewTest').hide();
}
function closeModal_publishTest(){
    $('#container_modalPublishTest').hide();

}

//VALIDATIONS
function validate_teacher_createNewTest(){
    if($('#modalInput_testName').val().length===0){
        $('#modalError_createNewTest').text("Required fields cannot be empty.");
    }else{
        teacher_createNewTest();
    }
}
function validate_teacher_publishTest(){
    var dropDownCreatedTest = $('#modalDrpDown_createdTest').val();
    var dropDownAssignToSection = $('#modalDrpDown_ATSection').val();

    console.log(dropDownCreatedTest);

    if((dropDownCreatedTest === 'Select') || (dropDownAssignToSection === 'Select')) {
        $('#modalError_publishTest').text("Required fields cannot be empty.");
    }else{
        teacher_publishTest();
    }
}

//ADD/CREATE/UPLOAD FUNCTIONS
function teacher_createNewTest(){
    alert("Successfully Added Test!");
}

function teacher_publishTest(){
    alert("Successfully Published Test!");
}

//EDIT FUNCTIONSs

//GET FUNCTIONS

//DELETE FUNCTIONS

//LOAD TO DROPDOWN FUNCTIONS

//LOAD TO TABLE FUNCTIONS

//REFRESH FUNCTIONS

//SEARCH FUNCTIONS