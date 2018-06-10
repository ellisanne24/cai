    <!DOCTYPE html>

    <html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Admin | Settings</title>
        <link rel="stylesheet" href="../css/topic_contents.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>
        <div class="divtop_container" id="divtop_container">
            <div class="container_control" id="container_control">
                <i class="fa fa-arrow-left" id="icon_back"></i>
                <h3 class="content_title">Learn Multiplication</h3>
                <button  class="button" id="btn_remove">
                    Remove
                </button>
                <button  class="button" id="btn_edit" onclick="addNewContent()">
                    Edit
                </button>
                <button  class="button" id="btn_createNewLesson" onclick="createNewLesson()">
                    Create New Lesson
                </button>
            </div>
            <div class="container_contents" id="container_contents">
                <!--Lessons Container-->
                <div class="container_lessons" id="container_lessons">
                    <div class="div_pretest" id="div_pretest">
                        <label class="lbl_pretest" id="lbl_pretest">Start Pretest</label>
                    </div>
                </div>
                <div class="container_media" id="container_media">

                </div>
            </div>
        </div>
        <!--Add New Lesson Modal-->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Create New Lesson</h2>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label class="modal_lbl">Lesson # </label>
                            <input type="text" class="modal_input" name="input_Number"><br>
                            <label class="modal_lbl">Lesson Title </label>
                            <input type="text" class="modal_input" name="input_Title"><br>
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button onclick="addedLesson()" class="modal_btn" id="modal_createBtn">
                            Create
                        </button>
                        <button class="modal_btn">Cancel</button>
                    </div>
                </div>
            </div>

        <!--Add New Content Modal-->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Add New Content</h2>
                </div>
                <div class="modal-body">
                    <button class="modal_tab">Video</button>
                    <button class="modal_tab">Audio</button>
                    <button class="modal_tab">Text</button>
                    <button class="modal_tab">Game</button>
                </div>
                <div class="modal-footer">
                    <button class="modal_btn" id="modal_createBtn">
                        Save
                    </button>
                    <button class="modal_btn">
                        Cancel
                    </button>
                </div>
            </div>
        </div>


    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/topic_contents.js"></script>
    </body>
    </html>