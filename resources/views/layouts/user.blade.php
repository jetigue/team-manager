@include('layouts.header')

{{--@include('layouts.navbar')--}}

<div class="container is-fluid">

    <div class="header">
        @include('layouts.page_header')
    </div>

    <div class="columns">
        <div class="column is-2" id="left-panel">
            @include('layouts.menu')
        </div>

        <div class="column is-8" class="page-content" id="pageContent">
            @yield('content')
        </div>

        <div class="column is-2" id="right-panel">
            @yield('form')
        </div>
    </div>
    @yield('form-modal')
</div>
<div id="flash">
<flash message="{{ session('flash') }}"></flash>
</div>
@include('layouts.footer')