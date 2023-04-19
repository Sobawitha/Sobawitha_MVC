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
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cancel" ></i></button>
                    <button type="submit" class="search_btn" onclick="open_cancel_btn()"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                    
            </div>
        </div>
        </form>
        <?php if(empty($data['message'])){ ?>   
            <?php if($data['search'] ==='Search by feedback category'): ?>
               
               <div class="filter_section">
               <div class="radio-buttons"  id="radioButtons">        
               <form method ="POST" action="<?php echo URLROOT?>/Admin_feedback_management/view_feedback" id="filter_form">
               <label for="pending_feed" id="filter_label"> <input type="radio" id="pending_feed" name="feed_type" onclick="javascript:submit()" value="pending_feed" <?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'pending_feed') echo ' checked="checked"';?> checked>Pending</label>
               <label for="published_feed" id="filter_label"> <input type="radio" id="published_feed" name="feed_type" value="published_feed" onclick="javascript:submit()" value = "published_feed"<?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'published_feed') echo ' checked="checked"';?>>Published</label>
               <label for="rejected_feed" id="filter_label"> <input type="radio" id="rejected_feed" name="feed_type" value="rejected_feed" onclick="javascript:submit()" value = "rejected_feed"<?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'rejected_feed') echo ' checked="checked"';?>>Rejected</label>
               <div class="radio-buttons">
               </form>        
               </div>
                </div>
               <?php endif?> 



               <span class="error_msg"><?php echo $data['emptydata'];?></span> 
 
                <div class="order_list">
                <div class="orders">

               

                <table class="order_list_table">
                    <?php if(empty($data['emptydata'])){ ?> 
                        <tr class="table_head">
                                <td>Feedback Receiver</td>
                                <td>Category</td>
                                <td>Reviewed By</td>
                                <td>Review</td>
                                <td>Options</td>
                        </tr>
                     <?php    }  ?>   
                        <?php foreach($data['feed'] as $feed): ?>
                        
                        <tr class="order">
                                <div class="order_detail">
                                        <td><?php echo $feed->receiver_name ?></td>
                                        <td><?php echo $feed->category ?></td>
                                        <td><?php echo $feed->admin_first_name ?></td>
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
                                        <td>
                                        <div class="action">
                                                                        
                                        <?php if($feed->feed_status == 0) { ?>                          
                                           <form method="GET">
                                         <span class="delete"><button type="button" onclick="popUpOpenDelete()" id="review"><i class="fa-solid fa-hand"></i> Review</button></span>
                                                                
                                        </form><br>
                                        <?php } ?>
                                        
                                      
                                        <form  action="">
                                        <span class="viewmore"><button id="view_more" ><i class="fa-solid fa-circle-info"></i> More</button></span>
                                        </form>
                                       
                                     
                                         </td>
                                         
                                </div>

                        </tr>
                              
                <?php endforeach;?>                  
                 
                <?php }else{ ?>
                    <span class="error_msg"><?php echo $data['message'];?></span>
                    <?php    }  ?>   
                </table>

                </div>
                </div>
       
        </div>
        <div class="section_3">
                <!-- add forum -->
                
                
        </div>

</div>




