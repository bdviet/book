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

</head>
<body>
<div id="container" class="container">
  
  
  <!-- Header -->
  	<div id="header">
 
	  <div class="navbar mainmenu">
	    <div class="container">
	      <a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
	      <a class="navbar-brand" href="./">BookShop</a>
	      <div class="nav-collapse collapse">
	        <ul class="nav navbar-nav">
	          <li class="active"><?php echo $this->Html->link('Sách mới','/sach-moi'); ?></li>
	          <li><a href="#ban-chay">Sách bán chạy</a></li>
	          <li><a href="#lien-he">Liên hệ</a></li>
	        </ul>
	        <ul class="nav navbar-nav pull-right">
		  		<?php 
		  			echo $this->Form->create('Book',array('url'=>'/books/get_keyword','class'=>'navbar-form search'));
		  			echo $this->Form->input('keyword',array('label'=>'','style'=>"width: 200px;", 'placeholder'=>"Tìm kiếm..."));
		  			echo $this->Form->end();
		  		 ?>
	        </ul>
	      </div>
	    </div>
	  </div> <!-- end Main Menu -->
	</div>


  <!-- Content -->
  <div id="content">
  	<div class="row">
  		<!-- content -->
	  	<div class="content col col-lg-9">
	  		<?php echo $this->Session->flash(); ?>
	  		<?php echo $this->fetch('content'); ?>
	  	</div> <!-- end content -->
	  	
	  	<!-- sidebar -->
	  	<div class="sidebar col col-lg-3">
	  		<div class="panel panel-info">
	  		<h4 class="panel-heading"><i class="glyphicon glyphicon-shopping-cart"></i> Giỏ hàng</h4>
	  			<ul>
	  			<li><a href="">Bí mật tư duy triệu phú </a>(30,000đ)</li>
	  			<li><a href="">Tác nhân thu hút </a>(20,000đ)</li>
	  			</ul>
	  			<!-- <ul> -->
	  				<p class="pricetotal"><span class="label">Tổng: 50,000đ</span></p>
	  			<!-- </ul> -->
	  			<button type="button" class="btn btn-primary btn-block">Xem/Cập nhật Giỏ hàng</button>
	  		</div>
	  		<div class="panel">
	  		<h4 class="panel-heading"><i class="glyphicon glyphicon-th-list"></i> Danh mục sách</h4>
	  		<?php echo $this->element('menu_categories'); ?>
	  		
	  		</div>
	  	</div> <!-- end sidebar -->

  	</div>
  </div>
  <!-- Footer -->
	<div id="footer">
	  <div class="container">
	    <p class="text-muted credit">
	    	Giao diện thực hành khóa học <a href="http://chickenrain.com/khoa-hoc-cakephp-nang-cao">CakePHP Nâng Cao</a> - 
	    	Bản quyền thuộc về <a href="http://chickenrain.com">ChickenRain.Com</a>
	    </p>
	  </div>
	</div>

</div>

<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>



</body>
</html>