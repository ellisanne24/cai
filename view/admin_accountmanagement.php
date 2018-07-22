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
<div class="mainWrapper">
    <div class="div_Control_Container">
        <div class="form_container">
            <label class="control_label">
                Find User :
                <input class="searchBox" id="pageInput_searchUser" type="text" name="SearchBox">
            </label>
            <i class="fa fa-search" id="pageBtn_searchUser"></i>
            <i class="fa fa-refresh" id="pageBtn_refreshPage"></i>
            <label class="control_label" id="show">
                Show Role:
                <select class="selection" id="pageDrpDown_showRole">
                    <option value="all" class="option">All</option>
                    <option value="admin" class="option">Admin</option>
                    <option value="teacher" class="option">Teachers</option>
                    <option value="student" class="option">Students</option>
                </select>
            </label>

            <label class="control_label" id="section">
                Section :
                <select class="selection" id="pageDrpDown_showSection">
                    <option value="all" class="option">All</option>
                </select>
            </label>

            <button class="button" id="pageBtn_addNewUser">
                Add New User
            </button>
            <button  class="button" id="pageBtn_uploadCSV">
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
<!--ADD NEW USER MODAL-->
<div id="container_modalAddNewUser" class="modal">
    <div class="modal_content_addNewUser">
        <div class="modal_header_addNewUser">
            <span class="close_addUser">&times;</span>
            <h4 class="modal_header_label" id="modal_header">
                Add New User
            </h4>
        </div>

        <div class="modal_body">
            <form class="container_UserInfo" action="" method="post">
                <label class="modal_label">
                    Select Role
                    <select class="dropDown" id="modalDrpDown_selectRole">
                        <option value="Select">Select</option>
                    </select>
                </label><br>
                <label class="modalLbl_note" id="modalLbl_addNewUserNote">
<!--                    NOTE-->
                </label><br>
                <br>
                <label class="modal_label">
                    Student ID
                    <input class="modal_inputbox" id="modalInput_studentID" type="text" name="modalInputName_studentID">
                </label><br>
                <br>
                <label class="modal_label">
                    Status
                    <select class="dropDown" id="modalDrpDown_addNewUser_status">
                        <option value="Active" class="option">Active</option>
                        <option value="Inactive" class="option">Inactive</option>
                    </select>
                </label><br>
                <hr/>

                <label class="modal_label">
                    Last Name
                    <input class="modal_inputbox" id="modalInput_lastName" type="text" name="modalInputName_lastName">
                    </label><br>
                <br>
                <label class="modal_label">
                    First Name
                    <input class="modal_inputbox" id="modalInput_firstName" type="text" name="modalInputName_firstName">
                </label><br>
                <br>
                <label class="modal_label">
                    Middle Initial (Optional)
                    <input class="modal_inputbox" id="modalInput_middleInitial" type="text" name="modalInputName_middleInitial"
                </label><br>
                <hr/>
                <label class="modal_label">
                    Username
                    <input class="modal_inputbox" id="modalInput_userName" type="text" name="modalInputName_userName">
                </label>
                <br>
                <label class="modal_label">
                    Password
                    <input class="modal_inputbox" id="modalInput_password" type="password" name="modalInputName_password">
                </label>
                <br>
                <label class="modal_label">
                    Confirm Password
                    <input class="modal_inputbox" id="modalInput_cPassword" type="password" name="modalInputName_cPassword">
                </label>
                <hr/>
                <label class="modal_label">
                    Section
                    <select class="dropDown" id="modalDrpDown_section">
                        <option value="Select" class="option">Select</option>
                    </select>
                </label><br>
                <br>
                <label class="modal_label">
                    Teacher
                    <select class="dropDown" id="modalDrpDown_teacher">
                        <option value="Select" class="option">Select</option>
                    </select>
                </label>
                <hr/>
                <div id="modal_input_validation_container"><!-- modal input validation container--></div>
            </form>
        </div>

        <div class="modal_footer">
            <button class="btn_modalFooter" id="modalBtn_addNewUser_save" name="modalBtnName_addNewUser_save">
                Save
            </button>
            <button class="btn_modalFooter" id="modalBtn_addNewUser_cancel" name="modalBtnName_addNewUser_cancel">
                Cancel
            </button>
        </div>
    </div>
</div>
<!--------------------------------------------------------------------------------------->
<!--UPLOAD CSV MODAL-->
<div id="container_modalUploadCSV" class="modal">
    <div class="modal_content_uploadCSV">
        <div class="modal_header_uploadCSV">
            <span class="close_uploadCSV">&times;</span>
            <h2>Upload CSV</h2>
        </div>
        <div class="modal_body">
            <form>
                <label class="modal_label">
                    Section
                    <select class="dropDown" id="modalDrpDown_section">
                        <option value="Select" class="option">Select</option>
                    </select>
                </label><br>
                <br>
                <label class="modal_label">
                    Teacher
                    <select class="dropDown">
                        <option value="Select" class="option">Select</option>
                    </select>
                </label><br>
                <br>
                <br>
                <input type="file" id="modalInput_browseFiles" class="modalbtn_browseFiles" value="Add Image"/><br>
                <hr/>
                <label class="modal_label">
                    Data Preview
                </label><br>
                <div>
                    <table id="modalTable_dataPreview">
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
            <button class="btn_modalFooter" id="modalBtn_uploadCSV_upload">
                Upload
            </button>
            <button class="btn_modalFooter" id="modalBtn_uploadCSV_cancel">
                Cancel
            </button>
        </div>
    </div>
</div>
<!--------------------------------------------------------------------------------------->

<script>
    var url = "js/admin_accountmanagement.js";
    $.getScript(url);
</script>
</body>
</html>