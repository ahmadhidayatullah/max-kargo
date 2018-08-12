<div class="sidebar-wrapper">
    @if (Auth::User()->level == "master")
    <ul class="nav">
        <li class="{{ set_active('app.dashboard') }}">
            <a href="{{ route('app.dashboard') }}">
                <i class="ti-dashboard"></i>
                <p>Beranda</p>
            </a>
        </li>
        <li class="{{set_active('users.index')}}">
            <a href="{{route('users.index')}}">
                <i class="ti-user"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="{{ set_active('origin.index') }}">
            <a data-toggle="collapse" href="#deliveryOverview2">
                <i class="ti-package"></i>
                <p>Setting<b class="caret"></b></p>
            </a>
            <div class="collapse {{ set_active('origin.index', 'in') }}" id="deliveryOverview2">
                <ul class="nav">
                    <li class="">
                        <a href="{{route('setting.index')}}">
                            <span class="sidebar-mini">$</span>
                            <span class="sidebar-normal">Website</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('charges.index')}}">
                            <span class="sidebar-mini">$</span>
                            <span class="sidebar-normal">Charge</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('origins.index')}}">
                            <span class="sidebar-mini">FR</span>
                            <span class="sidebar-normal">Origin</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('destinations.index')}}">
                            <span class="sidebar-mini">TO</span>
                            <span class="sidebar-normal">Destionation</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('comoditytype.index')}}">
                                <span class="sidebar-mini">CT</span>
                                <span class="sidebar-normal">Commodity Type</span>
                            </a>
                    </li>
                    <li class="">
                        <a href="{{route('commodities.index')}}">
                                <span class="sidebar-mini">CO</span>
                                <span class="sidebar-normal">Commodity</span>
                            </a>
                    </li>
                    <li class="">
                        <a href="{{route('costs.index')}}">
                            <span class="sidebar-mini">$</span>
                            <span class="sidebar-normal">Cost</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="{{ set_active('confirmations.index') }}">
            <a href="{{ route('confirmations.index') }}">
                <i class="ti-money"></i>
                <p>Konfirmasi Pembayaran</p>
            </a>
        </li>
        <li class="{{ set_active('tasks.index') }}">
            <a data-toggle="collapse" href="#deliveryOverview">
                <i class="ti-package"></i>
                <p>Pengiriman<b class="caret"></b></p>
            </a>
            <div class="collapse {{ set_active('tasks.index', 'in') }}" id="deliveryOverview">
                <ul class="nav">
                    @foreach (statuses() as $status)
                    <li class="">
                        <a href="{{ route('tasks.index', $status->name) }}">
                            <span class="sidebar-mini">{{ $status->name }}</span>
                            <span class="sidebar-normal">{{ $status->display_name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li class="{{set_active('orders.list')}}">
            <a href="{{route('orders.list')}}">
                <i class="ti-shopping-cart"></i>
                <p>Data Pemesan</p>
            </a>
        </li>
        <li class="{{set_active('refunds.index')}}">
            <a href="{{route('refunds.index')}}">
                <i class="ti-reload"></i>
                <p>Data Refund</p>
            </a>
        </li>
        <li class="">
            <a data-toggle="collapse" href="#deliveryOverview3">
                <i class="ti-book"></i>
                <p>Laporan<b class="caret"></b></p>
            </a>
            <div class="collapse {{ set_active_group('reports') }}" id="deliveryOverview3">
                <ul class="nav">
                    <li class="{{set_active_group('reports.index')}}">
                        <a href="{{route('reports.index')}}">
                            <span class="sidebar-mini">SE</span>
                            <span class="sidebar-normal">SEMUA</span>
                        </a>
                    </li>
                    <li class="{{set_active_group('reports.masuk')}}">
                        <a href="{{route('reports.masuk')}}">
                            <span class="sidebar-mini">MA</span>
                            <span class="sidebar-normal">MASUK</span>
                        </a>
                    </li>
                    <li class="{{set_active_group('reports.batal')}}">
                        <a href="{{route('reports.batal')}}">
                            <span class="sidebar-mini">BA</span>
                            <span class="sidebar-normal">BATAL</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    @endif @if (Auth::User()->level == "kurir")
    <ul class="nav">
        <li class="{{ set_active('app.dashboard') }}">
            <a href="{{ route('app.dashboard') }}">
                <i class="ti-dashboard"></i>
                <p>Beranda</p>
            </a>
        </li>
        <li class="{{ set_active('tasks.index') }}">
            <a data-toggle="collapse" href="#deliveryOverview">
                <i class="ti-package"></i>
                <p>Pengiriman<b class="caret"></b></p>
            </a>
            <div class="collapse {{ set_active('tasks.index', 'in') }}" id="deliveryOverview">
                <ul class="nav">
                    <li class="">
                        <a href="{{ route('tasks.index', 'pe') }}">
                            <span class="sidebar-mini">PE</span>
                            <span class="sidebar-normal">Pending</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    @endif
</div>