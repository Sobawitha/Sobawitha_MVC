<link rel="stylesheet" href="../css/Admin/admin_feedback_pending.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Feed_manage/feed_manage.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Feedbacks Management</h3>
        <hr>

        <br><br>
   
        <div class="button_section">
        <form class="searchForm" action="<?php echo URLROOT;?>/Admin_feedback_management/adminSearchFeedback" method="GET">
        <div class="search_bar">
            <div class="search_content">
         
                    <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search" placeholder="<?php echo $data['search'] ?>"  id="searchBar" require/></span>
                    <button type="button" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cancel" ></i></button>
                    <button type="submit" class="search_btn" onclick="open_cancel_btn()"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                    
            </div>
        </div>
       
        </form>
        </div>
        <?php if(empty($data['message'])){ ?>   
            <?php if($data['search'] ==='Search by feedback category'): ?>
               
               <div class="filter_section">
               <div class="radio-buttons"  id="radioButtons">        
               <form method ="POST" action="<?php echo URLROOT?>/Admin_feedback_management/view_feedback" id="filter_form">
               
               <label for="pending_feed" id="filter_label"> <input type="radio" id="pending_feed" name="feed_type" onclick="javascript:submit()" value="pending_feed" <?php 
               if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'pending_feed') {
                echo ' checked="checked"';
                $_SESSION['radio_admin_feed'] = 'pending_feed';
               }elseif(!isset($_POST['feed_type'])){
                echo 'checked';
                $_SESSION['radio_admin_feed'] = 'pending_feed';
                } ?> checked>Pending</label>
               
               <label for="published_feed" id="filter_label"> 
               <input type="radio" id="published_feed" name="feed_type" value="published_feed" onclick="javascript:submit()" value = "published_feed"<?php 
               if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'published_feed') {
                echo ' checked="checked"';
                $_SESSION['radio_admin_feed'] = 'published_feed';
               } elseif (!isset($_POST['feed_type']) && isset($_GET['feed_type']) && $_GET['feed_type'] == 'published_feed') {
                echo ' checked="checked"';
                $_SESSION['radio_admin_feed'] = 'published_feed';
               }
                ?>
                >Published</label>
               
               
               
               
               
               <label for="rejected_feed" id="filter_label"> <input type="radio" id="rejected_feed" name="feed_type" value="rejected_feed" onclick="javascript:submit()" 
               <?php 
               if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'rejected_feed') {
                echo ' checked="checked"';
                $_SESSION['radio_admin_feed'] = 'rejected_feed'; 
               }elseif  (!isset($_POST['feed_type']) && isset($_GET['feed_type']) && $_GET['feed_type'] == 'rejected_feed') {
                echo ' checked="checked"';
                $_SESSION['radio_admin_feed'] = 'rejected_feed';
               }
                ?>
                >Rejected</label>
               
               
               
               
               
               </form>        
               </div>
                </div>
               <?php endif ?> 

               
               <?php if (!empty($data['emptydata'])) : ?>
               <div class="error-msg-container">
               <span class="error_msg"><?php echo $data['emptydata'];?></span> 
               </div> 
               <?php endif; ?>

                <div class="order_list">
                <div class="orders">

               

                <table class="order_list_table">
                    <?php if(empty($data['emptydata'])){ ?> 
                        <tr class="table_head">
                                <td>Feedback Receiver</td>
                                <td>Category</td>
                                <td>Review</td>
                                <td>Date & Time</td>
                                 <td>Options</td>
                        </tr>
                     <?php    }  ?>   
                        <?php foreach($data['feed'] as $feed): ?>
   
                        <tr class="order">
                                <div class="order_detail">
                                        <td><?php echo $feed->receiver_name ?></td>
                                        <td><?php echo $feed->category ?></td>
                                        
                                        <td class="rate">
                                       
                                          <?php if($feed->rating==1) { ?>      
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                                <br>
                                          <?php } else if($feed->rating==2){?>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                          <?php } else if($feed->rating==3){?> 
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>
                                                
                                         <?php } else if($feed->rating==4){?>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-regular fa-star" id="star"></i>

                                          <?php } else if($feed->rating==5){?>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>
                                                <i class="fa-solid fa-star" id="star"></i>

                                        <?php } ?> 
                                           
                                          <div class="comment_for_review">

                                            <!-- <span class="comment_line_1">Good Product</span><br>
                                            <span class="comment_line_2">Quality product. Heigly recomended.</span> -->
                                            <?php 
                                                $description_words = explode(" ", $feed->review_desc);
                                                $limited_words = implode(" ", array_slice($description_words, 0, 10)); // limit to 10 words
                                                if (count($description_words) > 10) {
                                                echo $limited_words . " ...[See More]";
                                                } else {
                                                echo $limited_words;
                                                }
                                                ?>   
                                        </div>
                                        </td>
                                        <td><?php echo $feed->date ?></td>
                                        <td>
                                        <div class="action">
                                                                        
                                        <?php if($feed->feed_status == 0) { ?>                          
                                          
                                         <button type="button" id="review" onclick="popUpOpenFeedReview('<?php echo $feed->receiver_name ?>','<?php echo $feed->category ?>','<?php echo $feed->rating ?>','<?php echo $feed->review_desc ?>','<?php echo $feed->date ?>')"><i class="fa-solid fa-check-double"></i>  Review</button>
                                                                
                                              <!-- Dialog box -->
                                              <dialog id="feedback-details">
                                                        <div class="feedback-details">
                                                                <h2>Feedback Details</h2>
                                                                <form method="POST" action="">
                                                                <div class="form-group">
                                                                        <label for="receiver-name">Feedback Receiver:</label>
                                                                        <input type="text" id="receiver-namee" name="receiver-name" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="feed_category">Feedback Category:</label>
                                                                        <input type="text" id="feed_categoryy" name="feed_category" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="rating">Rating:</label>
                                                                        <input type="text" id="ratingg" name="rating" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="feedback-description">Feedback Description:</label>
                                                                        <textarea id="feedback-descriptionn" name="feedback-description"  readonly></textarea>
                                                                  
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="feedback-date">Feedback Date & Time</label>
                                                                        <input type="text" id="feedback-datee" rows="8" name="feedback-date" readonly>

                                                                </div>
                                                             
                                                                <div class="btn-group">
                                                                  
                                                
                                                                <button type="submit" class="btn" id="feed-review-btn" formaction="<?php echo URLROOT?>/Admin_feedback_management/adminReviewFeedback/<?php echo $feed->id ?>">Accept</button>
                                                                <button type="button" class="btn" id="clc" onclick="document.getElementById('feedback-details').close()">Close</button>
                                                                <!-- <button type="submit" class="btn" id="reject-btn" onclick="closeFeedbackDetailsAndOpenAnotherPopup()">Reject</button> -->
                                                                <script>
                                                                function closeFeedbackDetailsAndOpenAnotherPopup() {
                                                                // Close the feedback-details popup
                                                                document.getElementById('feedback-details').close();

                                                                // Open another popup after 1 second
                                                                window.setTimeout(function() {
                                                                const popupDialog = document.querySelector('#popup-dialog');
                                                                popupDialog.showModal();
                                                                }, 500);
                                                                }
                                                                </script>
                                                                </div>
                                                                </form>
                                                        </div>
                                                        </dialog>
                                                <br>
                                                  <!-- Reject Button -->
                                        <button id="reject_btn" onclick="openRejectDialog()" ><i class="fa-solid fa-registered"></i> Reject</button>

                                                <dialog id="reject-dialog">
                                                <form method="POST">
                                                <label class="reject_popup_labels" for="reason-select">Reason for rejection:</label>
                                                <select id="reason-select" name="reason">
                                                <option value="Inappropriate language">Inappropriate language</option>
                                                <option value="Irrelevant content">Irrelevant content</option>
                                                <option value="Offensive language">Offensive language</option>
                                                <option value="False information">False information</option>
                                                <option value="Incomplete feedback">Incomplete feedback</option>
                                                <option value="Duplicate feedback">Duplicate feedback</option>
                                                <option value="Other">Other</option>
                                                </select>
                                                <br>
                                                <label for="reason-details" class="reject_popup_labels">More details:</label>
                                                <textarea id="reason-details" name="more_detail" rows="10"></textarea>
                                                <input type="hidden" id="reason-details" value="<?php echo $feed->sender_email?>" name="sender_email">
                                                <!-- <input type="hidden" id="reason-details" value="<?php echo $feed->category?>" name="seller_category"> -->
                                                <input type="hidden" id="reason-details" value="<?php echo $feed->firstname ?>" name="sender_name">
                                                <input type="hidden" id="reason-details" value="<?php echo $feed->id?>" name="feedback_id">
                                                <input type="hidden" id="reason-details" value="<?php echo $feed->order_id?>" name="order_id">


                                                <br>
                                                <div class=reject_btn>
                                                <button type="submit" id="reject_btn_popup" formaction="<?php echo URLROOT?>/Admin_feedback_management/adminRejectFeedback/">Reject</button>
                                                </div> 
                                                </form>
                                                <button id="reject-dialog-close" type="button" ><i class="fa-regular fa-circle-xmark"></i></button>
                                                </dialog>

                                                <script>
                                                const rejectDialog = document.querySelector("#reject-dialog");
                                                const rejectDialogCloseBtn = document.querySelector("#reject-dialog-close");

                                                function openRejectDialog() {

                                                rejectDialog.showModal();
                                                }

                                                function closeRejectDialog() {
                                                rejectDialog.close();
                                                }

                                                rejectDialogCloseBtn.addEventListener("click", closeRejectDialog);

                                                </script>

                                        <?php } ?>
                                        
                                      
                                        <button type="button" id="view_more" onclick="popUpOpenFeedViewMore('<?php echo $feed->receiver_name ?>','<?php echo $feed->category ?>','<?php echo $feed->rating ?>','<?php echo $feed->review_desc ?>','<?php echo $feed->date ?>')">
                                        <i class="fa-solid fa-circle-info"></i> More </button>
                                            <!-- Dialog box -->
                                            <dialog id="feedback-details-action">
                                                        <div class="feedback-details">
                                                                <h2>Feedback Details</h2>
                                                                <form>
                                                                <div class="form-group">
                                                                        <label for="receiver-name">Feedback Receiver:</label>
                                                                        <input type="text" id="receiver-name" name="receiver_name" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="feed_category">Feedback Category:</label>
                                                                        <input type="text" id="feed_category" name="feed_category" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="rating">Rating:</label>
                                                                        <input type="text" id="rating" name="rating" readonly>
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                        <label for="feedback-description">Feedback Description:</label>
                                                                        <textarea id="feedback-description" name="feedback_description" rows="8" readonly></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="feedback-date">Feedback Date & Time:</label>
                                                                        <input type="text" id="feedback-date" name="feedback_date" readonly>
                                                                </div>
                                                                <div class="button-container">
                                                                <button type="button" id ="clc" onclick="document.getElementById('feedback-details-action').close()">Close</button>
                                                                </div>
                                                                 </form>
                                                        </div>
                                                        </dialog>
                                               

                                               
                                        </div>
                                         </td>
                                         
                                </div>

                        </tr>

                        <!-- <dialog id="popup-dialog">
  <div class="popup-content">
    <h2>Reject Feedback</h2>
    <form>
      <label for="reason-dropdown">Reason for rejecting:</label>
      <select id="reason-dropdown" name="reason-dropdown">
        <option value="not-relevant">Not relevant to our service</option>
        <option value="inappropriate">Inappropriate content</option>
        <option value="spam">Looks like spam</option>
        <option value="other">Other</option>
      </select>

      <label for="reason-textbox">Other reason (if applicable):</label>
      <input type="text" id="reason-textbox" name="reason-textbox">

      <button id="submit-reject">Reject</button>
      <button id="cancel-reject">Cancel</button>
    </form>
  </div>
  <button id="close-popup-btn" aria-label="Close popup"></button>
</dialog> -->

              
                              
                <?php endforeach;?>                  
                 
                <?php }else{ ?>
                    <div class="error-msg-container">
                    <span class="error_msg"><?php echo $data['message'];?></span>
                     </div>
                    
                    <?php    }  ?>   
                </table>

                </div>
                </div>
       
      

        <?php if ($data['search'] === 'Search by feedback category') : ?>
       
       <div class="pagination-container text-center">
<?php if ($data['pagination']['total_pages'] > 1) : ?>
<div class="pagination">
   <?php if ($data['pagination']['current_page'] > 1) : ?>
       <a href="?page=<?php echo $data['pagination']['current_page'] - 1; ?>&feed_type=<?php echo isset($_GET['feed_type']) ? $_GET['feed_type'] : $_SESSION['radio_admin_feed']; ?>">Previous</a>
   <?php endif; ?>

   <?php for ($i = 1; $i <= $data['pagination']['total_pages']; $i++) : ?>
       <?php if ($i == $data['pagination']['current_page']) : ?>
           <span class="current-page"><?php echo $i; ?></span>
       <?php else : ?>
           <a href="?page=<?php echo $i; ?>&feed_type=<?php echo isset($_GET['feed_type']) ? $_GET['feed_type'] : $_SESSION['radio_admin_feed']; ?>"><?php echo $i; ?></a>
       <?php endif; ?>
   <?php endfor; ?>

   <?php if ($data['pagination']['current_page'] < $data['pagination']['total_pages']) : ?>
       <a href="?page=<?php echo $data['pagination']['current_page'] + 1; ?>&feed_type=<?php echo isset($_GET['feed_type']) ? $_GET['feed_type'] : $_SESSION['radio_admin_feed']; ?>">Next</a>
   <?php endif; ?>
</div>
<?php endif; ?>
   </div>

   <?php endif; ?>

       


        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>




</div>


<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>


<script>
function clear_search_bar(){
  document.getElementById("searchBar").value = "";
  document.getElementById("cancel").style.display='none';
  window.location.replace("<?php echo URLROOT?>/Admin_feedback_management/view_feedback");
}

</script>
