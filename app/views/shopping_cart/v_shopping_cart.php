<link rel="stylesheet" href="../css/shopping_cart/shopping_cart.css"></link>
<script src="../js/blog_post/create_blog.js"></script> 
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Officer_Sidebar.php'?>
    


<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>Product</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Total</td>
                                <td></td>
                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td>
                                            <div class="product_detail">
                                                <img src="../images/vegitable.jpg" class="cart_image"></img>
                                                <i class="fa-solid fa-xmark" id="cancel_order"></i><br><br>
                                                <span class="order_p_name">fertilizer for vegitable</span><br>
                                                <span class="order_p_id">Product ID: 001</span><br>
                                                <span class="size">500 g </span>
                                            </div>
                                        </td>
                                        <td><span class="price">Rs. 500.00</span></td>
                                        <td class="unit"><i class="fa-solid fa-minus" id="minus"></i><span class="value">4</span><i class="fa-solid fa-plus" id="plus"></i></td>
                                        <td><span class="tot_price">Rs. 2000.00</span></td>
                                        
                                </div>

                        </tr>


                        <tr class="order">
                                <div class="order_detail">
                                        <td>
                                            <div class="product_detail">
                                                <img src="../images/vegitable.jpg" class="cart_image"></img>
                                                <i class="fa-solid fa-xmark" id="cancel_order"></i><br><br>
                                                <span class="order_p_name">fertilizer for vegitable</span><br>
                                                <span class="order_p_id">Product ID: 001</span><br>
                                                <span class="size">500 g </span>
                                            </div>
                                        </td>
                                        <td><span class="price">Rs. 500.00</span></td>
                                        <td class="unit"><i class="fa-solid fa-minus" id="minus"></i><span class="value">4</span><i class="fa-solid fa-plus" id="plus"></i></td>
                                        <td><span class="tot_price">Rs. 2000.00</span></td>
                                        
                                </div>

                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td>
                                            <div class="product_detail">
                                                <img src="../images/vegitable.jpg" class="cart_image"></img>
                                                <i class="fa-solid fa-xmark" id="cancel_order"></i><br><br>
                                                <span class="order_p_name">fertilizer for vegitable</span><br>
                                                <span class="order_p_id">Product ID: 001</span><br>
                                                <span class="size">500 g </span>
                                            </div>
                                        </td>
                                        <td><span class="price">Rs. 500.00</span></td>
                                        <td class="unit"><i class="fa-solid fa-minus" id="minus"></i><span class="value">4</span><i class="fa-solid fa-plus" id="plus"></i></td>
                                        <td><span class="tot_price">Rs. 2000.00</span></td>
                                        
                                </div>

                        </tr>
                </table>

        
        </div>
    </div>
</div>

        <div class="section_3">
                <div class="total_price_section">
                        <hr id="cart_toatal_section_hr">
                        <span class="cart_total">Cart total <span class="total_value">Rs. 5000.00</span></span><br>
                        <span class="discription">Shipping and taxes calculate at checkout.</span>
                        <input type="checkbox"><label class="agreement">I agree for <span class="term">terms & conditions</span></label></input><br><br>
                        <button class="checkout">checkout</button><br>
                        <button class="paypal">Paypal</button><br>
                        <i class="fa-solid fa-bag-shopping" id="bag"></i>
                </div>   
        </div>
</div>


<?php require APPROOT.'/views/inc/Footer.php'?>
