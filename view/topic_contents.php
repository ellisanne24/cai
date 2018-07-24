    <!DOCTYPE html>

    <html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/topic_contents.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="//resources/demos/style.css">
        <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
    </head>

    <body>
<div class="mainWrapper">
<!--MODAL-TOPIC CONTENTS-->
    <div class="modal" id="container_topicContents">
        <div class="modal_content_topicContents">
            <div class="modal_header_topicContents">
                <span class="close_topicContents">&times;</span>
                <label class="modal_header_label" id="modalLbl_qTitle">Topic Title</label>
            </div>

            <div class="modal_body">
                <div class="container_control">
                    <label class="modal_label" id="modalLbl_studentID">
                        Student ID: 513145
                    </label>
                    <label class="modal_label" id="modalLbl_studentName">
                        Name: Chichai
                    </label>
                    <label class="modal_label" id="modalLbl_studentSection">
                        Section: Narra
                    </label>
                    <label class="modal_label" id="modalLbl_studentsTeacher">
                        Teacher: Ellis, Anne
                    </label>
                    <button class="button" id="modalBtn_addNewLesson">
                        Add New Lesson
                    </button>
                </div>
                <div class="container_lessonsStatsAndMedia">
                    <div class="container_lessons">
                        <button class="modalBtn_topicContents">
                            Pretest
                        </button>
                        <div class="container_lessonAccordion" id="container_lessonAccordion">

                        </div>
                    </div>
                    <div class="container_statsAndMedia">
                        <div class="container_stats">
                            <label class="modalLbl_stat" id="modalLbl_lessonFullTitle">
                                Lesson Full Title
                            </label>
                            <label class="modalLbl_stat" id="modalLbl_completionRawScore">
                                Completion: 0/10
                            </label>
                            <label class="modalLbl_stat" id="modalLbl_completionPercentage">
                                (0%)
                            </label>
                        </div>
                        <div class="container_media">
                            <video class="modalMedia_video" controls>

                            </video>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal_footer" id="modalFooter_numberTracker">

            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------------------------->
    <!--MODAL-ADD NEW LESSON-->
    <div class="modal" id="container_modalAddNewLesson">
    <div class="modal_content_AddNewLesson">
        <div class="modal_header_AddNewLesson">
            <span class="close_addNewLesson">&times;</span>
            <h4 class="modal_header_label">Add New Lesson</h4>
        </div>

        <div class="modal_body">
            <form class="container_lessonInfo" id="modalForm_addNewLesson"  method="post">
                <label class="modal_label" id="modalLbl_selectTopic">
                    Select Topic
                    <select class="dropDown" id="modalDrpDown_createNewLesson_selectTopic">
                        <option value="Select" class="option">Select</option>
                    </select>
                </label>
                <hr />
                <label class="modal_label" id="modalLbl_lessonNumber">
                    Lesson No.
                    <input class="modal_inputbox" id="modalInput_lessonNumber" type="text"
                           name="modalName_lessonNumber"><br>
                </label>
                <br>
                <label class="modal_label" id="modalLbl_lessonTitle">
                    Lesson Title
                    <input class="modal_inputbox" id="modalInput_lessonTitle" type="text" name="modalName_lessonTitle">
                </label>
                <hr/>
                <label class="modal_label" id="modalLbl_lessonStatus">
                    Status
                    <select class="dropDown" id="modalDrpDown_lessonStatus">
                        <option value="Active" class="option">Active</option>
                        <option value="Inactive" class="option">Inactive</option>
                    </select><br>
                </label><br>
                <hr/>
            </form>
        </div>
        <div class="modal_footer">
            <button class="btn_modalFooter" id="modalBtn_addNewLesson_add"
                    name="modalBtnName_addNewLesson_create">
                Add
            </button>
            <button class="btn_modalFooter" id="modalBtn_addNewLesson_cancel"
                    name="modalBtnName_addNewLesson_cancel">
                Cancel
            </button>
        </div>
    </div>
</div>
<!--------------------------------------------------------------------------------------------------------------------------->
</div>
<!---END OF MAIN WRAPPER-------------------------------------------------------------------------------------------->
    <script src="/js/jquery-3.3.1.js"></script>
    <script src="/js/topic_contents.js"></script>
    </body>
    </html>