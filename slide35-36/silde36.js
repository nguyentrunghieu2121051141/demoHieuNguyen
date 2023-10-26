function validation(){
  let password1 = document.getElementById("password1").value;
  let password2 = document.getElementById("password2").value;
  console.log(password1,password2);
  if(password1.length != 0){
    if(password1 == password2){
      alert("Đăng kí thành công!");
    }
    else{
      alert("Mật khẩu không trùng khớp!");
    }
  }
  else{
    alert("Không được để trống!");
  }
}