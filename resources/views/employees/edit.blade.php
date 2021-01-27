@extends('Layouts.app')

@section('content')
    <h1 style="margin-top: 20px">Edit Employee</h1>

    <form action="{{ route('employees.update', $employee->id) }}" autocomplete="off" method="POST">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <div class="form-group">
            <label>First Name</label>
            <input name="name" type="text" class="form-control" required autocomplete="off" value="{{ $employee->name }}">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input name="last_name" type="text" class="form-control" required autocomplete="off"
                value="{{ $employee->last_name }}">
        </div>

        <div class="form-group">
            <label>Birth Date</label>
            <input name="birth_date" type="date" class="form-control" required autocomplete="off"
                value="{{ $employee->birth_date }}">
        </div>

        <div class="form-group">
            <label>Company</label>
            <select name="company_id" id="companies" class="form-control" required autocomplete="off">
                {{-- ajax will render options --}}
            </select>
        </div>

        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-primary">Edit</button>
        <a class="btn btn-danger" href="/employees">Back</a>
    </form>

    <script>
        $.ajaxSetup({
            headers: {
                'X-XSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $.ajax({
            url: "/companies-list",
            success: function(results) {
                console.log(results);
                let str = "";
                results.forEach(comp => {
                    if(comp.id == {{ $employee->company->id??0 }} )
                        str += `<option selected value="${ comp.id }">${ comp.name }</option>`;
                    else
                        str += `<option value="${ comp.id }">${ comp.name }</option>`
                });
                $("#companies").html(str);
            }
        });
    </script>

@endsection
