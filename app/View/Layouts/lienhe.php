<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		Liên hệ
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>	
	<div class="container-fluid">
		<img class="img-responsive" src="sinh-nhat-kiki.jpg" alt="" style="width:100%; height:300px;">
	</div>
	<div id="container" class="container-fluid">
		<div id="header">
			<div class="navbar navbar-default mainmenu" style="background: #5bc0de;">
				<div class="container">
					<a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="navbar-brand" href="/cakephp">KIKI BOOK SHOP</a>
					<div class="nav-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><?php echo $this->Html->link('Sách mới', '/sach-moi'); ?></li>
							<li><a href="#ban-chay"><strong>Sách bán chạy</strong></a></li>
							<li><a href="lienhe.html"><strong>Liên hệ</strong></a></li>
						</ul>
						<ul class="nav navbar-nav pull-right">
							<?php 
							echo $this->Form->create('Book', array('action'=>'get_keyword', 'class'=>'navbar-form search'));
							echo $this->Form->input('keyword', array('label'=>'',"style"=>"width: 200px;", "placeholder"=>"Tìm kiếm..." ));
							echo $this->Form->end();
							?>
						</ul>
					</div>
				</div>
			</div>
		</div><!--end main menu-->


		<!-- content -->
			<div id="content">
				<div class="row">
					<div class="content col col-lg-9" style="margin-top: 30px;">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
					</div>
					<!-- end content sau side bar -->
					<!-- sidebar -->
					<div class="sidebar col col-lg-3"  style="margin-top: 30px;">
						<div class="panel panel-info">
							<h4 class="panel-heading" style="margin-top: 0px;">
								<i class="glyphicon glyphicon-shopping-cart"></i> Giỏ hàng
							</h4>
							<ul>
								<li><a href="">Chuyện cổ tích dành cho người lớn</a>(100,000đ)</li>
								<li><a href="">Nhật kí mèo ngốc</a>(80,000đ)</li>
							</ul>
							<!-- <ul> -->
								<p>
									<!-- <span class="label">Tổng: 180,000đ</span> -->
									<center><button type="button" class="btn btn-info">Tổng: 180,000đ</button></center>
								</p>
							<!-- </ul> -->
							<button type="button" class="btn btn-primary btn-block">Xem/Cập nhật giỏ hàng</button>
						</div>
						<div class="panel">
							<h4 class="panel-heading">
								<i class="glyphicon glyphicon-th-list"></i> Danh mục sách
							</h4>
							<?php echo $this->element('menu_categories'); ?>
						</div>
					</div>
					<!-- end side bar -->
				</div>
			</div>
		<!-- end content -->
		<!-- footer -->
	<footer class="footer1">
<div class="container">

<div class="row"><!-- row -->
            
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Nhà sách KIKI</h1>
                                
                                <ul>
                                	<li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách mới nhất</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách bán chạy</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách được yêu thích nhất</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách nổi tiếng</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách nước ngoài</a></li>
                                </ul>
                    
							</li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
            
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Tác giả nổi tiếng</h1>
                                
                                <ul>
 									
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Thu Hà</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Nguyễn Nhật Ánh</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Thu Hằng</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Vũ Trọng Phụng</a></li>
                                    <li><a  href="#" target="_blank"><i class="fa fa-angle-double-right"></i>Xem thêm</a></li>
                                    
                                </ul>
                    
							</li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
            
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Khuyến mãi</h1>
                                
                                <ul>


                <li><a href="#"><i class="fa fa-angle-double-right"></i>Khuyến mãi hot</a></li>
 				<li><a href="#"><i class="fa fa-angle-double-right"></i>Khuyến mãi cho thành viên</a></li>
				<li><a href="#"><i class="fa fa-angle-double-right"></i>KM tri ân nhà giáo</a></li>
				<li><a href="#"><i class="fa fa-angle-double-right"></i>Quà tặng kèm</a></li>
				<li><a href="#"><i class="fa fa-angle-double-right"></i> Smart Book</a></li>
				

                                </ul>
                    
							</li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                
                   
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">Thông tin chi tiết</h1>
                                
                                <div class="footerp"> 
                                
                                <h2 class="title-median">Nhà sách KIKI</h2>
                                <p><b>Email:</b> <a href="http://">phanthithuha.it@gmail.com</a></p>
                                <p><b>Phone: </b>

    <b style="color:#ffc106;">01647 303 115</b></p>
    
    <p><b>Địa chỉ:</b></p>
    <p><b>02 Thanh Sơn, Đà Nẵng.</b></p>
    
                                </div>
                                
                                <div class="social-icons">
                                
                                	<ul class="nomargin">
                                    
                <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                                    
                                    </ul>
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

					© 2016, Nhà sách KIKI.

				</div>

			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="design">

					 <a href="#"> Nhà sách KIKI </a> |  <a target="_blank" href="#">Thiết kế bởi Thu Hà.</a>

				</div>

			</div>

		</div>

	</div>

</div>
    <!--/.footer-bottom--> 
		<!-- end footer -->
	</div>
	<!-- end container-fluid -->
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>