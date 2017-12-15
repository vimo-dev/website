<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/"><img height="70px" src="img/vimo.png" alt="Vimo logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">HOME</a>
            </li>
            <li class="nav-item {{ Request::is('roster') ? 'active' : '' }}">
                <a class="nav-link" href="/roster">ROSTER</a>
            </li>
            <li class="nav-item {{ Request::is('matches') ? 'active' : '' }}">
                <a class="nav-link" href="/matches">MATCHES</a>
            </li>
            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </a> -->
        </ul>
        <i class="fa fa-twitter-square nav-icon" aria-hidden="true"></i> 
        <i class="fa fa-facebook-square nav-icon" aria-hidden="true"></i> 
    </div>
</nav>
