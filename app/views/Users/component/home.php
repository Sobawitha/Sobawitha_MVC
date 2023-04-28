<link rel="stylesheet" href="../css/Users/component/home.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<body>
    <header style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(40, 40, 40, 0.6)),url(../public/images/background2.jpg);
                                background-size: cover;
                                height:77vh;
                                -webkit-background-size:cover ;
                                background-position:center;
                                margin:0px;
                                padding:0px;">
        <div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="<?php echo URLROOT?>/dashboard/dashboard">Dashboard</a></li> 
                    <li><a href="">Sell</a></li>
                    <li><a href="<?php echo URLROOT?>/Login/login"><i class="fa-regular fa-user" id="user_home"></i> Login</a></li>    
                </ul>
            </nav>
            <hr class="home_hr">
        </div>
        
        <div class="discription">
            <p class="main">Find the best places to your trade</p>
            <p class=sub_main>Sobawitha is an online platform driven by agriculture nature by involving more people in their people in their in</p>
            <div class="search_bar">
                <div class="search_content">
                    <input type="text" name="search_text" placeholder="Search the forum" require/>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i> <span class="search">SEARCH</span></button>
                </div>
            </div>
            <div class="click_home_icon">
                <i class="fa-solid fa-cart-shopping" id="home_icon"></i>
                <i class="fa-solid fa-coins" id="home_icon"></i>
                <i class="fa-brands fa-forumbee" id="home_icon"></i>
                <i class="fa-solid fa-circle-info" id="home_icon"></i>
                <i class="fa-solid fa-blog" id="home_icon"></i>
            </div>

            <div class="home_icon_name">
                <span class="name" id="nameB">Buy</span>
                <span class="name" id="nameS">Sell</span>
                <span class="name" id="nameF">Forum</span>
                <span class="name" id="nameI">Information</span>
                <span class="name" id="nameBL">Blogs</span>
            </div>

            <div class="down_arrow">
                <span id="arrow_span"></span>
                <span id="arrow_span"></span>
            </div>
            
        </div>

    </header>

    <div class="second_part">
        <span class="second_part_header">What do you want to do?</span>
        <br>
        <span class="second_part_discription">is an online platform driven by agriculture nature by involving more people in their people in their in</span>

        <div class="service_cards">
            <a href="<?php echo URLROOT?>/Login/login" class="link"><div class="individual_service_card">
                <i class="fa-solid fa-store" id="icon"></i>
                <br>
                <span class="service_name">Selling</span>
            </div></a>

            <a href="#buying_section" class="link"><div class="individual_service_card">
                <i class="fa-brands fa-sellsy" id="icon"></i>
                <span class="service_name">Buying</span>
            </div></a>

            <a href="<?php echo URLROOT?>/resources/resource_page" class="link"><div class="individual_service_card">
                <i class="fa-solid fa-person-chalkboard" id="icon"></i>
                <span class="service_name">Instructing</span>
            </div></a>

            <a href="<?php echo URLROOT?>/forum/forum"class="link"><div class="individual_service_card">
                <i class="fa-brands fa-forumbee" id="icon"></i>
                <span class="service_name">Q&A</span>
            </div></a>
        </div>

        
   
   
    </div>

    <div class="third_part" id="buying_section">
        <span class="third_part_header">Latest Products</span>
        <br>
        <span class="second_part_discription">is an online platform driven by agriculture nature by involving more people in their people in their in</span>

        <div class="recent_product_card_section">
         
        <?php foreach($data['ads'] as $ads): ?>
        
                
                <div class="adv_card">
                <div class="card_image" style="background: url(<?php echo URLROOT ?>/public/upload/fertilizer_images/<?php echo $ads->fertilizer_img ?>); background-size: cover; height:75%; -webkit-background-size:cover;  background-position:center; margin:0px; padding:0px; ">
                    
                    <div class="product_detail">
                        <span class="product_name"><?php echo strlen($ads->product_name) > 20 ? substr($ads->product_name,0,20)."..." : $ads->product_name ?></span><br>

                        <span class="owner"><?php echo strlen($ads->manufacturer) > 20 ? substr($ads ->manufacturer,0,20 )."..." : $ads -> manufacturer ?></span>
                    </div>
                </div>

                <i class="fa-regular fa-heart" id="heart"></i>

                <div class="discription">
                <span class="price">Rs. <?php echo $ads->price ?></span>
                <?php $avg_rating = round($ads->avg_rating); ?>
               
                <!-- <span class="fas fa-star<?php echo ($avg_rating >= 1) ? ' checked' : ''; ?>"></span>
              <span class="fas fa-star <?php echo ($avg_rating >= 2) ? 'checked' : ''; ?>"></span>
              <span class="fas fa-star <?php echo ($avg_rating >= 3) ? 'checked' : ''; ?>"></span>
              <span class="fas fa-star <?php echo ($avg_rating >= 4) ? 'checked' : ''; ?>"></span>
              <span class="fas fa-star<?php echo ($avg_rating == 5) ? 'checked' : ''; ?>"></span> -->
                <?php 
                for ($i = 1; $i <= 5; $i++) {
                $checked = ($i <= $avg_rating) ? 'checked' : '';
                echo '<span class="fas fa-star ' . $checked . ' "></span>';
                }
                ?>
                </div>

            </div>
            
               

             <?php endforeach;?>
            
  </div>
    
  

    <div class="fourth_part">
        <span class="fourth_part_header">Collection</span>
        <div class="collection_product_card_setion">
         
       
        
         <?php foreach($data['allads'] as $allAds): ?>
                <div class="adv_card">
                <div class="card_image" style="background: url(<?php echo URLROOT ?>/public/upload/fertilizer_images/<?php echo $allAds->fertilizer_img ?>); background-size: cover; height:75%; -webkit-background-size:cover; background-position:center; margin:0px; padding:0px;">
                    <div class="product_detail">
                        <span class="product_name"><?php echo strlen($allAds->product_name) > 20 ? substr($allAds->product_name,0,20)."..." : $allAds->product_name ?></span><br>
                        <span class="owner"><?php echo strlen($allAds->manufacturer) > 20 ? substr($allAds ->manufacturer,0,20 )."..." : $allAds -> manufacturer ?></span>
                    </div>
                </div>

                <i class="fa-regular fa-heart" id="heart"></i>

                <div class="discription">
                <span class="price"> Rs. <?php echo $allAds->price ?></span>
                <?php $avg_rating = round($allAds->avg_rating); ?>
        
                <?php 
                for ($i = 1; $i <= 5; $i++) {
                $checked = ($i <= $avg_rating) ? 'checked' : '';
                echo '<span class="fas fa-star ' . $checked . ' "></span>';
                }
                ?>
            
                    
                </div>

            </div>
            <?php endforeach;?>
            
               
            

        </div>
        
        <div class="show_more">
                <a href="<?php echo URLROOT?>/Pages/product_page" class=""><span class="show_more_text">show more <i class="fa-solid fa-angles-right"></i></span></a> 
        </div>
    </div>

    <div class="fifth_part">
        <div class="acknowledgement">
            <div class="ack_author_sec"><img src="../images/dp.jpg" class="acknowledgement_img"></img><br>
            <span class="acknowledgement_author">M.R Mayunika</span>
            <br><br>
            <div class="acknowledgement_content_sec">
            <span class="acknowledgement_content">With gratitude, all praises go to Him, The Creator of all. After all obstacles and hardship that obstruct our path, finally we reach our goal. 
                With satisfaction, 
                now we are already finished our business plan report. Hereby, without doubt we would like to say that, during the completion of this course, 
                ample of knowledge and experiences have been obtained. Though, undeniably, it is quite difficult for us to complete the task, it is worthy and we learn much. 
                Alhamdulillah, thank you to the all mighty ALLAH S.W.T because of His divine guidance which has enabled us to finish our business plan.</span>
            </div>
            </div>
        </div>

        <div class="acknowledgement">
            <div class="ack_author_sec"><img src="../images/dp1.jpg" class="acknowledgement_img"></img><br>
            <span class="acknowledgement_author">M.R Mayunika</span>
            <br><br>
            <div class="acknowledgement_content_sec">
            <span class="acknowledgement_content">With gratitude, all praises go to Him, The Creator of all. After all obstacles and hardship that obstruct our path, finally we reach our goal. 
                With satisfaction, 
                now we are already finished our business plan report. Hereby, without doubt we would like to say that, during the completion of this course, 
                ample of knowledge and experiences have been obtained. Though, undeniably, it is quite difficult for us to complete the task, it is worthy and we learn much. 
                Alhamdulillah, thank you to the all mighty ALLAH S.W.T because of His divine guidance which has enabled us to finish our business plan.</span>
            </div>
            </div>
        </div>

        <div class="acknowledgement">
            <div class="ack_author_sec"><img src="../images/dp3.jpg" class="acknowledgement_img"></img><br>
            <span class="acknowledgement_author">Punsara Deshan</span>
            <br><br>
            <div class="acknowledgement_content_sec">
            <span class="acknowledgement_content">With gratitude, all praises go to Him, The Creator of all. After all obstacles and hardship that obstruct our path, finally we reach our goal. 
                With satisfaction, 
                now we are already finished our business plan report. Hereby, without doubt we would like to say that, during the completion of this course, 
                ample of knowledge and experiences have been obtained. Though, undeniably, it is quite difficult for us to complete the task, it is worthy and we learn much. 
                Alhamdulillah, thank you to the all mighty ALLAH S.W.T because of His divine guidance which has enabled us to finish our business plan.</span>
            </div>
            </div>
        </div>
    </div>


<?php

include 'footer.php';

?>