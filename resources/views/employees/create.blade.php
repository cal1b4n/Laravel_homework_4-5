@extends('Layouts.app')

@section('content')
    <h1 style="margin-top: 20px">Add Employee</h1>

    <form action="{{ route('employees.store') }}" method="POST" autocomplete="off">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <div class="form-group">
            <label>First Name</label>
            <input name="name" type="text" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input name="last_name" type="text" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Birth Date</label>
            <input name="birth_date" type="date" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Company</label>
            <select name="company_id" id="companies" class="form-control" required autocomplete="off">
                {{-- ajax will render options --}}
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
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
                let str = "";
                results.forEach(comp => {
                    str += `<option value="${ comp.id }">${ comp.name }</option>`
                });
                $("#companies").html(str);
            }
        });

    </script>
@endsection
