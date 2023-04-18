<link rel="stylesheet" href="../css/admin/admin_comp_pending.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Comp_manage/comp_manage.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Complaints Details</h3>
        <hr>

        <br><br>

        <div class="button_section">
        <form class="searchForm" action="<?php echo URLROOT;?>/Admin_complaints_management/adminSearchComplaint" method="GET">
        <div class="search_bar">
            <div class="search_content">
         
                    <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search" placeholder="<?php echo $data['search'] ?>"  id="searchBar" require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cancel" ></i></button>
                    <button type="submit" class="search_btn" onclick="open_cancel_btn()"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                    
            </div>
        </div>
        </form>
                 
        <?php if(empty($data['message'])){ ?>
                <?php if($data['search'] ==='Search by complaint category'): ?>
                <div class="filter_section">
                <div class="radio-buttons"  id="radioButtons">        
                <form method ="POST" action="<?php echo URLROOT?>/Admin_complaints_management/view_complaints" id="filter_form">
                        <label for="pending_comp" id="filter_label"> <input type="radio" id="pending_comp" name="comp_type"  onclick="javascript:submit()" value="pending_comp" <?php if (isset($_POST['comp_type']) && $_POST['comp_type'] == 'pending_comp') echo ' checked="checked"';?> checked>Pending</label>
                        <label for="solved_comp" id="filter_label"> <input type="radio" id="solved_comp" name="comp_type"  onclick="javascript:submit()" value="solved_comp" <?php if (isset($_POST['comp_type']) && $_POST['comp_type'] == 'solved_comp') echo ' checked="checked"';?>>Solved</label>
                </form>        
                </div>      
                <?php endif?> 

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>Complaint</td>
                                <td>Email</td>
                                <td>Category</td>
                                <td>Complaint Content</td>
                                <td>Options</td>
                        </tr>
                        
                        <?php foreach($data['complaints'] as $complaints): ?>
                 
                        <tr class="order">
                                <div class="order_detail">
                                        <td><?php echo $complaints->user_first_name ?></td>
                                        <td><?php echo $complaints->email ?></td>
                                        <td><button class="comp_category"><?php echo $complaints->type ?></button></td>
                                        <td>
                                                <?php 
                                                $description_words = explode(" ", $complaints->discription);
                                                $limited_words = implode(" ", array_slice($description_words, 0, 10)); // limit to 10 words
                                                if (count($description_words) > 10) {
                                                echo $limited_words . " ...[See More]";
                                                } else {
                                                echo $limited_words;
                                                }
                                                ?>
                                         </td>
                                       
                                        <td>
                                                <div class="action">
                                                                        
                                                        <?php if($complaints->current_status == 0) { ?>      
                                                        <form method="GET">
                                                        <span class="delete"><button type="button"  id="take_action" data-complaint='<?php echo json_encode($complaints); ?>'><i class="fa-solid fa-hand"></i> Take Action</button></span>
                                                        
                                                        <div id="complaint-modal" class="modal">
                                                        <!-- Modal content here -->
                                                        </div>
                                                        </form><br>

                                                         <?php } ?>

                                                      





                                                        <form method="GET">
                                                        <button type="button" onclick="popUpOpenCompViewMore(<?php echo $complaints->complaint_id ?>)" id="view_more">
                                                        <i class="fa-solid fa-circle-info"></i> View More
                                                        </button>

                                                        <!-- Dialog box -->
                                                        <dialog id="complaint-details">
                                                        <div class="complaint-details">
                                                                <h2>Complaint Details</h2>
                                                                <form>
                                                                <div class="form-group">
                                                                        <label for="full-name">Full Name:</label>
                                                                        <input type="text" id="full-name" name="full_name" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="email">Email:</label>
                                                                        <input type="text" id="email" name="email" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="complaint-type">Complaint Type:</label>
                                                                        <input type="text" id="complaint-type" name="complaint_type" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="complaint-subject">Complaint Subject:</label>
                                                                        <input type="text" id="complaint-subject" name="complaint_subject" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="complaint-description">Complaint Description:</label>
                                                                        <textarea id="complaint-description" name="complaint_description" rows="5" readonly></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="complaint-date">Complaint Date:</label>
                                                                        <input type="text" id="complaint-date" name="complaint_date" readonly>
                                                                </div>
                                                                <button type="button" onclick="document.getElementById('complaint-details').close()">Close</button>
                                                                </form>
                                                        </div>
                                                        </dialog>
                                                        </form>   
                                                        
                                                
                                                                                                                
                                                        
                                                        
                                                        





                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <?php if($complaints->current_status == 0) { ?>   
                                                        <form  action="">
                                                        <span class="viewmore"><button id="ignore" onclick="popUpOpenDelete()"><i class="fa-solid fa-delete-left"></i> Ignore</button></span>
                                                        
                                                        <dialog id="deactivateUserPopup">
                                                        <div class="deactivateUserPopup">
                                                        <div class="dialog__heading">
                                                                <h2>Are you sure you want to ignore this complaint ?</h2>
                                                                <button id="closebtntwo" type="button">
                                                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                </button>
                                                        </div>
                                                                
                                                        <div class="dialog__content">
                                                                <a href="<?php echo URLROOT?>/Admin_complaints_management/adminDeactivateUser/<?php echo $users->user_id ?>" id="yes">Yes</a>
                                                                <a href="<?php echo URLROOT?>/Admin_complaints_management/view_complaints " id="no">No</a>
                                                        </div>
                                                        </div>
                                                        </dialog>       
                                                
                                                
                                                
                                                        </form>
                                                        <?php } ?>

                                                        </div>
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
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>


