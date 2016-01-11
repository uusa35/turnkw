<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand ng-binding" href="{{ route('home') }}"><img style="width:15%; background-color: white;" class="img-responsive" src="{{ asset('images/logo.png') }}" alt=""></a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-language fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    {{--{{ Form::open(['method' => 'post','action'=> action('LanguageController@changeLang')]) }}
                    {{ Form::hidden()) }}--}}
                    <a href="/lang/ar"><i class="fa fa-fw fa-language"></i> {{ trans('general.arabic') }}</a>

                </li>
                <li>
                    <a href="/lang/en"><i class="fa fa-fw fa-language"></i> {{ trans('general.english') }}</a>

                </li>
            </ul>
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li class="divider"></li>
                <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> {{ trans('general.logout') }}</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    @include('backend.partials.sidebar')
</nav>