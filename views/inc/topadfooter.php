<script>
	$(document).ready(function(){

       $("#ad_days").on('change', function(){
            
            var ad_days = $("#ad_days").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>topad/replace/?addays="+ad_days;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                               
                    $("#price").val(result);
                
                }});
        }) ;
	});
</script>