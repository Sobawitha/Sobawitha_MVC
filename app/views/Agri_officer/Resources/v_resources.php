<link rel="stylesheet" href="../css/Agri_officer/resources/resource_page.css"></link>
<script src="../js/agri_officer/resources/resource_page.js"></script> 
<?php require APPROOT.'/views/Users/component/Header.php'?>


<?php
if($_SESSION['user_flag'] == 1){
    require APPROOT.'/views/Admin/Admin/admin_topnavbar.php';
    require APPROOT . '/views/Admin/Admin/admin_Sidebar.php';
}
else if($_SESSION['user_flag'] == 3){
    require APPROOT.'/views/Seller/Seller/seller_topnavbar.php';
    require APPROOT . '/views/Seller/Seller/seller_sidebar.php';
}
else if($_SESSION['user_flag'] == 2){
    require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php';
    require APPROOT . '/views/Buyer/Buyer/buyer_Sidebar.php';
}
else if($_SESSION['user_flag'] == 4){
    require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php';
    require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php';
}
else if($_SESSION['user_flag'] == 5){
    require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php';
    require APPROOT . '/views/Agri_officer/Agri_officer/Officer_Sidebar.php';
}



?>


<?php
function setColor($tag){
    if($tag == 'Production') return 'set-green';
    if($tag == 'Knowledge') return 'set-yellow';
    if($tag == 'Innovations') return 'set-orange';
    if($tag == 'New_technique') return 'set-purple';
}


function set_filterbtn_Color($tag){
    if($tag == 'All categories') return 'set-filterbtn-yellow';
    if($tag == 'Production') return 'set-filterbtn-green';
    if($tag == 'Knowledge') return 'set-filterbtn-yellow';
    if($tag == 'Innovations') return 'set-filterbtn-orange';
    if($tag == 'Other') return 'set-filterbtn-purple';
}


?>

<div class="button_section">
        <div class=""></div>
        <form method="POST">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $data['search_text']?> " require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>
        <div class="filter_section" >
            <form method="GET">
                <select name="category" id="category_type">
                    

                    <?php
                        $category = trim($_GET['category']);
                    ?>

                    <?php
                    if($category == "All categories"){
                        ?>
                        <option value="All categories" selected="selected">All categories</option>
                        <option value="Innovations">Innovations</option>
                        <option value="Knowledge">Knowledge</option>
                        <option value="New_technology">New technology</option>
                        <option value="Production">Production</option>
                        <?php
                    }
                    else if($category == "Knowledge"){
                        ?>
                        <option value="All categories" >All categories</option>
                        <option value="Innovations">Innovations</option>
                        <option value="Knowledge" selected="selected">Knowledge</option>
                        <option value="New_technology">New technology</option>
                        <option value="Production">Production</option>
                    <?php
                    }
                    else if($category == "Innovations"){
                        ?>
                        <option value="All categories" >All categories</option>
                        <option value="Innovations" selected="selected">Innovations</option>
                        <option value="Knowledge" >Knowledge</option>
                        <option value="New_technology">New technology</option>
                        <option value="Production">Production</option>
                    <?php
                    }
                    else if($category == "Production"){
                        ?>
                        <option value="All categories" >All categories</option>
                        <option value="Innovations">Innovations</option>
                        <option value="Knowledge">Knowledge</option>
                        <option value="New_technology">New technology</option>
                        <option value="Production" selected="selected">Production</option>
                    <?php
                    }
                    else if($category == "New_technology"){
                        ?>
                        <option value="All categories" >All categories</option>
                        <option value="Innovations">Innovations</option>
                        <option value="Knowledge">Knowledge</option>
                        <option value="New_technology" selected="selected">New technology</option>
                        <option value="Production">Production</option>
                    <?php
                    }
                    else{
                        ?>
                        <option value="All categories" >All categories</option>
                        <option value="Innovations">Innovations</option>
                        <option value="Knowledge">Knowledge</option>
                        <option value="New_technology">New technology</option>
                        <option value="Production">Production</option>
                    <?php
                    }

                    ?>
                </select>
                <button type="submit" id="filter_submit_btn">Filter</button>
            </form>
        </div>     
</div>

<div class="body">
        <div class="category"></div>
        <div class="card_section">
        <?php
        /* display blogs */
            if(!empty($data['resource_page_display_message'])){
                echo $data['resource_page_display_message'];
            }
            else{
            foreach($data['resources'] as $resources):?>
            <div class='flash_card'>
                            <?php echo '<img src=".././public/upload/blog_post_images/'.$resources->image.'"   alt="card Picture"  class="card_image">';?>
                            <div class='ccontent'>
                                    <div class='header'>
                                        <a href='' class='uname'><?php echo  $resources->first_name?></a> 
                                        <span class="<?php echo setColor($resources->tag);?>" id="tag" > <i class='fa fa-tags' aria-hidden='true'></i>&nbsp;&nbsp;<span id="tag_discription-<?php echo $resources->post_id?>"><?php echo $resources->tag ?></span></span></a>                                  
                                    </div>
                                    <div class='card_content'>
                                        <h4><?php echo $resources->title ?></h4>
                                        <div class='card_discription'><p> <?php echo $resources->discription?></P></div>
                                        <a href="<?php echo URLROOT?>/resources/view_individual_resource?blog_post_id=<?php echo $resources->post_id?>&category=<?php echo $resources->tag?>" class='read_more'>Read more>></a>
                                        

                                        <hr>
                                    </div>
                                    <div class='card_footer'>
                                        <p class='date'><?php echo $resources->created ?></P>
                                        <p class='comment'><i class="fa-regular fa-comments" id="comment_icon"></i><span id="no_of_comments"><?php echo $resources->count_comment?></span></P> <!--change-->
                                        <p class="heart_btn" id="heart"><i class="fa-regular fa-heart" id="heart_icon"></i>Like <span id="like_count"><?php echo  $resources->no_of_likes?></span></p>
                                    
                                    </div>
                            </div>
            </div>
            <?php endforeach;}?>
    </div>

    <div class="category_search">
            <!-- popuer_feeds -->
            
            <div class="feeds">
                <p class="choice_topic">Populer Feeds</p>
                <?php foreach($data['best_resources'] as $best_resource):?>
                <a href="<?php echo URLROOT?>/resources/view_individual_resource?blog_post_id=<?php echo $best_resource->post_id?>&category=<?php echo $best_resource->tag?>" class="feed_card">
                <div class="feed_discription">
                    <i class="fa-regular fa-bookmark" id="feed_card_icon"></i>
                    <p class="topic"> <?php echo $best_resource->title?><span class="feed_category"></p>
                    <p class="author">By <?php echo $best_resource->first_name?> </p>
                    <p class="feedback"><?php echo $best_resource->no_of_likes?>-Likes <?php echo $best_resource->count_comment?>-comment </p>
                    
                </div>
                </a>
                <?php endforeach ?>
            </div>
            
            </div>
</div>

<div class="pagination">
                

    <?php
    if(!empty($_GET['category'])){
        
    }
    else{
        $total_row_count = $data['row_count'];
        $uri = $_SERVER['REQUEST_URI'];
        if(isset($_GET['category'])){
            $category = trim($_GET['category']);
        }
        else{
            $category = "All categories";
        }
    
        $total_pages = ceil($total_row_count / $_SESSION['num_per_page']);
    
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
    
        if($page>1){ 
            echo "<a href='?category=". $category."&page=".($page - 1)." '><span class='pagination_number'><i class='fa fa-angle-double-left' aria-hidden='true' id='backword_bracket'></i></span></a>" ;
        }
    
        for($i=1; $i<=$total_pages;$i++){
            $class = ($page == $i) ? "current_page" : ""; // add this line
            echo "<a href='?category=".$category."&page=".($i)." '><span class='pagination_number $class'>$i</span></a>";
        }
    
        if($i>$page){
            echo "<a href='?category=". $category."&page=".($page + 1)." '><span class='pagination_number' onclick='setcolor()'><i class='fa fa-angle-double-right' aria-hidden='true' id='forward_bracket'></i></span></a>";
        }
    }
    

    
    ?>

</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>