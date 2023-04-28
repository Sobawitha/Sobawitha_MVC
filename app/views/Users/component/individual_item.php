<link rel="stylesheet" href="../css/Users/component/individual_item.css"></link>
<script src="../js/Users/component/individual_item.js"></script> 

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

<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        <div class="individual_image">
            <img src="../images/in_2.jpg" class="i_image">
            <p class="product_discription">
                    <span class="first_character">T</span>he rapid development of livestock and poultry farming produces a lot of excrement and sewage.
                    The harmful elements of these fouling are too high to be processed by traditional returning way.
                    For this situation, our company has developed the organic fertilizer production line which use high 
                    efficient solid-liquid rotten aseptic deodorization technology as the core, and the whole production 
                    equipment process includes: high efficient excrement, raw material mixing, granule processing, drying 
                    and packin.
            </p>
            <p class="product_discription">
                    <span class="first_characters">H</span>he rapid development of livestock and poultry farming produces a lot of excrement and sewage.
                    The harmful elements of these fouling are too high to be processed by traditional returning way.
                    For this situation, our company has developed the organic fertilizer production line which use high 
                    efficient solid-liquid rotten aseptic deodorization technology as the core, and the whole production 
                    equipment process includes: high efficient excrement, raw material mixing, granule processing, drying 
                    and packin.
            </p>
        </div>
        

    </div>

    <div class="section_3">
        <a href="<?php echo URLROOT?>/Pages/product_page" class="back_to_home"><i class="fa-sharp fa-solid fa-arrow-left" id="arrow"></i>&nbsp;&nbsp;Back to product page</a><br><br><br>
        <span class="title_1">fertilizer</span><br>
        <span class="title_2">For vegitable special</span>

        <br><br>
        <span class="price">Rs. 5000.00</span>

        <section class="customerFeed">

            <div class="scf_maincontent">
              <br><br>

              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <i class="fa-regular fa-star checked"></i>
              <p style=font-size:14px;>4.1 average based on 69 reviews.</p><br>
              <hr style="border:0.1px solid #f1f1f1"><br>

              <div class="row">
                <div class="side">
                <div class="n_star">5 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-5"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">35</div>
              </div>
              <div class="side">
                <div class="n_star">4 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-4"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">15</div>
              </div>
              <div class="side">
                <div class="n_star">3 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-3"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">10</div>
              </div>
              <div class="side">
                <div class="n_star">2 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-2"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">3</div>
              </div>
              <div class="side">
                <div class="n_star">1 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-1"></div>
                </div>
              </div>
              <div class="side right">
                <div class="count_star">6</div>
              </div>
            </div>


            
            </div>
        </section>

        

        <div class="select_quantity">
            <span class="header_quantity">Quantity</span>
            <div class="select_quantity_buttons">
                <span class="quantity_button">500 g</span>
                <span class="quantity_button">1 kg</span>
                <span class="quantity_button">1500 g</span>
            </div>
        </div>

        <div class="process_container">
        <div class="form_button">
          <span onclick="reset_sections()">What's inside</span>
          <span onclick="comment_section()">Comment</span>
          <span onclick="qna_section()">FAQ's</span>
        </div>
        <hr id="indicator">
  
          <div id="toggle_section_1" class ="toggle_section">
              <div class="custormizable_item">
                  <div class="related_item_images">
                      <img src="../images/related_item_image_2.jpg" id="related_item_image"></img>
                  </div>
                  <div class="related_item_discription">
                      <span class="related_item_name">Vegitable fertilizer_1</span><br>
                      <span class="see_more_related_item">See product details</span>
                  </div>
              </div>

              <div class="custormizable_item">
                  <div class="related_item_images">
                      <img src="../images/related_item_image_1.jpg" id="related_item_image"></img>
                  </div>
                  <div class="related_item_discription">
                      <span class="related_item_name">Vegitable fertilizer_1</span><br>
                      <span class="see_more_related_item">See product details</span>
                  </div>
              </div>
          </div>


          <!-- comment_section -->
          <div id="toggle_section_2" class="toggle_section">

            <?php $product_id = 1?> <!--only for testing-->
            <form method="POST" action="<?php echo URLROOT?>/fertilizer_product/post_comment?product_id=<?php echo $product_id?>" >
                    <div id="comment_form">
                        <span id="usercommon"><?php echo ucfirst($_SESSION['username'][0])?></span>
                        <input type="text" class="comment-body" placeholder="Add a comment"  onclick="open_save_cancel_btn()" name="comment"  required/>
                    </div>
                    <div class="btn">
                        <button type="submit" class="cancelbtn" value="cancel" onclick="clear_comment()">Cancel</button>
                        <button type="submit" class="commentbtn" name="commentbtn" onclick="save_comment()">Comment</button>
                    </div>
            </form>


            <div class="comment_reply">
            <?php

              foreach($data['comments'] as $comment):?>
                <span id="user-<?php echo $comment->comment_id?>" class="user"><?php echo ucfirst(($comment->commented_by_full_name[0]))?></span> 
                <div class="display_comment">
                    <P class="name"> <?php echo $comment->commented_by_full_name?><span class="publish_date"><?php echo $comment->comment_date?></span></P>
                    <p class="comment_post"> <?php echo $comment->comment?> </p>
                    <div class="icon">
                        <i class="fa-sharp fa-solid fa-reply-all" id="replybtn" onclick="open_replyform(<?php echo $comment->comment_id?>)"></i><span class="reply">Reply</span>
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
                    <form method="POST" action="<?php echo URLROOT?>/fertilizer_product/post_reply?product_id=<?php echo $product_id?>&comment_id=<?php echo $comment->comment_id?>">
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
                  <?php foreach ($data['reply_for_comment'] as $comment_reply):
                    if ($comment_reply->comment_id == $comment->comment_id) {?>

                      <div class="reply_section">
                      <span id="user-<?php echo $comment_reply->reply_id?>" class="user-reply"><?php echo ucfirst(($comment_reply->reply_user_full_name[0]))?></span>
                      <div class="display_reply">
                          <P class="name"> <?php echo $comment_reply->reply_user_full_name?><span class="publish_date"><?php echo $comment_reply->reply_date?></span></P>
                          <p class="comment_post"> <?php echo $comment_reply->reply ?> </p>
                      </div>
                      </div>
                    <?php }?>
                  <?php endforeach;?>
                <?php }?>
                </div>
                <hr>

              <?php endforeach;?>
              </div>


            
            
          </div>

          <div id="toggle_section_3" class="toggle_section">
          <?php $product_id = 1?> <!--only for testing-->
            <form method="POST" action="<?php echo URLROOT?>/fertilizer_product/post_question?product_id=<?php echo $product_id?>" >
                    <div id="post_question_form">
                        <?php if(($data['current_user_gender'])=='f'){
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/female_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        else{
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/male_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        ?>
                        
                        <input type="text" class="comment-body" placeholder="Add a comment"  onclick="open_save_cancel_btn()" name="question"  required/>
                    </div>
                    <div class="btn_sec">
                        <button type="submit" class="cancelbtn" value="cancel" onclick="clear_question()">Cancel</button>
                        <button type="submit" class="commentbtn" name="commentbtn" onclick="save_question()">Comment</button>
                    </div>
            </form>


            <div class="question_answers">
            <?php
              foreach($data['question'] as $question):?>
                        <?php if(($question->asked_user_gender)=='f'){
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/female_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        else{
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/male_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
              ?>
                <div class="display_question">
                    <P class="name"> <?php echo $question->asked_by_full_name?><span class="publish_date"><?php echo $question->q_date?></span></P>
                    <p class="question_post"> <?php echo $question->question?> </p>
                    <div class="icon">

                        <?php if($_SESSION['user_id']==$data['product_owner_id']){
                          ?>
                              <i class="fa-sharp fa-solid fa-reply-all" id="replybtn" onclick="open_replyform(<?php echo $question->question_id?>)"></i><span class="reply">Reply</span>
                          <?php
                        }?>

                        <?php if($question->no_of_answers >0 ){ ?> 
                            <br><button class="answer_visible_click_button" id="answer_visible_click_button-<?php echo $question->question_id?>" onclick="display_answers(<?php echo $comment->comment_id?>)">
                            <span id="display_answer_btn_icon-<?php echo $question->question_id?>" class="drop_down_btn"> <i class="fa fa-chevron-circle-up" aria-hidden="true" ></i></span><span class="display_reply_btn_text">Reply</span></button>
                            <div class="replace_dropdown_arrows" hidden>
                                    <span id="arrow_up-<?php echo $question->question_id?>"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                    <span id="arrow_down-<?php echo $question->question_id?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                            </div>  
                        <?php }?>    
                    </div>
                </div>

                <!--answer form-->
                <div id="answer_form-<?php echo $question->question_id ?>" class="answer_form">
                    <form method="POST" action="<?php echo URLROOT?>/fertilizer_product/post_answer?product_id=<?php echo $product_id?>&question_id=<?php echo $question->question_id?>">
                    <?php if(($data['current_user_gender'])=='f'){
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/female_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        else{
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/male_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                    ?>
                        <input type="text" class="answer-body" placeholder="Add a answer" id="reply-body-(<?php echo $question->question_id?>)" onclick="open_save_cancel_btns(<?php echo $question->question_id?>)" name="answer"  required/>
                        <div id="ans_btn_sec-<?php echo $question->question_id?>" class="ans_btn_sec">
                            <button type="submit"  class="cancel" id="cancelbtn-<?php echo $question->question_id?>" value="cancel" onclick="clear_reply()">Cancel</button>
                            <button class="" type="submit" class="commentbtn" id="commentbtn-<?php echo $question->question_id?>" name="replybtn" onclick="save_reply() " value="<?php echo $question->question_id?>">Reply</button> 
                        </div>
                    </form>
                </div>

                <!--display_answer-->
                <div class="display_all_answers" id="display_all_answers-<?php echo $question->question_id?>">
                <?php if($question->no_of_answers){ ?> 
                  <?php foreach ($data['answers'] as $answers):
                    if ($answers->answer_question_id == $question->question_id) {?>
                      <div class="answer_section">
                      <?php if(($answers->answer_user_gender)=='f'){
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/female_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        else{
                          ?>
                            <img src="<?php echo URLROOT ?>/public/upload/profile_images/male_img.jpg"   alt="Profile Picture"  id="user_img"/>
                          <?php
                        }
                        ?>
                      <div class="display_answer">
                          <P class="name"> <?php echo $answers->answer_user_full_name?><span class="publish_date"><?php echo $answers->answer_date?></span></P>
                          <p class="comment_post"> <?php echo $answers->answer ?> </p>
                      </div>
                      </div>
                    <?php }?>
                  <?php endforeach;?>
                <?php }?>
                </div>
                <hr>

              <?php endforeach;?>
              </div>

          </div>
        </div>
    </div>
</div>

<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>