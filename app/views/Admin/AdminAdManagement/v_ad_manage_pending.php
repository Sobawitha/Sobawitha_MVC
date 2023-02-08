Devin Aiya CS, [2/7/2023 6:53 PM]
<link rel="stylesheet" href="../css/admin/admin_ad_manage_pending.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/admin_topnavbar.php'; ?>
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
        </section>

</html>