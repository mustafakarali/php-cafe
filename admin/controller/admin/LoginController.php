<?php
/**
 *	LoginController
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	21-01-2016  11:34
 ************************************************************************
 *	update time			editor				updated information
 *
 */

class LoginController extends Controller {

    private $loginModel;
    private $authModel;

    public function __construct(){
        $this->loginModel = ModelFactory::build('login');
        $this->authModel = ModelFactory::build('auth');
    }

    public function login(){

        $menuArr = $this->authModel->queryAuth('1');
        $leftMenu = new LeftMenu($menuArr);

        $_REQUEST['leftMenu'] = $leftMenu;

        $this->view = View::build('admin/MainView');
    }
}