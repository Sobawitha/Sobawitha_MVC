<link rel="stylesheet" href="../css/Users/component/forum.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<script src="../js/Users/forum/forum.js"></script>
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

<!-- popup alert -->
<?php if (isset($_SESSION['image_err'])): ?>
        <div class="error-msg"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $_SESSION['image_err']; ?> <div class="progress-bar"></div>
        </div>
        <?php unset($_SESSION['image_err']); ?>
<?php endif; ?>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">
        <form method="POST">
        <div class="search_bar">
            <div class="search_content">     
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $data['search_text']?> " require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cancel" ></i></button>
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

                <dialog id="image_display_popup">
                        <div class="image_display_popup">
                                <i class="fa-solid fa-magnifying-glass-plus" id="zoom_in_btn"></i>
                                <i class="fa-solid fa-magnifying-glass-minus" id="zoom_out_btn"></i>
                                <i class="fa-solid fa-xmark" id="close_popup"></i><br>
                                <div class="zoom_img">
                                        <?php echo '<img src=".././public/upload/blog_post_images/background7.jpg"   alt="card Picture"  class="zoom_popup_image" id="zoom_popup_image">';?>
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
                                                <?php  if( $_SESSION['user_flag']==5 || $_SESSION['user_flag']==1){
                                                        ?>
                                                        <label for="annousments" id="filter_label"><input type="radio" id="annousments" name="diss_type" value="annousments">Announcement</label>
                                                <?php
                                                }else{
                                                        ?>
                                                        <label for="annousments" id="filter_label"><input type="radio" id="annousments_for_other" name="diss_type" value="annousments" disabled>Announcement</label>
                                                        <?php
                                                }?>
                                                
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
                        
                        if($data['display_message']==''){
                        
                        foreach($data['forum_discussions'] as $forum_discussion):?>
                        <div class="p1">
                                <span class="name"><?php echo '<img src=".././public/upload/user_profile_pics/'.$forum_discussion->posted_by_profile_pic.'"   alt="author Picture"  class="author_image">'?></span>
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
                                                $current_time =  date('Y-m-d H:i:s', time());
                                                $current_time = '2023-05-07 05:29:21';
                                                
                                                // Calculate the difference between the two timestamps
                                                $time_diff = date_diff($dateTime, new DateTime($current_time));
                                                
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
                                                
                                                // Output the result
                                                // echo print_r($dateTime);
                                                // echo print_r($current_time);
                                                // echo print_r($time_diff);
                                                // echo $time_difference;
                                                // echo "\n";
                                                // $current_time = time(); // Returns the current time in the format of "hours:minutes:seconds"
                                                // echo date('Y-m-d H:i:s',$current_time); // Prints the current time

                                                // die();
                                                
                                                ?>

                                                </span><span class="topic"><?php echo $forum_discussion->subject?></span>
                                                <span class="<?php echo setColor($forum_discussion->type);?>" id="tag" > <i class='fa fa-tags' aria-hidden='true'></i>&nbsp;&nbsp;<span id="tag_discription-<?php echo $forum_discussion->type?>"><?php echo $forum_discussion->type ?></span></span></a>   
                                                <br>
                                                <span class="author"><i class="fa-solid fa-at" id="author_at"></i>Posted by <?php echo $forum_discussion->posted_by_full_name?> from <?php echo $time_difference?>.</span>
                                                <br>
                                                <hr id="forum_topic_hr">
                                                <span class="discription">
                                                        
                                                        <form id="edit_post_content" method="POST" action="<?php echo URLROOT?>/forum/edit_forum_content?postid=<?php echo $forum_discussion->discussion_id?>&post_image=<?php echo $forum_discussion->forum_image?>" enctype="multipart/form-data"> 
                                                                <input type="text" name = "forum_discription" class="forum_discription" id="forum_discription-<?php echo $forum_discussion->discussion_id?>" value="<?php echo $forum_discussion->message?>" disabled></input>
                                                                <br><br>
                                                                <?php if($forum_discussion->forum_image != ''){?>     
                                                                        <?php echo '<img src=".././public/upload/forum_images/'.$forum_discussion->forum_image.'"   alt="card Picture"  class="edit_post_image" id="upload_image-'.$forum_discussion->discussion_id.'"> ';?>
                                                                        <button type="button" class="upload_images" id="upload_images-<?php echo $forum_discussion->discussion_id?>"><i class="fa-solid fa-upload"><span class="upload"></span></i></button>
                                                                        <span class="zoom_image" id="zoom_image"><i class="fa-solid fa-magnifying-glass" id="zoom_image-<?php echo $forum_discussion->discussion_id?>" onclick="zoomimage_popup_open(`<?php echo $forum_discussion->forum_image?>`)"></i></span> 
                                                                        <span class="uploard_img_hidden"><input type="file" class="upload_file" name="image" onchange="loadFile_for_forumpost(event,<?php echo $forum_discussion->discussion_id?>)" id="upload_image_link-<?php echo $forum_discussion->discussion_id?>" disabled></input></span>
                                                                        <br><br>
                                                                <?php } ?>
                                                                <div id="button_section-<?php echo $forum_discussion->discussion_id?>" class="button_section" hidden>
                                                                        <button type="submit" id="edit_post" name="submit">Post</button>
                                                                        <span id="cancel_edit" onclick="cancel_edit(<?php echo $forum_discussion->discussion_id?>)">Cancel</span>
                                                                </div>
                                                        </form>

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
                                                <?php if($_SESSION['user_id']== $forum_discussion->created_by){
                                                        ?>
                                                <i class="fa-solid fa-pen-to-square" id="edit" onclick="edit_forum_post(<?php echo $forum_discussion->discussion_id?>)"></i><span class="button_discription" id="edit_discription">Edit</span><br>
                                                <i class="fa-solid fa-trash" id="delete" onclick="popUpOpen(<?php echo $forum_discussion->discussion_id?>)"></i><span class="button_discription" id="delete_discription">Delete</span><br>
                                                <?php
                                                } else if($_SESSION['user_flag'] == 1){
                                                        ?>
                                                         <i class="fa-solid fa-trash" id="delete" onclick="popUpOpen(<?php echo $forum_discussion->discussion_id?>)"></i><span class="button_discription" id="delete_discription">Delete</span><br>
                                                        <?php
                                                }
                                                ?>
                                        </div>
                                </div>

                                <!-- reply -->
                                <div class="display_reply_form">
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
                                                <span class="name"><?php echo '<img src=".././public/upload/user_profile_pics/'.$discussion_reply->reply_user_profile_pic.'"   alt="author Picture"  class="reply_author_image">'?></span>
                                         </div>

                                        <div class="forum_post_reply">
                                        
                                                <div class="forum_post_reply_content">
                                                        <br>
                                                        <span class="reply_author"><i class="fa-solid fa-at" id="author_at"></i>Posted by <?php echo $discussion_reply->reply_user_full_name?> from <?php echo $time_difference?></span>
                                                        <br>
                                                        <span class="reply">

                                                                <!-- edit reply -->
                                                                <form id="edit_reply_content" method="POST" action="<?php echo URLROOT?>/forum/edit_reply_content?reply_id=<?php echo $discussion_reply-> reply_id?>&reply_post_image=<?php echo $discussion_reply->reply_image?>" enctype="multipart/form-data"> 
                                                                        <input type="text" class="forum_reply_discription" id="forum_reply_discription-<?php echo $discussion_reply-> reply_id?>" name="reply_discription" value="<?php echo $discussion_reply->reply?>" disabled></input>
                                                                        <br><br>
                                                                        <?php if($discussion_reply->reply_image != ''){?>
                                                                                <?php echo '<img src=".././public/upload/forum_reply_images/'.$discussion_reply->reply_image.'"   alt="card Picture"  class="edit_post_image" id="upload_reply_image-'.$discussion_reply-> reply_id.'">';?>
                                                                                <button type="" class="upload_reply_images" id="upload_reply_images-<?php echo $discussion_reply-> reply_id?>"><i class="fa-solid fa-upload "><span class="upload"></span></i></button>
                                                                                <span class="zoom_image" id="zoom_image"><i class="fa-solid fa-magnifying-glass" id="zoom_image_for_reply-<?php echo $discussion_reply->reply_id?>" onclick="zoomimage_popup_open(`<?php echo $discussion_reply->reply_image?>`)"></i></span>
                                                                                <span class="uploard_img_hidden"><input type="file" class="upload_file" name="image" onchange="loadFile_for_reply(event,<?php echo $discussion_reply-> reply_id?>)" id="upload_reply_image_link-<?php echo $discussion_reply-> reply_id?>" disabled></input></span>
                                                                                <br><br>
                                                                        <?php } ?>
                                                                        <div id="reply_button_section-<?php echo $discussion_reply-> reply_id?>" class="button_section" hidden>
                                                                                <button type="submit" id="edit_post">Post</button>
                                                                                <button id="cancel_edit">Cancel</button>
                                                                        </div>
                                                                </form>
                                                        </span>
                                                        
                                                                
                                                </div>

                                                <div class="other_detail">
                                                        <i class="fa-solid fa-reply-all" id="reply" onclick="open_l2_replyform(<?php echo $discussion_reply-> reply_id?>)"></i><span class="button_discription" id="reply_discription">Reply</span>
                                                        <br>
                                                        <?php if($_SESSION['user_id']== $discussion_reply->reply_user_id){
                                                                ?> 
                                                        <i class="fa-solid fa-pen-to-square" id="edit" onclick="edit_forum_post_reply(<?php echo $discussion_reply-> reply_id?>)"></i><span class="button_discription" id="edit_discription">Edit</span><br>
                                                        <i class="fa-solid fa-trash" id="delete" onclick="reply_delete_popUpOpen(<?php echo $discussion_reply-> reply_id?>)"></i><span class="button_discription" id="delete_discription">Delete</span><br>
                                                
                                                        <?php
                                                        }else if($_SESSION['user_flag'] == 1){
                                                                ?>
                                                                <i class="fa-solid fa-trash" id="delete" onclick="reply_delete_popUpOpen(<?php echo $discussion_reply-> reply_id?>)"></i><span class="button_discription" id="delete_discription">Delete</span><br>
                                                                <?php
                                                        }
                                                        ?>
                                                </div>
                                        </div>
                                        </div>

                                        <!-- reply level 2-->
                                <div class="display_reply_form_2">
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
                                </div>
                                <?php } ?>

                                <?php endforeach ?>
                        <?php } ?>
                        </div>
                        
                                                

                        </div>   <!--new-->    
                        <?php endforeach;}
                        else{
                                // echo $data['display_message'];
                                echo '<img src=".././public/images/search.png"   alt="no_result_found_Picture" id="search_result_image"/>';
                                ?>
                                
                                <h1 id="topic_not_found">Result Not Found</h1>
                                <?php
                        }
                        ?>
                        
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
                                        <li><i class="fa-solid fa-question" id="circle1"></i>FAQ's</li>
                                        
                                        <li><i class="fa-regular fa-comments" id="circle2"></i>Feedback</li>
                                        <li><i class="fa-solid fa-bullhorn" id="circle3"></i>Annousments</li>
                                        <li><i class="fa-solid fa-people-group" id="circle4"></i>Jobs</li>
                                        <li><i class="fa-solid fa-layer-group" id="circle5"></i>Introductions</li>
                                </ul>
                        </div>
                </div>
                
                
        </div>
</div>

<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>




