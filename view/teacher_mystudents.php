<!DOCTYPE html>
<html>
<head>
    <title>Teacher | My Students</title>
    <link rel="stylesheet" href="css/teacher_mystudents.css" >
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
            <label class="control_label">
                Find Student :
                <input class="searchBox" id="searchBox_findStudent" type="text" name="searchBoxName_findStudent">
            </label>
            <i class="fa fa-search" id="btn_Search"></i>
            <i class="fa fa-refresh" id="btn_Refresh"></i>
            <label class="control_label" id="show">
                Show Section:
                <select class="selection" id="pageDrpDown_showSection">
                    <option value="all" class="option">All</option>
                </select>
            </label>
        </div>

    </div>
    <div class="table_wrapper" id="pageTable_teacher_myStudents">
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Section</th>
                <th>Status</th>
                <th>Activity Completed</th>
            </tr>
        </table>
    </div>
</div>

<script>
    var urlb = "js/teacher_mystudents.js";
    $.getScript(urlb);
</script>
</body>
</html>