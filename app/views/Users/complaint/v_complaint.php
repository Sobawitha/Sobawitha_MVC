<script src="../js/Users/complaint/complaint.js"></script>
<link rel="stylesheet" href="../css/Users//complaint/complaint.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>

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
    if($type == 'order_status_product_availability') return 'set-purple';
    if($type == 'account_access') return 'set-blue';
    if($type == 'technical_issues') return 'set-brown';
    if($type == 'buisness_partnership') return 'set-pink';
    if($type == 'legal_and_private_question') return 'set-yellow';
    if($type == 'payments') return 'set-white';
}
?>

<div class="body">
    <div class="section_1">
            
    </div>
    <div class="section_2">

    <dialog id="deletePopup">
                <div class="deletePopup">
                        <div class="delete_dialog_heading">
                        <i class="fa-regular fa-circle-xmark"></i>
                        <h2>Are you sure</h2>
                        <p>You will not be able to recover that item.</p>
                        </div>

                        <div class="dialog_content">
                            <form method="POST" action="<?php echo URLROOT?>/complaint/delete_complaint">
                            <button id="delete" type="submit" value="" name="deletepost">Delete
                            </button>
                            <button id="cancelbtn" type="button">Cancel
                            </button>
                            </form>
                        </div>
                </div>
        </dialog>
        <dialog id="updatePopup" >
                <div class="updatePopup">
                        <div class="update_popup_heading">
                        <i class="fa-regular fa-circle-xmark" id="closebtn"></i>
                        
                        </div>

                        <div class="dialog_content">
                        
                            <form method="POST" action="<?php echo URLROOT?>/complaint/update_complaint" enctype="multipart/form-data">
                                        <img src=".././public/images/customcare.png" id="custom_care"/>
                                        <h2 class="update_popup_title">Update complaint</h2>
                                        <label for="email" class="label"><b>Your Email Address</b></label><br>
                                        <input type="text" name="email"  class="input_field" placeholder="you@gmail.com" id="email" required></input><br><br>

                                        <label for="type" class="label" id="type"><b>Type</b></label><br>

                                        <div class="f_filter_section">
                                            <label for="order_status_product_availability" id="filter_label"> <input type="radio" id="order_status" name="type" value="order_status_product_availability">Order status,product availability</label>
                                            <label for="account_access" id="filter_label"> <input type="radio" id="account_access" name="type" value="account_access">Account access</label><br>
                                            <label for="technical_issues" id="filter_label"><input type="radio" id="technical_issues" name="type" value="technical_issues">Technical issues</label>
                                            <label for="buisness_partnership" id="filter_label"><input type="radio" id="buisness_partnership" name="type" value="buisness_partnership">Buisness partnership</label><br>
                                            <label for="legal_and_private_question" id="filter_label"><input type="radio" id="legal_and_private_question" name="type" value="legal_and_private_question">Legal & private question</label>
                                            <label for="payments" id="filter_label"><input type="radio" id="payments" name="type" value="payments">Payments</label>
                                        </div>
                                        

                                        <label for="subject" class="label"><b>Subject</b></label><br>
                                        <input type="text" name="subject" class="input_field" placeholder="" id="subject"  required></input><br><br>
                                        

                                        <label for="discription" class="label"><b>How can we help</b></label><br>
                                        <textarea width="250px" height="500px" class="discription" name="discription" id ="help" required></textarea>
                                        

                                        <div class="foot">
                                            <button type="submit" class="send" name="updatecomplaint" id="updatebutton" value="">Update</button>
                                        </div>
                            </form>
                            </div>
                        </div>
                        </dialog>

                        <form method="POST">
                            <div class="search_bar">
                                <div class="search_content">
                                    
                                        <span class="search_cont" onclick="open_cansel_btn()"><input type="text"  name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " value="" require/></span>
                                        <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                                        <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                                    
                                </div>
                            </div>
                            </form>

        <div class="my_complaint_list">
        
        <?php
                /* Display tabuler form */
                foreach($data['complaint'] as $complaint):?>
            
                    <div class="" id="individual_complaint">
                        <span class="<?php echo setColor($complaint->type);?>" ><i class="fa-solid fa-circle" id="circle" ></i></span>
                        <span class="complaint"><?php echo $complaint->subject?></span><br>
                        <span class="time"><?php echo $complaint->date?></span>

                        <div class="footer">

                        <?php if($complaint->current_status == 1){?>
                            <!-- // updatepopUpOpen(17,'thilina@gmail.com','order_status_product_availability','abc','def') -->
                                <span onclick="updatepopUpOpen(17,'thilina@gmail.com','order_status_product_availability','abc','def')"><i class="fa-solid fa-pen-to-square" id="editbtn" ></i><span class="edit">Edit</span></span>
                                <i class="fa-solid fa-trash" id="deletebtn" onclick="popUpOpen(<?php echo $complaint->complaint_id?>)"></i><span class="delete">Delete</span>
                            <?php
                        }
                        else{
                            ?>
                            <div class ="">
                            <button class="reply_visible_click_button" id="reply_visible_click_button-<?php echo $complaint->complaint_id?>" onclick="display_admin_reply(<?php echo $complaint->complaint_id?>)">
                            <span id="display_reply_btn_icon-<?php echo $complaint->complaint_id?>" class="drop_down_btn"> <i class="fa fa-chevron-circle-up" aria-hidden="true" ></i></span><span class="display_reply_btn_text">Action</span></button>
                                        
                            <div class="replace_dropdown_arrows" hidden>
                                <span id="arrow_up-<?php echo $complaint->complaint_id?>"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                <span id="arrow_down-<?php echo $complaint->complaint_id?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                            </div>
                            </div>
                            <?php
                        }
                        ?>  
                        </div>  
                    </div>

                    <?php 
                    if($complaint->current_status != 1){
                        ?>
                                <div id="display_admin_reply-<?php echo $complaint->complaint_id?>" class="display_admin_reply">
                                <i class="fa-solid fa-angle-right" id="angle_right"></i>
                                <div class="admin_reply">
                                    <span class="name"><?php echo '<img src=".././public/images/dp4.jpg"   alt="admin Picture"  class="admin_image">'; echo $complaint->replyuser_first_name; echo " " ; echo $complaint->replyuser_last_name ?><span class="date"><?php echo $complaint-> reply_date?></span></span>
                                    
                                    <span class="reply">I answered your question via email.Please check your mails.</span>
                                    <br>
                                    <span class="thank">Thank you.</span>
                                </div>
                            </div>
                        <?php
                    }
                    ?>

            <?php endforeach;?>
            

        </div>

    </div>

    <div class="section_3">

        <div class="conatct_us_section">
            <div class="conatct_us_section_body">
                <p class="header">Help & Support</p>
                <p class="discription">Our support team is spred across the globe to give you answer fast.</p>
                <a href="<?php echo URLROOT?>/complaint/contact_us"><button class="visit_contact_us_form">Visit Support Page</button></a>
            </div>
        </div>

        <hr class="section_divide_hr">

                <div class="filter_section">
                    <form method ="POST" action="<?php echo URLROOT?>/complaint/display_all_complaint" id="filter_form">
                        <label for="all" id="filter_label"> <input type="radio" id="all" name="complaint_type"  onclick="javascript:submit()" value = "all"<?php if (isset($_POST['complaint_type']) && $_POST['complaint_type'] == 'all') echo ' checked="checked"';?> checked>All type</label>
                        <br><label for="completed" id="filter_label"> <input type="radio" id="completed" name="complaint_type" value="completed" onclick="javascript:submit()"  value = "completed"<?php if (isset($_POST['complaint_type']) && $_POST['complaint_type'] == 'completed') echo ' checked="checked"';?>>Completed</label>
                        <br><label for="pending" id="filter_label"><input type="radio" id="pending" name="complaint_type" value="pending" onclick="javascript:submit()"  value = "pending"<?php if (isset($_POST['complaint_type']) && $_POST['complaint_type'] == 'pending') echo ' checked="checked"';?>>Pending</label>
                </div>

            <hr class="section_divide_hr">

            <div class="categories">
                <ul type="" class="category">
                    <li><i class="fa-solid fa-circle" id="circle1"></i>Order status, product availability.</li>
                    <li><i class="fa-solid fa-circle" id="circle2"></i>Account access.</li>
                    <li><i class="fa-solid fa-circle" id="circle3"></i>Technical issues.</li>
                    <li><i class="fa-solid fa-circle" id="circle4"></i>Buisness partnership.</li>
                    <li><i class="fa-solid fa-circle" id="circle5"></i>Legal & private questions.</li>
                    <li><i class="fa-solid fa-circle" id="circle6"></i>Payments.</li>
                </ul>
            </div>

    </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>