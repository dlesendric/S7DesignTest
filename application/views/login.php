<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <form id="form">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="Username" required="" class="form-control"/>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Password" required="" class="form-control" pattern="^[\w]{6,}$"/>
                <p class="help-block"> Minimum 6 chars</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">Login</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $("#form").on("submit",function (e){
            e.preventDefault();
            var data = $(this).serializeArray();
            $.ajax({
                url:"<?php echo base_url();?>Api/login",
                type:"POST",
                data:data,
                success: function (data, textStatus, jqXHR) {
                        window.location = "<?php echo base_url();?>Dashboard";
                    },
                error: function (jqXHR, textStatus, errorThrown) {
                        $(".alert").removeClass('hidden');
                        $("#errorDiv").text(errorThrown);
                    }
            });
        });
    });
</script>