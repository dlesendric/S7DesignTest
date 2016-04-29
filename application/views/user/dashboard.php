<div class="row">
    <h1 class="text-center">Welcome to your dashboard,check events in table</h1>
    <div class="col-lg-3">
        <!--MENU-->
        <ul class="list-group">
            <li class="list-group-item"><a href="#" class="logout">Logout</a></li>
            <li class="list-group-item"><a href="#" class="editProfile">Edit Profile</a></li>
            <?php
            if ($_SESSION['User']['Role'] == 2):
            ?>
            <li class="list-group-item"><a href="<?php echo base_url(); ?>Admin">Admin Panel</a></li>
            <?php
            endif;
            ?>
        </ul>
    </div>
    <div class="col-lg-9">
        <!--content-->
        <table class="table table-striped table-hover" id="table">
            <thead>
                <tr>
                    <td>Posted</td>
                    <td>Heading</td>
                    <td>Description</td>
                    <td>Date and time</td>
                    <td>Place</td>
                    <td>Details</td>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $(".logout").click(function (e){
        e.preventDefault();
        $.ajax({
            url:"<?php echo base_url();?>Api/logout",
            success: function (data, textStatus, jqXHR) {
                        window.location="<?php echo base_url();?>";
                    }
        });
    });
    
    $(".editProfile").click(function(e){
        e.preventDefault();
        alert("Not done, should popup modal!");
    });
    
    $("#table").DataTable({
        ajax:{
            "url":"<?php echo base_url();?>Api/getAllEvents",
            "dataSrc":""
        },
        "columns":[
            {"data":"Posted"},
            {"data":"Heading"},
            {"data":"Description"},
            {"data":"Event_time"},
            {"data":"Event_place"},
            { "orderable":false}
        ],
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<span class='glyphicon glyphicon-edit'></span>"
        } ]
    });
});
</script>
