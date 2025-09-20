@extends('admin.layout.master')

@section('css')
<link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/apex-charts/apex-charts.css">

@endsection

@section('content')
<div class="row">

    <!-- date -->
    <div class="col-lg-12 col-md-12 col-sm-12 my-2">
        <div class="card bg-analytics text-white">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="avatar avatar-xl bg-primary shadow mt-0">
                        <div class="avatar-content">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-2">{{ \Carbon\Carbon::now()->translatedFormat('l j F Y') }}</h1>
                        <hr>
                        <h3 class="text-bold-700 mb-2">{{ $dataHijri }}</h3>
                        <hr>
                        <h4 class="text-bold-700 mb-2 dashboard-clock-now"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row mt-3">        <!-- users and ranters -->
    <div class="col-lg-6 col-md-6 col-12">
        <a href="" style="color: inherit">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="fa-solid fa-users text-warning font-medium-5" style="font-size: 20px"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25">{{ $usersCount }}</h2>
                    <p class="mb-0">{{  __('routes.admin.users.index') }}</p>
                </div>
                <div class="card-content">
                    <div id="subscribe-users-chart"></div>
                </div>
            </div>
        </a>
    </div>

</div> --}}
<div class="row mt-3">

    <div class="col-lg-3 col-sm-6 mb-4 text-center">
        <a href="http://127.0.0.1:8000/admin/admins"  style="color: inherit">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-info"><i style="font-size: 1.375rem" class="fa-solid fa-user-secret"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">10</h4>
                    </div>
                    <p class="mb-1"> {{__('routes.admin.admins.index')}} </p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 mb-4 text-center">
        <a href="http://127.0.0.1:8000/admin/roles"  style="color: inherit">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-danger"><i style="font-size: 1.375rem" class="fa-solid fa-lock"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">1</h4>
                    </div>
                    <p class="mb-1"> {{__('routes.admin.roles.index')}}  </p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 mb-4 text-center">
        <a href="http://127.0.0.1:8000/admin/users"  style="color: inherit">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-warning"><i style="font-size: 1.375rem" class="fa-solid fa-users"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">100</h4>
                    </div>
                    <p class="mb-1">{{__('routes.admin.users.index')}} </p>
                </div>
            </div>
        </a>
    </div>
    
</div>
@endsection

@section('js')
<script src="{{ asset('/') }}dashboard/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{asset('admin/charts_functions.js')}}"></script>
<script>
    function timeJS() {
        const d             = new Date();
        const local         = d.getTime();
        const offset        = d.getTimezoneOffset() * (60 * 1000);
        const utc           = new Date(local + offset);
        const date          = new Date(utc.getTime() + (3 * 60 * 60 * 1000));
        const options = {
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: true,
        };
        const time = date.toLocaleTimeString('{{ locale() == 'ar' ? 'ar-SA' : 'en-US' }}', options);
        // console.log(time)
        $('.dashboard-clock-now').text(time);
    }

    timeJS();
    setInterval(function () {
        timeJS()
    }, 1000);


</script>
@endsection
