<?php
/**
 *	ProductController
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	29-01-2016 14:27
 ************************************************************************
 *	update time			editor				updated information
 *
 */


class ProductController extends Controller{
    private $productModel;

    public function __construct(){
        $this->productModel = ModelFactory::build('product');
    }

    public function index(){
        $_REQUEST['proTypeArr'] = $this->productModel->getProductType();
        $_REQUEST['productArr'] = $this->productModel->getAllProduct();
        $this->view = View::build('product/ProductView');
    }

}