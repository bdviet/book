	<div class="row">
		<?php foreach($books as $book): ?>
		<div class="col col-lg-3">
		    <div class="book-thumbnail">		      
		     <?php echo $this->Html->link($this->Html->image($book['Book']['image']),'/'.$book['Book']['slug'],array('escape'=>false)); ?>
		      <div class="caption book-info">
		        <h4><?php echo $this->Html->link($book['Book']['title'],'/'.$book['Book']['slug']); ?></h4>
		        <?php foreach ($book['Writer'] as $writer) {
					echo $this->Html->link($writer['name'],'/tac-gia/'.$writer['slug'],array('class'=>"author")).' ';
				} ?>
		        <p class="price">Giá: <?php echo $this->Number->currency($book['Book']['sale_price'],' VND',array('places'=>0,'wholePosition'=>'after')); ?></p>
		      </div>
		    </div>
	 	</div>
	 	<?php endforeach; ?>
	 </div>