<link rel="stylesheet" href="../css/Seller/shopping_cart.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>


<script>
function checkout() {
        // const userInput = document.getElementById("quantity_input").value;
        const agreementCheckbox = document.querySelector('#terms-checkbox');

        if (agreementCheckbox.checked) {
                // Checkbox is checked, continue with checkout process
                window.location.href = '<?php echo URLROOT ?>/supplier_ad_view/checkout_from_seller_cart';
        } else {
                // Checkbox is not checked, show an error message
                //alert('Please agree to the terms and conditions before proceeding to checkout.');
                document.getElementById("terms_and_condition_check").style.display="block";
        }
}
</script>


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
            <?php $tot_price = 0; foreach ($data['cart_items'] as $cart_item) : ?>
                <tr class="order">
                    <td>
                        <div class="order_detail">
                            <div class="product_detail">
                            <a href="<?php echo URLROOT ?>/supplier_ad_view/remove_from_cart?product_id=<?php echo $cart_item->Product_id ?>&quantity=<?php echo $cart_item->quantity ?>"><i class="fa-solid fa-xmark" id="cancel_order"></i></a><br><br>
                                <img src="<?php echo URLROOT ?>/public/upload/raw_material_images/<?php echo $cart_item->raw_material_image ?>" class="cart_image"></img>
                                <br>
                                <span class="order_p_name"><?php echo $cart_item->product_name ?></span><br>
                                <span class="order_p_id">Product ID: <?php echo $cart_item->Product_id ?></span><br>
                            </div>
                        </div>
                    </td>
                    <td><span class="price">Rs. <?php echo ($cart_item->price) ?></span></td>

                    <td class="unit">
                        <form method="POST"  action="<?php echo URLROOT ?>/supplier_ad_view/update_cart_item_quantities?product_id=<?php echo $cart_item-> Product_id?>">
                        <div class="select_quantity">
                            <br>
                            <div class="select_quantity_input">
                                <div class="quantity_control">
                                    <button type="submit" id="minus_btn"><span class="minus_button">-</span></button>
                                    <?php if ($cart_item->stock_quantity == 0) { ?>
                                        <input type="text" name="quantity" value="0" style="color:red;" readonly>
                                    <?php } else { ?>
                                        <input type="text"  name="quantity" value="<?php echo $cart_item->quantity ?>" class="quantity_input">
                                    <?php } ?>
                                    <button type="submit" id="plus_btn"><span class="plus_button">+</span></button>
                                </div>
                                <span class="existing_quantity" hidden >
                                    <span class="existing_quantity_value" ><?php echo $cart_item->stock_quantity; ?></span>
                                </span>
                                <span class="errorMsg" style="padding-left:0px;font-weight:bold;color: red; display: none;transform:translate(10px,0px)">Out of stock.</span>
                                <span class="quantity_error" style="color:red;"></span>
                            </div>
                        </div>
                        </form>
                    </td>

                    <td>
                    <span class="tot_price">Rs. 
                        <?php
                        // $price = number_format($cart_item->quantity * $cart_item->price, 2);
                        $price = $cart_item->quantity * $cart_item->price;
                        // echo ($cart_item->quantity * $cart_item->Price);
                        $tot_price = $tot_price + $price;
                        echo $price;
                        ?>
                    </span>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>

<script>
    const plusButtons = document.querySelectorAll('.plus_button');
    const minusButtons = document.querySelectorAll('.minus_button');
    const quantityInputs = document.querySelectorAll('.quantity_input');
    const availableQuantities = document.querySelectorAll('.existing_quantity_value');

    plusButtons.forEach((plusButton, index) => {
        plusButton.addEventListener('click', () => {
            let quantity = parseInt(quantityInputs[index].value);
            let availableQuantityValue = parseInt(availableQuantities[index].textContent);

            quantity++;

            if (quantity > availableQuantityValue) {
                quantityInputs[index].style.color = "red";
                document.querySelector('.errorMsg').style.display = 'block';
                
            } else {
                quantityInputs[index].value = quantity;
                quantityInputs[index].style.color = "black";
                document.querySelector('.errorMsg').style.display = 'none';
            }
        });
    });

    minusButtons.forEach((minusButton, index) => {
    minusButton.addEventListener('click', () => {
        let quantity = parseInt(quantityInputs[index].value);
        quantity--;
        document.querySelector('.errorMsg').style.display = 'none';
        quantityInputs[index].style.color = "black";

        if (quantity < 1) {
            quantity = 1;
        }

        quantityInputs[index].value = quantity;
    });
});





</script>
        </div>
    </div>
</div>

        <div class="section_3">
        <div class="total_price_section">
                <hr id="cart_toatal_section_hr">
                <span class="cart_total">Cart total <span class="total_value">Rs. <?php echo number_format($tot_price,2) ?></span></span><br>
                <span class="discription">Shipping and taxes calculate at checkout.</span>
                <input type="checkbox" id="terms-checkbox"><label class="agreement">I agree for <span class="term">terms & conditions</span></label><br>
                <span id="terms_and_condition_check" >Please agree to the terms and conditions before proceeding to checkout.</span>
                <button class="checkout" onclick="checkout()" hidden>checkout</button><br>  
                <br>             
                <button class="paypal">Paypal</button><br>
                <i class="fa-solid fa-bag-shopping" id="bag"></i>
                </div>
  
        </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>
