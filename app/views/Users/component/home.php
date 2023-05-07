<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/component/home.css"></link>
<link rel="stylesheet" href="../css/Users/component/home.css"></link>
<link rel="stylesheet" href="../css/Buyer/wish_list/wish_list.css"></link>
<script src="../js/Users/Notifications/push_notifications_profile.js"></script>
<?php require APPROOT.'/views/Users/component/Header.php'?>

<script>
    function search() {
    const searchTerm = document.getElementById('search_text').value;
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


<body>
    <!-- <header style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(40, 40, 40, 0.6)),url(<?php echo URLROOT?>/public/images/background2.jpg); background-size: cover;  height:77vh;  -webkit-background-size:cover ;  background-position:center; margin:0px;    padding:0px;"> -->

    
    <header id="home_header">

        <div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="<?php echo URLROOT?>/dashboard/dashboard">Dashboard</a></li> 
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
        
        <div class="discription">
          <?php if (isset($_SESSION['success_msg'])): ?>
                <div class="success-msg"><i class="fa-regular fa-circle-check"></i> <?php echo $_SESSION['success_msg']; ?> <div class="progress-bar"></div>
               </div>
                <?php unset($_SESSION['success_msg']); ?>
                <?php endif; ?>
            <p class="main">Find the best places to your trade</p>
            <p class=sub_main>Sobawitha is an online platform driven by agriculture nature by involving more people in their people in their in</p>
            <!-- <form method="POST">
            <div class="search_bar">
                <div class="search_content">
                    <input type="text" name="search_text" id="search_text" placeholder="Search from home" require/>
                    <button type="submit" class="search_btn" ><i class="fa fa-search" aria-hidden="true" id="search"></i> <span class="search">SEARCH</span></button>
                </div>
            </div>
            </form> -->

            <form id="search_form" method="POST">
            <div class="search_bar">
                <div class="search_content">
                <input type="text" name="search_text" id="search_text" placeholder="Search from home" required />
                <span class="search_btn" onclick="search()"><i class="fa fa-search" aria-hidden="true" id="search" ></i> <span class="search">SEARCH</span></span>
                </div>
            </div>
            </form>

            <div class="click_home_icon">
                <i class="fa-solid fa-cart-shopping" id="home_icon"></i>
                <i class="fa-solid fa-coins" id="home_icon"></i>
                <i class="fa-brands fa-forumbee" id="home_icon"></i>
                <i class="fa-solid fa-circle-info" id="home_icon"></i>
                <i class="fa-solid fa-blog" id="home_icon"></i>
            </div>

            <div class="home_icon_name">
                <span class="name" id="nameB">Buy</span>
                <span class="name" id="nameS">Sell</span>
                <span class="name" id="nameF">Forum</span>
                <span class="name" id="nameI">Information</span>
                <span class="name" id="nameBL">Blogs</span>
            </div>

            <div class="down_arrow">
                <span id="arrow_span"></span>
                <span id="arrow_span"></span>
            </div>
            
        </div>

    </header>

    <div class="second_part">
        <span class="second_part_header">What do you want to do?</span>
        <br>
        <span class="second_part_discription">is an online platform driven by agriculture nature by involving more people in their people in their in</span>

        <div class="service_cards">
            <a href="<?php echo URLROOT?>/Login/login" class="link"><div class="individual_service_card">
                <i class="fa-solid fa-store" id="icon"></i>
                <br>
                <span class="service_name">Selling</span>
            </div></a>

            <a href="#buying_section" class="link"><div class="individual_service_card">
                <i class="fa-brands fa-sellsy" id="icon"></i>
                <span class="service_name">Buying</span>
            </div></a>

            <a href="<?php echo URLROOT?>/resources/resource_page" class="link"><div class="individual_service_card">
                <i class="fa-solid fa-person-chalkboard" id="icon"></i>
                <span class="service_name">Instructing</span>
            </div></a>

            <a href="<?php echo URLROOT?>/forum/forum"class="link"><div class="individual_service_card">
                <i class="fa-brands fa-forumbee" id="icon"></i>
                <span class="service_name">Q&A</span>
            </div></a>
        </div>

        
   
   
    </div>

    <div class="third_part" id="buying_section">
        <span class="third_part_header">Latest Products</span>
        <br>
        <span class="second_part_discription">is an online platform driven by agriculture nature by involving more people in their people in their in</span>

        <div class="recent_product_card_section">
         
        <?php foreach($data['ads'] as $ads): ?>
        
                
                <div class="adv_card">
                <a href="<?php echo URLROOT?>/fertilizer_product/view_individual_product?product_id=<?php echo $ads->Product_id ?>"><div class="card_image" style="background: url(<?php echo URLROOT ?>/public/upload/fertilizer_images/<?php echo $ads->fertilizer_img ?>); background-size: cover; height:75%; -webkit-background-size:cover;  background-position:center; margin:0px; padding:0px; ">
                    
                      <div class="product_detail">
                        <span class="product_name"><?php echo strlen($ads->product_name) > 20 ? substr($ads->product_name,0,20)."..." : $ads->product_name ?></span><br>

                        <span class="owner"><?php echo strlen($ads->manufacturer) > 20 ? substr($ads ->manufacturer,0,20 )."..." : $ads -> manufacturer ?></span>
                    </div> 
                 </div></a>
                
                <i class="fa-regular fa-heart" id="heart"></i>

                <div class="discription">
                <span class="price">Rs. <?php echo $ads->price ?></span>
                <?php $avg_rating = round($ads->avg_rating); ?>
               
                <?php 
                for ($i = 1; $i <= 5; $i++) {
                $checked = ($i <= $avg_rating) ? 'checked' : '';
                echo '<span class="fas fa-star ' . $checked . ' "></span>';
                }
                ?>
                </div>
                </div>
            
            
               

             <?php endforeach;?>
            
  </div>
    
  

    <div class="fourth_part">
        <span class="fourth_part_header">Collection</span>
        <div class="collection_product_card_setion">
         
       
        
         <?php foreach($data['allads'] as $allAds): ?>
                <div class="adv_card">
                <a href="<?php echo URLROOT?>/fertilizer_product/view_individual_product?product_id=<?php echo $allAds->Product_id ?>">
               
                    <div class="card_image" style="background: url(<?php echo URLROOT ?>/public/upload/fertilizer_images/<?php echo $allAds->fertilizer_img ?>); background-size: cover; height:75%; -webkit-background-size:cover; background-position:center; margin:0px; padding:0px;">
                    <div class="product_detail">
                        <span class="product_name"><?php echo strlen($allAds->product_name) > 20 ? substr($allAds->product_name,0,20)."..." : $allAds->product_name ?></span><br>
                        <span class="owner"><?php echo strlen($allAds->manufacturer) > 20 ? substr($allAds ->manufacturer,0,20 )."..." : $allAds -> manufacturer ?></span>
                    </div>
                </div></a>

               
                <a href = "<?php echo URLROOT?>/wishlist/addToWishlist/<?php echo $allAds->Product_id ?>"><i class="fa-regular fa-heart" id="heart"></i></a>
             

                <div class="discription">
                <span class="price"> Rs. <?php echo $allAds->price ?></span>
                <?php $avg_rating = round($allAds->avg_rating); ?>
        
                <?php 
                for ($i = 1; $i <= 5; $i++) {
                $checked = ($i <= $avg_rating) ? 'checked' : '';
                echo '<span class="fas fa-star ' . $checked . ' "></span>';
                }
                ?>
            
                    
                </div>

            </div>
            <?php endforeach;?>
            
               
            

        </div>
        
        <div class="show_more">
                <a href="<?php echo URLROOT?>/Pages/product_page" class=""><span class="show_more_text">show more <i class="fa-solid fa-angles-right"></i></span></a> 
        </div>
    </div>

    <div class="fifth_part">
        <div class="acknowledgement">
            <div class="ack_author_sec"><img src="../images/dp.jpg" class="acknowledgement_img"></img><br>
            <span class="acknowledgement_author">M.R Mayunika</span>
            <br><br>
            <div class="acknowledgement_content_sec">
            <span class="acknowledgement_content">With gratitude, all praises go to Him, The Creator of all. After all obstacles and hardship that obstruct our path, finally we reach our goal. 
                With satisfaction, 
                now we are already finished our business plan report. Hereby, without doubt we would like to say that, during the completion of this course, 
                ample of knowledge and experiences have been obtained. Though, undeniably, it is quite difficult for us to complete the task, it is worthy and we learn much. 
                Alhamdulillah, thank you to the all mighty ALLAH S.W.T because of His divine guidance which has enabled us to finish our business plan.</span>
            </div>
            </div>
        </div>

        <div class="acknowledgement">
            <div class="ack_author_sec"><img src="../images/dp1.jpg" class="acknowledgement_img"></img><br>
            <span class="acknowledgement_author">M.R Mayunika</span>
            <br><br>
            <div class="acknowledgement_content_sec">
            <span class="acknowledgement_content">With gratitude, all praises go to Him, The Creator of all. After all obstacles and hardship that obstruct our path, finally we reach our goal. 
                With satisfaction, 
                now we are already finished our business plan report. Hereby, without doubt we would like to say that, during the completion of this course, 
                ample of knowledge and experiences have been obtained. Though, undeniably, it is quite difficult for us to complete the task, it is worthy and we learn much. 
                Alhamdulillah, thank you to the all mighty ALLAH S.W.T because of His divine guidance which has enabled us to finish our business plan.</span>
            </div>
            </div>
        </div>

        <div class="acknowledgement">
            <div class="ack_author_sec"><img src="../images/dp3.jpg" class="acknowledgement_img"></img><br>
            <span class="acknowledgement_author">Punsara Deshan</span>
            <br><br>
            <div class="acknowledgement_content_sec">
            <span class="acknowledgement_content">With gratitude, all praises go to Him, The Creator of all. After all obstacles and hardship that obstruct our path, finally we reach our goal. 
                With satisfaction, 
                now we are already finished our business plan report. Hereby, without doubt we would like to say that, during the completion of this course, 
                ample of knowledge and experiences have been obtained. Though, undeniably, it is quite difficult for us to complete the task, it is worthy and we learn much. 
                Alhamdulillah, thank you to the all mighty ALLAH S.W.T because of His divine guidance which has enabled us to finish our business plan.</span>
            </div>
            </div>
        </div>
    </div>

<div id="footer">
<dialog id="my-dialog">
  <p>Item Successfully Added to the Wishlist</p>
  <button id="dialog-close-button">Close</button>
</dialog>

<?php



// Check if the session variable is set and equal to true
if (isset($_SESSION['showDialog']) && $_SESSION['showDialog'] == true) {

  unset($_SESSION['showDialog']);
?>

  <script>
    // Open the dialog box
    const dialog = document.querySelector('#my-dialog');
    dialog.showModal();

    // Close the dialog box when the close button is clicked
    const dialogCloseButton = document.querySelector('#dialog-close-button');
    dialogCloseButton.addEventListener('click', () => {
      dialog.close();
    });
  </script>

<?php
}
?>


    <dialog id="deletePopup">
                <div class="deletePopup">
                
                        <div class="delete_dialog_heading">
                 
                        
                        <p><?php if(isset($_SESSION['wishlist_error'])){
                            echo $_SESSION['wishlist_error']; unset($_SESSION['wishlist_error']);}?></p>
                        
                        </div>
                 
                        <div class="dialog_content">
                            <!-- <form method="POST" action="<?php echo URLROOT?>/blog_post/delete_post">
                            <button id="deletebtn" type="submit" value="" name="deletepost">Delete
                            </button>-->
                            <button id="cancelbtn" type="button">Cancel
                            </button>
                           <!-- </form> -->

                            
                        </div>
                </div>
            </dialog>


 <script type="text/javascript">
let p = document.querySelector('.delete_dialog_heading p');
var deletePopup = document.getElementById("deletePopup");
; // Change the height to 300 pixels
let button  = document.getElementById('cancelbtn');
 function popUpOpen() {
    const deletePopup = document.getElementById('deletePopup')
  //   document.getElementById('delete').addEventListener('click',() => deletePopup.showModal());
  cancelbtn.style.backgroundColor =  "#AEF359";
  cancelbtn.style.color = "white";
  cancelbtn.style.outline = "none";
  deletePopup.style.overflow = "hidden";
  deletePopup.style.borderRadius = "10px";
  p.style.fontSize = "20px";
  deletePopup.style.width = "300px"; // Change the width to 500 pixels
  deletePopup.style.height = "150px"
  document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
  deletePopup.showModal();
//   document.getElementById('deletebtn').value=id;
  
}

if(p.innerHTML != ""){
    popUpOpen();
}



 

</script>
<?php

include 'footer.php';

?>
</div>

<script>
    const header = document.querySelector('#home_header');
    const images = ['<?php echo URLROOT?>/public/images/background2.jpg', '<?php echo URLROOT?>/public/images/background7.jpg', '<?php echo URLROOT?>/public/images/background4.jpg', '<?php echo URLROOT?>/public/images/background3.jpg']; // array of image file names
    let currentIndex = 0;

    function changeBackground() {
    header.style.backgroundImage = `linear-gradient(rgba(0,0,0,0.6),rgba(40, 40, 40, 0.6)), url(${images[currentIndex]})`;
    currentIndex = (currentIndex + 1) % images.length; // cycle through the array of images
    }

    setInterval(changeBackground, 5000); // call the function every 5 seconds

</script>