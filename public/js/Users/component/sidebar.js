const activepage = window.location.pathname;
const sidebarlink = document.querySelectorAll('li a').forEach(link => {
    if(link.href.includes(`${activepage}`)){
        link.classList.add('active');
    }
});