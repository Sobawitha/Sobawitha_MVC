<link rel="stylesheet" href="../css/blog_post/create_blog.css"></link>
<link rel="stylesheet" href="../css/component/alert_box.css"></link>
<script src="../js/blog_post/create_blog.js"></script> 
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Sidebar.php'?>
    

<!--button_section-->

<?php
// $data1['form_submit_message'] = 'Your post has been successfully added!';
if($data1['form_submit_message']=='Your post has been successfully added!'){
    ?>
    <div id="overlap1">
    <div class="popup" id="pop_up">
        <i class="fa fa-check-circle" aria-hidden="true" id="ok" ></i>
        <p><?php echo $data1['form_submit_message']?></P>
    </div>
    </div>
<?php
}
else if(!empty($data1['form_submit_message'])){
    ?>
    <p><?php echo $data1['title']?></P>
    <div id="overlap1">
    <div class="popup" id="pop_up">
        <i class="fa fa-times-circle" aria-hidden="true" id="fail" ></i>
        <p><?php echo $data1['form_submit_message']?></P>
    </div>
    </div>
<?php
}
?>


<div class="body">
        <div class="section_1">
            
        </div>
        <div class="blog_body">
            <div class="blog_list">
            <table boder="2px">
                <tr id="header">
                    <th>Title</th>
                    <th>Category</th>
                    <th>Create date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>


                <?php
                    /* Display tabuler form */
                    foreach($data['blogpost'] as $blogpost):?>
                    <tr>
                        <td><?php echo $blogpost->title ?></td>
                        <td ><?php echo $blogpost->tag ?></td>
                        <td><?php echo $blogpost->created ?></td>
                        <td><a href=''><button type='submit' name='update' class='update'>Update</button></a></i></td>
                        <td><a href=''><button type='submit' name='delete' class='delete'>Delete</button></a></td>
                    </tr>
                    <?php endforeach;?>
                    

            </table>
            </div>
            
        </div>

        <div class="related_post">

            <div class="button_section">
                <div class=""></div>
                <a href="#overlap"><button class="createpost" name="createpost"><i class="fas fa-plus"></i>Add post</button></a>
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
                    <input type="text" name="title"  class="input_field" placeholder="" value="<?php echo $data1['title']?>" required></input><br><br>
                    

                    <label for="tags" class="label"><b>Tags/category</b></label><br>
                    <input type="text" name="tag" class="input_field" placeholder=""  value="<?php echo $data1['tag']?>" required></input><br><br>
                    

                    <label for="discription" class="label"><b>Discription</b></label><br>
                    <textarea width="250px" height="500px" class="discription" name="discription"  value="<?php echo $data1['discription']?>" required></textarea>
                    

                    <div class="foot">
                        <input type="file" class="upload_file" name="image" ?>"></input>
                        <input type="submit" class="publish" name="submit" />
                    </div>
                </form>
            </div>
        </div>
</div>

    
    


<?php require APPROOT.'/views/inc/Footer.php'?>
