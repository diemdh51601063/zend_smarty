    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Cần hỗ trợ hoặc liên hệ</p>
                        <form>
                            <input class="input" type="email" placeholder="Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i></button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Thông Tin Giới Thiệu</h3>
                            <p>
                            Tai nghe Bluetooth
                            <br>
                            Tai nghe chụp đầu
                            </p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Pho Quang</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6 text-right">
                        <div class="footer">
                            <h3 class="footer-title">Danh Mục Nổi Bật</h3>
                            <ul class="footer-links">
                                {foreach $list_category as $category}
                                    {if $category.id < 5}
                                        <li><a href="{{$this->url(['controller' => 'index', 'action' => 'view'])}}?category_id={$category.id}">{$category.category_name}</a></li>
                                    {/if}
                                {/foreach}
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6 text-right">
                        <div class="footer">
                            <h3 class="footer-title">Thương Hiệu</h3>
                            <ul class="footer-links">
                                {foreach $list_brand as $brand}
                                    {if $brand.id < 5}
                                        <li><a href="{{$this->url(['controller' => 'index', 'action' => 'view'])}}?brand_id={$brand.id}" >{$brand.brand_name}</a></li>
                                    {/if}
                                {/foreach}
                            </ul>
                        </div>
                    </div>


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->
    </footer>
<!-- /FOOTER -->