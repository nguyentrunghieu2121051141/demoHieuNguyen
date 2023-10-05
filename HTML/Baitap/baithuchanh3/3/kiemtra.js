function validate() {
    var u = document.getElementById("username").value;
    var p1 = document.getElementById("password").value;
    var p2 = document.getElementById("password-repeat").value;
    var p3 = document.getElementById("mail").value;
    var p4 = document.getElementById("tel").value;
    var p5 = document.getElementById("answer").value;
    
    if(u== "") {
    alert("Vui lòng nhập tên!");
    return false;
    }
    if(p1 == "") {
    alert("Vui lòng nhập mật khẩu!");
    return false;
    }
    if(p2 == "") {
    alert("Vui lòng xác minh mật khẩu!");
    return false;
    }
    if{
    }
    if(p3== "") {
        alert("Vui lòng nhập mail!");
        return false;
        }
        if(p4 == "") {
        alert("Vui lòng nhập số điện thoại!");
        return false;
        }
        if(p5 == "") {
        alert("Vui lòng nhập câu trả lời!");
        return false;
        }
    
    
    alert("Xin hãy điền đúng thông tin!")
    
    return true;
    }
    var password = document.getElementById("password")
  , password-repeat = document.getElementById("password-repeat");

function validatePassword(){
  if(password.value != password-repeat.value) {
    password-repeat.setCustomValidity("Mật khẩu không đúng. Vui lòng nhập lại");
  } else {
    password-repeat.setCustomValidity('');
  }
}

password.onchange = validatePassword;
password-repeat.onkeyup = validatePassword;