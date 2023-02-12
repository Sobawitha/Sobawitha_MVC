
// alert();
function popUpOpen() {
        const addUserPopup = document.getElementById('addUserPopup')
          document.getElementById('sign_up').addEventListener('click',() => addUserPopup.showModal());
          document.getElementById('closebtn').addEventListener('click',() => addUserPopup.close());
}