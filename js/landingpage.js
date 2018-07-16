/* GLOBAL VARIABLES WITHIN THIS DOCUMENT*/
var div_content_container = $("#content_container");
var navitem_dashboard = $("#admin_dashboard");
var navitem_admin_accountManagement = $("#admin_accountmanagement");
var navitem_admin_quizzes = $("#admin_quizzes");
var navitem_admin_settings = $("#admin_settings");
var navitem_admin_reports = $("#admin_reports");

var navitem_teacher_myStudents = $("#teacher_myStudents");
var navitem_teacher_myQuizzes = $("#teacher_myQuizzes");
var navitem_teacher_settings = $("#teacher_settings");
var navitem_teacher_reports = $("#teacher_reports");

var navitem_student_learn = $("#student_learn");
var navitem_student_quizzes = $("#student_quizzes");
var navitem_student_play = $("#student_play");
var navitem_student_review = $("#student_review");

var roleObj = JSON.parse(role);
var logout = $('#logout');
/* END */

$(document).ready(function () {
    loadDashboard();
    logout.on("click", logoutUser);
    navitem_dashboard.on("click", loadDashboard);
    navitem_admin_accountManagement.on("click", loadAccountManagement);
    navitem_admin_quizzes.on('click', load_adminQuizzes);
    navitem_admin_settings.on("click", load_adminSettings);
    navitem_admin_reports.on("click", load_adminReports);

    navitem_teacher_myStudents.on('click', load_teacherMyStudents);
    navitem_teacher_myQuizzes.on('click', load_teacherMyQuizzes);
    navitem_teacher_settings.on('click', load_teacherSettings);
    navitem_teacher_reports.on('click', load_teacherReports);

    navitem_student_learn.on('click', load_studentLearn);
    navitem_student_quizzes.on('click', load_student_quizzes);
    navitem_student_play.on('click', load_studentPlay);
    navitem_student_review.on('click', load_student_review);
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

function load_adminQuizzes() {
    var url_admin_quizzes = 'view/admin_quizzes_view.php';

    try{
        div_content_container.html('');
        div_content_container.load(url_admin_quizzes);
    }catch (err){
        console.log(err.message);
    }

}

function load_adminSettings() {
    var url_admin_settings = 'view/admin_settings.php';

    try{
        div_content_container.html('');
        div_content_container.load(url_admin_settings);
    }catch (err){
        console.log(err.message);
    }

}

function load_adminReports() {
    var url_admin_reports = 'view/admin_reports.ph';
    try{
        div_content_container.html('');
        div_content_container.load(url_admin_reports);
    }catch (err){
        console.log(err.message);
    }
}

//TEACHER FUNCTIONS

function load_teacherMyStudents(){
    var url_teacher_myStudents = 'view/teacher_mystudents.php';

    try{
        div_content_container.html('');
        div_content_container.load(url_teacher_myStudents);
    }catch (err){
        console.log(err.message);
    }

}

function load_teacherMyQuizzes(){
    var url_teacher_myQuizzes = 'view/teacher_quizzes.php';

    try{
        div_content_container.html('');
        div_content_container.load(url_teacher_myQuizzes);
    }catch (err){
        console.log(err.message);
    }
}

function load_teacherSettings(){
    var url_teacher_settings = 'view/teacher_settings.php';

    try{
        div_content_container.html('');
        div_content_container.load(url_teacher_settings);
    }catch (err){
        console.log(err.message);
    }
}

function load_teacherReports(){
    var url_teacher_reports = 'view/teacher_reports.php';

    try{
        div_content_container.html('');
        div_content_container.load(url_teacher_reports);
    }catch (err){
        console.log(err.message);
    }
}

function load_studentLearn(){
    var url_student_learn = 'view/student_learn.php';

    try{
        div_content_container.html('');
        div_content_container.load(url_student_learn);
    }catch (err){
        console.log(err.message);
    }
}

function load_studentPlay(){
    var url_student_play = "view/student_play.php";

    try{
        div_content_container.html('');
        div_content_container.load(url_student_play);
    }catch (err){
        console.log(err.message);
    }
}

function load_student_quizzes(){
    var url_student_quizzes = "view/student_quizzes.php";

    try{
        div_content_container.html('');
        div_content_container.load(url_student_quizzes);
    }catch (err){
        console.log(err.message);
    }
}

function load_student_review(){
    var url_student_review = "view/student_review.php";

    try{
        div_content_container.html('');
        div_content_container.load(url_student_review);
    }catch (err){
        console.log(err.message);
    }
}