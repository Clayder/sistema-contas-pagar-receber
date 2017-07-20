<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="manifest.json">
</head>
<body>
<div id="wrapper">
    <div class="overlay"></div>
    <!-- Sidebar -->
    <!--
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Bootstrap 3
                </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-folder"></i> Page one</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-file-o"></i> Second page</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-cog"></i> Third page</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Dropdown
                    <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Dropdown heading</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-bank"></i> Page four</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-dropbox"></i> Page 5</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-twitter"></i> Last page</a>
            </li>
        </ul>
    </nav>
    -->
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <!--
        <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form action="" method="POST">
                        <input type="hidden" name="rota" value="cadastrar" />
                        <div class="form-group">
                            <label for="exampleInputEmail1">Palavra:</label>
                            <input type="text" name="palavra" class="form-control" id="palavra" placeholder="" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tradução da palavra:</label>
                            <input type="text" name="palavraTraducao" class="form-control" id="traducao-palavra" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Frase:</label>
                            <input type="text" name="frase" class="form-control" id="frase" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tradução da frase:</label>
                            <input type="text" name="fraseTraducao" class="form-control" id="traducao-frase" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

<script src="assets/js/index.js"></script>

</body>
</html>