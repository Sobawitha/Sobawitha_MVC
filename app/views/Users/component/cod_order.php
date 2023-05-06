<link rel="stylesheet" href="../css/Users/component/orderpage.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<script>
  function thanku_popup_close(){
    document.getElementById('thank_you_dialog_box').close();
  }

  function thanku_popup_open(){
    const thankuPopup = document.getElementById('thank_you_dialog_box');
    thankuPopup.showModal();
  }
</script>



<?php if(isset($_SESSION['order_complete_msg'])){
  ?>
  <dialog id="thank_you_dialog_box" open>
    <i class="fa-solid fa-xmark" id="close" onclick="thanku_popup_close()"></i>
    <br>
    <i class="fa-solid fa-gifts" id="gift"></i>
    <p class="thank">Thank You!</p>
    <p class="thank_discription">check if the browser supports the dialog element, and use a polyfill 
      or alternative implementation if necessary.</p>
    <button id="success_button" onclick="thanku_popup_close()">OK</button>
  </dialog>
  <?php
  unset($_SESSION['order_complete_msg']);
}
?>




<div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="">Sell</a></li>
                    <li><a href="<?php echo URLROOT?>/Login/logout"><i class="fa-solid fa-right-from-bracket" id="user_home"></i></i>Log out</a></li>    
                </ul>
            </nav>
            <hr class="home_hr">
</div>


<div class="container">
      
      
      <div class="layout-page">
      
       <form>
        <h1 id="billing_detail">Billing Details</h1>
        <label>  
          <span class="fname"> First Name <span class="required"> * </span></span>  
          <input type="text" name="fname" value = '<?php echo $data['user_detail']->first_name ?>' readonly>  
        </label>  
        <label>  
          <span class="lname"> Last Name <span class="required"> * </span> </span>  
          <input type="text" name="lname" value = '<?php echo $data['user_detail']->last_name ?>' readonly>  
        </label>   
        <label>  
          <span> Address <span class="required"> * </span></span>  
          <input type="text" name="houseadd" placeholder="House number and street name" value = '<?php echo $data['user_detail']->address ?>'required >  
        </label>    
        <label>  
          <span> Phone<span class="required">*</span></span>  
          <input type="tel" name="tel" value = '<?php echo $data['user_detail']->contact_no ?>'readonly>   
        </label>  
        <label>  
          <span> Email-Address<span class="required">*</span></span>  
          <input type="email" name="email" id="mail_input" value = '<?php echo $data['user_detail']->email ?>' readonly>   
        </label>  

        <hr>
              


        <div class = "order-control"> 

        <input type="checkbox" class="order-control-input" id="same-address" checked>
        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>

        </div>
       

        <hr>
      </form>  
       <div class="order-summary">
     
        <table>
          <tr>
            <th colspan="2">Your Order<span class = "number"> <?php echo $data['order_id'] ?> </span></th>
          </tr>
          <tr>
            <td>Sub Total</td>
            <td>Rs. <?php echo $data['tot_bill'];?></td>
          </tr>
          <tr>
            <td>Delivery Fee</td>
            <td>##</td>
          </tr>
          <tr>
            <td>Total Fee</td>
            <td>Rs. <?php echo $data['tot_bill'];?></td>  
          </tr>
        </table>
        <a href="<?php echo URLROOT ?>/fertilizer_product/confirm_payment?product_id=<?php echo $_GET['product_id']?>"><button type="button" id="place_order"> Place Order </button> </a>
       </div>
      </div>
    </div>
    



<?php require APPROOT.'/views/Users/component/footer.php'?>

