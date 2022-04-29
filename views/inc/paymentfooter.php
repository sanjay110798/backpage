<?php
$uuid = '5da5272d763e9';
$apiKey = '4gxddoda';
$passphrase = 'j5u9ewzy'; 
?>

<script src='https://secure.merchantwarrior.com/payframe/payframe.js'></script>

<script>
  
    
  var method = 'getPayframeToken'; // change this to getPayframeToken for payment payframe
  var threeDS = false; // this will only work with the getPayframeToken method
  var style = {
    fontFamily: 'Open Sans, sans-serif',
    fontSrc: ['https://fonts.googleapis.com/css?family=Open+Sans'],
    width:'100%',
  };
  var uuid = '5da5272d763e9';
  var apiKey = '4gxddoda';
  var acceptedCardTypes = "visa, Diners Club, mastercard, Amex";

  var submitURL = 'https://api.merchantwarrior.com/payframe/';
  var mwPayframe = new payframe(uuid, apiKey, 'cardData', 'https://secure.merchantwarrior.com/payframe/', submitURL, style, method, acceptedCardTypes);
  mwPayframe.mwCallback = function() {
    //Example of success and error scenarios below
    if (threeDS) {
      processResponseEvent(method, arguments, tdsCheck);
    } else {
      processResponseEvent(method, arguments);
    }
  };

  function submitFrame() {
    //alert('xxx');
    // Disable the button to stop double submissions
    button.setAttribute('disabled', 'disabled');
    button.innerHTML = "Please wait.."
    button.style.opacity = '0.5';
    button.filter = 'alpha(opacity=50)'; // IE8 fallback

    mwPayframe.submitPayframe(this)
  }

  function resetFrame(error_only) {
    if (threeDS && !error_only) {
      tdsCheck.destroy();
      mwPayframe.deploy();
    } else if (!error_only) {
      mwPayframe.reset();
    }

  // Enable the button
  button.removeAttribute('disabled');
  button.innerHTML = 'Submit';
  button.style.opacity = '1';

}

mwPayframe.loading = function() {
  var mwIframe = document.getElementById("mwIframe");
  var cardDiv = document.getElementById("cardData");

  // Hide the payframe during load operations
  mwIframe.style.visibility =='hidden';

  // Assign the parent div the same dimensions as the payframe
  var height = mwIframe.height;
  var width = mwIframe.width;

  cardDiv.style.height = height;
   cardDiv.style.width = width;

  // Place a loading animation in the center of the payframe
  cardDiv.style.background = "url('https://secure.merchantwarrior.com/inc/image/loading_gif.gif') center center no-repeat";
};

mwPayframe.loaded = function() {
  button.style.visibility = "visible";
  var mwIframe = document.getElementById("mwIframe");
  var cardDiv = document.getElementById("cardData");
  // Remove the loading animation after the payframe has completed its operations and display the payframe
  cardDiv.style.background = 'none';
  if (mwIframe) {
    mwIframe.style.visibility = 'visible';
  }
}

if (threeDS) {
  var tdsCheck = new tdsCheck(uuid, apiKey, 'cardData', submitURL);
  tdsCheck.link(mwPayframe);
}

function processResponseEvent(method, arguments, tdsCheck) {
  var responseCode = mwPayframe.responseCode;
  var responseMessage = mwPayframe.responseMessage;

  if (method == 'addCard') {
    var cardID = arguments[0];

    if (cardID && cardID != 'NO_TOKEN') {
      button.style.visibility = 'hidden';
      Swal.fire({
        title: 'Success',
        html: 'cardID returned is <strong>' + cardID + '</strong>',
        type: 'success',
        footer: '<span>You should submit the cardID to your server and use the <a href="https://dox.merchantwarrior.com/#processcard21">processCard</a> method to complete the transaction from your server</span>'
      }).then((result) => {
        if (result.value) {
          resetFrame();
        }
      })
    } else {
      Swal.fire({
        title: 'Error',
        html: 'cardID returned is <strong>' + cardID + '</strong>',
        type: 'error',
        footer: '<span><a href="https://dox.merchantwarrior.com/#response-codes">(' + responseCode + ') ' + responseMessage + '</a></span>',
      }).then((result) => {
        if (result.value) {
          resetFrame(1);
        }
      })
    }
  } else {
    var status = arguments[0];
    var payframeToken = arguments[1];
    var payframeKey = arguments[2];

    if (status == 'HAS_TOKEN') {
      if (tdsCheck) {
        // Hard coded values used as an example for tdsCheck - payframeToken, payframeKey, transactionAmount, transactionCurrency, transactionProduct
        tdsCheck.checkTDS(mwPayframe.payframeToken, mwPayframe.payframeKey, mwPayframe.transactionAmount, mwPayframe.transactionCurrency, mwPayframe.transactionProduct);
        tdsCheck.mwCallback = function(liabilityShifted, threeDSToken) {
          button.style.visibility = 'hidden';

          Swal.fire({
            title: 'Success',
            html: 'The payframeToken returned is <strong>' + payframeToken + '</strong><br/> payframeKey returned is <strong>' + payframeKey + '</strong><br/> threeDSToken returned is <strong>' + threeDSToken + '</strong><br/> Liability shifted is <strong>' + liabilityShifted + '</strong>',
            type: 'success',
            footer: '<span>You should submit the payframeToken, payframeKey and threeDSToken to your server and use the <a href="https://dox.merchantwarrior.com/#processcard31">processCard</a> method to complete the transaction from your server</span>'
          }).then((result) => {
            if (result.value) {
              resetFrame();
            }
          })
        }
      } else {
        button.style.visibility = 'hidden';

        var transactionAmount = document.getElementById('transactionAmount').value;
        var transactionCurrency = document.getElementById('transactionCurrency').value;

        var merchantUUID = document.getElementById('merchantUUID').value;
        

        document.getElementById('payframeToken').value = payframeToken;
        document.getElementById('payframeKey').value = payframeKey;

        // var parts =  (CryptoJS.MD5(passphrase)+merchantUUID+transactionAmount+transactionCurrency).toLowerCase();
        // var hash = CryptoJS.MD5(parts);
        // document.getElementById("hash").value = hash;

        document.getElementById('frmsubmit').style.display='block';
        document.getElementById('cardData').style.display = 'none';

      }
    } else {
      Swal.fire({
        title: 'Error',
        html: 'status returned is <strong>' + status + '</strong>',
        type: 'error',
        footer: '',
      }).then((result) => {
        if (result.value) {
          resetFrame(1);
        }
      })
    }
  }
}

mwPayframe.deploy();

// Define variables
var button = document.getElementById("submitButton");



</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfptXKFVNE6Na8i8MMMj0anrmHmq6IYOg&libraries=places&callback=initAutocomplete"
    async defer></script> -->
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