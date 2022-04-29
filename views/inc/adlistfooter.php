 <script src="<?php echo base_url();?>fontassets/slick/slick/slick.min.js"></script>
 <script src="<?php echo base_url();?>fontassets/js/home.js"></script>
<script src="<?php echo base_url();?>fontassets/js/category.js"></script>

<?php
$lo=$this->db->get_where('api_det',array('id'=>'1'))->row();
?>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=<?=$lo->loc_key;?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=$lo->loc_key;?>&libraries=places&callback=initAutocomplete"
    async defer></script>
 -->
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

    // var latFl = document.querySelector('.lat-field');
    // var lanFl = document.querySelector('.lan-field');


    // latFl.value = latt;
    // lanFl.value = lan;
    });
    }
    }

    
      $('.fa-heart-o').on('click',function(){
            
            var id = this.id;
            var split_id = id.split("_");
            var ad_id = split_id[1];

            // Remove <div> with id
            // alert(ad_id);
            var xurl = "<?php echo base_url();?>favourite/addfavourite?ad_id="+ad_id;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                    swal({
                    title: "Success",
                    text: "This Ad Added In Your Favourite Ad",
                    icon: "success",
                    button: "Ok",
                    });
                   $('#fav_'+ad_id).show();
                   $('#favourite_'+ad_id).hide();
                }});
        }) ;
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
     var address = getaddress.formatted_address;
     // alert(address);
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
  
    $('#lat').attr('value', results[0].geometry.location.lat().toFixed(6));
    $('#lng').attr('value', results[0].geometry.location.lng().toFixed(6));
    
    } 

    else {
    alert("Geocode was not successful for the following reason: " + status);
    return false;
    }
    }); 
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
<script type="text/javascript">
 
   $('#spl-slider-1').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
    ]
});
</script>
<script>
 $(document).ready(function(){
  // $(".adimage").each(function() {  
  //   // alert('Hi');
  //   var id = this.id;
  //   var split_id = id.split("_");
  //   var index = split_id[1];
  //   var xurl = "<?php echo base_url();?>home/showadimage/?id="+index;
  //   //alert(xurl);

  //   $.ajax({url: xurl, success: function(result){
  //   // alert(result);
  //    // alert(split_id[0]);
  //    $("#"+split_id[0]+"_"+index).attr("src",result);

  //   }});
  // });
  
 });
</script>