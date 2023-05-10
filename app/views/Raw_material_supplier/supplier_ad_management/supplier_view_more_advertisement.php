<?php require APPROOT . '/views/Users/component/Header.php'?>

<?php
if($_SESSION['user_flag'] == 1){
    require APPROOT.'/views/Admin/Admin/admin_topnavbar.php';
    require APPROOT . '/views/Admin/Admin/admin_Sidebar.php';
}
else if($_SESSION['user_flag'] == 3){
    require APPROOT.'/views/Seller/Seller/seller_topnavbar.php';
    require APPROOT . '/views/Seller/Seller/seller_sidebar.php';
}

else if($_SESSION['user_flag'] == 4){
    require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php';
    require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php';
}
?>
<!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Raw_material_supplier/ad_management/ad_view.css"></link> -->
<!-- <script src="../js/Raw_material_supplier/ad_delete/ad_delete.js"></script>  -->


<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Raw_material_supplier/ad_management/ad_view_more.css"></link>
<!-- <script src="../js/Users/component/individual_item.js"></script> -->
<!-- <script src="../js/Raw_material_supplier/ad_view/ad_view_more.js"></script> -->


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
?>

<div class="body">
  <!-- <div class="section_1">

  </div> -->
  <div class="section_2">

    <span class="reg_no"><span class="sub_reg_no">Published On </span><?php echo $data['date']; ?></span>
    <div class="individual_image">

      <div class="image-container">
        <div class="main_image">
          <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name1']; ?>" onclick="switchImages()" id="main-image">
        </div>

        <div class="thumbnail-images">
          <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name1']; ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name1']; ?>')">
          <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name2']; ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name2']; ?>')">
          <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name3']; ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name3']; ?>')">
        </div>

        <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modal-image">
        </div>

      </div>
      
      <p class="product_discription">
       
        <?php
        $description = $data['product_description'];
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

  <?php

  // $is_wishlist_item = false;

  // foreach($data['wishlist_items'] as $wishlist_item)
  // {


  //   if($wishlist_item->Product_id == $content->Product_id)
  //   {
  //     $is_wishlist_item = true;
  //     break;
  //   }
  // }




  ?>

  <div class="section_3">
  <a href="<?php echo URLROOT ?>/Pages/product_page" class="back_to_home"><i class="fa-sharp fa-solid fa-arrow-left" id="arrow"></i>&nbsp;&nbsp;Back to product page</a><br><br><br>
    <span class="title_1">Raw Material</span><br>
    <span class="title_2"><?php echo $data['product_name']; ?></span>
    
    <a href="<?php echo URLROOT ?>/raw_material_product/add_to_wishlist?product_id=<?php echo $data['product_id'] ?>"> <i class="fa-solid fa-heart" id="add_wishlist_heart"></i></a>
    
    <br><br>

    <span class="title_3"><span class="sub_title_3">Company / Manufacturer  </span><?php echo $data['manufacturer']; ?></span><br><br>

    <!-- <span class="reg_no"><span class="sub_reg_no">Product Registration No  </span></span><br><br> -->
    <span class="product_type"><span class="sub_reg_no">Product Type </span><?php echo $data['type']; ?></span><br><br>
    <!-- <span class="crop_type"><span class="sub_reg_no">Crop Type  </span></span> -->

    <br><br>
    <span class="price">Rs. <?php echo $data['price']; ?></span>

    <section class="customerFeed">

      <div class="scf_maincontent">
        <br><br>
        <span class="title_4">Seller Rating</span><br>

        <?php $avg_rating = round($content->avg_rating); ?>
        <?php 
                for ($i = 1; $i <= 5; $i++) {
                $checked = ($i <= $avg_rating) ? 'checked' : '';
                echo '<span class="fas fa-star ' . $checked . ' "></span>';
                }
                ?>           
        <p style=font-size:14px;><?php echo $content -> avg_rating ?>  average based on <span class="num_of_reviews"><?php echo $content-> total_feedback_count ?></span> reviews.</p><br>
        <hr style="border:0.1px solid #f1f1f1"><br>

        <div class="row">
          <div class="side">
            <div class="n_star">5 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-5" style="width: <?php echo ($content->total_feedback_count > 0) ? ($content->rating_5_count/$content->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $content->rating_5_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">4 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-4" style="width: <?php echo ($content->total_feedback_count > 0) ? ($content->rating_4_count/$content->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $content->rating_4_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">3 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-3" style="width: <?php echo ($content->total_feedback_count > 0) ? ($content->rating_3_count/$content->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $content->rating_3_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">2 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-2" style="width: <?php echo ($content->total_feedback_count > 0) ? ($content->rating_2_count/$content->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $content->rating_2_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">1 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-1" style="width: <?php echo ($content->total_feedback_count > 0) ? ($content->rating_1_count/$content->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $content->rating_1_count ?></div>
          </div>
        </div>
      </div>
    </section>

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
    <br>
    <span id="errorMsg" style="padding-left:20px;font-weight:bold;color: red; display: none;">Out of the stock.</span>
    <span id="quantity_error" style="color:red;"></span>
  </div>
</div>

<div class="buttons">
<?php if($content->quantity > 0 ) { 
  if($data['no_of_cart_item'] ==0 ){
    ?>
      <button id="buy_now_btn" onclick="pay_popup(<?php echo $content->price ?>)">Buy Now</button>
    <?php
  }else{
    ?>
      <!-- <button id="buy_now_btn" onclick="add_to_cart()">Buy Now</button> -->
      <a href="<?php echo URLROOT ?>/fertilizer_product/add_to_cart_from_individual_page?product_id=<?php echo  $_GET['product_id']?>"><button id="buy_now_btn">Buy Now</button></a>

    <?php
  }
  ?>
      <!-- <button id="add_to_cart_btn" onclick="add_to_cart()">Add to Cart</button> -->
      <a href="<?php echo URLROOT ?>/fertilizer_product/add_to_cart_from_individual_page?product_id=<?php echo  $_GET['product_id']?>"><button id="add_to_cart_btn">Add to Cart</button></a>

<?php
}else{?>
  <span class="not_available_msg">Not awailable now. </span><br><br>
  <button id="buy_now_btn_disable">Buy Now</button>
  <button id="add_to_cart_btn_disable">Add to Cart</button>
<?php
}
?>
  
</div>

    
  </div>
</div>

  <?php require APPROOT . '/views/Users/component/footer.php' ?>



<dialog id="my-dialog">
  <p>Item Successfully Added to the Wishlist</p>
  <button id="dialog-close-button">Close</button>
</dialog>




<script>


// first script
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
        window.location.href = '<?php echo URLROOT ?>/fertilizer_product/complete_order?product_id=<?php echo $_GET['product_id'] ?>';
    } else {
        // Checkbox is not checked, show an error message
        //alert('Please agree to the terms and conditions before proceeding to checkout.');
        document.getElementById("terms_and_condition_check").style.display="block";
    }
}

</script>
<script>


// second script
function reset_sections(){
    var related_item = document.getElementById("toggle_section_1");
    var comment = document.getElementById("toggle_section_2");
    var qna = document.getElementById("toggle_section_3");
    var indicator = document.getElementById("indicator");
    qna.style.transform = "translateX(0px)";
    comment.style.transform = "translateX(0px)";
    related_item.style.transform = "translateX(0px)";
    indicator.style.transform = "translateX(-161px)";
   
}

function comment_section(){
    var related_item = document.getElementById("toggle_section_1");
    var comment = document.getElementById("toggle_section_2");
    var qna = document.getElementById("toggle_section_3");
    var indicator = document.getElementById("indicator");
    qna.style.transform = "translateX(-650px)";
    comment.style.transform = "translateX(-650px)";
    related_item.style.transform = "translateX(-650px)";
    indicator.style.transform = "translateX(-5px)";
}

function qna_section(){
    var related_item = document.getElementById("toggle_section_1");
    var comment = document.getElementById("toggle_section_2");
    var qna = document.getElementById("toggle_section_3");
    var indicator = document.getElementById("indicator");
    qna.style.transform = "translateX(-1150px)";
    comment.style.transform = "translateX(-1150px)";
    related_item.style.transform = "translateX(-1150px)";
    indicator.style.transform = "translateX(130px)";
}


/*comment section */
//for comment section
function open_save_cancel_btn(){
    document.querySelector(".btn").style.display='block';
}

function clear_comment(){
    document.querySelector(".comment-body").value='';
    document.querySelector(".btn").style.display='none';
}

function save_comment(){
    document.querySelector(".btn").style.display='none';
}

//for reply-section
function open_save_cancel_btns(id){
    document.getElementById(`btn-${id}`).style.display='block';
}

function open_replyform(id){
    document.getElementById(`reply_form-${id}`).style.display='block';
}

function clear_reply(id){
    document.getElementById(`reply-body-${id}`).value='';
    document.getElementById(`btn-${id}`).style.display='block';
}

function save_reply(id){
    document.getElementById(`btn-${id}`).style.display='none';
    
}

function display_reply(id){
    if(document.getElementById(`display_reply_all-${id}`).style.display=='none'){
        document.getElementById(`display_reply_all-${id}`).style.display='block';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_down-${id}`).innerHTML;

    }
    else{
        document.getElementById(`display_reply_all-${id}`).style.display='none';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_up-${id}`).innerHTML;
    }
}


/*QnA section */
//for questions
function open_save_cancel_btn(){
    document.querySelector(".btn_sec").style.display='block';
}

function clear_question(){
    document.querySelector(".comment-body").value='';
    document.querySelector(".btn_sec").style.display='none';
}

function save_question(){
    document.querySelector(".btn_sec").style.display='none';
}

//for reply-section
function open_save_cancel_btns_in_answer(id){
    document.getElementById(`ans_btn_sec-${id}`).style.display='block';
}

function open_answerform(id){
    document.getElementById(`answer_form-${id}`).style.display='block';
}

function clear_reply(id){
    document.getElementById(`reply-body-${id}`).value='';
    document.getElementById(`ans_btn_sec-${id}`).style.display='block';
}

function save_reply(id){
    document.getElementById(`ans_btn_sec-${id}`).style.display='none';
    
}

function display_answers(id){
    if(document.getElementById(`display_all_answers-${id}`).style.display=='none'){
        document.getElementById(`display_all_answers-${id}`).style.display='block';
        document.getElementById(`display_answer_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_down-${id}`).innerHTML;

    }
    else{
        document.getElementById(`display_all_answers-${id}`).style.display='none';
        document.getElementById(`display_answer_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_up-${id}`).innerHTML;
    }
}

function thanku_popup_close(){
  document.getElementById('thank_you_dialog_box').close();
}

function checkout() {
  const userInput = document.getElementById("quantity_input").value;
  const agreementCheckbox = document.querySelector('#terms-checkbox');
  
  if (agreementCheckbox.checked) {
    // Checkbox is checked, continue with checkout process
    window.location.href = '<?php echo URLROOT ?>/fertilizer_product/complete_order?product_id=<?php echo $_GET['product_id'] ?>';
  } else {
    // Checkbox is not checked, show an error message
    //alert('Please agree to the terms and conditions before proceeding to checkout.');
    document.getElementById("terms_and_condition_check").style.display="block";
  }
}

</script>
<script>

// third script

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
<script>
// fourth script

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






</script>