<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <form id="form">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="Username" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="Pass" name="Password" class="form-control" required="" pattern="^[\w]{6,}$"/>
                <p class="help-block">Minimum 6 chars</p>
            </div>
            <div class="form-group">
                <label>Repeat password</label>
                <input type="password" id="rePass" required="" class="form-control"/>
            </div>
            <div class="form-group">
                <label>First name</label>
                <input type="text" name="FirstName" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" name="LastName" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="Email" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="reset" class="btn btn-default pull-left" value="Reset"/>
                <button type="submit" class="btn btn-primary pull-right">Register</button>
            </div>
                
        </form>
        <div class="clearfix"></div>
        <hr/>
        <p class="pull-right">Already have account? <a href="<?php echo base_url();?>Home/login" class="btn btn-success">Log in</a></p>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var submit = false;
    $("#form").on("submit",function(e){
        e.preventDefault();
        //check pass
        if($("#rePass").val()==$("#Pass").val()){
            $("#errorDiv").addClass("hidden");
            //check username already exitst
            var username = $("#username").val();
            $.ajax({
                url:"<?php echo base_url();?>Api/checkUsername",
                type:"POST",
                data:{Username:username},
                success: function (data, textStatus, jqXHR) {
                        sendForm();
                    },
                            error: function (jqXHR, textStatus, errorThrown) {
                        $("#errorDiv").removeClass("hidden");
                        $("#errorDiv").text("This username already exists");
                    }
            });
            
        }
        else{
            $("#errorDiv").removeClass("hidden");
            $("#errorDiv").text("Ooops, passwords don't match...");
            
        }
    });
    
    function sendForm(){
        var data = $("#form").serializeArray();
        console.log(data);
        $.ajax({
            url:"<?php echo base_url();?>Api/register",
            type:"POST",
            data:data,
            success: function (data, textStatus, jqXHR) {
                        alert("Successiful registred!");
                        $("#errorDiv").addClass("hidden");
                    }
        });
    }
});
</script>
