// alert();
function popUpOpen() {
const addUserPopup = document.getElementById('addUserPopup')
  document.getElementById('addNewUser').addEventListener('click',() => addUserPopup.showModal());
  document.getElementById('closebtn').addEventListener('click',() => addUserPopup.close());
}
// const openModalButton = document.querySelector('#addNewUser');
// const modal = document.querySelector('.modal');
// const closeButton = document.querySelector('.close-button');

// openModalButton.addEventListener('click', function() {
//   modal.style.display = "block";
// });

// closeButton.addEventListener('click', function() {
//   modal.style.display = "none";
// });

// window.addEventListener('click', function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// });