<?php 
class ToolComponent extends Component{
	/**
	 * Tính tổng mảng $cart, giá trị của từng item trong cart = $quantity_col * $price_col
	 */
	public function array_sum($cart,$quantity_col = 'quantity', $price_col = 'price'){
		$total = 0;
		foreach ($cart as $item) {
			$total += $item[$quantity_col]*$item[$price_col];
		}
		return $total;
	}
}
 ?>