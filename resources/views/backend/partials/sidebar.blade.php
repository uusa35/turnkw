<div class="navbar-default navbar-static-side" role="navigation" style="top:55px;">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ url('http://turnkw.ideasowners.net') }}"><i class="fa fa-home fa-fw"></i>{{ trans('general.home') }}</a>
            </li>
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('general.dashboard') }}</a>
            </li>
            <li>
                <a href="/translations"><i class="fa fa-pencil-square fa-fw"></i> {{ trans('general.translation') }}<span class="fa arrow"></span></a>
            </li>
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->