<div class="panel panel-info">
	<h4 class="panel-heading"><i class="glyphicon glyphicon-search"></i> Tìm kiếm</h4>
	<?php echo $this->Form->create('Book',array('action'=>'get_keyword','novalidate'=>true, 'class'=>"form-inline")); ?>
		<?php if (isset($keyword)): ?>
			<?php echo $this->Form->input('keyword',array('value'=>$keyword,'error'=>false,'label'=>'','placeholder'=>'tên sách, tên tác giả...','class'=>"col-lg-9", 'div'=> false)); ?>	
		<?php else: ?>
			<?php echo $this->Form->input('keyword',array('error'=>false,'label'=>'','placeholder'=>'tên sách, tên tác giả...','class'=>"col-lg-9", 'div'=> false)); ?>	
		<?php endif ?>
		<?php echo $this->Form->button('Tìm', array('type'=>'submit', 'class'=>'col-lg-2 btn btn-primary' )); ?>
	<?php echo $this->Form->end(); ?>
	</div>
	<!-- new element -->
<div class="panel">	
	<?php echo $this->element('errors'); ?>
	<!-- end -->
	<!-- hiển thị kết quả tìm kiếm -->
	<?php if ($notfound == false && isset($results)): ?>
		<h4 class="panel-heading"><i class="glyphicon glyphicon-th"></i><small> Kết quả tìm kiếm: </small> <?php echo h($keyword); ?>
		</h4>
		<?php $this->Paginator->options(array('url'=>$this->passedArgs)); ?>
		<?php echo $this->element('books',array('books'=>$results)); ?>
	<?php elseif($notfound): ?>
		Không tìm thấy quyển sách này!
	<?php endif ?>
	<!-- end -->
		
</div> <!-- end element -->


<!-- pagination -->
<?php if ($notfound == false && isset($results)): ?>
	<?php echo $this->element('pagination'); ?>
<?php endif ?>
<!-- end pagination -->