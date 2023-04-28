

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
   
      const updatePopup = document.getElementById('updatePopup');
      document.getElementById('cancelbtn').addEventListener('click',() => updatePopup.close());
      updatePopup.showModal();
      document.getElementById('updatebutton').value=id;
      document.getElementById('title').value=title;
      var imageElement = document.getElementById('upload_image');
      var imgURL = ".././public/upload/blog_post_images/"+image;
      imageElement.setAttribute('src', imgURL);

      
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


  function viewmorepopUpOpen(id,title, tag, discription,image) {
   
    const viewmorePopup = document.getElementById('viewmorePopup');
    document.getElementById('cancelbtn').addEventListener('click',() => viewmorePopup.close());
    viewmorePopup.showModal();
    document.getElementById('titles').value=title;
    var imageElement = document.getElementById('upload_images');
    var imgURL = ".././public/upload/blog_post_images/"+image;
    imageElement.setAttribute('src', imgURL);

    
  if(tag == 'Innovations'){
      document.getElementById('innovations_tag').checked = true;
  }
  else if(tag=='Knowledge'){
      document.getElementById('knowledge_tag').checked = true;
  }
  else if(tag=='New_technique'){
      document.getElementById('new_technique_tag').checked = true;
  }
  else if(tag=='Production'){
      document.getElementById('production_tag').checked = true;
  }
  document.getElementById('discription_area').value=discription;

  /*disable edit */
  document.getElementById("title").disabled = true;
  document.getElementById("tag").disabled = true;
  document.getElementById("discription").disabled = true;
  document.getElementById("image").disabled = true;
    
  }


  var loadFile = function(event) {
	var image = document.getElementById('upload_image');
	image.src = URL.createObjectURL(event.target.files[0]);
};
    

var loadFile1 = function(event) {
	var image = document.getElementById('upload_image1');
	image.src = URL.createObjectURL(event.target.files[0]);
};

/*for alert message */
window.onload = function() {
    create_blogpost_popup = document.getElementById("popup");
    document.getElementById("popup").style.display = "block";
    //Set timeout to hide popup after 5 seconds
    setTimeout(function() {
        create_blogpost_popup.style.display = "none";
    }, 5000);
  };

  /*for alert message */
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


  window.addEventListener('load', function() {
    var msgBox = document.querySelector('.error-msg');
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