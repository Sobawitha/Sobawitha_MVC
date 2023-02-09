<script src="../js/component/comment.js"></script> 
<?php require APPROOT.'/views/inc/Header.php'?>
<link rel="stylesheet" href="../css/component/comment.css"></link>
    <!--comment section-->
    

    <div class="comment_section">
        <!-- display comment -->
                
                <p class="comment_section_header"><?php echo $data['count_comment'] ?> comments</p>
                <div class="comment_form">
                    <form method="POST">
                        <span id="usercommon"><?php echo ucfirst($_SESSION['username'][0])?></span>
                        <input type="text" class="comment-body" placeholder="Add a comment"  onclick="open_save_cancel_btn()" name="comment"  required/>
                        <div class="btn">
                            <button type="submit" class="cancelbtn" value="cancel" onclick="clear_comment()">Cancel</button>
                            <button type="submit" class="commentbtn" name="commentbtn" onclick="save_comment()">Comment</button>
                        </div>
                    </form>
                </div>

                <?php

                            foreach($data['comments'] as $comment):?>

                            <span id="user-<?php echo $comment->comment_id?>" class="user"><?php echo ucfirst(($data['author']->first_name[0]))?></span> <!--change-->
                            <div class="display_comment">
                                <P class="name"> <?php echo $data['author']->first_name, " ",$data['author']->last_name," "?><span class="publish_date"><?php echo $comment->date?></span></P>
                                <p class="comment_post"> <?php echo $comment->comment?> </p>
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-reply-all" id="replybtn" onclick="open_replyform(<?php echo $comment->comment_id?>)"></i><span class="reply">Reply</span>
                                    
                                    <?php if($_SESSION['userid']=17){ ?> <!--change-->
                                        <i class="fa-solid fa-pen-to-square" id="editbtn"></i><span class="edit">Edit</span>
                                        <i class="fa-solid fa-trash" id="deletebtn"></i><span class="delete">Delete</span>
                                    <?php }?>





                                    <!--add here-->
                                    
                                </div>
                            </div>
                            <?php endforeach ?>
    </div>