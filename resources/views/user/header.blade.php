<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}">
                <!-- <img width="250" src="{{ url('home/images/logo.png') }}" alt="#" /> -->
                <h2 style="color: red">Mega Store</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home
                            <span class="sr-only">
                                (current)
                            </span>
                        </a>
                    </li>
                    <li class="nav-item" id="active" onclick="changeClass">
                        <a class="nav-link" href="{{url('all_products')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('UserCard/headerCard')}}">CARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('OrdersCancellation')}}">ORDERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>


                    @if (Route::has('login'))
                    @auth

                    <li class="nav-item">
                        <a class="btn btn-danger" href="{{ route('logout') }}">logout</a>
                    </li>


                    @else
                    <li class="nav-item" style="margin-right: 5px;">
                        <a class="btn btn-primary" href="{{ route('login') }}">log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ route('register') }}">
                            Create account

                        </a>
                    </li>
                    @endauth
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>
