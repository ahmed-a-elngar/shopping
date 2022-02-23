<nav id="navbar">
    <div id="logo" class="col-1">
        <img src="{{asset('pics/logo0.jpg')}}" alt="">
    </div>
    <div class="navbar-list col-3">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('customer_products', 'men')}}">Men</a></li>
            <li><a href="{{route('customer_products', 'women')}}">Women</a></li>
            <li><a href="products.php">Kids</a></li>
            <li><a href="products.php">Gifts</a></li>
        </ul>
    </div>
    <div class="navbar-list col-1">
        <ul class="right">
            <li><a id="search-icon"><i class="fa fa-search"></i></a></li>
            <!-- <li><a href="#"><i class="fa fa-th"></i></a></li> -->
            <li><a href="#"><i class="fa fa-user"></i></a></li>
            <li class="pad-only-left"><a href="{{route('cart')}}" id="cart-icon"><i class="fa fa-cart-arrow-down"></i></a></li>
        </ul>
    </div>
</nav>