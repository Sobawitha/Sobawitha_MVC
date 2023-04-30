<?php require APPROOT . '/views/Users/component/Header.php'?>
<link rel="stylesheet" href="../css/Buyer/shopping_cart/shopping_cart.css"></link>
<script src="../js/Buyer/index_cart.js" defer></script>
<script src="../js/Buyer/index_checkOut.js" defer></script>
<?php
$sum = 0;
if ($_SESSION['user_flag'] == 1) {
    require APPROOT . '/views/Admin/Admin/admin_topnavbar.php';
    require APPROOT . '/views/Admin/Admin/admin_Sidebar.php';
} else if ($_SESSION['user_flag'] == 2) {
    
    require APPROOT . '/views/Buyer/Buyer/buyer_topnavbar.php';
    require APPROOT . '/views/Buyer/Buyer/buyer_Sidebar.php';
} else if ($_SESSION['user_flag'] == 3) {
    require APPROOT . '/views/Seller/Seller/seller_topnavbar.php';
    require APPROOT . '/views/Seller/Seller/seller_Sidebar.php';
} else if ($_SESSION['user_flag'] == 4) {
    require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php';
    require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php';
} else if ($_SESSION['user_flag'] == 5) {
    require APPROOT . '/views/Agri_officer/Agri_officer/officer_topnavbar.php';
    require APPROOT . '/views/Agri_officer/Agri_officer/Officer_Sidebar.php';
}?>


<div class="body">
        <div class="section_1">

        </div>

        <div class="section_2">
         


        <?php if(isset($_SESSION['order_status']) && $_SESSION['order_status'] == 'success'): ?>
    <div id="flash-message" >
        <div class="flash-text">Order was successful .Check your email for information </div>
        <div class="flash-loading"></div>
    </div>
<?php unset($_SESSION['order_status']); ?>
<?php elseif(isset($_SESSION['order_status']) && $_SESSION['order_status'] == 'failure'): ?>
     
    <div id="flash-message" class = "flash-error">
        <div class="flash-text">Order was unsuccessful Try Again</div>
        <div class="flash-loading"></div>
    </div>
<?php unset($_SESSION['order_status']); ?>
<?php endif; ?>







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
                         <?php

foreach($data['cart'] as $cart):{
    ?>
                       <tr class="order" id = "user-<?php echo $cart->Product_id?>">
                                <div class="order_detail"  >
                                        <td>
                                            <div class="product_detail">
                                                <img src="http://localhost/Sobawitha_MVC/public/images/<?php echo $cart->product_img ?>" class="cart_image"></img>
                                                <i class="fa-solid fa-xmark" id="cancel_order" data-id="<?php echo $cart->Product_id ?>"></i><br><br>
                                                <span class="order_p_name"><?php echo $cart->product_name ?></span><br>
                                                <span class="order_p_id"><?php echo $cart->Product_id ?></span><br>
                                                <span class="size">500 g </span>
                                            </div>
                                        </td>
                                        <td><span class="price"><?php echo $cart->product_price ?></span></td>
                                        <td class="unit"><div class = "input-group-text"  data-id="<?php echo $cart->Product_id ?>"><button id = "decrement">-</button><input type="text" class = "input-qty "value = "<?php echo $cart->quantity?>" /><button id = "increment">+</button></div></td>
                                        <td><span class="tot_price"><?php echo $cart->product_price * $cart->quantity; $sum += $cart->product_price*$cart->quantity ?></span></td>

                                </div>

                        </tr>
                        <?php }?> 
<?php endforeach;?>
                       
                </table>


        </div>
    </div>
</div>

        <div class="section_3">
                <div class="total_price_section">
                        <hr id="cart_toatal_section_hr">
                        <span class="cart_total">Cart total <span class="total_value">Rs.<?php echo $sum ?></span></span><br>
                        <span class="discription">Shipping and taxes calculate at checkout.</span><br />
                        <input type="checkbox" name = "agree-terms" id  = "checkvalue"><label class="agreement">I agree for <span class="term">terms & conditions</span></label></input><br><br>
                        <button class="checkout">checkout</button><br>
                        <button class="paypal">Paypal</button><br>
                        <i class="fa-solid fa-bag-shopping" id="bag"></i>
                </div>
        </div>









   



</div>
<script src="https://js.stripe.com/v3/"></script>

<?php require APPROOT . '/views/Users/component/footer.php'?>