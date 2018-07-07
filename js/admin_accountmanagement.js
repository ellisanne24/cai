console.log('admin_accountmanagement.js is loaded');

$(document).on('click', '#btn_AddUser', show_add_user_modal);
$(document).on('click', '.close_addUser', close_add_user_modal);
$(document).on('click', '#button_save', addUser);

$('#csv_file_input').on('change', function (e) {
    var ext = $("#csv_file_input").val().split(".").pop().toLowerCase(); //csv
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

function addDataToTable(jsonObjArr){
    var json = JSON.parse(jsonObjArr);
    console.log(json);
    console.log(typeof json);
    var tbl = $("#data_preview");
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

$('#roledropdown').on('change', function() {
    var roleId = this.value;
    var roleName = $("#roledropdown option:selected").text();
    if(roleName === 'Administrator'){
        console.log(roleName);
        $("#input_studentid").prop("disabled", true); //disable the dropdown
        $("#section_dropdown").prop("disabled", true); //disable the dropdown
        $("#teacher_dropdown").prop("disabled", true); //disable the dropdown

        $("#input_studentid").css("background-color","lightgrey"); //color the textfield grey
        $("#section_dropdown").css("background-color","lightgrey"); //color the dropdown grey
        $("#teacher_dropdown").css("background-color","lightgrey"); //color the dropdown grey
    }else{
        $("#input_studentid").prop("disabled", false); //enable dropdown
        $("#section_dropdown").prop("disabled",false); //enable the dropdown
        $("#teacher_dropdown").prop("disabled",false); //enable the dropdown
        $("#input_studentid").css("background-color","white"); //color the textfield white
        $("#section_dropdown").css("background-color","white"); //color the dropdown white
        $("#teacher_dropdown").css("background-color","white"); //color the dropdown white
    }
})

$(document).ready(function(){
    loadRolesToDropDown();
    //setInterval(function(){
    //    loadAllUsersToTable();
    //},1000);
    loadAllUsersToTable();
});


function reset_form(){
    $("#roledropdown").val($("#roledropdown option:first").val());
    $("#section_dropdown").prop($("#section_dropdown option:first").val());
    $("#teacher_dropdown").prop($("#teacher_dropdown option:first").val());
    $("#section_dropdown").prop("disabled",false);
    $("#teacher_dropdown").prop("disabled",false);
    $("#input_studentid").val("");
    $("#input_username").val("");
    $("#input_password").val("");
    $("#input_confirm_password").val("");
    $("#input_lastname").val("");
    $("#input_firstname").val("");
    $("#input_middleinitial").val("");
}

function show_edit_user_modal(pUserId){
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
                $('#input_studentid').val('');
                $("#input_studentid").prop("disabled", true); //disable the dropdown
                $("#section_dropdown").prop("disabled", true); //disable the dropdown
                $("#teacher_dropdown").prop("disabled", true); //disable the dropdown
                $("#input_studentid").css("background-color","lightgrey"); //color the textfield grey
                $("#section_dropdown").css("background-color","lightgrey"); //color the dropdown grey
                $("#teacher_dropdown").css("background-color","lightgrey"); //color the dropdown grey
                $("#section_dropdown").val($("#section_dropdown option:first").val());
                $("#teacher_dropdown").val($("#teacher_dropdown option:first").val());
            }else if(roleName.trim() === 'Teacher'){
                $('#input_studentid').val('');
                $("#input_studentid").prop("disabled", true); //disable the dropdown
                $("#teacher_dropdown").css("background-color","lightgrey"); //color the dropdown grey
                $("#teacher_dropdown").val($("#teacher_dropdown option:first").val());
                $("#teacher_dropdown").prop("disabled", true); //disable the dropdown
                $("#section_dropdown").prop("disabled", false); //disable the dropdown
            }else if(roleName.trim() === 'Student'){
                $("#section_dropdown").prop("disabled", false); //disable the dropdown
            }
            $("#roledropdown").val(roleId);
            $("#user_status_dropdown").val(isActive);
            $('#input_username').val(userName);
            $('#input_password').val(password);
            $('#input_confirm_password').val(password);
            $('#input_lastname').val(lastName);
            $('#input_firstname').val(firstName);
            $('#input_middleinitial').val(middleInitial);
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

function show_add_user_modal(event) {
    reset_form();
    $('#active_dropdown :nth-child(1)').prop('selected', true);
    $('#active_dropdown').prop('disabled',true);
    $('#active_dropdown').css("background-color","lightgrey");

    $('#container_modalAddNewUser').show();
}
function close_add_user_modal(event){
    $('#container_modalAddNewUser').hide();
}

function addUser(){
    var validation_div = $('#modal_input_validation_container');
    var lastName = $('#input_lastname').val().trim();
    var firstName = $('#input_firstname').val().trim();
    var middleInitial = $('#input_middleinitial').val().trim();
    var userName  = $('#input_username').val().trim();
    var password = $('#input_password').val().trim();
    var confirmPassword = $('#input_confirm_password').val().trim();
    var roleId = $('#roledropdown option:selected').val();
    var roleName = $("#roledropdown option:selected").text();

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

$('#edit_link').click(function () {
    alert("test")
});

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
                show_edit_user_modal(ev.target.id);
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

function loadRolesToDropDown() {
    $.ajax({
        url: 'controller/get_all_roles.php',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            //alert("Successful retrieved JSON from PHP.");
            var len = data.length;
            //$("#roledropdown").empty();
            for (var i = 0; i < len; i++) {
                console.log(data[i]['id']+", "+data[i]['rolename']);
                var roleId = data[i]['id'];
                var roleName = data[i]['rolename'];
                $('#roledropdown').append("<option value='" + roleId + "'>" + roleName + "</option>");
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

//UPLOAD CSV MODAL

function uploadCsv(){
    var modal = document.getElementById('container_modal_uploadCsv');
    var btn = document.getElementById("btn_Upload");
    var span = document.getElementsByClassName("close_uploadCsv")[0];

    modal.style.display = "block";

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
