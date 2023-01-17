<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
     
</head>
<body >

<section class="registerUser">
<div class="aum_maincontent">
  <h1>User Management</h1>
  <hr><hr>
    <form class="searchform" action="" method="GET">
                  <input type="text" name="search"  id="searchbar" placeholder="Search by username"><br>
                  <button type="submit" id="searchbtn">Search</button><br>
            </form><br>

             <a href="#overlap"><button type="button" id="addNewUser"><i class="fa fa-solid fa-user-plus"></i> Add New User</button></a>
        
            <table id ="userstable">
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
  
                    <form action="./includes/deleteUser.inc.php" method="post">
                          <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["user_id"] ?>" name="DeleteU"><i class="fa-solid fa-trash-can"></i> Delete</button>
                   </form>

                   <form action="./includes/deleteUser.inc.php" method="post">
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
  
                    <form action="./includes/deleteUser.inc.php" method="post">
                          <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["user_id"] ?>" name="DeleteU"><i class="fa-solid fa-trash-can"></i> Delete</button>
                   </form>

                   <form action="./includes/deleteUser.inc.php" method="post">
                          <button class="viewMoreButton" value="<?php echo $row["user_id"] ?>" > View More<i class="fa-sharp fa-solid fa-square-chevron-down"></i></button>
                   </form>
  
                  </td>
                </tr>

          </table>
</div>
</section>
<div id="overlap">
        <div class="contact_us_form">
        <form method="POST" action="<?php echo URLROOT?>/complaint/contact_us">

                    <a href=""><label for="" class="closebtn"><i class="fa fa-times-circle" aria-hidden="true"></i></label></a><br>
                    <i class="fa-solid fa-users" id='users'></i><br>
                    <p class="contact_form_discription">Please select a topic below related to your inquiry. We'll show blog posts that provide answers to some most common quections. If you dont find what you need, click 
                        through the prompts to access our contact form. </p>
                    <label for="title" class="label"><b>Your Email Address</b></label><br>
                    <input type="text" name="title"  class="input_field" placeholder="you@gmail.com"  required></input><br><br>
                    

                    <label for="tags" class="label"><b>Subject</b></label><br>
                    <input type="text" name="tag" class="input_field" placeholder=""   required></input><br><br>
                    

                    <label for="discription" class="label"><b>How can we help</b></label><br>
                    <textarea width="250px" height="500px" class="discription" name="discription"  value="<?php echo $data1['discription']?>" required></textarea>
                    

                    <div class="foot">
                        <input type="submit" class="send" name="send" value="send"/>
                    </div>
                </form>
        </div>
        </div>

</body>
</html>
