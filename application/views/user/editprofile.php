<div class="row">
    <h1 class="text-center">Welcome to your dashboard,Edit your profile</h1>
    <div class="col-lg-3">
        <?php $this->load->view('user/menu');?>
    </div>
    <div class="col-lg-9">
        <!--content-->
        <form id="form" class="col-lg-4 col-lg-offset-2">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="Username" class="form-control" required="" value="<?php echo $_SESSION['User']['Username'];?>"/>
            </div>
            <div class="form-group">
                <label>Password change?
                    <input type="checkbox" id="chbChange"/>
                </label>
                <input type="password" name="Password" id="password" required="" disabled="" class="form-control"/>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="FirstName" id="first_name" class="form-control" value="<?php echo $_SESSION['User']['FirstName'];?>"/>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="LastName" id="last_name" class="form-control" value="<?php echo $_SESSION['User']['LastName'];?>"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="Email" id="email" class="form-control" value="<?php echo $_SESSION['User']['Email'];?>"/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div>
            
        </form>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#form").on("submit",function(e){
        e.preventDefault();
        var data = $(this).serializeArray();
        data['access_token'] = "<?php echo $_SESSION['access_token'];?>";
        $.ajax({
            url:"<?php echo base_url();?>Api/editProfile/",
            type:"POST",
            data:data,
            success: function (data, textStatus, jqXHR) {
                        alert("Updated!");
                    }
        });
    });
    
    $("#chbChange").change(function (e){
        if($(this).is(":checked")){
            $("#password").val("");
            $("#password").removeProp("disabled");
        }
        else{
             $("#password").prop({"disabled":"disabled"});
        }
    });
});
</script>


