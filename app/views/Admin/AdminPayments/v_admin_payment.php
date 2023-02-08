Devin Aiya CS, [2/7/2023 7:18 PM]
<link rel="stylesheet" href="../css/admin/admin_payments.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>


<body >

<section class="registerUser">
&nbsp<div class="apm_maincontent">
  <h1>Payments Details</h1>
  <hr>
     <div class="above_table">
       <a href="#overlap"><button type="button" id="generateReport"><i class="fa-solid fa-file-invoice-dollar"></i> Generate Payment Report</button></a>
     </div>       
            <table id ="userstable">
                        <thead>
                          <th>#</th>
                          <th>Type</th>
                          <th>Full Name</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>Postal Code</th>
                          <th>Amount(Rs.)</th>
                          <th>Options</th>
                        </thead>
                  <tr>
                  <td>
                  <b>1</b>
                  </td>
                  
                  <td>
                    <b>Debit</b>
                  </td>
                  
                  <td>
                    <b>Dasun Shanaka</b>
                  </td>

                  <td>
                    <b>No 21, Flower street, Colombo</b>
                  </td>

                  <td>
                    <b>Colombo</b>
                  </td>
                  <td>
                    <b>81000</b>
                  </td>
                  <td>
                    <b>150.00</b>
                  </td>
             
             
                  <td>
  
                  <form action="./includes/deleteUser.inc.php" method="post">
                          <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["user_id"] ?>" name="DeleteU"><i class="fa-solid fa-trash-can"></i> Delete</button>
                   </form>
  
                  </td>
                </tr>

                <tr>
                  <td>
                  <b>2</b>
                  </td>
                  
                  <td>
                    <b>Visa</b>
                  </td>
                  
                  <td>
                    <b>Yasith Perera</b>
                  </td>

                  <td>
                    <b>No 21, Galle Road, Nupe, Matara</b>
                  </td>

                  <td>
                    <b>Matara</b>
                  </td>
                  <td>
                    <b>71000</b>
                  </td>
                  <td>
                    <b>1450.00</b>
                  </td>
             
             
                  <td>
  
                  <form action="./includes/deleteUser.inc.php" method="post">
                          <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["user_id"] ?>" name="DeleteU"><i class="fa-solid fa-trash-can"></i> Delete</button>
                   </form>
  
                  </td>
                </tr>


          </table>
</div>
</section>

</body>
</html>