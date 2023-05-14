<?php require APPROOT . '/views/Users/component/Header.php'?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Raw_material_supplier/ad_management/ad_view_more.css"></link>

<?php
if($_SESSION['user_flag'] == 1){
    require APPROOT.'/views/Admin/Admin/admin_topnavbar.php';
}
else if($_SESSION['user_flag'] == 3){
    require APPROOT.'/views/Seller/Seller/seller_topnavbar.php';
}
else if($_SESSION['user_flag'] == 4){
    require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php';
}
?>

<script>
  /*pay popup */
  function pay_popup(price) {
  const existingQuantity = document.getElementById("existing_quantity_value").textContent;
  const quantity = parseInt(quantityInput.value);

  if(quantity>existingQuantity){
    errorMsg.style.display = "block";
    quantity.style.color="red";
    $_SESSION['order_count_error'] = "invalid_order";
  }
  else{
    const total_count = quantity * price;
    console.log(total_count);
    const total_price = document.querySelector(".total_value");
    total_price.textContent = `Rs. ${total_count.toFixed(2)}`;
    const paypopup = document.getElementById('buy_now_dialog_box');
    document.getElementById('close_buy_dialog').addEventListener('click', () => paypopup.close());
    paypopup.showModal();
  }
}

function checkout() {
  const userInput = document.getElementById("quantity_input").value;
  const agreementCheckbox = document.querySelector('#terms-checkbox');
  
  if (agreementCheckbox.checked) {
    // Checkbox is checked, continue with checkout process
    window.location.href = `<?php echo URLROOT ?>/cart/checkout_from_individual_page?product_id=<?php echo $_GET['product_id'] ?>&quantity=${userInput}`;
  } 
  
  else {
    // Checkbox is not checked, show an error message
    //alert('Please agree to the terms and conditions before proceeding to checkout.');
    document.getElementById("terms_and_condition_check").style.display="block";
  }
}


</script>

<script>


/*comment section */
//for comment section


function thanku_popup_close(){
  document.getElementById('thank_you_dialog_box').close();
}


/*switch image */
function switchImages(){
      image = document.getElementById("main-image").src
      openModal(image)
}

function changeImage(newImage) {
    document.getElementById("main-image").src = newImage;
}
 
function openModal(imageSrc) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("modal-image");
    modal.style.display = "block";
    modalImg.src = imageSrc;
}


function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

</script>

<dialog id="buy_now_dialog_box">
    <div class="total_price_section">
      <i class="fa-solid fa-xmark" id="close_buy_dialog"></i>
      <hr id="cart_toatal_section_hr">
      <span class="cart_total">Cart total <span class="total_value">Rs. 5000.00</span></span><br>
      <span class="discription">Shipping and taxes calculate at checkout.</span><br>
      <input type="checkbox" id="terms-checkbox"><label class="agreement">I agree for <span class="term">terms & conditions</span></label><br>
      <span id="terms_and_condition_check" >Please agree to the terms and conditions before proceeding to checkout.</span>
      <br>
      <button class="checkout" onclick="checkout()">checkout</button><br>
      <button class="paypal">Paypal</button><br>
      <i class="fa-solid fa-bag-shopping" id="bag"></i>  
    </div>
</dialog>


<?php
$content = $data['adcontent'];
$feed = $data['feed'];
?>

<div class="body">
  <div class="section_2">

    <span class="reg_no"><span class="sub_reg_no">Published On </span><?php echo $content->date; ?></span>
    <div class="individual_image">

      <div class="image-container">
        <div class="main_image">
          <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $content->raw_material_image; ?>" onclick="switchImages()" id="main-image">
        </div>

        <div class="thumbnail-images">
          <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $content->raw_material_image; ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/<?php echo $content->raw_material_image; ?>')">

          <?php if($content->rm_image_two == ''): ?>
            <img src="<?php echo URLROOT; ?>/img/postsImgs/default_upload.png" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/default_upload.png')">
          <?php else: ?>
            <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $content->rm_image_two; ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/<?php echo $content->rm_image_two; ?>')">
            
          <?php endif; ?>

          <?php if($content->rm_image_three == ''): ?>
            <img src="<?php echo URLROOT; ?>/img/postsImgs/default_upload.png" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/default_upload.png')">
          <?php else: ?>
            <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $content->rm_image_three; ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/<?php echo $content->rm_image_three; ?>')">
            
          <?php endif; ?>
        </div>

        <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modal-image">
        </div>

      </div>
      
      <p class="product_discription">
       
        <?php
        $description = $content->product_description;
        $sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $description);
        $paragraphs = array("");
        $count = 0;

        foreach ($sentences as $sentence) {
            $sentence_words = explode(" ", $sentence);
            if (($count + count($sentence_words)) < 100) {
                $paragraphs[count($paragraphs) - 1] .= $sentence . " ";
                $count += count($sentence_words);
            } else {
                $count = 0;
                $paragraphs[] = $sentence . " ";
            }
        }

        foreach ($paragraphs as $paragraph) {
            echo "<p class='product_discription'><span class='first_character'>" . substr($paragraph, 0, 1) . "</span>" . substr($paragraph, 1) . "</p>";
        }
        ?>

      </p>
    </div>
  </div>

  <div class="section_3">
  <a href="<?php echo URLROOT ?>/supplier_ad_view/index" class="back_to_home"><i class="fa-sharp fa-solid fa-arrow-left" id="arrow"></i>&nbsp;&nbsp;Back to product page</a><br><br><br>
    <span class="title_1">Raw Material</span><br>
    <span class="title_2"><?php echo $content->product_name; ?></span>
    <?php if($data['wishlist_status'] >0){
      ?>
      <a href="<?php echo URLROOT; ?>/supplier_ad_view/remove_wishlist_from_individual_page?product_id=<?php echo $content->Product_id; ?>"><i class="fa-solid fa-heart" id="add_wishlist_heart"></i></a>
      <?php
    }
      else{
        ?>
        <a href="<?php echo URLROOT; ?>/supplier_ad_view/add_to_wishlist_from_individual_page?product_id=<?php echo $content->Product_id; ?>"><i class="fa-regular fa-heart" id="add_wishlist_heart"></i></a>
        <?php
      }
    ?>
    <br><br>
    <span class="title_3"><span class="sub_title_3">Company / Manufacturer  </span><?php echo $content->manufacturer; ?></span><br><br>
    <span class="product_type"><span class="sub_reg_no">Product Type </span><?php echo $content->type; ?></span><br><br>
    <br><br>
    <span class="price">Rs. <?php echo $content->price; ?></span>

    <section class="customerFeed">

      <div class="scf_maincontent">
        <br><br>
        <span class="title_4">Supplier Rating</span><br>

        <?php $avg_rating = round($feed->avg_rating); ?>
        <?php 
                for ($i = 1; $i <= 5; $i++) {
                $checked = ($i <= $avg_rating) ? 'checked' : '';
                echo '<span class="fas fa-star ' . $checked . ' "></span>';
                }
                ?>           
        <!-- <p style=font-size:14px;><?php echo $feed -> avg_rating ?>  average based on <span class="num_of_reviews"><?php echo $data['feed']-> total_feedback_count ?></span> reviews.</p><br> -->
        <p style="font-size: 14px;">
        <?php echo number_format($feed->avg_rating, 2) ?>
         average based on 
        <span class="num_of_reviews">
          <?php echo $feed->total_feedback_count ?>
          <?php ($feed->total_feedback_count == 1) ? $s='' : $s='s'; ?>
        </span>review<?php echo$s ?>.
      </p>

        <hr style="border:0.1px solid #f1f1f1"><br>

        <div class="row">
          <div class="side">
            <div class="n_star">5 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-5" style="width: <?php echo ($feed->total_feedback_count > 0) ? ($feed->rating_5_count/$feed->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feed->rating_5_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">4 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-4" style="width: <?php echo ($feed->total_feedback_count > 0) ? ($feed->rating_4_count/$feed->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feed->rating_4_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">3 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-3" style="width: <?php echo ($feed->total_feedback_count > 0) ? ($feed->rating_3_count/$feed->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feed->rating_3_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">2 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-2" style="width: <?php echo ($feed->total_feedback_count > 0) ? ($feed->rating_2_count/$feed->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feed->rating_2_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">1 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-1" style="width: <?php echo ($feed->total_feedback_count > 0) ? ($feed->rating_1_count/$feed->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feed->rating_1_count ?></div>
          </div>
        </div>
      </div>
    </section>

    

  <form method="POST" action="<?php echo URLROOT ?>/supplier_ad_view/add_to_cart_from_individual_page?product_id= <?php echo $content->Product_id ?>">
  <div class="select_quantity">
    <span class="header_quantity">Quantity</span>
    <div class="select_quantity_input">
      <div class="quantity_control">
        <span class="minus_button">-</span>
        <?php if($content->quantity == 0) { ?>
          <input type="text" name="quantity" value="0" style="color:red;" readonly>
        <?php } else { ?>
          <input type="text" name="quantity" value="1" id="quantity_input">
        <?php } ?>
        <span class="plus_button">+</span>
      </div>
      <span class="existing_quantity" id="existing_quantity">
        <span id="existing_quantity_value"><?php echo $content->quantity; ?></span> available
      </span>
    </div>
    <span class="errorMsg" style="transform:translateX(-50px);font-weight:bold;color: red; display: none;">Out of the stock.</span>
    <span id="quantity_error" style="color:red;"></span>
  </div>

  <div class="buttons">
  <?php if($content->quantity > 0 ) { 
    if($data['no_of_cart_item'] ==0 ){
      ?>
        <span id="buy_now_btn_when_not_having_cart_item"  onclick="pay_popup(<?php echo $content->price ?>)">Buy Now</span>
      <?php
    }else{
      ?>
        <button id="buy_now_btn" type="submit">Buy Now</button>

      <?php
    }
    ?>
        <button id="add_to_cart_btn" type="submit">Add to Cart</button>

  <?php
  }else{?>
    <span class="not_available_msg">Not available now. </span><br><br>
    <button id="buy_now_btn_disable">Buy Now</button>
    <button id="add_to_cart_btn_disable">Add to Cart</button>
  <?php
  }
  ?>
    </div>
  </form>
    
<div class="process_container">
      <!-- <div class="form_button">
        <span onclick="reset_sections()">What's inside</span>
        <span onclick="comment_section()">Comment</span>
        <span onclick="qna_section()">FAQ's</span>
      </div>
      <hr id="indicator">

      <div id="toggle_section_1" class="toggle_section">
          <?php if (!empty($data['similar'])): ?>
            <?php foreach($data['similar'] as $similar): ?>
              <div class="custormizable_item">
                <div class="related_item_images">
                  <img src="<?php echo URLROOT; ?>/public/upload/raw_material_images/<?php echo $similar->raw_material_image ?>" id="related_item_image"></img>
                </div>

                <div class="related_item_discription">
                  <span class="related_item_name"><?php
                  $product_name = $similar->product_name;
                  if (strlen($product_name) > 20) {
                    $product_name = substr($product_name, 0, 20) . "...";
                  }
                  echo $product_name;
                  ?>
                  </span><br>
                  <a href="<?php echo URLROOT?>/supplier_ad_view/indexmore?product_id<?php echo $similar->Product_id ?>"><span class="see_more_related_item">See product details</span></a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="no_related_items">
              No related items found.
            </div>
          <?php endif; ?>
      </div> -->



          <!-- comment_section -->
        <!-- <div id="toggle_section_2" class="toggle_section"> -->

            <!-- comment_section -->
        <!-- </div> toggle div  -->
    </div>
    </div>
  </div>
</div>


<div id="footer">
  <?php require APPROOT . '/views/Users/component/footer.php' ?>
</div>

<dialog id="my-dialog">
  <p>Item Successfully Added to the Wishlist</p>
  <button id="dialog-close-button">Close</button>
</dialog>



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
    document.querySelector('.errorMsg').style.display = 'block';
  }
  else{
    quantityInput.value = quantity;
    quantityInput.style.color="black";
    document.querySelector('.errorMsg').style.display = 'none';
  }
});

minusButton.addEventListener('click', () => {
  let quantity = parseInt(quantityInput.value);
  
  quantity--;
  quantityInput.style.color="black";
  document.querySelector('.errorMsg').style.display = 'none';
  
  if (quantity < 1) {
    quantity = 1;
    quantityInput.style.color="red";
  }
  quantityInput.value = quantity;
});
</script>
