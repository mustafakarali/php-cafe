<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2016/1/21
 * Time: 11:40
 */

class AuthModel {

    public function queryAuth($id){
        $sql = "select b.* from t_am_user_auth a,t_am_module b "
               ." where a.moduleId = b.id "
               ." and a.userId = ? "
               ." and b.moduleType <> 1"
               ." order by b.id ";
        return DB::select($sql,[$id]);
    }
}