<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin page</title>

    <link rel="stylesheet" type="text/css" href="../../asset/admin/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../asset/admin/dataTable/jquery.dataTables.min.css"/>
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../../asset/admin/css/layout.css"/>
    <link rel="stylesheet" href="../../asset/user/css/font-awesome.min.css">
</head>

<body>
<script type="text/javascript" charset="UTF-8" src="../../asset/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/script.js"></script>
{if $this->admin != ''}
    {if $this->arrParam['action'] != 'login'}
        <div id="header">
            {include file="header_admin.tpl"}
        </div>
        <div id="includetpl">
            <div class="wrapper">
                {include file="menu_admin.tpl"}
                <div class="content_load">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info mt-3">
                            <span>
                                <->
                            </span>
                        </button>

                        <div>
                            {($this->layout()->content)}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            {include file="footer_admin.tpl"}
        </div>
{/if}
{else}
    {($this->layout()->content)}
{/if}

<script type="text/javascript" src="../../asset/admin/bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../../asset/admin/dataTable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../asset/admin/js/menu.js"></script>
</body>

</html>