@include('layouts.header')

@include('layouts.navbar')
<div>
    <div class="container-fluid py-lg-5" id="main-banner">
        <div class="row">
            <div class="col-8">
                <h3>Lambert High School</h3>
                <h5>Cross Country and Distance Running</h5>
            </div>
            <div class="col">
                <h5>2016 State Champions</h5>
                <h5>2017 State Runner-Up</h5>
            </div>
        </div>
    </div>
</div>

<div class="container site-content">
    <section class="section page-content">
        <a href="{{ url('track/meets')}}">Track Meets</a>

        <div id="modal">
            <button @click="showFormModal=true" class="btn btn-primary">Open Modal</button>

            <form-modal v-if="showFormModal"></form-modal>
        </div>
        @yield('content')
    </section>
</div>

@include('layouts.footer')