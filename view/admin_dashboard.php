<!DOCTYPE html>
<html>
<head>
    <title>CHCS | Realistic Math</title>
    <link rel="stylesheet" href="css/admin_dashboard.css" >
</head>
<body>
<div class="mainWrapper" id="mainWrapper">

    <div class="wrapper_schoolName" id="wrapper_schoolName">
        <div class="divDashboard_schoolName" id="divDashboard_schoolName">
            <h2 id="pageLbl_schoolName">
                Capitol Hills Christian School
            </h2>
        </div>
        <div class="divDashboard_sy" id="divDashboard_sy">
            <h2 id="pageLbl_Dashboard">Admin Dashboard</h2>
<!--            <h4 id="pageLbl_sy">SY: 2019-2020</h4>-->
        </div>
    </div>

    <div class="wrapper_menuTiles" id="wrapper_menuTiles">
        <div class="divDashboard_studentCount" id="divDashboard_studentCount">
                <label class="dashboardLbl_count" id="dashboardLbl_studentCount">
                    20
                </label>
                <label class="dashboardLbl_name" id="dashboardLbl_student">
                    Students
                </label>
            <div class="wrapper_menuTileImg" id="menuTileImg_studentCount">

            </div>
        </div>
<!------------------------------------------------------------------------------------------------------------->
        <div class="divDashboard_teacherCount" id="divDashboard_teacherCount">
            <label class="dashboardLbl_count" id="dashboardLbl_teacherCount">
                18
            </label>
            <label class="dashboardLbl_name" id="dashboardLbl_teacher">
                Teachers
            </label>
            <div class="wrapper_menuTileImg" id="menuTileImg_teacherCount">

            </div>
        </div>
<!------------------------------------------------------------------------------------------------------------->
        <div class="divDashboard_sectionCount" id="divDashboard_sectionCount">
            <label class="dashboardLbl_count" id="dashboardLbl_sectionCount">
                3
            </label>
            <label class="dashboardLbl_name" id="dashboardLbl_sections">
                Sections
            </label>
            <div class="wrapper_menuTileImg" id="menuTileImg_sectionCount">

            </div>
        </div>
<!------------------------------------------------------------------------------------------------------------->
        <div class="divDashboard_finisherCount" id="divDashboard_finisherCount">
            <label class="dashboardLbl_count" id="dashboardLbl_finisherCount">
                16
            </label>
            <label class="dashboardLbl_name" id="dashboardLbl_finishers">
                Finishers
            </label>
            <div class="wrapper_menuTileImg" id="menuTileImg_finisherCount">

            </div>
        </div>
     </div>

    <div class="wrapper_scoreDistribution" id="wrapper_scoreDistribution">
        <br>
        <label class="pageLbl_divTitle" id="pageLbl_divTitle">
            Unit Test Score Distribution
        </label>
        <hr class="pageLine">
        <div class="wrapper_graph" id="wrapper_unitTestGraph">

        </div>
    </div>

</div>

<script>
    var urlb = "js/admin_dashboard.js";
    $.getScript(urlb);
</script>
</body>
</html>