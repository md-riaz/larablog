<header class="header">
    <div class="header_inside d_flex">
        <div class="navigation-container">
            <div class="menuBar"><i class="fas fa-bars"></i></div>
            <div class="main-nav">
                <nav>
                    <div class="close"><i class="fas fa-times"></i></div>
                    <ul class="menu">
                        <li><a href="{{ URL::to('/') }}">home</a></li>
                        <li class="multi-nav"><a href="#">categories</a>
                            <ul class="sub-menu">
                                @foreach ($categories as $category)
                                    <li class="menu-item"><a
                                            href="{{url('/categories/'.$category->slug)}}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('contact.index') }}">contact</a></li>

                        @if (Route::has('login'))
                            @auth

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

    @if (auth()->user())
        <!-- if login, then show profile menus -->
            <div class="profile_menu">
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hey! {{ auth()->user()->name }}
                    </span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('users.edit',auth()->id()) }}">profile</a>
                        <a class="dropdown-item" href="{{ route('post.create') }}">write post</a>
                        <a class="dropdown-item" href="{{ route('category.create') }}">add category</a>
                        <a class="dropdown-item" href="{{ route('tag.index') }}">Tags</a>
                        <a class="dropdown-item" href="{{ route('category.index') }}">all category</a>
                        <a class="dropdown-item" href="{{ route('users.index') }}">all users</a>
                        <a class="dropdown-item" href="{{ route('post.index') }}">all posts</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="social_btns">
                <div class="social_btn">
                    <i class="fas fa-share-alt"></i>
                </div>

                <div class="social">
                    <a href="https://twitter.com/MDRiaz53949149"><i class="fab fa-twitter"></i></a>
                    <a href="http://www.facebook.com/mdriaz.wd"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/md_riaz___/"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>
        @endif


    </div>
    <div class="logo-container bottom_bar">
        <a href="{{ URL::to('/') }}">Lara Blog</a>
    </div>
</header>
<!--   Header Section End -->
