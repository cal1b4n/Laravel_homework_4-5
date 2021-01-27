@extends('Layouts.app')

@section('content')
    <h1  style="margin-top: 20px">Add Company</h1>
    <form action="{{ route('companies.store') }}" method="POST" autocomplete="off">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Code</label>
            <input name="code" type="number" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" type="text" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>City</label>
            <input name="city" type="text" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Country</label>
            <input name="country" type="text" class="form-control" required autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a class="btn btn-danger" href="/">Back</a>
    </form>

@endsection
