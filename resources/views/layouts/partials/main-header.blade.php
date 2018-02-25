<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="{{ $url }}">{{ $title }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form id="form-logout" action="{{ route('logout') }}" method="post" style="display:none">
                        {{ csrf_field() }}
                    </form>
                    <a id="btn-logout" href="javascript:void(0);">
                        <i class="ti-power-off"></i>
                        <p>Keluar</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
