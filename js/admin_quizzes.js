$(document).ready(function(){



})


//ONCHANGE DROPDOWN
$('#modalDrpDown_selectTest').on('change', function() {
    var testSelect = this.value;
    var testCategory = $("#modalDrpDown_selectTest option:selected").text();
    if(testCategory === 'Custom'){
        $("#modalInput_testName").prop("disabled", false); //disable the dropdown
    }else{
        $("#modalInput_testName").prop("disabled", true); //enable dropdown
    }
})

//SHOW MODAL CALL IN
$(document).on('click','#pageBtn_CreateNewTest',showModal_createNewTest);
$(document).on('click', '#pageBtn_PublishTest',showModal_publishTest);

//CANCEL MODAL CALL IN
$(document).on('click', '#modalBtn_createNewTest_cancel', closeModal_createNewTest );
$(document).on('click', '#modalBtn_publishTest_cancel',closeModal_publishTest );

//CLOSE MODAL CALL IN
$(document).on('click', '.close_createNewTest', closeModal_createNewTest );
$(document).on('click', '.close_publishTest',closeModal_publishTest );

//ADD/CREATE CALL IN
$(document).on('click', '#modalBtn_createNewTest_create', validateEmptyFields);

//SHOW MODAL FUNCTION
function showModal_createNewTest(){
    $('#container_modalCreateNewTest').show();
}
function showModal_publishTest(){
    $('#container_modalPublishTest').show();
}

//CLOSE MODAL FUNCTION
function closeModal_createNewTest(){
    $('#container_modalCreateNewTest').hide();
}
function closeModal_publishTest(){
    $('#container_modalPublishTest').hide();
}

//ADD CREATE MODAL FUNCTION


//VALIDATION FUNCTION
function validateEmptyFields() {
    console.log("PASOK NA BES!!!!!");

    var selectTest = $("#modalDrpDown_selectTest option:selected").text();
    var testName = $("#modalInput_testName").val();
    var testType = $("#modalDrpDown_testType option:selected").text();
    var noOfItems = $("#modalInput_numberOfItems").val();
    var noOfItemsEle = $("#modalInput_numberOfItems");
    var passingScore = $("#modalInput_passingScore").val();
    var passingScoreEle =  $("#modalInput_passingScore");
    var errorMessage = $("#modal_errorMessage");
    var eM = "Found empty fields";
    var cbCoverage = $("#modalCB_coverage").prop(':checked' , false);
    var easyIsNotChecked =  $("#modalCB_difficulty_easy").prop(':checked' , false);
    var intermediateIsNotChecked =  $("#modalCB_difficulty_intermediate").prop(':checked' , false);
    var advancedIsNotChecked =  $("#modalCB_difficulty_advanced").prop(':checked' , false);
    var customIsNotChecked =  $("#modalCB_difficulty_custom").prop(':checked' , false);
    var coverageMenu = $("#modalContainer_selectCoverage");
    var cbCoverageContainer =  $("#modalContainer_coverage");
    var difficultyContainer = $("#modalContainer_difficulty");


    if (selectTest !== "Custom") {
        $("#modalInput_testName").prop( 'disabled' , true);
        if (testType === 'Select') {
            errorMessage.text(eM);
            errorMessage.css({"color": "red", "font-size": "18px"});
            errorMessage.css("font-family","Arial");
            $("#modalDrpDown_testType").css('border', '1px solid red');
        }else{
            $("#modalDrpDown_testType").css('border', '1px solid lightgrey');
        }
        if (noOfItems.length===0) {
            errorMessage.val(eM);
            noOfItemsEle.css('border', '1px solid red');
        }else{
            $("#modalInput_numberOfItems").css('border', '1px solid lightgrey');
        }
        if (passingScore.length === 0) {
            errorMessage.val(eM);
            passingScoreEle.css('border', '1px solid red');
        }else{
            $("#modalInput_passingScore").css('border', '1px solid lightgrey');
        }
        if(  easyIsNotChecked  && intermediateIsNotChecked && advancedIsNotChecked && customIsNotChecked ){
            difficultyContainer.css('border', '1px solid red');
        }
        if(cbCoverage){
            errorMessage.val(eM);
            cbCoverageContainer.css('border', '1px solid red');
            coverageMenu.css('border', '1px solid red');
        }
    }else{
        $("#inputTestName").prop( 'disabled' , false);

    }
}

//SEARCH FUNCTION