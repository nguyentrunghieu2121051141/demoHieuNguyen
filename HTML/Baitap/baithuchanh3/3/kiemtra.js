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
    if(p2 != p3){
        alert("Mật khẩu không đúng, vui lòng nhập lại!");
        return false;
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
    
    return true;
    }

    
    