<?php
require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin | Account Management</title>
    <link rel="stylesheet" href="css/admin_account_management.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="wrapper_admin_account_management">
    <div class="div_Control_Container">
        <div class="form_container">
            <label class="control_label">Find User :</label>
            <input id="searchBox" type="text" name="SearchBox">
            <i class="fa fa-search" id="btn_Search"></i>
            <i class="fa fa-refresh" id="btn_Refresh"></i>
            <label class="control_label" id="show"> Show :</label>
            <select class="selection">
                <option value="all" class="option">All</option>
                <option value="admin" class="option">Admin</option>
                <option value="teacher" class="option">Teachers</option>
                <option value="student" class="option">Students</option>
            </select>
            <label class="control_label" id="section"> Section :</label>
            <select class="selection">
                <option value="all" class="option">All</option>
            </select>
            <button class="button" id="btn_AddUser">
                Add New User
            </button>
            <button onclick="uploadCsv()" class="button" id="btn_Upload">
                Upload CSV
            </button>
        </div>
    </div>
    <div class="table_wrapper" id="table_wrapper">
        <table id="table_users_record">
            <tr>
                <th>User ID</th>
                <th>Role</th>
                <th>Username</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>M.I.</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>
        </table>
    </div>
</div>
<!--Start AddNewUser Modal-->
<div id="container_modalAddNewUser" class="modal">
    <div class="modal_content_addNewUser">
        <div class="modal_header_addNewUser">
            <span class="close_addUser">&times;</span>
            <h4 class="modal_header_label" id="modal_header">Add New User</h4>
        </div>

        <div class="modal_body">
            <form class="container_UserInfo" action="" method="post">
                <label class="modal_label">Select Role</label><br>
                <select class="dropDown" id="roledropdown">
                    <option value="Select">Select</option>
                </select><br>
                <br>
                <label class="modal_label">Student ID</label><br>
                <input class="modal_inputbox" id="input_studentid" type="text" name="text_fname"><br>
                <br>
                <label class="modal_label" id="user_status_dropdown">Status</label><br>
                <select class="dropDown" id="active_dropdown">
                    <option value="Active" class="option">Active</option>
                    <option value="Inactive" class="option">Inactive</option>
                </select><br>
                <hr/>
                <label class="modal_label">Last Name</label><br>
                <input class="modal_inputbox" id="input_lastname" type="text" name="text_lname"><br>
                <br>
                <label class="modal_label">First Name</label><br>
                <input class="modal_inputbox" id="input_firstname" type="text" name="text_fname"><br>
                <br>
                <label class="modal_label">Middle Initial (Optional)</label><br>
                <input class="modal_inputbox" id="input_middleinitial" type="text" name="text_midname"><br>
                <hr/>
                <label class="modal_label">Username</label><br>
                <input class="modal_inputbox" id="input_username" type="text" name="text_username"><br>
                <br>
                <label class="modal_label">Password</label><br>
                <input class="modal_inputbox" id="input_password" type="password" name="text_password"><br>
                <br>
                <label class="modal_label">Confirm Password</label><br>
                <input class="modal_inputbox" id="input_confirm_password" type="password" name="text_cpassword"><br>
                <hr/>
                <label class="modal_label">Section</label><br>
                <select class="dropDown" id="section_dropdown">
                    <option value="Select" class="option">Select</option>
                </select><br>
                <br>
                <label class="modal_label">Teacher</label><br>
                <select class="dropDown" id="teacher_dropdown">
                    <option value="Select" class="option">Select</option>
                </select>
                <hr/>
                <div id="modal_input_validation_container"><!-- modal input validation container--></div>
            </form>
        </div>

        <div class="modal_footer">
            <button class="btn_modalFooter" id="button_save" type="submit" name="btn_save">Save</button>
            <button class="btn_modalFooter" type="submit" name="btn_cancel">Cancel</button>
        </div>
    </div>
</div>
<!--End AddNewUser Modal-->

<!--Start UploadCSV Modal-->
<div id="container_modal_uploadCsv" class="modal">
    <div class="modal_content_uploadCSV">
        <div class="modal_header_uploadCSV">
            <span class="close_uploadCsv">&times;</span>

            <h2>Upload CSV</h2>
        </div>
        <div class="modal_body">
            <form>
                <label class="modal_label">Section</label><br>
                <select class="dropDown">
                    <option value="Select" class="option">Select</option>
                </select><br>
                <br>
                <label class="modal_label">Teacher</label><br>
                <select class="dropDown">
                    <option value="Select" class="option">Select</option>
                </select>
                <br>
                <br>
                <input type="file" id="csv_file_input" class="modalbtn_browseFiles" value="Add Image"/><br>
                <hr/>
                <label class="modal_label">Data Preview</label><br>
                <div>
                    <table id="data_preview">
                        <tr>
                            <th>Student Id</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middle Initial</th>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <div class="modal_footer">
            <button class="btn_modalFooter" id="modal_save">Upload</button>
            <button class="btn_modalFooter">Cancel</button>
        </div>
    </div>
</div>
<!--End UploadCSV Modal-->


<script>
    var url = "js/admin_accountmanagement.js";
    $.getScript(url);
</script>
</body>
</html>