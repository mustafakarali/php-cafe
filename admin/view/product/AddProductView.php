<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/public/css/admin/menu.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/public/css/summernote.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/public/css/admin/style.css">
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

    <?php   $leftMenu = new LeftMenu($_SESSION['menuArr']);
            $leftMenu ->outputMenu()?>

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
                        <h1 class="page-header">Add a New Product</h1>

                        <form class="form-horizontal" id="product_form" action="<?php echo ROOT_FILE?>/product/submitProduct" method="post">
                            <input type="hidden" name="imagePath" id="imagePath">
                            <input type="hidden" name="description" id="description">

                            <div class="form-group">

                                <label class="col-lg-2 col-md-2 required" for="proName">Product Name:</label>
                                <div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
                                    <input type="text" class="form-control" id="proName" name="proName" placeholder="Product Name" maxlength="40" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2" for="summernote">Description:</label>
                                <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12">
                                    <div id="summernote"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2" for="proPrice">Price:</label>
                                <div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
                                    <input class="form-control" type="text" id="proPrice" name="proPrice" placeholder="Price" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2" for="proType">Product Category:</label>
                                <div class="col-lg-4 col-md-4 col-xs-10 col-sm-10">
                                    <select class="form-control" name="proType" id="proType">
                                        <?php foreach($_REQUEST['proType'] as $productType){
                                              echo "<option value='".$productType['id']."'>".$productType['productType']."</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2" for="proType">Product Status:</label>
                                <div class="col-lg-4 col-md-4 col-xs-10 col-sm-10">
                                    <select class="form-control" name="proStatus" id="proStatus">
                                            <option value='1' selected>Enable</option>
                                            <option value='0'>Disable</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 col-md-2" for="upFile">Product Image:</label>
                                <div class="col-lg-4 col-md-4 col-xs-10 col-sm-10">
                                    <div class=" upload-btn">
                                        <label for="upFile">Click to Upload a Product Image</label>
                                        <input type="file" id="upFile" name="upFile">
                                        <p id="uploadMsg"></p>
                                    </div>
                                </div>
                                <div id="loadingDiv" class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                                    <img id="loadingImg" class="img-responsive img-rounded" width="24" height="24" src="<?php echo ROOT_PATH; ?>/public/images/loading.gif">
                                </div>
                                <div id="imageDiv" class="col-lg-5 col-md-5 col-xs-10 col-sm-10">

                                    <img id="uploadImg" class="img-responsive img-rounded" width="200" height="100" src="<?php echo ROOT_PATH; ?>/public/images/logo.jpg">
                                    <p id="imageName"></p>
                                    <a id="imageDel" href="#" onclick="imageDelete();">删除</a>
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
<script src="<?php echo ROOT_PATH; ?>/public/js/jquery.form.min.js"></script>
<script src="<?php echo ROOT_PATH;?>/public/js/base.js"></script>
<script src="<?php echo ROOT_PATH;?>/public/js/admin/base/menu.js"></script>
<script src="<?php echo ROOT_PATH;?>/public/js/admin/product/addProduct.js"></script>
</body>
</html>