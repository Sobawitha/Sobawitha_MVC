

<?php require APPROOT.'/views/inc/Header.php'?>
    
    <h2>Admin</h2>
    <?php
    foreach ($data['admin'] as $admin):?>
    <p><?php echo $admin->first_name?> - <?php echo $admin->last_name?></p>
    <?php endforeach; ?>


<?php require APPROOT.'/views/inc/Footer.php'?>
