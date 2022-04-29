<script src="<?php echo base_url();?>fontassets/js/ad-your-post.js "></script>
<script src="https://crackerclassifieds.com/style/assets2/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<?php
$lo=$this->db->get_where('api_det',array('id'=>'1'))->row();
?>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=<?=$lo->loc_key;?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=$lo->loc_key;?>&libraries=places&callback=initAutocomplete"
    async defer></script> -->
<script type="text/javascript">
$(document).ready(function() { 
$(".mdb-select").select2({

});
});
</script>
<script>
    $(document).ready(function(){

      setTimeout(function(){
        if(!$.cookie('modalShown')) {
          $("#PostadopenModal").modal('show');
          $.cookie('modalShown', true);
        } 
        

      },1000);

    });
</script>
<script type="text/javascript">
     $(document).ready(function(){
      
              
        $("#category_id").on('change', function(){
            
            var catgry = $("#category_id").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>postad/replacesubcategory/?ctgry="+catgry;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                                
                    $("#subcategory_id").html(result);
                
                }});
        }) ;
        ////////////////////
        //////////////////////////////////
       $("#subcategory_id").on('change', function(){
            
            var catgry = $("#subcategory_id").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>postad/replacesubsubcategory/?subct="+catgry;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                             

                    $("#sub_sub_category").html(result);
                
                }});
        }) ;
        //////////////////////////////////
       // $("#subcategory_id").on('change', function(){
            
       //      var catgry = $("#subcategory_id").val();
       //      //alert(catgry);
                
       //      var xurl = "<?php// echo base_url();?>postad/replaceadditional/?cat="+catgry;
       //      //alert(xurl);
                
       //          $.ajax({url: xurl, success: function(result){
                             
       //              $("#showadditional").show();
       //              $("#showadditional").html(result);
                
       //          }});
       //  }) ;
        $("#category_id").on('change', function(){
            
            var catgry = $("#category_id").val();
            //alert(catgry);
           if(catgry==5)
           {
            $('#class_additional').show();
            $('#comm_additional').hide();
            $('#event_additional').hide();
            $('#forsale_additional').hide();
            $('#jobs_additional').hide();
            $('#personal_additional').hide();
            $('#realestate_additional').hide();
            $('#service_additional').hide();
            $('#vehicle_additional').hide();

           }
            if(catgry==6)
           {
            $('#class_additional').hide();
            $('#comm_additional').show();
            $('#event_additional').hide();
            $('#forsale_additional').hide();
            $('#jobs_additional').hide();
            $('#personal_additional').hide();
            $('#realestate_additional').hide();
            $('#service_additional').hide();
            $('#vehicle_additional').hide();

           }
            if(catgry==7)
           {
            $('#class_additional').hide();
            $('#comm_additional').hide();
            $('#event_additional').show();
            $('#forsale_additional').hide();
            $('#jobs_additional').hide();
            $('#personal_additional').hide();
            $('#realestate_additional').hide();
            $('#service_additional').hide();
            $('#vehicle_additional').hide();

           }
            if(catgry==8)
           {
            $('#class_additional').hide();
            $('#comm_additional').hide();
            $('#event_additional').hide();
            $('#forsale_additional').show();
            $('#jobs_additional').hide();
            $('#personal_additional').hide();
            $('#realestate_additional').hide();
            $('#service_additional').hide();
            $('#vehicle_additional').hide();

           }
            if(catgry==9)
           {
            $('#class_additional').hide();
            $('#comm_additional').hide();
            $('#event_additional').hide();
            $('#forsale_additional').hide();
            $('#jobs_additional').show();
            $('#personal_additional').hide();
            $('#realestate_additional').hide();
            $('#service_additional').hide();
            $('#vehicle_additional').hide();

           }
            if(catgry==10)
           {
            $('#class_additional').hide();
            $('#comm_additional').hide();
            $('#event_additional').hide();
            $('#forsale_additional').hide();
            $('#jobs_additional').hide();
            $('#personal_additional').show();
            $('#realestate_additional').hide();
            $('#service_additional').hide();
            $('#vehicle_additional').hide();

           }
            if(catgry==11)
           {
            $('#class_additional').hide();
            $('#comm_additional').hide();
            $('#event_additional').hide();
            $('#forsale_additional').hide();
            $('#jobs_additional').hide();
            $('#personal_additional').hide();
            $('#realestate_additional').show();
            $('#service_additional').hide();
            $('#vehicle_additional').hide();

           }
            if(catgry==12)
           {
            $('#class_additional').hide();
            $('#comm_additional').hide();
            $('#event_additional').hide();
            $('#forsale_additional').hide();
            $('#jobs_additional').hide();
            $('#personal_additional').hide();
            $('#realestate_additional').hide();
            $('#service_additional').show();
            $('#vehicle_additional').hide();

           }
            if(catgry==14)
           {
            $('#class_additional').hide();
            $('#comm_additional').hide();
            $('#event_additional').hide();
            $('#forsale_additional').hide();
            $('#jobs_additional').hide();
            $('#personal_additional').hide();
            $('#realestate_additional').hide();
            $('#service_additional').hide();
            $('#vehicle_additional').show();

           }
        }) ;

    });
</script>
<script>
google.maps.event.addDomListener(window, 'load', function () 
{
  var places = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
  
  google.maps.event.addListener(places, 'place_changed', function () 
  {
    console.log(places.getPlace());
    var getaddress    = places.getPlace();        //alert(getaddress.address_components[0].long_name);
    var whole_address = getaddress.address_components;  //alert(whole_address + 'whole_address');   
    $('#ownCity').val('');
    $('#ownState').val('');
    $('#ownCountry').val('');
    $('#ownPinCode').val('');
    
    $.each(whole_address, function(key1, value1) 
    {
      //alert(value1.long_name);
      //alert(value1.types[0]);
      
      
      if((value1.types[0]) == 'locality')
      {
        var prev_long_name_city = value1.long_name;  
        //alert(prev_long_name_city + '__prev_long_name_city');
        $('#ownCity').val(prev_long_name_city);
      }
      
      
      if((value1.types[0]) == 'administrative_area_level_1')
      {
        var prev_long_name_state = value1.long_name;  
        //alert(prev_long_name_state + '__prev_long_name_state');
        $('#ownState').val(prev_long_name_state);
      }
      
      if((value1.types[0]) == 'country')
      {
        var prev_long_name_country = value1.long_name;  
        //alert(prev_long_name_country + '__prev_long_name_country');
        $('#ownCountry').val(prev_long_name_country);
      }
      
      if((value1.types[0]) == 'postal_code')
      {
        var prev_long_name_pincode = value1.long_name;  
        //alert(prev_long_name_pincode + '__prev_long_name_pincode');
        $('#ownPinCode').val(prev_long_name_pincode);
      }

    }); 
    
  });
});
</script>
<script>
   
    var placeSearch, autocomplete;

    var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
    };

    function initAutocomplete() {
    // Create the autocomplete object, restricting the search predictions to
    // geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
    document.getElementById('autocomplete'), {types: ['geocode']});

    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components.
    autocomplete.setFields(['address_component']);

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    document.getElementById('latitude').value = place.geometry.location.lat();
    document.getElementById('longitude').value = place.geometry.location.lng();

    for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
    var val = place.address_components[i][componentForm[addressType]];
    document.getElementById(addressType).value = val;

    }
    }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
    var geolocation = {
    lat: position.coords.latitude,
    lng: position.coords.longitude
    };
    //alert(position.coords.latitude);
    //alert(position.coords.longitude);
    //alert(position.coords.accuracy);
    var latt=position.coords.latitude;
    var lan=position.coords.longitude;
    // document.cookie ="latt="+position.coords.latitude
    //document.cookie="lan="+position.coords.longitude

    var circle = new google.maps.Circle(
    {center: geolocation, radius: position.coords.accuracy});
    autocomplete.setBounds(circle.getBounds());

    var latFl = document.querySelector('.lat-field');
    var lanFl = document.querySelector('.lan-field');


    latFl.value = latt;
    lanFl.value = lan;
    });
    }
    }


</script>
<script type="text/javascript">
$(document).ready(function() {
  
  $("#autocomplete").change(function() {
    var add=$("#autocomplete").val();
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
      "address" : $("#autocomplete").val()
    }, function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
        $("#lat").val(results[0].geometry.location.lat().toFixed(6));
        $("#lng").val(results[0].geometry.location.lng().toFixed(6));
        // $("#autocomplete").val(add);
        return true;
      } else {
        // alert("Please enter correct place name");
        return false;
      }
    });
    
  });
});
    </script>