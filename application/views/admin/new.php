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
        <h2>New event entry</h2>
        <form id="form">
            <div class="form-group">
                <label>Heading</label>
                <input type="text" name="Heading" required="" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Date and time</label>
                <input type="text" name="Event_time" id="datetime" class="form-control" required=""/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" data-format="yyyy-MM-dd h:i" name="Description" required=""></textarea>
            </div>
            <div class="form-group">
                <label>Place</label>
                <input type="text"  name="Event_place" class="form-control" required="" />
            </div>
            <div class="form-group">
                <button type="reset" class="btn pull-left">Reset</button>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>
            <input type="hidden" name="IdUser" value="<?php echo $_SESSION['User']['IdUser'];?>"/>
            
            <div class="clearfix"></div>
        </form>
    </div>
    <div class="clearfix"></div>
</div>
   
<script type="text/javascript">

$(document).ready(function(){
    $('#datetime').datetimepicker({
        toolbarPlacement:'bottom',
        format:'YYYY-M-D HH:mm'
    });
    
    $("#form").on("submit",function(e){
        e.preventDefault();
        var data  = $(this).serializeArray();
        $.ajax({
            url:"<?php echo base_url();?>Api/newEvent",
            type:"POST",
            data:data,
            success: function (data, textStatus, jqXHR) {
                        $("#form")[0].reset();
                    }
        });
    });
});
</script>
