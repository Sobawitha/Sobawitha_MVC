
    setTimeout(()=> {
        document.querySelector(".popup").style.display='none';
        document.getElementById("overlap1").style.display='none';
    }, 2000)

    function open_cansel_btn(){
        document.getElementById("cansel").style.display='block';
    }
    
    function clear_search_bar(){
        document.querySelector(".search_cont").value='';
        document.getElementById("cansel").style.display='none';
    }

