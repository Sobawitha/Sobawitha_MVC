<link rel="stylesheet" href="../css/Users/component/product_page.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<script src="../js/Buyer/product_page.js" defer ></script>
<!-- <script>
const optionMenu = document.querySelector(".select-menu"),
  selectBtn = optionMenu.querySelector(".select-btn"),
  options = optionMenu.querySelectorAll(".option"),
  sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () =>
  optionMenu.classList.toggle("active")
);

options.forEach((option) => {
  option.addEventListener("click", () => {
    let selectedOption = option.querySelector(".option-text").innerText;
    sBtn_text.innerText = selectedOption;

    optionMenu.classList.remove("active");
  });
});
</script> -->
<script>
    function search() {
    const searchTerm = document.querySelector('.search_content input[type]').value;
    if (searchTerm) {
      const regex = new RegExp(searchTerm, 'gi');
      const elements = document.querySelectorAll('body *');
      for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        if (element.childNodes.length === 1 && element.childNodes[0].nodeType === 3) {
          const text = element.childNodes[0].textContent;
          if (text.match(regex)) {
            const highlightedText = text.replace(regex, '<span class="highlight">$&</span>');
            element.innerHTML = highlightedText;
          }
        }
      }
    }
  }
</script>

<div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="">Sell</a></li>
                    <?php if(!isset($_SESSION['user_id'])) {
                      ?>
                      <li><a href="<?php echo URLROOT?>/Login/login"><i class="fa-regular fa-user" id="user_home"></i> Join Us</a></li>
                      <?php
                    }else{
                      ?>
                      <li><a href="<?php echo URLROOT?>/Login/logout"><i class="fa-solid fa-right-from-bracket" id="user_home"></i></i>Log out</a></li>
                    <?php
                    }?>  
                </ul>
            </nav>
            <hr class="home_hr">
</div>


<div class="body">

<form method="post" action= "<?php echo URLROOT ?>/Users/filter_results" >
    <div class="section_1">

        <p class="filter_section_title">shop by category</p>

        <div class="filter_type_1">
            <span class="title">Brand</span><br>
            <div class="all_brands">
            <?php foreach($data['manufacturers'] as $manufacturer): ?>
               
           
           
           
                <label for="brand_1" > <input type="checkbox"  name="brands[]" value="<?php echo $manufacturer->manufacturer?>" ><?php echo $manufacturer->manufacturer?></label><br>
              

                <?php endforeach; ?>
                <span class="view_more">view more</span>
            </div>
        </div>

        <hr class="filter_hr">

        <div class="filter_type_2">
            <span class="title">Type</span><br>
            <div class="all_types">
          


                <label> <input type="checkbox"  name="types[]" value="Liquid">Liquid</label><br>
                <label> <input type="checkbox"  name="types[]" value="Solid">Solid</label><br>
                <label> <input type="checkbox"  name="types[]" value="Packets">Packets</label><br>
                <label> <input type="checkbox"  name="types[]" value="Bottles">Bottles</label><br>
            </div>
        </div>
        
        <hr class="filter_hr">

        <div class="filter_type_3">
            <span class="title">Price</span><br>
            <div class="all_prices">
            <!-- <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.5000.00 or more</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.5000.00 or less</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.2500.00 or less</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.1000.00 or less</label><br> -->
            
            <div class="field">
              <span>Min</span>
              <input type="number"  name = "min_price" class="input-min" value="2500">
            </div>
            <div class="separator">
                -
            </div>
            <div class="field">
             <span>Max</span>
             <input type="number" name = "max_price" class="input-max" value="7500">
            </div>
        
        
        
        </div>
        </div>

      


        <hr class="filter_hr">

        <div class="filter_type_5">
            <span class="title">Location</span><br>
            <div class="all_locations">
                
              <?php foreach($data['provinces'] as $province): ?>
               
           
               <?php foreach(SriLanka::getDistricts($province) as $district): ?>
             <label> <input type="checkbox"  name="location" value="<?php echo $district ?>"><?php echo $district ?></label><br> 
                
               <?php endforeach;?>
             

               <?php endforeach; ?> 
            </div>
        </div>
        <button type="submit" id = "submit">Filter Results</button>
               </form>

    </div>
  
    <div class="section_2">
        <div class="search_and_filter">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" ><input type="text" name="search_text" placeholder=" " required/></span>
                    
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"  onclick = "search()"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>

                    
                    </div>

                    <div class="live-search-result">
                        <ul class="search-result">
                             
                        </ul>
                    </div>
                    
        </div>

        <!-- some problem -->
        

        <!-- <div class="search_bar_filter"  class="dropdown-content">
                <span class="filter_title">Sort by : </span>
                <select name="sort_option" id="sort_option">
                    <option value="last_7_days">Price Low to High</option>
                    <option value="last_month">Price Low to High</option>
                </select>
        </div> -->


        
        

        </div>
        <div class="recent_product_card_section">


<?php foreach($data['products'] as $product): ?>
               
    <?php

$is_wishlist_item = false;

foreach($data['wishlist_items'] as $wishlist_item)
{


  if($wishlist_item->Product_id == $product->Product_id)
  {
    $is_wishlist_item = true;
    break;
  }
}




?>
    <div class="adv_card">
    <a href="<?php echo URLROOT?>/fertilizer_product/view_individual_product?product_id=<?php echo $product->Product_id ?>"><div class="card_image" style="background: url(<?php echo URLROOT;?>/upload/fertilizer_images/<?php echo $product->fertilizer_img?>); background-size: cover;
                                                height:75%;
                                                -webkit-background-size:cover ;
                                                background-position:center;
                                                margin:0px;
                                                padding:0px;">
    <div class="product_detail">
        <span class="product_name"><?php echo strlen($product->product_name) > 20? substr($product->product_name, 0, 20) . '...' :  $product->product_name ?></span><br>
        <span class="owner"><?php echo $product->manufacturer ?></span>
    </div>
    </a>
    </div>
    <i class="<?php echo   $is_wishlist_item ? 'fa-solid':'fa-regular'?> fa-heart" id="heart" data-product-id = "<?php echo $product->Product_id?>"  ></i>

        <div class="discription">
        <?php $avg_rating = round($product->avg_rating); ?>
        
        <?php 
        for ($i = 1; $i <= 5; $i++) {
            $checked = ($i <= $avg_rating) ? 'checked' : '';
            echo '<span class="fas fa-star ' . $checked . ' "></span>';
            }
            ?>
            <span class="price"> Rs. <?php echo $product->price?></span>
            </div>
            </div>
        <?php endforeach; ?> 
        </div>

    </div>

    <div class="last">

    </div>
</div>

<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>



<script type="text/javascript" defer>
// let p = document.querySelector('.delete_dialog_heading p');
// var deletePopup = document.getElementById("deletePopup");
// ; // Change the height to 300 pixels
// let button  = document.getElementById('cancelbtn');
//  function popUpOpen() {
//     const deletePopup = document.getElementById('deletePopup')
//   //   document.getElementById('delete').addEventListener('click',() => deletePopup.showModal());
//   cancelbtn.style.backgroundColor =  "#AEF359";
//   cancelbtn.style.color = "white";
//   cancelbtn.style.outline = "none";
//   deletePopup.style.overflow = "hidden";
//   deletePopup.style.borderRadius = "10px";
//   p.style.fontSize = "20px";
//   deletePopup.style.width = "300px"; // Change the width to 500 pixels
//   deletePopup.style.height = "150px"
//   document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
//   deletePopup.showModal();
// //   document.getElementById('deletebtn').value=id;
  
// }

// if(p.innerHTML != ""){
//     popUpOpen();
// }

// (document.querySelectorAll("[class *= fa-heart]")).forEach(element => element.addEventListener("click",() => {

// if(element.classList.contains('fa-solid'))
// {

//   console.log("Hello");

// }
// if(element.classList.contains('fa-regular'))
// {

//   console.log("Hello");
// }
// }


// ))


// const elements = document.querySelectorAll('#heart');
// console.log(elements.length)
// elements.forEach(element => {
//     element.addEventListener('click', () => {
//         console.log(element.classList);
//        if(element.classList.contains('fa-solid')){
//         element.classList.remove('fa-solid');
//         element.classList.add('fa-regular');

//         let productID =  element.dataset.productId;
//         console.log(productID);
//         // Send an AJAX request to delete the product from the wishlist
//         var xhr = new XMLHttpRequest();
//         xhr.open('DELETE', `http://localhost/Sobawitha/wishlist/delete/${productID}`);
//         xhr.onload = function() {
//         if (xhr.status === 200) {
//           console.log("successfully deleted");
//         }
//         else {
//             alert('Request failed.  Returned status of ' + xhr.status);
//         }
//         };
//         xhr.send();
//     }
//     else if(element.classList.contains('fa-regular')){
//         element.classList.remove('fa-regular');
//         element.classList.add('fa-solid');
//         let productID =  element.dataset.productId;
//         // Send an AJAX request to delete the product from the wishlist
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', `http://localhost/Sobawitha/wishlist/addToWishlist/${productID}`);
//         xhr.onload = function() {
//         if (xhr.status === 200) {
//             // Reload the page or update the UI to reflect the removed product
//             console.log("successfully added");
//         }
//         else {
//             alert('Request failed.  Returned status of ' + xhr.status);
//         }
//         };
//         xhr.send();
//     }
// })

// });




</script>

 
