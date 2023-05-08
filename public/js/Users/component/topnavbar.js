
function openProfileMenu(){
    document.querySelector('.dropdown-content').style.display = "flex"    
}

function openNotificationMenu(){
    document.querySelector('.notification-dropdown-content').style.display = "flex"    
}

// window.addEventListener('load', function() {
//     var msgBox = document.querySelector('.success-msg');
//     if (msgBox) {
//       var progressBar = document.querySelector('.progress-bar');
//       var width = 0;
//       var intervalId = setInterval(function() {
//         if (width >= 100) {
//           clearInterval(intervalId);
//           setTimeout(function() {
//             msgBox.style.display = 'none';
//             progressBar.style.display = 'none';
//           }, 500);
//         } else {
//           width += 1;
//           progressBar.style.width = width + '%';
//         }
//       }, 20);
//     }
//   });


// function openNotificationMenu(){
//     document.querySelector('.notification-dropdown-content').style.display = "flex";
    
//     // Add event listener to document
//     document.addEventListener('click', closeNotificationMenu);
// }

// document.addEventListener('click', closeNotificationMenu);
// function closeNotificationMenu(event) {
//     const dropdownContent = document.querySelector('.notification-dropdown-content');
//     if (!dropdownContent.contains(event.target)) {
//         dropdownContent.style.display = "none";
//         document.removeEventListener('click', closeNotificationMenu);
//     }
// }



// function openNotificationMenu() {
//     document.querySelector('.notification-dropdown-content').style.display = "flex";
  
//     // add event listener to the document object
//     document.addEventListener('click', closeNotificationMenu);
//   }
  
//   function closeNotificationMenu(e) {
//     const dropdown = document.querySelector('.notification-dropdown-content');
//     const isClickedInside = dropdown.contains(e.target);
  
//     if (!isClickedInside) {
//       dropdown.style.display = "none";
//       // remove the event listener to prevent unnecessary function calls
//       document.removeEventListener('click', closeNotificationMenu);
//     }
//   }
  


