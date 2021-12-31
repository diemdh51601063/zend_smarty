<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Index page</title>
</head>
<body>

<link rel="stylesheet" type="text/css" href="../../asset/admin/css/admin_login.css"/>
<link rel="stylesheet" type="text/css" href="../../asset/common/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../../asset/common/bootstrap/css/bootstrap-grid.css"/>
<link rel="stylesheet" type="text/css" href="../../asset/common/dataTable/jquery.dataTables.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="../../asset/common/bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../../asset/common/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" charset="UTF-8" src="../../asset/common/dataTable/jquery.dataTables.min.js"></script>

<div id="header">
    {include file="header_admin.tpl"}
</div>

<div>
    {include file="menu.tpl"}
</div>

<div class="container">
    {($this->layout()->content)}
</div>

<div id="footer">
    {include file="footer_admin.tpl"}
</div>

</body>
</html>