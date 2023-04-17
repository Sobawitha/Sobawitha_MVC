<link rel="stylesheet" href="../css/admin/admin_comp_pending.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Add_management/add_management.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Complaints Details</h3>
        <hr>

        <br><br>
        <form method="POST">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="Search by complaint category" require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>

                <div class="filter_section">
                <div class="radio-buttons"  id="radioButtons">        
                <form method ="POST" action="<?php echo URLROOT?>/Admin_complaints_management/view_complaints" id="filter_form">
                        <label for="pending_comp" id="filter_label"> <input type="radio" id="pending_comp" name="comp_type"  onclick="javascript:submit()" value="pending_comp" <?php if (isset($_POST['comp_type']) && $_POST['comp_type'] == 'pending_comp') echo ' checked="checked"';?> checked>Pending</label>
                        <label for="solved_comp" id="filter_label"> <input type="radio" id="solved_comp" name="comp_type"  onclick="javascript:submit()" value="solved_comp" <?php if (isset($_POST['comp_type']) && $_POST['comp_type'] == 'solved_comp') echo ' checked="checked"';?>>Solved</label>
                </form>        
                </div>      
                

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
                                                        <span class="delete"><button type="button" onclick="popUpOpenDelete()" id="take_action"><i class="fa-solid fa-hand"></i> Take Action</button></span>
                                                        
                                                        </form><br>

                                                         <?php } ?>
                                                        
                                                        <form  action="">
                                                        <span class="viewmore"><button id="view_more" ><i class="fa-solid fa-circle-info"></i> View More</button></span>
                                                        </form>
                                                        
                                                        <?php if($complaints->current_status == 0) { ?>   
                                                        <form  action="">
                                                        <span class="viewmore"><button id="ignore" ><i class="fa-solid fa-delete-left"></i> Ignore</button></span>
                                                        </form>
                                                        <?php } ?>

                                                        </div>
                                        </td>
                                </div>

                        </tr>
                      
                   <?php endforeach;?>   
                             
                        <!-- <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">Punsara</span>
                                        <span class="p_name">Punsara@gmail.com</span></td>
                                        <td><span class="amount">Seller</span></td>
                                        <td>
                                          <span class="price">Fake Seller</span>
                                          <span class="price">Low quality product. Not recomended.</span>
                                        </td>
                                        <td><span class="solve">Solve</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr> -->

                </table>
                </div> 
                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>


