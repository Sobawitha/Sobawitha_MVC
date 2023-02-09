<link rel="stylesheet" href="../css/Seller/seller_payment.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>

<body >

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Payments Details</h3>
        <hr>

        <form method="POST">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>

                <div class="sp_view_list">
                <div class="views">

                <table class="sp_view_list_table">
                        <tr class="table_head">
                                <td>#</td>
                                <td>Type</td>
                                <td>Full Name</td>
                                <td>Address</td>
                                <td>City</td>
                                <td>Postal Code</td>
                                <td>Amount</td>
                                <td>Options</td>
                                <td></td>
                        </tr>

                        <tr class="sp_view">
                                <div class="sp_view_detail">
                                        <td><span class="no">1</span></td>
                                        <td><span class="type">Card payment</span></td>
                                        <td><span class="fname">Punsara Deshan</span></td>
                                        <td><span class="address">No.34, Melder Place, Nugegoda</span></td>
                                        <td><span class="city">Colombo</span></td>
                                        <td><span class="postal_code">10250</span></td>
                                        <td><span class="amount">Rs. 1000 </span></td>


                                        <td id="option">
                                                <span class="delete">Delete</span>
                                        </td>
                                </div>

                        </tr>



                        <tr class="sp_view">
                                <div class="sp_view_detail">
                                        <td><span class="no">2</span></td>
                                        <td><span class="type">Card payment</span></td>
                                        <td><span class="fname">Punsara Deshan</span></td>
                                        <td><span class="address">No.34, Melder Place, Nugegoda</span></td>
                                        <td><span class="city">Colombo</span></td>
                                        <td><span class="postal_code">10250</span></td>
                                        <td><span class="amount">Rs. 1000 </span></td>


                                        <td id="option">
                                                <span class="delete">Delete</span>
                                        </td>
                                </div>

                        </tr>

<tr class="sp_view">
                                <div class="sp_view_detail">
                                        <td><span class="no">3</span></td>
                                        <td><span class="type">Card payment</span></td>
                                        <td><span class="fname">Punsara Deshan</span></td>
                                        <td><span class="address">No.34, Melder Place, Nugegoda</span></td>
                                        <td><span class="city">Colombo</span></td>
                                        <td><span class="postal_code">10250</span></td>
                                        <td><span class="amount">Rs. 1000 </span></td>


                                        <td id="option">
                                                <span class="delete">Delete</span>
                                        </td>
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











