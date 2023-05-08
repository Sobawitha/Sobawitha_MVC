
function openProfileMenu(){
    document.querySelector('.dropdown-content').style.display = "flex"    
}

function openNotificationMenu(){
    if(document.querySelector('.notification-dropdown-content').style.display == "flex"){
        document.querySelector('.notification-dropdown-content').style.display = "none" ;
    }
    else{
        document.querySelector('.notification-dropdown-content').style.display = "flex" ;
    }     
}

document.getElementById('bell').addEventListener('click', function() {
    // Check if notification count is greater than zero
    if (document.getElementById('no_of_notifications').innerHTML > 0) {
        // Set notification count to zero to hide it
        document.getElementById('no_of_notifications').innerHTML = 0;
    }
});


  


