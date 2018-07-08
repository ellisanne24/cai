<?php
require_once 'core/init.php';
require_once 'dbutil/dbconnection.php';
require_once 'functions/sanitize.php';
require_once 'functions/redirect.php';


$user = new User();
$user->setLastname($_SESSION['lastname']);
$user->setFirstname($_SESSION['firstname']);
$user->setMiddleinitial($_SESSION['middlename']);

$role = new Role();
$role->setRoleId($_SESSION['roleId']);
$role->setRolename($_SESSION['rolename']);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/navigation_bar.css">
</head>

<nav class="nav_container" id="topnav_Menu">
        <img src="img/logo.png">
        <!--Admin  Modules-->
        <a class="nav_tab" id="admin_dashboard" href="#">
            Dashboard
        </a>

        <?php if ($role->getRolename() === 'Administrator') : ?>
            <a class="nav_tab" id="admin_accountmanagement" href="#">
                Account Management
            </a>
        <?php endif; ?>

        <?php if ($role->getRolename() === 'Administrator') : ?>
            <a class="nav_tab" id="admin_quizzes" href="#">
                Quizzes
            </a>
        <?php endif; ?>

        <?php if ($role->getRolename() === 'Administrator') : ?>
            <a class="nav_tab" id="admin_settings" href="#">
                Settings
            </a>
        <?php endif; ?>

        <?php if ($role->getRolename() === 'Administrator') : ?>
            <a class="nav_tab" id="admin_reports" href="#">
                Reports
            </a>
        <?php endif; ?>

        <!--Teacher  Modules-->

    <?php if ($role->getRolename() === 'Teacher') : ?>
        <a class="nav_tab" id="teacher_myStudents" href="#">
            My Students
        </a>
    <?php endif; ?>

    <?php if ($role->getRolename() === 'Teacher') : ?>
        <a class="nav_tab" id="teacher_myQuizzes" href="#">
            My Quizzes
        </a>
    <?php endif; ?>

    <?php if ($role->getRolename() === 'Teacher') : ?>
        <a class="nav_tab" id="teacher_settings" href="#">
            Settings
        </a>
    <?php endif; ?>

    <?php if ($role->getRolename() === 'Teacher') : ?>
        <a class="nav_tab" id="teacher_reports" href="#">
            Reports
        </a>
    <?php endif; ?>


        <!--Student  Modules-->
        <?php if ($role->getRolename() === 'Student') : ?>
            <a class="nav_tab" id="student_learn" href="#">
                Learn
            </a>
            <a class="nav_tab" id="admin_reports" href="#">
                Play
            </a>
            <a class="nav_tab" id="admin_reports" href="#">
                Review
            </a>
        <?php endif; ?>

        <label id="usernameLabel">Hello,&nbsp; <?php echo $user->getFirstname()."!"; ?></label>
        <a class="nav_tab" id="logout" href="">
            Logout
        </a>
</nav>

</html>

