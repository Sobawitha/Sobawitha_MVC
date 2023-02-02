<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/sellerSidebar.php'; ?>

<link rel="stylesheet" href="../css/seller/seller_payment.css"></link>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
     
</head>
<body >

<section class="registerUser">
&nbsp<div class="aum_maincontent">
  <h1>Payments Details</h1>
  <hr><hr>
     
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
                    <b>Mastercard</b>
                  </td>
                  
                  <td>
                    <b>Nishan Shanaka</b>
                  </td>

                  <td>
                    <b>No 21, lorius street, Colombo 05</b>
                  </td>

                  <td>
                    <b>Colombo</b>
                  </td>
                  <td>
                    <b>72000</b>
                  </td>
                  <td>
                    <b>2300.00</b>
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
                    <b>No 21, Galle Road, dewata, Galle</b>
                  </td>

                  <td>
                    <b>Galle</b>
                  </td>
                  <td>
                    <b>41000</b>
                  </td>
                  <td>
                    <b>6500.00</b>
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
