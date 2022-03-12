function changeUserStatus(id, status) {

    const info = [id, status];
    var x = 'isActive' + id;
    var y = 'isInactive' + id;
    var m = 'changeStatusToActive' + id;
    var n = 'changeStatusToInActive' + id;


    $.ajax({
        url: "../actions/changeGymBoyDetails.php",
        type: "POST",
        data: { info: info },
        dataType: "json",
        success: function(resp) {
            if (!resp['error']) {
                if (resp['s'] == 0) {
                    $(`#${x}`).replaceWith(`<div class='col-md-1' style='align-items: right;' id=isInactive${id}><div class='userStatusInactive'>Inactive</div></div>`);
                    $(`#${n}`).replaceWith(`<a href="#" id="changeStatusToActive${id}" onclick="changeUserStatus(${id},${resp['s']})">Make Active</a>`);
                } else {
                    $(`#${y}`).replaceWith(`<div class='col-md-1 userIsActive' style='align-items: right;' id=isActive${id}><div class='userStatusPresent'>Active</div></div>`);
                    $(`#${m}`).replaceWith(`<a href="#" id="changeStatusToInActive${id}" onclick="changeUserStatus(${id},${resp['s']})">Make InActive</a>`)
                }
            }

        }
    })

}


function FilterOutUsers() {


    var x = document.getElementById('userFilterOptions').value;

    var filter, ul, li, a, i, txtValue;
    if (x == 1) {
        filter = 'active'.toUpperCase();
    }
    if (x == 2) {
        filter = 'inactive'.toUpperCase()
    }
    console.log(filter)
    input = document.getElementById('userSearch');
    ul = document.getElementById("usersList");
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("div")[3];

        txtValue = a.textContent || a.name;
        if (txtValue.toUpperCase() === filter) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }

    if (x == 0 || x == 3) {
        for (i = 0; i < li.length; i++) {
            li[i].style.display = "";
        }
    }

}


function searchUser() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('userSearch');
    filter = input.value.toUpperCase();
    ul = document.getElementById("usersList");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("span")[0];
        txtValue = a.textContent || a.name;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}


// Get the modal
var modal3 = document.getElementById("userModalDetails");
var modal2 = document.getElementById("AddTrainerModal");

// Get the <span> element that closeButtons the modal
var close1 = document.getElementsByClassName("closeButton")[0];

// When the user clicks the button, open the modal 
function showUserDetailModal(name, fathername, address, fee, gender, contact, email, weight, status, id, joinDate, trainer) {
    modal3.style.display = "block";
    document.getElementById('userModalName').innerHTML = name;
    document.getElementById('modalUserEmail').innerHTML = email ? email : 'N/A';
    document.getElementById('modalUserAddress').innerHTML = address ? address : 'N/A';
    document.getElementById('modalUserContact').innerHTML = contact;
    document.getElementById('modalUserGender').innerHTML = gender;
    document.getElementById('modalUserFname').innerHTML = fathername ? fathername : 'N/A';
    document.getElementById('modalUserJoinDate').innerHTML = joinDate;
    document.getElementById('modalUserWeight').innerHTML = weight;
    document.getElementById('modalUserFee').innerHTML = fee;
    document.getElementById('modalUserTrainer').innerHTML = trainer ? trainer : 'N/A'

    if (status == 1) {
        document.getElementById('modalUserActive').style.display = 'block';
        document.getElementById('modalUserInActive').style.display = 'none';
    } else {
        document.getElementById('modalUserInActive').style.display = 'block';
        document.getElementById('modalUserActive').style.display = 'none';
    }

}

// When the user clicks on <span> (x), close the modal
close1.onclick = function() {
    modal3.style.display = 'none';

}
document.getElementById('closebutton1').addEventListener("click", function() { modal2.style.display = 'none'; });

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal3 || event.target == modal2) {
        modal3.style.display = "none";
        modal2.style.display = "none";
    }
}

function assignTrainerModal(id) {
    modal2.style.display = "block";
    document.getElementById('assignTrainerTo').value = id;
}

$('form.assignTrainerajax').on('submit', function() {
    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value) {
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: method,
        data: data,
        dataType: "json",
        success: function(resp) {
            if (resp['error']) {
                showAssignTrainerError(resp.error);
            } else {
                showSuccessOnTrainerAssigned(resp.to, resp.trainer_name);
            }
        }
    })
    return false;
});


function showAssignTrainerError(err) {

    var x = document.getElementById('TrainerAssignError');
    x.style.display = "block";
    x.innerHTML = err;
}

function showSuccessOnTrainerAssigned(id, to) {

    var i = "btn" + id;
    $(`#${i}`).replaceWith(`<div style='background-color:green;color:white; font-size:14px; padding: 7px; border-radius:5px; margin-right:4px;'><i class='far fa-user' style='margin-right:3px'></i>${to}</div>`);

    modal2.style.display = "none";

    displaySuccessMessage("Trainer assigned");

}

function sortOutUsers() {

    var list, i, switching, b, shouldSwitch;
    list = document.getElementById("usersList");
    switching = true;
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // start by saying: no switching is done:
        switching = false;
        b = list.getElementsByClassName("userName");
        // Loop through all list-items:
        for (i = 0; i < (b.length - 1); i++) {
            console.log(b[i]);
            // start by saying there should be no switching:
            shouldSwitch = false;
            /* check if the next item should
            switch place with the current item: */
            if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
                /* if next item is alphabetically
                lower than current item, mark as a switch
                and break the loop: */
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark the switch as done: */
            b[i].parentNode.insertBefore(b[i + 1], b[i]);
            switching = true;
        }
    }
}


function showEditUserDetailsForm(name, fathername, address, fee, gender, contact, email, weight, status, id, joinDate, trainer) {

    var editUsermodal = document.getElementById("EditUserDetails");

    var closeEdituser = document.getElementsByClassName("closeEditUser")[0];

    editUsermodal.style.display = "block";

    closeEdituser.onclick = function() {
        editUsermodal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == editUsermodal) {
            editUsermodal.style.display = "none";
        }
    }

    var val = 0;
    var name2 = $("form[name='userEditForm'] input[name='name']").val(name);
    var contact2 = $("form[name='userEditForm'] input[name='contact']").val(contact);
    var fee2 = $("form[name='userEditForm'] input[name='fee']").val(fee);
    var email2 = $("form[name='userEditForm'] input[name='email']").val(email);
    var address2 = $("form[name='userEditForm'] input[name='address']").val(address);
    var fatherName2 = $("form[name='userEditForm'] input[name='fatherName']").val(fathername);
    var joinDate2 = $("form[name='userEditForm'] input[name='joinDate']").val(joinDate);
    var weight2 = $("form[name='userEditForm'] input[name='weight']").val(weight);
    if (gender == 'Male') {
        val = 1;
    } else if (gender == 'Female') {
        val = 2;
    } else val = 3;

    var gender2 = $("form[name='userEditForm'] input[name='gender']").val(val);
    var i = $("form[name='userEditForm'] input[name='id']").val(id);
    var lastEmail = $("form[name='userEditForm'] input[name='lastEmail']").val(email);
    var tr = $("form[name='userEditForm'] input[name='trainer']").val(trainer);
    var gend = $("form[name='userEditForm'] input[name='gender']").val(gender);
    var stat = $("form[name='userEditForm'] input[name='status']").val(status);

}

$(function() {
    $("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd' });
});

$('form.userEditFormajax').on('submit', function() {
    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value) {
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: method,
        data: data,
        dataType: "json",
        success: function(resp) {
            if (resp['error']) {
                showEditFormError(resp.error);
            } else {
                showEditFormSuccess(resp);
            }
        }
    })
    return false;
});

function showEditFormError(error) {

    document.getElementById('editUserFormErrors').style.display = 'block';
    document.getElementById('userEditFormErrorMessage').innerHTML = error;
    setTimeout(function() {
        $('#editUserFormErrors').fadeOut('fast');
    }, 2500);
}

function showEditFormSuccess(resp) {
    var id = resp.id;
    $(`#membername${id}`).html(resp.name);
    $(`#memberContact${id}`).html(resp.contact);
    $(`#memeberJoinDate${id}`).html(resp.date_created)
    $(`#memberFee${id}`).html(resp.fee);
    $(`#memeberAvatar${id}`).replaceWith(`<img src="./views/images/user.png" alt="Avatar" id="memeberAvatar${id}" class="avatar" onclick="showUserDetailModal('${resp.name}','${resp.fathername}','${resp.address}','${resp.fee}','${resp.gender}','${resp.contact}','${resp.email}','${resp.weight}','${resp.status}','${resp.id}','${resp.date_created}','${resp.trainer}')">`)
    $(`#editUserButton${id}`).replaceWith(`<a href="#" id="editUserButton${id}" onclick="showEditUserDetailsForm('${resp.name}','${resp.fathername}','${resp.address}','${resp.fee}','${resp.gender}','${resp.contact}','${resp.email}','${resp.weight}','${resp.status}','${resp.id}','${resp.date_created}','${resp.trainer}')">Edit User</a>`)
    document.getElementById("EditUserDetails").style.display = "none";
    displaySuccessMessage('Changes Saved');
}

function deleteUser(id, name) {
    if (confirm(`Do you want to delete ${name}`)) {
        $.ajax({
            url: '../actions/deleteUser.php',
            type: "POST",
            data: { 'id': id },
            dataType: "json",
            success: function(resp) {
                if (resp.error) {
                    alert(`Cannot delete User ${resp.error}`)

                } else {
                    displaySuccessMessage('User deleted');
                    $(`$list${id}`).remove();
                }
            }
        })
    } else {
        console.log('no')
    }
}