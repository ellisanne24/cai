<?php

require_once '../core/init.php';
require_once '../dbutil/dbconnection.php';
require_once '../functions/sanitize.php';
require_once '../functions/redirect.php';

//session_start(); // makes all session variable values available to this php page/file

$userId =  $_SESSION['userId'] ;
$studentLastName = $_SESSION['lastname'];
$studentFirstName = $_SESSION['firstname'] ;
$studentMiddleName = $_SESSION['middlename'];

$studentDaoImpl = new StudentDaoImpl($pdo);
$studentNo = $studentDaoImpl->getStudentNoByUserId($userId);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/student_learn.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="mainWrapper">
    <div class="pageDiv_controlContainer">
        <label class="pageLbl" id="pageLbl_studentID">
            Student No : <?php echo  $studentNo; ?>
        </label>
        <label class="pageLbl" id="pageLbl_studentName">
            Student Name : <?php echo $studentLastName.', '.$studentFirstName.' '.$studentMiddleName ; ?>
        </label>
        <label class="pageLbl" id="pageLbl_studentSection">
            Section :
        </label>
        <label class="pageLbl" id="pageLbl_studentAdviser">
            Adviser :
        </label>
        <label class="pageLbl" id="pageLbl_sy">
            SY :
        </label>
    </div>
<!-- All Contents Wrapper-->
    <div class="allContent_Container">
<!--MULTIPLICATION------------------------------------------------------------------->
        <div class="mainWrapper_multiplication" id="mainWrapper_multiplication">
            <div class="subWrapper_multiplication" id="subWrapper_multiplication">

                <div class="topic_link_Container">
                    <a class="topic_link" href="view/student_learn_topiclink.php" target="_blank">Multiplication</a><br>
                    <label class="topic_link_labels">Lessons Completed:</label>

                </div>
                <div class="topic_buttons_Container">
                    <button onclick="" class="button" id="btn_MultiplicationStartPostTest">
                        Start Post Test
                    </button>
                    <button onclick="" class="button" id="btn_MultiplicationStartPretest">
                        Start Pretest
                    </button>
<!--                    <button onclick="" class="button" id="btn_MultiplicationStartUnitTest">-->
<!--                        Start Unit Test-->
<!--                    </button>-->
                </div>
            </div>
            <div class="scoreContainer_multiplication" id="scoreContainer_multiplication">
                <label class="pageLbl_scores" id="pageLbl_pretestScore_multiplication">Pretest Score: 5/10 | 50%</label>
                <label class="pageLbl_scores" id="pageLbl_posttestScore_multiplication">Post Test Score: 5/10 | 50%</label>
<!--                <label class="pageLbl_scores" id="pageLbl_unitestScore_multiplication">Unit Test Score: 25/50 | 50%</label>-->
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    var url = "js/student_learn.js";
    $.getScript(url);
</script>


</body>
</html>