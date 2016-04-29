</div><!--container-->


    <script type="text/javascript">
    $(document).ready(function(){
        $(".logout").click(function (e){
            e.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>Api/logout",
                success: function (data, textStatus, jqXHR) {
                                    window.location = "<?php echo base_url(); ?>";
                                }
            });
        });
    });
    </script>
  </body>
</html>
