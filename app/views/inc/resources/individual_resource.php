<script src="../js/resources/individual_resource.js"></script> 
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<link rel="stylesheet" href="../css/resources/individual_resource.css"></link>



<div class="body">

<div class="section_1">
    <span class="back_resources"><a href="<?php echo URLROOT?>/resources/resource_page"><i class="fa-solid fa-backward" id="backicon"></i></a></span>
    <div id="to_resources">Resource Page</div>
</div>


<div class="blog_body">

    <div class="blog_detail">

        <?php
        foreach($data['ind_resource'] as $resource):?>

        <div class="blog_date_path">
            <?php $date=$resource->created;
            $format_date = date("Y / M /d ", strtotime($resource->created));
            ?>
        </div>
        <div class="blog_reading_content">

            <div class="header">
                    <img class='blog_post_image' src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($resource->image);?>"></img>
                    <div class="rhs">
                    <span class="path">Resource Page- <?php echo $resource->tag?></span>  
                    <h3 class="title"><?php echo $resource->title;?></h3>
                    <p class="author_date"><span class="date"><i class="fa-solid fa-calendar-days"></i> <?php echo $format_date ?> </span> <span class="author_name"><i class="fa-solid fa-at" id="at"></i> <?php echo $resource->first_name, " "; echo $resource->last_name ?> </span></p>
                      
                </div>
            </div>
            <p class="blog_post_content"><?php echo $resource->discription; ?></p>
        </div>
    <?php
    ?>

    <div class="like_section">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <button type="submit" name="like" class="heart_btn"> <span id="heart_icon"><i class="fa-regular fa-heart" onclick="count_like_dislike()"></i></span>  Like <span id="like_count"><?php echo $resource->no_of_likes; ?></span></button>
        </form>
    </div>

    <div class="comment_section">
        <!-- display comment -->
            <?php  foreach($data['count_comment'] as $count):?>

                <p class="comment_section_header"><?php echo $count ->count_comment; ?> comments</p> <?php endforeach ?>  <!--how get individual-->
                <div class="comment_form">
                    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                        <span id="usercommon"><?php echo ucfirst($_SESSION['username'][0])?></span>
                        <input type="text" class="comment-body" placeholder="Add a comment"  onclick="open_save_cancel_btn()" name="comment"  required/>
                        <div class="btn">
                            <button type="submit" class="cancelbtn" value="cancel" onclick="clear_comment()">Cancel</button>
                            <button type="submit" class="commentbtn" name="commentbtn" onclick="save_comment()">Comment</button>
                        </div>
                    </form>
                </div>

                <?php

                            foreach($data['comments'] as $comment):?>

                            <span id="user-<?php echo $comment->comment_id?>" class="user"><?php echo ucfirst(($comment->first_name[0]))?></span> 
                            <div class="display_comment">
                                <P class="name"> <?php echo $comment->first_name, " ",$comment->last_name," "?><span class="publish_date"><?php echo $comment->comment_date?></span></P>
                                <p class="comment_post"> <?php echo $comment->comment?> </p>
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-reply-all" id="replybtn" onclick="open_replyform(<?php echo $comment->comment_id?>)"></i><span class="reply">Reply</span>
                                    
                                    <?php if($_SESSION['user_id']==$comment->comment_user_id){ ?> 
                                        <i class="fa-solid fa-pen-to-square" id="editbtn"></i><span class="edit">Edit</span>
                                        <i class="fa-solid fa-trash" id="deletebtn"></i><span class="delete">Delete</span>
                                    <?php }?>


                                    <?php if($comment->no_of_reply >0 ){ ?> 
                                        <br><button class="reply_visible_click_button" id="reply_visible_click_button-<?php echo $comment->comment_id?>" onclick="display_reply(<?php echo $comment->comment_id?>)">
                                        <span id="display_reply_btn_icon-<?php echo $comment->comment_id?>" class="drop_down_btn"> <i class="fa fa-chevron-circle-up" aria-hidden="true" ></i></span><span class="display_reply_btn_text">Reply</span></button>
                                    
                                        <div class="replace_dropdown_arrows" hidden>
                                                <span id="arrow_up-<?php echo $comment->comment_id?>"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                                <span id="arrow_down-<?php echo $comment->comment_id?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                        </div>
                                    
                                    <?php }?>    
                                </div>
                            </div>

                            <!--Reply form-->
                            <div id="reply_form-<?php echo $comment->comment_id ?>" class="reply_form">
                                <form method="POST">
                                    <span id="user-<?php echo $comment->comment_id?>" class="user-reply"><?php echo ucfirst($_SESSION['username'][0])?></span>
                                    <input type="text" class="reply-body" placeholder="Add a reply" id="reply-body-(<?php echo $comment->comment_id?>)" onclick="open_save_cancel_btns(<?php echo $comment->comment_id?>)" name="reply"  required/>
                                    <div id="btn-<?php echo $comment->comment_id?>" class="btn">
                                        <button type="submit"  class="cancel" id="cancelbtn-<?php echo $comment->comment_id?>" value="cancel" onclick="clear_reply()">Cancel</button>
                                        <button class="" type="submit" class="commentbtn" id="commentbtn-<?php echo $comment->comment_id?>" name="replybtn" onclick="save_reply() " value="<?php echo $comment->comment_id?>">Reply</button> 
                                    </div>
                                </form>
                            </div>

                            <!--display_reply-->
                            <div class="display_reply_all" id="display_reply_all-<?php echo $comment->comment_id?>">
                            <?php if($comment->no_of_reply >0){ ?> 
                                        <?php foreach ($data['comments_for_reply'] as $comment_new):
                                            if ($comment_new->comment_id == $comment->comment_id) {?>

                                                <div class="reply_section">
                                                <span id="user-<?php echo $comment_new->reply_id?>" class="user-reply"><?php echo ucfirst(($comment_new->user_first_name[0]))?></span>
                                                <div class="display_reply">
                                                    <P class="name"> <?php echo $comment_new->user_first_name, " ",$comment_new->user_last_name," "?><span class="publish_date"><?php echo $comment_new->reply_date?></span></P>
                                                    <p class="comment_post"> <?php echo $comment_new->reply ?> </p>
                                                    <div class="icon">
                                                        
                                                        <?php if($_SESSION['user_id']==$comment_new->reply_user_id){ ?>
                                                            <i class="fa-solid fa-pen-to-square" id="editbtn"></i><span class="edit">Edit</span>
                                                            <i class="fa-solid fa-trash" id="deletebtn"></i><span class="delete">Delete</span>
                                                        <?php }?>
                                                        
                                                    </div>
                                                </div>
                                                </div>

                                           <?php }?>
                                        <?php endforeach;?>
                            <?php }?>
                            </div>
                            <hr>

                            <?php endforeach;?>
    </div>
  

    <?php endforeach;?>

    </div> <!--blog detail div end-->

 </div>

    <div class="category_search">
            <!-- popuer_feeds -->
            <div class="related">
                <p class="related_post_topic">Related posts</p>
                <?php foreach($data['related_post'] as $related_post):?>
                <div class="post_discription">
                    <!-- <i class="fa-solid fa-circle-plus" id="match"></i> -->
                    <i class="fa-regular fa-bookmark" id="match"></i>
                    <div class=""><p class="topic"> <?php echo $related_post->title?><span class="feed_category">(<?php echo $related_post->tag?>)</span></p></div>
                    <p class="author">By <?php echo $related_post->first_name?> </p>
                    <p class="feedback"><?php echo $related_post->no_of_likes?>-Likes <?php echo $related_post->count_comment?>-comment </p>
                    <a href="<?php echo URLROOT?>/resources/view_individual_resource?blog_post_id=<?php echo $related_post->post_id?>&category=<?php echo $related_post->tag?>"><i class="fa-solid fa-arrow-up-right-from-square" id="visit"></i></a>
                </div>
                <?php endforeach ?>
            </div>
            
    </div>
</div>

