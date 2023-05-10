<link rel="stylesheet" href="../css/Seller/shopping_cart.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>


<script>
const plusButton = document.querySelector('.plus_button');
const minusButton = document.querySelector('.minus_button');
const quantityInput = document.querySelector('input[name="quantity"]');
const available_quantity = document.getElementById('existing_quantity');

plusButton.addEventListener('click', () => {
  let quantity = parseInt(quantityInput.value);
  let available_quantity = parseInt(document.getElementById("existing_quantity_value").textContent);
  console.log(quantity);
  console.log(available_quantity);
  quantity++;
  if(quantity>available_quantity){
    quantityInput.style.color="red";
  }
  else{
    quantityInput.value = quantity;
  }
});

minusButton.addEventListener('click', () => {
  let quantity = parseInt(quantityInput.value);
  quantity--;
  if (quantity < 1) {
    quantity = 1;
  }
  quantityInput.value = quantity;
});

function checkout() {
        const userInput = document.getElementById("quantity_input").value;
        const agreementCheckbox = document.querySelector('#terms-checkbox');

        if (agreementCheckbox.checked) {
                // Checkbox is checked, continue with checkout process
                window.location.href = '<?php echo URLROOT ?>/supplier_ad_view/complete_order?product_id=<?php echo $_GET['product_id'] ?>';
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
                    <?php $tot_price=0;foreach($data['cart_items'] as $cart_item ):?>
                        <tr class="order">
                                <div class="order_detail">
                                        <td>
                                            <div class="product_detail">
                                                <img src="<?php echo URLROOT ?>/public/upload/raw_material_images/<?php echo $cart_item->raw_material_image ?>" class="cart_image"></img>
                                                <a href="<?php echo URLROOT?>/supplier_ad_view/remove_from_cart?product_id=<?php echo $cart_item->Product_id?>&quantity=<?php echo $cart_item->quantity?>"><i class="fa-solid fa-xmark" id="cancel_order"></i></a><br><br>
                                                <span class="order_p_name"><?php echo $cart_item-> product_name?></span><br>
                                                <span class="order_p_id">Product ID: <?php echo $cart_item->Product_id ?></span><br>
                                                <span class="size">500 g </span>  <!--check-->
                                            </div>
                                        </td>
                                        <td><span class="price">Rs. <?php echo ($cart_item->price) ?></span></td>

                                        <td class="unit"><div class="select_quantity">
                                                <br>
                                                <div class="select_quantity_input">
                                                <div class="quantity_control">
                                                        <span class="minus_button">-</span>
                                                        <?php if($cart_item->stock_quantity == 0) { ?>
                                                        <input type="text" name="quantity" value="0" style="color:red;" readonly>
                                                        <?php } else { ?>
                                                        <input type="text" name="quantity" value="<?php echo $cart_item->quantity ?>" id="quantity_input">
                                                        <?php } ?>
                                                        <span class="plus_button">+</span>
                                                </div>
                                                <br>
                                                <span class="existing_quantity" id="existing_quantity" hidden>
                                                        <span id="existing_quantity_value"><?php echo $cart_item->stock_quantity; ?></span> available
                                                </span>
                                                <span id="errorMsg" style="padding-left:20px;font-weight:bold;color: red; display: none;">Out of the stock.</span>
                                                <span id="quantity_error" style="color:red;"></span>
                                                </div>
                                                </div>
                                        </td>
                                        <td><span class="tot_price">Rs. <?php $tot_price= ($tot_price + ($cart_item->quantity * $cart_item->price));  echo  ($cart_item->quantity * $cart_item->price)?></span></td>
                                        
                                </div>

                        </tr>
                        <?php endforeach; ?>
                </table>

        
        </div>
    </div>
</div>

        <div class="section_3">
        <div class="total_price_section">
                <hr id="cart_toatal_section_hr">
                <span class="cart_total">Cart total <span class="total_value">Rs. <?php echo $tot_price ?></span></span><br>
                <span class="discription">Shipping and taxes calculate at checkout.</span>
                <input type="checkbox" id="terms-checkbox"><label class="agreement">I agree for <span class="term">terms & conditions</span></label><br>
                <button class="checkout" onclick="checkout()">checkout</button><br>   
                <span id="terms_and_condition_check" >Please agree to the terms and conditions before proceeding to checkout.</span>
                <br>             
                <button class="paypal">Paypal</button><br>
                <i class="fa-solid fa-bag-shopping" id="bag"></i>
                </div>
  
        </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>
