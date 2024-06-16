// Animations
const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});


// Kiểm tra lỗi đăng ký
const form = document.querySelector('form')
const username = document.getElementById('username')
const usernameError = document.querySelector("#username-error")
const email = document.getElementById('email')
const emailError = document.querySelector("#email-error")
const password = document.getElementById('password')
const passwordError = document.querySelector("#password-error")

// Hiển thị thông báo lỗi đầu vào
function showError(input, message) {
    const formControl = input.parentElement
    formControl.className = 'form-control error'
    const small = formControl.querySelector('small')
    small.innerText = message
}


// Hiển thị thành công
function showSuccess(input) {
    const formControl = input.parentElement
    formControl.className = 'form-control success'
    const small = formControl.querySelector('small')
    small.innerText = ''
}

// Kiểm tra email hợp lệ
function checkEmail(email) {
    const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    return emailRegex.test(email);
}

email.addEventListener("input", function(){
    if (!checkEmail(email.value)) {
        emailError.textContent = "*Email không hợp lệ"
    }else {
        emailError.textContent = "";
    }
})


// Kiểm tra độ dài tên người dùng
username.addEventListener("input", function(){
    if (username.value.length < 4) {
        usernameError.textContent = "*Tên người dùng phải có ít nhất 8 ký tự."
    }else if(username.value.length > 20){
        usernameError.textContent = "*Tên người dùng phải nhỏ hơn 20 ký tự.";
    }else {
        usernameError.textContent = "";
    }
})

// Kiểm tra độ dài mật khẩu
password.addEventListener("input", function(){
    if (password.value.length < 8) {
        passwordError.textContent = "*Mật khẩu phải có ít nhất 8 ký tự."
    }else if(password.value.length > 20){
        passwordError.textContent = "*Mật khẩu phải nhỏ hơn 20 ký tự."
    }else {
        passwordError.textContent = "";
    }
})


// Kiểm tra các trường bắt buộc
function checkRequired(inputArr) {
    let isRequired = false
    inputArr.forEach(function(input) {
        if (input.value.trim() === '') {
            showError(input, `*${getFieldName(input)} is required`)
            isRequired = true
        }else {
            showSuccess(input)
        }
    })

    return isRequired
}
// Lấy tên trường nhập
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1)
}

// Sự kiện nghe
form.addEventListener('submit', function (e) {
    e.preventDefault()

    if (!checkRequired([username, email, password])) {
        checkLength(username, 3, 15)
        checkLength(password, 6, 25)
        checkEmail(email)
    } 
})

// Kiểm tra Lỗi Khi Đăng Nhập

let lgForm = document.querySelector('.form-lg')
let lgEmail = document.querySelector('.email-2')
let lgEmailError = document.querySelector(".email-error-2")
let lgPassword = document.querySelector('.password-2')
let lgPasswordError = document.querySelector(".password-error-2")

function showError2(input, message) {
    const formControl2 = input.parentElement
    formControl2.className = 'form-control2 error'
    const small2 = formControl2.querySelector('small')
    small2.innerText = message
}

function showSuccess2(input) {
    const formControl2 = input.parentElement
    formControl2.className = 'form-control2 success'
    const small2 = formControl2.querySelector('small')
    small2.innerText = '';
}

// Kiểm tra email có hợp lệ không
function checkEmail2(lgEmail) {
    const emailRegex2 = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    return emailRegex2.test(lgEmail);
}

lgEmail.addEventListener("input", function(){
    if (!checkEmail2(lgEmail.value)) {
        lgEmailError.textContent = "*Email không hợp lệ"
    }else {
        lgEmailError.textContent = "";
    }
})

// Kiểm tra chiều dài đầu vào passwrod
lgPassword.addEventListener("input", function(){
    if (lgPassword.value.length < 8) {
        lgPasswordError.textContent = "*Mật khẩu phải có ít nhất 8 ký tự."
    }else if (lgPassword.value.length > 20){
        lgPasswordError.textContent = "*Mật khẩu phải nhỏ hơn 20 ký tự."
    }else {
        lgPasswordError.textContent = "";
    }
})

function checkRequiredLg(inputArr2) {
    let isRequiredLg = false
    inputArr2.forEach(function(input){
        if (input.value.trim() === '') {
            showError2(input, `*${getFieldNameLg(input)} Vui lòng nhập thông tin của bạn vào`)
            isRequiredLg = true
        }else {
            showSuccess2(input)
        }
    })

    return isRequiredLg
}

function getFieldNameLg(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1)
}

lgForm.addEventListener('submit', function (e){
    e.preventDefault()

    if (!checkRequiredLg([lgEmail, lgPassword])) {
        checkEmail2(lgEmail)
    }
})