<!DOCTYPE html>
<!--
	/**
     *	The order page of the website
     ************************************************************************
     *	@Author Xiaoming Yang
     *	@Initial date	01-02-2016 14:11
     ************************************************************************
     *	update time			editor				updated information
     *
     */
-->
<html lang="en">
<head>
    <link href="<?php echo ROOT_PATH; ?>/public/images/icon.png" rel="shortcut icon" />
    <title>Tsun Menu</title>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>/public/css/home/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>/public/css/home/order.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <meta name="description" content="New Zealand, Christchurch, delicious cafe and food">
    <style>

    </style>
</head>
<body data-spy="scroll" data-target="#leftMenus">
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse opacity8">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Tsun</a>-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li> <a href="<?php echo ROOT_FILE;?>/home/index">HOME</a> </li>
                <li> <a href="<?php echo ROOT_FILE;?>/product/index">CAFE&nbsp;&amp;&nbsp;FOOD</a> </li>
                <li> <a href="<?php echo ROOT_FILE;?>/order/index">ORDER</a> </li>
                <li> <a href="<?php echo ROOT_FILE;?>/gallery/index">GALLERY</a> </li>
                <li> <a href="<?php echo ROOT_FILE;?>/contact/index">CONTACT US</a> </li>
                <li> <a href="<?php echo ROOT_FILE;?>/about/index">ABOUT</a> </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container wrapper">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <h1 id="about" class="page-header">Order</h1>
                <p>
                    Our order service is available Mon to Fri 7.30am to 5pm and Sat 8am to 2 pm.
                    We specialise in the supply of garnished platters for corporate and private functions with catering available including cocktail items, buffet style meals (salads, meats), morning and afternoon teas, lunches, speciality cakes, breakfasts and desserts.
                </p>
                <strong>Our catering can be tailored to meet your specific needs and budgets.</strong>
                <p>We will try to provide catering if requested on the day but to ensure you get your selection please provide at least 48 hours notice.</p>
                <p>All our food is produced to extremely high standards of workmanship using classical methods and seasonable ingredients. </p>
                <strong>Dietary requirements can be catered for with ease.</strong>
                <h3>How it works:</h3>
                <ol>
                    <li>The customer fill up personal information.</li>
                    <li>The customer choose his/her favorite food and how many he/she want.</li>
                    <li>We will receive an email containing the detailed order information.</li>
                    <li>We will double confirm with customer though email or phone</li>
                    <li>All meals are individually bagged and ready for your eating at your chosen time.</li>
                </ol>
                <h1 id="team" class="page-header">Menus</h1>
                <h3>Our order menus include:</h3>
                <ul>
                    <li>Lunch and teas and main meals</li>
                    <li>Cocktail for a range of finger foods</li>
                    <li>Sweet treats for individual cocktail sweets, cakes and tarts</li>
                </ul>
                <a href="<?php echo ROOT_FILE;?>/order/orderDetail" class="btn btn-lg btn-block btn-primary" id="link-order" >Order Now</a>
            </div>
        </div>
    </div>

</main>
<footer>
    <div class="copyright opacity8">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span>Copyright &copy;2015 <a href="<?php echo ROOT_FILE;?>/home/index">Tsun</a></span> |
                    <span><a href="#">Privacy</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo ROOT_PATH; ?>/public/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo ROOT_PATH; ?>/public/js/bootstrap.min.js"></script>
<script src="<?php echo ROOT_PATH; ?>/public/js/public.js"></script>
</body>
</html>