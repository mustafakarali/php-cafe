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
    public function index(){
        $this->view = View::build('admin/LoginView');
    }

    public function login(){

        $userName = $_REQUEST['username'];
        $userPwd = $_REQUEST['userpwd'];
        $userAttr = $this->loginModel->login($userName,$userPwd);
        if(count($userAttr) > 0){
            session_start();
            $_SESSION['user'] = $userAttr[0];

            $this->log->debug($userAttr[0]['userName']." login successfully.");
            echo "1";
            return;
        }else{
            echo "0";
            return;
        }

    }
    public function main(){

        $menuArr = $this->authModel->queryAuth('1');
        $leftMenu = new LeftMenu($menuArr);

        $_SESSION['leftMenu'] = $leftMenu;

        $this->view = View::build('admin/MainView');
    }
}