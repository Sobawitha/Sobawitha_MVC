<link rel="stylesheet" href="../css/Users/component/home.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<body>
    <header>
        <div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="">Sell</a></li>
                    <li><a href=""><i class="fa-regular fa-user" id="user_home"></i> Join Us</a></li>    
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
                <span id="name">Buy</span>
                <span id="name">Sell</span>
                <span id="name">Forum</span>
                <span id="name">Information</span>
                <span id="name">Blogs</span>
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
        
        <table style="width:40%">
        <tr>
            <th colspan="2" class="img11" ><span class="td_text">buying</span></td>
            <th rowspan="2" class="img12"><span class="td_text">selling</span></td>
        </tr>
        <tr>
            <th  class="img21"><span class="td_text">Instructing</span></td>
            <th class="img22"><span class="td_text">Questioning</span></td>
        </tr>
        </table>
   
   
    </div>

    <div class="third_part">
        <span class="third_part_header">Latest Products</span>
        <br>
        <span class="second_part_discription">is an online platform driven by agriculture nature by involving more people in their people in their in</span>

        <div class="recent_product_card_section">
            
        <?php
            for($i=1; $i<=4; $i++){
                ?>
                <div class="adv_card">
                <div class="card_image">
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
            }?>
            

            
    </div>

    <div class="fourth_part">
        <span class="fourth_part_header">Collection</span>
        <div class="collection_product_card_setion">

        <?php
            for($i=1; $i<=12; $i++){
                ?>
                <div class="adv_card">
                <div class="card_image">
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
            }?>

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