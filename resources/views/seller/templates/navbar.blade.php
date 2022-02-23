<div class="logo-section">
    <img src="{{ asset('pics/logo0.jpg') }}">
</div>
<div class="nav-section">
    <ul>
        <li {{request()->route()->named('new_product')? 'class=active' : ''}}><a href="{{route('new_product')}}" title="Add New Product">New Product</a></li>
        <li {{request()->route()->named('orders')? 'class=active' : ''}}><a href="../public/orders" title="View Orders">Orders</a></li>
        <li {{request()->route()->named('products')? 'class=active' : ''}} {{request()->route()->named('index')? 'class=active' : ''}}><a href="{{route('products')}}" title="View Products">Products</a></li>
        <li><a href="../public/statistics" title="View Statistics">Statistics</a></li>
        <li><a href="../public/settings" title="View Settings">Settings</a></li>
        <li><a href="{{route('out')}}" title="Log Out">Log Out</a></li>

    </ul>
</div>