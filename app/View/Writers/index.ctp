<div class="writers index">
	<h2><?php echo __('Các Tác Giả'); ?></h2>
	<p>
		<?php echo $this->Paginator->sort('name','Xếp theo thứ tự ngược lại'); ?>
	</p>
	</tr>
	<?php foreach ($writers as $writer): ?>
		<?php echo h($writer['Writer']['name']); ?> <br>
	<?php endforeach; ?>
	<br>
	<?php echo $this->element('pagination',array('object'=>'tác giả')); ?>
</div>