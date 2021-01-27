@extends('Layouts.app')

@section('content')
    <h1 style="margin-top: 20px">Edit Company (employees: {{ $comp->employees->count() }})</h1>
   
    <form action="{{ route('companies.update', $comp->id)  }}" autocomplete="off" method="POST">
        
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" required autocomplete="off" value="{{ $comp->name }}">
        </div>

        <div class="form-group">
            <label>Code</label>
            <input name="code" type="number" class="form-control" required autocomplete="off" value="{{ $comp->code }}">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" type="text" class="form-control" required autocomplete="off" value="{{ $comp->address }}">
        </div>

        <div class="form-group">
            <label>City</label>
            <input name="city" type="text" class="form-control" required autocomplete="off" value="{{ $comp->city }}">
        </div>

        <div class="form-group">
            <label>Country</label>
            <input name="country" type="text" class="form-control" required autocomplete="off" value="{{ $comp->country }}">
        </div>
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-primary">Edit</button>
        <a class="btn btn-danger" href="/">Back</a>
    </form>

@endsection
