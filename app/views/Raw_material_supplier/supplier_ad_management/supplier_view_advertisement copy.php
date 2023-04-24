<?php require APPROOT.'/views/Users/component/header.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_sidebar.php'?>
<link rel="stylesheet" href="../css/Raw_material_supplier/ad_management/ad_view.css"></link>
<!-- <script src="../js/Raw_material_supplier/ad_delete/ad_delete.js"></script>  -->




<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        <div class="dashboard">
        <?php foreach($data['posts'] as $ad): ?>
            <div class='card' id="card1">
                <div class='content'>
                <?php if($ad->raw_material_image != null): ?>
                <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $ad->raw_material_image;?>" alt="">
                <?php endif; ?>
                    <p class="count"><?php echo $ad->price ?></p>
                    <p class="topic"><?php echo $ad->product_name ?></p>
                    <p class="time_period">For last month</P>
                    <a href="<?php echo URLROOT?>/supplier_ad_view/indexmore/<?php echo $ad->Product_id ?>">read more</a>
                    <!-- <i class="fa-solid fa-coins" id="blog_icon"></i> -->
                    <!-- <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i> -->
                </div>
            </div>
            <?php endforeach; ?>

            <!-- <div class='card' id="card2">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">Ongoing orders</p>
                    <p class="time_period">For last month</P>
                    <i class="fa-solid fa-boxes-packing" id="forum_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">Completed orders</p>
                    <p class="time_period">For previous month</P>
                    <i class="fa-regular fa-circle-check" id="complete_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">Complaints</p>
                    <p class="time_period">For previous month</P>
                    <i class="fa fa-file-text" aria-hidden="true" id="complain_icon"></i>

                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div> -->

            


        </div>

        <div class="demo">
            <!-- Demostration here -->
        </div>

    </div>

    <div class="last">

    </div>
</div>
<br><br><br>



<?php require APPROOT.'/views/Users/component/footer.php'?>



