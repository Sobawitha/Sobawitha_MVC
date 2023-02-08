Devin Aiya CS, [2/7/2023 7:11 PM]
<link rel="stylesheet" href="../css/admin/admin_feedback_published.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Management</title>
     
</head>
<body >

<section class="registerUser">
&nbsp<div class="afmp_maincontent">
  <h1>Feedbacks Management</h1>
  <hr>
           <div class="afp_above_table">
              <a href="#" id="afp_published">Published</a>&nbsp &nbsp 
              <a href="<?php echo URLROOT?>/Admin_feedback_management/feed_review_pending"  id="afp_pendingFeed">Pending</a>
           </div>
                  
            <table id ="adminFeedPubTable">
                        <thead>
                          <th>Feedback Receiver</th>
                          <th>Category</th>
                          <th>Reviewer</th>
                          <th>Review</th>
                          <th>Options</th>
                        </thead>
                  <tr>
                  <td>
                  <b>Punsara</b>
                  </td>
                  
                  <td>
                    <b>Seller</b>
                  </td>
                  
                  <td>
                  <b>Devin</b>
                  </td>
                  
                  <td>
                  <p style="color:#e6cc00;font-size:37px; -webkit-text-stroke-color: black;-webkit-text-stroke-width: 1px;">★★★☆☆</P>
                    <b>Good Product</b>
                    <p>Quality Product. Highly Recommended</p>
                  </td>
                  
                  <td>
  
                  <form action="./includes/deleteUser.inc.php" method="post">
                          <button class="deleteButton" onclick="return checkDelete()" value="<?php echo $row["user_id"] ?>" name="DeleteU"><i class="fa-solid fa-trash-can"></i> Delete</button>
                   </form>
  
                  </td>
                </tr>

                <tr>
                  <td>
                  <b>Naveendra</b>
                  </td>
                  
                  <td>
                    <b>Supplier</b>
                  </td>
                  
                  <td>
                    <b>Devin</b>
                  </td>
                  
                  <td>
                  <p style="color:#e6cc00;font-size:37px; -webkit-text-stroke-color: black;-webkit-text-stroke-width: 1px;">★★★☆☆</P>
                    <b>Good Product</b>
                    <p>Quality Product. Highly Recommended</p>
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