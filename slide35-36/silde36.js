function validation(){
    const password1El = document.getElementById('password1');
    const password2El = document.getElementById('password2');
    let passwordsMatch = false;

    if (password1El.value === password2El.value) {
        passwordsMatch = true;
        password1El.style.borderColor = 'green';
        password2El.style.borderColor = 'green';
      } 
      else {
        passwordsMatch = false;
        message.textContent = 'Mật khẩu không trùng. Vui lòng nhập lại mật khẩu!';
        message.style.color = 'red';
        messageContainer.style.borderColor = 'red';
        password1El.style.borderColor = 'red';
        password2El.style.borderColor = 'red';
        return;
      }
      
      if (isValid && passwordsMatch) {
        message.textContent = 'Đăng kí thành kông!';
        message.style.color = 'green';
        messageContainer.style.borderColor = 'green';
      }
}
