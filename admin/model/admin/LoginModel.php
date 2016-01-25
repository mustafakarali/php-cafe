<?php
/**
 *	LoginModel
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	21-01-2016  11:34
 ************************************************************************
 *	update time			editor				updated information
 *
 */
class LoginModel {

    public function login($userName,$password){
        $sql = 'select * from t_pub_user where userName = ? and userPwd = ?';
        return DB::select($sql,[$userName,$password]);
    }
}