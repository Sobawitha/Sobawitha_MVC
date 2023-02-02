<script src="../js/complaint/complaint.js"></script>
<link rel="stylesheet" href="../css/complaint/complaint.css"></link>
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Sidebar.php'?>

<?php
function setColor($type){
    if($type == 'Order status, product availability') return 'set-purple';
    if($type == 'Account access') return 'set-blue';
    if($type == 'Technical issues') return 'set-brown';
    if($type == 'Buisness partnership') return 'set-pink';
    if($type == 'Legal & private questions') return 'set-yellow';
    if($type == 'Payments') return 'set-white';
}
?>

<div class="body">
    <div class="section_1">
            
    </div>
    <div class="section_2">

    <form method="POST">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="<?php  echo $_SESSION['search_cont']?> " require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>

        <div class="my_complaint_list">
        
        <?php
                /* Display tabuler form */
                foreach($data['complaint'] as $complaint):?>
            
                    <div class="individual_complaint">
                        <span class="<?php echo setColor($complaint->type);?>" ><i class="fa-solid fa-circle" id="circle" ></i></span>
                        <span class="complaint"><?php echo $complaint->subject?></span><br>
                        <span class="time"><?php echo $complaint->date?></span>

                        <div class="footer">
                            <i class="fa-solid fa-pen-to-square" id="editbtn"></i><span class="edit">Edit</span>
                            <i class="fa-solid fa-trash" id="deletebtn"></i><span class="delete">Delete</span>
                        </div>
                    </div>

            <?php endforeach;?>
            

        </div>

    </div>

    <div class="section_3">

        <div class="conatct_us_section">
            <div class="conatct_us_section_body">
                <p class="header">Help & Support</p>
                <p class="discription">Our support team is spred across the globe to give you answer fast.</p>
                <a href="<?php echo URLROOT?>/complaint/contact_us"><button class="visit_contact_us_form">Visit Support Page</button></a>
            </div>
        </div>

        <hr class="section_divide_hr">

                <div class="filter_section">
                        <label for="all" id="filter_label"> <input type="radio" id="all" name="order_type" value="all" checked>All type</label>
                        <br><label for="completed" id="filter_label"> <input type="radio" id="completed" name="order_type" value="completed">Completed</label>
                        <br><label for="pending" id="filter_label"><input type="radio" id="pending" name="order_type" value="pending">Pending</label>
                </div>

            <hr class="section_divide_hr">

            <div class="categories">
                <ul type="" class="category">
                    <li><i class="fa-solid fa-circle" id="circle1"></i>Order status, product availability.</li>
                    <li><i class="fa-solid fa-circle" id="circle2"></i>Account access.</li>
                    <li><i class="fa-solid fa-circle" id="circle3"></i>Technical issues.</li>
                    <li><i class="fa-solid fa-circle" id="circle4"></i>Buisness partnership.</li>
                    <li><i class="fa-solid fa-circle" id="circle5"></i>Legal & private questions.</li>
                    <li><i class="fa-solid fa-circle" id="circle6"></i>Payments.</li>
                </ul>
            </div>

    </div>
</div>
