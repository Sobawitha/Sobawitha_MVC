<link rel="stylesheet" href="../css/admin/admin_payments.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Add_management/add_management.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Payment Detail</h3>
        <hr>

        <br><br>
        <form method="POST">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>

                <div class="filter_section">
                        <label for="all" id="filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="ongoing" checked>All types</label>
                        <label for="credit_card" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing">Visa</label>
                        <label for="debit_card" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing">Debit</label>
                </div>

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>#</td>
                                <td>Type</td>
                                <td>Full Name</td>
                                <td>Adress</td>
                                <td>City</td>
                                <td>Postal Code</td>
                                <td>Amount</td>
                                <td>Option</td>
                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">1</span></td>
                                        <td><span class="p_name">Debit</span></td>
                                        <td><span class="amount">Dasun Shanaka</span></td>
                                        <td class="unit">Matara</td>
                                        <td class="unit">Colombo</td>
                                        <td><span class="price">81000</span></td>
                                        <td><span class="payment_status">Rs. 150.00</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">1</span></td>
                                        <td><span class="p_name">Debit</span></td>
                                        <td><span class="amount">Dasun Shanaka</span></td>
                                        <td class="unit">Matara</td>
                                        <td class="unit">Colombo</td>
                                        <td><span class="price">81000</span></td>
                                        <td><span class="payment_status">Rs. 150.00</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">1</span></td>
                                        <td><span class="p_name">Debit</span></td>
                                        <td><span class="amount">Dasun Shanaka</span></td>
                                        <td class="unit">Matara</td>
                                        <td class="unit">Colombo</td>
                                        <td><span class="price">81000</span></td>
                                        <td><span class="payment_status">Rs. 150.00</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr>

                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>

<?php require APPROOT.'/views/Users/component/Header.php'?>