<!DOCTYPE html>
<!--
	/**
     *	The menu page of the website
     ************************************************************************
     *	@Author Xiaoming Yang
     *	@Initial date	29-01-2016 14:51
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
  <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>/public/css/home/menu.css" />
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
	<div class="leftmode container-fluid">
		<div class="row">
			<div id="leftMenus" class="col-lg-3 col-md-3 col-sm-3 " >
				<ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="10">
                    <?php
                        foreach($_REQUEST['proTypeArr'] as $key => $proType){
                            if($key == 0){
                                echo '<li class="active"><a href="#'.str_replace(' ','',$proType['productType']).'"><span class="glyphicon glyphicon-chevron-right chevron-right"></span>'.$proType['productType'].'</a></li>';
                            }else{
                                echo '<li><a href="#'.str_replace(' ','',$proType['productType']).'"><span class="glyphicon glyphicon-chevron-right chevron-right"></span>'.$proType['productType'].'</a></li>';
                            }
                        }
                    ?>
				</ul>
			</div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <?php
                foreach($_REQUEST['productArr'] as $key => $productByType){
                    echo '<h2 id="'.str_replace(' ','',$key).'">'.$key.'</h2>';
                    echo '<table class="table table-bordered table-striped table-hover">';
                    echo    '<tbody>';
                    foreach($productByType as $productBean){
                        echo         '<tr>';
                        echo             '<td>';
                        echo                '<div class="media">';
                        echo                    '<div class="media-left">';
                        echo                        '<a href="latte.html">';
                        echo                            '<img class="media-object" width="200" height="100" src="'.$productBean['imagePath'].'" alt="'.$productBean['productName'].'">';
                        echo                         '</a>';
                        echo                    '</div>';
                        echo                    '<div class="media-body">';
                        echo                    '<h4 class="media-heading"><a href="latte.html">'.$productBean['productName'].'</a>&nbsp;&nbsp;&nbsp; NZ$ '.$productBean['productPrice'].'</h4>';
                        echo                        '<p>'.$productBean['productDescription'].'</p>';
                        echo                    '</div>';
                        echo                '</div>';
                        echo             '</td>';
						echo            '</tr>';
                    }
                    echo    '</tbody>';
				    echo '</table>';
                }
                ?>
            </div>
		</div>
	</div>

	<div class="verticalmode container-fluid">
		<ul class="nav nav-tabs">

            <?php
                foreach($_REQUEST['proTypeArr'] as $key => $proType){
                    if($key == 0){
                        echo '<li class="active"><a href="#'.str_replace(' ','',$proType['productType']).'1" data-toggle="tab">'.$proType['productType'].'</a></li>';
                    }else{
                        echo '<li><a href="#'.str_replace(' ','',$proType['productType']).'1" data-toggle="tab">'.$proType['productType'].'</a></li>';
                    }
                }
            ?>
		</ul>

		<div class="tab-content">

            <?php
                $i = 0;
                foreach($_REQUEST['productArr'] as $key => $productByType){
                    if($i == 0){
                        echo '<div class="tab-pane active" id="'.str_replace(' ','',$key).'1">';
                        $i++;
                    }else{
                        echo '<div class="tab-pane" id="'.str_replace(' ','',$key).'1">';
                    }
                    echo '<div class="constainer">';
                    echo '<div class="row">';
                    echo '<div class="content col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 text-center">';
                    echo '<h2>'.$key.'</h2>';
                    echo '<table class="table table-bordered table-striped table-hover">';
                    echo    '<tbody>';
                    foreach($productByType as $productBean){
                        echo         '<tr>';
                        echo             '<td>';
                        echo                '<div class="media">';
                        echo                    '<div class="media-left">';
                        echo                        '<a href="latte.html">';
                        echo                            '<img class="media-object" width="200" height="100" src="'.$productBean['imagePath'].'" alt="'.$productBean['productName'].'">';
                        echo                         '</a>';
                        echo                    '</div>';
                        echo                    '<div class="media-body">';
                        echo                    '<h4 class="media-heading"><a href="latte.html">'.$productBean['productName'].'</a>&nbsp;&nbsp;&nbsp; NZ$ '.$productBean['productPrice'].'</h4>';
                        echo                        '<p>'.$productBean['productDescription'].'</p>';
                        echo                    '</div>';
                        echo                '</div>';
                        echo             '</td>';
                        echo            '</tr>';
                    }
                    echo    '</tbody>';
                    echo '</table>';
                    echo '</div></div></div></div>';
                }
            ?>
		</div>
	</div>
  </main>
	<footer>
		<div class="copyright opacity8">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<span>Copyright &copy;2015 <a href="<?php echo ROOT_FILE;?>/home/index">Tsun</a></span> |
						<span><a href="privacy.html">Privacy</a></span>
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