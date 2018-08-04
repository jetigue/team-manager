@include('layouts.header')

{{--@include('layouts.navbar')--}}

<div class="container site-content is-fluid">

    <div class="header">
        @include('layouts.page_header')
    </div>

    <div class="columns">
        <div class="column is-2" id="userMenu">
            {{--@include('layouts.menu')--}}
            <user-menu></user-menu>
        </div>

        <div class="column is-8" class="page-content" id="userContent">
            @yield('content')
        </div>

        <div class="column is-2" id="right-panel">
            @yield('form')
        </div>
    </div>
</div>
<div id="flash">
    <flash message="{{ session('flash') }}"></flash>
</div>
@include('layouts.footer')