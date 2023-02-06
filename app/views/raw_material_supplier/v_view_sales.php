<link rel="stylesheet" href="../css/raw_material_supplier/view_sales.css"></link>
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/supplier_topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Supplier_Sidebar.php'?>
<script src="../js/sales/view_sales.js"></script> 

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Supplier sales</h3>
        <hr>

        <br><br>

        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel"></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>

                <div class="filter_section">
                <i class="fa-solid fa-list-check" id="complete_icon"></i>
                <span class="complete">Completed</p>
                </div>

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Units</td>
                                <td>Amount</td>
                                <td>Payment satus</td>
                                <td></td>
                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">Paddy fertilizer - ABC producers</span></td>
                                        <td><span class="amount">10kg</span></td>
                                        <td class="unit"><span class="value">4</span></td>
                                        <td><span class="price">Rs. 1000 x 4</span></td>
                                        <td><span class="payment_status">Completed</span></td>
                                        <td><span class="delete">Delete</span><i class="fa-solid fa-circle-info" id="more_detail" onclick="display_order_detail()"></i></td>
                                </div>

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
                        </tr>

                        <tr class="order">
                                <td><span class="p_name">Paddy fertilizer - ABC producers</span></td>
                                <td><span class="amount">10kg</span></td>
                                <td class="unit"><span class="value">4</span></td>
                                <td><span class="price">Rs. 1000 x 4</span></td>
                                <td><span class="payment_status">Completed</span></td>
                                <td><span class="delete">Delete</span><i class="fa-solid fa-circle-info" id="more_detail"></i></td>
                        </tr>

                        <tr class="order">
                                <td><span class="p_name">Paddy fertilizer - ABC producers</span></td>
                                <td><span class="amount">10kg</span></td>
                                <td class="unit"><span class="value">4</span></td>
                                <td><span class="price">Rs. 1000 x 4</span></td>
                                <td><span class="payment_status">Completed</span></td>
                                <td><span class="delete">Delete</span><i class="fa-solid fa-circle-info" id="more_detail"></i></td>
                        </tr>
                </table>

                </div>
                </div>

                <div class="payment_detail">
                        <div class="detail">
                                <span class="total">Total product</span>  <span class="payment_amount"> Rs 50000.00 </span><br>
                                <span class="shipping_cost">Astimated shipping cost </span><span class="payment_amount"> Rs 200.00 </span><br>
                                <span class="total_inc_vat">Total </span><span class="vat">(including VAT)</span> <span class="payment_amount"> Rs 48000.00 </span>
                        </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>

