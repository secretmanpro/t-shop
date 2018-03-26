<?php

class Cart
{
    public $items = [];//Lưu tất cả sản phẩm gồm object 
    //SP1 : {
    //Qty=2 (số lượng),Price=20
    //item:obj sluong, don gia, ten...}
	public $totalQty = 0;//Tổng số lượng
	public $totalPrice = 0;//Tổng đơn giá
	public function __construct($oldCart=null){
		// print_r($oldCart);die;
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
	
	public function add($item, $qty=1){
		$giohang = ['qty'=>0, 'price' => $item->giagiam, 'item' => $item];
		if($this->items){
			if(array_key_exists($item->ma_sanpham, $this->items)){
				$giohang = $this->items[$item->ma_sanpham];
			}
		}
		$giohang['qty'] = $giohang['qty'] + $qty;
		$giohang['price'] = $item->giagiam * $giohang['qty'];
		$this->items[$item->ma_sanpham] = $giohang;
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = ($this->totalPrice + $qty*$giohang['item']->giagiam);
		
	}
	//update
	// public function update($item, $qty=1){
	// 	$giohang = [
	// 		'qty'=>$qty, 
	// 		'price' => $item->giagiam, 
	// 		'item' => $item
	// 	];
	// 	$id = $item->ma_sanpham;
	// 	if($this->items){
	// 		if(array_key_exists($id, $this->items)){
	// 			$this->totalPrice -= $this->items[$id]['price'];
	// 			$this->totalQty -= $this->items[$id]['qty'];
	// 		}
	// 	}
	// 	$giohang['price'] = $item->giagiam* $giohang['qty'];
	// 	$this->items[$id] = $giohang;
	// 	$this->totalQty = $this->totalQty + $qty;
	// 	$this->totalPrice = $this->totalPrice + ($giohang['item']->giagiam)*$qty;
	// }

	public function update($item, $qty=1){
		$giohang = [
			'qty'=>$qty, 
			'price' => $item->giagiam, 
			'item' => $item
		];
		$id = $item->ma_sanpham;
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$this->totalPrice -= $this->items[$id]['price'];
				$this->totalQty -= $this->items[$id]['qty'];
			}
		}
		$giohang['price'] = $item->giagiam * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = $this->totalPrice + ($giohang['item']->giagiam)*$qty;
	}
	//xóa 1 (xoá 1số lượng của sp=>sp vẫn còn)
	public function reduceByOne($id){ 
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice = ($this->totalPrice - $this->items[$id]['item']['price']);
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa sản phẩm khỏi cart
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
	
	
}