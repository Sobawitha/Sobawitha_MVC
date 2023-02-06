<link rel="stylesheet" href="../css/admin/admin_ad_manage_reviewed.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Management</title>
     
</head>
<body >

<section class="registerUser">
&nbsp<div class="aumr_maincontent">
  <h1>Advertisement Management</h1>
  <hr>
           <div class="am_above_table_reviewed">
              <a href="#" id="reviewedAddsReviewed" >Reviewed Adds</a>&nbsp &nbsp 
              <a href="<?php echo URLROOT?>/Admin_ad_management/review" id="pendingAddsReviewed">Pending Adds</a>
           </div>
                  
            <table id ="adManageTableRevA">
                        <thead>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Manufacturer</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Options</th>
                        </thead>
                  <tr>
                  <td>
                    <img src="../img/AdminAdManage/AdOne.jpg" id ="adimg">
                  </td>
                  
                  <td>
                    <b>Urea Fertilizer for Paddy</b>
                  </td>
                  
                  <td>
                    <b>Paddy</b>
                  </td>
                  
                  <td>
                    <b>Hayleys</b>
                  </td>
                  
                  <td>
                    <b>1200.00</b>
                  </td>
                  <td>
                  <b>10</b>
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
                     <img src="../img/AdminAdManage/AdTwo.jpg" id ="adimg">
                  </td>
                  
                  <td>
                    <b>Chillie Fertilizer</b>
                  </td>
                  
                  <td>
                    <b>Vegetables</b>
                  </td>
                  
                  <td>
                    <b>Agro PLC</b>
                  </td>
                  
                  <td>
                    <b>650.00</b>
                  </td>
                  <td>
                    <b>05</b>
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
<!-- <div id="overlap">
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
 -->
</body>
</html>
