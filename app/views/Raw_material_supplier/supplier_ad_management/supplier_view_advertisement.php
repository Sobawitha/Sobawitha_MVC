<link rel="stylesheet" href="../css/Raw_material_supplier/ad_management/ad_view.css"></link>

<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
<script src="../js/Users/component/product_page.js"></script>



<div class="body">


    <div class="section_1">

        <p class="filter_section_title">shop by category</p>

        <!-- <div class="filter_type_1">
            <span class="title">Brand</span><br>
            <div class="all_brands">
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">ABC producers</label><br>
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">Sara bhoomi</label><br>
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">Govi mithuru</label><br>
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">ABC producers</label><br>
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">Saru ketha</label><br>
                <span class="view_more">view more</span>
            </div>
        </div> -->

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

        <div class="filter_type_4">
            <span class="title">Quantity</span><br>
            <div class="all_quantity">
            <label for="quantity" id="filter_label"> <input type="radio" id="quantity" name="diss_type" value="quantity">5 kg or more</label><br>
            <label for="quantity" id="filter_label"> <input type="radio" id="quantity" name="diss_type" value="quantity">less than Rs.5000.00</label><br>
            <label for="quantity" id="filter_label"> <input type="radio" id="quantity" name="diss_type" value="quantity">Innovations</label><br>
            <label for="quantity" id="filter_label"> <input type="radio" id="quantity" name="diss_type" value="quantity">Innovations</label><br>
            
            </div>
        </div>

        <hr class="filter_hr">

        <!-- <div class="filter_type_5">
            <span class="title">Location</span><br>
            <div class="all_locations">
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
                <label for="location_1" id="location_1"> <input type="checkbox" id="location_1" name="location" value="location_1">province_1</label><br>
            </div>
        </div> -->

    </div>

    <div class="section_2">
        <div class="search_and_filter">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="" require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
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
            
            <?php foreach($data['posts'] as $ad): ?>
                <a href="<?php echo URLROOT?>/supplier_ad_view/indexmore/<?php echo $ad->Product_id ?>" id = "product_card_link">
                <div class="adv_card">
                <div class="card_image" style="background: url(<?php echo URLROOT;?>/img/postsImgs/<?php echo $ad->raw_material_image;?>); background-size: cover;
                                                height:75%;
                                                -webkit-background-size:cover ;
                                                background-position:center;
                                                margin:0px;
                                                padding:0px;">
                    <div class="product_detail">
                        <span class="product_name"><?php echo $ad->product_name ?></span><br>
                        <span class="owner">By <?php echo $ad->manufacturer ?></span>
                    </div>
                </div>

                <i class="fa-regular fa-heart" id="heart"></i>

                <div class="discription">
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <span class="price"><?php echo $ad->price ?></span>
                    
                </div>
            </div>
            </a>
            <?php endforeach; ?>
            

        
              
        </div>

    </div>

    <div class="last">

    </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>