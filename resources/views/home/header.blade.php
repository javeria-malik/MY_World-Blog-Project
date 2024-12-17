<div class="header_main">
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo_mobile"><a href="{{ url('/') }}"><img src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Posts</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categories as $category)
                                <!-- Adjusted link to use the correct route and category slug -->
                                <a class="dropdown-item" href="{{ route('category.posts', ['slug' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @if(auth()->user()->isAdmin())
                                <li class="nav-item">
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="logo"><a href="{{ url('/') }}"><img src="images/logo.png"></a></div>
        <div class="menu_main">
            <ul>
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a class="nav-link" href="{{ route('services') }}">Posts</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <!-- Adjusted link to use the correct route and category slug -->
                            <a class="dropdown-item" href="{{ route('category.posts', ['slug' => $category->slug]) }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
                @if (Route::has('login'))
                   @auth
                      <li> 
                           <x-app-layout></x-app-layout>
                      </li>
                      @if(auth()->user()->isAdmin())
                        <li>
                          <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                        </li>
                      @endif
                      @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                      @endauth
                @endif
            </ul>
        </div>
    </div>
</div>
<style>
    .dropdown-menu .dropdown-item {
    color: black !important; /* Ensures that the font color is always black */
}

.dropdown-menu .dropdown-item:hover {
    
    color: black; /* Ensure text stays black on hover */
}

</style>