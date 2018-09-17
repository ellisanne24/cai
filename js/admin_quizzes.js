$(document).ready(function(){

    $('ul.tabs li').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
    })

    searchTest()
})

//CHANGE LISTENERS
$(document).on('click', '#modalCB_MC_importCSV', function(){
    var modalBtn_choose_csv_file = $('#modalBtn_choose_csv_file');
    var modalDrpDown_MC_CSV_SelectTopic = $('#modalDrpDown_MC_CSV_SelectTopic');

    var modalCB_MC_manual = $('#modalCB_MC_manual');
    var modalDrpDown_MCSelectDifficulty = $('#modalDrpDown_MCSelectDifficulty');
    var modalDrpDown_MC_Manual_SelectTopic = $('#modalDrpDown_MC_Manual_SelectTopic');
    var modal_MC_Manual_questionTextArea = $('#modal_MC_Manual_questionTextArea');
    var modalInput_MCOptionA = $('#modalInput_MCOptionA');
    var modalInput_MCOptionB = $('#modalInput_MCOptionB');
    var modalInput_MCOptionC = $('#modalInput_MCOptionC');
    var modalInput_MCOptionD = $('#modalInput_MCOptionD');
    var modalInput_MCRealAnswer = $('#modalInput_MCRealAnswer');


    if(this.checked){

        modalBtn_choose_csv_file.prop('disabled', false);
        modalBtn_choose_csv_file.css("background-color", "#3cabd0");
        modalDrpDown_MC_CSV_SelectTopic.prop('disabled', false);
        modalDrpDown_MC_CSV_SelectTopic.css("background-color", "white");

        modalCB_MC_manual.prop('checked', false);
        modalDrpDown_MCSelectDifficulty.prop('disabled', true);
        modalDrpDown_MCSelectDifficulty.css("background-color", "lightgrey");
        modalDrpDown_MC_Manual_SelectTopic.prop('disabled', true);
        modalDrpDown_MC_Manual_SelectTopic.css("background-color", "lightgrey");
        modal_MC_Manual_questionTextArea.prop('disabled', true);
        modal_MC_Manual_questionTextArea.css("background-color", "lightgrey");
        modalInput_MCOptionA.prop('disabled', true);
        modalInput_MCOptionA.css("background-color", "lightgrey");
        modalInput_MCOptionB.prop('disabled', true);
        modalInput_MCOptionB.css("background-color", "lightgrey");
        modalInput_MCOptionC.prop('disabled', true);
        modalInput_MCOptionC.css("background-color", "lightgrey");
        modalInput_MCOptionD.prop('disabled', true);
        modalInput_MCOptionD.css("background-color", "lightgrey");
        modalInput_MCRealAnswer.prop('disabled', true);
        modalInput_MCRealAnswer.css("background-color", "lightgrey");


    }else if(!this.checked){


        modalBtn_choose_csv_file.prop('disabled', false);
        modalBtn_choose_csv_file.css("background-color", "white");
        modalDrpDown_MC_CSV_SelectTopic.prop('disabled', false);
        modalDrpDown_MC_CSV_SelectTopic.css("background-color", "white");

        modalDrpDown_MCSelectDifficulty.prop('disabled', false);
        modalDrpDown_MCSelectDifficulty.css("background-color", "white");
        modalDrpDown_MC_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_MC_Manual_SelectTopic.css("background-color", "white");
        modal_MC_Manual_questionTextArea.prop('disabled', false);
        modal_MC_Manual_questionTextArea.css("background-color", "white");
        modalInput_MCOptionA.prop('disabled', false);
        modalInput_MCOptionA.css("background-color", "white");
        modalInput_MCOptionB.prop('disabled', false);
        modalInput_MCOptionB.css("background-color", "white");
        modalInput_MCOptionC.prop('disabled', false);
        modalInput_MCOptionC.css("background-color", "white");
        modalInput_MCOptionD.prop('disabled', false);
        modalInput_MCOptionD.css("background-color", "white");
        modalInput_MCRealAnswer.prop('disabled', false);
        modalInput_MCRealAnswer.css("background-color", "white");

    }
});

$(document).on('click', '#modalCB_MC_manual', function(){
    var modalBtn_choose_csv_file = $('#modalBtn_choose_csv_file');
    var modalDrpDown_MC_CSV_SelectTopic = $('#modalDrpDown_MC_CSV_SelectTopic');

    var modalCB_MC_importCSV = $('#modalCB_MC_importCSV');
    var modalDrpDown_MCSelectDifficulty = $('#modalDrpDown_MCSelectDifficulty');
    var modalDrpDown_MC_Manual_SelectTopic = $('#modalDrpDown_MC_Manual_SelectTopic');
    var modal_MC_Manual_questionTextArea = $('#modal_MC_Manual_questionTextArea');
    var modalInput_MCOptionA = $('#modalInput_MCOptionA');
    var modalInput_MCOptionB = $('#modalInput_MCOptionB');
    var modalInput_MCOptionC = $('#modalInput_MCOptionC');
    var modalInput_MCOptionD = $('#modalInput_MCOptionD');
    var modalInput_MCRealAnswer = $('#modalInput_MCRealAnswer');


    if(this.checked){

        modalCB_MC_importCSV.prop('checked', false);
        modalBtn_choose_csv_file.prop('disabled', true);
        modalBtn_choose_csv_file.css("background-color", "lightgrey");
        modalDrpDown_MC_CSV_SelectTopic.prop('disabled', true);
        modalDrpDown_MC_CSV_SelectTopic.css("background-color", "lightgrey");

        modalDrpDown_MCSelectDifficulty.prop('disabled', false);
        modalDrpDown_MCSelectDifficulty.css("background-color", "white");
        modalDrpDown_MC_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_MC_Manual_SelectTopic.css("background-color", "white");
        modal_MC_Manual_questionTextArea.prop('disabled', false);
        modal_MC_Manual_questionTextArea.css("background-color", "white");
        modalInput_MCOptionA.prop('disabled', false);
        modalInput_MCOptionA.css("background-color", "white");
        modalInput_MCOptionB.prop('disabled', false);
        modalInput_MCOptionB.css("background-color", "white");
        modalInput_MCOptionC.prop('disabled', false);
        modalInput_MCOptionC.css("background-color", "white");
        modalInput_MCOptionD.prop('disabled', false);
        modalInput_MCOptionD.css("background-color", "white");
        modalInput_MCRealAnswer.prop('disabled', false);
        modalInput_MCRealAnswer.css("background-color", "white");


    }else if(!this.checked){

        modalBtn_choose_csv_file.prop('disabled', false);
        modalBtn_choose_csv_file.css("background-color", "white");
        modalDrpDown_MC_CSV_SelectTopic.prop('disabled', false);
        modalDrpDown_MC_CSV_SelectTopic.css("background-color", "white");

        modalDrpDown_MCSelectDifficulty.prop('disabled', false);
        modalDrpDown_MCSelectDifficulty.css("background-color", "white");
        modalDrpDown_MC_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_MC_Manual_SelectTopic.css("background-color", "white");
        modal_MC_Manual_questionTextArea.prop('disabled', false);
        modal_MC_Manual_questionTextArea.css("background-color", "white");
        modalInput_MCOptionA.prop('disabled', false);
        modalInput_MCOptionA.css("background-color", "white");
        modalInput_MCOptionB.prop('disabled', false);
        modalInput_MCOptionB.css("background-color", "white");
        modalInput_MCOptionC.prop('disabled', false);
        modalInput_MCOptionC.css("background-color", "white");
        modalInput_MCOptionD.prop('disabled', false);
        modalInput_MCOptionD.css("background-color", "white");
        modalInput_MCRealAnswer.prop('disabled', false);
        modalInput_MCRealAnswer.css("background-color", "white");

    }
});

$(document).on('click', '#modalCB_TOF_importCSV', function(){
    var modalBtn_TOF_choose_csv_file = $('#modalBtn_TOF_choose_csv_file');
    var modalDrpDown_TOF_ImportCSV_SelectTopic = $('#modalDrpDown_TOF_ImportCSV_SelectTopic');

    var modalCB_TOF_manual = $('#modalCB_TOF_manual');
    var modalCB_TOF_importCSV = $('#modalCB_TOF_importCSV');
    var modalDrpDown_TOF_Manual_SelectDifficulty = $('#modalDrpDown_TOF_Manual_SelectDifficulty');
    var modalDrpDown_TOF_Manual_SelectTopic = $('#modalDrpDown_TOF_Manual_SelectTopic');
    var modal_TOFQuestionTextArea = $('#modal_TOFQuestionTextArea');
    var modalInput_TOFAnswer = $('#modalInput_TOFAnswer');


    if(this.checked){

        modalCB_TOF_manual.prop('checked', false);
        modalBtn_TOF_choose_csv_file.prop('disabled', false);
        modalBtn_TOF_choose_csv_file.css("background-color", "#3cabd0");
        modalDrpDown_TOF_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectDifficulty.css("background-color", "white");

        modalDrpDown_TOF_Manual_SelectDifficulty.prop('disabled', true);
        modalDrpDown_TOF_Manual_SelectDifficulty.css("background-color", "lightgrey");
        modalDrpDown_TOF_Manual_SelectTopic.prop('disabled', true);
        modalDrpDown_TOF_Manual_SelectTopic.css("background-color", "lightgrey");
        modal_TOFQuestionTextArea.prop('disabled', true);
        modal_TOFQuestionTextArea.css("background-color", "lightgrey");
        modalInput_TOFAnswer.prop('disabled', true);
        modalInput_TOFAnswer.css("background-color", "lightgrey");

    }else if(!this.checked){

        modalCB_TOF_manual.prop('checked', false);
        modalBtn_TOF_choose_csv_file.prop('disabled', false);
        modalBtn_TOF_choose_csv_file.css("background-color", "#3cabd0");
        modalDrpDown_TOF_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectDifficulty.css("background-color", "white");

        modalDrpDown_TOF_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectDifficulty.css("background-color", "white");
        modalDrpDown_TOF_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectTopic.css("background-color", "white");
        modal_TOFQuestionTextArea.prop('disabled', false);
        modal_TOFQuestionTextArea.css("background-color", "white");
        modalInput_TOFAnswer.prop('disabled', false);
        modalInput_TOFAnswer.css("background-color", "white");
    }
});

$(document).on('click', '#modalCB_TOF_manual', function(){
    var modalBtn_TOF_choose_csv_file = $('#modalBtn_TOF_choose_csv_file');
    var modalDrpDown_TOF_ImportCSV_SelectTopic = $('#modalDrpDown_TOF_ImportCSV_SelectTopic');

    var modalCB_TOF_manual = $('#modalCB_TOF_manual');
    var modalCB_TOF_importCSV = $('#modalCB_TOF_importCSV');
    var modalDrpDown_TOF_Manual_SelectDifficulty = $('#modalDrpDown_TOF_Manual_SelectDifficulty');
    var modalDrpDown_TOF_Manual_SelectTopic = $('#modalDrpDown_TOF_Manual_SelectTopic');
    var modal_TOFQuestionTextArea = $('#modal_TOFQuestionTextArea');
    var modalInput_TOFAnswer = $('#modalInput_TOFAnswer');


    if(this.checked){

        modalCB_TOF_importCSV.prop('checked', false);
        modalBtn_TOF_choose_csv_file.prop('disabled', true);
        modalBtn_TOF_choose_csv_file.css("background-color", "lightgrey");
        modalDrpDown_TOF_ImportCSV_SelectTopic.prop('disabled', true);
        modalDrpDown_TOF_ImportCSV_SelectTopic.css("background-color", "lightgrey");

        modalDrpDown_TOF_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectDifficulty.css("background-color", "white");
        modalDrpDown_TOF_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectTopic.css("background-color", "white");
        modal_TOFQuestionTextArea.prop('disabled', false);
        modal_TOFQuestionTextArea.css("background-color", "white");
        modalInput_TOFAnswer.prop('disabled', false);
        modalInput_TOFAnswer.css("background-color", "white");

    }else if(!this.checked){

        modalCB_TOF_importCSV.prop('checked', false);
        modalBtn_TOF_choose_csv_file.prop('disabled', false);
        modalBtn_TOF_choose_csv_file.css("background-color", "#3cabd0");
        modalDrpDown_TOF_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectDifficulty.css("background-color", "white");

        modalDrpDown_TOF_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectDifficulty.css("background-color", "white");
        modalDrpDown_TOF_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_TOF_Manual_SelectTopic.css("background-color", "white");
        modal_TOFQuestionTextArea.prop('disabled', false);
        modal_TOFQuestionTextArea.css("background-color", "white");
        modalInput_TOFAnswer.prop('disabled', false);
        modalInput_TOFAnswer.css("background-color", "white");
    }
});

$(document).on('click', '#modalCB_FITB_importCSV', function(){
    var modalBtn_FITB_choose_csv_file = $('#modalBtn_FITB_choose_csv_file');
    var modalDrpDown_FITB_ImportCSV_SelectTopic = $('#modalDrpDown_FITB_ImportCSV_SelectTopic');

    var modalCB_FITB_manual = $('#modalCB_FITB_manual');
    var modalCB_FITB_importCSV = $('#modalCB_FITB_importCSV');
    var modalDrpDown_FITB_Manual_SelectDifficulty = $('#modalDrpDown_FITB_Manual_SelectDifficulty');
    var modalDrpDown_FITB_Manual_SelectTopic = $('#modalDrpDown_FITB_Manual_SelectTopic');
    var modal_FITBQuestionTextArea = $('#modal_FITBQuestionTextArea');
    var modalInput_FITBAnswer = $('#modalInput_FITBAnswer');

    if(this.checked){

        modalCB_FITB_manual.prop('checked', false);
        modalBtn_FITB_choose_csv_file.prop('disabled', false);
        modalBtn_FITB_choose_csv_file.css("background-color", "#3cabd0");

        modalDrpDown_FITB_Manual_SelectDifficulty.prop('disabled', true);
        modalDrpDown_FITB_Manual_SelectDifficulty.css("background-color", "lightgrey");
        modalDrpDown_FITB_Manual_SelectTopic.prop('disabled', true);
        modalDrpDown_FITB_Manual_SelectTopic.css("background-color", "lightgrey");
        modal_FITBQuestionTextArea.prop('disabled', true);
        modal_FITBQuestionTextArea.css("background-color", "lightgrey");
        modalInput_FITBAnswer.prop('disabled', true);
        modalInput_FITBAnswer.css("background-color", "lightgrey");

    }else if(!this.checked){

        modalCB_FITB_manual.prop('checked', false);
        modalBtn_FITB_choose_csv_file.prop('disabled', false);
        modalBtn_FITB_choose_csv_file.css("background-color", "#3cabd0");

        modalDrpDown_FITB_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_FITB_Manual_SelectDifficulty.css("background-color", "white");
        modalDrpDown_FITB_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_FITB_Manual_SelectTopic.css("background-color", "white");
        modal_FITBQuestionTextArea.prop('disabled', false);
        modal_FITBQuestionTextArea.css("background-color", "white");
        modalInput_FITBAnswer.prop('disabled', false);
        modalInput_FITBAnswer.css("background-color", "white");
    }
});

$(document).on('click', '#modalCB_FITB_manual', function(){
    var modalBtn_FITB_choose_csv_file = $('#modalBtn_FITB_choose_csv_file');
    var modalDrpDown_FITB_ImportCSV_SelectTopic = $('#modalDrpDown_FITB_ImportCSV_SelectTopic');


    var modalCB_FITB_importCSV = $('#modalCB_FITB_importCSV');
    var modalDrpDown_FITB_Manual_SelectDifficulty = $('#modalDrpDown_FITB_Manual_SelectDifficulty');
    var modalDrpDown_FITB_Manual_SelectTopic = $('#modalDrpDown_FITB_Manual_SelectTopic');
    var modal_FITBQuestionTextArea = $('#modal_FITBQuestionTextArea');
    var modalInput_FITBAnswer = $('#modalInput_FITBAnswer');

    if(this.checked){

        modalCB_FITB_importCSV.prop('checked', false);
        modalBtn_FITB_choose_csv_file.prop('disabled', true);
        modalBtn_FITB_choose_csv_file.css("background-color", "lightgrey");
        modalDrpDown_FITB_ImportCSV_SelectTopic.prop('disabled', true);
        modalDrpDown_FITB_ImportCSV_SelectTopic.css("background-color", "lightgrey");

        modalDrpDown_FITB_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_FITB_Manual_SelectDifficulty.css("background-color", "white");
        modalDrpDown_FITB_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_FITB_Manual_SelectTopic.css("background-color", "white");
        modal_FITBQuestionTextArea.prop('disabled', false);
        modal_FITBQuestionTextArea.css("background-color", "white");
        modalInput_FITBAnswer.prop('disabled', false);
        modalInput_FITBAnswer.css("background-color", "white");

    }else if(!this.checked){

        modalCB_FITB_importCSV.prop('checked', false);
        modalBtn_FITB_choose_csv_file.prop('disabled', false);
        modalBtn_FITB_choose_csv_file.css("background-color", "#3cabd0");

        modalDrpDown_FITB_Manual_SelectDifficulty.prop('disabled', false);
        modalDrpDown_FITB_Manual_SelectDifficulty.css("background-color", "white");
        modalDrpDown_FITB_Manual_SelectTopic.prop('disabled', false);
        modalDrpDown_FITB_Manual_SelectTopic.css("background-color", "white");
        modal_FITBQuestionTextArea.prop('disabled', false);
        modal_FITBQuestionTextArea.css("background-color", "white");
        modalInput_FITBAnswer.prop('disabled', false);
        modalInput_FITBAnswer.css("background-color", "white");
    }
});

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
$(document).on('click', '#pageBtn_addQuestion', showModal_addQuestion);

//CANCEL MODAL CALL IN
$(document).on('click', '#modalBtn_createNewTest_cancel', closeModal_createNewTest );
$(document).on('click', '#modalBtn_publishTest_cancel', closeModal_publishTest );
$(document).on('click', '#modalBtn_addQuestion_cancel', closeModal_addQuestion);

//CLOSE MODAL CALL IN
$(document).on('click', '.close_createNewTest', closeModal_createNewTest );
$(document).on('click', '.close_publishTest',closeModal_publishTest );
$(document).on('click', '.close_addQuestion', closeModal_addQuestion);

//ADD/CREATE CALL IN
$(document).on('click', '#modalBtn_createNewTest_create', validateEmptyFields);

//SHOW MODAL FUNCTION
function showModal_createNewTest(){
    $('#container_modalCreateNewTest').show();

}
function showModal_publishTest(){
    $('#container_modalPublishTest').show();
}

function showModal_addQuestion(){
    $('#container_modalAddQuestion').show();


}

//CLOSE MODAL FUNCTION
function closeModal_createNewTest(){
    $('#container_modalCreateNewTest').hide();
}
function closeModal_publishTest(){
    $('#container_modalPublishTest').hide();
}
function closeModal_addQuestion(){
    $('#container_modalAddQuestion').hide();
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
function searchTest() {
    $("#pageInput_searchTest").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#pageTable_quizRecord tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
}