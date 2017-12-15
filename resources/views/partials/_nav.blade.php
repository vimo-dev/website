<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/"><img height="70px" src="img/vimo.png" alt="Vimo logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">HOME</a>
            </li>
            <li class="nav-item {{ Request::is('roster') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('roster') }}">ROSTER</a>
            </li>
            <li class="nav-item {{ Request::is('matches') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('matches') }}">MATCHES</a>
            </li>
            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </a> -->
        </ul>
        <div class="collapse navbar-collapse hidden-xs">
            <ul class="navbar-nav ml-auto">
                @guest
                {{--  href {{ route('login') }}  --}}
                <li class="nav-item dropdown login-area"><a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Login <i class="fa fa-sign-in" style="margin-left: 5px;" aria-hidden="true"></i></a>
                    @include('auth.login')
                </li>
                <li class="nav-item dropdown login-area"><a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Register <i class="fa fa-pencil-square-o" style="margin-left: 5px;" aria-hidden="true"></i></a>
                    @include('auth.register')
                </li>

                @else

                <li class="nav-item dropdown login-area">
                    <a href="#" class="nav-link dropdown-toggle" style="color: white;" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}" id="dropdown-logout"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                Logout 
                                <i class="fa fa-sign-out" style="margin-left: 5px;" aria-hidden="true"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

                @endguest
                
                <li>
                    <a class="nav-link" href="https://twitter.com/"><i class="fa fa-twitter-square nav-icon" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a class="nav-link" href="https://www.facebook.com/"><i class="fa fa-facebook-square nav-icon" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
