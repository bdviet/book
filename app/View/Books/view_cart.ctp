<?php if ($this->Session->check('cart')): ?>
<!-- new element -->
	<div class="panel">
			<h4 class="panel-heading"><i class="glyphicon glyphicon-shopping-cart"></i> Giỏ hàng của bạn
			</h4>
			<div class="row"> 
			
			<!-- cart -->
			<div class="">
  			<table class="table table-striped">
		        <thead>
		          <tr>
		            <th>STT</th>
		            <th>Tên sách</th>
		            <th>Số lượng</th>
		            <th>Giá</th>
		            <th>Xóa</th>
		          </tr>
		        </thead>
		        <tbody>
		        	<?php $i = 1; ?>
		        	<?php foreach ($cart as $book): ?>
		        		<tr>
				            <td><?php echo $i++; ?></td>
				            <td><?php echo $this->Html->link($book['title'],'/'.$book['slug']); ?></td>
				            <td class="row">
				            	<?php echo $this->Form->create('Book', array('class'=>"form-inline")); ?>
								  <?php echo $this->Form->input('quantity', array('value'=>$book['quantity'], 'class'=>"col col-lg-2", 'label'=>false, 'div'=> false)); ?>
								  <?php echo $this->Form->button('Cập nhật', array('value'=>$book['quantity'],'type'=>"submit", 'class'=>"btn btn-link")); ?>										  
								<?php echo $this->Form->end(); ?>
				            </td>
				            <td><?php echo $this->Number->currency($book['sale_price'], ' VND', array('places'=>0, 'wholePosition'=> 'after')); ?></td>
				            <td>
				            	<a href="#"></a>
				            	<?php echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i>', '/books/remove/'.$book['id'], array('escape'=>false)); ?>
				            </td>
				          </tr>
		        	<?php endforeach ?>
		          
		          <tr>
		            <td></td>
		            <td colspan="2"><strong>Tổng cộng</strong></td>
		            <td colspan="2"><strong><?php echo $this->Number->currency($payment['total'], ' VND', array('places'=>0, 'wholePosition'=> 'after')); ?></strong></td>
		          </tr>
		          <tr>
		            <td></td>
		            <td colspan="2"><strong>Đã giảm <small>(Coupon: CAKEPHP - giảm 10%)</small></strong></td>
		            <td colspan="2"><strong>0 VND</strong></td>
		          </tr>
		          <tr class="success">
		            <td></td>
		            <td colspan="2"><h4><strong>Giá phải trả</strong> </h4></td>
		            <td colspan="2"><h4><span class="label label-danger"><?php echo $this->Number->currency($payment['total'], ' VND', array('places'=>0, 'wholePosition'=> 'after')); ?></span></h4></td>
		          </tr>
		        </tbody>
		    </table>
	 	</div>
	 	<?php echo $this->Form->postLink('Làm rỗng giỏ hàng', '/books/empty_cart', array('class'=>"col-lg-3 btn btn-default empty")); ?>
	 	</div>

	</div> <!-- end element -->
	
		<!-- coupon -->
	<div class="panel panel-success col col-lg-4">
		<h4 class="panel-heading"><i class="glyphicon glyphicon-barcode"></i> Mã giảm giá</h4>
		<form class="form-inline">
			<input class="col-lg-9" type="text" placeholder="Nhập mã giảm giá (coupon)">
			<button type="submit" class="col-lg-2 btn btn-primary">Nhập</button>
	</form>
	<h4>Ghi chú:</h4>
	<ul>
		<li>Mỗi mã giảm giá có mức giảm giá khác nhau và chỉ dùng trong khoảng thời gian quy định.</li>
		<li>Chỉ dùng một mã giảm giá khi thanh toán đơn hàng.</li>
	 	<li>Số tiền giảm giá được tính dựa trên <strong>số phần trăm giảm giá * tổng giá trị</strong> của đơn hàng.</li>
	</ul>
		</div>

		<!-- customer info -->
		<div class="panel panel-info col col-lg-7 col-offset-1">
		<h4 class="panel-heading"><i class="glyphicon glyphicon-user"></i> Thanh toán đơn hàng</h4>
		<form class="form-horizontal">
	  <div class="row">
	    <label for="inputEmail" class="col col-lg-2 control-label">Tên</label>
	    <div class="col col-lg-10">
	      <input type="text" id="inputEmail" placeholder="Nhập tên">
	    </div>
	  </div>
	  <div class="row">
	    <label for="inputEmail" class="col col-lg-2 control-label">Email</label>
	    <div class="col col-lg-10">
	      <input type="text" id="inputEmail" placeholder="Nhập email">
	    </div>
	  </div>
	  <div class="row">
	    <label for="inputEmail" class="col col-lg-2 control-label">Địa chỉ</label>
	    <div class="col col-lg-10">
	      <input type="text" id="inputEmail" placeholder="Nhập địa chỉ">
	    </div>
	  </div>
	  <div class="row">
	    <label for="inputEmail" class="col col-lg-2 control-label">Phone</label>
	    <div class="col col-lg-10">
	      <input type="text" id="inputEmail" placeholder="Nhập số điện thoại">
	    </div>
	  </div>
	  <div class="row">
	    <div class="col col-lg-10 col-offset-2">
	      <button type="submit" class="btn btn-primary pull-right">Thực Hiện Thanh toán</button>
	    </div>
	  </div>
	</form>

		</div>

	<!-- checkout button -->
<?php else: ?>
	<div class="panel">
		Giỏ hàng đang rỗng.
		Quay về <?php echo $this->Html->link('trang chủ', '/'); ?> để thêm quyển sách vào giỏ hàng.
	</div>
<?php endif ?>