<!DOCTYPE html>
<html>
<head>
        <?php  include '../../view/view_navi/navbar.php'; ?>
        <title>Admin | Settings</title>
        <link rel="stylesheet" href="../../css/css_admin/lesson_details.css">
        <link rel="stylesheet" href="../../css/tables.css">
        <link rel="stylesheet" href="../../css/modal.css">
        <link rel="stylesheet" href="../../css/control.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
            <div id="container_modalLessonDetails" class="modal">
            <div class="modal_content_addNewSection">
                <div class="modal_header_addNewSection">
                    <span class="close_addNewSection">&times;</span>
                    <h4 class="modal_header_label">Add New Section</h4>
                </div>

                <div class="modal_body">
                    <form class="container_sectionInfo" action="" method="post">
                        <label class="modal_label">Section Name</label><br>
                        <input class="modal_inputbox" type="text" name="text_sectionName"><br>
                        <br>
                        <label class="modal_label">Teacher</label><br>
                        <select class="dropDown">
                            <option value="Select" class="option">Select</option>
                        </select><br>
                        <hr />
                        <label class="modal_label">Add Students via CSV</label><br>
                        <input type="file" id="browseFiles" class="modalbtn_browseFiles" value="Browse Files" /><br>
                        <hr />
                        <label class="modal_label">Status</label><br>
                        <select class="dropDown">
                            <option value="Active" class="option">Active</option>
                            <option value="Inactive" class="option">Inactive</option>
                        </select><br>
                        <hr/>
                        <br>
                        <br>
                        <br>
                        <br>
                    </form>
                </div>
    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/js_admin/admin_settings.js"></script>
</body>

</html>