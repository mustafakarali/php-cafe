<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2016/1/21
 * Time: 14:40
 */

class ProductController extends Controller{

    function addProduct(){
        $this->view = View::build('product/AddProductView');
    }

}