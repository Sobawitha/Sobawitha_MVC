<link rel="stylesheet" href="../css/Raw_material_supplier/feedback/feedback.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>
<script src="../js/Users/feedback/feedback.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">
          <section class="customerFeed">

            <div class="scf_maincontent">
              <h3>Customer Feedbacks</h3>
              <hr> <br><br>

              <span class="cf_heading">Seller Rating</span>
               
              <?php if(isset($data['average_rating'])): ?>
              <?php $avg_rating = round($data['average_rating']); ?>
              <span class="fas fa-star<?php echo ($avg_rating >= 1) ? ' checked' : ''; ?>"></span>
              <span class="fas fa-star <?php echo ($avg_rating >= 2) ? 'checked' : ''; ?>"></span>
              <span class="fas fa-star <?php echo ($avg_rating >= 3) ? 'checked' : ''; ?>"></span>
              <span class="fas fa-star <?php echo ($avg_rating >= 4) ? 'checked' : ''; ?>"></span>
              <span class="fas fa-star<?php echo ($avg_rating >= 5) ? 'checked' : ''; ?>"></span>
              <?php endif; ?>


              
              <?php $formatted_number = number_format($data['average_rating'], 2, '.', ''); ?>
              <p style=font-size:14px;><span class="rating"><button><?php echo $formatted_number; ?></span></button> average based on <?php echo $data['row_count']; ?> reviews.</p><br>
              <hr style="border:0.1px solid #f1f1f1"><br>
              

              <form method ="POST" action="<?php echo URLROOT?>/seller_feedback/view_all_feed" id="filter_form">
              <div class="row">
                <div class="side">
                <div class="n_star"><input type="radio" id="all" name="feed_type"  onclick="javascript:submit()" value = "all"<?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'all') echo ' checked="checked"';?> checked>All</div>
              </div>
              
              <div class="row">
                <div class="side">
                <div class="n_star"><input type="radio" id="fives" name="feed_type" value="fives" onclick="javascript:submit()"  value = "fives"<?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'fives') echo ' checked="checked"';?>>5 star</div>
              </div>

              <div class="middle">
                <div class="bar-container">
                <div class="bar-5" style="width: <?php echo ($data['row_count'] > 0) ? ($data['five_star_count']/$data['row_count']*100) : 0; ?>%;"></div>
                </div>

              </div>
              <div class="side right">
                <div ><?php echo $data['five_star_count']; ?></div>
              </div>

              <div class="side">
                <div class="n_star"><input type="radio" id="fours" name="feed_type" value="fours" onclick="javascript:submit()"  value = "fours"<?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'fours') echo ' checked="checked"';?>>4 star</div>
              </div>

              <div class="middle">
                <div class="bar-container">
                <div id="bar-4" class="bar-4" style="width: <?php echo ($data['row_count'] > 0) ? ($data['four_star_count']/$data['row_count']*100) : 0; ?>%;"></div>
                </div>

              </div>
              <div class="side right">
                <div class="count_star"><?php echo $data['four_star_count']; ?></div>
              </div>

              <div class="side">
                <div class="n_star"><input type="radio" id="threes" name="feed_type" value="threes" onclick="javascript:submit()"  value = "threes"<?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'threes') echo ' checked="checked"';?>>3 star</div>
              </div>
              
              <div class="middle">
                <div class="bar-container">
                <div class="bar-3" style="width: <?php echo ($data['row_count'] > 0) ? ($data['three_star_count']/$data['row_count']*100) : 0; ?>%;"></div>
                </div>

              </div>
              <div class="side right">
                <div class="count_star"><?php echo $data['three_star_count']; ?></div>
              </div>

              <div class="side">
                <div class="n_star"><input type="radio" id="twos" name="feed_type" value="twos" onclick="javascript:submit()"  value = "twos"<?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'twos') echo ' checked="checked"';?>>2 star</div>
              </div>

              <div class="middle">
                <div class="bar-container">
                <div class="bar-2" style="width: <?php echo ($data['row_count'] > 0) ? ($data['two_star_count']/$data['row_count']*100) : 0; ?>%;"></div>
                </div>

              </div>
              <div class="side right">
                <div class="count_star"><?php echo $data['two_star_count']; ?></div>
              </div>

              <div class="side">
                <div class="n_star"><input type="radio" id="ones" name="feed_type" value="ones" onclick="javascript:submit()"  value = "ones"<?php if (isset($_POST['feed_type']) && $_POST['feed_type'] == 'ones') echo ' checked="checked"';?>>1 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                <div class="bar-1" style="width: <?php echo ($data['row_count'] > 0) ? ($data['one_star_count']/$data['row_count']*100) : 0; ?>%;"></div>
                </div>
              </div>

              <div class="side right">
                <div class="count_star"><?php echo $data['one_star_count']; ?></div>
              </div>
            </div>
            
            </form>

            <div class="cus_feedbacks">
                <i class="fa-regular fa-message" id="message"></i><span class="feedback_section_header"> Feedbacks(<?php echo $data['row_count']?>)</span><br><br>
                
                <!-- <div class="feedbacks_desc">

            
                  <div class="feed_desc_one">
                  <i class="fa-regular fa-user" id="feedback_user"></i>
                  <span class="user_detail"> Devin Yapa Tuesday, 17 January 2023, 9:56 AM</span>
                  <span class="raiting_star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <i class="fa-regular fa-star checked"></i>
                  </span>
                  <p class="user_feedback">Quality product. Highly recommended. Quality product. Highly Recommended. Recommended</p>  
                </div><br>

           -->
                </div>

            

                <div class="feedbacks_desc">
                
        
                 <?php foreach ($data['feed']['feedbacks'] as $feedback): ?>
                    <div class="feed_desc_one"> 
                      <div class ="sender_name">
                        <div class="one">
                           <i class="fa-regular fa-user" id="feedback_user"></i>
                            <?php  $sender_name = $feedback->hide_name_status ? substr($feedback->sender_first_name, 0, 1) . "**** " . substr($feedback->sender_last_name, 0, 1) . "****" : $feedback->sender_first_name.' '.$feedback->sender_last_name;?>
                            <?php
                                $feedback_timestamp = strtotime($feedback->date);
                                $current_timestamp = time();
                                $time_difference = $current_timestamp - $feedback_timestamp;

                                if ($time_difference < 60) {
                                  $time_period = "less than a minute ago";
                                } elseif ($time_difference < 3600) {
                                  $time_period = floor($time_difference / 60) . " minutes ago";
                                } elseif ($time_difference < 86400) {
                                  $time_period = floor($time_difference / 3600) . " hours ago";
                                } elseif ($time_difference < 604800) {
                                  $time_period = floor($time_difference / 86400) . " days ago";
                                } else {
                                  $time_period = "more than a week ago";
                                }
                                ?>

                            <span class="user_detail">By <?php echo $sender_name ?><span class="time_feed"> <?php echo $time_period ?></span></span>
                    
                        </div>

                        <div class="two">
                          <span class="raiting_star">
                              <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($feedback->rating >= $i): ?>
                                  <span class="fa fa-star checked"></span>
                                <?php else: ?>
                                  <span class="fa fa-star"></span>
                                <?php endif; ?>
                              <?php endfor; ?>
                           </span>
                        </div>

                      </div>
                      
                      <div class="three">
                        <p class="user_feedback"><?php echo $feedback->review_desc; ?></p>  
                      </div>

                    </div><br>
                

                   
                  <?php endforeach; ?>

             
                </div><br>


            </div>
            </div>
        </section>



        
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>


</div>






















