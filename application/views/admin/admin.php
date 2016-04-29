<div class="row">
    <h1 class="text-center">Welcome to your Admin Panel</h1>
    <div class="col-lg-3">
        <!--MENU-->
        <ul class="list-group">
            <li class="list-group-item"><a href="#" class="logout">Logout</a></li>
            <li class="list-group-item"><a href="<?php echo base_url();?>Admin/">Events</a></li>
            <li class="list-group-item"><a href="<?php echo base_url();?>Admin/newEvent">New Event</a></li>
            <li class="list-group-item"><a href="<?php echo base_url();?>Admin/users">Users</a></li>
            <li class="list-group-item"><a href="<?php echo base_url();?>Dashboard">Return to Dashboard</a></li>
        </ul>
    </div>
    <div class="col-lg-9">
        <!--content-->
        <table class="table table-striped table-hover" id="table">
            <thead>
                <tr>
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
    
    $(".editProfile").click(function(e){
        e.preventDefault();
        alert("Not done, should popup modal!");
    });
    
    $("#table").DataTable();
});
</script>
