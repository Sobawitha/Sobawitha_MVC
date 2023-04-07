// const activepage = window.location.pathname;
// const sidebarlink = document.querySelectorAll('li a').forEach(link => {
//     if(link.href.includes(`${activepage}`)){
//         link.classList.add('active');
//     }
// });


$(document).ready(function() {
    // Update the active tab on page load
    updateActiveTab();
    
    // Update the active tab whenever a new tab is clicked
    $('.tab').click(function() {
      updateActiveTab();
    });
  });
  
  function updateActiveTab() {
    var activeTab = $('.tab.active');
    $('.tab').removeClass('active');
    activeTab.addClass('active');
  }
  