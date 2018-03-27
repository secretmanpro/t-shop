<?php
require_once 'model/ChiTietSanPhamModel.php';

class Cart
{
    private $items = [];
    private $sanpham;

    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
        $this->items = $_SESSION['cart'];
        $this->sanpham = new ChiTietSanPhamModel;
    }

    /**
     * Thêm mới sp hoặc tăng số lượng của sp có sẵn
     * @param integer $id
     * @param integer $sl
     * @return boolean
    **/
    public function add($id, $sl = 1)
    {
        $sp = $this->sanpham->productForCart($id);
        if (!$sp) {
            return false;
        }
        $sp = (array) $sp;
        if (isset($this->items[$id])) {
            $this->items[$id]['qty'] += $sl;
        } else {
            $sp['qty'] = $sl;
            $this->items[$id] = $sp;
        }
        return $this->write();
    }

    /**
     * Cập nhật số lượng của sp có sẵn
     * @param integer $id
     * @param integer $sl
     * @return boolean
    **/
    public function update($id, $sl = 1)
    {
        $sp = $this->sanpham->productForCart($id);
        if (!$sp || !isset($this->items[$id])) {
            return false;
        }
        $this->items[$id]['qty'] = $sl;
        return $this->write();
    }

    /**
     * @param integer $id
     * @return boolean
    **/
    public function remove($id)
    {
        $sp = $this->sanpham->productForCart($id);
        if (!$sp || !isset($this->items[$id])) {
            return false;
        }
        unset($this->items[$id]);
        return $this->write();
    }

    /**
     * Nếu $slsp là true thì đếm tổng cộng số lượng của từng sp (mặc định)
     * @param boolean $slsp
     * @return integer
    **/
    public function totalItem($slsp = true)
    {
        return $slsp ? array_sum(array_column($this->items, 'qty')) : count($this->items);
    }

    /**
     * Tổng giá tiền
     * @return integer
    **/
    public function totalPrice()
    {
        return array_sum(array_map(function ($item) {
            return $item['price'] * $item['qty'];
        }, $this->items));
    }

    /**
     * Cập nhật $items vào session 'cart'
     * @return boolean
    **/
    private function write()
    {
        $_SESSION['cart'] = $this->items;
        return true;
    }
}
