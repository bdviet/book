<div class="books index">
	<h2><?php echo __('Sách mới'); ?></h2>
	<p>
		<?php echo $this->Paginator->sort('title','Sắp xếp theo tên sách'); ?>
		<?php echo $this->Paginator->sort('created','Mới nhất/Cũ nhất'); ?>
	</p>
	<?php //pr($books); ?>
	<?php echo $this->element('books',array('books'=>$books)); ?>
	<?php echo $this->element('pagination',array('object'=>'quyển sách')); ?>
</div>
