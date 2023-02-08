
<link rel="stylesheet" href="../css/admin/admin_comp_solved.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Management</title>
     
</head>
<body >

<section class="registerUser">
&nbsp<div class="acms_maincontent">
  <h1>Complaints Management</h1>
  <hr>
           <div class="acm_above_table">
              <a href="#" id="solved" >Solved</a>&nbsp &nbsp 
              <a href="<?php echo URLROOT?>/Admin_complaints_management/comp_review_pending" id="pendingComp">Pending</a>
           </div>
                  
            <table id ="userstable">
                        <thead>
                          <th>Complainant and Email</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Options</th>
                        </thead>
                  <tr>
                  <td>
                  <b>Punsara</b>
                  <p>punsara@gmail.com</p>
                  </td>
                  
                  <td>
                    <b>Seller</b>
                  </td>
                  
                  <td>
                    <b>Fake Seller</b>
                    <p>Low quality product. Not recommended.</p>
                  </td>
             
                  <td>
  
                  <form action="./includes/deleteUser.inc.php" method="post">
                          <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["user_id"] ?>" name="DeleteU"><i class="fa-solid fa-trash-can"></i> Delete</button>
                   </form>
  
                  </td>
                </tr>

                <tr>
                  <td>
                  <b>Dasun</b>
                  <p>dasun@gmail.com</p>
                  </td>
                  
                  <td>
                    <b>Forum</b>
                  </td>
                  
                  <td>
                    <b>Cannot Reply</b>
                    <p>Issue with the replying to the forum posts.</p>
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