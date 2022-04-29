<script type="text/javascript">
    $(document).ready(function() {
        
       $("#credit_id").on('change', function(){
            
            var catgry = $("#credit_id").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>buycredit/replace/?crdt="+catgry;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                               
                    $("#price").html(result);
                
                }});
        }) ;
   });
</script>