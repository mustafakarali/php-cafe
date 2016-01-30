<?php
/**
 *	ProductModel
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	29-01-2016 14:33
 ************************************************************************
 *	update time			editor				updated information
 *
 */

class ProductModel {

    public function getAllProduct(){

        $productArr = array();  //return array, group by product type
        $proTypeArr = self::getProductType();

        foreach($proTypeArr as $proType){
            $sql = 'select * from t_pm_product';
            $sql .= ' where productType = ?';
            $sql .=' and productStatus = 1';
            $productArr[$proType['productType']] = DB::select($sql,[$proType['id']]);
        }
        return $productArr;
    }


    public function getProductType(){
        $sql = 'select * from t_pm_product_type order by id';
        return DB::select($sql,[]);
    }
}