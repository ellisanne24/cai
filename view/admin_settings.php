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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//resources/demos/style.css">
</head>

<body>
<div class="wrapper">
    <div class="tab">
        <button id="Topics" class="tabLinks" onclick="openTab(event, 'wrapperTopics')">
            Topics
        </button>
        <button id="Enrichment" class="tabLinks" onclick="openTab(event, 'wrapperEnrichment')">
            Enrichment
        </button>
        <button id="Videos" class="tabLinks" onclick="openTab(event, 'wrapperVideos')">
            Videos
        </button>
        <button id="Powerpoint" class="tabLinks" onclick="openTab(event, 'wrapperPPT')">
            Powerpoint
        </button>
        <button id="Games" class="tabLinks" onclick="openTab(event, 'wrapperGames')">
            Games
        </button>
        <button id="Sections" class="tabLinks" onclick="openTab(event, 'wrapperSections')">
            Sections
        </button>
        <button id="Announcements" class="tabLinks" onclick="openTab(event, 'wrapperAnnouncements')">
            Announcements
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

<!--Start Contents for Topics-->
    <div id="wrapperTopics" class="tabContent">
        <div class="wrapper_Control">
                <label class="control_label">Search Topic :</label>
                <input class="searchBox_Topics" type="text" name="SearchBox">
                <i class="fa fa-search" id="btn_Searchtopic"></i>
                <i class="fa fa-refresh" id="btn_RefreshTopic"></i>
                <button onclick="" class="button" id="btn_Preview">
                    Preview
                </button>
                <button onclick="showModal_uploadContent()" class="button" id="btn_Upload">
                    Upload Content
                </button>
            <button onclick="showModal_addNewTopic()" class="button" id="btn_addNewTopic">
                    Add New Topic
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_topic_record">
                    <tr>
                        <th>Topic ID</th>
                        <th>Topic Title</th>
<!--                        <th>Lessons</th>-->
<!--                        <th>Videos</th>-->
<!--                        <th>PPT</th>-->
<!--                        <th>Practice</th>-->
<!--                        <th>Enrichment</th>-->
<!--                        <th>Miniquiz</th>-->
<!--                        <th>Unit Test</th>-->
<!--                        <th>Pretest</th>-->
<!--                        <th>Post Test</th>-->
<!--                        <th>Date Created</th>-->
<!--                        <th colspan="2">Action</th>-->
                    </tr>
                </table>
            </div>
        </div>
    </div>
<!--Start Contents for Videos-->
    <div class="tabContent" id="wrapperVideos">
        <div class="wrapper_Control">
            <label class="control_label">Search Video :</label>
            <input class="searchBox" id="searchBox_video" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_SearchVideo"></i>
            <i class="fa fa-refresh" id="btn_RefreshVideo"></i>
            <button onclick="" class="button" id="btn_uploadVideo">
                Upload Video
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_video_record">
                    <tr>
                        <th>Video ID</th>
                        <th>Video Title</th>
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
<!--End Contents for Videos-->
<!--Start Contents for Powerpoint-->
    <div class="tabContent" id="wrapperPPT">
        <div class="wrapper_Control">
            <label class="control_label">Search Powerpoint :</label>
            <input class="searchBox" id="searchBox_PPT" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_SearchPPT"></i>
            <i class="fa fa-refresh" id="btn_RefreshPPT"></i>
            <button onclick="" class="button" id="btn_UploadPPT">
                Upload Powerpoint
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_ppt_record">
                    <tr>
                        <th>PPT ID</th>
                        <th>PPT Title</th>
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
<!-- End Contents for Powerpoint-->
<!--Upload New Content Modal-->
        <div id="container_modalUploadContent" class="modal">
            <div class="modal_content_uploadContent">
                <div class="modal_header_uploadNewContent">
                    <span class="close_uploadContent">&times;</span>
                    <h4 class="modal_header_label">Upload Content</h4>
                </div>

                <div class="modal_body">
                    <form class="container_UserInfo" action="" method="post">
                        <label class="modal_label">Content Type</label><br>
                        <select class="dropDown">
                            <option value="Video" class="option">Video</option>
                            <option value="Powerpoint(PPT)" class="option">Powerpoint(PPT)</option>
                            <option value="Enrichment" class="option">Enrichment</option>
                            <option value="Game" class="option">Game</option>
                        </select><br>
                        <br>
                        <label class="modal_label">Choose File</label><br>
                        <input type="file" id="browse_Files" class="modalbtn_browseFiles" value="Browse Files" /><br>
                        <hr />
                        <label class="modal_label">Title</label><br>
                        <input class="modal_inputbox" type="text" name="text_contentTitle"><br>
                        <br>
                        <label class="modal_label">Assign to Topic</label><br>
                        <select class="dropDown">
                            <option value="Multiplication" class="option">Multiplication</option>
                            <option value="Division" class="option">Division</option>
                            <option value="Fractions" class="option">Fractions</option>
                        </select><br>
                        <br>
                        <label class="modal_label">Assign to Lesson</label><br>
                        <select class="dropDown">
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
                        <hr />
                        <label class="modal_label">Status</label><br>
                        <select class="dropDown">
                            <option value="Active" class="option">Active</option>
                            <option value="Inactive" class="option">Inactive</option>
                        </select><br>
                        <hr />
                    </form>
                </div>

                <div class="modal_footer">
                    <button  class="btn_modalFooter" type="submit" name="btn_save">Upload</button>
                    <button  class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
                </div>
            </div>
        </div>
<!--Add New Topic Modal -->
        <div id="container_modalAddNewTopic" class="modal">
            <div class="modal_content_addNewTopic">
                <div class="modal_header_addNewTopic">
                    <span class="close_addNewTopic">&times;</span>
                    <h4 class="modal_header_label">Add New Topic</h4>
                </div>

                <div class="modal_body">
                    <form class="container_UserInfo" action="" method="post">
                        <label class="modal_label">Topic Title</label><br>
                        <input class="modal_inputbox" id="input_topicTitle" type="text" name="text_topicTitle">
                        <hr />
                        <label class="modal_label">Status</label><br>
                        <select class="dropDown" id="dropDown_topicStatus">
                            <option value="Active" class="option">Active</option>
                            <option value="Inactive" class="option">Inactive</option>
                        </select><br>
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
                        <br>
                    </form>
                </div>

                <div class="modal_footer">
                    <button  class="btn_modalFooter" id="btn_addNewTopicCreate" type="submit" name="btn_add">Add</button>
                    <button  class="btn_modalFooter" id="btn_addNewTopicCancel" type="submit" name="btn_cancel">Cancel</button>
                </div>
            </div>
        </div>
<!--End Contents for Topics-->
<!--Start Contents for Enrichment-->
    <div class="tabContent" id="wrapperEnrichment">
        <div class="wrapper_Control">
            <label class="control_label">Search Enrichment :</label>
            <input class="searchBox" id="searchBox_Enrichment" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_SearchEnrichment"></i>
            <i class="fa fa-refresh" id="btn_RefreshEnrichment"></i>
            <button onclick="" class="button" id="btn_UploadEnrichment">
            Upload Enrichment
            </button>
    </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_enrichment_record">
                    <tr>
                        <th>Enrichment ID</th>
                        <th>Title</th>
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
<!--End Contents for Enrichment-->
<!--Start Contents for Games-->
    <div id="wrapperGames" class="tabContent">
        <div class="wrapper_Control">
            <label class="control_label">Search Game :</label>
            <input id="searchBox_Games" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_SearchGame"></i>
            <i class="fa fa-refresh" id="btn_RefreshGame"></i>
            <button onclick="" class="button" id="btn_uploadGame">
                Upload Game
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_game_record">
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
<!--End Contents for Games -->
<!--Start Contents for Sections -->
    <div id="wrapperSections" class="tabContent">
        <div class="wrapper_Control">
            <label class="control_label">Search Section :</label>
            <input id="searchBox_Section" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_SearchSection"></i>
            <i class="fa fa-refresh" id="btn_RefreshSection"></i>
            <button onclick="" class="button" id="btn_ViewSectionDetails">
                Section Details
            </button>
            <button onclick="transferSection()" class="button" id="btn_Transfer">
                Transfer
            </button>
            <button onclick="" class="button" id="btn_AddNewSection">
                Create New Section
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_section_record">
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

                <div class="modal_footer">
                    <button  class="btn_modalFooter" id="btn_add" type="submit" name="btn_add">Add</button>
                    <button  class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
                </div>
            </div>
        </div>
<!-- EndAddNewSectionModal-->
<!--StartTransferModal-->
        <div id="container_modalTransfer" class="modal">
            <div class="modal_content_transfer">
                <div class="modal_header_transfer">
                    <span class="close_transfer">&times;</span>
                    <h4 class="modal_header_label">Transfer a Student</h4>
                </div>

                <div class="modal_body">
                    <form class="container_trabsferInfo" action="" method="post">
                        <label class="modal_label">Transfer From</label><br>
                        <select class="dropDown">
                            <option value="Select" class="option">Select</option>
                        </select><br>
                        <br>
                        <label class="modal_label">Transfer To</label><br>
                        <select class="dropDown">
                            <option value="Select" class="option">Select</option>
                        </select><br>
                        <hr />
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
                            <hr />
                    </form>
                </div>

                <div class="modal_footer">
                    <button  class="btn_modalFooter" type="submit" name="btn_save">Save</button>
                    <button  class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
                </div>
            </div>
        </div>
<!--EndTransferModal-->
<!--End Contents for Sections -->
<!--Start Contents for Announcements -->
    <div id="wrapperAnnouncements" class="tabContent">
        <div class="wrapper_Control">
            <label class="control_label">Search Announcement :</label>
            <input id="searchBox_announcement" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_SearchAnnouncement"></i>
            <i class="fa fa-refresh" id="btn_RefreshAnnouncement"></i>
            <button onclick="" class="button" id="btn_RemoveAllAnnouncement">
                Delete All
            </button>
            <button onclick="" class="button" id="btn_AddNewAnnouncement">
                Create Announcement
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_announcement_record">
                    <tr>
                        <th>Announcement ID</th>
                        <th>Title</th>
                        <th>Created By</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<!--End Contents for Announcements -->
<!--Start Contents for Reviewers -->
    <div id="wrapperReviewers" class="tabContent">
        <div class="wrapper_Control">
            <label class="control_label">Find Reviewer :</label>
            <input id="searchBox_Reviewer" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_SearchReviewer"></i>
            <i class="fa fa-refresh" id="btn_RefreshReviwer"></i>
            <button onclick="createNewReviewer()" class="button" id="btn_NewReviewer">
                Create New Reviewer
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_reviewer_record">
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
                        <label class="modal_label">Kindly Select a Topic</label><br>
                        <select class="dropDown">
                            <option value="Select" class="option">Select</option>
                            <option value="Multiplication" class="option">Multiplication</option>
                            <option value="Division" class="option">Division</option>
                            <option value="Fractions" class="option">Fractions</option>
                        </select><br>
                        <hr />
                        <label class="modal_label">Number of Items</label><br>
                        <select class="dropDown">
                            <option value="Select" class="option">Select</option>
                            <option value="30" class="option">30</option>
                            <option value="50" class="option">50</option>
                            <option value="100" class="option">100</option>
                            <option value="150" class="option">150</option>
                        </select><br>
                        <hr />
                        <label class="modal_label">Select Question Type</label><br>
                        <select class="dropDown">
                            <option value="Multiple Choice" class="option">Multiple Choice</option>
                            <option value="Fill in the Box" class="option">Fill in the Box</option>
                            <option value="Mixed" class="option">Mixed</option>
                        </select><br>
                        <hr/>
                        <label class="checkbox_Container">Random
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <button class="button" id="btn_pickQuestions">Pick Questions</button>
                        <hr />
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </form>
                </div>

                <div class="modal_footer">
                    <button  class="btn_modalFooter" type="submit" name="btn_create">Create</button>
                    <button  class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
                </div>
            </div>
        </div>

<!--End Contents for Reviewers -->
<!--Start Contents for  SchoolYear-->
    <div id="wrapperSchoolYear" class="tabContent">
        <div class="wrapper_Control">
            <label class="control_label">Find School Year :</label>
            <input id="searchBox_SchoolYear" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_SearchSY"></i>
            <i class="fa fa-refresh" id="btn_RefreshSY"></i>
            <button onclick="createNewSY()" class="button" id="btn_NewSchoolYear">
                Create New School Year
            </button>
        </div>
        <div class="wrapper_ContentDetails">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_schoolyear_record">
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
<!-- Create new SchoolYear modal-->
        <div id="container_modalCreateNewSY" class="modal">
            <div class="modal_content_createNewSY">
                <div class="modal_header_createNewSY">
                    <span class="close_createNewSY">&times;</span>
                    <h4 class="modal_header_label">Create New School Year</h4>
                </div>

                <div class="modal_body">
                    <form class="container_sectionInfo" action="" method="post">
                        <label class="modal_label">Year From</label>
                        <input class="modal_inputbox" type="text" name="text_yearNumber1"><br>
                        <br>
                        <label class="modal_label">Year To</label>
                        <input class="modal_inputbox" type="text" name="text_yearNumber2">
                        <hr />
                        <label class="modal_label">Start Date</label><br>
                        <input type="text" class="datepicker"><br>
                        <br>
                        <label class="modal_label">End Date</label><br>
                        <input type="text" class="datepicker"><br>
                        <hr />
                        <label class="modal_label">Status</label><br>
                        <select class="dropDown">
                            <option value="Active" class="option">Active</option>
                            <option value="Inactive" class="option">Inactive</option>
                        </select><br>
                        <hr />
                    </form>
                </div>
                <div class="modal_footer">
                    <button  class="btn_modalFooter" type="submit" name="btn_create">Create</button>
                    <button  class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
                </div>
            </div>
        </div>
    <!--End Contents for School Year-->
</div>
<!--End WRAPPER-->
<script>
    var url = "js/admin_settings.js";
    $.getScript(url);
</script>

</body>
</html>