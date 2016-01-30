<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2016/1/21
 * Time: 14:40
 */

class ProductModel {

    public function queryProType(){
        $sql = 'select * from t_pm_product_type';
        return DB::select($sql,[]);
    }

    public function submitProduct($proName,$description,$proPrice,$proType,$proStatus,$imagePath){
        $sql  = 'insert into t_pm_product';
        $sql .= ' (id,productName,productPrice,productDescription,imagePath,productType,productStatus)';
        $sql .= ' values (?,?,?,?,?,?,?)';
        return DB::change($sql,[uniqid(),$proName,$proPrice,$description,$imagePath,$proType,$proStatus]);
    }
}