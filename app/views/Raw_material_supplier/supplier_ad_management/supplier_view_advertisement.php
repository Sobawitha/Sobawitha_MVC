<link rel="stylesheet" href="../css/Raw_material_supplier/ad_management/ad_view.css"></link>
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
  function search() {
    const searchTerm = document.getElementById('search_text').value;
    if (searchTerm) {
      const regex = new RegExp(searchTerm, 'gi');
      const elements = document.querySelectorAll('body *');
      for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        if (element.childNodes.length === 1 && element.childNodes[0].nodeType === 3) {
          const text = element.childNodes[0].textContent;
          if (text.match(regex)) {
            const highlightedText = text.replace(regex, '<span class="highlight">$&</span>');
            element.innerHTML = highlightedText;
          }
        }
      }
    }
  }

  function open_cancel_btn() {
    document.getElementById('cancel').style.display = 'inline-block';
  }

  function clear_search_bar() {
    document.getElementById('search_text').value = '';
    document.querySelector('.search_cont').placeholder = 'Search by keyword';
    document.getElementById('cancel').style.display = 'none';
  }
</script>



<div class="body">


    <div class="section_1">

        <p class="filter_section_title">shop by category</p>

        <hr class="filter_hr">

        <div class="filter_type_2">
            <span class="title">Type</span><br>
            <div class="all_types">
                <label for="type" id="type"> <input type="checkbox" id="type" name="brands" value="type">Liquid</label><br>
                <label for="type" id="type"> <input type="checkbox" id="type" name="brands" value="type">Solid</label><br>
                <label for="type" id="type"> <input type="checkbox" id="type" name="brands" value="type">Packet</label><br>
                <label for="type" id="type"> <input type="checkbox" id="type" name="brands" value="type">Bottles</label><br>
            </div>
        </div>
        
        <hr class="filter_hr">

        <div class="filter_type_3">
            <span class="title">Price</span><br>
            <div class="all_prices">
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.5000.00 or more</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.5000.00 or less</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.2500.00 or less</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.1000.00 or less</label><br>
            </div>
        </div>


        <hr class="filter_hr">

    </div>

    <div class="section_2">
        <div class="search_and_filter">
        <div class="search_and_filter">
        <form id="search_form">
            <div class="search_bar">
            <div class="search_content">
                <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search_text" id="search_text" placeholder="Search by any word" required/></span>
                <button type="button" class="search_btn" onclick="clear_search_bar()"><i class="fa-solid fa-xmark" id="cancel"></i></button>
                <span class="submit" class="search_btn" onclick="search()"><i class="fa fa-search" aria-hidden="true" id="search"></i></span>
            </div>
            </div>
        </form>
    </div>


        <div class="dropdown-content" hidden>
            <a href="">Best Match</a>
            <a href="">Price Low to High</a>
            <a href="">Price High to Low</a>
        </div>

        <div class="search_bar_filter">
                <span class="filter_title">Sort by : </span>
                <span class="sort_type" onclick="open_sorttype()">Best match<i class="fa-solid fa-chevron-down" id="drop_down"></i></span>
        </div>

        </div>




        <div class="recent_product_card_section">
            
            <?php foreach($data['ads'] as $ad): ?>
                
                <div class="adv_card">
                <div class="card_image" style="background: url(<?php echo URLROOT;?>/img/postsImgs/<?php echo $ad->raw_material_image;?>); background-size: cover; height:75%; -webkit-background-size:cover ; background-position:center; margin:0px; padding:0px;">
                    <div class="product_detail">
                        <?php if($_SESSION['user_flag']==3){
                            
                            if(in_array($ad->Product_id , array_column($data['seller_wishlist'], 'Product_id'))){
                                ?>
                                <a href="<?php echo URLROOT; ?>/supplier_ad_view/remove_wishlist?product_id=<?php echo $ad->Product_id; ?>"><i class="fa-regular fa-heart"  id="heart_in_wishlist"></i></a><br>
                                <?php
                            }else{
                                ?>
                                <a href="<?php echo URLROOT; ?>/supplier_ad_view/add_to_wishlist?product_id=<?php echo $ad->Product_id; ?>"><i class="fa-regular fa-heart"  id="heart"></i></a><br>
                                <?php
                            }
                            ?>
                
                <?php
            }else{
                ?>
                <i class="fa-regular fa-heart" id="heart"></i><br>
                <?php
            }
            ?>
            <a href="<?php echo URLROOT; ?>/supplier_ad_view/indexmore?product_id=<?php echo $ad->Product_id; ?>" id="product_card_link">
            <span class="product_name"><?php echo $ad->product_name; ?></span><br>
            <span class="owner">By <?php echo $ad->manufacturer; ?></span>
            </a>
        </div>
    </div>

                <div class="discription">
                <?php $avg_rating = round($ad->avg_rating); ?>
                <?php 
                    for ($i = 1; $i <= 5; $i++) {
                        $checked = ($i <= $avg_rating) ? 'checked' : '';
                        echo '<span class="fas fa-star ' . $checked . ' "></span>';
                        }
                        ?>
                    <span class="price"><?php echo $ad->price ?></span>
                    
                </div>
            </div>
            
            <?php endforeach; ?>
            

        
              
        </div>

    </div>

    <div class="last">

    </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>