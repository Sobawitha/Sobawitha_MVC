<link rel="stylesheet" href="../css/forum/forum.css"></link>
<link rel="stylesheet" href="../css/component/alert_box.css"></link>
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/officer_topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Officer_Sidebar.php'?>
<script src="../js/forum/forum.js"></script> 

<?php
    function setColor($tag){
        if($tag == 'Production') return 'set-green';
        if($tag == 'Knowledge') return 'set-yellow';
        if($tag == 'Innovations') return 'set-orange';
        if($tag == 'Other') return 'set-purple';
    }
?>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">
                <div class="search_bar">
                <div class="search_content">
                        <input type="text" name="search_text" placeholder="Search the forum" require/>
                        <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                </div>
                </div>

                <div class="forum">

                <div class="new_discussion_button">
                        <button class="new_discussion" onclick="add_new_discussion()"><i class="fa-solid fa-circle-plus" id="add"></i>Start New Discussion </button>
                </div>

                <!-- /*forum*/ -->
                <div class="add_forum" >
                        <span class="closebtn" onclick="close_add_new_discussion_form()"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                        <div class="forum_body">
                                <form>
                                        <label for="subject" class="label"><b>Subject</b></label><br><br>
                                        <input type="text" name="subject" class="input_field" placeholder="" required></textarea><br><br>
                                        <label for="type" class="label"><b>Type</b></label><br>
                                        <div class="f_filter_section">
                                                <label for="faq" id="filter_label"> <input type="radio" id="faq" name="diss_type" value="faq">FAQ's</label>
                                                <label for="feedback" id="filter_label"> <input type="radio" id="feedback" name="diss_type" value="feedback">Feedback</label>
                                                <label for="annousments" id="filter_label"><input type="radio" id="annousments" name="diss_type" value="annousments">Annousments</label>
                                                <label for="jobs" id="filter_label"><input type="radio" id="jobs" name="diss_type" value="jobs">Jobs</label>
                                                <label for="introductions" id="filter_label"><input type="radio" id="introductions" name="diss_type" value="introductions">Introductions</label>
                                        </div>

                                        <label for="message" class="label"><b>Message</b></label><br>
                                        <input type="text" class="message" name="message" required></textarea>
                                </form>
                                <div class="attachment">
                                        <div id="image_att"><a href=""><i class="fa-solid fa-image" id="f_image"></i></a></div><span id="link_label_for_image">Image</span></br>
                                        <div id="file_att"><a href=""><i class="fa-solid fa-file" id="f_pdf"></i></a></div><span id="link_label_for_file">File</span><br>
                                        <div id="link_att"><a href=""><i class="fa-solid fa-link" id="f_attachment"></i></a></div><span id="link_label_for_link">Link</span><br>
                                        <div id="voice_att"><a href=""><i class="fa-solid fa-microphone" id="f_voice"></i></div></a><span id="link_label_for_voice">Voice</span>
                                </div>
                        </div>
                        <div class="button">
                                <button type="submit" class="submit" name="submit">Post to forum </button>
                                <button type="submit" class="cancel" name="cancel">Cancel </button>
                        </div>
                </div>
                <!-- forum -->

                <?php 
                        for($i=0;$i<=3;$i++){
                        ?>

                        <div class="forum_post">
                        <div class="forum_content">
                                <?php
                                $blogpost_tag ='Production';
                                ?>
                                <div class="post_type" id=<?php echo setColor($blogpost_tag);?>><i class="fa-solid fa-circle" id="circle3"></i><span class="type_name">Annousment</div>
                                <span id="post_author"><i class="fa-regular fa-user" id="user"></i></span><span class="topic">Related newly relese fertilizer.</span>
                                <br>
                                <span class="author"><i class="fa-solid fa-at" id="author_at"></i>Posted by Ruwandi Mayunika from 10 minutes ago.</span>
                                <br>
                                <span class="discription">
                                        <p class="forum_discription">Fertilizer timing and application Plants require different foods at different times in their life cycle. In the beginning, as leaves are developing
                                        Fertilizer timing and application Plants require different foods at.</p>
                                </span>
                                <br><button class="reply_visible_click_button" id="reply_visible_click_button" >
                                <span id="display_reply_btn_icon" class="drop_down_btn"> <i class="fa fa-chevron-circle-up" aria-hidden="true" ></i></span><span class="display_reply_btn_text">Reply</span></button>
                                        
                        </div>

                        <div class="other_detail">
                        <i class="fa-regular fa-comment" id="comment"></i> <span class="post_details">25 comments</span>
                        <br>
                        <i class="fa-solid fa-reply-all" id="reply"></i><span class="button_discription" id="reply_discription">Reply</span><br>
                        <i class="fa-solid fa-pen-to-square" id="edit"></i><span class="button_discription" id="edit_discription">Edit</span><br>
                        <i class="fa-solid fa-trash" id="delete"></i><span class="button_discription" id="delete_discription">Delete</span><br>
                        <i class="fa-solid fa-ellipsis" id='report'>
                        </i><span id="report_btn" onclick="openReportSection()" hidden><i class="fa-regular fa-flag" id="report_icon" ></i><span id="report_text">Report</span></span>
                        </div>
                        </div>
                                
                        <?php
                        }
                ?>
                
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
                <div class="filter_section">
                        <i class="fa-regular fa-message" id="message"></i><span class="category_type">All discussion</span><i class="fa-solid fa-check" id="only_correct"></i><br>
                        <i class="fa-regular fa-star" id="star"></i><span class="followings">Followings</span>
                        <hr>

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


<?php require APPROOT.'/views/inc/Footer.php'?>