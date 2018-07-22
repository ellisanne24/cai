<?php
require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin | Settings</title>
    <link rel="stylesheet" href="css/admin_settings.css">
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
<div class="wrapper">

<div class="tab">
    <button id="Topics" class="tabLinks" onclick="openTab(event, 'wrapperTopics')">
        Topics
    </button>
    <button id="Videos" class="tabLinks" onclick="openTab(event, 'wrapperVideos')">
        Videos
    </button>
    <button id="Powerpoint" class="tabLinks" onclick="openTab(event, 'wrapperPPT')">
        Powerpoint
    </button>
    <button id="Enrichment" class="tabLinks" onclick="openTab(event, 'wrapperEnrichment')">
        Enrichment
    </button>
    <button id="Games" class="tabLinks" onclick="openTab(event, 'wrapperGames')">
        Games
    </button>
    <button id="Sections" class="tabLinks" onclick="openTab(event, 'wrapperSections')">
        Sections
    </button>
    <button id="Reviewer" class="tabLinks" onclick="openTab(event, 'wrapperReviewers')">
        Reviewers
    </button>
    <button id="Account" class="tabLinks" onclick="openTab(event, 'wrapperAccount')">
        Account
    </button>
    <button id="SchoolYear" class="tabLinks" onclick="openTab(event, 'wrapperSchoolYear')">
        School Year
    </button>
</div>

<!--PAGE - TOPIC TAB-->
<div class="tabContent" id="wrapperTopics">
    <div class="wrapper_Control">
        <label class="control_label" id="pageLbl_searchTopic">
            Search Topic :
            <input class="searchBox" id="pageInput_searchTopic" type="text" name="pageInputName_searchTopic">
        </label>
        <i class="fa fa-search" id="pageIcon_searchTopic"></i>
        <i class="fa fa-refresh" id="pageIcon_searchTopic"></i>
        <button  class="button" id="pageBtn_topicsPreview">
            Preview
        </button>
        <button class="button" id="pageBtn_uploadContent">
            Upload Content
        </button>
        <button class="button" id="pageBtn_addNewTopic">
            Add New Topic
        </button>
    </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="pageTable_topicRecord">
                <tr>
                    <th>Topic ID</th>
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
<!--MODAL - ADD NEW TOPIC -->
<div class="modal" id="container_modalAddNewTopic">
    <div class="modal_content_addNewTopic">

        <div class="modal_header_addNewTopic">
            <span class="close_addNewTopic">&times;</span>
            <h4 class="modal_header_label">Add New Topic</h4>
        </div>

        <div class="modal_body">
            <form class="container_UserInfo" id="modalForm_addNewTopic" action="" method="post">
                <label class="modal_label" id="modalLbl_addTopicTitle">
                    Topic Title
                    <input class="modal_inputbox" id="modalInput_addTopicTitle" type="text" name="modalInputName_addTopicTitle">
                </label><br>
                <hr/>
                <label class="modal_label" id="modalLbl_addTopicStatus">
                    Status
                    <select class="dropDown" id="modalDrpDown_addTopicStatus">
                        <option value="Active" class="option">Active</option>
                        <option value="Inactive" class="option">Inactive</option>
                    </select><br>
                </label><br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <hr />
                <label class="modalLbl_errorMessage" id="modalLbl_errorDisplay">
                    <!-- Error Container-->
                </label>
            </form>
        </div>

        <div class="modal_footer">
            <button class="btn_modalFooter" id="modalBtn_addNewTopic_add" type="submit" name="modalBtnName_addNewTopic_add">
                Add
            </button>
            <button class="btn_modalFooter" id="modalBtn_addNewTopic_cancel" type="submit" name="modalBtnName_addNewTopic_add">
                Cancel
            </button>
        </div>

    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--MODAL - OPEN TOPIC DETAILS-->
<div class="modal" id="container_modalOpenTopicDetails" >
    <div class="modal_content_openTopicDetails">

        <div class="modal_header_openTopicDetails">
            <span class="close_openTopicDetails">&times;</span>
            <h4 class="modal_header_label">Topic Lessons</h4>
        </div>

        <div class="modal_body">
            <form class="container_topicInfo" id="modalForm_openTopicDetails" action="" method="post">
                <br>
                <label class="modal_label" id="modalLbl_topicTitle">
                    Topic Title
                    <input class="modal_input_custom" id="modalInput_topicTitle" type="text"
                           name="modalInputName_topicTitle">
                </label>
                    <i class="material-icons" id="modalIcon_edit">edit</i>
                    <i class="material-icons" id="modalIcon_save">done</i>
                    <i class="material-icons" id="modalIcon_cancel">highlight_off</i>
                    <br>
                <hr/>
                </form>
                <label class="modal_label_medium" id="modalLbl_lessonsList">Lessons List</label>&emsp; &emsp; &emsp;
                <button class="button" id="modalBtn_addNewLesson" type="submit" name="modalBtnName_addNewLesson">
                    Add New Lesson
                </button>
                <hr/>
                <div class="container_topicInfo" id="container_lessonsTable"> <!--  THIS WILL BE INSERTED START-->
                    <table class="modal_tableLabel" id="table_lessonsRecord">
                        <tr>
                            <th>Lesson No.</th>
                            <th>Lesson Title</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </table>
                 </div><!--  THIS WILL BE INSERTED END-->
                    <hr/>
                    <div class="container_media" id="container_media">
                        <div class="container_lessonMediaTab" id="container_lessonMediaTabs">
                            <button class="tabLinks_Media defaultTab" onclick="openMediaTab(event, 'Video')">
                                Video
                            </button>
                            <button class="tabLinks_Media" onclick="openMediaTab(event, 'PPT')">
                                PPT
                            </button>
                            <button class="tabLinks_Media"  onclick="openMediaTab(event, 'Enrich')">
                                Enrichment
                            </button>
                        </div>

                        <div class="tabContent_Media" id="Video" > <!-- Modal Tab Video Contents-->
                            <h3>Video</h3>
                            <p>Lesson Videos Displayed Here</p>
                        </div>

                        <div class="tabContent_Media" id="PPT" > <!--Modal Tab PPTContents-->
                            <h3>PPT</h3>
                            <p>PPTs Displayed here</p>
                        </div>

                        <div class="tabContent_Media" id="Enrich" > <!--Modal Tab PPTContents-->
                            <h3>Enrichment</h3>
                            <p>Enrichment Displayed here</p>
                        </div>
                </div>
        </div>

        <div class="modal_footer">
            <button class="btn_modalFooter" id="btn_topicDetailsApplyChanges" type="submit" name="btn_applyChanges">
                Apply Changes
            </button>
            <button class="btn_modalFooter" id="btn_topicDetailsCancel" type="submit" name="btn_cancel">
                Cancel
            </button>
        </div>

    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--MODAL - ADD NEW LESSON-->
<div class="modal" id="container_modalAddNewLesson">
    <div class="modal_content_AddNewLesson">
        <div class="modal_header_AddNewLesson">
            <span class="close_addNewLesson">&times;</span>
            <h4 class="modal_header_label">Add New Lesson</h4>
        </div>

        <div class="modal_body">
            <form class="container_lessonInfo" id="modalForm_addNewLesson"  method="post">
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
            <button class="btn_modalFooter" id="modalBtn_addNewLesson_add" type="submit"
                    name="modalBtnName_addNewLesson_add">
                Add
            </button>
            <button class="btn_modalFooter" id="modalBtn_addNewLesson_cancel" type="submit"
                    name="modalBtnName_addNewLesson_cancel">
                Cancel
            </button>
        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--MODAL - UPLOAD NEW CONTENT-->
<div class="modal" id="container_modalUploadContent" >
    <div class="modal_content_uploadContent">
        <div class="modal_header_uploadNewContent">
            <span class="close_uploadContent">&times;</span>
            <h4 class="modal_header_label">Upload Content</h4>
        </div>

        <div class="modal_body">
            <form class="container_UserInfo" id="modalForm_uploadFile" action="" method="post">
                <label class="modal_label" id="modalLbl_fileType">
                    File Type
                    <select class="dropDown" id="modalDrpDown_fileType">
                        <option value="Video" class="option">Video</option>
                        <option value="Powerpoint(PPT)" class="option">Powerpoint(PPT)</option>
                        <option value="Enrichment" class="option">Enrichment</option>
                        <option value="Game" class="option">Game</option>
                    </select><br>
                </label><br>
                <br>
                <label class="modal_label" id="modalLbl_chooseFile">
                    Choose File
                    <input type="file" id="modalBtn_chooseFile" class="modalbtn_browseFiles" value="Browse Files"/><br>
                </label><br>
                <hr/>
                <label class="modal_label" id="modalLbl_fileName">
                    File Name
                    <input class="modal_inputbox" id="modalInput_fileName" type="text" name="modalInputName_fileName" placeholder="Optional"><br>
                </label><br>
                <br>
                <label class="modal_label" id="modalLbl_assignToTopic">
                    Assign to Topic
                    <select class="dropDown" id="modalDrpDown_assignToTopic"></select><br>
                </label><br>
                <br>
                <label class="modal_label" id="modalLbl_assignToLesson">
                    Assign to Lesson
                    <select class="dropDown" id="modalDrpDown_assignToLesson">
                        <option value="Multiplication:Lesson 1" class="option">Multiplication:Lesson 1</option>
                        <option value="Multiplication:Lesson 2" class="option">Multiplication:Lesson 2</option>
                        <option value="Multiplication:Lesson 3" class="option">Multiplication:Lesson 3</option>
                        <option value="Multiplication:Lesson 4" class="option">Multiplication:Lesson 4</option>
                        <option value="Multiplication:Lesson 5" class="option">Multiplication:Lesson 5</option>
                        <option value="Multiplication:Lesson 6" class="option">Multiplication:Lesson 6</option>
                        <option value="Multiplication:Lesson 7" class="option">Multiplication:Lesson 7</option>
                        <option value="Multiplication:Lesson 8" class="option">Multiplication:Lesson 8</option>
                        <option value="Multiplication:Lesson 9" class="option">Multiplication:Lesson 9</option>
                        <option value="Multiplication:Lesson 10" class="option">Multiplication:Lesson 10</option>
                        <option value="Division:Lesson 1" class="option">Division:Lesson 1</option>
                        <option value="Division:Lesson 2" class="option">Division:Lesson2</option>
                        <option value="Division:Lesson 3" class="option">Division:Lesson 3</option>
                        <option value="Division:Lesson 4" class="option">Division:Lesson 4</option>
                        <option value="Division:Lesson 5" class="option">Division:Lesson 5</option>
                        <option value="Division:Lesson 6" class="option">Division:Lesson 6</option>
                        <option value="Division:Lesson 7" class="option">Division:Lesson 7</option>
                        <option value="Division:Lesson 8" class="option">Division:Lesson 8</option>
                        <option value="Fractions:Lesson 1" class="option">Fractions:Lesson 1</option>
                        <option value="Fractions:Lesson 2" class="option">Fractions:Lesson 2</option>
                        <option value="Fractions:Lesson 3" class="option">Fractions:Lesson 3</option>
                        <option value="Fractions:Lesson 4" class="option">Fractions:Lesson 4</option>
                    </select><br>
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
<!--PAGE - VIDEO TAB-->
<div class="tabContent" id="wrapperVideos">
    <div class="wrapper_Control">
        <label class="control_label" id ="pageLbl_searchVideo">
            Search Video :
            <input class="searchBox" id="pageInput_searchVideo" type="text" name="searchBoxName_Video">
        </label>
        <i class="fa fa-search" id="pageIcon_searchVideo"></i>
        <i class="fa fa-refresh" id="pageIcon_refreshTopic"></i>
        <button class="button" id="pageBtn_publishVideo">
            Publish Video
        </button>
        <button class="button" id="pageBtn_uploadVideo">
            Upload Video
        </button>
    </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="pageTable_videoRecord">
                <tr>
                    <th>Video ID</th>
                    <th>Video Title</th>
                    <th>Category</th>
                    <th>Pin on Topic</th>
                    <th>Pin on Lesson</th>
                    <th>Views</th>
                    <th>Date Uploaded</th>
                    <th colspan="2">Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--MODAL - UPLOAD NEW VIDEO-->
    <div class="modal" id="container_modalUploadVideo">
        <div class="modal_content_uploadVideo">
            <div class="modal_header_uploadNewVideo">
                <span class="close_uploadVideo">&times;</span>
                <h4 class="modal_header_label">Upload New Video</h4>
            </div>

            <div class="modal_body">
                <form class="container_UserInfo" id="modalForm_uploadVideo"
                      enctype="multipart/form-data" method="post">
                    <label class="modal_label" id="modalLbl_fileNote">
                        Note : Video file must be in (.mp4) format.
                    </label>
                    <hr/>
                    <label class="modal_label" id="modalLbl_videoCategory">
                        Category
                        <select class="dropDown" id="modalDrpDown_selectVideoCategory">
                            <option value="Standard" class="option">Standard</option>
                            <option value="Video File" class="option">Custom</option>
                        </select>
                    </label>
                    <hr />
                    <label class="modal_label" id="modalCB_url">
                        <input type="checkbox" id="modalInputCB_pasteUrl">
                        <span class="checkmark"></span>
                        URL
                    </label><br>
                    <label class="modal_label" id="modalLbl_youtubeUrlTitle">
                        Youtube Video Title
                        <input type="text" id="youtube_video_title" class="modal_inputbox" />
                    </label>
                    <label class="modal_label" id="modalLbl_pasteURL">
                        Paste Url here
                        <input type="text" class="modal_inputbox" id="modalInput_pasteURL"/><br>
                    </label><br>
                    <label class="modal_label" id="modalCB_uploadFrmGallery">
                        <input type="checkbox" id="modalInputCB_uploadFrmGallery">
                        <span class="checkmark"></span>
                        Upload from Gallery
                    </label><br>
                    <label class="modal_label" id="modalLbl_browseVideo">
                        Select Video
                        <input type="file" name="file" class="modalbtn_browseFiles" id="modalBtn_choose_video_file"
                               value="Select Video" accept="video/*"/><br>
                    </label>
                    <hr/>
                    <label class="modal_label" id="modalLbl_renameVideo">
                        <input type="checkbox" id="modalInputCB_renameVideo">
                        <span class="checkmark"></span>
                        Video Title
                        <input class="modal_inputbox" id="modalInput_renameVideo" type="text"
                               name="modalInputName_renameVideo" placeholder="Enter video title for selected video file"><br>
                    </label>
                    <hr/>
                    <label class="modal_label" id="modalLbl_videoPreview">
                        File Preview
                    </label>

                    <div class="modalContainer_filePreview" id="modalContainer_videoPreview"></div>
                    <hr/>
                    <label class="modalLbl_errorMessage" id="modalLbl_uploadVideoError">
                        <!-- Error Container-->
                    </label>
                    <label class="modalLbl_successMessage" id="modalLbl_uploadVideoSuccess">
                        <!-- Success Message Container-->
                    </label>

                    <div class="modal_footer">
                        <button class="btn_modalFooter" id="modalBtn_uploadVideo_upload"
                                name="modalBtnName_uploadVideo_upload">
                            Upload
                        </button>
                        <button class="btn_modalFooter" id="modalBtn_uploadVideo_cancel"
                                name="modalBtnName_uploadVideo_cancel">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
<!--MODAL - PUBLISH VIDEO-->
    <div class="modal" id="container_modalPublishVideo">
    <div class="modal_content_publishVideo">
        <div class="modal_header_publishVideo">
            <span class="close_publishVideo">&times;</span>
            <h4 class="modal_header_label">Publish Video</h4>
        </div>

        <div class="modal_body">
            <form class="container_UserInfo" id="modalForm_publishVideo">
                <label class="modalLbl_note" id="modalLbl_fileNote">
                    Custom - Videos that are uploaded by Teachers. Can be downloaded by students only.<br>
                    Standard - Videos that are uploaded for CAI's use only.
                </label>
                <hr/>
                <label class="modal_label" id="modalLbl_selectVideo">
                    Select Video
                    <select class="dropDown" id="modalDrpDown_selectVideo">
                        <option value="Select" class="option">Select</option>
                    </select><br>
                </label>
                <br>
                <label class="modal_label" id="modalLbl_videoCategory">
                    Category:
                </label>
                <hr />
                <div class="modalDiv_pinOnTopicContainer" id="modalDiv_pinOnTopicContainer">
                    <label class="modal_label">
                        Pin on Topic
                        <select class="dropDown" id="modalDrpDown_pinOnTopic">
                            <option value="Select" class="option">Select</option>
                        </select>
                    </label><br>
                    <br>
                    <label class="modal_label">
                        Pin on Lesson
                        <select class="dropDown" id="modalDrpDown_pinOnLesson">
                            <option value="Select" class="option">Select</option>
                        </select>
                    </label>
                </div>
                <hr />
                <div class="modalDiv_pinOnSectionContainer" id="modalDiv_pinOnSectionContainer">
                    <label class="modal_label">
                        Assign to Section
                        <select class="dropDown" id="modalDrpDown_assignToSection">
                            <option value="Select" class="option">Select</option>
                        </select>
                    </label>
                </div>
                <hr />
                <label class="modalLbl_successMessage" id="modalLbl_publishVideoSuccess">
                    <!-- Success Message Container-->
                </label>

                <div class="modal_footer">
                    <button class="btn_modalFooter" id="modalBtn_publishVideo_publish"
                            name="modalBtnName_publishVideo_publish">
                        Publish
                    </button>
                    <button class="btn_modalFooter" id="modalBtn_publishVideo_cancel"
                            name="modalBtnName_publishVideo_cancel">
                        Cancel
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--PAGE - PPT TAB-->
<div class="tabContent" id="wrapperPPT">
    <div class="wrapper_Control">
        <label class="control_label" id="pageLbl_searchPPT">
            Search Powerpoint :
            <input class="searchBox" id="pageInput_searchPPT" type="text" name="pageInputName_searchPPT">
        </label>
        <i class="fa fa-search" id="pageBtn_searchPPT"></i>
        <i class="fa fa-refresh" id="pageBtn_refreshPPT"></i>
        <button class="button" id="pageBtn_publishPPT">
            Publish PPT
        </button>
        <button class="button" id="pageBtn_uploadPPT">
            Upload PPT
        </button>
    </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="pageTable_pptRecord">
                <tr>
                    <th>PPT ID</th>
                    <th>PPT Title</th>
                    <th>Category</th>
                    <th>Pin on Topic</th>
                    <th>Pin on Lesson</th>
                    <th>Views</th>
                    <th>Date Uploaded</th>
                    <th colspan="2">Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<!--MODAL - UPLOAD PPT-->
<div class="modal" id="container_modalUploadPPT">
    <div class="modal_content_uploadPPT">
        <div class="modal_header_uploadPPT">
            <span class="close_uploadPPT">&times;</span>
            <h4 class="modal_header_label">Upload New PPT</h4>
        </div>

        <div class="modal_body">
            <form class="container_UserInfo" id="modalForm_uploadPPT" method="post">
                <label class="modal_label" id="modalLbl_pptCategory">
                    Category
                    <select class="dropDown" id="modalDrpDown_selectPPTCategory">
                        <option value="Standard" class="option">Standard</option>
                        <option value="Video File" class="option">Custom</option>
                    </select>
                </label>
                <hr />
                <label class="modal_label" id="modalLbl_browsePPT">
                    <input type="file" name="file" class="modalbtn_browseFiles" id="modalBtn_choose_ppt_file"
                           value="Browse File" accept="ppt/*"/><br>
                </label>
                <hr/>
                <label class="modal_label" id="modalLbl_renamePPT">
                    <input type="checkbox" id="modalInputCB_renamePPT">
                    <span class="checkmark"></span>
                    Powerpoint Presentation Title
                    <input class="modal_inputbox" id="modalInput_renamePPT" type="text"
                           name="modalInputName_renamePPT" placeholder="Enter title for selected PPT file"><br>
                </label>
                <hr/>
                <label class="modal_label" id="modalLbl_PPTPreview">
                    File Preview
                </label>

                <div class="modalContainer_filePreview" id="modalContainer_PPTPreview"></div>
                <hr/>
                <label class="modalLbl_errorMessage" id="modalLbl_uploadPPTError">
                    <!-- Error Container-->
                </label>
                <label class="modalLbl_successMessage" id="modalLbl_uploadPPTSuccess">
                    <!-- Success Message Container-->
                </label>

                <div class="modal_footer">
                    <button class="btn_modalFooter" id="modalBtn_uploadPPT_upload"
                            name="modalBtnName_uploadPPT_upload">
                        Upload
                    </button>
                    <button class="btn_modalFooter" id="modalBtn_uploadPPT_cancel"
                            name="modalBtnName_uploadPPT_cancel">
                        Cancel
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
<!--MODAL - PUBLISH POWERPOINT-->
<div class="modal" id="container_modalPublishPPT">
    <div class="modal_content_publishPPT">
        <div class="modal_header_publishPPT">
            <span class="close_publishPPT">&times;</span>
            <h4 class="modal_header_label">Publish Powerpoint Presentation</h4>
        </div>

        <div class="modal_body">
            <form class="container_UserInfo" id="modalForm_publishPPT">
                <label class="modal_label" id="modalLbl_selectPPT">
                    Select PPT
                    <select class="dropDown" id="modalDrpDown_selectPPT">
                        <option value="Select" class="option">Select</option>
                    </select><br>
                </label>
                <br>
                <label class="modal_label" id="modalLbl_PPTCategory">
                    Category:
                </label>
                <hr />
                <div class="modalDiv_pinOnTopicContainer" id="modalDiv_pinPPTOnTopicContainer">
                    <label class="modal_label">
                        Pin on Topic
                        <select class="dropDown" id="modalDrpDown_pinPPTOnTopic">
                            <option value="Select" class="option">Select</option>
                        </select>
                    </label><br>
                    <br>
                    <label class="modal_label">
                        Pin on Lesson
                        <select class="dropDown" id="modalDrpDown_pinPPTOnLesson">
                            <option value="Select" class="option">Select</option>
                        </select>
                    </label>
                </div>
                <hr />
                <div class="modalDiv_pinOnSectionContainer" id="modalDiv_pinPPTOnSectionContainer">
                    <label class="modal_label">
                        Assign to Section
                        <select class="dropDown" id="modalDrpDown_assignPPTToSection">
                            <option value="Select" class="option">Select</option>
                        </select>
                    </label>
                </div>
                <hr />
                <label class="modalLbl_successMessage" id="modalLbl_publishPPTSuccess">
                    <!-- Success Message Container-->
                </label>

                <div class="modal_footer">
                    <button class="btn_modalFooter" id="modalBtn_publishPPT_publish"
                            name="modalBtnName_publishPPT_publish">
                        Publish
                    </button>
                    <button class="btn_modalFooter" id="modalBtn_publishPPT_cancel"
                            name="modalBtnName_publishPPT_cancel">
                        Cancel
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--Start Contents for Enrichment-->
<div class="tabContent" id="wrapperEnrichment">
    <div class="wrapper_Control">
        <label class="control_label">
            Search Enrichment :
            <input class="searchBox" id="pageInput_searchEnrichment" type="text" name="pageInputName_searchEnrichment">
        </label>
        <i class="fa fa-search" id="btn_SearchEnrichment"></i>
        <i class="fa fa-refresh" id="btn_RefreshEnrichment"></i>
        <button onclick="" class="button" id="btn_publishEnrichment">
            Publish Enrichment
        </button>
        <button onclick="" class="button" id="btn_uploadEnrichment">
            Upload Enrichment
        </button>
    </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="pageTable_enrichmentRecord">
                <tr>
                    <th>ID</th>
                    <th>Enrichment Title</th>
                    <th>Pin on Topic</th>
                    <th>Pin on Lesson</th>
                    <th>Views</th>
                    <th>Date Uploaded</th>
                    <th colspan="2">Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--Start Contents for Games-->
<div id="wrapperGames" class="tabContent">
    <div class="wrapper_Control">
        <label class="control_label">
            Search Game :
            <input class="searchBox" id="pageInput_searchGame" type="text" name="pageInputName_searchGame">
        </label>
        <i class="fa fa-search" id="pageBtn_SearchGame"></i>
        <i class="fa fa-refresh" id="pageBtn_RefreshGame"></i>
        <button class="button" id="pageBtn_assignGame">
            Assign Game
        </button>
        <button onclick="" class="button" id="btn_uploadGame">
            Upload Game
        </button>
    </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="pageTable_gameRecord">
                <tr>
                    <th>Game ID</th>
                    <th>Game Title</th>
                    <th>Pin on Topic</th>
                    <th>Played</th>
                    <th>Date Uploaded</th>
                    <th colspan="2">Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<!--Start Contents for Sections -->
<div id="wrapperSections" class="tabContent">
    <div class="wrapper_Control">
        <label class="control_label">
            Search Section :
            <input class="searchBox" id="pageInput_searchSection" type="text" name="pageInputName_searchSection">
        </label>
        <i class="fa fa-search" id="btn_SearchSection"></i>
        <i class="fa fa-refresh" id="btn_RefreshSection"></i>
        <button onclick="" class="button" id="btn_ViewSectionDetails">
            Section Details
        </button>
        <button  class="button" id="pageBtn_transfer">
            Transfer
        </button>
        <button  class="button" id="pageBtn_addNewSection">
            Add New Section
        </button>
    </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="pageTable_sectionRecord">
                <tr>
                    <th>Section ID</th>
                    <th>Section Name</th>
                    <th>Total Students</th>
                    <th>Teacher</th>
                    <th colspan="2">Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- Add New Section Modal-->
<div id="container_modalAddNewSection" class="modal">
    <div class="modal_content_addNewSection">
        <div class="modal_header_addNewSection">
            <span class="close_addNewSection">&times;</span>
            <h4 class="modal_header_label">Add New Section</h4>
        </div>

        <div class="modal_body">
            <form class="container_sectionInfo"  method="post">
                <label class="modalLbl_note">
                    Note: Teacher must be enrolled in the system, or exist in the (.csv) file to successfully add Section.
                </label>
                <hr />
                <label class="modal_label">
                    Section Name
                    <input class="modal_inputbox" id="modalInput_addSectionTitle" type="text" name="modalInputName_addSectionTitle"><br>
                </label>
                <br>
                <label class="modal_label">
                    Teacher
                    <select class="dropDown" id="modalDrpDown_selectSectionTeacher">
                        <option value="Select" class="option">Select</option>
                    </select><br>
                </label>
                <hr/>
                <label class="modal_label">Add Students via CSV</label><br>
                <input type="file" id="browseFiles" class="modalbtn_browseFiles" value="Browse Files"/><br>
                <hr/>
                <label class="modal_label">
                    Status
                    <select class="dropDown" id="modalDrpDown_sectionStatus">
                        <option value="Active" class="option">Active</option>
                        <option value="Inactive" class="option">Inactive</option>
                    </select><br>
                </label><br>
                <hr/>
            </form>
        </div>

        <div class="modal_footer">
            <button class="btn_modalFooter" id="modalBtn_addNewSection_add"  name="modalBtnName_addNewSection_add">
                Add
            </button>
            <button class="btn_modalFooter" id="modalBtn_addNewSection_cancel" name="modalBtnName_addNewSection_cancel">
                Cancel
            </button>
        </div>
    </div>
</div>
<!--------------------------------------------------------------------------------------------------------->
<!--StartTransferModal-->
<div id="container_modalTransfer" class="modal">
    <div class="modal_content_transfer">
        <div class="modal_header_transfer">
            <span class="close_transfer">&times;</span>
            <h4 class="modal_header_label">Transfer a Student</h4>
        </div>

        <div class="modal_body">
            <form class="container_trabsferInfo" action="" method="post">
                <label class="modal_label">
                    Transfer From
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                    </select><br>
                </label><br>
                <br>
                <label class="modal_label">
                    Transfer To
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                    </select><br>
                </label><br>
                <hr/>
                <div class="div_tableWrapper" id="div_tableWrapper">
                    <div class="div_table1Container" id="div_table1Container">
                        <label class="modal_tableLabel">Students List</label><br>
                        <table class="table1">
                            <tr>
                                <th>Student ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>M.I.</th>
                            </tr>
                        </table>
                    </div>
                    <div class="div_arrowsContainer" id="div_arrowsContainer">
                        <button class="arrowRight"></button>
                        <button class="arrowLeft"></button>
                    </div>
                    <div class="div_table2Container" id="div_table2Container">
                        <label class="modal_tableLabel">Students List</label><br>
                        <table class="table2">
                            <tr>
                                <th>Student ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>M.I.</th>
                            </tr>
                            <tr>
                                <td>20393</td>
                                <td>Ellis</td>
                                <td>Anne</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr/>
            </form>
        </div>

        <div class="modal_footer">
            <button class="btn_modalFooter" id="modalBtn_transfer_save"  name="modalBtnName_transfer_save">
                Save
            </button>
            <button class="btn_modalFooter" id="modalBtn_transfer_cancel" name="modalBtnName_transfer_cancel">
                Cancel
            </button>
        </div>
    </div>
</div>
<!--------------------------------------------------------------------------------------------------------->
<!--Start Contents for Reviewers -->
<div id="wrapperReviewers" class="tabContent">
    <div class="wrapper_Control">
        <label class="control_label">
            Find Reviewer :
            <input class="searchBox" id="pageInput_searchReviewer" type="text" name="pageInputName_searchReviewer">
        </label>
        <i class="fa fa-search" id="pageBtn_searchReviewer"></i>
        <i class="fa fa-refresh" id="pageBtn_refreshReviewer"></i>
        <button  class="button" id="pageBtn_publishReviewer">
            Publish Reviewer
        </button>
        <button  class="button" id="pageBtn_createNewReviewer">
            Create New Reviewer
        </button>
    </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="pageTable_reviewerRecord">
                <tr>
                    <th>Reviewer ID</th>
                    <th>Reviewer Title</th>
                    <th>Date Created</th>
                    <th colspan="2">Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- Create new reviewer modal-->
<div id="container_modalCreateNewReviewer" class="modal">
    <div class="modal_content_createNewReviewer">
        <div class="modal_header_createNewReviewer">
            <span class="close_createNewReviewer">&times;</span>
            <h4 class="modal_header_label">Create New Reviewer</h4>
        </div>

        <div class="modal_body">
            <form class="container_sectionInfo" action="" method="post">
                <label class="modal_label">
                    Kindly Select a Topic
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                        <option value="Multiplication" class="option">Multiplication</option>
                        <option value="Division" class="option">Division</option>
                        <option value="Fractions" class="option">Fractions</option>
                    </select><br>
                </label><br>
                <hr/>
                <label class="modal_label">
                    Number of Items
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                        <option value="30" class="option">30</option>
                        <option value="50" class="option">50</option>
                        <option value="100" class="option">100</option>
                        <option value="150" class="option">150</option>
                    </select><br>
                </label><br>
                <hr/>
                <label class="modal_label">
                    <select class="dropDown">
                        <option value="Multiple Choice" class="option">Multiple Choice</option>
                        <option value="Fill in the Box" class="option">Fill in the Box</option>
                        <option value="Mixed" class="option">Mixed</option>
                    </select><br>
                    Select Question Type
                </label><br>
                <hr/>
                <label class="checkbox_Container">Random
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <button class="button" id="btn_pickQuestions">Pick Questions</button>
                <hr/>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </form>
        </div>

        <div class="modal_footer">
            <button class="btn_modalFooter" type="submit" name="btn_create">Create</button>
            <button class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
        </div>
    </div>
</div>
<!--End Contents for Reviewers -->
<!--Start Contents for  SchoolYear-->
<div id="wrapperSchoolYear" class="tabContent">
    <div class="wrapper_Control">
        <label class="control_label">
            Find School Year :
            <input class="searchBox" id="pageInput_searchSY" type="text" name="pageInputName_searchSY">
        </label>
        <i class="fa fa-search" id="pageBtn_searchSY"></i>
        <i class="fa fa-refresh" id="pageBtn_refreshSY"></i>
        <button class="button" id="pageBtn_createNewSY">
            Create New School Year
        </button>
    </div>
    <div class="wrapper_ContentDetails">
        <div class="table_wrapper" id="table_wrapper">
            <table id="pageTable_syRecord">
                <tr>
                    <th>School Year</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- MODAL - CREATE NEW SCHOOL YEAR-->
<div class="modal" id="container_modalCreateNewSY" >
    <div class="modal_content_createNewSY">

        <div class="modal_header_createNewSY">
            <span class="close_createNewSY">&times;</span>
            <h4 class="modal_header_label">Create New School Year</h4>
        </div>

        <div class="modal_body">
            <form class="container_sectionInfo" id="modalForm_createNewSY" action="" method="post">
                <label class="modal_label" id="modalLbl_yearFrom">
                    Year From
                    <input class="modal_inputbox" id="modalInput_yearfrom" type="text" name="modalInputName_yearfrom"><br>
                </label>
                <br>
                <label class="modal_label" id="modalLbl_yearTo">
                    Year To
                    <input class="modal_inputbox" id="modalInput_yearTo" type="text" name="modalInputName_yearTo">
                </label>
                <hr/>
                <label class="modal_label" id="modalLbl_startDate">
                    Start Date
                    <input class="datepicker" id="modalInput_startDate" type="text"><br>
                </label><br>
                <br>
                <label class="modal_label" id="modalLbl_endDate">
                    End Date
                    <input  class="datepicker" id="modalInput_endDate" type="text"><br>
                </label><br>
                <hr/>
                <label class="modal_label" id="modalLbl_SYStatus">
                    Status
                    <select class="dropDown" id="modalDrpDown_SYStatus">
                        <option value="Active" class="option">Active</option>
                        <option value="Inactive" class="option">Inactive</option>
                    </select><br>
                </label><br>
                <hr/>
            </form>
        </div>

        <div class="modal_footer">
            <button class="btn_modalFooter" id="modalBtn_createSY_create" type="submit" name="modalBtnName_createSY_create">
                Create
            </button>
            <button class="btn_modalFooter" id="modalBtn_createSY_cancel" type="submit" name="modalBtnName_createSY_cancel">
                Cancel
            </button>
        </div>

    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->


</div>
<!--End WRAPPER-->

<script>
    var url1 = "js/admin_settings.js";
    $.getScript(url1);
</script>

</body>
</html>