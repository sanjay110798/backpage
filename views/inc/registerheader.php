<link href="https://crackerclassifieds.com/style/assets2/css/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style type="text/css">

#g-recaptcha1 div{
  width: 100% !important;
  height: 78px !important;
}

@media only screen and (max-width: 320px)
{
#g-recaptcha1 div{
    margin-left:-9px;
}
}
.select2-container--default .select2-selection--single {
    height: 50px!important;
}
@import url(https://fonts.googleapis.com/css?family=Neucha);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
/*@import url(font-icomoon.css);*/
@import url(https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css);
@import url(https://fonts.googleapis.com/css?family=Oswald:400,300,700);
/** Custom field plugin **/
/* SELECT */
.selectCF{
	margin:0;
	padding:0;
	display:inline-block;
	position:relative;
	font-family: 'Neucha', cursive;
	font-size:17px;
	font-weight:bold;
}
.selectCF li{
	list-style:none;
	cursor: pointer;
	perspective: 900px;
	-webkit-perspective: 900px;
  text-align: left;
}
.selectCF > li{
	position:relative;
	font-size:0;
}
.selectCF span{
	display:inline-block;
	height:45px;
	line-height:45px;
	color:#FFF;
	z-index:1;
}
.selectCF .arrowCF{
	transition: .3s;
	-webkit-transition: .3s;
	width:45px;
	text-align:center;
	vertical-align: top;
	font-size:17px;
}
.selectCF .titleCF{
	padding: 0 10px 0 20px;
	border-left: dotted 1px rgba(244,244,244,.5);
	font-size:16px;
	font-family: 'Oswald', sans-serif;
	font-weight:400;
	overflow:hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.selectCF .searchCF{
	padding: 0 10px 0 20px;
	border-left: dotted 1px rgba(244,244,244,.5);
	position: absolute;
	top:0;
	right:0;
	z-index:-1;
}
@keyframes searchActive {
	from{ transform: rotateY(180deg) }
	to{ transform: rotateY(0deg); }
}@-moz-keyframes searchActive {
	from{ transform: rotateY(180deg) }
	to{ transform: rotateY(0deg); }
}
@-webkit-keyframes searchActive {
	from{ -webkit-transform: rotateY(180deg) }
	to{ -webkit-transform: rotateY(0deg); }
}
.searchActive .searchCF{
	z-index:1;
	animation: searchActive 0.3s alternate 1;
	-moz-animation: searchActive 0.3s alternate 1;
	-webkit-animation: searchActive 0.3s alternate 1;
}
.searchActive .titleCF{
	opacity:0;
}
.selectCF .searchCF input{
	font-family: 'Neucha', cursive;
	line-height:45px;
	border:none;
	padding:0;
	margin:0;
	width:100%;
	height:100%;
	background:transparent;
	font-size:17px;
}
.selectCF .searchCF input:active, .selectCF .searchCF input:focus{
	box-shadow:none;
	border:none;
	outline: none;
}
.selectCF li ul{	
	display:none;
	/*position:absolute;*/
	top:100%;
	left:0;
	padding: 0 !important;
	width:100%;
	background: #FFF;
	max-height: 322px;
    overflow-y: auto;
	transition: .2s;
	-webkit-transition: .2s;
	z-index:100;
	background: rgb(15 15 15);
    color: aliceblue;
  
}
.selectCF li ul li{
	padding:9px 0 9px 20px;
	border-bottom: 1px solid rgba(240,240,240,.9);
	font-weight:normal;
	font-size:14px;
	transition: .2s;
	-webkit-transition: .2s;
	overflow:hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    position: relative;
}
.selectCF li ul li:hover{
	background: #666;
	color:#FFF;

}

.selectCF li ul li:hover::after {
	opacity: 1;
	transition: 0.3s linear;
}

.selectCF li ul li:after{
	content: "\f00c";
	font-family:FontAwesome;
	position: absolute;
	font-size: 16px;
	right: 15px;
	color: #d93920;
	top: 0;
	bottom: 0;
	line-height: 40px;
	opacity: 0;
	transition: 0.3s linear;
	
}
.selectCF .selected{
	background: #666;
	color:#FFF;
}
.selectCF li ul li:last-child{
	border-bottom: none;
}
.onCF .arrowCF{
	transform: rotate(90deg);
	-webkit-transform: rotate(90deg);
}
@-moz-keyframes effect1 {
	from{ transform: translateY(15px); opacity:0; }
	to{ transform: translateY(0px); opacity:1; }
}
@-webkit-keyframes effect1 {
	from{ -webkit-transform: translateY(15px); opacity:0; }
	to{ -webkit-transform: translateY(0px); opacity:1; }
}
.onCF li ul{
	display:block;
	-moz-animation: effect1 0.3s alternate 1;
	-webkit-animation: effect1 0.3s alternate 1;
}

/**************************/
html{
  background: url('https://unsplash.com/photos/zJnpPhF4HyY/download');
  background-size: cover;
  text-align: center
}
h2, ul.info li, #event-change{
  font-family: 'Oswald', cursive;
  color: #FFF;
}
ul.info{
  padding: 0;
  margin: 0 0 20px 0;
}
ul.info li{
  display: inline-block;
  border: solid 1px #FFF;
  border-radius: 5px;
  padding: 0 5px;
}
#event-change{
  padding: 20px 0;
}
.custom-link{
  position: absolute;
  bottom: 30px;
  right: 30px;
  color: #FFF;
  font-size: 12px;
  text-decoration: none;
  transition: .3s;
  -webkit-transition: .3s;
  font-family: 'Oswald', sans-serif;
  font-size: 20px
}
a:hover{
  color: #E4432C;
}
.selectCF
{
	width: 100% !important;
	border: 2px solid #ccd5d6;
}
.selectCF input
{
	border:none !important;
}
.searchCF,.titleCF
{
	background: #fdfffe!important;
    width: 100%!important;
    color: #948f8f !important;
}
.arrowCF.ion-chevron-right
{
	background:#c0c4c3!important;
}
</style>