Devin Aiya CS, [2/7/2023 7:23 PM]
<head>
    <script src="../js/admin/UserManage/user_manage.js"></script>
    <link rel="stylesheet" href="../css/admin/admin_user_management.css"></link>
    <?php require APPROOT.'/views/inc/header.php'; ?>
    <?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
    <?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>
    <title>User Management</title>
     
</head>
<body >

<section class="registerUser">
&nbsp<div class="aum_maincontent">
  <h1>User Management</h1>
  <hr>
   <div class="user_table_top_content">
    <div class="item searchbar">
        <form class="searchform" action="" method="GET">
        <input type="text" name="search"  id="search_bar" placeholder="Search by username">
      
</div>
<div class="item searchbtn">
  <button type="submit" id="search_btn">Search</button>
  </div> 
    </form>

<div class="item add_user">
    <button type="button" id="addNewUser" onclick="popUpOpen()"><i class="fa fa-solid fa-user-plus"></i> Add New User</button>
</div>     
   
   </div>  
   

     <br> 
      <div class="user_table_container"> 
            <table id ="userstble">
                        <thead>
                          <th>User Id</th>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>User NIC</th>
                          <th>Contact No</th>
                          <th>User Role</th>
                          <th>Options</th>
                        </thead>
                  <tr>
                  <td>
                    <b>01</b>
                  </td>
                  
                  <td>
                    <b>Devin</b>
                  </td>
                  
                  <td>
                    <b>devin@ucsc.lk</b>
                  </td>
                  
                  <td>
                    <b>992142200V</b>
                  </td>
                  
                  <td>
                    <b>071 1234567</b>
                  </td>
                  <td>
                  <button class="userRoleButton" >Admin</button>
                  </td>
                  <td>
  
                    <form action="" method="post">
                          <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["user_id"] ?>" name="DeleteU"><i class="fa-solid fa-trash-can"></i> Delete</button>
                   </form>

                   <form action="" method="post">
                          <button class="viewMoreButton" value="<?php echo $row["user_id"] ?>" > View More<i class="fa-sharp fa-solid fa-square-chevron-down"></i></button>
                   </form>
  
                  </td>
                </tr>

                <tr>
                  <td>
                    <b>02</b>
                  </td>
                  
                  <td>
                    <b>Ruwandi</b>
                  </td>
                  
                  <td>
                    <b>ruwandi@ucsc.lk</b>
                  </td>
                  
                  <td>
                    <b>20002142200</b>
                  </td>
                  
                  <td>
                    <b>071 1234589</b>
                  </td>
                  <td>
                  <button class="userRoleButton" >Agri - O</button>
                  </td>
                  <td>
  
                    <form action="" method="post">
                          <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["user_id"] ?>" name="DeleteU"><i class="fa-solid fa-trash-can"></i> Delete</button>
                   </form>

                   <form action="" method="post">
                          <button class="viewMoreButton" value="<?php echo $row["user_id"] ?>" > View More<i class="fa-sharp fa-solid fa-square-chevron-down"></i></button>
                   </form>
  
                  </td>
                </tr>

          </table>
</div>
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
</section>


</body>



</html>