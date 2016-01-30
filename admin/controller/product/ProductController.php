<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2016/1/21
 * Time: 14:40
 */

class ProductController extends Controller{

    private $productModel;

    public function __construct(){
        $this->productModel = ModelFactory::build('product');
    }

    function addProduct(){
        $_REQUEST['proType'] = $this->productModel->queryProType();
        $this->view = View::build('product/AddProductView');
    }

    function imageUpload(){
        $imgUpload = new ImageUpload();
        $imgUpload->upload();
    }
    public function imageDelete(){
        $imagePath = _get('imagePath');
        if(!$imagePath == NULL){
            $imgUpload = new ImageUpload();
            $res = $imgUpload->deleteImage($imagePath);
            if($res){
                echo "1";
            }else{
                echo "-1";
            }
        }
    }

    public function submitProduct(){
        $proName = _get('proName');
        $description = _get('description');
        $proPrice = _get('proPrice');
        $proType = _get('proType');
        $proStatus = _get('proStatus');
        $imagePath = _get('imagePath');
        $res = $this->productModel->submitProduct($proName,$description,$proPrice,$proType,$proStatus,$imagePath);
        if($res){
            parent::redirect("login/main");
        }else{
            $this->view = View::build('failure');
        }
    }

    public function queryProduct(){

    }
}