<!DOCTYPE html>
<html>
<head>
    <title>Teacher | Quizzes</title>
    <link rel="stylesheet" href="css/teacher_quiz.css" >
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="mainWrapper" id="mainWrapper">
        <div class="div_Control_Container">
            <div class = "form_container">
                <label class="control_label">Search Test :
                    <input class="searchBox" type="text" name="SearchBox">
                </label>
                <i class="fa fa-search" id="btn_Search"></i>
                <i class="fa fa-refresh" id="btn_Refresh"></i>
                <button onclick="showModalPublishTest()" class="button" id="pageBtn_publishTest">
                    Publish Test
                </button>
                <button onclick="showModalCreateNewTest()" class="button" id="pageBtn_createNewTest">
                    Create New Test
                </button>
            </div>
        </div>
        <div class="table_wrapper" id="table_wrapper">
            <table>
                <tr>
                    <th>Test Name</th>
                    <th>Items</th>
                    <th>Test Type</th>
                    <th>Passing Score</th>
                    <th>Assigned to Section</th>
                    <th>Date Created</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </table>
        </div>
    </div>
    <!--Create New Test Modal-->
    <div id="container_modalCreateNewTest" class="modal">
        <div class="modal_content_newTest">
            <div class="modal_header_newTest">
                <span class="close_createNewTest">&times;</span>
                <h4 class="modal_header_label">Create New Test</h4>
            </div>

            <div class="modal_body">
                <form class="container_UserInfo" id="modal_form" action="" method="post">
                    <label class="modal_label">
                        Test Name
                        <input class="modal_inputbox" id="modalInput_testName" type="text" name="modalInputName_testName"><br>
                    </label><br>
                    <label class="modal_label" id="modalLbl_testStatus">
                        Status
                        <select class="dropDown" id="modalDrpDown_testStatus">
                            <option value="Active" class="option">Active</option>
                            <option value="Inactive" class="option">Inactive</option>
                        </select><br>
                    </label><br>
                    <label class="modal_label">
                        Test Type
                        <select class="dropDown" id="testTypeDropdown">
                            <option value="Select" class="option">Select</option>
                            <option value="Multiple Choice" class="option">Multiple Choice</option>
                            <option value="Fill in the Box" class="option">Fill in the Box</option>
                        </select><br>
                    </label><br>
                    <hr />
                    <label class="modal_label">
                        Number of Items
                        <input class="modal_inputbox" id="input_itemsNumber" type="text" name="text_noOfItems"><br>
                    </label><br>
                    <hr />
                    <div id="cb_divContainer">
                        <label class="modal_label">
                            <input class="modal_checkbox" id="cb_difficulty_custom" type="checkbox" name="cBox_difficulty_easy">
                            Custom
                        </label>
                        <label class="modal_label">
                            <input class="modal_checkbox" id="cb_difficulty_easy" type="checkbox" name="cBox_difficulty_intermediate">
                            All Easy
                        </label>
                        <label class="modal_label">
                            <input class="modal_checkbox" id="cb_difficulty_intermediate" type="checkbox" name="cBox_difficulty_advanced">
                            All Intermediate
                        </label>
                        <label class="modal_label">
                            <input class="modal_checkbox" id="cb_difficulty_advanced" type="checkbox" name="cBox_difficulty_advanced">
                            All Advanced
                        </label>
                    </div>
                    <hr />
                    <label class="modal_label">
                        Number of Easy Questions
                        <input class="modal_inputbox" id="input_easyQ" type="text" name="text_easyQuestions"><br>
                    </label><br>
                    <label class="modal_label">
                        Number of Intermediate Questions
                        <input class="modal_inputbox" id="input_interQ" type="text" name="text_intermediateQuestions"><br>
                    </label><br>
                    <label class="modal_label">
                        Number of Advanced Questions
                        <input class="modal_inputbox" id="input_advancedQ" type="text" name="text_advancedQuestions"><br>
                    </label><br>
                    <label class="modal_label">
                        Passing Score
                        <input class="modal_inputbox" id="input_passingScore" type="text" name="text_passingScore"><br>
                    </label><br>
                    <hr />
                    <div id="coverage_Container">
                        <label class="modal_label">
                            <input class="modal_checkbox" id="cb_coverage" type="checkbox" name="cBox_coverage">
                            Coverage
                        </label><br>
                    </div>
                    <hr />
                    <label class="modal_label">Please select your coverage below.</label><br>
                    <div class="coverage_wrapper" id="coverage_menu">

                    </div>
                    <hr />
                    <label class="modalLbl_errorDisplay" id="modalError_createNewTest"></label>

                </form>
            </div>

            <div class="modal_footer">
                <button  class="btn_modalFooter" id="modalBtn_createNewTest_create" name="modalName_createNewTest_create">
                    Create
                </button>
                <button  class="btn_modalFooter" id="modalBtn_createNewTest_cancel" name="modalName_createNewTest_cancel">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    <!--Publish Test Modal-->
    <div id="container_modalPublishTest" class="modal">
        <div class="modal_content_publishTest">
            <div class="modal_header_publishTest">
                <span class="close_publishTest">&times;</span>
                <h4 class="modal_header_label">Publish Test</h4>
            </div>

            <div class="modal_body">
                <form class="container_TestInfo" action="" method="post">
                    <label class="modal_label">
                        Select Created Test
                        <select class="dropDown" id="modalDrpDown_createdTest">
                            <option value="Select" class="option">Select</option>
                        </select><br>
                    </label><br>
                    <hr />
                    <label class="modal_label">
                        Assign to Section
                        <select class="dropDown" id="modalDrpDown_ATSection">
                            <option value="Select" class="option">Select</option>
                            <option value="All" class="option">All</option>
                        </select><br>
                    </label><br>
                    <hr />
                    <label class="modalLbl_errorDisplay" id="modalError_publishTest"></label>
                </form>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="modal_footer">
                <button  class="btn_modalFooter" id="modalBtn_publishTest_publish" name="modalBtnName_publishTest_publish">
                    Publish
                </button>
                <button  class="btn_modalFooter" id="modalBtn_publishTest_cancel" name="modalBtnName_publishTest_publish">
                    Cancel
                </button>
            </div>
        </div>

        <script>
            var urlb = "js/admin_quizzes.js";
            $.getScript(urlb);
        </script>

        <script>
        var urlb = "js/teacher_quiz.js";
        $.getScript(urlb);
    </script>
</body>
</html>