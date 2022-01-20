
<div class="header_admin">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">QUẢN TRỊ WEBSITE</a>
        <div>
        <i class="fa fa-user"></i> Hello, {$admin.last_name}
        <a href="{{$this->url(['controller' => 'admin', 'action' => 'logout'])}}"><button class ='btn btn-danger ml-2'><i class="fa fa-sign-out"></i></button></a>
        </div>
    </nav>
</div>