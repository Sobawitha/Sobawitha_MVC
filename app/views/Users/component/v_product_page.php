<link rel="stylesheet" href="../css/Users/component/product_page.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<script src="../js/Users/component/product_page.js"></script>

<div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="">Sell</a></li>
                    <li><a href="<?php echo URLROOT?>/Login/login"><i class="fa-regular fa-user" id="user_home"></i> Join Us</a></li>    
                </ul>
            </nav>
            <hr class="home_hr">
</div>


<div class="body">


    <div class="section_1">

        <p class="filter_section_title">shop by category</p>

        <div class="filter_type_1">
            <span class="title">Brand</span><br>
            <div class="all_brands">
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">ABC producers</label><br>
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">Sara bhoomi</label><br>
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">Govi mithuru</label><br>
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">ABC producers</label><br>
                <label for="brand_1" id="brand_1"> <input type="checkbox" id="brand_1" name="brands" value="brand_1">Saru ketha</label><br>
                <span class="view_more">view more</span>
            </div>
        </div>

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

        <div class="filter_type_5">
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
        </div>

    </div>

    <div class="section_2">
        <div class="search_and_filter">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " require/></span>
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

            <?php
            for($i=0; $i<12; $i++){
                ?>
                
                <div class="adv_card">
                <div class="card_image" style="background: url(../images/background3.jpg); background-size: cover;
                                                height:75%;
                                                -webkit-background-size:cover ;
                                                background-position:center;
                                                margin:0px;
                                                padding:0px;">
                    <div class="product_detail">
                        <span class="product_name">Tea fertilizer</span><br>
                        <span class="owner">By ABC production</span>
                    </div>
                </div>

                <i class="fa-regular fa-heart" id="heart"></i>

                <div class="discription">
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <span class="price"> Rs. 500.00</span>
                    
                </div>
            </div>
                
                <?php
            }
            
            ?>
        </div>

    </div>

    <div class="last">

    </div>
</div>

<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>