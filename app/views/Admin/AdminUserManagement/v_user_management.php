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
             
                      <span class="search_cont" onclick="open_cancel_btn()" ><input type="text" name="search" value="<?php echo $data['search'] ?>" placeholder="Search by firstname | lastname | Address | NIC No | Email" id="searchBar" require/></span>
                      <button type="submit" class="search_btn"  onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cancel" ></i></button>
                      <button type="submit" class="search_btn"  onclick="open_cancel_btn()" ><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
            
              </div>
          </div>
         </form>  

          <div class="add_new_user_btn">
            <button class="add_user" onclick="popUpOpen()"  id="addNewUser"><i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;Add new user</button>
          </div>
        </div>
              <?php if(empty($data['message'])){ ?>

                <form method="GET" action="<?php echo URLROOT?>/Admin_user_management/view_all_users?filter=${filter}">
                <div class="filter_section">
                        <label for="all_users" id="filter_label"> <input type="radio" name="filter" id="all_users"  value="AllUsers" checked>All Users</label>
                        <label for="admins" id="filter_label"> <input type="radio" name="filter" id="admins"  value="Admins" >Admins</label>
                        <label for="customers" id="filter_label"> <input type="radio" name="filter"  id="customers" value="Customers" >Customers</label>
                        <label for="sellers" id="filter_label"> <input type="radio" name="filter"  id="sellers"  value="Sellers" >Sellers</label>
                        <label for="suppliers" id="filter_label"> <input type="radio" name="filter" id="suppliers"  value="Suppliers" >Suppliers</label>
                        <label for="agri_officers" id="filter_label"> <input type="radio" name="filter"  id="agri_officers" value="AgriOfficers" >Agri-Officers</label>
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
                                <td>Actions</td>
                 </tr>
                    <?php $value=0; 
              
                    ?>
                    
                    <?php foreach($data['user'] as $users): ?>
                      <?php if($users->active_status ==1 ) {?>
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
                      



                      <td>
                      <div class="action">
                                          
                                       
                        <form method="GET">
                        <span class="delete"><button type="button" onclick="popUpOpenDelete()" id="deactive_user_button"><i class="fa-solid fa-hand"></i> Deactivate</button></span>
                   
                      </form><br>
                        
                        <form  action="<?php echo URLROOT;?>/Admin_user_management/view_more_user/<?php echo $users->user_id ?>">
                        <span class="viewmore"><button id="view_more" ><i class="fa-solid fa-circle-info"></i> View More</button></span>
                        </form>
                        </div>
                      </td>
                      
                      </div>  
                        
                    </tr>
                    <dialog id="deactivateUserPopup">
                    <div class="deactivateUserPopup">
                      <div class="dialog__heading">
                        <h2>Are you sure you want to deactivate this user ?</h2>
                        <button id="closebtntwo" type="button">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                      </div>
                        
                      <div class="dialog__content">
                        <a href="<?php echo URLROOT?>/Admin_user_management/adminDeactivateUser/<?php echo $users->user_id ?>" id="yes">Yes</a>
                        <a href="<?php echo URLROOT?>/Admin_user_management/view_all_users " id="no">No</a>
                      </div>
                    </div>
                    </dialog>
                    <?php } ?>          
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

<!-- Deactivate User Confirm Popup -->

  
</div>





