<!-- Sidebar -->
<nav id="sidebar">
    <ul class="list-unstyled components">
        {* <li class="active"> *}
        <p><a href="{$this->url(['controller' => 'admin', 'action' => 'index'])}">MENU</a></p>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Đơn Hàng</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{$this->url(['controller' => 'admin', 'action' => 'order'])}">Chưa xác nhận</a>
                </li>
                <li>
                    <a href="{$this->url(['controller' => 'admin', 'action' => 'order'])}">Đã xác nhận</a>
                </li>
                <li>
                    <a href="{$this->url(['controller' => 'admin', 'action' => 'order'])}">Đã hủy</a>
                </li>
                <li>
                    <a href="{$this->url(['controller' => 'admin', 'action' => 'order'])}">Hoàn tất</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sản
                phẩm</a>
            <ul class="collapse list-unstyled" id="productSubmenu">
                <li>
                    <a href="{$this->url(['controller' => 'product', 'action' => 'add'])}">Thêm sản phẩm</a>
                </li>
                <li>
                    <a href="{$this->url(['controller' => 'admin', 'action' => 'product'])}">Danh sách sản phẩm</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#categorySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Danh mục</a>
            <ul class="collapse list-unstyled" id="categorySubmenu">
                <li>
                    <a href="{$this->url(['controller' => 'category', 'action' => 'add'])}">Thêm danh mục</a>
                </li>
                <li>
                    <a href="{$this->url(['controller' => 'admin', 'action' => 'category'])}">Danh sách danh mục</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#brandSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thương hiệu</a>
            <ul class="collapse list-unstyled" id="brandSubmenu">
                <li>
                    <a href="{$this->url(['controller' => 'brand', 'action' => 'add'])}">Thêm thương hiệu</a>
                </li>
                <li>
                    <a href="{$this->url(['controller' => 'admin', 'action' => 'brand'])}">Danh sách thương hiệu</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{$this->url(['controller' => 'admin', 'action' => 'customer'])}">Danh sách khách hàng</a>
        </li>
    </ul>

</nav>