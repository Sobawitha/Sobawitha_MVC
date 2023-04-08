<link rel="stylesheet" href="../css/Users/component/forum.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<script src="../js/Users/forum/forum.js"></script>
<?php
if($_SESSION['user_flag'] == 1){
    require APPROOT.'/views/Admin/Admin/admin_topnavbar.php';
    require APPROOT . '/views/Admin/Admin/admin_Sidebar.php';
}
else if($_SESSION['user_flag'] == 2){
    require APPROOT.'/views/Seller/Seller/seller_topnavbar.php';
    require APPROOT . '/views/Seller/Seller/seller_Sidebar.php';
}
else if($_SESSION['user_flag'] == 3){
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
}?>
<?php
    function setColor($type){
        if($type == 'faq') return 'set-green';
        if($type == 'feedback') return 'set-yellow';
        if($type == 'annousments') return 'set-orange';
        if($type == 'Jobs') return 'set-purple';
        if($type == 'Introductions') return 'set-blue';
    }
?>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">
        <form method="POST">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>
                <div class="forum">

                

                <div class="new_discussion_button">
                        <button class="new_discussion" onclick="add_new_discussion()"><i class="fa-solid fa-circle-plus" id="add"></i>Start New Discussion </button>
                </div>

                <dialog id="deletePopup">
                <div class="deletePopup">
                        <div class="delete_dialog_heading">
                        <i class="fa-regular fa-circle-xmark"></i>
                        <h2>Are you sure</h2>
                        <p>You will not be able to recover that item.</p>
                        </div>

                        <div class="dialog_content">
                            <form method="POST" action="<?php echo URLROOT?>/forum/delete_forum_post">
                            <button id="deletebtn" type="submit" value="" name="deletepost">Delete
                            </button>
                            <button id="cancelbtn" type="button">Cancel
                            </button>
                            </form>
                        </div>
                </div>
                </dialog>

                <dialog id="deletereplyPopup">
                <div class="deletePopup">
                        <div class="delete_dialog_heading">
                        <i class="fa-regular fa-circle-xmark"></i>
                        <h2>Are you sure</h2>
                        <p>You will not be able to recover that item.</p>
                        </div>

                        <div class="dialog_content">
                            <form method="POST" action="<?php echo URLROOT?>/forum/delete_forum_post_reply">
                            <button id="deletereplybtn" type="submit" value="" name="deletereply">Delete
                            </button>
                            <button id="canceldeletereplybtn" type="button">Cancel</button>
                            </form>
                        </div>
                </div>
                </dialog>
                
                <!-- /*forum*/ -->
                <div class="add_forum" >
                        <span class="closebtn" onclick="close_add_new_discussion_form()"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                        <div class="forum_body">
                                <form method = "POST" action="<?php echo URLROOT?>/forum/add_new_discussion" enctype="multipart/form-data">
                                        <label for="subject" class="label"><b>Subject</b></label><br><br>
                                        <input type="text" name="subject" class="input_field" placeholder="" required></textarea><br><br>
                                        <label for="type" class="label"><b>Type</b></label><br>
                                        <div class="f_filter_section">
                                                <label for="faq" id="filter_label"> <input type="radio" id="faq" name="diss_type" value="faq">FAQ's</label>
                                                <label for="feedback" id="filter_label"> <input type="radio" id="feedback" name="diss_type" value="feedback">Feedback</label>
                                                <label for="annousments" id="filter_label"><input type="radio" id="annousments" name="diss_type" value="annousments">Annousments</label>
                                                <label for="jobs" id="filter_label"><input type="radio" id="jobs" name="diss_type" value="jobs">Jobs</label>
                                                <label for="introductions" id="filter_label"><input type="radio" id="introductions" name="diss_type" value="Introductions">Introductions</label>
                                        </div>

                                        <label for="message" class="label"><b>Message</b></label><br>
                                        <input type="text" class="message" name="message" required></textarea>
                                <div class="attachment">
                                        <br>
                                        <input type="file" name="image" id="image_uplord_btn"></input>
                                        <div id="image_att"><i class="fa-solid fa-image" id="f_image"></i></div></br>
                                </div>
                                <div class="button">
                                        <input type="submit" class="submit" name="submit" value="Post to forum"/>
                                        <button type="submit" class="cancel" name="cancel">Cancel </button>
                                </div>
                                </form>
                        </div>
                        
                </div>
                <!-- forum -->

                <div class="all_forum_topics">

                <?php 
                        foreach($data['forum_discussions'] as $forum_discussion):?>
                        
                        <!-- <div class="individual_discussion"> -->
                        
                        <div class="p1">
                                <span class="name"><?php echo '<img src=".././public/images/dp4.jpg"   alt="author Picture"  class="author_image">'?></span>
                        </div>

                        <div class="p2">
                                <!-- display discussion -->
                                <div class="forum_post">
                                        <div class="forum_content">

                                                <!-- set posted time -->
                                                <?php
                                                $post_time = $forum_discussion->date;
                                                $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $post_time);

                                                // Current timestamp
                                                $current_time = time();

                                                // Calculate the difference between the two timestamps
                                                $time_diff = date_diff($dateTime, date_create("@$current_time"));

                                                // Output the time difference
                                                if ($time_diff->y > 0) {
                                                        $time_difference = $time_diff->y . " year(s) ago";
                                                } elseif ($time_diff->m > 0) {
                                                        $time_difference = $time_diff->m . " month(s) ago";
                                                } elseif ($time_diff->d > 0) {
                                                        $time_difference = $time_diff->d . " day(s) ago";
                                                } elseif ($time_diff->h > 0) {
                                                        $time_difference = $time_diff->h . " hour(s) ago";
                                                } elseif ($time_diff->i > 0) {
                                                        $time_difference = $time_diff->i . " minute(s) ago";
                                                } else {
                                                        $time_difference = "just now";
                                                }

                                                ?>

                                                </span><span class="topic"><?php echo $forum_discussion->subject?></span>
                                                <span class="<?php echo setColor($forum_discussion->type);?>" id="tag" > <i class='fa fa-tags' aria-hidden='true'></i>&nbsp;&nbsp;<span id="tag_discription-<?php echo $forum_discussion->type?>"><?php echo $forum_discussion->type ?></span></span></a>   
                                                <br>
                                                <span class="author"><i class="fa-solid fa-at" id="author_at"></i>Posted by <?php echo $forum_discussion->posted_by_first_name?> <?php echo $forum_discussion->posted_by_last_name ?> from <?php echo $time_difference?>.</span>
                                                <br>
                                                <hr id="forum_topic_hr">
                                                <span class="discription">
                                                        <p class="forum_discription"><?php echo $forum_discussion->message?></p>
                                                        <?php if($forum_discussion->forum_image != ''){?>
                                                                <?php echo '<img src=".././public/upload/forum_images/'.$forum_discussion->forum_image.'"   alt="forum_image"  class="forum_image">';?>  
                                                        <?php } ?>
                                                </span>
                                                <!-- check reply -->
                                                <?php if($forum_discussion->no_of_reply > 0){?>
                                                        <br><button class="reply_visible_click_button" id="reply_visible_click_button-<?php echo $forum_discussion->discussion_id?>"  onclick="display_reply(<?php echo $forum_discussion->discussion_id?>)" >
                                                        <span id="display_reply_btn_icon-<?php echo $forum_discussion->discussion_id?>" class="drop_down_btn"> <i class="fa fa-chevron-circle-up" aria-hidden="true" ></i></span><span class="display_reply_btn_text">Reply</span></button>
                                                        <div class="replace_dropdown_arrows" hidden>
                                                                <span id="arrow_up-<?php echo $forum_discussion->discussion_id?>"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                                                <span id="arrow_down-<?php echo $forum_discussion->discussion_id?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                                        </div>
                                                <?php }?>      
                                        </div>

                                        <div class="other_detail">
                                                <i class="fa-regular fa-comment" id="comment"></i> <span class="post_details"> <?PHP echo $forum_discussion->no_of_reply?> Reply</span>
                                                <br>
                                                <i class="fa-solid fa-reply-all" id="reply" onclick="open_replyform(<?php echo $forum_discussion->discussion_id?>)"></i><span class="button_discription" id="reply_discription">Reply</span><br>
                                                <?php if($_SESSION['user_id']== $forum_discussion->created_by OR $_SESSION['user_flag'] == 'Admin'){
                                                        ?>
                                                
                                                <i class="fa-solid fa-pen-to-square" id="edit"></i><span class="button_discription" id="edit_discription">Edit</span><br>
                                                <i class="fa-solid fa-trash" id="delete" onclick="popUpOpen(<?php echo $forum_discussion->discussion_id?>)"></i><span class="button_discription" id="delete_discription">Delete</span><br>


                                                <?php
                                                }
                                                ?>

                                                <i class="fa-solid fa-ellipsis" id='report'>
                                                </i><span id="report_btn" onclick="openReportSection()" hidden><i class="fa-regular fa-flag" id="report_icon" ></i><span id="report_text">Report</span></span>
                                        </div>
                                </div>

                                <!-- reply -->

                                <div class="add_forum_reply" id = "add_reply-<?php echo $forum_discussion->discussion_id?>">
                                        <span class="closebtn" onclick="close_reply_form(<?php echo $forum_discussion->discussion_id?>)"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                        <div class="forum_body">
                                                <form method = "POST" action="<?php echo URLROOT?>/forum/add_reply_for_discussion?discussion_id=<?php echo $forum_discussion->discussion_id?>" enctype="multipart/form-data">
                                                        <label for="reply" class="label"><b>Reply</b></label><br>
                                                        <input type="text" class="reply" name="reply" id="reply-body-(<?php echo $forum_discussion->discussion_id?>)" required></textarea>
                                                <div class="attachment">
                                                        <br>
                                                        <input type="file" name="image" id="image_uplord_btn"></input>
                                                        <div id="image_att"><i class="fa-solid fa-image" id="f_image"></i></div></br>
                                                </div>
                                                <div class="button">
                                                        <input type="submit" class="replybtn" id="commentbtn-<?php echo $forum_discussion->discussion_id?>" name="submit" value="Reply" id="submit"  />
                                                        <button type="submit" class="cancel" name="cancel" id="cancelbtn-<?php echo $forum_discussion->discussion_id?>" onclick="close_reply_form(<?php echo $forum_discussion->discussion_id?>)">Cancel </button>
                                                </div>
                                                </form>
                                        </div>
                                </div>

                        <!-- display reply -->
                        <div id="display_all_replies-<?php echo $forum_discussion->discussion_id?>" class="display_all_replies">
                                <?php if($forum_discussion->no_of_reply > 0){
                                        foreach($data['discussion_reply'] as $discussion_reply):
                                        if($discussion_reply-> discussion_id == $forum_discussion->discussion_id){?>

                                        <!-- set posted time -->
                                        <?php
                                                $post_time = $discussion_reply->reply_date;
                                                $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $post_time);

                                                // Current timestamp
                                                $current_time = time();

                                                // Calculate the difference between the two timestamps
                                                $time_diff = date_diff($dateTime, date_create("@$current_time"));

                                                // Output the time difference
                                                if ($time_diff->y > 0) {
                                                        $time_difference = $time_diff->y . " year(s) ago";
                                                } elseif ($time_diff->m > 0) {
                                                        $time_difference = $time_diff->m . " month(s) ago";
                                                } elseif ($time_diff->d > 0) {
                                                        $time_difference = $time_diff->d . " day(s) ago";
                                                } elseif ($time_diff->h > 0) {
                                                        $time_difference = $time_diff->h . " hour(s) ago";
                                                } elseif ($time_diff->i > 0) {
                                                        $time_difference = $time_diff->i . " minute(s) ago";
                                                } else {
                                                        $time_difference = "just now";
                                                }

                                                ?>

                                        <div class="individual_reply">
                                        <div class="p1">
                                                <span class="name"><?php echo '<img src=".././public/images/dp1.jpg"   alt="author Picture"  class="reply_author_image">'?></span>
                                         </div>

                                        <div class="forum_post_reply">
                                        
                                                <div class="forum_post_reply_content">
                                                        <br>
                                                        <span class="reply_author"><i class="fa-solid fa-at" id="author_at"></i>Posted by <?php echo $discussion_reply->reply_user_firstname?> <?php echo $discussion_reply->reply_user_lastname ?> from <?php echo $time_difference?></span>
                                                        <br>
                                                        <span class="reply">
                                                                <p class="forum_reply_discription"><?php echo $discussion_reply->reply?></p>
                                                                <?php if($discussion_reply->reply_image != ''){?>
                                                                        <?php echo '<img src=".././public/upload/forum_reply_images/'.$discussion_reply->reply_image.'"   alt="forum_image"  class="forum_image">';?>  
                                                                <?php } ?>
                                                        </span>
                                                        
                                                                
                                                </div>

                                                <div class="other_detail">
                                                        <i class="fa-solid fa-reply-all" id="reply" onclick="open_l2_replyform(<?php echo $discussion_reply-> reply_id?>)"></i><span class="button_discription" id="reply_discription">Reply</span>
                                                        <br>
                                                        <?php if($_SESSION['user_id']== $discussion_reply->reply_user_id OR $_SESSION['user_flag'] == 'Admin'){
                                                                ?> 
                                                        <i class="fa-solid fa-pen-to-square" id="edit"></i><span class="button_discription" id="edit_discription">Edit</span><br>
                                                        <i class="fa-solid fa-trash" id="delete" onclick="reply_delete_popUpOpen(<?php echo $discussion_reply-> reply_id?>)"></i><span class="button_discription" id="delete_discription">Delete</span><br>
                                                
                                                        <?php
                                                        }
                                                        ?>
                                                </div>
                                        </div>
                                        </div>

                                        <!-- reply level 2-->

                                <div class="add_forum_reply_level_2" id = "add_l2_reply-<?php echo $discussion_reply-> reply_id?>">
                                        <span class="closebtn" onclick="close_l2_reply_form(<?php echo $discussion_reply-> reply_id?>)"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                        <div class="forum_body">
                                                <form method = "POST" action="<?php echo URLROOT?>/forum/add_reply_for_discussion?discussion_id=<?php echo $discussion_reply-> discussion_id?>" enctype="multipart/form-data">
                                                        <label for="reply" class="label"><b>Reply</b></label><br>
                                                        <input type="text" class="reply" name="reply" id="reply-body-(<?php echo $discussion_reply-> reply_id?>)" required></textarea>
                                                <div class="attachment">
                                                        <br>
                                                        <input type="file" name="image" id="image_uplord_btn"></input>
                                                        <div id="image_att"><i class="fa-solid fa-image" id="f_image"></i></div></br>
                                                </div>
                                                <div class="button">
                                                        <input type="submit" class="replybtn" id="commentbtn-<?php echo $discussion_reply-> reply_id?>" name="submit" value="Reply" id="submit"  />
                                                        <button type="submit" class="cancel" name="cancel" id="cancelbtn-<?php echo $discussion_reply-> reply_id?>" onclick="close_reply_form(<?php echo $discussion_reply-> reply_id?>)">Cancel </button>
                                                </div>
                                                </form>
                                        </div>
                                </div>
                                <?php } ?>
                                <?php endforeach ?>
                        <?php } ?>
                        </div>
                        


                        </div>   <!--new-->    
                        <?php endforeach;?>
                        
                        </div>
        </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
                <div class="filter_section">
                        <i class="fa-regular fa-message" id="message"></i><span class="category_type">All discussion</span><i class="fa-solid fa-check" id="only_correct"></i><br>
                        <i class="fa-regular fa-star" id="star"></i><span class="followings">Followings</span>
                        <hr class="forum_hr">

                        <div class="categories">
                                <ul type="" class="category">
                                        <li><i class="fa-solid fa-circle" id="circle1"></i>FAQ's</li>
                                        <li><i class="fa-solid fa-circle" id="circle2"></i>Feedback</li>
                                        <li><i class="fa-solid fa-circle" id="circle3"></i>Annousments</li>
                                        <li><i class="fa-solid fa-circle" id="circle4"></i>Jobs</li>
                                        <li><i class="fa-solid fa-circle" id="circle5"></i>Introductions</li>
                                </ul>
                        </div>
                </div>
                
                
        </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>


