<link rel="stylesheet" href="../css/admin/admin_comp_pending.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Add_management/add_management.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Complaint Details</h3>
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
                        <label for="ongoing_progress__order" id="filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="ongoing">Solved</label>
                        <label for="ongoing_ready_order" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing" checked>Pending</label>
                </div>

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>Complaint and Email</td>
                                <td>Category</td>
                                <td>Discription</td>
                                <td>Option</td>
                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">Punsara</span>
                                        <span class="p_name">Punsara@gmail.com</span></td>
                                        <td><span class="amount">Seller</span></td>
                                        <td>
                                          <span class="price">Fake Seller</span>
                                          <span class="price">Low quality product. Not recomended.</span>
                                        </td>
                                        <td><span class="solve">Solve</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">Punsara</span>
                                        <span class="p_name">Punsara@gmail.com</span></td>
                                        <td><span class="amount">Seller</span></td>
                                        <td>
                                          <span class="price">Fake Seller</span>
                                          <span class="price">Low quality product. Not recomended.</span>
                                        </td>
                                        <td><span class="solve">Solve</span></td>
                                        <td><span class="delete">Delete</span></td>
                                </div>

                        </tr>

                        <tr class="order">
                                <div class="order_detail">
                                        <td><span class="p_name">Punsara</span>
                                        <span class="p_name">Punsara@gmail.com</span></td>
                                        <td><span class="amount">Seller</span></td>
                                        <td>
                                          <span class="price">Fake Seller</span>
                                          <span class="price">Low quality product. Not recomended.</span>
                                        </td>
                                        <td><span class="solve">Solve</span></td>
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