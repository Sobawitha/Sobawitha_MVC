<?php require APPROOT . '/views/Users/component/Header.php'?>
<?php require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
<?php require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php'?>
<!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Raw_material_supplier/ad_management/ad_view.css"></link> -->
<!-- <script src="../js/Raw_material_supplier/ad_delete/ad_delete.js"></script>  -->


<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Raw_material_supplier/ad_management/ad_view_more.css"></link>
<!-- <script src="../js/Users/component/individual_item.js"></script> -->
<script src="<?php echo URLROOT ?>/public/js/Raw_material_supplier/ad_view/ad_view_more.js"></script>

<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
      <div class="individual_image">

      <div class="image-container">
        <div class="main_image">
          <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name']; ?>" onclick="switchImages()" id="main-image">
        </div>

        <div class="thumbnail-images">
          <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name']; ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name']; ?>')">
          <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_two ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_two ?>')">
          <img src="<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_three ?>" class="thumbnail" onclick="changeImage('<?php echo URLROOT; ?>/public/upload/fertilizer_images/<?php echo $content->img_three ?>')">
        </div>

        <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modal-image">
        </div>













        <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name']; ?>" class="i_image">

        <p class="product_discription">
                <span class="first_character">T</span><?php echo $data['product_description']; ?>
        </p>
        <p class="product_discription">
                <span class="first_characters">H</span>he rapid development of livestock and poultry farming produces a lot of excrement and sewage.
                The harmful elements of these fouling are too high to be processed by traditional returning way.
                For this situation, our company has developed the organic fertilizer production line which use high
                efficient solid-liquid rotten aseptic deodorization technology as the core, and the whole production
                equipment process includes: high efficient excrement, raw material mixing, granule processing, drying
                and packin.
        </p>
      </div>


    </div>

    <div class="section_3">
        <span class="back_to_home"><i class="fa-sharp fa-solid fa-arrow-left" id="arrow"></i>&nbsp;&nbsp;Back to homepage</span><br><br><br>
        <span class="title_1">fertilizer</span><br>
        <span class="title_2">For vegitable special</span>

        <br><br>
        <span class="price">Rs. 5000.00</span>

        <section class="customerFeed">

            <div class="scf_maincontent">
              <!-- <h4>Customer Feedbacks</h4>
              <hr> <br> -->

              <br><br>

              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <i class="fa-regular fa-star checked"></i>
              <p style=font-size:14px;>4.1 average based on 69 reviews.</p><br>
              <hr style="border:0.1px solid #f1f1f1"><br>

              <div class="row">
                <div class="side">
                <div class="n_star">5 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-5"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">35</div>
              </div>
              <div class="side">
                <div class="n_star">4 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-4"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">15</div>
              </div>
              <div class="side">
                <div class="n_star">3 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-3"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">10</div>
              </div>
              <div class="side">
                <div class="n_star">2 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-2"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">3</div>
              </div>
              <div class="side">
                <div class="n_star">1 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-1"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">6</div>
              </div>
            </div>



            </div>
        </section>



        <div class="select_quantity">
            <span class="header_quantity">Quantity</span>
            <div class="select_quantity_buttons">
                <span class="quantity_button">500 g</span>
                <span class="quantity_button">1 kg</span>
                <span class="quantity_button">1500 g</span>
            </div>
        </div>

        <div class="filter">
            <table class="filter_table">
                <tr>
                    <td id="filter_type_1" onclick="filter()">What's inside</td>
                    <td id="filter_type_2">Comments</td>
                    <td id="filter_type_3">FAQ's</td>
                </tr>
            </table>
        </div>

        <div class="for_filter_type_1">
            <div class="custormizable_item">
                <div class="related_item_images">
                    <img src="../images/related_item_image_2.jpg" id="related_item_image"></img>
                </div>
                <div class="related_item_discription">
                    <span class="related_item_name">Vegitable fertilizer_1</span><br>
                    <span class="see_more_related_item">See product details</span>
                </div>
            </div>

            <div class="custormizable_item">
                <div class="related_item_images">
                    <img src="../images/related_item_image_1.jpg" id="related_item_image"></img>
                </div>
                <div class="related_item_discription">
                    <span class="related_item_name">Vegitable fertilizer_1</span><br>
                    <span class="see_more_related_item">See product details</span>
                </div>
            </div>
        </div>

        <div class="for_filter_type_2">
            comment section
        </div>

        <div class="for_filter_type_3">
            Q&A
        </div>

    </div>
</div>


