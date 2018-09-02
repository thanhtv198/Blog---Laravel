@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{--DB_CONNECTION=pgsql--}}
{{--DB_HOST=ec2-54-235-193-34.compute-1.amazonaws.com--}}
{{--DB_PORT=5432--}}
{{--DB_DATABASE=d6acpd7tnavkt5--}}
{{--DB_USERNAME=obtmikbkavriob--}}
{{--DB_PASSWORD=d8dc1e19968548112d920ea0919b732b3234a4cc4300e003331bbca76427f672--}}

{{--DB_CONNECTION=mysql--}}
{{--DB_HOST=127.0.0.1--}}
{{--DB_PORT=3306--}}
{{--DB_DATABASE=blog--}}
{{--DB_USERNAME=root--}}
{{--DB_PASSWORD=55555555--}}