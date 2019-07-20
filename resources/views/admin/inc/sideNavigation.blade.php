<nav class="side-nav">
    <div class="alert alert-success success-block">
        <strong>Добре дошъл {{ Auth::user()->email }}</strong>
        <br />
        <a class="btn btn-success" href="{{ url('/admin/logout') }}">Logout</a>
    </div>
    <ul>
        <li>
            <a href="{{ url('/admin/products') }}">Продукти</a>
        </li>
        <li>
            <a href="{{ url('/admin/gallery') }}">Монтажи</a>
        </li>
        <li>
            <a href="{{ url('/admin/blog') }}">Съвети</a>
        </li>
        <li>
            <a href="{{ url('/admin/about-us') }}">За нас</a>
        </li>
        <li>
            <a href="{{ url('/admin/contacts') }}">Контакти</a>
        </li>
    </ul>
</nav>