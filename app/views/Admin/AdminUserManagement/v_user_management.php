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
          <form method="POST">
          <div class="search_bar">
              <div class="search_content">
                  
                      <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " require/></span>
                      <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                      <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                  
              </div>
          </div>
          </form>

          <div class="add_new_user_btn">
            <button class="add_user" onclick="popUpOpen()"  id="addNewUser"><i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;Add new user</button>
          </div>
        </div>

                <div class="filter_section">
                        <label for="ongoing_progress__order" id="filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="ongoing">Solved</label>
                        <label for="ongoing_ready_order" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing" checked>Pending</label>
                </div>

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
                                <td>Contact no</td>
                                <td>User Role</td>
                                <td>User NIC</td>
                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">01</span></td>
                                        <td><span class="p_name">Devin</span></td>
                                        <td><span class="amount">Devin@gail.com</span></td>
                                        <td><span class="price">992142200v</span></td>
                                        <td><span class="solve">071-1234567</span></td>
                                        <td><span class="solve">Admin</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">01</span></td>
                                        <td><span class="p_name">Devin</span></td>
                                        <td><span class="amount">Devin@gail.com</span></td>
                                        <td><span class="price">992142200v</span></td>
                                        <td><span class="solve">071-1234567</span></td>
                                        <td><span class="solve">Admin</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">01</span></td>
                                        <td><span class="p_name">Devin</span></td>
                                        <td><span class="amount">Devin@gail.com</span></td>
                                        <td><span class="price">992142200v</span></td>
                                        <td><span class="solve">071-1234567</span></td>
                                        <td><span class="solve">Admin</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr>

                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>

<dialog id="addUserPopup">
  <div class="addUserPopup">
    <div class="dialog__heading">
      <h2>Choose the user for registrations</h2>
      <button id="closebtn" type="button">
        <i class="fa fa-times-circle" aria-hidden="true"></i>
      </button>
    </div>
    
    <div class="dialog__content">
      <a href="<?php echo URLROOT?>/Admin_user_management/add_new_admin">Add Admin</a>
      <a href="<?php echo URLROOT?>/Admin_user_management/add_new_agri">Add Agri Officer</a>
    </div>
  </div>
</dialog>
</div>




<?php require APPROOT.'/views/Users/component/footer.php'?>
