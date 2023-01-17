<link rel="stylesheet" href="../css/complaint/complaint.css"></link>
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Sidebar.php'?>



<div class="body">
    <div class="section_1">
            
    </div>
    <div class="section_2">

        <div class="search_bar">
            <div class="search_content">
                <input type="text" name="search_text" placeholder="Search the forum" require/>
                <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
            </div>
        </div>

        <div class="my_complaint_list">
        
        <div class="individual_complaint">
            <i class="fa-solid fa-circle" id="circle"></i>
            <span class="complaint">Sample Complaint - Let us know?</span><br>
            <span class="time">December 30,2022</span>

            <div class="footer">
                 <i class="fa-solid fa-pen-to-square" id="editbtn"></i><span class="edit">Edit</span>
                <i class="fa-solid fa-trash" id="deletebtn"></i><span class="delete">Delete</span>
            </div>
        </div>

        <div class="individual_complaint">
            <i class="fa-solid fa-circle" id="circle"></i>
            <span class="complaint">Sample Complaint - Let us know?</span><br>
            <span class="time">December 30,2022</span>

            <div class="footer">
                 <i class="fa-solid fa-pen-to-square" id="editbtn"></i><span class="edit">Edit</span>
                <i class="fa-solid fa-trash" id="deletebtn"></i><span class="delete">Delete</span>
            </div>
        </div>

        <div class="individual_complaint">
            <i class="fa-solid fa-circle" id="circle"></i>
            <span class="complaint">Sample Complaint - Let us know?</span><br>
            <span class="time">December 30,2022</span>

            <div class="footer">
                 <i class="fa-solid fa-pen-to-square" id="editbtn"></i><span class="edit">Edit</span>
                <i class="fa-solid fa-trash" id="deletebtn"></i><span class="delete">Delete</span>
            </div>
        </div>
            

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

            <div class="categories">
                <ul type="" class="category">
                    <li><i class="fa-solid fa-circle" id="circle1"></i>Order status, product availability.</li>
                    <li><i class="fa-solid fa-circle" id="circle2"></i>Account access.</li>
                    <li><i class="fa-solid fa-circle" id="circle3"></i>Technical issues.</li>
                    <li><i class="fa-solid fa-circle" id="circle4"></i>Buisness partnership.</li>
                    <li><i class="fa-solid fa-circle" id="circle5"></i>Legal & private questions.</li>
                    <li><i class="fa-solid fa-circle" id="circle5"></i>Payments.</li>
                </ul>
            </div>

    </div>
</div>
