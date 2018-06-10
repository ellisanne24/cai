<!DOCTYPE html>
<html>
<body>
<div class="div_dashboardLabel" id="dashboard_Label">
    <h2 id="label_schoolName">Capitol Hills Christian School</h2>
    <h2 id="label_Dashboard">Admin Dashboard</h2>
</div>

<div class="wrapper_admin_dashboard">
    <div class="container_status" id="container_status">
        <div class="div_studentCount" id="div_studentCount">
         <label class="statusLabel">display_StudentCount</label>
         <label id="label_Students">Students</label>
             <img id="img_Students" src="img/students_white.png">
     </div>

        <div class="div_teacherCount" id="div_teacherCount">
         <label class="statusLabel">display_TeacherCount</label>
         <label id="label_Teachers">Teachers</label>
             <img src="img/teacher_white.png">
         </div>

        <div class="div_sectionCount" id="div_sectionCount">
            <label class="statusLabel">display_SectionCount</label>
            <label id="label_Sections">Sections</label>
                <img src="img/section_white.png">
        </div>

        <div class="div_finisherCount" id="div_finisherCount">
            <label class="statusLabel">display_FinisherCount</label>
            <label id="label_Finishers">Finishers</label>
                <img src="img/finisher_white.png">
        </div>
</div>

    <div class="container_announcement" id="container_announcement">
        <div id="announcement_Label_Container">
         <label id="announcement_Label">Announcement</label>
            <label id="announcement_Date">Date</label>
    </div>

    </div>

    <div class="container_analysis" id="container_analysis">
        <div id="analysis_Label_Container">
            <label id="analysis_Label">Unit Test Item Analysis</label>
        </div>
    </div>

</div>

<script>
    var urlb = "js/admin_dashboard.js";
    $.getScript(urlb);
</script>

</body>

</html>