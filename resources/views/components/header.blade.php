<header class="header">
    <div class="header_inside d_flex">
        <div class="navigation-container">
            <div class="menuBar"><i class="fas fa-bars"></i></div>
            <div class="main-nav">
                <nav>
                    <div class="close"><i class="fas fa-times"></i></div>
                    <ul class="menu">
                        <li><a href="{{ URL::to('/') }}">home</a></li>
                        <li class="multi-nav"><a href="#" class="">features</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="#">Classic</a></li>
                                <li class="menu-item"><a href="#">Two Columns</a></li>
                                <li class="menu-item"><a href="#">Three Columns</a></li>
                                <li class="menu-item"><a href="#">Masonry</a></li>
                            </ul>
                        </li>
                        <li class="multi-nav"><a href="#">categories</a>
                            <ul class="sub-menu">
                                @foreach ($categories as $category)
                                    <li class="menu-item"><a href="{{url('/categories/'.$category->slug)}}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#">contact</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li class="multi-nav">
                                    <a href="javascript:void;">Admin</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ URL::to('users') }}">all users</a></li>
                                        <li><a href="{{ URL::to('category') }}">all category</a></li>
                                        <li><a href="{{ URL::to('post') }}">all posts</a></li>
                                        <li><a href="{{ URL::to('category/create') }}">add category</a></li>
                                        <li><a href="{{ URL::to('post/create') }}">write post</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">register</a>
                                </li>
                            @endauth
                        @endif

                    </ul>
                </nav>
            </div>
        </div>
        <div class="social_btns">
            <div class="social_btn">
                <i class="fas fa-share-alt"></i>
            </div>

            <div class="social">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
            </div>
        </div>
    </div>
    <div class="logo-container bottom_bar">
        <a href="{{ URL::to('/') }}">Riaz Blog</a>
    </div>
</header>
<!--   Header Section End -->
