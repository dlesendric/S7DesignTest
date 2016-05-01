<div class="row">
    <h1 class="text-center">Welcome to your Admin Panel| edit Events</h1>
    <div class="col-lg-3">
        <?php $this->load->view("admin/menu");?>
    </div>
    <div class="col-lg-9">
        <!--content-->
        <h2>Edit</h2>
        <form id="form">
            <div class="form-group">
                <label>Heading</label>
                <input type="text" name="Heading" id="heading" required="" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Date and time</label>
                <input type="text" name="Event_time" id="datetime" class="form-control" required=""/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="description" name="Description" required=""></textarea>
            </div>
            <div class="form-group">
                <label>Place</label>
                <input type="text"  name="Event_place" id="eventplace" class="form-control" required="" />
            </div>
            <div class="form-group">
                <button type="reset" class="btn pull-left">Reset</button>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>
            
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
    
    $.ajax({
        url:"<?php echo base_url();?>Api/getEvent/"+<?php echo $IdEvent;?>,
        type:"GET",
        dataType:"json",
        success: function (data, textStatus, jqXHR) {
                        $("#heading").val(data.Heading);
                        $("#datetime").val(data.Event_time);
                        $("#description").val(data.Description);
                        $("#eventplace").val(data.Event_place);
                    }
    });
    
    $("#form").on("submit",function(e){
        e.preventDefault();
        var data  = $(this).serializeArray();
        $.ajax({
            url:"<?php echo base_url();?>Api/editEvent/"+<?php echo $IdEvent;?>,
            type:"POST",
            data:data,
            success: function (data, textStatus, jqXHR) {
                        alert("Updated!");
                    }
        });
    });
});
</script>


