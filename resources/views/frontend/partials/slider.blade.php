<section class="carousel carousel-slider center">
    @if($sliders)
        @foreach($sliders as $slider)
            <div class="carousel-item" style="background-image: url({{Storage::url('slider/'.$slider->image)}})" href="#{{$slider->id}}!">

{{--            <div class="carousel-item" style="background-image: url('https://cdn-images-1.medium.com/fit/t/1600/480/0*vCffRQBOE_8X7L-3.');--}}
{{--            background-size: cover!important;--}}
{{--            width: 100% !important;--}}
{{--            height: 100% !important;--}}
{{--            display: inline-block !important;--}}
{{--" href="#{{$slider->id}}!">--}}
                <div class="slider-content">
                    <h2 class="white-text" style="font-weight: bold; font-size: 30px; color: #303f9f !important">{{ $slider->title }}</h2>
                    <p class="white-text" style="font-weight: bold; font-size: 20px; color: #303f9f !important">{{ $slider->description }}</p>
{{--                    <h2 class="white-text" style="font-weight: bold; font-size: 40px">NT - ANH</h2>--}}
{{--                    <p class="white-text" style="font-weight: bold; font-size: 30px; ">Mua bán - Cho thuê - Ký gửi</p>--}}
                </div>
            </div>
        @endforeach
    @else
        <div class="carousel-item amber indigo-text" style="background-image: url({{ asset('frontend/images/real_estate.jpg') }})" href="#1!">
            <h2>Slider Title goes here</h2>
            <p class="indigo-text">Slider description goes here</p>
        </div>
    @endif
</section>