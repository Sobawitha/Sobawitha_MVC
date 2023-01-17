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

?>

<div class="button_section">
        <div class=""></div>
        <div class="search_bar">
            <div class="search_content">
                <input type="text" name="search_text" placeholder="Search by key-word" require/>
                <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
            </div>
        </div>
        <div class="filter_section" >
            <button class="filter_btn" onclick="set_default()"><i class='fa fa-tags' aria-hidden='true' class="tag"></i>&nbsp;&nbsp;<span id="discription">All categories</span></i></button>
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
                                        <a href='' class='uname'><?php echo "Ruwandi" ?></a> <!--change-->
                                        <span class="<?php echo setColor($resources->tag);?>" id="tag" onclick="filter_change(<?php echo $resources->post_id?>)"> <i class='fa fa-tags' aria-hidden='true'></i>&nbsp;&nbsp;<span id="tag_discription-<?php echo $resources->post_id?>"><?php echo $resources->tag ?></span></span>
                                        <!---->
                                    </div>
                                    <div class='card_content'>
                                        <h4><?php echo $resources->title ?></h4>
                                        <div class='card_discription'><p> <?php echo $resources->discription?></P></div>
                                        <a href="Individual_Blog.php?blog_post_id=<?php echo $resources->post_id?>" class='read_more'>Read more>></a>
                                        <hr>
                                    </div>
                                    <div class='card_footer'>
                                        <p class='date'><?php echo $resources->created ?></P>
                                        
                                        <p class='comment'><i class="fa-regular fa-comments" id="comment_icon"></i><span id="no_of_comments"><?php echo 0?></span></P> <!--change-->


                                        <p class="heart_btn" id="heart"><i class="fa-regular fa-heart" id="heart_icon"></i>Like <span id="like_count"><?php echo  $resources->no_of_likes?></span></p>
                                    
                                    
                                    </div>
                            </div>
            </div>
        <?php endforeach;?>


    </div>
</div>

<div class="pagination">
                <ul class="pages">
                    <li><i class="fa fa-angle-double-left" aria-hidden="true"></i></li>
                    <li id="active">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                </ul>
</div>

<?php require APPROOT.'/views/inc/Footer.php'?>