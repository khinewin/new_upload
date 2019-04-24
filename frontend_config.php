<?php
session_start();
class FrontEnd
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost; dbname=mlm_store', 'root', 'p@ssw0rd');

        } catch (PDOException $e) {
            die("Connection failed to database server.");
        }
    }
    public function getOrderOne($id){
        $sql="select * from orders where id='$id'";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function getOrderItems($order_id){
        $sql="select * from order_items where order_id='$order_id'";
        return $this->db->query($sql);
    }
    public function getOrders(){
        $sql="select * from orders order by id desc";
        return $this->db->query($sql);
    }
    public function getPostForSlide(){
        $sql="select * from products order by id desc limit 2";
        return $this->db->query($sql);
    }
    public function getAllCategory(){
        $sql="select * from category";
        return $this->db->query($sql);
    }
    public function getAllProduct(){
        $sql="select * from products order by id desc";
        return $this->db->query($sql);
    }
    public function getPostByCategory($cat_id){
        $sql="select * from products where category_id='$cat_id'";
        return $this->db->query($sql);
    }
    public function getSearchProduct($q){
        $sql="select * from products where p_name like '%$q%'";
        return $this->db->query($sql);
    }
    public function getProductForShoppingCart($id){
        $sql="select * from products where id='$id'";
        return $this->db->query($sql);
    }
    public function confirmOrder($name, $email, $phone, $address){
        $order_sql="insert into orders (name, email, phone, address, order_at) 
                  values ('$name', '$email', '$phone', '$address', now())";
        $this->db->query($order_sql);

        $order_id=$this->db->lastInsertId();

        foreach ($_SESSION['cart'] as $id=>$qty){

            $old_sql="select * from products where id='$id'";
            $old_row=$this->db->query($old_sql);
            foreach ($old_row as $item){
                $item_name=$item['p_name'];
                $price=$item['price'];

                $sql="insert into order_items (order_id, item_name, price, qty)
                      values ('$order_id', '$item_name', '$price', '$qty')";
                $this->db->query($sql);
                unset($_SESSION['cart']);
            }

        }


        header("location: thank.php");

    }
}