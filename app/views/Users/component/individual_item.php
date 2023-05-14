<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/component/individual_item.css"></link>
<script src="<?php echo URLROOT ?>/js/Users/component/individual_item.js" defer></script>

<script >
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
    window.location.href = '<?php echo URLROOT ?>/cart/checkout_from_individual_page';
  } else {
    // Checkbox is not checked, show an error message
    //alert('Please agree to the terms and conditions before proceeding to checkout.');
    document.getElementById("terms_and_condition_check").style.display="block";
  }
}


</script>

<script>
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
    comment.style.transform = "translateX(-1170px)";
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
function open_save_cancel_btn_for_question(){
    document.querySelector(".btn_sec").style.display='block';
}

function clear_question(){
    document.querySelector(".comment1-body").value='';
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
  console.log(userInput);
  if (agreementCheckbox.checked) {
    // Checkbox is checked, continue with checkout process
    window.location.href = '<?php echo URLROOT ?>/cart/checkout_from_individual_page?product_id=<?php echo $_GET['product_id'] ?>&quantity='+userInput;
  } else {
    // Checkbox is not checked, show an error message
    //alert('Please agree to the terms and conditions before proceeding to checkout.');
    document.getElementById("terms_and_condition_check").style.display="block";
  }
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
 
      <i class="fa-solid fa-bag-shopping" id="bag"></i>  
    </div>
  </dialog>






<?php
$content = $data['adcontent'];
$feedback = $data['feedback'];
?>

<div class="body">
  <div class="section_1">

  </div>
  <div class="section_2">
  <span class="reg_no"><span class="sub_reg_no">Published On </span><?php echo $content->date ?></span>
    <div class="individual_image">

      <div class="image-container">
        <div class="main_image">
          <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->fertilizer_img ?>" onclick="switchImages()" id="main-image">
        </div>

        <div class="thumbnail-images">
          <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->fertilizer_img ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->fertilizer_img ?>')">
          <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_two ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_two ?>')">
          <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_three ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_three ?>')">
          <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_four ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_four ?>')">
          <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_five ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_five ?>')">
        </div>

        <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modal-image">
        </div>

      <script>


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

<?php

$is_wishlist_item = false;
// $is_cart_item = false;
foreach($data['wishlist_items'] as $wishlist_item)
{
  if($wishlist_item->Product_id == $content->Product_id)
  {
    $is_wishlist_item = true;
    break;
  }
}
?>

  <div class="section_3">
  <span class  = "hidden"><?php if(isset($_SESSION['cart_status'])){echo true;}unset($_SESSION['cart_status']);?></span> 


    <a href="<?php echo URLROOT ?>/Pages/product_page" class="back_to_home"><i class="fa-sharp fa-solid fa-arrow-left" id="arrow"></i>&nbsp;&nbsp;Back to product page</a><br><br><br>
    <span class="title_1">fertilizer</span><br>
    <span class="title_2"><?php echo $content->product_name ?></span>
    <?php if(isset($_SESSION['user_id'])){
      ?>
      <i class="<?php echo   $is_wishlist_item ? 'fa-solid':'fa-regular'?> fa-heart" id="add_wishlist_heart" data-product-id="<?php echo $content->Product_id ?>" onclick = "editWishlist()"></i>
      <?php
    }else{
      ?>
        <a href="<?php echo URLROOT?>/Login/login"><i class="fa-regular fa-heart" id="add_wishlist_heart"></i><a>
      <?php
    }?>
    
    
    <br><br>

    <span class="title_3"><span class="sub_title_3">Company / Manufacturer  </span><?php echo $content->manufacturer ?></span><br><br>

    <span class="reg_no"><span class="sub_reg_no">Product Registration No  </span><?php echo $content->registration_no ?></span><br><br>
    <span class="product_type"><span class="sub_reg_no">Product Type </span><?php echo $content->type ?></span><br><br>
    <span class="crop_type"><span class="sub_reg_no">Crop Type  </span><?php echo $content->crop_type ?></span>

    <br><br>
    <span class="price">Rs. <?php echo $content->price ?></span>

    <section class="customerFeed">

      <div class="scf_maincontent">
        <br><br>
        <span class="title_4">Seller Rating</span><br>

        <?php $avg_rating = round($feedback->avg_rating); ?>
        <?php 
                for ($i = 1; $i <= 5; $i++) {
                $checked = ($i <= $avg_rating) ? 'checked' : '';
                echo '<span class="fas fa-star ' . $checked . ' "></span>';
                }
                ?>           
        <p style=font-size:14px;><?php echo ($feedback->avg_rating == 0) ? "0.00" :  number_format($feedback->avg_rating, 2); ?> average based on <span class="num_of_reviews"><?php echo $feedback-> total_feedback_count ?></span> reviews.</p><br>
        <hr style="border:0.1px solid #f1f1f1"><br>

        <div class="row">
          <div class="side">
            <div class="n_star">5 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-5" style="width: <?php echo ($feedback->total_feedback_count > 0) ? ($feedback->rating_5_count/$feedback->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feedback->rating_5_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">4 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-4" style="width: <?php echo ($feedback->total_feedback_count > 0) ? ($feedback->rating_4_count/$feedback->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feedback->rating_4_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">3 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-3" style="width: <?php echo ($feedback->total_feedback_count > 0) ? ($feedback->rating_3_count/$feedback->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feedback->rating_3_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">2 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-2" style="width: <?php echo ($feedback->total_feedback_count > 0) ? ($feedback->rating_2_count/$feedback->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feedback->rating_2_count ?></div>
          </div>
          <div class="side">
            <div class="n_star">1 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
            <div class="bar-1" style="width: <?php echo ($feedback->total_feedback_count > 0) ? ($feedback->rating_1_count/$feedback->total_feedback_count*100) : 0; ?>%;"></div>
            </div>
          </div>
          <div class="side right">
            <div class="count_star"><?php echo $feedback->rating_1_count ?></div>
          </div>
        </div>
      </div>
    </section>

<form action="<?php echo URLROOT ?>/cart/add_to_cart_from_individual_page" method="POST">
<input type="hidden" name="product_id" value="<?php echo $_GET['product_id']; ?>">
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
  </div>
  <span id="errorMsg" style="padding-left:20px;font-weight:bold;color: red; display: none;">Out of the stock.</span>
    <span id="quantity_error" style="color:red;"></span>
</div>

<div class="buttons">
<?php if($content->quantity > 0) { 
  if($data['no_of_cart_item'] ==0 ){
    ?>
    <?php if(isset($_SESSION['user_id'])) { ?>
      <button id="buy_now_btn" onclick="event.preventDefault();pay_popup(<?php echo $content->price ?>)">Buy Now</button>
    <?php }else{ ?>
      <a href="<?php echo URLROOT ?>/Login/login"><span id="buy_now_btn_all">Buy Now</span></a>
    <?php } ?>
    <?php
  }else{
    ?>
      
      <button id="buy_now_btn" type ="submit">Buy Now</button></a>

    <?php
  }
  ?>
    <?php if(isset($_SESSION['user_id'])) { ?>
      <button id="add_to_cart_btn"  type = "submit">Add to Cart</button>
    <?php }else{ ?>
      <a href="<?php echo URLROOT ?>/Login/login"><span id="add_to_cart_btn_all">Add to Cart</span></a>
    <?php } ?>
    

      <!-- <button id="add_to_cart_btn" onclick="add_to_cart()">Add to Cart</button> -->
      <!-- <button type="submit" id="add_to_cart_btn" data-product-id="<?php echo $content->Product_id ?>">Add to Cart</button> -->
</form>
<?php
}else{?>
  <span class="not_available_msg">Not awailable now. </span><br><br>
  <button id="buy_now_btn_disable">Buy Now</button>
  <button id="add_to_cart_btn_disable">Add to Cart</button>
<?php
}
?>
  
</div>

<!-- for quantity   -->
<script>
 const plusButton = document.querySelector('.plus_button');
const minusButton = document.querySelector('.minus_button');
const quantityInput = document.querySelector('input[name="quantity"]');
const available_quantity = document.getElementById('existing_quantity');
const quantity =  quantityInput.value;
const productId  =  document.querySelector('input[type="hidden"]').value;
const priceSpan = document.querySelector('.price');
const priceText = priceSpan.textContent;  // "Rs. 750.00"
const priceValue = priceText.replace(/[^0-9.]/g, '');  // "750.00"
const price = parseFloat(priceValue);  // 750.00
const name = document.querySelector('.title_2').textContent;

plusButton.addEventListener('click', () => {
  let quantity = parseInt(quantityInput.value);
  let available_quantity = parseInt(document.getElementById("existing_quantity_value").textContent);
  console.log(quantity);
  console.log(available_quantity);
  quantity++;
  //quantityInput.value = quantityInput.value +1;
  if(quantity>available_quantity){
    quantityInput.style.color="red";
    document.getElementById("errorMsg").style.display = "block";
  }
  else{
    quantityInput.value = quantity;
    quantityInput.style.color="black";
    document.getElementById("errorMsg").style.display = "none";
  }
});

minusButton.addEventListener('click', () => {
  let quantity = parseInt(quantityInput.value);
  quantity--;
  quantityInput.style.color="black";
  document.getElementById("errorMsg").style.display = "none";
  if (quantity < 1) {
    quantity = 1;
    quantityInput.style.color="red";
    document.getElementById("errorMsg").style.display = "block";
  }
  quantityInput.value = quantity;
});
</script>

<div class="process_container">
      <div class="form_button">
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
                  <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $similar->fertilizer_img ?>" id="related_item_image"></img>
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
                  <a href="<?php echo URLROOT?>/fertilizer_product/view_individual_product/<?php echo $similar->Product_id ?>"><span class="see_more_related_item">See product details</span></a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="no_related_items">
              No related items found.
            </div>
          <?php endif; ?>
      </div>
          <!-- comment_section -->
        <div id="toggle_section_2" class="toggle_section">

            <?php $product_id = $_GET['product_id']?> <!--only for testing-->
            
            
            
            <form method="POST" action="<?php echo URLROOT?>/fertilizer_product/post_comment?product_id=<?php echo $product_id?>" >
                    
                
                    <div id="comment_form">
                        
                        <?php if(isset($_SESSION['user_id'])){ ?>
                          <span id="usercommon"><?php echo ucfirst($_SESSION['username'][0])?></span>
                        <?php } else{ ?>
                          <span id="usercommon"><?php echo ('U')?></span>
                         <?php }  ?>
                        <input type="text" class="comment-body" placeholder="Add a comment"  onclick="open_save_cancel_btn()" name="comment"  required/>
                    </div>
                    <div  class="btn">
                        
                        <?php if(isset($_SESSION['user_id'])){ ?>
                          <button type="submit" class="commentbtn" name="commentbtn" onclick="save_comment()">Comment</button>
                        <?php } else {?>
                          <a href="<?php echo URLROOT?>/Login/login"><span type="submit" class="commentbtn_for_all" >Comment</span></a>
                        <?php } ?>
                        <button type="submit" class="cancelbtn" value="cancel" onclick="clear_comment()">Cancel</button>
                    </div>

                  
            </form>

            <div class="comment_reply">
            <?php
              foreach($data['comments'] as $comment):?>
                <span id="user-<?php echo $comment->comment_id?>" class="user"><?php echo ucfirst(($comment->commented_by_full_name[0]))?></span> 
                <div class="display_comment">
                    <P class="name"> <?php echo $comment->commented_by_full_name?><span class="publish_date"><?php echo $comment->comment_date?></span></P>
                    <p class="comment_post"> <?php echo $comment->comment?> </p>
                    <div class="icon">
                        <i class="fa-sharp fa-solid fa-reply-all" id="replybtn" onclick="open_replyform(<?php echo $comment->comment_id?>)"></i><span class="reply">Reply</span>
                        <?php if($comment->no_of_reply >0 ){ ?> 
                            <br><button class="reply_visible_click_button" id="reply_visible_click_button-<?php echo $comment->comment_id?>" onclick="display_reply(<?php echo $comment->comment_id?>)">
                            <span id="display_reply_btn_icon-<?php echo $comment->comment_id?>" class="drop_down_btn"> <i class="fa fa-chevron-circle-up" aria-hidden="true" ></i></span><span class="display_reply_btn_text">Reply</span></button>
                            <div class="replace_dropdown_arrows" hidden>
                                    <span id="arrow_up-<?php echo $comment->comment_id?>"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                    <span id="arrow_down-<?php echo $comment->comment_id?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                            </div>  
                        <?php }?>    
                    </div>
              </div>

                <!--Reply form-->
                <div id="reply_form-<?php echo $comment->comment_id ?>" class="reply_form">
                    <form method="POST" action="<?php echo URLROOT?>/fertilizer_product/post_reply?product_id=<?php echo $product_id?>&comment_id=<?php echo $comment->comment_id?>">
                        <span id="user-<?php echo $comment->comment_id?>" class="user-reply"><?php echo ucfirst($_SESSION['username'][0])?></span>
                        <input type="text" class="reply-body" placeholder="Add a reply" id="reply-body-(<?php echo $comment->comment_id?>)" onclick="open_save_cancel_btns(<?php echo $comment->comment_id?>)" name="reply"  required/>
                        <div id="btn-<?php echo $comment->comment_id?>" class="btn">
                            <button type="submit"  class="cancel" id="cancelbtn-<?php echo $comment->comment_id?>" value="cancel" onclick="clear_reply()">Cancel</button>
                            <button class="" type="submit" class="commentbtn" id="commentbtn-<?php echo $comment->comment_id?>" name="replybtn" onclick="save_reply() " value="<?php echo $comment->comment_id?>">Reply</button> 
                        </div>
                    </form>
                </div>
              

                <!--display_reply-->
                <div class="display_reply_all" id="display_reply_all-<?php echo $comment->comment_id?>">
                <?php if($comment->no_of_reply >0){ ?> 
                  <?php foreach ($data['reply_for_comment'] as $comment_reply):
                    if ($comment_reply->comment_id == $comment->comment_id) {?>

                      <div class="reply_section">
                      <span id="user-<?php echo $comment_reply->reply_id?>" class="user-reply"><?php echo ucfirst(($comment_reply->reply_user_full_name[0]))?></span>
                      <div class="display_reply">
                          <P class="name"> <?php echo $comment_reply->reply_user_full_name?><span class="publish_date"><?php echo $comment_reply->reply_date?></span></P>
                          <p class="comment_post"> <?php echo $comment_reply->reply ?> </p>
                      </div>
                      </div>
                    <?php }?>
                  <?php endforeach;?>
                <?php }?>
                </div>
                <hr>
                <br>
              <?php endforeach;?>
            </div> 
            </div> 
          

          <div id="toggle_section_3" class="toggle_section">
          <?php if(isset($_SESSION['user_id'])){ ?>
          <?php $product_id = $_GET['product_id']?> <!--only for testing-->
            <form method="POST" action="<?php echo URLROOT?>/fertilizer_product/post_question?product_id=<?php echo $product_id?>" >
                    <div id="post_question_form">
                        <?php if(($data['current_user_gender'])=='f' or ($data['current_user_gender'])=='F'){
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/female_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        else{
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/male_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        ?>
                        
                        <input type="text" class="comment1-body" placeholder="Add a comment"  onclick="open_save_cancel_btn_for_question()" name="question"  required/>
                    </div>
                    <div class="btn_sec">
                        <button type="submit" class="cancelbtn" value="cancel" onclick="clear_question()">Cancel</button>
                        <button type="submit" class="commentbtn" name="commentbtn" onclick="save_question()">Comment</button>
                    </div>
            </form>


            
            <div class="question_answers">
            <?php
              foreach($data['question'] as $question):?>
                        <?php if(($question->asked_user_gender)=='f'){
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/female_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        else{
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/male_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
              ?>
                <div class="display_question">
                    <P class="name"> <?php echo $question->asked_by_full_name?><span class="publish_date"><?php echo $question->q_date?></span></P>
                    <p class="question_post"> <?php echo $question->question?> </p>
                    <div class="icon">

                        <?php if($_SESSION['user_id']==$data['product_owner_id']){
                          ?>
                              <i class="fa-sharp fa-solid fa-reply-all" id="replybtn" onclick="open_answerform(<?php echo $question->question_id?>)"></i><span class="reply">Reply</span>
                          <?php
                        }?>

                        <?php if($question->no_of_answers >0 ){ ?> 
                            <br><button class="answer_visible_click_button" id="answer_visible_click_button-<?php echo $question->question_id?>" onclick="display_answers(<?php echo $comment->comment_id?>)">
                            <span id="display_answer_btn_icon-<?php echo $question->question_id?>" class="drop_down_btn"> <i class="fa fa-chevron-circle-up" aria-hidden="true" ></i></span><span class="display_reply_btn_text">Reply</span></button>
                            <div class="replace_dropdown_arrows" hidden>
                                    <span id="arrow_up-<?php echo $question->question_id?>"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                    <span id="arrow_down-<?php echo $question->question_id?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                            </div>  
                        <?php }?>    
                    </div>
                </div>

                <!--answer form-->
                <div id="answer_form-<?php echo $question->question_id ?>" class="answer_form">
                    <form method="POST" action="<?php echo URLROOT?>/fertilizer_product/post_answer?product_id=<?php echo $product_id?>&question_id=<?php echo $question->question_id?>">
                    <?php if(($data['current_user_gender'])=='f'){
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/female_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        else{
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/male_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                    ?>
                        <input type="text" class="answer-body" placeholder="Add a answer" id="reply-body-(<?php echo $question->question_id?>)" onclick="open_save_cancel_btns_in_answer(<?php echo $question->question_id?>)" name="answer"  required/>
                        <div id="ans_btn_sec-<?php echo $question->question_id?>" class="ans_btn_sec">
                            <button type="submit"  class="cancel" id="cancelbtn-<?php echo $question->question_id?>" value="cancel" onclick="clear_reply()">Cancel</button>
                            <button class="" type="submit" class="commentbtn" id="commentbtn-<?php echo $question->question_id?>" name="replybtn" onclick="save_reply() " value="<?php echo $question->question_id?>">Reply</button> 
                        </div>
                    </form>
                </div>

                <!--display_answer-->
                <div class="display_all_answers" id="display_all_answers-<?php echo $question->question_id?>">
                <?php if($question->no_of_answers){ ?> 
                  <?php foreach ($data['answers'] as $answers):
                    if ($answers->answer_question_id == $question->question_id) {?>
                      <div class="answer_section">
                      <?php if(($answers->answer_user_gender)=='f'){
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/female_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        else{
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/male_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        ?>
                      <div class="display_answer">
                          <P class="name"> <?php echo $answers->answer_user_full_name?><span class="publish_date"><?php echo $answers->answer_date?></span></P>
                          <p class="comment_post"> <?php echo $answers->answer ?> </p>
                      </div>
                      </div>
                    <?php }?>
                  <?php endforeach;?>
                <?php }?>
                </div>
                <hr>

              <?php endforeach;?>
              </div>
          </div>
          <?php }else{ ?>
          <h3>Not available.</h3>
          <?php } ?>
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
