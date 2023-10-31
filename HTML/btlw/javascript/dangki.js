function validation(){
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
    console.log(password1,password2);
    let notify = document.getElementById("notify");
    
      if(password1 != password2){
        notify.textContent = "Mật khẩu không trùng khớp. Vui lòng nhập lại!";
        notify.style.backgroundColor = red;
      }
    
  }