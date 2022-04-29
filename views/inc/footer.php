   <footer>
        <div class="footer-content">
            <div class="container">
                <div class="main-footer-sec">
                    <div class="row">
                       <div class="col-md-3 col-sm-6">
                            <div class="information-links">
                                <h6>Information</h6>
                                <ul>
                                    <li><a href="<?php echo base_url();?>about">About Us</a></li>
                                    <li><a href="<?php echo base_url();?>terms">Terms of Use</a></li>
                                    <li><a href="<?php echo base_url();?>policy">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                       <div class="col-md-3 col-sm-6">
                            <div class="features-links">
                                <h6>Features</h6>
                                <ul>
                                    <li><?php if ($this->session->userdata('login_id')=='') {?>
                                    <a href="<?=base_url('authentication?loginerr==0');?>">
                                    <?php } else{?><a href="<?=base_url('myads');?>"><?php } ?>Promote your ad</a></li>
                                    <li><?php if ($this->session->userdata('login_id')=='') {?>
                                    <a href="<?=base_url('authentication?loginerr==0');?>">
                                    <?php } else{?><a href="<?=base_url('buycredit');?>"><?php } ?>Premium Account</a></li>
                                    <li><?php if ($this->session->userdata('login_id')=='') {?>
                                    <a href="<?=base_url('authentication?loginfirst==1');?>">
                                    <?php } else{?><a href="<?=base_url('postad');?>"><?php } ?>Advertise on CrackerClassifieds</a></li>
                                </ul>
                            </div>
                        </div>
                       <div class="col-md-3 col-sm-6">
                            <div class="service-links">
                                <h6>Services</h6>
                                <ul>
                                    <li><a href="<?php echo base_url();?>contact">Contact & Feedback</a></li>
                                    <li><a href="<?php echo base_url();?>faq">Help/FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                       <div class="col-md-3 col-sm-6">
                            <div class="social-links">
                                <h6>Stay connected</h6>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/crackerclassifiedsads"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="row">
                        <p>©copyright <?=date('Y')?>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- bootstrap-link -->
   <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
    <!-- <script src="<?php echo base_url();?>fontassets/bootstrap/js/jquery.min.js"></script> -->
    
    <script  src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script  src="<?php echo base_url();?>fontassets/bootstrap/js/bootstrap.min.js"></script>
    <!-- slik-slider-link -->
  
    <!-- custom-script -->
    <script  src="<?php echo base_url();?>fontassets/js/header.js"></script>
      
    <!-- //////////////////////Translater//////////////////////////////// -->
    <div id="google_translate_element2"></div>
    <script  type="text/javascript">
    function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    <script type="text/javascript">
    /* <![CDATA[ */
    eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
    /* ]]> */
    </script>
    <script>
    $(window).on('load', function() {
       $('#goog-gt-tt').html('<div class=""></div>');
    });
    </script>
    <?php if($this->session->flashdata('err')){?>
    <script>
    swal({
    title: "Error",
    text: "<?php echo $this->session->flashdata('err');?>",
    icon: "error",
    button: "Ok",
    });
    </script>
    <?php } ?>
    <?php if($this->input->get('loginfirst')){?>
    <script>
    swal({
    title: "Error",
    text: "Login First For Post ad",
    icon: "error",
    button: "Ok",
    });
    </script>
    <?php } ?>
    <?php if($this->input->get('google')){?>
    <script>
    swal({
    title: "Success",
    text: "Please Give Your Full Information",
    icon: "success",
    button: "Ok",
    });
    </script>
    <?php } ?>
    <?php if($this->input->get('loginerr')){?>
    <script>
    swal({
    title: "Error",
    text: "Login First For Access",
    icon: "error",
    button: "Ok",
    });
    </script>
    <?php } ?>
    <?php if($this->input->get('aderror')){?>
    <script>
    swal({
    title: "Error",
    text: "<?php echo $this->session->flashdata('err');?>",
    icon: "error",
    button: "Ok",
    });
    </script>
    <?php } ?>
    <?php if($this->session->flashdata('succ')){?>
    <script>
    swal({
    title: "Success",
    text: "<?php echo $this->session->flashdata('succ');?>",
    icon: "success",
    button: "Ok",
    });
    </script>
    <?php } ?>
    
<script type="text/javascript">
  // $(document).on('keyup', '.select2-search__field', function (e) {    

  //           var tst=$(this).val();
  //           // alert(tst);
  //           $.ajax({
  //           url: "<?=base_url();?>home/getLocation",
  //           type: 'post',
  //           data: {tst:tst},
  //           success:function(result)
  //           {
  //             // alert(html);
  //             $('.middleselect').append(result);
              
  //           }
  //           });
          
  //         });
    $(document).ready(function() {
    $('#not_possible').on('click',function(){
     swal({
    title: "Error",
    text: "Sorry! You Have No Enough Credit",
    icon: "error",
    button: "Ok",
    });
    });
    /////////////
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms, 5 second for example
    var $input = $('#location');

    //on keyup, start the countdown
    $input.on('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function () {
    clearTimeout(typingTimer);
    });
    function doneTyping () {
    var location = $("#location").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>home/makeLoc/?location="+location;
            //alert(xurl);
                $('.locationsearch').remove();
                $.ajax({url: xurl, success: function(result){
                if(result)
                {
                  // alert(result);
                  $("#showlooc").html(result);
                 
                }                 
                }
            });
    }

    var typingTimer2;                //timer identifier
    var doneTypingInterval2 = 500;  //time in ms, 5 second for example
    var $input2 = $('#location2');

    //on keyup, start the countdown
    $input2.on('keyup', function () {
    clearTimeout(typingTimer2);
    typingTimer2 = setTimeout(doneTyping2, doneTypingInterval2);
    });

    //on keydown, clear the countdown 
    $input2.on('keydown', function () {
    clearTimeout(typingTimer2);
    });
    function doneTyping2 () {
    var location2 = $("#location2").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>home/makeLoc2/?location="+location2;
            //alert(xurl);
                $('.locationsearch').remove();
                $.ajax({url: xurl, success: function(result){
                if(result)
                {
                  // alert(result);
                  $("#showlooc").html(result);
                 
                }                 
                }
            });
    }

    $("#location").on('click',function(){
    $('.locationsearch').slideToggle();
    });
    $("#location2").on('click',function(){
    $('.locationsearch').slideToggle();
    });
    $('body').on('click','.listItem', function(){
        var itm=$(this).data('item');
        // alert(itm);
    $('.locationsearch').fadeOut();
    $('#location').val(itm);
    $('#location').attr('value',itm);
    $('#location2').val(itm);
    $('#location2').attr('value',itm);
    });
    $("#country").on('change', function(){
            
            var country = $("#country").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>admin/user/replacestate/?country="+country;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                               
                    $("#state").html(result);
                
                }})
                ;
        }) ;

     $("#session_country").on('change', function(){
            
            var country = $("#session_country").val();
            //alert(catgry);
                
            var xurl = "<?php echo base_url();?>home/setcountry/?country="+country;
            //alert(xurl);
                
                $.ajax({url: xurl, success: function(result){
                if(result)
                {
                var url=window.location.href;
                location.reload(true);
                }                 
                }
            });
        }) ;

        // /////////////
        $(".search-categorie").on('click', function(){
            // alert("hii");
        $(".location").show();
        $(".distance").show();
        $(".find").show();
        // $("#adv_search").text('Hide');    
        }) ;
        });
    
</script>

<script>

function showpass()
{
var y = document.getElementById("password");

if (y.type === "password") 
{
y.type = "text";
} else {
y.type = "password";
}

}
function showpass2()
{
var y = document.getElementById("confirm_password");

if (y.type === "password") 
{
y.type = "text";
} else {
y.type = "password";
}

}
function Validate() {
var password = document.getElementById("password").value;
var confirmPassword = document.getElementById("confirm_password").value;
var email = document.getElementById("email").value;
var email2 = document.getElementById("con_email").value;
if (email != email2) {
swal("Sorry!!", "Email and Confirm Email Does not match!");
return false;
}
if (password != confirmPassword) {
swal("Sorry!!", "Password and Confirm Password Does not match!");
return false;
}

return true;
}
 function del()
    {

    if (confirm('Are you sure you want to delete your Post?'))
    {
    return true;
    }
    else
    {
    return false;
    }
    }
</script>

<script>
    $('#owl-carousel').owlCarousel({
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        margin: 15,
        loop: true,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: false,
                loop: true
            },
            768: {
                items: 3,
                nav: true
            },
            992: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    })

</script>
<!--accordion-2-->
<!-- <script>
    /* jQuery
================================================== */
    $(function() {
        $('.acc__title2').click(function(j) {

            var dropDown = $(this).closest('.acc__card2').find('.acc__panel2');
            $(this).closest('.acc2').find('.acc__panel2').not(dropDown).slideUp();

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).closest('.acc2').find('.acc__title2.active').removeClass('active');
                $(this).addClass('active');
            }

            dropDown.stop(false, true).slideToggle();
            j.preventDefault();
        });
    });

</script>

<script>
    /* jQuery
================================================== */
    $(function() {
        $('.acc__title').click(function(j) {

            var dropDown = $(this).closest('.acc__card').find('.acc__panel');
            $(this).closest('.acc').find('.acc__panel').not(dropDown).slideUp();

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).closest('.acc').find('.acc__title.active').removeClass('active');
                $(this).addClass('active');
            }

            dropDown.stop(false, true).slideToggle();
            j.preventDefault();
        });
    });

</script> -->
<script>
  function toggleStateList(id)
  {
    // alert(id);
    var x = document.getElementById(id);
    // alert(x);
    if (x.style.display === "none") {
    x.style.display = "block";
    } else {
    x.style.display = "none";
    }
  }

</script>
    <style type="text/css">

.base {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: -10px;
    width: 98%;
    height: 90px;
    overflow: hidden;
    background: #fff;
    border-radius: 0px;
    box-shadow: 2px 1px 12px;
}
.base2 {
    
    position: absolute;
    margin: auto;
    top: 0;
    right: -10px!important;
    bottom: 0;
    left: 0px;
    width: 98%;
    height: 90px;
    overflow: hidden;
    background: #fff;
    border-radius: 0px;
    box-shadow: 2px 1px 12px;
  
}
/*.select-location-sec2{
    padding: 40px 0;
}*/


.long {
  height: 470%;
  transform: rotate(-3deg);
  position: absolute;
  top: -210px;
  left: -10px;
  animation: long 0.4s ease-in-out infinite;
  animation-direction: alternate-reverse;
}

.title {
  position: absolute;
  height: 70%;
  left: 10px;
  top: 15px;
  filter: drop-shadow(0px 0px 10px #000);
  z-index: 1;
  animation: t 10s ease-in-out infinite;
}

.spin2 {
  position: absolute;
  animation: spin2 10s linear infinite;
}

.spinner:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 25px;
  left: -60px;
  width: 40px;
  height: 40px;
  filter: blur(50%);
  border-radius: 100%;
  border: 10px solid blue;
  border-top-color: blue;
  border-bottom-color: red;
  animation: spinner 0.4s linear infinite;
  animation-direction: alternate-reverse;
  filter: blur(30px) brightness(15);
}

.slid1 {
  position: absolute;
  background-color: white;
  height: 300px;
  width: 800px;
  top: -100px;
  left: -10px;
  transform: rotate(10deg);
  z-index: 2;
  animation: s1 10s ease infinite;
}

.but {
  color: white;
  position: absolute;
  top: 40px;
  left: 350px;
  height: 35px;
  width: 180px;
  border: none;
  border-radius: 6px;
  outline: none;
  background: linear-gradient(45deg, #a6075b, #fe0034, #fe0034);
  box-shadow: 0px 0px 20px 0.5px #000;
  cursor: pointer;
  font-family: "Raleway", sans-serif;
  font-size: 20px;
  animation: b 2s linear infinite;
  z-index: 1;
}

.butd {
  position: absolute;
  animation: butd 10s ease-in-out infinite;
}

/*a:link,
a:visited {
  color: azure;
  text-decoration: none;
}*/

.ea {
  position: absolute;
  height: 70%;
  top: 13px;
  left: 320px;
  z-index: 3;
  animation: ea 10s ease infinite;
}

.ps {
  position: absolute;
  height: 100%;
  left: 1700px;
  z-index: 3;
  animation: ps 10s ease-in-out infinite;
}

.x {
  position: absolute;
  height: 70%;
  top: 11.5px;
  left: 1700px;
  z-index: 3;
  animation: x 10s ease-in-out infinite;
}

.h2 {
  position: absolute;
  height: 300px;
  width: 180px;
  top: -100px;
  left: 800px;
  background: linear-gradient(45deg, #a6075b, #fe0034, #fe0034);
  transform: rotate(10deg);
  z-index: 6;
  animation: h2 10s ease-in-out infinite;
}

.h1 {
  color: white;
  position: absolute;
  text-align: center;
  top: 100px;
  left: 10px;
  padding-top: 20px;
  height: 90px;
  width: 160px;
  border: none;
  outline: none;
  font-size: 20px;
  font-family: "Raleway", sans-serif;
  font-weight: bolder;
  animation: h 10s ease-in-out infinite;
  transform: rotate(-10deg);
  z-index: 6;
}

@keyframes h2 {
  30% {
    left: 1500px;
  }

  70% {
    left: 558px;
  }

  90% {
    left: 558px;
  }

  99% {
    left: 1500px;
  }
}

@keyframes ps {
  30% {
    left: 1500px;
  }

  60% {
    left: 385px;
  }

  90% {
    left: 385px;
  }

  99% {
    left: 1500px;
  }
}

@keyframes x {
  30% {
    left: 1700px;
  }

  65% {
    left: 475px;
  }

  89% {
    left: 475px;
  }

  99% {
    left: 1700px;
  }
}

@keyframes t {
  0% {
    left: 800px;
  }

  20% {
    left: 5px;
  }

  21% {
    left: 10px;
  }
}

@keyframes butd {
  0% {
    top: 500px;
  }

  20% {
    top: 0px;
  }
}

@keyframes b {
  0% {
    transform: rotate(0deg);
  }

  10% {
    transform: rotate(0deg);
  }

  20% {
    transform: rotate(0deg);
  }

  30% {
    transform: rotate(0deg);
  }

  40% {
    transform: rotate(1deg);
  }

  50% {
    transform: rotate(-1deg);
  }

  60% {
    transform: rotate(1deg);
  }

  70% {
    transform: rotate(0deg);
  }

  80% {
    transform: rotate(0deg);
  }

  90% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(0deg);
  }
}

@keyframes ea {
  0% {
    left: 320px;
  }

  30% {
    left: 1500px;
  }

  60% {
    left: 320px;
  }
}

@keyframes s1 {
  0% {
    left: -5px;
  }

  30% {
    left: 1500px;
  }

  55% {
    left: 300px;
  }

  90% {
    left: 300px;
  }
}

@keyframes long {
  0% {
    left: -12px;
    top: -212px;
  }

  50% {
    left: -13px;
    top: -210px;
  }
}

@keyframes spin2 {
  0% {
    left: -60px;
  }

  25% {
    left: -60px;
  }

  30% {
    left: 120px;
  }

  80% {
    left: 120px;
  }

  99% {
    left: 120px;
  }
}

@keyframes spinner {
  0% {
    opacity: 0;
  }

  50% {
    transform: rotate(360deg);
  }
}
.fixed-header .post-ad a {
            padding: 6px 3px 6px 3px;
        }

        .fixed-header .header-info li {
            padding: 3px 4px;
        }

        @media only screen and (max-width:1199px) and (min-width:992px) {
            .but {
                color: white;
                left: 280px;
                top: 36px;
            }

            .ea {
                left: 260px;
                top: 15px;
            }

            @keyframes ea {
                0% {
                    left: 260px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 260px;
                }

                .h2 {
                    display: none;
                }
            }

            .slid1 {
                height: 800px;
                width: 800px;
                top: -580px;
            }

        }



        @media only screen and (max-width: 991px) and (min-width: 768px) {
            .home-banner .categories-filter ul li {
                min-width: 69px !important;
                flex: unset;
            }
        }

        @media only screen and (max-width:991px) {
            .h2 {
                display: none;
            }

            .base {
                left: 0px;
                width: 100%;
            }

            .base2 {
                top: 250px;
                right: -10px !important;
                left: -10px;
                width: 100%;
            }

            .spl-padding-section.select-location-sec2 {
                padding: 0;
                margin-top: 90px;
                margin-bottom: 190px;
            }

            .slid1 {
                height: 1000px;
                width: 800px;
                top: -80px;
                left: -100px;
            }

            .ea {
                top: 18px;
                left: 450px;
            }

            @keyframes ea {
                0% {
                    left: 450px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 450px;
                }
            }

            .but {
                top: 32px;
                left: 460px;
            }
        }

        @media only screen and (max-width:767px) {
            .spl-padding-section.select-location-sec2 {
                padding: 0;
                margin-bottom: 0;
            }

            .but {
                left: 130px !important;
                top: 30px;
            }

            .ea {
                width: 150px !important;
                height: 38px !important;
                /*top: 26px !important;*/
                left: 375px !important;
            }

            @keyframes ea {
                0% {
                    left: 375px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 375px;
                }
            }
        }

        @media only screen and (max-width:575px) {
            .title {
                position: absolute;
                height: 40%;
                left: 5px;
                top: 5px;
                filter: drop-shadow(0px 0px 10px #000);
                z-index: 1;
                animation: t 10s ease-in-out infinite;
            }

            .but {
                left: 5px !important;
                top: 50px;
                width: 130px;
                font-size: 15px;
            }

            .ea {
                width: 120px !important;
                left: 160px !important;
            }

            @keyframes ea {
                0% {
                    left: 120px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 120px;
                }
            }

            .slid1 {
                height: 2000px;
                width: 900px;
                top: -1800px;
                left: -100px;
            }
        }
    </style>
    <script>
    $(document).ready(function() {
        $(".toggle").click(function() {
            $(".sidebar-wrap").toggleClass("close-sidebar")
        });

        $("#close-btn").click(function() {
            $(".sidebar-wrap").removeClass("close-sidebar")
        });
    });

</script>
</body>

</html>