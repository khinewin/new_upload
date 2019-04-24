<?php
session_start();
class Product
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
    public function updateProduct($id, $p_name, $price, $category_id, $p_image){
        if(!empty($p_image['name'])){
            $old_sql="select p_image from products where id='$id'";
            $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
            $old_img=$old_row['p_image'];
            unlink("images/$old_img");

            $p_image_name=$p_image['name'];
            $p_image_tmp=$p_image['tmp_name'];

            $sql="update products set p_name='$p_name', p_image='$p_image_name', price='$price', category_id='$category_id' where id='$id'";
            move_uploaded_file($p_image_tmp, "images/$p_image_name");



        }else{
            $sql="update products set p_name='$p_name', price='$price', category_id='$category_id' where id='$id'";

        }
        $this->db->query($sql);
        header("location: product.php");


    }
    public function getProductById($id){
        $sql="select * from products where id='$id'";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function removeProduct($id, $p_image){
        unlink("images/$p_image");
        $sql="delete from products where id='$id'";
        $this->db->query($sql);
        header("location: product.php");
    }
    public function getProducts(){
        $sql="select products.*, category.category_name from products 
              left join category on category.id=products.category_id";
        return $this->db->query($sql);
    }
    public function uploadProduct($p_name, $p_image, $price, $category_id){
        $p_image_name=date("d-m-y-h-i-s").'-'.$p_image['name'];
        $p_image_tmp=$p_image['tmp_name'];
        $sql="insert into products (p_name, p_image, price, category_id, created_at) 
          values ('$p_name', '$p_image_name', '$price', '$category_id', now())";
        $this->db->query($sql);
        move_uploaded_file($p_image_tmp, "images/$p_image_name");

        $_SESSION['info']="The product have been uploaded.";
        header("location: product.php");

    }
    public function newCategory($category_name){
        $sql="insert into category (category_name) values ('$category_name')";
        $this->db->query($sql);
        $_SESSION['info']="The category have been created.";
        header("location: category.php");
    }
    public function getCategory(){
        $sql="select * from category";
        return $this->db->query($sql);
    }
    public function updateCategory($id, $category_name){
        $sql="update category set category_name='$category_name' where id='$id'";
        $this->db->query($sql);
        $_SESSION['info']="The category have been updated.";
        header("location: category.php");
    }
}