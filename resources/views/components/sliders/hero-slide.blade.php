<div class="hero-slide-item slider-height swiper-slide bg-color1" {{ $attributes }}>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                <div class="hero-slide-content slider-animated-1">
                    <span class="category">
                        {{ $title }}
                    </span>
                    <h2 class="title-1">
                        {{ $text }}
                    </h2>
                    <a {{ $btn->attributes }} class="btn btn-primary">
                        {{ $btn }}
                    </a>
                </div>
            </div>
            <div
                class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                <div class="show-case">
                    <div class="hero-slide-image">
                        {{ $img }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
