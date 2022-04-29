<script src="<?php echo base_url();?>fontassets/js/register.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback"></script>
<script src="https://crackerclassifieds.com/style/assets2/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
$(".mdb-select").select2({

});
});


</script>
<script type="text/javascript">
    $(document).ready(function() {
     
      $("#country").on('change', function(){
            
            var country = $("#country").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>register/replace/?country="+country;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                               
                    $("#city").html(result);
                
                }})
                ;
        }) ;
       $("#country").on('change', function(){
            
            var country = $("#country").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>register/replacestate/?country="+country;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                               
                    $("#state").html(result);
                
                }})
                ;
        }) ;
      
       /////////////////////////
        $("#username").on('keyup', function(){
          // alert('hii');
            var username = $("#username").val();
            // alert(username);
            $('.cracker_register').prop('disabled', true);
            var xurl = "<?php echo base_url();?>register/checkuser/?username="+username;
            $.ajax({url: xurl, success: function(result){
            if(result == 'available')
            {
              $('.cracker_register').prop('disabled', false);
              $('#usersucc').show();
              $('#usererror').hide();
              $('#validerror').hide();
            }
            if(result == 'notavailable')
            {
              $('.cracker_register').prop('disabled', true);
              $('#usererror').show();
              $('#usersucc').hide();
              $('#validerror').hide();
            }
             if(result == 'notvalid')
            {
              $('.cracker_register').prop('disabled', false);
              $('#usersucc').hide();
              $('#usererror').hide();
              $('#validerror').show();
            } 
            }});
            
        });
        ///////////////////////
        $("#email").on('keyup', function(){
            var email = $("#email").val();
            $('.cracker_register').prop('disabled', true);
            var xurl = "<?php echo base_url();?>register/checkemail/?email="+email;
            $.ajax({url: xurl, success: function(result){
            
            // alert(data);
            if(result == 'available')
            {
              $('.cracker_register').prop('disabled', false);
              $('#emailsucc').show();
              $('#emailerror').hide();
              $('#validerr').hide();
            }
            if(result == 'notavailable')
            {
              $('.cracker_register').prop('disabled', true);
              $('#emailerror').show();
              $('#emailsucc').hide();
              $('#validerr').hide();
            }
             if(result == 'notvalid')
            {
              $('.cracker_register').prop('disabled', false);
              $('#emailsucc').hide();
              $('#emailerror').hide();
              $('#validerr').show();
            }
            },
            error: function(xmlerr){

            }
            });
        });
		setTimeout(function() {

		$('.recaptcha').each(function() {
		grecaptcha.render(this.id, {
		'sitekey': '6LdVkwkUAAAAACeeETRX--v9Js0vWyjQOTIZxxeB',
		"theme":"light",
		"width":"100%",

		});
		});

		}, 1000);
        });
</script>
<script>
  (function ( $ ) {
  var elActive = '';
    $.fn.selectCF = function( options ) {
 
        // option
        var settings = $.extend({
            color: "#FFF", // color
            backgroundColor: "#50C9AD", // background
      change: function( ){ }, // event change
        }, options );
 
        return this.each(function(){
      
      var selectParent = $(this);
        list = [],
        html = '';
        
      //parameter CSS
      var width = $(selectParent).width();
      
      $(selectParent).hide();
      if( $(selectParent).children('option').length == 0 ){ return; }
      $(selectParent).children('option').each(function(){
        if( $(this).is(':selected') ){ s = 1; title = $(this).text(); }else{ s = 0; }
        list.push({ 
          value: $(this).attr('value'),
          text: $(this).text(),
          selected: s,
        })
      })
      
      // style
      var style = " background: "+settings.backgroundColor+"; color: "+settings.color+" ";
      
      html += "<ul class='selectCF'>";
      html +=   "<li>";
      // html +=     "<span class='arrowCF ion-chevron-right' style='"+style+"'></span>";
      html +=     "<span class='titleCF' style='"+style+"; width:"+width+"px'>"+title+"</span>";
      // html +=     "<span class='searchCF' style='"+style+"; width:"+width+"px'><input style='color:"+settings.color+"' /></span>";
      html +=     "<ul>";
      $.each(list, function(k, v){ s = (v.selected == 1)? "selected":"";
      html +=       "<li value="+v.value+" class='"+s+"'>"+v.text+"</li>";})    
      html +=     "</ul>";
      html +=   "</li>";
      html += "</ul>";
      $(selectParent).after(html);
      var customSelect = $(this).next('ul.selectCF'); // add Html
      var seachEl = $(this).next('ul.selectCF').children('li').children('.searchCF');
      var seachElOption = $(this).next('ul.selectCF').children('li').children('ul').children('li');
      var seachElInput = $(this).next('ul.selectCF').children('li').children('.searchCF').children('input');
      
      // handle active select
      $(customSelect).unbind('click').bind('click',function(e){
        e.stopPropagation();
        if($(this).hasClass('onCF')){ 
          elActive = ''; 
          $(this).removeClass('onCF');
          $(this).removeClass('searchActive'); $(seachElInput).val(''); 
          $(seachElOption).show();
        }else{
          if(elActive != ''){ 
            $(elActive).removeClass('onCF'); 
            $(elActive).removeClass('searchActive'); $(seachElInput).val('');
            $(seachElOption).show();
          }
          elActive = $(this);
          $(this).addClass('onCF');
          $(seachEl).children('input').focus();
        }
      })
      
      // handle choose option
      var optionSelect = $(customSelect).children('li').children('ul').children('li');
      $(optionSelect).bind('click', function(e){
        var value = $(this).attr('value');
        if( $(this).hasClass('selected') ){
          //
        }else{
          $(optionSelect).removeClass('selected');
          $(this).addClass('selected');
          $(customSelect).children('li').children('.titleCF').html($(this).html());
          $(selectParent).val(value);
          settings.change.call(selectParent); // call event change
        }
      })
        
      // handle search 
      $(seachEl).children('input').bind('keyup', function(e){
        var value = $(this).val();
        if( value ){
          $(customSelect).addClass('searchActive');
          $(seachElOption).each(function(){
            if( $(this).text().search(new RegExp(value, "i")) < 0 ) {
              // not item
              $(this).fadeOut();
            }else{
              // have item
              $(this).fadeIn();
            }
          })
        }else{
          $(customSelect).removeClass('searchActive');
          $(seachElOption).fadeIn();
        }
      })
      
    });
    };
  $(document).click(function(){
    if(elActive != ''){
      $(elActive).removeClass('onCF');
      $(elActive).removeClass('searchActive');
    }
  })
}( jQuery ));

$(function(){
  var event_change = $('#event-change');
  $( ".select" ).selectCF({
    change: function(){
      var value = $(this).val();
      var text = $(this).children('option:selected').html();
      console.log(value+' : '+text);
      event_change.html(value+' : '+text);
    }
  });
  $( ".test" ).selectCF({
    color: "#FFF",
    backgroundColor: "#663052",
  });
})
jQuery('#userlocation').select2({
      
        ajax: {
          url: '<?php echo base_url();?>register/replacelocation',
          dataType: 'json',
          minimumInputLength: 3,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
</script>