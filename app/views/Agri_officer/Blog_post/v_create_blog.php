<link rel="stylesheet" href="../css/Agri_officer/blog_post/create_blog.css"></link>
<link rel="stylesheet" href="../css/Users/component/alert_box.css"></link>
<script src="../js/Agri_officer/blog_post/create_blog.js"></script> 
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/Officer_Sidebar.php'?>
    

<!--button_section-->

<dialog id="updatePopup">
                <div class="updatePopup">
                        <div class="dialog_content">
                        <form method="POST" action="<?php echo URLROOT?>/blog_post/update_post" enctype="multipart/form-data">
                        <a href=""><label for="" class="closebtn"><i class="fa fa-times-circle" aria-hidden="true"></i></label></a>
                        <h2 class="update_dialog_headin">Update Blogpost</h2>
                        <?php echo '<img src=".././public/upload/blog_post_images/background7.jpg"   alt="card Picture"  class="edit_post_image" id="upload_image">';?>
                        <button type="" class="upload_images"><i class="fa-solid fa-upload "><span class="upload"></span></i></button>
                        <span class="uploard_img_hidden"><input type="file" class="upload_file" name="image" onchange="loadFile(event)" id="upload_image"></input></span>
                        <br>
                        <label for="title" class="label"><b>Title</b></label><br>
                        <input type="text" id="title" name="title"  class="input_field" placeholder="" value=""  required></input><br><br>
                        <label for="tags" class="label"><b>Tags/category</b></label><br>
                        <div class="f_filter_section">
                            <label for="innovations" id="filter_label"> <input type="radio" id="innovations" name="tag" value="Innovations">Innovations</label>
                            <label for="knowledge" id="filter_label"> <input type="radio" id="knowledge" name="tag" value="Knowledge">Knowledge</label><br>
                            <label for="new_technique" id="filter_label"><input type="radio" id="new_technique" name="tag" value="New_technique">New technique</label>
                            <label for="production" id="filter_label"><input type="radio" id="production" name="tag" value="Production">Production</label><br>
                        </div>
                        <label for="discription" class="label"><b>Discription</b></label><br>
                        <textarea width="250px" height="500px" class="discription"  id="discription" name="discription"  value="" required></textarea>
                        <div class="foot">
                            <button type="submit"  class="publish" id="updatebutton" name="updatepost" value="" >Submit</button>
                        </div>
                </form>
                </div>
                </div>
</dialog>
<?php
function setColor($tag){
    if($tag == 'Production') return 'set-green';
    if($tag == 'Knowledge') return 'set-yellow';
    if($tag == 'Innovations') return 'set-orange';
    if($tag == 'New_technique') return 'set-purple';
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

            <dialog id="deletePopup">
                <div class="deletePopup">
                        <div class="delete_dialog_heading">
                        <i class="fa-regular fa-circle-xmark"></i>
                        <h2>Are you sure</h2>
                        <p>You will not be able to recover that item.</p>
                        </div>

                        <div class="dialog_content">
                            <form method="POST" action="<?php echo URLROOT?>/blog_post/delete_post">
                            <button id="deletebtn" type="submit" value="" name="deletepost">Delete
                            </button>
                            <button id="cancelbtn" type="button">Cancel
                            </button>
                            </form>
                        </div>
                </div>
            </dialog>
        

            <?php
                /* Display tabuler form */
                foreach($data['blogpost'] as $blogpost):?>
            
                    <div class="individual_complaint">
                        <span class="<?php echo setColor($blogpost->tag);?>" ><i class="fa-solid fa-circle" id="circle" ></i></span>
                        <span class="complaint"><?php echo $blogpost->title?></span><br>
                        <span class="time"><?php echo $blogpost->created?></span>

                        <div class="footer">
                            <span onclick="updatepopUpOpen(<?php echo $blogpost->post_id;?>,`<?php echo $blogpost->title;?>`,`<?php echo $blogpost->tag;?>`,`<?php echo $blogpost->discription;?>`,`<?php echo $blogpost->image;?>`)" >
                            <i class="fa-solid fa-pen-to-square" id="editbutton"></i>
                            <span class="edit">Edit</span>
                            </span>

                            <span  onclick="popUpOpen(<?php echo $blogpost->post_id?>)"><i class="fa-solid fa-trash deleteButton" id="deletebutton"></i><span class="delete">Delete</span></span>
                            
                        </div>
                    </div>

            <?php endforeach;?>

            
            </div>
        </div>

        <div class="section_3">

            <div class="add_new_post_section">
            <div class="add_new_post_section_body">
                <p class="header">Add new post</p>
                <p class="discription">To share your knowledge with other please put some post in there.</p>
                <a href="#overlap"><button class="add_new_post">Add new post</button></a>
            </div>
            </div>

            <hr class="section_divide_hr">

            <div class="filter_section">
                    <form method ="POST" action="<?php echo URLROOT?>/blog_post/display_all_blogposts" id="filter_form">
                        <label for="all" id="filter_label"> <input type="radio" id="all" name="tag"  onclick="javascript:submit()" value = "all"<?php if (isset($_POST['tag']) && $_POST['tag'] == 'all') echo ' checked="checked"';?> checked>All type</label><br>
                        <label for="innovations" id="filter_label"> <input type="radio" id="innovations" name="tag"  onclick="javascript:submit()" value = "Innovations"<?php if (isset($_POST['tag']) && $_POST['tag'] == 'Innovations') echo ' checked="checked"';?>>Innovations</label><br>
                        <label for="knowledge" id="filter_label"> <input type="radio" id="knowledges" name="tag"  onclick="javascript:submit()" value = "Knowledge"<?php if (isset($_POST['tag']) && $_POST['tag'] == 'Knowledge') echo ' checked="checked"';?>>Knowledge</label><br>
                        <label for="new_technique" id="filter_label"><input type="radio" id="new_techniques" name="tag" value="New_technique" onclick="javascript:submit()" value = "New_technique"<?php if (isset($_POST['tag']) && $_POST['tag'] == 'New_technique') echo ' checked="checked"';?>>New technique</label><br>
                        <label for="production" id="filter_label"><input type="radio" id="productions" name="tag"  onclick="javascript:submit()" value = "Production"<?php if (isset($_POST['tag']) && $_POST['tag'] == 'Production') echo ' checked="checked"';?>>Production</label><br>
                </form>
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
                    <a href=""><label for="" class="closebtn"><i class="fa fa-times-circle" aria-hidden="true"></i></label></a>
                    <h2 class="add_post_form_heading">Add New Post</h2>
                    <?php echo '<img src=".././public/images/background7.jpg"   alt="card Picture"  class="edit_post_image" id="upload_image1">';?>
                    <button type="" class="upload_images"><i class="fa-solid fa-upload "><span class="upload"></span></i></button>
                    <span class="uploard_img_hidden"><input type="file" class="upload_file" name="image" onchange="loadFile1(event)" ></input></span>
                    <br>
                    <label for="title" class="label"><b>Title</b></label><br>
                    <input type="text" name="title"  class="input_field" placeholder=""  required></input><br><br>
                    <label for="tags" class="label"><b>Tags/category</b></label><br>
                    <div class="f_filter_section">
                        <label for="innovations" id="filter_label"> <input type="radio" id="innovations" name="tag" value="Innovations">Innovations</label>
                        <label for="knowledge" id="filter_label"> <input type="radio" id="knowledge" name="tag" value="Knowledge">Knowledge</label><br>
                        <label for="new_technique" id="filter_label"><input type="radio" id="new_technique" name="tag" value="New_technique">New technique</label>
                        <label for="production" id="filter_label"><input type="radio" id="production" name="tag" value="Production">Production</label><br>
                    </div>
                    <label for="discription" class="label"><b>Discription</b></label><br>
                    <textarea width="250px" height="500px" class="discription" name="discription"  value="<?php echo $data1['discription']?>" required></textarea>
                    
                    <br>
                    <div class="foot">
                        <button type="submit" class="publish" name="submit" value="">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</div>

    
    


<?php require APPROOT.'/views/Users/component/footer.php'?>
