@extends('Layouts.app')

@section('content')
    <h1 style="margin-top: 20px">Employees</h1>
    <div class="table-responsive">
        <div class="table-wrapper">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Company</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
            <a href="/employees/create" class="btn btn-primary">Create</a>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-XSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        function _refresh() {
            $.ajax({
                url: "/employees-list",
                success: function(results) {
                    console.log(results);
                    let str = "";
                    results.forEach(employee => {
                        str += `<tr>
                                    <td>${ employee.id }</td>
                                    <td>${ employee.name }</td>
                                    <td>${ employee.last_name }</td>
                                    <td>${ employee.birth_date }</td>
                                    <td>${ employee.company_name??'' }</td>
                                    <td>
                                        <form>
                                            <a href="/employees/${employee.id}/edit" class="edit" style="cursor: pointer"><i class="material-icons">&#xE254;</i></a>
                                            @csrf
                                            @method('DELETE')
                                            <a onclick="_delete('${employee.id}')" class="delete" style="cursor: pointer"><i class="material-icons">&#xE872;</i></a>
                                        </form>
                                    </td>
                                </tr>`
                        
                    });
                    $("#tbody").html(str);
                }
            });
        }

        function _delete(id) {
            $.ajax({
                url: `/employees/${id}`,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: _refresh,
                error: function(){
                    alert("something went wrong!");
                }
            });
        }

        _refresh();

    </script>
@endsection
