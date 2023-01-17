<script src="../js/resources/resource_page.js"></script> 
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Sidebar.php'?>
<link rel="stylesheet" href="../css/resources/resource_page.css"></link>

<?php
function setColor($tag){
    if($tag == 'Production') return 'set-green';
    if($tag == 'Knowledge') return 'set-yellow';
    if($tag == 'Innovations') return 'set-orange';
    if($tag == 'Other') return 'set-purple';
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
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>
        <div class="filter_section" >
            <form>
                <span class="filterbtn"><a href="<?php echo URLROOT?>/resources/resource_page?&category=All categories"><span class="<?php echo set_filterbtn_Color($_SESSION['category']);?>" id="filter" onclick="set_default()"> <i class='fa fa-tags' aria-hidden='true'></i>&nbsp;&nbsp;<span id="discription"><?php echo $_SESSION['category']?></span></span></a></span>
                <div id="category_filter">Category filter</div>
            </form>
        </div>     
</div>

<div class="body">
        <div class="category"></div>
        <div class="card_section">
        <?php
        /* display blogs */
            foreach($data['resources'] as $resources):?>
            <div class='flash_card'>
                        <img class='card_image' src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($resources->image);?>"/>
                            <div class='ccontent'>
                                    <div class='header'>
                                        <a href='' class='uname'><?php echo  $resources->first_name?></a> <!--change-->
                                        
                                        <a href="<?php echo URLROOT?>/resources/resource_page?category=<?php echo $resources->tag?>"><span class="<?php echo setColor($resources->tag);?>" id="tag" > <i class='fa fa-tags' aria-hidden='true'></i>&nbsp;&nbsp;<span id="tag_discription-<?php echo $resources->post_id?>"><?php echo $resources->tag ?></span></span></a>
                                        
                                        <!---->
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
            <?php endforeach;?>
    </div>

    <div class="category_search">
            <!-- popuer_feeds -->
            <div class="feeds">
                <p class="choice_topic">Populer Feeds</p>
                <?php foreach($data['best_resources'] as $best_resource):?>
                <div class="feed_discription">
                    <i class="fa-regular fa-bookmark" id="ok"></i>
                    <p class="topic"> <?php echo $best_resource->title?><span class="feed_category"></p>
                    <p class="author">By <?php echo $best_resource->first_name?> </p>
                    <p class="feedback"><?php echo $best_resource->no_of_likes?>-Likes <?php echo $best_resource->count_comment?>-comment </p>
                    <a href="<?php echo URLROOT?>/resources/view_individual_resource?blog_post_id=<?php echo $best_resource->post_id?>&category=<?php echo $best_resource->tag?>"><i class="fa-solid fa-arrow-up-right-from-square" id="visit"></i></a>
                </div>
                <?php endforeach ?>
            </div>
            
            </div>
</div>

<div class="pagination">
                

    <?php

    // $total_row_count = $_SESSION['row_count'];
    $total_row_count = 5;
    $uri = $_SERVER['REQUEST_URI'];


    $total_pages = ceil($total_row_count / $_SESSION['num_per_page']);

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }

    if($page>1){ 
        echo "<a href='?page=".($page - 1)." '><span class='pagination_number'><i class='fa fa-angle-double-left' aria-hidden='true'></i></span></a>" ;
    }

    for($i=1; $i<$total_pages;$i++){
        echo "<a href='?page=".($i)." '><span class='pagination_number'>$i</span></a>";
    }

    if($i>$page){
        echo "<a href='?page=".($page + 1)." '><span class='pagination_number' onclick='setcolor()'><i class='fa fa-angle-double-right' aria-hidden='true'></i></span></a>";
    }
    
    ?>
</div>

<?php require APPROOT.'/views/inc/Footer.php'?>