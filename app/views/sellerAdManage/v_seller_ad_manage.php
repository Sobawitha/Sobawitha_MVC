<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/sellerSidebar.php'; ?>
<link rel="stylesheet" href="../css/seller/seller_ad_management.css"></link>


<body >

<section class="registerUser">
&nbsp<br><br>
<div class="aum_maincontent">
  <h1>Add Fertilizer Advertisements</h1>
  <hr><hr>
    <form class="searchform" action="" method="GET">
                  <input type="text" name="search"  id="searchbar" placeholder="Search by Advertisement"><br><br>
                  <button type="submit" id="searchbtn">Search</button><br>
            </form><br>

             <a href="<?php echo URL?>/seller_ad_management/add_listing" id="addNew" onclick ="addNew()">Add New Advertisement</a><br><br>

             <table id ="fertilizertable">
                        <thead>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Certificate No</th>
                          <th>Manufacture</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Options</th>
                        </thead>
                  <tr>
                  <td>
                    <b>Image</b>
                  </td>
                  
                  <td>
                    <b>Fetilizer for paddy</b>
                  </td>
                  
                  <td>
                    <b>Paddy</b>
                  </td>
                  
                  <td>
                    <b>P0001</b>
                  </td>
                  
                  <td>
                    <b>Hayles</b>
                  </td>

                  <td>
                    <b>4000</b>
                  </td>

                  <td>
                    <b>2000</b>
                  </td>

                  <td>
                  <form action="./includes/deleteadd.inc.php" method="post">
                        <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["Product_id"] ?>" name="DeleteAdd"><i class="fa-solid fa-trash-can"></i> Delete</button>
                 </form>
                  
                 <form action="./includes/deleteadd.inc.php" method="post">
                        <button class="editButton" onclick="return checkDelete()" value="<?php echo $row["Product_id"] ?>" name="DeleteAdd"><i class="fa-solid fa-pen-to-square"></i> Edit  </button>
                 </form>
                  </td>
                  
                </tr>

                </table>

</div>
</section>
</body>
</html>

