<link rel="stylesheet" href="../css/Buyer/Purchase/purchase.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_Sidebar.php'?>


<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Completed Buyer purchases</h3>
        <hr>

        <br><br>
      
        <div class="search_bar">
            <div class="search_content">
                
                    
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder=" Product Name | Seller |  Order ID |  Date "  required/></span>
                   
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel"></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>

                    
            </div>
        </div>
      

                <!-- <div class="filter_section">
                        <label for="ongoing_progress__order" id="filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="ongoing"> Onging</label>
                        <label for="ongoing_ready_order" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing" checked>Completed</label>
                        
                </div> -->

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>Product Name</td>
                                <td>Seller </td>
                                <td>Order ID</td>
                                <td>Date</td>
                                
                                <td>Actions</td>
                        </tr>

           
                      
                       


                </div>
                </div>

          
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>


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

<script src="../js/Raw_material_supplier/order/order_list.js" defer></script> 
