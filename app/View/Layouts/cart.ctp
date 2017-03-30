<!DOCTYPE html>
<html>
  <head>
     <?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php echo $this->Html->meta('icon'); ?>
	<!-- Bootstrap core CSS -->
	<?php echo $this->Html->css('bootstrap'); ?>
	<!-- Sách cũ Huế - Sách cũ Huế -->
	<?php echo $this->Html->css('book'); ?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond/respond.min.js"></script>
	<![endif]-->
	<?php 
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	 ?>
<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Sniglet|Raleway:900);
	body{
	font-family: 'Sniglet', sans-serif;

}
.formgroup, .formgroup-active, .formgroup-error{
	background-repeat: no-repeat;
	background-position: right bottom;
	background-size: 10.5%;
	transition: background-image 0.7s;
	-webkit-transition: background-image 0.7s;
	-moz-transition: background-image 0.7s;
	-o-transition: background-image 0.7s;
	width: 566px;
	padding-top: 2px;
}

.formgroup{
	background-image: url('http://www.geertjanhendriks.nl/codepen/form/pixel.gif');	
}
.formgroup-active{
	background-image: url('http://www.geertjanhendriks.nl/codepen/form/octo.png');
}
.formgroup-error{
	background-image: url('http://www.geertjanhendriks.nl/codepen/form/octo-error.png');
	}
	#form{
	height: 100%;	
	background-color: #98d4f3;
	overflow: hidden;
	position: relative;
	
}
form{
	margin: 0 auto;
	width: 500px;
	/*padding-top: 40px;*/
	color: black;
	position: right;
	
	}

.footer1 {
    background: #fff url("../images/footer/footer-bg.png") repeat scroll left top;
	padding-top: 40px;
	padding-right: 0;
	padding-bottom: 20px;
	padding-left: 0;	
	border-top-width: 2px;
	border-top-style: solid;
	border-top-color: #337ab7;
}



.title-widget {
	color: #898989;
	font-size: 20px;
	font-weight: 300;
	line-height: 1;
	position: relative;
	text-transform: uppercase;
	font-family: 'Sniglet', sans-serif;
	margin-top: 0;
	margin-right: 0;
	margin-bottom: 25px;
	margin-left: 0;
	padding-left: 28px;
}

.title-widget::before {
    background-color: #ea5644;
    content: "";
    height: 22px;
    left: 0px;
    position: absolute;
    top: -2px;
    width: 5px;
}



.widget_nav_menu ul {
    list-style: outside none none;
    padding-left: 0;
}

.widget_archive ul li {
    background-color: rgba(0, 0, 0, 0.3);
    content: "";
    height: 3px;
    left: 0;
    position: absolute;
    top: 7px;
    width: 3px;
}


.widget_nav_menu ul li {
    font-size: 13px;
    font-weight: 700;
    line-height: 20px;
	position: relative;
    text-transform: uppercase;
	border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    margin-bottom: 7px;
    padding-bottom: 7px;
	width:95%;
}



.title-median {
    color: #636363;
    font-size: 20px;
    line-height: 20px;
    margin: 0 0 15px;
    text-transform: uppercase;
	font-family: 'Sniglet', sans-serif;
}

/*.footerp p {font-family: 'Gudea', sans-serif; }*/


#social:hover {
    			-webkit-transform:scale(1.1); 
-moz-transform:scale(1.1); 
-o-transform:scale(1.1); 
			}
			#social {
				-webkit-transform:scale(0.8);
                /* Browser Variations: */
-moz-transform:scale(0.8);
-o-transform:scale(0.8); 
-webkit-transition-duration: 0.5s; 
-moz-transition-duration: 0.5s;
-o-transition-duration: 0.5s;
			}           
/* 
    Only Needed in Multi-Coloured Variation 
                                               */
			.social-fb:hover {
				color: #3B5998;
			}
			.social-tw:hover {
				color: #4099FF;
			}
			.social-gp:hover {
				color: #d34836;
			}
			.social-em:hover {
				color: #f39c12;
			}
			.nomargin { margin:0px; padding:0px;}





.footer-bottom {
    background-color: #337ab7;
    min-height: 30px;
    width: 100%;
}
.copyright {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
}
.design {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
    text-align: right;
}
.design a {
    color: #fff;
}
	</style>
</head>
<body>
<div id="container" class="container">
  <!-- Header -->
  	<div id="header">
			<div class="navbar navbar-default mainmenu" style="background: #428bca;">
				<div class="container">
					<a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="navbar-brand" href="/book">Sách cũ Huế</a>
					<div class="nav-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><?php echo $this->Html->link('Sách mới', '/sach-moi'); ?></li>
							<li><a href="#ban-chay"><strong>Sách bán chạy</strong></a></li>
							<li><?php echo $this->Html->link('Liên hệ', '/lienhe'); ?></li>
						</ul>
						<ul class="nav navbar-nav pull-right" style="float: right;">
							<?php 
							echo $this->Form->create('Book', array('url'=>'/books/get_keyword', 'class'=>'navbar-form search'));
							echo $this->Form->input('keyword', array('label'=>'',"style"=>"width: 200px;float: right;", "placeholder"=>"Tìm kiếm..." ));
							echo $this->Form->end();
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>


  <!-- Content -->
  <div id="content">
  	<div class="row">
  		<!-- content -->
	  	<div class="content col col-lg-12">
	  		
	  		<?php echo $this->fetch('content'); ?>

	  	</div> <!-- end content -->

  		</div>
  	</div>


  	<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='https://v2.zopim.com/?4hKkNLlAvGQGW5pejXgSa7ZrHWIB6ofo';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zendesk Chat Script-->
    <!-- Footer -->
	<footer class="footer1">
<div class="container">

<div class="row"> 
                <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                
                   
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">Thông tin chi tiết</h1>
                                
                                <div class="footerp"> 
                                
                                <h2 class="title-median">Sách cũ Huế</h2>
                                <p><b>Email:</b> <a href="http://">sachcuhue@gmail.com</a></p>
                                <p><b>Phone: </b>

    <b style="color:#ffc106;">01648 176 040</b></p>
    
    <p><b>Địa chỉ:</b></p>
    <p><b>Nhà đa năng tầng 2, KTX trường BIA, 42 Nguyễn Khánh Toàn, Tp Huế</b></p>
    
                                </div>
                                
                                
                    		</li>
                          </ul>
                       </div>
                </div>
</div>
</footer>
<!--header-->

<div class="footer-bottom">

	<div class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="copyright">

					© 2017, Sách cũ Huế.

				</div>

			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="design">

					 <a href="#"> Sách cũ Huế </a> |  <a target="_blank" href="#">Thiết kế bởi Bùi Đức Việt.</a>

				</div>

			</div>

		</div>

	</div>

</div>
	</div>

</div>

<!-- Placed at the end of the document so the pages load faster -->
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('bootstrap'); ?>
</body>
</html>