<!--MENU-->
<ul class="list-group">
    <li class="list-group-item"><a href="<?php echo base_url(); ?>Dashboard/">Dashboard</a>
    <li class="list-group-item"><a href="<?php echo base_url();?>Dashboard/editProfile/">Edit Profile</a></li>
    <?php
    if ($_SESSION['User']['Role'] == 'Admin'):
        ?>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>Admin">Admin Panel</a></li>
            <?php
        endif;
        ?>
    <li class="list-group-item"><a href="#" class="logout">Logout</a></li>
</ul>