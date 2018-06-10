<?php
require_once 'core/init.php';
require_once 'dbutil/dbconnection.php';
require_once 'functions/sanitize.php';
require_once 'functions/redirect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Capitol Hills Christian School CAI</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div>
    <form class="login_container" action="" method="post">
        <div class="div_username">
            <label class="lbl_username">
                Username
            </label>
            <input class="tf_username" type="text" name="username">
        </div>

        <div class="div_password">
            <label class="lbl_password">
                Password
            </label>
            <input class="tf_password" type="password" name="password">
        </div>

        <div>
            <input class="loginbutton" type="submit" name="loginbutton" value="Login">
            <!--Invalid login message container-->
            <div>
                <?php if (isset($_POST['username']) && isset($_POST['password'])) : ?>
                    <?php
                    $loginDaoImpl = new LoginDaoImpl($pdo);
                    $userDaoImpl = new UserDaoImpl($pdo);
                    $user = $userDaoImpl->getUserBy($_POST['username'], $_POST['password']);
                    $isValid = $loginDaoImpl->isValid($user);
                    ?>
                    <?php if ($isValid === 1) : ?>
                        <?php
                        $schoolYearDaoImpl = new SchoolYearDaoImpl($pdo);
                        $currentSchoolYear = $schoolYearDaoImpl->getCurrentSchoolYear();
                        $_SESSION['schoolYearId'] = $currentSchoolYear->getSchoolYearId();
                        $_SESSION['yearFrom'] = $currentSchoolYear->getYearFrom();
                        $_SESSION['yearTo'] = $currentSchoolYear->getYearTo();

                        $_SESSION['userId'] = $user->getId();
                        $_SESSION['username'] = $user->getUsername();
                        $_SESSION['password'] = $user->getPassword();
                        $_SESSION['lastname'] = $user->getLastname();
                        $_SESSION['firstname'] = $user->getFirstname();
                        $_SESSION['middlename'] = $user->getMiddleinitial();

                        $role = $user->getRole();
                        $_SESSION['roleId'] = $role->getRoleId();
                        $_SESSION['rolename'] = $role->getRolename();
                        redirect("landingpage.php");
                        ?>
                    <?php else : ?>
                        <p class="invalid-login">Invalid Login. Please try again.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <!--End of Invalid login message container-->
        </div>

    </form>
</div>
</body>
</html>