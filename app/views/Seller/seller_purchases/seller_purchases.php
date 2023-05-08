<link rel="stylesheet" href="../css/Seller/seller_purchases.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>


<dialog  id="rating_popup">
<i class="fa-solid fa-xmark" id="close" ></i>
<span class="user_icon"><i class="fa-solid fa-user-pen"></i></span>
<i class="fa-solid x-mark" id="close"></i>
<h4>Rate your experince</h4>
<form method="POST" action="<?php echo URLROOT ?>/seller_purchses/review_product">
<div class="stars">
  <i class="fa-regular fa-star" data-value="1" id="star"></i>
  <i class="fa-regular fa-star" data-value="2" id="star"></i>
  <i class="fa-regular fa-star" data-value="3" id="star"></i>
  <i class="fa-regular fa-star" data-value="4" id="star"></i>
  <i class="fa-regular fa-star" data-value="5" id="star"></i>
</div>

<br><br>
<textarea placeholder="Add a comment to your rating..." id="rating_comment"></textarea>
<br><br>
<button type="submit" id="rating_submit">Send Rating</button>
</form>
</dialog>


<body >

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Recently sold items</h3>
        <hr>

        <span class="filter_section">
            <form method="POST">
            <div class="search_bar">
                <div class="search_content">
                    
                        <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="" require/></span>
                        <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                        <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                    
                </div>
            </div>
            </form>

            <select name="time_period" id="time_period">
                <option value="last_7_days">Last 7 Days</option>
                <option value="last_month">Last Month</option>
                <option value="last_year" >Last Year</option>
            </select>
        </span>



        <div class="sp_view_list">
        <div class="views">

        <table class="sp_view_list_table">
                <tr class="table_head">
                        <th>#</th>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Price(Per item)</th>
                        <th></th>
                </tr>

                <?php foreach($data['purchase_list'] as $purchase):?>

                <tr class="sp_view">
                        <div class="sp_view_detail">
                                <th><span class="no" id="row_data"><?php echo  $purchase-> purchase_id?></span></th>
                                <th><span class="image" id="row_data"><img src="./../public/upload/raw_material_images/<?php echo $purchase-> raw_material_image ?>" alt="raw_material_image"  id="raw_material_image"></span></th>
                                <th><span class="item" id="row_data"><?php echo  $purchase-> product_name?></span></th>
                                <th><span class="quantity" id="row_data"><?php echo  $purchase-> quantity?></span></th>
                                <th><span class="date" id="row_data"><?php $timestamp = strtotime($purchase->date);$date = date('Y-m-d', $timestamp); echo $date ?></span></th>
                                <th><span class="price" id="row_data"><?php echo  $purchase-> price?></span></th>
                                <th id="review">
                                <span onclick="rating_popup_open(<?php echo $purchase-> purchase_id ?>)"><i class="fa-solid fa-handshake"></i>&nbsp;&nbsp;Review</span>
                                </td>
                        </div>
                </tr>

                <?php endforeach?>
        </table>

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
                document.getElementById('close').addEventListener('click',() => rating_popup.close());
                rating_popup.showModal();
        }

        const stars = document.querySelectorAll(".stars i");

        stars.forEach(star => {
        star.addEventListener("click", () => {
        star.classList.toggle("checked");
        if (star.classList.contains("checked")) {
        star.classList.replace("fa-regular", "fa-solid");
        } else {
        star.classList.replace("fa-solid", "fa-regular");
        }
        });
        });


</script>







