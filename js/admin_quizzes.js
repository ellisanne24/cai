$(document).on('click', '#btn_modalCreateNewTest', validateEmptyFields);


function showModalCreateNewTest(){
    var modal = document.getElementById('container_modalCreateNewTest');
    var btn = document.getElementById("btn_CreateNewTest");
    var span = document.getElementsByClassName("close_createNewTest")[0];
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

function showModalPublishTest(){
    var modal = document.getElementById('container_modalPublishTest');
    var btn = document.getElementById("btn_PublishTest");
    var span = document.getElementsByClassName("close_publishTest")[0];
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


//ONCHANGE DROPDOWN

$('#selectTestDropdown').on('change', function() {
    var testSelect = this.value;
    var testCategory = $("#selectTestDropdown option:selected").text();
    if(testCategory === 'Custom'){
        $("#inputTestName").prop("disabled", false); //disable the dropdown
    }else{
        $("#inputTestName").prop("disabled", true); //enable dropdown
    }
})

//CREATE NEW TEST EMPTY FIELD VALIDATOR

function validateEmptyFields() {
    console.log("PASOK NA BES!!!!!");

    var selectTest = $("#selectTestDropdown option:selected").text();
    var testName = $("#inputTestName").val();
    var testNameEle =  $("#inputTestName");
    var testType = $("#testTypeDropdown option:selected").text();
    var noOfItems = $("#input_itemsNumber").val();
    var noOfItemsEle = $("#input_itemsNumber");
    var passingScore = $("#input_passingScore").val();
    var passingScoreEle =  $("#input_passingScore");
    var errorMessage = $("#modal_errorMessage");
    var eM = "Found empty fields";
    var cbCoverage = $("#cb_coverage").prop(':checked' , false);
    var easyIsNotChecked =  $("#cb_difficulty_easy").prop(':checked' , false);
    var intermediateIsNotChecked =  $("#cb_difficulty_intermediate").prop(':checked' , false);
    var advancedIsNotChecked =  $("#cb_difficulty_advanced").prop(':checked' , false);
    var customIsNotChecked =  $("#cb_difficulty_custom").prop(':checked' , false);
    var coverageContainer = $("#coverage_Container");
    var cbContainer = $("#cb_divContainer");
    var coverageMenu = $("#coverage_menu");

    if (selectTest !== "Custom") {
            $("#inputTestName").prop( 'disabled' , true);
        if (testType === 'Select') {
            errorMessage.text(eM);
            errorMessage.css({"color": "red", "font-size": "18px"});
            errorMessage.css("font-family","Arial");
            $("#testTypeDropdown").css('border', '1px solid red');
        }else{
            $("#testTypeDropdown").css('border', '1px solid lightgrey');
        }
        if (noOfItems.length===0) {
            errorMessage.val(eM);
            noOfItemsEle.css('border', '1px solid red');
        }else{
            $("#input_itemsNumber").css('border', '1px solid lightgrey');
        }
        if (passingScore.length === 0) {
            errorMessage.val(eM);
            passingScoreEle.css('border', '1px solid red');
        }else{
            $("#input_passingScore").css('border', '1px solid lightgrey');
        }
        if(  easyIsNotChecked  && intermediateIsNotChecked && advancedIsNotChecked && customIsNotChecked ){
            cbContainer.css('border', '1px solid red');
        }
        if(cbCoverage){
            errorMessage.val(eM);
            coverageContainer.css('border', '1px solid red');
            coverageMenu.css('border', '1px solid red');
        }
    }else{
        $("#inputTestName").prop( 'disabled' , false);

    }
}




