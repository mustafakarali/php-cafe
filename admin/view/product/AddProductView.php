<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/public/css/menu.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/public/css/summernote.css">
	<link href="<?php echo ROOT_PATH; ?>/public/css/font-awesome.min.css" rel="stylesheet">
	
	<title>Add Product</title>
</head>

<body>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myCollapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Tsun Cafe</a>
    </div>
    <!-- navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <?php $_SESSION['leftMenu']->outputMenu()?>

    <!-- sidebar -->
</nav>

<main>
    <div id="page-wrapper">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo ROOT_FILE;?>/login/main">Home</a></li>
                            <li><a href="<?php echo ROOT_FILE;?>/product/addProduct">Add Product</a></li>
                        </ol>
                        <h1 class="page-header">Add a New <Product></Product></h1>
                        <form class="form-horizontal" id="topic_form" action="<?php echo ROOT_FILE?>/topic/addTopic" method="post">
                            <input type="hidden" name="content" id="content">

                            <div class="form-group">
                                <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" maxlength="40" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" maxlength="40" required="required">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-center post-button">
                                <input class="btn btn-primary" type="button" onClick="doSubmit()" value="Post">
                                <input class="btn btn-primary" type="button" value="Cancel">
                            </div>
                        </form>
                    </div>
                </div>

            <div id = "exitModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirm</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to exit?</p>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-primary" id="deleteBtn" onclick="doExit()">Quit</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
</main>

<footer>

</footer>



<script src="<?php echo ROOT_PATH; ?>/public/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo ROOT_PATH; ?>/public/js/bootstrap.min.js"></script>
<script src="<?php echo ROOT_PATH; ?>/public/js/summernote.min.js"></script>
<script src="<?php echo ROOT_PATH;?>/public/js/base.js"></script>
<script src="<?php echo ROOT_PATH;?>/public/js/admin/menu.js"></script>
<script src="<?php echo ROOT_PATH;?>/public/js/admin/login.js"></script>
</body>
</html>