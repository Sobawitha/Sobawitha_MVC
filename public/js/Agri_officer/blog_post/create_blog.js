

    function open_cansel_btn(){
        document.getElementById("cansel").style.display='block';
    }
    
    function clear_search_bar(){
        document.querySelector(".search_cont").value='';
        document.getElementById("cansel").style.display='none';
    }

    function popUpOpen(id) {
        const deletePopup = document.getElementById('deletePopup')
        document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
        deletePopup.showModal();
        document.getElementById('deletebtn').value=id;
        
    }


    function updatepopUpOpen(id,title, tag, discription,image) {

        // console.log(id);
        // console.log(title);
        // console.log(tag);
        // console.log(discription);
   

      const deletePopup = document.getElementById('updatePopup');
      document.getElementById('cancelbtn').addEventListener('click',() => updatePopup.close());
      updatePopup.showModal();
      document.getElementById('updatebutton').value=id;
      document.getElementById('title').value=title;
      document.getElementById('upload_image').value=image;
      
    if(tag == 'Innovations'){
        document.getElementById('innovations').checked = true;
    }
    else if(tag=='Knowledge'){
        document.getElementById('knowledge').checked = true;
    }
    else if(tag=='New_technique'){
        document.getElementById('new_technique').checked = true;
    }
    else if(tag=='Production'){
        document.getElementById('production').checked = true;
    }
    document.getElementById('discription').value=discription;
      
  }


  var loadFile = function(event) {
	var image = document.getElementById('upload_image');
	image.src = URL.createObjectURL(event.target.files[0]);
};
    

var loadFile1 = function(event) {
	var image = document.getElementById('upload_image1');
	image.src = URL.createObjectURL(event.target.files[0]);
};
