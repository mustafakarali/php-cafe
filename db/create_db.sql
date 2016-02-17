CREATE DATABASE cafe DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci

grant all privileges on cafe.* to 'cafeadmin'@'%' identified by 'admin';
grant all privileges on cafe.* to 'cafeadmin'@'localhost' identified by 'admin';