<script src="<?php echo base_url();?>fontassets/js/login.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

      ///////////////////
      $('#google_sign').on('click',function(){
        // alert("hi");
       $('.abcRioButtonContentWrapper').click();
      });
    
      // ////////////
      
        // /////////////
        });
</script>

<script>
    
    function onSignIn(googleUser) {
    // Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());

    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;
    console.log("ID Token: " + id_token);

    var email = profile.getEmail();
    // alert("My favourite sports are: " + days);
    var g_name=profile.getGivenName();
    var name=profile.getName();

    $.ajax({
    url:'<?php echo base_url();?>authentication/oauth2callback',
    type:'post',
    data:{email:email,name:name},
    success:function(data)
    {
    if(data=="profile")
    {
    var url="<?php echo base_url('profile')?>";
    window.location.href=url;
    }
    if(data=="editprofile")
    {
    var url="<?php echo base_url('profile/edit?google==1')?>";
    window.location.href=url;
    }
    }
    });
    }
    function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    console.log('User signed out.');
    
    });
    }
   
    </script>
    
</body>

</html>