function applicationSubmit() {
    var result = true;

    var fname = document.getElementById('user_firstname');
    if (fname.value == '') {
        showError("Provide firstname", "fname_div");
        result = false;
    }
    
    // const pattern = /[a-zA-Z]{2,20}/;
    // if (!pattern.test(fname)) {
    //     showError("Firstname must contain only letters and be from 2 to 20 characters", "fname_div");
    //     result = false;
    // }

    // var phone = document.getElementById('phone');
    // console.log(phone.value);
    // var phone_p = /[0-9]{10}/;
    // if (!phone_p.test(phone.value)) {
    //     showError("Phone must contain only digits and have 10 characters", "phone_div");
    //     result = false;
    // }
    return result;
}

function showError(message, div_id) {
    var error = document.createElement('div');
    error.style = "color:red;font-size:12px;margin-bottom:10px";
    error.innerHTML = message;
    document.getElementById(div_id).appendChild(error);
}