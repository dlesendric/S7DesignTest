<div class="row">
    <h1 class="text-center">Welcome to your Admin Panel</h1>
    <div class="col-lg-3">
        <?php $this->load->view('admin/menu');?>
    </div>
    <div class="col-lg-9">
        <!--content-->
        <table class="table table-striped table-hover" id="table">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Posted</td>
                    <td>Heading</td>
                    <td>Signed</td>
                    <td>Date and time</td>
                    <td>Place</td>
                    <td>Details</td>
                </tr>
            </thead>
        </table>
        <button class="btn btn-info" id="btnPast">Show past events?</button>
    </div>
</div>



<div class="modal fade" id="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Users signed for this event</h4>
      </div>
      <div class="modal-body">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    var table;
$(document).ready(function(){
    
    $(".editProfile").click(function(e){
        e.preventDefault();
        alert("Not done, should popup modal!");
    });
    
    table=$("#table").DataTable({
        ajax:{
            "url":"<?php echo base_url();?>Api/getAllEventsForAdmin/",
            "dataSrc":""
        },
        "columns":[
            {"data":"IdEvent"},
            {"data":"Posted"},
            {"data":"Heading"},
            {"data":"signed"},
            {"data":"Event_time"},
            {"data":"Event_place"},
            { 
                "className":'details-control',
                "orderable":false,
                "data":null,
                "defaultContent":"<a href='javascript:void(0);' class='info'><span class='glyphicon glyphicon-info-sign'></span></a>"
            }
        ],
        
    });
    $("#table tbody").on('click','td.details-control',function(){
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        if(row.child.isShown()){
            row.child.hide();
            tr.removeClass('shown');
        }else{
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });
    
        $("#btnPast").click(function(){
        table.ajax.url("<?php echo base_url();?>Api/getAllEventsForAdmin/past/").load();
    });
    
});

function format ( d ) {
    // `d` is the original data object for the row
    var btnView = "<span class='text-info'>Theres no users signed for this event!</span>";
    if(d.signed>0){
        btnView = '<button class="btn btn-default" onclick="viewSignedUsers('+d.IdEvent+');">View</button>';
    }
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Description:</td>'+
            '<td>'+d.Description+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>View all signed up users for this event:</td>'+
            '<td>'+btnView+'</td>'
            +
        '</tr>'+
        '<tr>'+
            '<td>Manage this event:</td>'+
            '<td><a href="<?php echo base_url();?>Admin/editEvent/'+d.IdEvent+'" class="btn btn-primary">Edit</a>'+
            '<button class="btn btn-danger" onclick="deleteEvent('+d.IdEvent+');">Delete</button>'+
            '</td>'+
        '</tr>'+
    '</table>';
}
function viewSignedUsers(id){
    $(".modal-body").text("Loading....");
    $("#modal").modal('show');
    
    $.ajax({
        url:"<?php echo base_url();?>Api/getAllSignedUsersForEvent/"+id,
        type:"GET",
        success: function (data, textStatus, jqXHR) {
                        var text = "<table class='table table-striped'>";
                        
                        $.each(data,function(i){
                            text+="<tr>";
                            text+="<td>"+(i+1)+"</td>";
                            text+="<td>"+data[i].Username+"</td>";
                            text+="<td>"+data[i].Email+"</br>"+data[i].FirstName+" "+data[i].LastName+"</td>";
                            text+="</tr>";
                        });
                        text+="</table>";
                        $(".modal-body").html(text);
                    }
    });
}

function deleteEvent(id){
    $.ajax({
        url:"<?php echo base_url();?>Api/deleteEvent/"+id,
        type:"DELETE",
        data:{access_token:"<?php echo $_SESSION['access_token'];?>"},
        success: function (data, textStatus, jqXHR) {
                        table.ajax.reload();
                    }
    });
}
</script>
