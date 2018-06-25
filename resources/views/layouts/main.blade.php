@include('layouts.header')

@include('layouts.hero')
<div class="container site-content pt-3">
    <div id="modal">
        <button @click="showFormModal=true" class="btn btn-primary">Open Modal</button>

        <form-modal v-if="showFormModal"></form-modal>
    </div>

    @yield('content')
    <flash message="{{ session('flash') }}"></flash>
</div>



@include('layouts.footer')
