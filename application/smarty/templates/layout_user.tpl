{* <html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User page</title>
    <link rel="stylesheet" type="text/css" href="../../asset/common/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../asset/common/dataTable/jquery.dataTables.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
</head>

<body>

    <script type="text/javascript" charset="UTF-8" src="../../asset/common/jquery/jquery-3.5.1.min.js"></script>

    <h1>LAYOUT USER</h1>
    <p>My first paragraph.</p>
    <div id="header">
        {include file="header_user.tpl"}
    </div>

    <div class="container">
        {$this->layout()->content}
    </div>

    <div id="footer">
        {include file="footer_user.tpl"}
    </div>

    <script type="text/javascript" charset="UTF-8" src="../../asset/common/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" charset="UTF-8" src="../../asset/common/dataTable/jquery.dataTables.min.js"></script>
</body>

</html> *}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../../asset/user/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="../../asset/user/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="../../asset/user/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="../../asset/user/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../../asset/user/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../../asset/user/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <div id="header">
        {include file="header_user.tpl"}
    </div>

    <script src="../../asset/user/js/jquery.min.js"></script>
    <div id="content">
        {$this->layout()->content}
    </div>

    <div id="footer">
        {include file="footer_user.tpl"}
    </div>

    <!-- jQuery Plugins -->
   
    <script src="../../asset/user/js/bootstrap.min.js"></script>
    <script src="../../asset/user/js/slick.min.js"></script>
    <script src="../../asset/user/js/nouislider.min.js"></script>
    <script src="../../asset/user/js/jquery.zoom.min.js"></script>
    <script src="../../asset/user/js/main.js"></script>

</body>

</html>