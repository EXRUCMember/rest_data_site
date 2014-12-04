<?php
class Product extends AppModel {
    public function getProduct($c_id){
        $data=$this->query('SELECT * FROM products WHERE cate_id='.$c_id);
        return $data;
    }
}