<div class="row">
    <h1 class="text-center">Welcome to your dashboard,check events in table</h1>
    <div class="col-lg-3">
        <!--MENU-->
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo base_url();?>Dashboard/">Dashboard</a>
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
                    <td>Signed?</td>
                    <td>Date and time</td>
                    <td>Place</td>
                    <td>Details</td>
                </tr>
            </thead>
        </table>
        <button class="btn btn-info" id="btnPast">Show and past events?</button>
    </div>
</div>

<script type="text/javascript">
    var table;
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
    
    table=$("#table").DataTable({
        ajax:{
            "url":"<?php echo base_url();?>Api/getAllEvents/",
            "dataSrc":""
        },
        "columns":[
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
        table.ajax.url("<?php echo base_url();?>Api/getAllEvents/past/").load();
    });

});
function format ( d ) {
    // `d` is the original data object for the row
    var text;
    if(d.signed=="no"){
            text='<td><button class="btn btn-success" onclick="signup('+d.IdEvent+');">Sign up</button> </td>'            }else{
            text='<td><button class="btn btn-danger" onclick="unsign('+d.IdEvent+');">Unsign</button> </td>'
            }
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Description:</td>'+
            '<td>'+d.Description+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Sign up for event:</td>'+
            text;
        +
        '</tr>'+
    '</table>';
}

function signup(id){
    $.ajax({
        url:"<?php echo base_url();?>Api/signupEvent/",
        type:"POST",
        data:{id:id,access_token:"<?php echo $_SESSION['access_token'];?>"},
        success: function (data, textStatus, jqXHR) {
                        table.ajax.reload();
                    }
    });
}
function unsign(id){
    $.ajax({
        url:"<?php echo base_url();?>Api/unsignEvent/",
        type:"POST",
        data:{id:id,access_token:"<?php echo $_SESSION['access_token'];?>"},
        success: function (data, textStatus, jqXHR) {
                        table.ajax.reload();
                    }
    });
}
</script>
