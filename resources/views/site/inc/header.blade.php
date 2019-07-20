<header>
    <div class="header">
        <div class="clearfix menu-wrapper">
            <div class="fleft logo-wrapper">
                <img class="logo-text" src="{{asset('images/kominite.png')}}" alt="logo">
                <img class="logo-flame flame-animation" src="{{asset('images/flame.png')}}" alt="logo">
            </div>
            <div class="fright menu">
                <img src="{{asset('images/menu-icon.png')}}" alt="menu icon">
            </div>
        </div>
        <nav>
            <ul class="clearfix">
                {{--<li><a href="{{ url('/about-us') }}">За нас</a></li>--}}
                <li><a href="{{ url('/') }}">Продукти</a></li>
                <li><a href="">Съвети</a></li>
                <li><a href="{{ url('/gallery') }}">Монтажи</a></li>
                <li><a href="{{ url('/contacts') }}">Контакти</a></li>
            </ul>
        </nav>
    </div>
</header>