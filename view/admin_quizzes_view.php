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
<div class="wrapper">
    <div class="div_Control_Container">
        <div class = "form_container">
            <label class="control_label">Search Test :</label>
            <input class="searchBox" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_Search"></i>
            <i class="fa fa-refresh" id="btn_Refresh"></i>
            <button onclick="showModalCreateNewTest()" class="button" id="btn_CreateNewTest">
                Create New Test
            </button>
            <button onclick="showModalPublishTest()" class="button" id="btn_PublishTest">
                Publish Test
            </button>
        </div>
    </div>
    <div class="table_wrapper" id="table_wrapper">
        <table>
            <tr>
                <th>Test Name</th>
                <th>Items</th>
                <th>For Topic</th>
                <th>For Lesson</th>
                <th>Test Type</th>
                <th>Passing Score</th>
                <th>Author</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
        </table>
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
                    <label class="modal_label">Select Test</label><br>
                    <select class="dropDown" id="selectTestDropdown">
                        <option value="Select" class="option">Select</option>
                        <option value="Pretest" class="option">Pretest</option>
                        <option value="PostTest" class="option">PostTest</option>
                        <option value="Practice" class="option">Practice</option>
                        <option value="Mini-quiz" class="option">Mini-quiz</option>
                        <option value="Unit Test" class="option">Unit Test</option>
                        <option value="Custom" class="option">Custom</option>
                    </select><br>
                    <br>
                    <label class="modal_label">Test Name</label><br>
                    <input class="modal_inputbox" id="inputTestName" type="text" name="text_testName"><br>
                    <br>
                    <label class="modal_label">Test Type</label><br>
                    <select class="dropDown" id="testTypeDropdown">
                        <option value="Select" class="option">Select</option>
                        <option value="Multiple Choice" class="option">Multiple Choice</option>
                        <option value="Fill in the Box" class="option">Fill in the Box</option>
                    </select><br>
                    <hr />
                    <label class="modal_label">Number of Items</label><br>
                    <input class="modal_inputbox" id="input_itemsNumber" type="text" name="text_noOfItems"><br>
                    <hr />
                    <div id="cb_divContainer">
                    <input class="modal_checkbox" id="cb_difficulty_custom" type="checkbox" name="cBox_difficulty_custom">
                    <label class="modal_label">Custom</label>
                    <input class="modal_checkbox" id="cb_difficulty_easy" type="checkbox" name="cBox_difficulty_easy">
                    <label class="modal_label">All Easy</label>
                    <input class="modal_checkbox" id="cb_difficulty_intermediate" type="checkbox" name="cBox_difficulty_intermediate">
                    <label class="modal_label">All Intermediate</label>
                    <input class="modal_checkbox" id="cb_difficulty_advanced" type="checkbox" name="cBox_difficulty_advanced">
                    <label class="modal_label">All Advanced</label>
                     </div>
                    <hr />
                    <label class="modal_label">Number of Easy Questions</label><br>
                    <input class="modal_inputbox" id="input_easyQ" type="text" name="text_easyQuestions"><br>
                    <br>
                    <label class="modal_label">Number of Intermediate Questions</label><br>
                    <input class="modal_inputbox" id="input_interQ" type="text" name="text_intermediateQuestions"><br>
                    <br>
                    <label class="modal_label">Number of Advanced Questions</label><br>
                    <input class="modal_inputbox" id="input_advancedQ" type="text" name="text_advancedQuestions"><br>
                    <br>
                    <label class="modal_label">Passing Score</label><br>
                    <input class="modal_inputbox" id="input_passingScore" type="text" name="text_passingScore"><br>
                    <hr />
                    <div id="coverage_Container">
                    <input class="modal_checkbox" id="cb_coverage" type="checkbox" name="cBox_coverage">
                    <label class="modal_label">Coverage</label><br>
                    </div>
                    <hr />
                    <label class="modal_label">Please select your coverage below.</label><br>
                         <div class="coverage_wrapper" id="coverage_menu">

                        </div>
                    <hr />
                    <label class="modal_label_errorMessage" id="modal_errorMessage"></label>
                    <hr />
                </form>
            </div>

            <div class="modal_footer">
                <button  class="btn_modalFooter" id="btn_modalCreateNewTest" type="submit" name="btn_create">Create</button>
                <button  class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
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
                    <label class="modal_label">Select Created Test</label><br>
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                    </select><br>
                    <hr />
                    <label class="modal_label">Assign to Topic and/or Lesson</label><br>
                    <br>
                    <label class="modal_label">Topic </label>
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                        <option value="All" class="option">All</option>
                        <option value="Multiplication" class="option">Multiplication</option>
                        <option value="Division" class="option">Division</option>
                        <option value="Fractions" class="option">Fractions</option>
                    </select><br>
                    <br>
                    <label class="modal_label">Lesson </label>
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                        <option value="All" class="option">All</option>
                    </select><br>
                    <hr />
                    <label class="modal_label">Assign to Section and/or Student</label><br>
                    <br>
                    <label class="modal_label">Section </label>
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                        <option value="All" class="option">All</option>
                    </select><br>
                    <br>
                    <label class="modal_label">Student </label>
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                    </select><br>
                    <hr />
                </form>
            </div>


            <div class="modal_footer">
                <button  class="btn_modalFooter" type="submit" name="btn_publish">Publish</button>
                <button  class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
            </div>
</div>


        <script>
            var urlb = "js/admin_quizzes.js";
            $.getScript(urlb);
        </script>

</body>
</html>
