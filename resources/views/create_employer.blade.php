@extends('home')

@section('title_table', 'Add employer')

@section('addemployer')
    @if ($errors->any())
        <div class="alert alert-danger col-md-11 ml-5">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="mb-2 mt-2">{{$error}}</li>
                @endforeach
                <ul>
        </div>
    @endif
    <div class="col-md-6 m-auto">
        <form method="post" action="{{ action('EmployerController@store', $company_id) }}" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="POST">
            <div class="form-group row">
                <label for="fname" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                    <input name="fname" type="text" class="form-control" placeholder="First Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                    <input name="lname" type="text" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input name="phone" type="text" class="form-control"placeholder="Phone">
                </div>
            </div>
            <div class="form-group row">
                <div class="m-auto">
                    <button type="submit" class="btn btn-primary">Add Employer</button>
                </div>
            </div>
        </form>
    </div>
@endsection