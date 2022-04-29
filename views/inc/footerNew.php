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
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url();?>fontassets/bootstrap/js/jquery.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>fontassets/bootstrap/js/bootstrap.min.js"></script>
    <!-- slik-slider-link -->
   
    <!-- custom-script -->
    <script src="<?php echo base_url();?>fontassets/js/header.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>   
    <!-- //////////////////////Translater//////////////////////////////// -->
    <div id="google_translate_element2"></div>
    <script type="text/javascript">
    function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    <script src="https://crackerclassifieds.com/style/assets2/js/select2.min.js"></script>
    <script type="text/javascript">
    /* <![CDATA[ */
    eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
    /* ]]> */
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
    $(".select2").select2({

    });
    $(document).on('keyup', '.select2-search__field', function (e) {    

            var tst=$(this).val();
            // alert(tst);
            $.ajax({
            url: "<?=base_url();?>home/getLocation",
            type: 'post',
            data: {tst:tst},
            success:function(result)
            {
              // alert(html);
              $('.middleselect').append(result);
              
            }
            });
          
          });
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

    /////////////
    var typingTimer2;                //timer identifier
    var doneTypingInterval2 = 1000;  //time in ms, 5 second for example
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
                nav: false
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
<script>
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

<!--accordion-1-->
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

</script>
<script>
  function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000);
    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loader', false);
});
</script>
    <style type="text/css">


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
<style type="text/css">
    .premiumfont1 {
    font-family: 'CooperStdBlack';
    color: #68bef4;
    font-size: 30px;
    opacity: 0.65;
    position: absolute;
    text-align: center;
    margin: 0;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
     .premiumfont2 {
    font-family: 'CooperStdBlack';
    color: #68bef4;
    font-size: 30px;
    opacity: 0.65;
    position: absolute;
    text-align: center;
    margin: 0;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
    .free-ad-grid{
        overflow: hidden;
    }
    @media only screen (max-width:991px){
    .premiumfont2{
    font-size:20px;
    }
    .free-img-box img {
    height: 156px !important;
    }
    }
    @media only screen (max-width:415px){
        .premiumfont1{
            font-size:22px;
        }
    }
</style>
</body>

</html>