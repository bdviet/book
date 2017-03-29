<!-- Form tìm kiếm -->
<?php echo $this->Form->create('Book',array('url'=>'/books/get_keyword/','novalidate'=>true)); ?>
<?php if (isset($keyword)): ?>
	<?php echo $this->Form->input('keyword',array('value'=>$keyword,'error'=>false,'label'=>'','placeholder'=>'Gõ vào từ khóa để tìm kiếm...')); ?>	
<?php else: ?>
	<?php echo $this->Form->input('keyword',array('error'=>false,'label'=>'','placeholder'=>'Gõ vào từ khóa để tìm kiếm...')); ?>
<?php endif ?>

<?php echo $this->Form->end('Search'); ?>
<!-- end -->

<!-- hiển thị thông báo lỗi -->
<?php if (isset($errors)): ?>
	<?php foreach ($errors as $error): ?>
		<?php echo $error[0]; ?>
	<?php endforeach ?>
<?php endif ?>
<!-- end -->

<!-- hiển thị kết quả tìm kiếm -->
<?php if ($notfound == false && isset($results)): ?>
	Kết quả tìm kiếm của từ khóa <strong><?php echo h($keyword); ?></strong><br>
	<?php $this->Paginator->options(array('url'=>$this->passedArgs)); ?>
	<?php echo $this->element('books',array('books'=>$results)); ?>
	<?php echo $this->element('pagination',array('object'=>'quyển sách')); ?>
<?php elseif($notfound): ?>
	Không tìm thấy quyển sách này!
<?php endif ?>
<!-- end -->