setTimeout(function() {
    var errorMessage = document.getElementById('set_message');
    if (errorMessage) {
      errorMessage.style.display = 'none';
    }
}, 10000); 


const openDialogBtn = document.querySelector('#openDialog');
const dialog = document.querySelector('#helpDialog');

openDialogBtn.addEventListener('click', function() {
dialog.showModal();
});

dialog.querySelector('.dialog-close').addEventListener('click', function() {
dialog.close();
});

