<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/component/individual_item.css">
</link>
<script src="<?php echo URLROOT ?>/js/Users/component/individual_item.js"></script>

<?php
if ($_SESSION['user_flag'] == 1) {
  require APPROOT . '/views/Admin/Admin/admin_topnavbar.php';
  require APPROOT . '/views/Admin/Admin/admin_Sidebar.php';
} else if ($_SESSION['user_flag'] == 3) {
  require APPROOT . '/views/Seller/Seller/seller_topnavbar.php';
  require APPROOT . '/views/Seller/Seller/seller_sidebar.php';
} else if ($_SESSION['user_flag'] == 2) {
  require APPROOT . '/views/Buyer/Buyer/buyer_topnavbar.php';
  require APPROOT . '/views/Buyer/Buyer/buyer_Sidebar.php';
} else if ($_SESSION['user_flag'] == 4) {
  require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php';
  require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php';
} else if ($_SESSION['user_flag'] == 5) {
  require APPROOT . '/views/Agri_officer/Agri_officer/officer_topnavbar.php';
  require APPROOT . '/views/Agri_officer/Agri_officer/Officer_Sidebar.php';
} ?>

<?php
$content = $data['adcontent'];
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

  <div class="section_3">
    <a href="<?php echo URLROOT ?>/Pages/product_page" class="back_to_home"><i class="fa-sharp fa-solid fa-arrow-left" id="arrow"></i>&nbsp;&nbsp;Back to product page</a><br><br><br>
    <span class="title_1">fertilizer</span><br>
    <span class="title_2"><?php echo $content->product_name ?></span><br><br>

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

    <!-- <div class="select_quantity">
  <span class="header_quantity">Insert Quantity</span>
  <div class="select_quantity_input">
    <input type="text" name="quantity" placeholder="" >
    <span class="existing_quantity"><?php echo $content->quantity; ?> available</span>
  </div>
</div> -->

<div class="select_quantity">
  <span class="header_quantity">Quantity</span>
  <div class="select_quantity_input">
    <div class="quantity_control">
      <span class="minus_button">-</span>
      <input type="text" name="quantity" value="1">
      <span class="plus_button">+</span>
    </div>
    <span class="existing_quantity"><?php echo $content->quantity; ?> available</span>
  </div>
</div>

<script>
 const plusButton = document.querySelector('.plus_button');
const minusButton = document.querySelector('.minus_button');
const quantityInput = document.querySelector('input[name="quantity"]');

plusButton.addEventListener('click', () => {
  let quantity = parseInt(quantityInput.value);
  quantity++;
  quantityInput.value = quantity;
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

        <?php $product_id = 1 ?> <!--only for testing-->
        <form method="POST" action="<?php echo URLROOT ?>/fertilizer_product/post_comment?product_id=<?php echo $product_id ?>">
          <div id="comment_form">
            <span id="usercommon"><?php echo ucfirst($_SESSION['username'][0]) ?></span>
            <input type="text" class="comment-body" placeholder="Add a comment" onclick="open_save_cancel_btn()" name="comment" required />
          </div>

          <div class="btn">
            <button type="submit" class="cancelbtn" value="cancel" onclick="clear_comment()">Cancel</button>
            <button type="submit" class="commentbtn" name="commentbtn" onclick="save_comment()">Comment</button>
          </div>
        </form>
      </div>

      <div id="toggle_section_3" class="toggle_section">
        Q&A
      </div>




    </div>

  </div>
</div>

<div id="footer">
  <?php require APPROOT . '/views/Users/component/footer.php' ?>
</div>