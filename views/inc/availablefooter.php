<script>
	$(document).ready(function(){

       $("#how_time").on('change', function(){
            
            var how_time = $("#how_time").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>available/replace/?tim="+how_time;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                               
                    $("#price").val(result);
                
                }});
        }) ;
	});
</script>