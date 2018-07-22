console.log('admin_accountmanagement.js is loaded');
$(document).ready(function(){
    loadRolesToDropDown();
    //setInterval(function(){
    //    loadAllUsersToTable();
    //},1000);
    loadAllUsersToTable();
    searchUser();
});

$('#modalDrpDown_selectRole').on('change', function() {
    var roleId = this.value;
    var roleName = $("#modalDrpDown_selectRole option:selected").text();
    var note = $("#modalLbl_addNewUserNote")

    if(roleName === 'Administrator'){
        console.log(roleName);
        $("#modalInput_studentID").prop("disabled", true); //disable the dropdown
        $("#modalInput_studentID").css("background-color","lightgrey"); //color the textfield grey
        $("#modalDrpDown_addNewUser_status").prop("disabled", true);
        $("#modalDrpDown_addNewUser_status").css("background-color","lightgrey"); //color the textfield grey
        $("#modalDrpDown_section").prop("disabled", true); //disable the dropdown
        $("#modalDrpDown_section").css("background-color","lightgrey"); //color the dropdown grey
        $("#modalDrpDown_teacher").prop("disabled", true); //disable the dropdown
        $("#modalDrpDown_teacher").css("background-color","lightgrey"); //color the dropdown grey
    } else  if (roleName === 'Teacher'){
        console.log(roleName);
        $("#modalInput_studentID").prop("disabled", true); //disable the dropdown
        $("#modalInput_studentID").css("background-color","lightgrey"); //color the textfield grey
        $("#modalDrpDown_addNewUser_status").prop("disabled", true);
        $("#modalDrpDown_addNewUser_status").css("background-color","lightgrey"); //color the textfield grey
        $("#modalDrpDown_section").prop("disabled", false);
        $("#modalDrpDown_section").css("background-color","white"); //color the dropdown white
        $("#modalDrpDown_teacher").prop("disabled", true); //disable the dropdown
        $("#modalDrpDown_teacher").css("background-color","lightgrey"); //color the dropdown grey
    } else{
        note.text("Teacher and Section must exist in the system to successfully enroll Student.");
        $("#modalInput_studentID").prop("disabled", false); //enable dropdown
        $("#modalDrpDown_section").prop("disabled",false); //enable the dropdown
        $("#modalDrpDown_teacher").prop("disabled",false); //enable the dropdown
        $("#modalDrpDown_addNewUser_status").prop("disabled", true);
        $("#modalDrpDown_addNewUser_status").css("background-color", "lightgrey");
        $("#modalInput_studentID").css("background-color","white"); //color the textfield white
        $("#modalDrpDown_section").css("background-color","white"); //color the dropdown white
        $("#modalDrpDown_teacher").css("background-color","white"); //color the dropdown white
    }
})

$('#modalInput_browseFiles').on('change', function (e) {
    var ext = $("#modalInput_browseFiles").val().split(".").pop().toLowerCase(); //csv
    if (e.target.files != undefined) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var csvval = e.target.result.split("\n");
            var jsonObj = [];
            var headers  = csvval[0].split(",");
            for(var i = 1; i <csvval.length; i++){
                var data = csvval[i].split(',');
                var obj = {};
                for(var j = 0; j < data.length; j++) {
                    obj[headers[j].trim()] = data[j].trim();
                }
                jsonObj.push(obj);
            }
            var jsonData = JSON.stringify(jsonObj);
            addDataToTable(jsonData);
        };
        reader.readAsText(e.target.files.item(0));
    }
    return false;
});

function reset_form(){
    $("#modalDrpDown_selectRole").val($("#modalDrpDown_selectRole option:first").val());
    $("#modalDrpDown_section").prop($("#modalDrpDown_section option:first").val());
    $("#modalDrpDown_teacher").prop($("#modalDrpDown_teacher option:first").val());
    $("#modalDrpDown_section").prop("disabled",false);
    $("#modalDrpDown_teacher").prop("disabled",false);
    $("#modalInput_studentID").val("");
    $("#modalInput_userName").val("");
    $("#modalInput_password").val("");
    $("#modalInput_cPassword").val("");
    $("#modalInput_lastName").val("");
    $("#modalInput_firstName").val("");
    $("#modalInput_middleInitial").val("");
}

//REFRESH TABLE
$(document).on('click', '#pageBtn_refreshPage', refreshTable);

//SHOW MODAL CALL IN
$(document).on('click', '#pageBtn_addNewUser', showModal_addNewUser);
$(document).on('click', '#pageBtn_uploadCSV', showModal_uploadCSV);

//CLOSE MODAL CALL IN
$(document).on('click', '.close_addUser', closeModal_addNewUser);
$(document).on('click', '.close_uploadCSV', closeModal_uploadCSV);

//CANCEL MODAL CALL IN
$(document).on('click', '#modalBtn_addNewUser_cancel', closeModal_addNewUser);
$(document).on('click', '#modalBtn_uploadCSV_cancel', closeModal_uploadCSV);

//ADD/UPLOAD CALL IN
$(document).on('click', '#modalBtn_addNewUser_save', addUser);

//ADD/UPLOAD FUNCTION
function addUser(){
    var validation_div = $('#modal_input_validation_container');
    var lastName = $('#modalInput_lastName').val().trim();
    var firstName = $('#modalInput_firstName').val().trim();
    var middleInitial = $('#modalInput_middleInitial').val().trim();
    var userName  = $('#modalInput_userName').val().trim();
    var password = $('#modalInput_password').val().trim();
    var confirmPassword = $('#modalInput_cPassword').val().trim();
    var roleId = $('#modalDrpDown_selectRole option:selected').val();
    var roleName = $("#modalDrpDown_selectRole option:selected").text();

    var hasSpecialCharacters = (/^[a-zA-Z0-9- ]*$/.test(password) == false) ||
        (/^[a-zA-Z0-9- ]*$/.test(confirmPassword) == false);

    if(hasSpecialCharacters) {
        validation_div.html('');
        validation_div.append('<label>Special characters are not allowed.</label>');
    }else{
        if(password === confirmPassword){
            alert('password matched');
            if(password.length >= 8){
                $.ajax({
                    url: 'controller/add_user.php',
                    type: 'POST',
                    data: {
                        un : userName, pw: password, ln: lastName, fn:firstName, mn: middleInitial,
                        rId : roleId, rName : roleName
                    },
                    success: function(isSuccessful){
                        console.log("isSuccessful: "+isSuccessful);
                        alert("Successful added user.");
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
            }else{
                validation_div.html('');
                validation_div.append('<label>Password must contain at least 8 characters.</label>');
            }
        }else{
            validation_div.html('');
            validation_div.append('<label>Password didn\'t match.</label>');
        }
    }
}

//SEARCH FUNCTION
function searchUser() {
    $("#pageInput_searchUser").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_users_record tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
}

//REFRESH FUNCTION
function refreshTable(){

}

//LOAD TO TABLE FUNCTION
function loadAllUsersToTable(){
    $.ajax({
        url: 'controller/get_all_users.php',
        type: 'POST',
        dataType: 'json',
        success: function(userData){
            console.log("USER DATA: "+userData);
            var len = userData.length;
            $('#table_users_record').find("tr:not(:first)").remove();
            for (var i = 0; i < len; i++) {
                var userId = userData[i]['id'];
                var userName = userData[i]['username'];
                var lastName = userData[i]['lastname'];
                var firstName = userData[i]['firstname'];
                var middleInitial = userData[i]['middleinitial'];
                var roleName = userData[i]['roleName'];
                var isActive = userData[i]['isactive'] == true? "Active" : "Inactive";
                $('#table_users_record').append(
                    "<tr><td>" + userId + "</td>" +
                    "<td>" + roleName + "</td>" +
                    "<td>" + userName + "</td>" +
                    "<td>" + lastName + "</td>" +
                    "<td>" + firstName + "</td>" +
                    "<td>" + middleInitial + "</td>" +
                    "<td>" + isActive + "</td>" +
                    "<td>" + "<a id='"+userId+"' class='edit' href=''>Edit</a>" + "</td>" +
                    "<td>" + "<a id='' href='#'>" + "Delete" + "</a>" + "</td>" +
                    "</tr>"
                );
            }
            $('.edit').click(function(ev){
                ev.preventDefault();
                //do something with click
                showModal_editUser(ev.target.id);
            });
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
function addDataToTable(jsonObjArr){
    var json = JSON.parse(jsonObjArr);
    console.log(json);
    console.log(typeof json);
    var tbl = $("#modalTable_dataPreview");
    for(var i = 0; i < json.length-1; i++){
        var studentId = json[i]['studentId'];
        var firstName = json[i]['firstname'];
        var lastName = json[i]['lastname'];
        var middle = json[i]['middle'];
        tbl.append(
            "<tr><td>" + studentId + "</td>" +
            "<td>" + firstName + "</td>" +
            "<td>" + lastName + "</td>" +
            "<td>" + middle + "</td>" +
            "</tr>"
        );
    }
}

//LOAD TO DROPDOWN FUNCTIONS
function loadRolesToDropDown() {
    $.ajax({
        url: 'controller/get_all_roles.php',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            //alert("Successful retrieved JSON from PHP.");
            var len = data.length;
            //$("#modalDrpDown_selectRole").empty();
            for (var i = 0; i < len; i++) {
                console.log(data[i]['id']+", "+data[i]['rolename']);
                var roleId = data[i]['id'];
                var roleName = data[i]['rolename'];
                $('#modalDrpDown_selectRole').append("<option value='" + roleId + "'>" + roleName + "</option>");
            }
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
function loadSectionsToDropDown() {
    $.ajax({
        url: 'controller/get_all_sections.php',
        type: 'POST',
        dataType: 'json',
        success: function (sections) {
            var len = sections.length;
            for(var index = 0; i<len; i++){

            }
        }
    });
}


//SHOW MODAL FUNCTIONS
function showModal_addNewUser(){
    $('#container_modalAddNewUser').show();
}
function showModal_editUser(pUserId){
    $('#modal_header').text('Edit User');
    $.ajax({
        url: 'controller/get_user_by_id.php',
        type: 'POST',
        data:{id: parseInt(pUserId)},
        dataType: 'json',
        success: function (user) {
            console.log(user);
            var userId = user['id'];
            var userName = user['username'];
            var password = user['password'];
            var lastName = user['lastname'];
            var firstName = user['firstname']
            var middleInitial = user['middleinitial'];
            var roleId = user['roleId']
            var roleName = user['roleName'];
            var isActive = user['isactive'] === 1? "Active" : "Inactive";
            if(roleName.trim() === 'Administrator'){
                $('#modalInput_studentID').val('');
                $("#modalInput_studentID").prop("disabled", true); //disable the dropdown
                $("#modalDrpDown_section").prop("disabled", true); //disable the dropdown
                $("#modalDrpDown_teacher").prop("disabled", true); //disable the dropdown
                $("#modalInput_studentID").css("background-color","lightgrey"); //color the textfield grey
                $("#modalDrpDown_section").css("background-color","lightgrey"); //color the dropdown grey
                $("#modalDrpDown_teacher").css("background-color","lightgrey"); //color the dropdown grey
                $("#modalDrpDown_section").val($("#modalDrpDown_section option:first").val());
                $("#modalDrpDown_teacher").val($("#modalDrpDown_teacher option:first").val());
            }else if(roleName.trim() === 'Teacher'){
                $('#modalInput_studentID').val('');
                $("#modalInput_studentID").prop("disabled", true); //disable the dropdown
                $("#modalDrpDown_teacher").css("background-color","lightgrey"); //color the dropdown grey
                $("#modalDrpDown_teacher").val($("#modalDrpDown_teacher option:first").val());
                $("#modalDrpDown_teacher").prop("disabled", true); //disable the dropdown
                $("#modalDrpDown_section").prop("disabled", false); //disable the dropdown
            }else if(roleName.trim() === 'Student'){
                $("#modalDrpDown_section").prop("disabled", false); //disable the dropdown
            }
            $("#modalDrpDown_selectRole").val(roleId);
            $("#modalDrpDown_addNewUser_status").val(isActive);
            $('#modalInput_userName').val(userName);
            $('#modalInput_password').val(password);
            $('#modalInput_cPassword').val(password);
            $('#modalInput_lastName').val(lastName);
            $('#modalInput_firstName').val(firstName);
            $('#modalInput_middleInitial').val(middleInitial);
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
    $('#container_modalAddNewUser').show();
}
function showModal_uploadCSV(){
    $('#container_modalUploadCSV').show();
}

//CLOSE MODAL FUNCTIONS
function closeModal_addNewUser(){
    $('#container_modalAddNewUser').hide();
}
function closeModal_uploadCSV(){
    $('#container_modalUploadCSV').hide();
}

//VALIDATION FUNCTIONS
function validate_addNewUser(){

}





