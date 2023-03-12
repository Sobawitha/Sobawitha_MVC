// alert();
function popUpOpen() {
    const addUserPopup = document.getElementById('addUserPopup')
      document.getElementById('sign_up').addEventListener('click',() => addUserPopup.showModal());
      document.getElementById('closebtn').addEventListener('click',() => addUserPopup.close());
}

function popUpOpenForgot() {
    const addUserPopup = document.getElementById('forgotPasswordDialog')
      document.getElementById('forgot_pwd').addEventListener('click',() => addUserPopup.showModal());
      document.getElementById('closebtnforgot').addEventListener('click',() => addUserPopup.close());
}
