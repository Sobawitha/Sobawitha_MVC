<link rel="stylesheet" href="../css/Users/component/product_page.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>

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
            <?php foreach($data['products'] as $product): ?>
               
           
           
           
                <label for="brand_1" > <input type="checkbox"  name="brands" value="<?php echo $product->manufacturer?>"><?php echo $product->manufacturer?></label><br>
              

                <?php endforeach; ?>
                <span class="view_more">view more</span>
            </div>
        </div>

        <hr class="filter_hr">

        <div class="filter_type_2">
            <span class="title">Type</span><br>
            <div class="all_types">
          


                <label> <input type="checkbox"  name="brands" value="Liquid">Liquid</label><br>
                <label> <input type="checkbox"  name="brands" value="Solid">Solid</label><br>
                <label> <input type="checkbox"  name="brands" value="Packet">Packet</label><br>
                <label> <input type="checkbox"  name="brands" value="Bottles">Bottles</label><br>
            </div>
        </div>
        
        <hr class="filter_hr">

        <div class="filter_type_3">
            <span class="title">Price</span><br>
            <div class="all_prices">
            <!-- <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.5000.00 or more</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.5000.00 or less</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.2500.00 or less</label><br>
            <label for="price" id="price"> <input type="radio" id="price" name="diss_type" value="price">Rs.1000.00 or less</label><br> -->
            
            <div class="field">
              <span>Min</span>
              <input type="number" class="input-min" value="2500">
            </div>
            <div class="separator">
                -
            </div>
            <div class="field">
             <span>Max</span>
             <input type="number" class="input-max" value="7500">
            </div>
        
        
        
        </div>
        </div>

        <hr class="filter_hr">

        <div class="filter_type_4">
            <span class="title">Quantity</span><br>
            <div class="all_quantity">
            <label > <input type="radio"  name="diss_type" value="1">5 kg or more</label><br>
            <label > <input type="radio"  name="diss_type" value="2">1kg to 5kg</label><br>
            <label > <input type="radio"  name="diss_type" value="3">Below 5kg</label><br>
            <label > <input type="radio"  name="diss_type" value="4">Innovations</label><br>
            
            </div>
        </div>

        <hr class="filter_hr">

        <div class="filter_type_5">
            <span class="title">Location</span><br>
            <div class="all_locations">
                
              <?php foreach($data['provinces'] as $province): ?>
               
           
           
             <label> <input type="checkbox"  name="location" value="<?php echo $province ?>"><?php echo $province ?></label><br> 
                
            
             

               <?php endforeach; ?> 
            </div>
        </div>

    </div>

    <div class="section_2">
        <div class="search_and_filter">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder=" " required/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>

                    
                    </div>
                    <div class="live-search-result">
                        <ul class="search-result">
                             
                        </ul>
            </div>
        </div>

        <div class="dropdown-content" hidden>
        
            <a onclick = >Price Low to High</a>
            <a onclick >Price High to Low</a>
        </div>

        <div class="search_bar_filter">
                <span class="filter_title">Sort by : </span>
                <span class="sort_type" onclick="open_sorttype()">Best match<i class="fa-solid fa-chevron-down" id="drop_down"></i></span>
        </div>

        </div>




        <div class="recent_product_card_section">

       


<?php foreach($data['products'] as $product): ?>
               
           
    <div class="adv_card">
                <div class="card_image" style="background: url(../images/<?php echo $product->fertilizer_img?>.jpg); background-size: cover;
                                                height:75%;
                                                -webkit-background-size:cover ;
                                                background-position:center;
                                                margin:0px;
                                                padding:0px;">
                    <div class="product_detail">
                        <span class="product_name"><?php echo $product->product_name; ?></span><br>
                        <span class="owner"><?php echo $product->manufacturer?></span>
                    </div>
                </div>

                <i class="fa-regular fa-heart" id="heart"></i>

                <div class="discription">
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-solid fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <i class="fa-regular fa-star" id="star"></i>
                    <span class="price"> <?php echo $product->price?></span>
                    
                </div>
            </div>
                
             
                  
              
               
  
                 <?php endforeach; ?> 
        </div>

    </div>

    <div class="last">

    </div>
</div>

<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>
<script src="../js/Buyer/product_page.js" ></script>

