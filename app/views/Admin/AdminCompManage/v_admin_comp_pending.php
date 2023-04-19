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
                        <label for="solved" id="filter_label"> <input type="radio" id="solved" name="comp_type"  onclick="javascript:submit()" value="solved" <?php if (isset($_POST['comp_type']) && $_POST['comp_type'] == 'solved') echo ' checked="checked"';?>>Solved</label>
                </form>        
                </div>      
                <?php endif?> 
                <span class="error_msg"><?php echo $data['emptydata'];?></span> 
                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                       <?php if(empty($data['emptydata'])){ ?>
                        <tr class="table_head">
                                <td>Complaint</td>
                                <td>Email</td>
                                <td>Category</td>
                                <td>Complaint Content</td>
                                <td>Options</td>
                        </tr>
                        <?php    }  ?> 
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
                                                        <button type="button"  id="take_action" onclick="popUpOpenCompViewMore('<?php echo $complaints->user_first_name ?>','<?php echo $complaints->user_last_name ?>','<?php echo $complaints->email ?>','<?php echo $complaints->type ?>','<?php echo $complaints->subject ?>','<?php echo $complaints->discription ?>','<?php echo $complaints->date ?>')"><i class="fa-solid fa-hand"></i> Take Action</button>
                                                        
                                                        <!-- Dialog box -->
                                                        <dialog id="complaint-details">
                                                        <div class="complaint-details">
                                                                <h2>Complaint Details</h2>
                                                                <form method="POST" action="<?php echo URLROOT?>/Admin_complaints_management/adminSolveComplaint/<?php echo $complaints->complaint_id ?>"">
                                                                <div class="form-group">
                                                                        <label for="full-name">Complainant Full Name:</label>
                                                                        <input type="text" id="full-namee" name="full_name" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="email">Complainant Email:</label>
                                                                        <input type="text" id="emaill" name="email" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="complaint-type">Complaint Type:</label>
                                                                        <input type="text" id="complaint-typee" name="complaint_type" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="complaint-subject">Complaint Subject:</label>
                                                                        <input type="text" id="complaint-subjectt" name="complaint_subject" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="complaint-description">Complaint Description:</label>
                                                                        <textarea id="complaint-descriptionn" name="complaint_description" rows="5" readonly></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="complaint-date">Complaint Date:</label>
                                                                        <input type="text" id="complaint-datee" name="complaint_date" readonly>
                                                                </div>
                                                                <div class="btn-group">
                                                                <button type="submit" id ="solve-btn" onclick="solveComplaint()">Solve</button>        
                                                                <button type="button" id ="clc" onclick="document.getElementById('complaint-details').close()">Close</button>
                                                                
                                                                </div>
                                                                </form>
                                                        </div>
                                                        </dialog>
                                                        
                                                       <br>

                                                        <?php } ?>

                                                      





                                                 
                                                        <button type="button"  id="view_more" onclick="popUpOpenCompTakeAction('<?php echo $complaints->user_first_name ?>','<?php echo $complaints->user_last_name ?>','<?php echo $complaints->email ?>','<?php echo $complaints->type ?>','<?php echo $complaints->subject ?>','<?php echo $complaints->discription ?>','<?php echo $complaints->date ?>')">
                                                        <i class="fa-solid fa-circle-info"></i> View More
                                                        </button>


                                                        <!-- Dialog box -->
                                                        <dialog id="complaint-details-action">
                                                        <div class="complaint-details">
                                                                <h2>Complaint Details</h2>
                                                                <form>
                                                                <div class="form-group">
                                                                        <label for="full-name">Complainant Full Name:</label>
                                                                        <input type="text" id="full-name" name="full_name" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="email">Complainant Email:</label>
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
                                                                <button type="button" id ="clc" onclick="document.getElementById('complaint-details-action').close()">Close</button>
                                                                </form>
                                                        </div>
                                                        </dialog>
                                                 
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
        
        <div class="pagination-container text-center">
                <?php if ($data['pagination']['total_pages'] > 1): ?>
        <div class="pagination">
            <?php if ($data['pagination']['current_page'] > 1): ?>
                <a href="?page=<?php echo $data['pagination']['current_page'] - 1; ?>">Previous</a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $data['pagination']['total_pages']; $i++): ?>
                <?php if ($i == $data['pagination']['current_page']): ?>
                    <span class="current-page"><?php echo $i; ?></span>
                <?php else: ?>
                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            
            <?php if ($data['pagination']['current_page'] < $data['pagination']['total_pages']): ?>
                <a href="?page=<?php echo $data['pagination']['current_page'] + 1; ?>">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
        </div>

















        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>


