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
	<!-- Sách cũ Huế - ChickenRain.com -->
	<?php echo $this->Html->css('book); ?>

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
  		<!-- Main Menu - ChickenRain.com -->
	  <div class="navbar mainmenu">
	    <div class="container">
	      <a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
	      <?php echo $this->Html->link('Sách cũ Huế','/',array('class'=>"navbar-brand")); ?>
	      <div class="nav-collapse collapse">
	        <ul class="nav navbar-nav">
	          <li class="active"><?php echo $this->Html->link('Sách mới','/sach-moi') ?></li>
	          <li><a href="#ban-chay">Sách bán chạy</a></li>
	          <li><a href="#lien-he">Liên hệ</a></li>
	        </ul>
	        <ul class="nav navbar-nav pull-right">
		  		<?php 
		  			echo $this->Form->create('Book',array('url'=>'/books/get_keyword','class'=>"navbar-form search"));
		  			echo $this->Form->input('keyword',array('label'=>'', 'style'=>"width: 200px;", 'placeholder'=>"Tìm kiếm..."));
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
	  	<div class="content col col-lg-12">
	  		
	  		<?php echo $this->fetch('content'); ?>

	  	</div> <!-- end content -->

  		</div>
  	</div>
   <!-- Footer -->
	<div id="footer">
	  <div class="container">
	    <p class="text-muted credit">
	    	Website trao đổi sách và giáo trình cũ - <a href="https://www.facebook.com/sachcuhue/?fref=ts">Sách cũ Huế</a> - 
	    	Bản quyền thuộc về <a href="http://facebook.com/bdviet.hce">Bùi Đức Việt</a>
	    </p>
	  </div>
	</div>

</div>

<!-- Placed at the end of the document so the pages load faster -->
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('bootstrap'); ?>
</body>
</html>