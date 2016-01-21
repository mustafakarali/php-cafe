<?php
/**
 *	LeftMenu class. output the lef menu for backend management system
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	20-01-2016  12:57
 ************************************************************************
 *	update time			editor				updated information
 *
 */

class LeftMenu {

    private $menuArr;   // record authoritied menu information of current user
    private $log;

    public function __construct($menuArr){
        $this->menuArr = $menuArr;
        //$this->log = new Logger();
    }

    public function __get($propertyName){
        if(isset($this->propertyName)){
            return $this->propertyName;
        }else{
            return null;
        }
    }
    public function __set($propertyName,$value){
        $this->propertyName = $value;
    }

    public function outputMenu(){
        $activeModuleId = '';
        $activeMenuId = '';

        echo '<div class="sidebar collapse" id="myCollapse">';
            echo '<ul class="nav nav-stacked">';

        //find current focus menu id and its parent id
        foreach($this->menuArr as $menuBean){
            $menuUrl = isset($menuBean['moduleUrl']) ? $menuBean['moduleUrl'] : '#';
            $menuUrl = '/'.ltrim($menuUrl,'/');
            if($menuUrl == ('/'.$_REQUEST['rController'].'/'.$_REQUEST['rMethod'])){
                $activeMenuId = $menuBean['id'];
                $activeModuleId = $menuBean['moduleParent'];
            }
        }
        //output menus in loop
        foreach($this->menuArr as $key => $menuBean){
            $menuId = $menuBean['id'];
            $menuType = $menuBean['moduleType'];
            $menuUrl = isset($menuBean['moduleUrl']) ? $menuBean['moduleUrl'] : '#';
            $menuUrl = '/'.ltrim($menuUrl,'/');
            $menuName = $menuBean['moduleName'];
            $parentId = isset($menuBean['moduleParent']) ? $menuBean['moduleParent'] : '';
            if($menuType == 2){
                $modulesId = $menuId;   //parent id for sub menus

                if($key != 0){  //if it is not the first module, close the last tags
                    echo '</ul></div></li>';
                }
                if($activeModuleId == $menuId){
                    echo '<li class="active">';
                        echo '<a role="button" data-toggle="collapse" href="#'.$menuId.'" aria-expanded="false" aria-controls="'.$menuId.'">';
                }else{
                        echo '<li>';
                            echo '<a class="collapsed" role="button" data-toggle="collapse" href="#'.$menuId.'" aria-expanded="false" aria-controls="'.$menuId.'">';
                }
                echo  $menuName;
                echo '<span class="fa arrow"></span>';
                echo '</a>';
                if($activeModuleId == $menuId){
                    echo '<div id="'.$menuId.'" class="collapse in second-level">';
                }else{
                    echo '<div id="'.$menuId.'" class="collapse second-level">';
                }

                    echo '<ul class="nav">';
            }else if ($menuType == 3 && $parentId == $modulesId){
                            echo '<li> <a href="'.ROOT_FILE.$menuUrl.'" >';
                            if($activeMenuId == $menuId){
                                echo '<i class="fa fa-caret-right"></i> ';
                            }
                            echo $menuName.'</a></li>';
            }
        }
            if(count($this->menuArr) != 0){  //close the last tags
                echo '</ul></div></li>';
            }

            echo '</ul>';
        echo '</div>';
    }
}