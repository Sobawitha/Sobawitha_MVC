<link rel="stylesheet" href="../css/admin/admin_ad_manage_pending.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>

<body >

<section class="registerUser">
$nbsp<div class="aump_maincontent">
  <h1>Advertisement Management</h1>
  <hr>
           <div class="am_above_table">
              <a href="<?php echo URLROOT?>/Admin_ad_management/reviewed_ads" id="reviewedAdds" >Reviewed Adds</a>&nbsp &nbsp 
              <a href="#" id="pendingAdds">Pending Adds</a>
           </div>
                  
            <table id ="adManageTablePenA">
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
  

                   <form action="#" method="post">
                          <button class="reviewButton" value="<?php echo $row["user_id"] ?>" > Review<i class="fa-sharp fa-solid fa-square-chevron-down"></i></button>
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

                   <form action="#" method="post">
                          <button class="reviewButton" value="<?php echo $row["user_id"] ?>" > Review<i class="fa-sharp fa-solid fa-square-chevron-down"></i></button>
                   </form>
  
                  </td>
                </tr>

          </table>
</body>
</div>

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
        </div> -->
        </section>

</html>
