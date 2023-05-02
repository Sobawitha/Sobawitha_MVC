<link rel="stylesheet" href="../css/Users/component/home.css"></link>
<link rel="stylesheet" href="../css/Buyer/wish_list/wish_list.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<body>
    <header style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(40, 40, 40, 0.6)),url(../public/images/background2.jpg);
                                background-size: cover;
                                height:77vh;
                                -webkit-background-size:cover ;
                                background-position:center;
                                margin:0px;
                                padding:0px;">
        <div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="">Sell</a></li>
                    <li><a href="<?php echo URLROOT?>/Login/login"><i class="fa-regular fa-user" id="user_home"></i> Join Us</a></li>    
                </ul>
            </nav>
            <hr class="home_hr">
        </div>
        
        <div class="discription">
            <p class="main">Find the best places to your trade</p>
            <p class=sub_main>Sobawitha is an online platform driven by agriculture nature by involving more people in their people in their in</p>
            <div class="search_bar">
                <div class="search_content">
                    <input type="text" name="search_text" placeholder="Search the forum" require/>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i> <span class="search">SEARCH</span></button>
                </div>
            </div>
            <div class="click_home_icon">
                <i class="fa-solid fa-cart-shopping" id="home_icon"></i>
                <i class="fa-solid fa-coins" id="home_icon"></i>
                <i class="fa-brands fa-forumbee" id="home_icon"></i>
                <i class="fa-solid fa-circle-info" id="home_icon"></i>
                <i class="fa-solid fa-blog" id="home_icon"></i>
            </div>

            <div class="home_icon_name">
                <span id="name">Buy</span>
                <span id="name">Sell</span>
                <span id="name">Forum</span>
                <span id="name">Information</span>
                <span id="name">Blogs</span>
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
        
        <table style="width:40%">
        <tr>
            <th colspan="2" class="img11" background="../public/images/buying.jpg" ><span class="td_text">buying</span></td>
            <th rowspan="2" class="img12" background="../public/images/selling.jpg"><span class="td_text">selling</span></td>
        </tr>
        <tr>
            <th  class="img21"  background="../public/images/instructing.jpg"><span class="td_text">Instructing</span></td>
            <th class="img22" background="../public/images/qestioning.jpg"><span class="td_text" >Questioning</span></td>
        </tr>
        </table>
   
   
    </div>

    <div class="third_part">
        <span class="third_part_header">Latest Products</span>
        <br>
        <span class="second_part_discription">is an online platform driven by agriculture nature by involving more people in their people in their in</span>

        <div class="recent_product_card_section">
            
        <?php
             {foreach($data['products'] as $product)
                ?>
                <div class="adv_card">
                <div class="card_image" style="background: url(../images/background3.jpg); background-size: cover;
                                                height:75%;
                                                -webkit-background-size:cover ;
                                                background-position:center;
                                                margin:0px;
                                                padding:0px;">
                    <div class="product_detail">
                        <span class="product_name"><?php echo $product->product_name; ?></span><br>
                        <span class="owner"><?php echo $product->manufacturer; ?></span>
                    </div>
                </div>

                <a href = "<?php echo URLROOT?>/wishlist/addToWishlist/<?php echo $product->Product_id ?>"><i class="fa-regular fa-heart" id="heart"></i></a> 

                <div class="discription">
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <span class="price"><?php echo $product->price; ?></span>
                    
                </div>

            </div>
                <?php
            } ?>
            

            
    </div>

    <div class="fourth_part">
        <span class="fourth_part_header">Collection</span>
        <div class="collection_product_card_setion">

        <?php
              {foreach($data['products'] as $product)
                ?>
                <div class="adv_card">
                <div class="card_image" style="background: url(../images/background3.jpg); background-size: cover;
                                                height:75%;
                                                -webkit-background-size:cover ;
                                                background-position:center;
                                                margin:0px;
                                                padding:0px;">
                    <div class="product_detail">
                        <span class="product_name"><?php echo $product->product_name; ?></span>><br>
                        <span class="owner"><?php echo $product->manufacturer; ?></span>
                    </div>
                </div>

               
                <a href = "<?php echo URLROOT?>/wishlist/addToWishlist/<?php echo $product->Product_id ?>"><i class="fa-regular fa-heart" id="heart"></i></a> 


                <div class="discription">
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <span class="price"> <?php echo $product->price; ?></span>
                    
                </div>

            </div>
                <?php
            }?>

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