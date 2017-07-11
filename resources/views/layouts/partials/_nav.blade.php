<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('welcome') }}"><img alt="EGM" src="{{ asset('pictures/scm_logo.png') }}" style="margin-top: 8px;width:113px;height:36px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('container') || Request::is('container/*') ? "active" : "" }}"><a href="{{ route('container.index') }}">Container</a></li>
                <li class="{{ Request::is('warehouse') || Request::is('warehouse/*') ? "active" : "" }}"><a href="{{ route('warehouse.index') }}">Warehouse</a></li>
                <li class="{{ Request::is('shipment') || Request::is('shipment/*') ? "active" : "" }}"><a href="{{ route('shipment.index') }}">Shipment</a></li>
                <li class="{{ Request::is('customer') || Request::is('customer/*') ? "active" : "" }}"><a href="{{ route('customer.index') }}">Customer</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>