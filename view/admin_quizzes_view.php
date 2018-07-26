<!DOCTYPE html>
<html>
<head>
    <title>Admin | Quizzes</title>
    <link rel="stylesheet" href="css/admin_quiz.css" >
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="mainWrapper">

    <div class="pageDiv_tabContainer">
        <ul class="tabs">
            <li class="tab-link current" data-tab="general">General</li>
            <li class="tab-link" data-tab="questions">Questions</li>
        </ul>

<!-- GENERAL TAB-->
        <div  class="tab-content current" id="general">
            <div class="pageDiv_controlContainer">
                <div class = "form_container">
                    <label class="control_label">
                        Search Test :
                        <input class="searchBox" id="pageInput_searchTest" type="text" name="SearchBox">
                    </label>
                    <i class="fa fa-search" id="pageBtn_searchTest"></i>
                    <i class="fa fa-refresh" id="pageBtn_refreshTest"></i>
                    <button class="button" id="pageBtn_PublishTest">
                        Publish Test
                    </button>
                    <button class="button" id="pageBtn_CreateNewTest">
                        Create New Test
                    </button>
                </div>
            </div>
<!--GENERAL TABLE-->
            <div class="table_wrapper" id="table_wrapper">
                <table id="pageTable_quizRecord">
                    <tr>
                        <th>Test Name</th>
                        <th>Items</th>
                        <th>For Topic</th>
                        <th>For Lesson</th>
                        <th>Test Type</th>
                        <th>Passing Score</th>
                        <th>Author</th>
                        <th>Date Created</th>
                        <th colspan="2">Action</th>
                    </tr>
                </table>
            </div>
        </div>
<!------------------------------------------------------------------------------------------>
<!--QUESTIONS TAB-->
        <div  class="tab-content" id="questions">
            <div class="pageDiv_controlContainer">
                <div class = "form_container">
                    <label class="control_label">
                        Search Here :
                        <input class="searchBox" id="pageInput_searchQuestion" type="text" name="SearchBox">
                    </label>
                    <i class="fa fa-search" id="pageBtn_searchQuestion"></i>
                    <i class="fa fa-refresh" id="pageBtn_refreshQuestion"></i>
                    <label class="pageLbl">
                        Show Topic
                        <select class="selection" id="pageDrpDown_showTopicQuestions">
                            <option value="All" class="option">All</option>
                            <option value="Multiplication" class="option">Multiplication</option>
                            <option value="Division" class="option">Division</option>
                            <option value="Fractions" class="option">Fractions</option>
                        </select>
                    </label>
                    <label class="pageLbl">
                        Show Difficulty
                        <select class="selection" id="pageDrpDown_showDifficultyQuestions">
                            <option value="All" class="option">All</option>
                            <option value="Easy" class="option">Easy</option>
                            <option value="Intermediate" class="option">Intermediate</option>
                            <option value="Advanced" class="option">Advanced</option>
                        </select>
                    </label>
                    <button class="button" id="pageBtn_addQuestion">
                        Add Question
                    </button>
                </div>
            </div>
<!--QUESTIONS TABLE-->
            <div class="table_wrapper" id="table_wrapper">
                <table id="pageTable_questionRecord">
                    <tr>
                        <th>Topic</th>
                        <th>Question</th>
                        <th>Question Type</th>
                        <th>Difficulty</th>
                        <th>Answer</th>
                        <th colspan="2">Action</th>
                    </tr>
                </table>
            </div>
        </div>
<!------------------------------------------------------------------------------------------>
    </div>
<!--END OF pageDiv_tabContainer-->
<!------------------------------------------------------------------------------------------>
    <!--MODAL - CREATE NEW TEST-->
    <div id="container_modalCreateNewTest" class="modal">
        <div class="modal_content_newTest">
            <div class="modal_header_newTest">
                <span class="close_createNewTest">&times;</span>
                <h4 class="modal_header_label">Create New Test</h4>
            </div>

            <div class="modal_body">
                <form class="container_UserInfo" id="modalForm_createNewTest" action="" method="post">
                    <label class="modal_label">
                        Select Test
                        <select class="dropDown" id="modalDrpDown_selectTest">
                            <option value="Select" class="option">Select</option>
                            <option value="Pretest" class="option">Pretest</option>
                            <option value="PostTest" class="option">PostTest</option>
                            <option value="Practice" class="option">Practice</option>
                            <option value="Mini-quiz" class="option">Mini-quiz</option>
                            <option value="Unit Test" class="option">Unit Test</option>
                            <option value="Custom" class="option">Custom</option>
                        </select><br>
                    </label>
                    <br>
                    <label class="modal_label">
                        Test Name
                        <input class="modal_inputbox" id="modalInput_testName" type="text" name="modalInputName_testName"><br>
                    </label>
                    <br>
                    <label class="modal_label">
                        Test Type
                        <select class="dropDown" id="modalDrpDown_testType">
                            <option value="Select" class="option">Select</option>
                            <option value="Multiple Choice" class="option">Multiple Choice</option>
                            <option value="Fill in the Box" class="option">Fill in the Box</option>
                        </select><br>
                    </label>
                    <hr />
                    <label class="modal_label">
                        Number of Items
                        <input class="modal_inputbox" id="modalInput_numberOfItems" type="text" name="modalInputName_numberOfItems"><br>
                    </label>
                    <hr />
                    <div id="modalContainer_difficulty">
                        <label class="modal_label">
                            <input class="modal_checkbox" id="modalCB_difficulty_custom" type="checkbox" name="cBox_difficulty_custom">
                            Custom
                        </label>
                        <label class="modal_label">
                            <input class="modal_checkbox" id="modalCB_difficulty_easy" type="checkbox" name="cBox_difficulty_easy">
                            All Easy
                        </label>
                        <label class="modal_label">
                            <input class="modal_checkbox" id="modalCB_difficulty_intermediate" type="checkbox" name="cBox_difficulty_intermediate">
                            All Intermediate
                        </label>
                        <label class="modal_label">
                            <input class="modal_checkbox" id="modalCB_difficulty_advanced" type="checkbox" name="cBox_difficulty_advanced">
                            All Advanced
                        </label>
                     </div>
                    <hr />
                    <label class="modal_label">
                        Number of Easy Questions
                        <input class="modal_inputbox" id="modalInput_noOfEasy" type="text" name="modalInputName_noOfEasy"><br>
                    </label>
                    <br>
                    <label class="modal_label">
                        Number of Intermediate Questions
                        <input class="modal_inputbox" id="modalInput_noOfIntermediate" type="text" name="modalInputName_noOfIntermediate"><br>
                    </label>
                    <br>
                    <label class="modal_label">
                        Number of Advanced Questions
                        <input class="modal_inputbox" id="modalInput_noOfAdvanced" type="text" name="modalInputName_noOfAdvanced"><br>
                    </label>
                    <br>
                    <label class="modal_label">
                        Passing Score
                        <input class="modal_inputbox" id="modalInput_passingScore" type="text" name="modalInputName_passingScore"><br>
                    </label>
                    <hr />
                    <div id="modalContainer_coverage">
                        <label class="modal_label">
                            <input class="modal_checkbox" id="modalCB_coverage" type="checkbox" name="modalCBName_coverage">
                            Coverage
                        </label>
                    </div>
                    <hr />
                    <label class="modal_label" id="modalLbl_selectCoverage">
                        Please select your coverage below.
                    </label>
                         <div class="coverage_wrapper" id="modalContainer_selectCoverage">

                        </div>
                    <hr />
                    <label class="modalLbl_errorDisplay" id="modal_errorMessage"></label>
                    <hr />
                </form>
            </div>

            <div class="modal_footer">
                <button  class="btn_modalFooter" id="modalBtn_createNewTest_create" type="submit" name="modalBtnName_createNewTest_create">
                    Create
                </button>
                <button  class="btn_modalFooter" id="modalBtn_createNewTest_cancel" name="modalBtnName_createNewTest_cancel">
                    Cancel
                </button>
            </div>
        </div>
    </div>
<!------------------------------------------------------------------------------------------>
    <!--MODAL - PUBLISH TEST-->
    <div id="container_modalPublishTest" class="modal">
        <div class="modal_content_publishTest">
            <div class="modal_header_publishTest">
                <span class="close_publishTest">&times;</span>
                <h4 class="modal_header_label">Publish Test</h4>
            </div>

            <div class="modal_body">
                <form class="container_TestInfo" method="post">
                    <label class="modal_label">
                        Select Created Test
                        <select class="dropDown" id="modalDrpDown_selectCreatedTest">
                            <option value="Select" class="option">Select</option>
                        </select><br>
                    </label>
                    <hr />
                    <label class="modal_label">
                        Assign to Topic and/or Lesson
                    </label>
                    <br>
                    <label class="modal_label">
                        Topic
                        <select class="dropDown" id="modalDrpDown_selectTopic">
                            <option value="Select" class="option">Select</option>
                            <option value="All" class="option">All</option>
                            <option value="Multiplication" class="option">Multiplication</option>
                            <option value="Division" class="option">Division</option>
                            <option value="Fractions" class="option">Fractions</option>
                        </select><br>
                    </label>
                    <br>
                    <label class="modal_label" id="modalDrpDown_selectLesson">
                        Lesson
                        <select class="dropDown">
                            <option value="Select" class="option">Select</option>
                            <option value="All" class="option">All</option>
                        </select><br>
                    </label>
                    <hr />
                    <label class="modal_label">Assign to Section and/or Student</label><br>
                    <br>
                    <label class="modal_label">
                        Section
                        <select class="dropDown" id="modalDrpDown_selectSection">
                            <option value="Select" class="option">Select</option>
                            <option value="All" class="option">All</option>
                        </select><br>
                    </label>
                    <br>
                    <label class="modal_label">
                        Student
                        <select class="dropDown" id="modalDrpDown_selectStudent">
                            <option value="Select" class="option">Select</option>
                        </select><br>
                    </label>
                    <hr />
                </form>
            </div>

            <div class="modal_footer">
                <button  class="btn_modalFooter" id="modalBtn_publishTest_publish"  name="modalBtnName_publishTest_publish">
                    Publish
                </button>
                <button  class="btn_modalFooter" id="modalBtn_publishTest_cancel" name="modalBtnName_publishTest_cancel">
                    Cancel
                </button>
            </div>
        </div>
     </div>
<!------------------------------------------------------------------------------------------>
    <!--MODAL - ADD QUESTIONS-->
    <div id="container_modalAddQuestion" class="modal">
        <div class="modal_content_addQuestion">
            <div class="modal_header_addQuestion">
                <span class="close_addQuestion">&times;</span>
                <h4 class="modal_header_label">Add Question</h4>
            </div>

            <div class="modal_body">
                <div class="modalDiv_tabContainer">
                    <ul class="tabs">
                        <li class="tab-link current" data-tab="multipleChoice">Multiple Choice</li>
                        <li class="tab-link" data-tab="trueOrFalse">True or False</li>
                        <li class="tab-link" data-tab="fillInTheBox">Fill in the Box</li>
                    </ul>
                    <!------------------------------------------------------------------------------------------------->
                    <!--MODAL MULTIPLE CHOICE TAB-->
                    <div class="tab-content current" id="multipleChoice">
                        <form class="container_TestInfo" method="post">
                            <div class="modalContainer_MC_importCSV" id="modalContainer_MC_importCSV">
                                <label class="modalLbl_description">
                                    Adding a Multiple Choice type of Question.
                                </label>
                                <br>
                                <label class="modal_label">
                                    <input type="checkbox" id="modalCB_MC_importCSV">
                                    <span class="checkmark"></span>
                                    Import CSV File
                                </label><br>
                                <br>
                                <label class="modal_label" id="modalLbl_browseCSV">
                                    Select CSV File
                                    <input type="file" name="file" class="modalbtn_browseFiles" id="modalBtn_choose_csv_file"
                                           value="Select CSV"><br>
                                </label><br>
                                <label class="modal_label">
                                    Select Topic
                                    <select class="dropDown" id="modalDrpDown_MCSelectTopic">
                                        <option value="Multiplication" class="option">Multiplication</option>
                                        <option value="Division" class="option">Division</option>
                                        <option value="Fractions" class="option">Fractions</option>
                                    </select>
                                </label>
                            </div>
                            <hr />
                            <div class="modalContainer_MC_manual" id="modalContainer_MC_manual">
                                <label class="modal_label">
                                    <input type="checkbox" id="modalCB_MC_manual">
                                    <span class="checkmark"></span>
                                    Manual
                                </label>
                                <br>
                                <label class="modal_label" id="modalLbl_browseCSV">
                                    Select Difficulty
                                    <select class=" dropDown" id="modalDrpDown_MCSelectDifficulty">
                                        <option value="Easy" class="option">Easy</option>
                                        <option value="Intermediate" class="option">Intermediate</option>
                                        <option value="Advanced" class="option">Advanced</option>
                                    </select><br>
                                </label>
                                <br>
                                <label class="modal_label">
                                    Select Topic
                                    <select class="dropDown" id="modalDrpDown_MCSelectTopic">
                                        <option value="Multiplication" class="option">Multiplication</option>
                                        <option value="Division" class="option">Division</option>
                                        <option value="Fractions" class="option">Fractions</option>
                                    </select>
                                </label>
                                <hr />
                                <label class="modal_label">
                                    Type your question here. <br>
                                    <textarea class="modal_questionTextArea" id="modal_MCquestionTextArea" name="modalInputName_question" wrap="hard"></textarea>
                                 </label>
                                <br>
                                <label class="modal_label">
                                    Options
                                </label><br>
                                <label class="modal_label">
                                    A.
                                    <input class="modal_inputbox" id="modalInput_MCOptionA" type="text" name="modalInputName_answerA"><br>
                                </label>
                                <label class="modal_label">
                                    B.
                                    <input class="modal_inputbox" id="modalInput_MCOptionB" type="text" name="modalInputName_answerB"><br>
                                </label>
                                <label class="modal_label">
                                    C.
                                    <input class="modal_inputbox" id="modalInput_MCOptionC" type="text" name="modalInputName_answerC"><br>
                                </label>
                                <label class="modal_label">
                                    D.
                                    <input class="modal_inputbox" id="modalInput_MCOptionD" type="text" name="modalInputName_answerD"><br>
                                </label>
                                <hr />
                                <label class="modal_label">
                                    Answer Letter
                                    <input class="modal_inputbox" id="modalInput_MCRealAnswer" type="text" name="modalInputName_realAnswer"><br>
                                </label>
                            </div>
                        </form>
                    </div>
                    <!------------------------------------------------------------------------------------------------->
                    <!--MODAL TRUE OR FALSE TAB-->
                    <div class="tab-content current" id="trueOrFalse">
                        <form class="container_TestInfo" method="post">
                            <div class="modalContainer_TOF_importCSV" id="modalContainer_TOF_importCSV">
                                <label class="modalLbl_description" id="modalLbl_description">
                                    Adding a True or False type of Question.
                                </label>
                                <br>
                                <label class="modal_label">
                                    <input type="checkbox" id="modalCB_TOF_importCSV">
                                    <span class="checkmark"></span>
                                    Import CSV File
                                </label><br>
                                <br>
                                <label class="modal_label" id="modalLbl_browseCSV">
                                    Select CSV File
                                    <input type="file" name="file" class="modalbtn_browseFiles" id="modalBtn_choose_csv_file"
                                           value="Select CSV"><br>
                                </label><br>
                                <label class="modal_label">
                                    Select Topic
                                    <select class="dropDown" id="modalDrpDown_TOFSelectTopic">
                                        <option value="Multiplication" class="option">Multiplication</option>
                                        <option value="Division" class="option">Division</option>
                                        <option value="Fractions" class="option">Fractions</option>
                                    </select>
                                </label>
                            </div>
                            <hr />
                            <div class="modalContainer_TOF_manual" id="modalContainer_TOF_manual">
                                <label class="modal_label">
                                    <input type="checkbox" id="modalCB_TOF_manual">
                                    <span class="checkmark"></span>
                                    Manual
                                </label>
                                <br>
                                <label class="modal_label" id="modalLbl_browseCSV">
                                    Select Difficulty
                                    <select class=" dropDown" id="modalDrpDown_TOFSelectDifficulty">
                                        <option value="Easy" class="option">Easy</option>
                                        <option value="Intermediate" class="option">Intermediate</option>
                                        <option value="Advanced" class="option">Advanced</option>
                                    </select><br>
                                </label>
                                <br>
                                <label class="modal_label">
                                    Select Topic
                                    <select class="dropDown" id="modalDrpDown_TOFSelectTopic">
                                        <option value="Multiplication" class="option">Multiplication</option>
                                        <option value="Division" class="option">Division</option>
                                        <option value="Fractions" class="option">Fractions</option>
                                    </select>
                                </label>
                                <hr />
                                <label class="modal_label">
                                    Type your question here. <br>
                                    <textarea class="modal_questionTextArea" id="modal_TOFQuestionTextArea" name="modalInputName_question" wrap="hard"></textarea>
                                </label>
                                <hr />
                                <label class="modal_label">
                                    Answer
                                    <input class="modal_inputbox" id="modalInput_TOFAnswer" type="text" name="modalInputName_TOFAnswer"><br>
                                </label>
                            </div>
                        </form>
                    </div>
                    <!------------------------------------------------------------------------------------------------->
                    <!--MODAL  FIll IN THE BOX TAB-->
                    <div class="tab-content current" id="fillInTheBox">
                        <form class="container_TestInfo" method="post">
                            <div class="modalContainer_FITB_importCSV" id="modalContainer_FITB_importCSV">
                                <label class="modalLbl_description">
                                    Adding a Fill In The Box type of Question.
                                </label>
                                <br>
                                <label class="modal_label">
                                    <input type="checkbox" id="modalCB_FITB_importCSV">
                                    <span class="checkmark"></span>
                                    Import CSV File
                                </label><br>
                                <br>
                                <label class="modal_label" id="modalLbl_browseCSV">
                                    Select CSV File
                                    <input type="file" name="file" class="modalbtn_browseFiles" id="modalBtn_choose_csv_file"
                                           value="Select CSV"><br>
                                </label><br>
                                <label class="modal_label">
                                    Select Topic
                                    <select class="dropDown" id="modalDrpDown_FITBSelectTopic">
                                        <option value="Multiplication" class="option">Multiplication</option>
                                        <option value="Division" class="option">Division</option>
                                        <option value="Fractions" class="option">Fractions</option>
                                    </select>
                                </label>
                            </div>
                            <hr />
                            <div class="modalContainer_FITB_manual" id="modalContainer_FITB_manual">
                                <label class="modal_label">
                                    <input type="checkbox" id="modalCB_FITB_manual">
                                    <span class="checkmark"></span>
                                    Manual
                                </label>
                                <br>
                                <label class="modal_label" id="modalLbl_browseCSV">
                                    Select Difficulty
                                    <select class=" dropDown" id="modalDrpDown_FITBSelectDifficulty">
                                        <option value="Easy" class="option">Easy</option>
                                        <option value="Intermediate" class="option">Intermediate</option>
                                        <option value="Advanced" class="option">Advanced</option>
                                    </select><br>
                                </label>
                                <br>
                                <label class="modal_label">
                                    Select Topic
                                    <select class="dropDown" id="modalDrpDown_FITBSelectTopic">
                                        <option value="Multiplication" class="option">Multiplication</option>
                                        <option value="Division" class="option">Division</option>
                                        <option value="Fractions" class="option">Fractions</option>
                                    </select>
                                </label>
                                <hr />
                                <label class="modal_label">
                                    Type your question here. <br>
                                    <textarea class="modal_questionTextArea" id="modal_FITBQuestionTextArea" name="modalInputName_question" wrap="hard"></textarea>
                                </label>
                                <hr />
                                <label class="modal_label">
                                    Answer
                                    <input class="modal_inputbox" id="modalInput_FITBAnswer" type="text" name="modalInputName_TOFAnswer"><br>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal_footer">
                <button  class="btn_modalFooter" id="modalBtn_addQuestion_save"  name="modalBtnName_addQuestion_save">
                    Save
                </button>
                <button  class="btn_modalFooter" id="modalBtn_addQuestion_cancel" name="modalBtnName_addQuestion_cancel">
                    Cancel
                </button>
            </div>
        </div>
    </div>
<!------------------------------------------------------------------------------------------>

</div>
<!--END OF MAINWRAPPER-->

 <script>
            var urlb = "js/admin_quizzes.js";
            $.getScript(urlb);
        </script>

</body>
</html>
