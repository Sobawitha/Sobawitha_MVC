<link rel="stylesheet" href="../css/Buyer/Purchase/purchase.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_Sidebar.php'?>
<script src="../js/Raw_material_supplier/order/order_list.js" defer></script> 


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
      

                <div class="filter_section">
                        <label for="ongoing_progress__order" id="filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="ongoing"> Onging</label>
                        <label for="ongoing_ready_order" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing" checked>Completed</label>
                        
                </div>

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

                        <!-- <tr class="order">
                                        <td><span class="p_name">Paddy fertilizer - ABC producers</span></td>
                                        <td><span class="amount">10kg</span></td>
                                        <td class="unit"><span class="value">4</span></td>
                                        <td><span class="price">Rs. 1000 x 4</span></td>
                                        
                                        <td><span class="delete">Delete</span><i class="fa-solid fa-circle-info" id="more_detail" onclick="display_order_detail()"></i></td>
                             

                        </tr>

                         <tr id="order_more_details" hidden>
                                <td colspan="6">
                                        <i class="fa-solid fa-angle-right" id="right"></i>
                                        <div class="order_more_detail">
                                                <span class="id">Product ID :1 </span><br>
                                                <span class="owner">Recever : M.R Mayunika</span><br>
                                                <span class="date">Date : 01 Jan 2023</span>
                                        </div>
                                </td>        
                        </tr> -->

                 
                      
                        <tr class="order" align = "center"><td colspan = "5" rowspan = "5"> No Data Found</td></tr>



                </div>
                </div>

          
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>
