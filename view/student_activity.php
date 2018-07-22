<!DOCTYPE html>
<html>
<head>
    <title>Student | My Activities</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/student_activity.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/modal.css">
<!--    <link rel="stylesheet" href="css/control.css">-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//resources/demos/style.css">
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
</head>

<body>
<div class="mainWrapper">
    <div class="pageDiv_controlContainer">
        <label class="pageLbl" id="pageLbl_studentID">
            Student ID : 20150908
        </label>
        <label class="pageLbl" id="pageLbl_studentName">
            Student Name : Ellis, Anne
        </label>
        <label class="pageLbl" id="pageLbl_studentSection">
            Section : Narra
        </label>
        <label class="pageLbl" id="pageLbl_studentAdviser">
            Adviser : Ms. LastName
        </label>
        <label class="pageLbl" id="pageLbl_sy">
            SY: 2019-2020
        </label>
    </div>

<!--TAB CONTAINER-->
    <div class="pageDiv_tabContainer">
        <ul class="tabs">
            <li class="tab-link current" data-tab="general">General</li>
            <li class="tab-link" data-tab="assignments">Assignments</li>
            <li class="tab-link" data-tab="files">Files</li>
        </ul>

        <div id="general" class="tab-content current">
            <div class="pageDiv_showTopicContainer">
                <label class="pageLbl_general" id="pageLbl_showTopic">
                    Show Topic:
                    <select class="pageDrpdown" id="pageDrpDown_showTopic">
                        <option value="All" class="option">All</option>
                    </select
                </label>
            </div>

            <div class="table_wrapper" id="table_wrapper">
                <table id="table_student_generalRecord">
                    <tr>
                        <th>Lesson</th>
                        <th>Lesson Title</th>
                        <th>Assessment</th>
                        <th>Raw Score</th>
                        <th>Percentage(%)</th>
                    </tr>
                </table>
            </div>
        </div>
<!--ASSIGNMENTS-->
        <div id="assignments" class="tab-content">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_student_assignmentsRecord">
                    <tr>
                        <th>Activity No</th>
                        <th>Name</th>
                        <th>Items</th>
                        <th>Percentage(%)</th>
                        <th>Attempt</th>
                        <th>Closes In</th>
                        <th>Action</th>
                    </tr>
                </table>
            </div>
        </div>
<!-- FILES-->
        <div id="files" class="tab-content">
            <div class="table_wrapper" id="table_wrapper">
                <table id="table_student_filesRecord">
                    <tr>
                        <th>File Name</th>
                        <th>Date Modified</th>
                        <th colspan="2">Action</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!--END OF MAINWRAPPER-->

<script>
    var url1 = "js/student_activity.js";
    $.getScript(url1);
</script>
</body>
</html>
