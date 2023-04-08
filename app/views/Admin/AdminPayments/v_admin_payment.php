<link rel="stylesheet" href="../css/admin/admin_payments.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Add_management/add_management.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Payments Details</h3>
        <hr>

        <br><br>
        <div class="button_section">
        <form method="POST">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="Search by firstname | lastname of the Payer" require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>
        <div class="add_new_user_btn">
         <a href ="<?php echo URLROOT ?> /Admin_payments/generate_report" id="genReport" ><button class="gen_report"><i class="fa-solid fa-file-invoice"></i> Generate Report</button></a>
          </div>
          </div>
        

                <div class="filter_section">
                        <label for="all" id="filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="ongoing" checked>All types</label>
                        <label for="credit_card" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing">Visa</label>
                        <label for="debit_card" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing">Debit</label>
                        <label for="debit_card" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing">COD</label>
                </div>

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>Payment Id</td>
                                <td>Type</td>
                                <td>Payer Full Name</td>
                                <td>Total_Fee</td>
                                <td>Payee_Fee</td>
                                <td>Profit</td>
                                <td>Date & Time</td>
                                
                        </tr>
                        <?php foreach($data['payments'] as $payments): ?>
                        <tr class="order">
                                <div class="order_detail">
                                        <td><?php echo $payments->payment_id ?></td>
                                        <td><?php echo $payments->type ?></td>
                                        <td><?php echo $payments->payer_first ?>&nbsp<?php echo $payments->payer_last ?></td>
                                        <td>Rs. <?php echo $payments->total_fee ?></td>
                                        <td>Rs. <?php echo $payments->payee_fee ?></td>
                                        <?php $profit = $payments->total_fee - $payments->payee_fee ?>
                                        <td><button class="profit_gain">Rs. <?php echo $profit ?></button></td>
                                        <td><?php echo $payments->date ?></td>
                                
                                </div>

                        </tr>
                        <?php endforeach;?>          
         

                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>