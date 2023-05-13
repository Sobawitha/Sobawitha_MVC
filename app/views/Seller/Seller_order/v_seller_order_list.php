<link rel="stylesheet" href="../css/Seller/seller_order_list.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>

<?php
function setColor($tag){
    if($tag == 'cod') return 'set-green';
    if($tag == 'online') return 'set-blue';
}
?>


<?php $tot_income = 0; ?>
<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Order List</h3>
        <hr>
        <!-- search bar -->
        <div class="filters">
                <form method="POST">
                <div class="search_bar">
                <div class="search_content">
                        
                        <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder=" " require/></span>
                        <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                        <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                        
                </div>
                </div>
                </form>
                
        </div>

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <th>Order_id</th>
                                <th>Customer</th>
                                <th>Order</th>
                                <th>Tot price</th>
                                <th>Order date</th>
                                <th>Current status</th>
                                <th>Payment</th>
                        </tr>

                        <?php foreach($data['order_list'] as $order):?>
                        <tr class="order">
                                <div class="order_detail">
                                        <th><span class="order_id"><?php echo $order->order_id;?></span></th>
                                        <td><span class="customer"><?php echo $order->customer;?></span></td>
                                        <td class="products"><?php echo $order->product_names;?></td>
                                        <th><span class="price"><?php echo ($order->total_price); $tot_income = $tot_income + ($order->total_price)*95/100; ?></span></th>
                                        <th><span class="date"><?php echo $order->date ?></span></th>
                                        <th><span class="current_status" id="completed">completed</span></th>
                                        <th><span class="<?php echo setColor("online")?>">online</span></th>
                                        
                                </div>

                        </tr>
                        <?php endforeach;?>

                </table>

                </div>
                </div>

                <div class="payment_detail">
                        <div class="detail">
                                <span class="total">Total income</span>  <span class="payment_amount"> Rs <?php echo $tot_income ?> </span><br>
                        </div>
                </div>
        </div>



        <div class="section_3">                
        </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>