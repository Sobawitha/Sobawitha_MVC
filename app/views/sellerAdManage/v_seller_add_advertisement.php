<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/sellerSidebar.php'; ?>
<link rel="stylesheet" href="../css/seller/seller_add_advertisment.css"></link>

<div class="body">
        <div class="category"></div>
        <div class="card_section">
          <section class="registerUser">
          &nbsp<br><br>
          <div class="content">
          <h1>Add New Listing</h1>
                  <hr>
                  <form action="includes/addnewlisting.inc.php" method="post" enctype="multipart/form-data">
                            <div>
                              <label>Select Image of the Product</label>
                              <input type =file name="image" required="true" id="image">
                                <!-- <label >Select Multiple Images</label>
                                <input type="file" id="files"  multiple="multiple" accept="image/jpeg, image/png, image/jpg" >
                                <output id ="result">
                              <script>
              document.querySelector("#files").addEventListener("change", (e) => {
              if(window.File && window.FileReader && window.FileList && window.Blob){
                  const files = e.target.files;
                  const output =document.querySelector("#result");

                  for(let i =0 ; i<5; i++){
                      if(!files[i].type.match("image")) continue;
                      const picReader =new FileReader();
                      picReader.addEventListener("load", function(event){
                          const picFile = event.target;
                          const div = document.createElement("div");
                          div.innerHTML =`<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
                          output.appendChild(div)
                      })
                      picReader.readAsDataURL(files[i]);
                  }
              }else{
                  alert("Your browser does not support the File API")
              }
          })
          </script> -->    <!------preview---- -->

                                
                                
                              </div>
                            <div> 
                                <label>Title</label>
                                <input type="text" id="title" name="title" required="true" >
                                <label>Category</label><br>
                                <select name="category" id="category">
                                <option value="Paddy">Paddy</option>
                              <option value="Vegetables">Vegetables</option>
                              <option value="Tea">Tea</option>
                              <option value="Coconut">Coconut</option>
                              <option value="Flowers">Flowers</option>
                              <option value="Rubber">Rubber</option>
                              <option value="Othercrops">Other Crops</option>
                              

                          </select><br><br>

                                <label>Certificate No</label>
                                <input type="text" name="certificateNo" id="certificateNo" required="true">

                                <br>
                                <label>Manufacturer</label>
                                <input type="text" name="manufacturer" id="manufacturer" required="true" >

                                <br>
                                <label>Description</label>
                                <input type="text" name="desc" id="desc" required="true" >

                                <br>
                                <label>Price</label>
                                <input type="text" name="price" id="price" required="true" >
                                <label>Quantity</label>
                                <input type="text" name="quantity" id="quantity" required="true" >

                                <label>Location</label>
                                <select name="location" id="location">
                              <option value="ampara">Ampara</option>
                              <option value="anuradhapura">Anuradhapura</option>
                              <option value="badulla">Badulla</option>
                              <option value="batticaloa">Batticaloa</option>
                              <option value="colombo">Colombo</option>
                              <option value="galle">Galle</option>
                              <option value="gampaha">Gampaha</option>
                              <option value="hambantota">Hambantota</option>
                              <option value="jaffna">Jaffna</option>
                              <option value="kalutara">Kalutara</option>
                              <option value="kandy">Kandy</option>
                              <option value="kegalle">Kegalle</option>
                              <option value="kilinochchi">Kilinochchi</option>
                              <option value="kurunegala">Kurunegala</option>
                              <option value="mannar">Mannar</option>
                              <option value="matale">Matale</option>
                              <option value="matara">Matara</option>
                              <option value="monaragala">Monaragala</option>
                              <option value="mullaitivu">Mullaitivu</option>
                              <option value="nuwaraeliya">Nuwara Eliya</option>
                              <option value="polonnaruwa">Polonnaruwa</option>
                              <option value="puttalam">Puttalam</option>
                              <option value="ratnapura">Ratnapura</option>
                              <option value="trincomalee">Trincomalee</option>
                              <option value="vavuniya">Vavuniya</option>

                          </select><br><br>
        </section>
  </div>
</div>
        <div class="category"></div>
</div>




