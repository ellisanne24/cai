<?php
require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/questionaire.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//resources/demos/style.css">
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
</head>

<body>
<!--MODAL - QUESTIONAIRE-->
<div class="modal" id="container_questionaire">
        <div class="modal_content_questionaire">
            <div class="modal_header_questionaire">
                <span class="close_questionaire">&times;</span>
                <label class="modal_header_label" id="modalLbl_qTitle">Questionaire Title</label><br>
                <label class="modal_header_label" id="modalLbl_qBrand">CHCS | Realistic Math</label>
            </div>

            <div class="modal_body">
                <div class="questionaireContainer_questionNumber">
                    <label class="modal_label" id="question_number">
                        Question 1:
                    </label>
                </div>
                <div class="questionaireContainer_questions">
                        <p class="modalParagraph" id="modalP_questions">
                            What is the product of 4x4?
                        </p>
                    <form class="modalForm" id="modalForm_answerOptions">
                        <label>
                        <input type="radio" name="option" class="modalRadioBtn" id="modalRadioBtn_A"> 8<br>
                        <input type="radio" name="option" class="modalRadioBtn" id="modalRadioBtn_B"> 9<br>
                        <input type="radio" name="option" class="modalRadioBtn" id="modalRadioBtn_C"> 10
                        </label>
                    </form>
                </div>
            </div>
            <div class="modal_footer" id="modalFooter_numberTracker">
               <div class="modalContainer_numberTracker" id="modalContainer_numberTracker">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li id="modalBtn_submitAnswers">Submit</li>
                    </ul>
               </div>
                <div class="modalContainer_questionaireControl" id="modalContainer_questionaireControl">
                    <a href="" id="modalLink_previous">Previous</a>
                    <a href="" id="modalLink_next">Next</a>
                    <a href="" id="modalLink_continueLater">Continue Later</a>
                </div>
            </div>
        </div>
</div>
<!----------------------------------------------------------------------------------------------------------->

<script>
    var url1 = "js/questionaire.js";
    $.getScript(url1);
</script>

</body>
</html>