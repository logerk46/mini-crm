@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>@yield('title_table')</b>
                </div>
                <div class="card-body pb-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                @yield('companies')
                @yield('employers')
                @yield('newcompany')
                @yield('editcompany')
                @yield('addemployer')
                @yield('edit_employer')
            </div>
        </div>
    </div>
</div>
@endsection
