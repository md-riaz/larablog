<!--   Side Bar -->

<section class="side-content">
    <div class="about_me">
        <div class="about_me_inner d_flex">
            <div class="avtar">
                <img src="{{ asset('images/me.png')}}" alt="my_avtar">
            </div>
            <div class="title">about me</div>
            <p class="texts">Hi! My name is
                <b>MD Riaz</b>. This is my blog site. It is based on laravel framework. </p>
            <div class="follow_buttons">
                <p class="follow">follow me on
                </p>
                <div class="social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="subscribe">
        <h3 class="bottom_bar">newshelter</h3>
        <form action="{{route('subscribe')}}" method="post">
            @csrf
            <input type="email" name="email" id="email" placeholder="your email address">
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <button type="submit" class="flat-btn">subscribe</button>
        </form>
    </div>
    <div class="follow_insta">
        <h3 class="bottom_bar">follow@md_riaz___</h3>
        <div class="photo_grid d_flex">
            <img src="{{ asset('images/photo_grid/1.jpg')}}" alt="grid_image">
            <img src="{{ asset('images/photo_grid/2.jpg')}}" alt="grid_image">
            <img src="{{ asset('images/photo_grid/3.jpg')}}" alt="grid_image">
            <img src="{{ asset('images/photo_grid/4.jpg')}}" alt="grid_image">
            <img src="{{ asset('images/photo_grid/5.jpg')}}" alt="grid_image">
            <img src="{{ asset('images/photo_grid/6.jpg')}}" alt="grid_image">
            <img src="{{ asset('images/photo_grid/7.jpg')}}" alt="grid_image">
            <img src="{{ asset('images/photo_grid/8.jpg')}}" alt="grid_image">
            <img src="{{ asset('images/photo_grid/9.jpg')}}" alt="grid_image">
        </div>
    </div>
    <div class="category_section">
        <h3 class="bottom_bar">categories</h3>
        <ul>
            @foreach ($categories as $category)
            <li class="menu-item"><a href="{{url('/categories/'.$category->slug)}}">{{ $category->name }}</a>
                <span>{{count($category->posts)}}</span></li> <!-- count how many post in a category -->
            @endforeach
        </ul>
    </div>
    <div class="latest_posts">
        <h3 class="bottom_bar">recent posts</h3>

        <div class="latest_post_wrapper">
            @foreach ($latest as $item)
            <div class="latest_post d_flex">
                <div class="latest_post_preview_img">
                    <img src="{{ asset($item->post_img)}}" alt="preview_img">
                </div>
                <div class="posts_desc">
                    <p class="date">{{ $item->created_at->format('d F, Y')}}</p>
                    <a href="">
                        <h3 class="title">{{ $item->title}}</h3>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="search_bar d_flex">
        <input type="text" name="search" id="search" placeholder="search...">
        <button class="flat-btn"><i class="fas fa-search"></i></button>
    </div>

    <div class="banner">
        <h3 class="bottom_bar">banner</h3>
        <div class="banner_img">
            <img src="{{ asset('images/banner.jpg')}}" alt="banner_img">
        </div>
    </div>

    <div class="follow_fb">
        <h3 class="bottom_bar">find us on Facebook</h3>
        <div class="fb_frame">

        </div>
    </div>

</section>
