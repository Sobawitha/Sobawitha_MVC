<script src="../js/forum/forum.js"></script> 
<link rel="stylesheet" href="../css/admin/admin_forum_management.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>


<?php
    function setColor($tag){
        if($tag == 'Production') return 'set-green';
        if($tag == 'Knowledge') return 'set-yellow';
        if($tag == 'Innovations') return 'set-orange';
        if($tag == 'Other') return 'set-purple';
    }
?>

<body>

<section class="registerUser">

<div class="afm_content">
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
                <div class="forum_post">


                        <div class="forum_content">
                                <div class="post_type" id=<?php echo setColor($blogpost->tag);?>><i class="fa-solid fa-circle" id="circle3"></i><span class="type_name">Annousment</div>
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
                </div>
        </div>

Devin Aiya CS, [2/7/2023 7:15 PM]
<div class="section_3">
                <!-- add forum -->
                <div class="new_discussion_button">
                        <button class="new_discussion" onclick="close_add_new_discussion_form()">Start New Discussion <i class="fa-solid fa-circle-check" id="correct"></i></button>
                </div>
                <div class="add_forum" >
                        <label for="" class="closebtn"><i class="fa fa-times-circle" aria-hidden="true"></i></label><br>
                        <p class="topic">Add a new discussion topic</p>
                        <div class="forum_body">
                                <form>
                                        <label for="subject" class="label"><b>Subject</b></label><br>
                                        <textarea name="subject" class="input_field" placeholder="" required></textarea><br><br>
                                

                                        <label for="message" class="label"><b>Message</b></label><br>
                                        <textarea width="250px" height="500px" class="message" name="message" required></textarea>
                                </form>
                                <div class="attachment">
                                        <div id="image_att"><a href=""><i class="fa-solid fa-image"></i></a></div><span id="link_label_for_image">Image</span></br>
                                        <div id="file_att"><a href=""><i class="fa-solid fa-file"></i></a></div><span id="link_label_for_file">File</span><br>
                                        <div id="link_att"><a href=""><i class="fa-solid fa-link"></i></a></div><span id="link_label_for_link">Link</span><br>
                                        <div id="voice_att"><a href=""><i class="fa-solid fa-microphone"></i></div></a><span id="link_label_for_voice">Voice</span>
                                </div>
                        </div>
                        <div class="button">
                                <button type="submit" class="submit" name="submit">Post to forum </button>
                                <button type="submit" class="cancel" name="cancel">Cancel </button>
                        </div>
                </div>
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

</body>