# SQL Manager Lite for MySQL 5.5.3.46192
# ---------------------------------------
# Host     : 192.168.56.2
# Port     : 3306
# Database : cafe


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `cafe`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `cafe`;

#
# Structure for the `t_am_module` table : 
#

CREATE TABLE `t_am_module` (
  `id` VARCHAR(10) COLLATE utf8_general_ci NOT NULL COMMENT 'id',
  `moduleName` VARCHAR(24) COLLATE utf8_general_ci NOT NULL COMMENT 'module name',
  `moduleType` INTEGER(1) DEFAULT NULL COMMENT 'module type 1:system 2:module 3:page 4:button',
  `moduleUrl` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'module URL',
  `moduleParent` VARCHAR(15) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'parent module id of current module',
  `moduleDescription` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'module description',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `t_am_user_auth` table : 
#

CREATE TABLE `t_am_user_auth` (
  `id` VARCHAR(13) COLLATE utf8_general_ci NOT NULL COMMENT 'id',
  `userId` INTEGER(15) DEFAULT NULL COMMENT 'user id',
  `moduleId` INTEGER(10) DEFAULT NULL COMMENT 'module id',
  `description` VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'description',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `t_pm_product` table : 
#

CREATE TABLE `t_pm_product` (
  `id` CHAR(13) COLLATE utf8_general_ci NOT NULL COMMENT 'id',
  `productName` VARCHAR(40) COLLATE utf8_general_ci NOT NULL COMMENT 'product name',
  `productPrice` DECIMAL(8,2) DEFAULT NULL COMMENT 'product price',
  `productDescription` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'product description',
  `imagePath` VARCHAR(150) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'product image path, relative to the /public/cache folder',
  `productType` VARCHAR(13) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'product type, refer to t_pm_product_type.id',
  `productStatus` INTEGER(1) DEFAULT NULL COMMENT 'product status 0:disable 1:enable',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `t_pm_product_type` table : 
#

CREATE TABLE `t_pm_product_type` (
  `id` VARCHAR(13) COLLATE utf8_general_ci NOT NULL COMMENT 'id',
  `productType` VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'product type',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `t_pub_user` table : 
#

CREATE TABLE `t_pub_user` (
  `userId` VARCHAR(13) COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `userName` VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL,
  `userPwd` VARCHAR(15) COLLATE utf8_general_ci DEFAULT NULL,
  `userNickname` VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL,
  `userEmail` VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL,
  `userBirthday` DATE DEFAULT NULL,
  `userSex` INTEGER(1) DEFAULT NULL,
  `userLevel` INTEGER(2) DEFAULT NULL,
  `registerTime` DATETIME DEFAULT NULL,
  `userStatus` INTEGER(2) DEFAULT NULL,
  `userPoint` INTEGER(8) DEFAULT NULL,
  `description` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`userId`) USING BTREE
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Data for the `t_am_module` table  (LIMIT 0,500)
#

INSERT INTO `t_am_module` (`id`, `moduleName`, `moduleType`, `moduleUrl`, `moduleParent`, `moduleDescription`) VALUES
  ('10','Cafe',1,'#','0','cafe backend management system'),
  ('10100','Product',2,'#','10','product module'),
  ('10100100','Add Product',3,'/product/addProduct','10100','add product page'),
  ('10100105','Query Product',3,'#','10100','query product page'),
  ('10200','Authority',2,'#','10','authority module'),
  ('10200100','Assign Authorities',3,'#','10200','authority assignment page');
COMMIT;

#
# Data for the `t_am_user_auth` table  (LIMIT 0,500)
#

INSERT INTO `t_am_user_auth` (`id`, `userId`, `moduleId`, `description`) VALUES
  ('10',1,10,NULL),
  ('10100',1,10100,NULL),
  ('10100100',1,10100100,NULL),
  ('10100105',1,10100105,NULL),
  ('10200',1,10200,NULL),
  ('10200100',1,10200100,NULL);
COMMIT;

#
# Data for the `t_pm_product` table  (LIMIT 0,500)
#

INSERT INTO `t_pm_product` (`id`, `productName`, `productPrice`, `productDescription`, `imagePath`, `productType`, `productStatus`) VALUES
  ('56abfd09f2730','Latte',7.40,'<p><span style=\"color: rgb(51, 51, 51); line-height: 18.1818px; background-color: rgb(249, 249, 249);\">A latte is a coffee drink made with espresso and steamed milk. One traditional drinking coffee, usually as part of breakfast in the home.</span><br></p>','/cafe/images/product/01301300_latte.jpg','1',1),
  ('56ac1ad36ef42','Cream Latte ',8.40,'<p><span style=\"color: rgb(51, 51, 51); line-height: 18.1818px;\">A cream latte is a coffee drink made with espresso, steamed milk and ice cream.</span><br></p>','/cafe/images/product/01301507_creamlatte.jpg','1',1),
  ('56ac1afc25776','Cappuccino',6.50,'<p><span style=\"color: rgb(51, 51, 51); line-height: 18.1818px; background-color: rgb(249, 249, 249);\">A cappuccino is an Italian coffee drink which is traditionally prepared with espresso, hot milk and steamed milk foam. Cream may be used instead of milk and is often topped with cinnamon. It is typically smaller in volume than a coffee latte, with a thicker layer of micro foam.</span><br></p>','/cafe/images/product/01301507_cappuccino.jpg','1',1),
  ('56ac1b1fa94c0','Espresso',5.00,'<p><span style=\"color: rgb(51, 51, 51); line-height: 18.1818px; background-color: rgb(245, 245, 245);\">Espresso is coffee brewed by forcing a small amount of nearly boiling water under pressure through finely ground coffee beans. Espresso is generally thicker than coffee brewed by other methods, has a higher concentration of suspended and dissolved solids, and has crema on top (a foam with a creamy consistency).</span><br></p>','/cafe/images/product/01301508_espresso.jpg','1',1),
  ('56ac1b96792bb','Bacon',6.20,'<p>A bacon sandwich is a sandwich of cooked bacon between bread that is usually spread with butter, and may be seasoned with ketchup or brown sauce.<br></p>','/cafe/images/product/01301510_bacon.jpg','2',1),
  ('56ac1bc817ad9','Chicken salad sandwich',4.50,'<p>Chicken salad is any salad that counts chicken as a main ingredient. Other common ingredients may include mayonnaise, hard-boiled egg, celery, onion, pepper, pickles and a variety of mustards.<br></p>','/cafe/images/product/01301511_chicken_salad.jpg','2',1),
  ('56ac1befd6b86','Bacon, egg and cheese',4.80,'<p>A bacon, egg and cheese sandwich is a breakfast sandwich popular in the United States, made with bacon, eggs (typically fried or scrambled), cheese and bread, which may be buttered and toasted.<br></p>','/cafe/images/product/01301511_bacon_egg_cheese.jpg','2',1),
  ('56ac1c2cb437a','Apple pie',16.00,'<p>An apple pie is a fruit pie in which the principal filling ingredient is apple. It is, on occasion, served with whipped cream or ice cream on top, or alongside cheddar cheese.<br></p>','/cafe/images/product/01301512_apple_pie.jpg','3',1),
  ('56ac1c6759e9f','Blueberry Pie',18.50,'<p>Blueberry pie is a pie with a blueberry filling. Blueberry pie is considered one of the easiest pies to make because it does not require pitting or peeling of fruit. It usually has a top and bottom crust.<br></p>','/cafe/images/product/01301513_blueberry_pie.jpg','3',1),
  ('56ac1c8eb37df','Egg tart',4.50,'<p>A baked pastry consisting of egg custard in a cookie crust or puff crust<br></p>','/cafe/images/product/01301514_Egg_tarts.jpg','3',1),
  ('56ac1cc7b1c82','Banana cream pie',4.50,'<p>A cream pie made with a rich custard made from milk, cream, flour, and eggs and combined with sliced bananas in a pastry or graham crumb crust. It is often made with a whipped cream topping.<br></p>','/cafe/images/product/01301515_Banana_cream_pie.jpg','3',1),
  ('56ac1d05cbbd4','Fruit Salad ',5.20,'<p>Fruit salad is a dish consisting of various kinds of fruit, sometimes served in a liquid, either in their own juices or a syrup. When served as an appetizer or as a dessert, a fruit salad is sometimes known as a fruit cocktail or fruit cup.<br></p>','/cafe/images/product/01301516_fruit_salad.jpg','4',1),
  ('56ac1d25a9098','Chef Salad ',6.10,'<p>Chef salad (or chef''s salad) is a salad consisting of hard-boiled eggs; one or more varieties of meat, such as ham, turkey, chicken, or roast beef; tomatoes; cucumbers; and cheese; all placed upon a bed of tossed lettuce or other leaf vegetables.</p><div><br></div>','/cafe/images/product/01301517_chef_salad.jpg','4',1),
  ('56ac1d4b7e5fe','Coleslaw',4.50,'<p>Coleslaw (also known as Cole slaw) is a salad consisting primarily of finely-shredded raw cabbage and dressed most commonly with a vinaigrette salad dressing.<br></p>','/cafe/images/product/01301517_coleslaw.jpg','4',1),
  ('56ac1d88aa917','Golbaengi muchim',6.80,'<p>Golbaengi muchim is a type of Korean salad mainly consumed as anju when drinking alcoholic beverages such as soju or beer. It is made with Neverita didyma (a sea snail), dried shredded squid or dried Alaska pollack, vegetables such as sliced cucumber, and shredded scallions, and mixed with a hot and spicy sauce.<br></p>','/cafe/images/product/01301518_golbaengi_muchim.jpg','4',1);
COMMIT;

#
# Data for the `t_pm_product_type` table  (LIMIT 0,500)
#

INSERT INTO `t_pm_product_type` (`id`, `productType`) VALUES
  ('1','Coffee'),
  ('2','Sandwiches'),
  ('3','Pies'),
  ('4','Fresh Salads');
COMMIT;

#
# Data for the `t_pub_user` table  (LIMIT 0,500)
#

INSERT INTO `t_pub_user` (`userId`, `userName`, `userPwd`, `userNickname`, `userEmail`, `userBirthday`, `userSex`, `userLevel`, `registerTime`, `userStatus`, `userPoint`, `description`) VALUES
  ('1','tom','admin','tom',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;