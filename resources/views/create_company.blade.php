@extends('home')

@section('title_table', 'Create Company')

@section('newcompany')
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
        <form method="post" action="{{ action('CompanyController@store') }}" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="POST">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" placeholder="Company Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="website" class="col-sm-3 col-form-label">Website</label>
                <div class="col-sm-9">
                    <input name="website" type="text" class="form-control"placeholder="Website">
                </div>
            </div>
            <div class="form-group row">
                <label for="companylogo" class="col-sm-3 col-form-label">Company logo</label>
                <div class="col-sm-9">
                    <input name="image" type="file">
                </div>
            </div>
            <div class="form-group row">
                <div class="m-auto">
                    <button type="submit" class="btn btn-primary">Create Company</button>
                </div>
            </div>
        </form>
    </div>
@endsection