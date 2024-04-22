    <!--============================
        HEADER START
    ==============================-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-1 d-lg-none">
                    <div class="wsus__mobile_menu_area">
                        <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                    </div>
                </div>
                <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                    <div class="wsus_logo_area">
                        <a class="wsus__header_logo" href="index.html">
                            <img src="{{ asset('frontend/images/logo_2.png') }}" alt="logo" class="img-fluid w-100">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                    <div class="wsus__search">
                        <form>
                            <input type="text" placeholder="Search...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                    <div class="wsus__call_icon_area">
                        <div class="wsus__call_area">
                            <div class="wsus__call">
                                <i class="fas fa-user-headset"></i>
                            </div>
                            <div class="wsus__call_text">
                                <p>example@gmail.com</p>
                                <p>+569875544220</p>
                            </div>
                        </div>
                        <ul class="wsus__icon_area">
                            <li><a href="wishlist.html"><i class="fal fa-heart"></i><span>05</span></a></li>
                            <li><a href="compare.html"><i class="fal fa-random"></i><span>03</span></a></li>
                            <li><a class="wsus__cart_icon" href="#"><i
                                        class="fal fa-shopping-bag"></i><span>04</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__mini_cart">
            <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
            <ul>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/tab_2.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">apple 9.5" 7 serise tab with full view display</a>
                        <p>$140 <del>$150</del></p>
                    </div>
                </li>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/pro4.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">men's fashion casual watch</a>
                        <p>$130</p>
                    </div>
                </li>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/pro2.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">men's casual shoes</a>
                        <p>$140 <del>$150</del></p>
                    </div>
                </li>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/pro9.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">men's fashion casual sholder bag</a>
                        <p>$140</p>
                    </div>
                </li>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/tab_2.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">apple 9.5" 7 serise tab with full view display</a>
                        <p>$140 <del>$150</del></p>
                    </div>
                </li>
            </ul>
            <h5>sub total <span>$3540</span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="cart_view.html">view cart</a>
                <a class="common_btn" href="check_out.html">checkout</a>
            </div>
        </div>

    </header>
    <!--============================
        HEADER END
    ==============================-->


    {{-- MENU --}}
    @include('frontend.layouts.menu')
    {{-- END MENU --}}

    <!--==========================
        POP UP START
    ===========================-->
    <!-- <section id="wsus__pop_up">
        <div class="wsus__pop_up_center">
            <div class="wsus__pop_up_text">
                <span id="cross"><i class="fas fa-times"></i></span>
                <h5>get up to <span>75% off</span></h5>
                <h2>Sign up to E-SHOP</h2>
                <p>Subscribe to the <b>E-SHOP</b> market newsletter to receive updates on special offers.</p>
                <form>
                    <input type="email" placeholder="Your Email" class="news_input">
                    <button type="submit" class="common_btn">go</button>
                    <div class="wsus__pop_up_check_box">
                    </div>
                </form>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                    <label class="form-check-label" for="flexCheckDefault11">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>
    </section> -->
    <!--==========================
        POP UP END
    ===========================-->