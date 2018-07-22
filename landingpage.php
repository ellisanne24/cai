
<!DOCTYPE html>
<html>
<head>
    <title>CHCS | Realistic Math</title>
    <link rel="stylesheet" href="css/landingpage.css">
    <link rel="stylesheet" href="css/navigation_bar.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <link rel="stylesheet" href="css/admin_settings.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>
<!--<div class="wrapper_landingPage">-->
    <!-- CONTENT CONTAINER's content depends on what was clicked on navbar -->

<div>
    <?php
    require_once 'navbar.php';
    ?>
</div>
    <div class="container_landingPage" id="content_container">

    </div>
    <!-- end of container-->

<!--</div>-->
<!-- end of wrapper-->

<script src="js/jquery-3.3.1.js"></script>
<!--<script src="js/jquery-2.2.4.min.js"></script>-->
<!--<script src="js/jquery-1.12.4.min.js"></script>-->
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
    var role = '<?php echo json_encode($role); ?>';
</script>
<script src="js/landingpage.js"></script>

</body>
</html>