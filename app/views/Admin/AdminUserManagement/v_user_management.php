<link rel="stylesheet" href="../css/admin/admin_user_management.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/user_management/user_manage.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>User Management</h3>
        <hr>

        <br><br>
        <div class="button_section">
        <form class="searchForm" action="<?php echo URLROOT;?>/Admin_user_management/adminSearchUser" method="GET">
          <div class="search_bar">
              <div class="search_content">
             
                      <span class="search_cont" onclick="open_cancel_btn()" ><input type="text" name="search" placeholder="<?php echo $data['search'] ?>" id="searchBar" require/></span>
                      <button type="button" class="search_btn"  onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cancel" ></i></button>
                      <button type="submit" class="search_btn"  onclick="open_cancel_btn()" ><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
            
              </div>
          </div>
         </form>  

          <div class="add_new_user_btn">
            <button class="add_user" onclick="popUpOpen()"  id="addNewUser"><i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;Add new user</button>
          </div>
        </div>
              <?php if(empty($data['message'])){ ?>

                <?php if($data['search'] === 'Search by firstname | lastname | Address | NIC No | Email' ): ?>
                <div class="filter_section">
                    <form method ="POST" action="<?php echo URLROOT?>/Admin_user_management/view_all_users" id="filter_form">

                        <label for="all" id="filter_label"> <input type="radio" id="all" name="user_type"  onclick="javascript:submit()" value = "all" <?php
                         if (isset($_POST['user_type']) && $_POST['user_type'] == 'all') {
                            echo ' checked="checked"';
                            $_SESSION['radio_admin_user'] = 'all';
                         }elseif(!isset($_POST['user_type'])){
                          echo 'checked';
                          $_SESSION['radio_admin_user'] = 'all';
                         } ?> checked>All Users</label>


                        <br><label for="admins" id="filter_label"> <input type="radio" id="admins" name="user_type" value="admins" onclick="javascript:submit()"  value = "admins"<?php 
                        if (isset($_POST['user_type']) && $_POST['user_type'] == 'admins') {
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'admins';
                        }elseif(!isset($_POST['user_type']) && isset($_GET['user_type']) && $_GET['user_type'] == 'admins'){
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'admins';
                        }
                          ?>>Admins</label>
                        
                        <br><label for="customers" id="filter_label"> <input type="radio" id="customers" name="user_type" value="customers" onclick="javascript:submit()"  value = "customers"<?php 
                        if (isset($_POST['user_type']) && $_POST['user_type'] == 'customers') {
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'customers';
                        }elseif(!isset($_POST['user_type']) && isset($_GET['user_type']) && $_GET['user_type'] == 'customers'){
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'customers';
                        }
                          ?>>Customers</label>
                        
                        
                        <br><label for="sellers" id="filter_label"> <input type="radio" id="sellers" name="user_type" value="sellers" onclick="javascript:submit()"  value = "sellers"<?php 
                        if (isset($_POST['user_type']) && $_POST['user_type'] == 'sellers') {
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'sellers';
                        }elseif(!isset($_POST['user_type']) && isset($_GET['user_type']) && $_GET['user_type'] == 'sellers'){
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'sellers';
                        }
                          ?>>Sellers</label>

                        
                        <br><label for="suppliers" id="filter_label"> <input type="radio" id="suppliers" name="user_type" value="suppliers" onclick="javascript:submit()"  value = "suppliers"<?php 
                        if (isset($_POST['user_type']) && $_POST['user_type'] == 'suppliers') {
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'suppliers';
                        }elseif(!isset($_POST['user_type']) && isset($_GET['user_type']) && $_GET['user_type'] == 'suppliers'){
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'suppliers';
                        }
                          ?>>Suppliers</label>
                        
                        <br><label for="agris" id="filter_label"> <input type="radio" id="agris" name="user_type" value="agris" onclick="javascript:submit()"  value = "agris"<?php 
                        if (isset($_POST['user_type']) && $_POST['user_type'] == 'agris') {
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'agris';
                        }elseif(!isset($_POST['user_type']) && isset($_GET['user_type']) && $_GET['user_type'] == 'agris'){
                          echo ' checked="checked"';
                          $_SESSION['radio_admin_user'] = 'agris';
                        }
                          ?>>Agri-Officers</label>
                                     
            
                </div>
               
              </form>

                <dialog id="addUserPopup">
                        <div class="addUserPopup">
                        <div class="dialog__heading">
                        <h2>Choose the user for registrations</h2>
                        <button id="closebtn" type="button">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                        </div>
                        
                        <div class="dialog__content">
                        <a href="<?php echo URLROOT?>/Admin_user_management/add_new_admin" id="add_admin">Add Admin</a>
                        <a href="<?php echo URLROOT?>/Admin_user_management/add_new_agri" id="add_agri_officer">Add Agri Officer</a>
                        </div>
                        </div>
                </dialog>

                <?php endif ?> 
                
                <?php if (!empty($data['emptydata'])) : ?>
               <div class="error-msg-container">
               <span class="error_msg"><?php echo $data['emptydata'];?></span> 
               </div> 
               <?php endif; ?>

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">   
                  
                
                <tr class="table_head">
                                <td>User ID</td>
                                <td>User Name</td>
                                <td>User Email</td>
                                <td>User NIC</td>
                                <td>Contact No</td>
                                <td>User Role</td>
                                <td>Active Status</td>
                                <td>Actions</td>
                 </tr>
                    <?php $value=0; 
              
                    ?>
                    
                    <?php foreach($data['user'] as $users): ?>
                      
                      <tr class="order">
                      <div class="order_detail">
                      <td><?php echo ++$value ?></td>
                      <td><?php echo $users->first_name ?></td>
                      <td><?php echo $users->email ?></td>
                      <td><?php echo $users->nic_no ?></td>
                      <td><?php echo $users->contact_no ?></td>
                      <?php if($users->user_flag==1): ?>
                        <td ><button class="user_role">Admin</button></td>
                        <?php elseif($users->user_flag==2): ?>
                        <td ><button class="user_role">Customer</button></td>
                        <?php elseif($users->user_flag==3): ?>
                        <td ><button class="user_role">Seller</button></td>
                        <?php elseif($users->user_flag==4): ?>
                        <td ><button class="user_role">Supplier</button></td>
                        <?php else: ?>
                        <td ><button class="user_role">Agri-Officer</button></td>
                        <?php endif?> 

                        <?php if($users->active_status ==1): ?>
                        <td class="active-status">Active</td>
                        <?php else: ?>
                        <td class="deactivated-status">Deactivated</td>
                      
                        <?php endif?> 
                      



                      <td>
                      <div class="action">
                                          
                        <?php if($users->active_status ==1): ?>              
                        <form method="GET">
                        <span class="delete"><button type="button" onclick="popUpOpenDelete('<?php echo $users->user_id ?>')" id="deactive_user_button-<?php echo $users->user_id ?>"><i class="fa-solid fa-hand"></i> Deactivate</button></span>
                        
                        <dialog id="deactivateUserPopup-<?php echo $users->user_id ?>">
                        <div class="deactivateUserPopup">
                      <div class="dialog__heading">
                        <h2>Are you sure you want to deactivate this user ?</h2>
                        <button id="closebtntwo-<?php echo $users->user_id ?>" type="button">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                       </button>


                      </div>
                        
                      <div class="dialog__content">
                        <a href="<?php echo URLROOT?>/Admin_user_management/adminDeactivateUser/<?php echo $users->user_id ?>" id="yes">Yes</a>
                        <a href="<?php echo URLROOT?>/Admin_user_management/view_all_users " id="no">No</a>
                      </div>
                    </div>
                    </dialog>
                      </form><br>
                      <?php else: ?>
                        <form method="GET">
                        <span class="activate"><button type="button" onclick="location.href='<?php echo URLROOT?>/Admin_user_management/adminactivateUser/<?php echo $users->user_id ?>'" id="active_user_button"><i class="fa-solid fa-handshake-simple"></i> Activate</button></span>
                      
                      </form><br>
                      <?php endif?> 
                        <form  action="<?php echo URLROOT;?>/Admin_user_management/view_more_user/<?php echo $users->user_id ?>" method="GET">
                        <span class="viewmore"><button id="view_more" ><i class="fa-solid fa-circle-info"></i> View More</button></span>
                        </form>
                        </div>
                      </td>
                      
                      </div>  
                        
                    </tr>
                   
                         
                   <?php endforeach;?>
                   <?php }else{ ?>
                    <div class="error-msg-container">
                    <span class="error_msg"><?php echo $data['message'];?></span>
                     </div>
                    <?php    }  ?>     

                </table>

                </div>
                </div>
                <?php if ($data['search'] === 'Search by firstname | lastname | Address | NIC No | Email') : ?>
       
       <div class="pagination-container text-center">
<?php if ($data['pagination']['total_pages'] > 1) : ?>
<div class="pagination">
   <?php if ($data['pagination']['current_page'] > 1) : ?>
       <a href="?page=<?php echo $data['pagination']['current_page'] - 1; ?>&user_type=<?php echo isset($_GET['user_type']) ? $_GET['user_type'] : $_SESSION['radio_admin_user']; ?>">Previous</a>
   <?php endif; ?>

   <?php for ($i = 1; $i <= $data['pagination']['total_pages']; $i++) : ?>
       <?php if ($i == $data['pagination']['current_page']) : ?>
           <span class="current-page"><?php echo $i; ?></span>
       <?php else : ?>
           <a href="?page=<?php echo $i; ?>&user_type=<?php echo isset($_GET['user_type']) ? $_GET['user_type'] : $_SESSION['radio_admin_user']; ?>"><?php echo $i; ?></a>
       <?php endif; ?>
   <?php endfor; ?>

   <?php if ($data['pagination']['current_page'] < $data['pagination']['total_pages']) : ?>
       <a href="?page=<?php echo $data['pagination']['current_page'] + 1; ?>&user_type=<?php echo isset($_GET['user_type']) ? $_GET['user_type'] : $_SESSION['radio_admin_user']; ?>">Next</a>
   <?php endif; ?>
</div>
<?php endif; ?>
   </div>

   <?php endif; ?>

        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>

<!-- Deactivate User Confirm Popup -->

  
</div>


<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>

<script>
function clear_search_bar(){
  document.getElementById("searchBar").value = "";
  document.getElementById("cancel").style.display='none';
  window.location.replace("<?php echo URLROOT?>/Admin_user_management/view_all_users");
}

</script>



