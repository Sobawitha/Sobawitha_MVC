<link rel="stylesheet" href="../css/blog_post/create_blog.css"></link>
<link rel="stylesheet" href="../css/component/alert_box.css"></link>
<script src="../js/blog_post/create_blog.js"></script> 
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/officer_topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Officer_Sidebar.php'?>
    

<!--button_section-->

<?php
// $data1['form_submit_message'] = 'Your post has been successfully added!';
if($data['form_submit_message']=='Your post has been successfully added!'){

    ?>
    <div id="overlap1">
    <div class="popup" id="pop_up">
        <i class="fa fa-check-circle" aria-hidden="true" id="ok" ></i>
        <p><?php echo $data['form_submit_message']?></P>

    </div>
    </div>
<?php
}

else if(!empty($data['form_submit_message'])){
    ?>
    <p><?php echo $data['title']?></P>
    <div id="overlap1">
    <div class="popup" id="pop_up">
        <i class="fa fa-times-circle" aria-hidden="true" id="fail" ></i>
        <p><?php echo $data['form_submit_message']?></P>
    </div>
    </div>
<?php
}


function setColor($tag){
    if($tag == 'Production') return 'set-green';
    if($tag == 'Knowledge') return 'set-yellow';
    if($tag == 'Innovations') return 'set-orange';
    if($tag == 'Other') return 'set-purple';
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
                foreach($data['blogpost'] as $blogpost):?>
            
                    <div class="individual_complaint">
                        <span class="<?php echo setColor($blogpost->tag);?>" ><i class="fa-solid fa-circle" id="circle" ></i></span>
                        <span class="complaint"><?php echo $blogpost->title?></span><br>
                        <span class="time"><?php echo $blogpost->created?></span>

                        <div class="footer">
                            <i class="fa-solid fa-pen-to-square" id="editbtn"></i><span class="edit">Edit</span>
                            <i class="fa-solid fa-trash" id="deletebtn"></i><span class="delete">Delete</span>
                        </div>
                    </div>

            <?php endforeach;?>
            
            </div>
        </div>

        <div class="section_3">

            <div class="button_section">
                <span class="createpost_sec"><a href="#overlap"><button class="createpost" name="createpost" ><i class="fas fa-plus"></i>Add post</button></a></span>
                <div class="add_new_post">Add New</div>
            </div>

            <hr class="section_divide_hr">

            <div class="categories">
                <ul type="" class="category">
                    <li><i class="fa-solid fa-circle" id="circle1"></i>Innovations</li>
                    <li><i class="fa-solid fa-circle" id="circle2"></i>Knowledge</li>
                    <li><i class="fa-solid fa-circle" id="circle3"></i>New technique</li>
                    <li><i class="fa-solid fa-circle" id="circle4"></i>Production</li>
                </ul>
        
            </div>

        </div>
</div>

<!--Add blog form-->
<div id="overlap">
        <div class="wrapper">
            <div class="create_blog_form">
                <form method="POST" action="<?php echo URLROOT?>/blog_post/create_posts" enctype="multipart/form-data">
                    <a href=""><label for="" class="closebtn"><i class="fa fa-times-circle" aria-hidden="true"></i></label></a><br>
                    <label for="title" class="label"><b>Title</b></label><br>

                    <input type="text" name="title"  class="input_field" placeholder=""  required></input><br><br>
                    

                    <label for="tags" class="label"><b>Tags/category</b></label><br>
                    <!-- <input type="text" name="tag" class="input_field" placeholder=""   required></input><br><br> -->
                    <div class="f_filter_section">
                        <label for="innovations" id="filter_label"> <input type="radio" id="innovations" name="diss_type" value="innovations">Innovations</label>
                        <label for="knowledge" id="filter_label"> <input type="radio" id="knowledge" name="diss_type" value="knowledge">Knowledge</label><br>
                        <label for="new_technique" id="filter_label"><input type="radio" id="new_technique" name="diss_type" value="new_technique">New technique</label>
                        <label for="production" id="filter_label"><input type="radio" id="production" name="diss_type" value="production">Production</label><br>
                    </div>

                    

                    <label for="discription" class="label"><b>Discription</b></label><br>
                    <textarea width="250px" height="500px" class="discription" name="discription"  value="<?php echo $data1['discription']?>" required></textarea>
                    

                    <div class="foot">
                        <input type="file" class="upload_file" name="image"></input>
                        <input type="submit" class="publish" name="submit" value="submit"/>

                    </div>
                </form>
            </div>
        </div>
</div>

    
    


<?php require APPROOT.'/views/inc/Footer.php'?>
