<!--============================
        BANNER PART 2 START
    ==============================-->
    <section id="wsus__banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__banner_content">
                        <div class="row banner_slider">
                            @foreach ($slider as $banner)
                                <div class="col-xl-12">
                                    <div class="wsus__single_slider" style="background: url({{ asset($banner->banner) }});">
                                        <div class="wsus__single_slider_text">
                                            <h3>{!! $banner->type !!}</h3>
                                            <h1>{!! $banner->title !!}</h1>
                                            <h6>start at ${!! $banner->starting_price !!}</h6>
                                            <a class="common_btn" href="{{ $banner->btn_url }}">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BANNER PART 2 END
    ==============================-->