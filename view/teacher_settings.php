<?php
require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>RM | Settings</title>
    <link rel="stylesheet" href="css/teacher_settings.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//resources/demos/style.css">
</head>
<body>
<div class="wrapper">
    <div class="tab">
        <button id="Topics" class="tabLinks" onclick="openTab(event, 'wrapperTopics')">
            Topics
        </button>
        <button id="Files" class="tabLinks" onclick="openTab(event, 'wrapperFiles')">
            Files
        </button>
        <button id="Account" class="tabLinks" onclick="openTab(event, 'wrapperAccount')">
            Account
        </button>
    </div>

<!--PAGE - TOPIC TAB-->
    <div class="tabContent" id="wrapperTopics">
        <div class="wrapper_Control">
            <label class="control_label" id="pageLbl_searchTopic">
                Search Topic :
                <input class="searchBox_Topics" id="pageInput_searchTopic" type="text" name="pageInputName_searchTopic">
            </label>
                <i class="fa fa-search" id="pageIcon_searchTopic"></i>
                <i class="fa fa-refresh" id="pageIcon_searchTopic"></i>
            <button onclick="" class="button" id="pageBtn_topicsPreview">
                Preview
            </button>
        </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="table_topic_record">
                <tr>
                    <th>Topic Title</th>
                    <th>Lessons</th>
                    <th>Videos</th>
                    <th>PPT</th>
                    <th>Practice</th>
                    <th>Enrichment</th>
                    <th>Miniquiz</th>
                    <th>Unit Test</th>
                    <th>Pretest</th>
                    <th>Post Test</th>
                    <th>Date Created</th>
                    <th colspan="2">Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--PAGE - FILES TAB-->
    <div class="tabContent" id="wrapperFiles">
        <div class="wrapper_Control">
            <label class="control_label" id ="pageLbl_searchFileName">
                Search Filename :
                <input class="searchBox" id="searchBox_FileName" type="text" name="searchBoxName_FileName">
            </label>
            <i class="fa fa-search" id="pageIcon_searchFile"></i>
            <i class="fa fa-refresh" id="pageIcon_refreshFile"></i>
            <button class="button" id="pageBtn_publishFile">
                Publish File
            </button>
            <button class="button" id="pageBtn_uploadFile">
                Upload File
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_file_record">
                    <tr>
                        <th>File ID</th>
                        <th>File Type</th>
                        <th>File Name</th>
                        <th>Assigned to Section</th>
                        <th>Date Uploaded</th>
                        <th colspan="2">Action</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--MODAL - UPLOAD NEW FILE-->
    <div class="modal" id="container_modalUploadNewFile" >
        <div class="modal_content_uploadFile">
            <div class="modal_header_uploadNewFile">
                <span class="close_uploadFile">&times;</span>
                <h4 class="modal_header_label">Upload File</h4>
            </div>

            <div class="modal_body">
                <form class="container_UserInfo" id="modalForm_uploadFile" action="" method="post">
                    <label class="modal_label" id="modalLbl_fileType">
                        File Type
                        <select class="dropDown" id="modalDrpDown_fileType">
                            <option value="Video" class="option">Video</option>
                            <option value="Powerpoint(PPT)" class="option">Powerpoint(PPT)</option>
                            <option value="PDF" class="option">PDF</option>
                            <option value="Word" class="option">Docx</option>
                            <option value="RAR" class="option">RAR</option>
                        </select><br>
                    </label><br>
                    <br>
                    <label class="modal_label" id="modalLbl_selectFile">
                        Select File
                        <input type="file" id="modalBtn_selectFile" class="modalbtn_browseFiles" value="Browse Files"/><br>
                    </label><br>
                    <hr/>
                    <label class="modal_label" id="modalLbl_fileName">
                        File Name
                        <input class="modal_inputbox" id="modalInput_fileName" type="text" name="modalInputName_fileName" placeholder="Optional"><br>
                    </label><br>
                    <hr/>
                    <label class="modal_label" id="modalLbl_uploadFileStatus">
                        Status
                        <select class="dropDown" id="modalDrpDown_uploadFileStatus">
                            <option value="Active" class="option">Active</option>
                            <option value="Inactive" class="option">Inactive</option>
                        </select><br>
                    </label><br>
                    <hr/>
                </form>
            </div>

            <div class="modal_footer">
                <button class="btn_modalFooter" id="modalBtn_uploadFile_upload" type="submit" name="modalBtnName_uploadFile_upload">
                    Upload
                </button>
                <button class="btn_modalFooter" id="modalBtn_uploadFile_cancel" type="submit" name="modalBtnName_uploadFile_cancel">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    <!----------------------------------------------------------------------------------------------------------->
    <!--MODAL - PUBLISH FILE-->
    <div class="modal" id="container_modalPublishFile" >
        <div class="modal_content_publishFile">
            <div class="modal_header_publishFile">
                <span class="close_publishFile">&times;</span>
                <h4 class="modal_header_label">Publish File</h4>
            </div>
            <br>
            <div class="modal_body">
                <form class="container_UserInfo" id="modalForm_publishFile" action="" method="post">
                    <label class="modal_label" id="modalLbl_fileType">
                        Select Filename
                        <select class="dropDown" id="modalDrpDown_fileName">
                            <option value="Select" class="option">Select</option>
                        </select><br>
                    </label><br>
                    <br>
                    <label class="modal_label" id="modalLbl_assignToSection">
                        Assign to Section
                        <select class="dropDown" id="modalDrpDown_assignToSection">
                            <option value="Select" class="option">Select</option>
                            <option value="Select" class="option">All</option>
                        </select><br>
                    </label><br>
                    <hr/>
                    <label class="modalLbl_errorMessage" id="modalError_publishFile">
                </form>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="modal_footer">
                <button class="btn_modalFooter" id="modalBtn_publishFile_publish"  name="modalBtnName_publishFile_publish">
                    Publish
                </button>
                <button class="btn_modalFooter" id="modalBtn_publishFile_cancel"  name="modalBtnName_publishFile_cancel">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    <!----------------------------------------------------------------------------------------------------------->
    <!--PAGE - ACCOUNT SETTINGS TAB-->
    <div class="tabContent" id="wrapperAccountSettings">

    </div>


</div>
<!--End WRAPPER-->


<script>
    var url = "js/teacher_settings.js";
    $.getScript(url);
</script>
</body>
</html>
