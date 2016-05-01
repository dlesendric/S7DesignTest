<div class="row">
    <h1 class="text-center">Welcome to your Admin Panel</h1>
    <div class="col-lg-3">
        <?php $this->load->view("admin/menu");?>
    </div>
    <div class="col-lg-9">
        <!--content-->
        <table class="table table-striped table-hover" id="table">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Username</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Manage</td>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript">
    var table;
$(document).ready(function(){
    
    $(".editProfile").click(function(e){
        e.preventDefault();
        alert("Not done, should popup modal!");
    });
    
    table=$("#table").DataTable({
        ajax:{
            "url":"<?php echo base_url();?>Api/getAllUsers/",
            "dataSrc":""
        },
        "columns":[
            {"data":"IdUser"},
            {"data":"Username"},
            {"data":"FirstName"},
            {"data":"LastName"},
            {"data":"Email"},
            {"data":"Role"},
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
    var select = "";
    if(d.Role=="User"){
        select = "<select data-id='"+d.IdUser+"' onchange='changeRole(this);'><option value='User' selected=''>User</option><option value='Admin'>Administrator</option></select>";
    }
    else{
        select = "<select data-id='"+d.IdUser+"' onchange='changeRole(this);'><option value='User'>User</option><option value='Admin' selected=''>Administrator</option></select>";
    }
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Role:</td>'+
            '<td>'+select+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Delete:</td>'+
            '<td><a href="javascript:void(0);" class="deleteUser" onclick="deleteUser('+d.IdUser+');">Delete</a></td>'
            +
        '</tr>'+
    '</table>';
}

function changeRole(control){
        var val = $(control).val();
        var iduser = $(control).data('id');
        var currentuser = <?php echo $_SESSION['User']['IdUser'];?>;
        var proceed = true;
        if(currentuser == iduser){
            proceed = confirm("Are you sure to change yourself?");
        }
        if(!proceed){
         return false;
        }
        $.ajax({
            url:"<?php echo base_url();?>Api/editUser/",
            type:"POST",
            data:{Role:val,IdUser:iduser,access_token:"<?php echo $_SESSION['access_token'];?>"},
            success: function (data, textStatus, jqXHR) {
                        alert("Updated!");
                    },
                            error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.responseText);
                    }
        });
    }

function deleteUser(id){
    $.ajax({
        url:"<?php echo base_url();?>Api/deleteUser/"+id,
        type:"DELETE",
        data:{access_token:"<?php echo $_SESSION['access_token'];?>"},
        success: function (data, textStatus, jqXHR) {
                        table.ajax.reload();
                    },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR);
                        $("#errorDiv").removeClass("hidden");
                        var json = JSON.parse(jqXHR.responseText);
                        $("#errorDiv").text(json.Error);
                    }
    });
}


</script>
