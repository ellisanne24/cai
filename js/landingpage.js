/* GLOBAL VARIABLES WITHIN THIS DOCUMENT*/
var div_content_container = $("#content_container");
var navitem_dashboard = $("#admin_dashboard");
var navitem_admin_account_management = $("#admin_accountmanagement");
var navitem_admin_quizzes = $("#admin_quizzes");
var navitem_admin_settings = $("#admin_settings");
var navitem_admin_reports = $("#admin_reports");

var roleObj = JSON.parse(role);
var logout = $('#logout');
/* END */

$(document).ready(function () {
    loadDashboard();
    logout.on("click", logoutUser);
    navitem_dashboard.on("click", loadDashboard);
    navitem_admin_account_management.on("click", loadAccountManagement);
    navitem_admin_quizzes.on('click',loadQuizzes);
    navitem_admin_settings.on("click", loadSettings);
    navitem_admin_reports.on("click", loadReports);
});

function logoutUser() {
    $.ajax({
        type: 'GET',
        url: 'controller/logout.php',
        success: function (msg) {
            //alert("successfully loggedout");
            window.location.href = 'Index.php';
        },
        error: function (x, e) {
            if (x.status == 0) {
                alert('You are offline!!\n Please Check Your Network.');
            } else if (x.status == 404) {
                alert('Requested URL not found.');
            } else if (x.status == 500) {
                alert('Internal Server Error.');
            } else if (e == 'parsererror') {
                alert('Error.\nParsing JSON Request failed.');
            } else if (e == 'timeout') {
                alert('Request Time out.');
            } else {
                alert('Unknown Error.\n' + x.responseText);
            }
        }
    });
}

function loadDashboard() {
    var url_admin_dashboard = 'view/admin_dashboard.php';
    var url_teacher_dashboard = 'view/teacher_dashboard.php';
    var url_student_dashboard = 'view/student_dashboard.php';
    try{
        div_content_container.html('');
        if (roleObj.rolename === 'Administrator') {
            div_content_container.load(url_admin_dashboard);
        } else if (roleObj.rolename === 'Teacher') {
            div_content_container.load(url_teacher_dashboard);
        } else if (roleObj.rolename === 'Student') {
            div_content_container.load(url_student_dashboard);
        }
    }catch (err){
        console.log("Error: "+err.message);
    }
}

function loadAccountManagement() {
    var url = 'view/admin_accountmanagement.php';
    try{
        div_content_container.html('');
        div_content_container.load(url);
    }catch(err){
        console.log(err.message);
    }
}

function loadQuizzes() {

    var url_admin_quizzes = 'view/admin_quizzes_view.php';
    var url_teacher_quizzes = 'view/teacher_quizzes.php';

    try{
        div_content_container.html('');
        if (roleObj.rolename === 'Administrator') {
            div_content_container.load(url_admin_quizzes);
        } else if (roleObj.rolename === 'Teacher') {
            div_content_container.load(url_teacher_quizzes);
        }
    }catch (err){
        console.log("Error: "+err.message);
    }

}

function loadSettings() {
    var url = 'view/admin_settings.php';
    try{
        div_content_container.html('');
        div_content_container.load(url);
    }catch(err){
        console.log(err.message);
    }

}

function loadReports() {
    var url = 'view/admin_reports';
    try{
        div_content_container.html('');
        div_content_container.load(url);
    }catch (err){
        console.log(err.message);
    }
}