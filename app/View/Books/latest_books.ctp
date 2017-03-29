<!-- new element -->
	<div class="panel">
			<h4 class="panel-heading"><i class="glyphicon glyphicon-th"></i>
				Sách mới:
			<small class="sorts pull-right">Sắp xếp theo: 
				<?php echo $this->Paginator->sort('title','tên'); ?> ∙ 
				<?php echo $this->Paginator->sort('created','cũ/mới'); ?>
			</small></h4>
			<?php echo $this->element('books',array('books'=>$books)); ?>
	</div> <!-- end element -->
	
	<!-- pagination -->
	<?php echo $this->element('pagination'); ?>
	<!-- end pagination -->
