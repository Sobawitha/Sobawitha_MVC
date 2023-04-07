// alert();
window.addEventListener('load', function() {
    var msgBox = document.querySelector('.success-msg');
    if (msgBox) {
      var progressBar = document.querySelector('.progress-bar');
      var width = 0;
      var intervalId = setInterval(function() {
        if (width >= 100) {
          clearInterval(intervalId);
          setTimeout(function() {
            msgBox.style.display = 'none';
            progressBar.style.display = 'none';
          }, 500);
        } else {
          width += 1;
          progressBar.style.width = width + '%';
        }
      }, 20);
    }
  });

// const notificationContainer = document.getElementById('notification-container')
// let updatedMessage = document.getElementById('isUpdated')
// // let updatedPasswordMessage = document.getElementById('isUpdatedPassword')


// // Successfully updated profile for Admin
// if (updatedMessage.innerText) {
//     const notification = document.createElement('div')
//     notification.classList.add('notification')
//     notification.classList.add('success')
//     notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> User account is updated successfully'
//     notificationContainer.appendChild(notification)
//     setTimeout(() => {
//         notification.remove()
//     }, 6000)
//     updatedMessage.innerText = ""
// }


// Successfully updated password for Admin
// if (updatedPasswordMessage.innerText) {
//     const notification = document.createElement('div')
//     notification.classList.add('notification')
//     notification.classList.add('success')
//     notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> You are succesfully changed Password!'
//     notificationContainer.appendChild(notification)
//     setTimeout(() => {
//         notification.remove()
//     }, 6000)
//     updatedPasswordMessage.innerText = ""
// }



