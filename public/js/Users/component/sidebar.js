// const activepage = window.location.pathname;
// const sidebarlink = document.querySelectorAll('li a').forEach(link => {
//     if(link.href.includes(`${activepage}`)){
//         link.classList.add('active');
//     }
// });

// Get the current URL path
var path = window.location.pathname;

// Get all links in the sidebar
var links = document.querySelectorAll('.sidebar ul li a');
// Loop through the links and add the "active" class to the one that matches the current path
for (var i = 0; i < links.length; i++) {
  var link = links[i];

  if (link.getAttribute('href') === path) {
    link.classList.add('active');
  }
}
