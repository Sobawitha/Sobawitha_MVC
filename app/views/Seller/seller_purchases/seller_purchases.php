<link rel="stylesheet" href="../css/Seller/seller_purchases.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>






<body >

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Recently Purchased items</h3>
        <hr>

        <span class="filter_section">
            <form method="GET" class="searchForm" action="<?php echo URLROOT;?>/seller_purchase/sellerSearchAd">
            <div class="search_bar">
                <div class="search_content">
                    
                        <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search" placeholder="" id="searchBar" require/></span>
                        <!-- <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search" placeholder="<?php echo $data['search'] ?>" id="searchBar" require/></span> -->
                        <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                        <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                    
                </div>
            </div>
            </form>

        </span>



        <div class="sp_view_list">
        <div class="views">

        <?php if(empty($data['message'])){ ?>
        <table class="sp_view_list_table">
                <tr class="table_head">
                        <th>#</th>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Price(Per item)</th>
                        <th>Options</th>
                </tr>

                <?php foreach($data['purchase_list'] as $purchase):?>

                <tr class="sp_view">
                        <div class="sp_view_detail">
                                <th><span class="no" id="row_data"><?php echo  $purchase-> order_id?></span></th>
                                <th><span class="image" id="row_data"><img src="./../public/img/postsImgs/<?php echo $purchase-> raw_material_image ?>" alt="raw_material_image"  id="raw_material_image"></span></th>
                                <th><span class="item" id="row_data"><?php echo  $purchase-> product_name?></span></th>
                                <th><span class="quantity" id="row_data"><?php echo  $purchase-> quantity?></span></th>
                                <th><span class="date" id="row_data"><?php $timestamp = strtotime($purchase->created_at);$date = date('Y-m-d', $timestamp); echo $date ?></span></th>
                                <th><span class="price" id="row_data"><?php echo  $purchase-> price?></span></th>
                                <th id="review">
                                        
                                <?php if($purchase->review_status == 0){ ?>
                                <button type="button" id="seller_review_btn"  onclick="rating_popup_open(<?php echo $purchase->order_id ?>)"><i class="fa-solid fa-handshake"></i>&nbsp;&nbsp;Review</button>
                                <?php }else{ ?>
                                <span class="feed_left">Feedback Left</span>
                                <?php } ?>
                                
                                <dialog id="rating_popup">
                                <i class="fa-solid fa-xmark" id="close"></i>
                                <span class="user_icon"><i class="fa-solid fa-user-pen"></i></span>
                                <h4>Rate your experience</h4>
                                <form method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $purchase->order_id ?>">
                                        
                                        <div class="stars">
                                        <i class="fa-regular fa-star" data-value="1" id="star"></i>
                                        <i class="fa-regular fa-star" data-value="2" id="star"></i>
                                        <i class="fa-regular fa-star" data-value="3" id="star"></i>
                                        <i class="fa-regular fa-star" data-value="4" id="star"></i>
                                        <i class="fa-regular fa-star" data-value="5" id="star"></i>
                                        </div>

                                        <input type="hidden" name="selected_stars" id="selected_stars" value="1">

                                        <br><br>
                                        <div class="annonymous_rating">
                                        <input type="radio" name="rating_user" value="1" id="anonymous_rating" checked>
                                        <label for="anonymous_rating">Anonymous</label>
                                        </div>

                                        <textarea placeholder="Add a comment to your rating..." name="rating_comment" id="rating_comment"></textarea>
                                        <br><br>

                                        <br><br>
                                        <button type="submit" id="rating_submit" formaction="<?php echo URLROOT ?>/seller_purchase/review_product">Send Rating</button>
                                </form>
                                </dialog>

                                <script>
                                const radioBtn = document.querySelector('#anonymous_rating');

                                        radioBtn.addEventListener('click', () => {
                                        radioBtn.checked = !radioBtn.checked;
                                        });



                                
                                </script>
                        
                        
                           </td>
                        </div>
                </tr>

                <?php endforeach?>
        </table>

        <?php }else{ ?>
        <span class="error_msg"><?php echo $data['message'];?></span>

        <?php    }  ?>
        </div>
        </div>
        </div>
       

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>


</div>




<?php require APPROOT.'/views/Users/component/footer.php'?>

<script>
        function rating_popup_open(id){
                const rating_popup = document.getElementById('rating_popup')
                document.getElementById('close').addEventListener('click',() => {
                rating_popup.close();
                window.location.reload();
                });
                rating_popup.showModal();
        }



        function open_cancel_btn(){
        document.getElementById("cancel").style.display='block';
        }
        
        function clear_search_bar(){
        document.getElementById("searchBar").value = "";
        document.getElementById("cancel").style.display='none';
        }

        const stars = document.querySelectorAll(".stars i");
        const selectedStars = document.getElementById("selected_stars");

        stars.forEach((star, index) => {
        star.addEventListener("click", () => {
                const value = star.dataset.value;
                selectedStars.value = value;

                stars.forEach((s, i) => {
                if (i < value) {
                        s.classList.add("checked");
                        s.classList.replace("fa-regular", "fa-solid");
                } else {
                        s.classList.remove("checked");
                        s.classList.replace("fa-solid", "fa-regular");
                }
                });
        });

        // Add "checked" class to the first star by default
        if (index === 0) {
                star.classList.add("checked");
                star.classList.replace("fa-regular", "fa-solid");
        }
        });



         
       

</script>









