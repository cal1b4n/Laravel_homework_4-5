@extends('Layouts.app')

@section('content')
    <h1 style="margin-top: 20px">Companies</h1>
    <div class="table-responsive">
        <div class="table-wrapper">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
            <a href="/companies/create" class="btn btn-primary">Create</a>
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
                url: "/companies-list",
                success: function(results) {
                    console.log(results);
                    let str = "";
                    results.forEach(comp => {
                        str += `<tr>
                                                    <td>${ comp.id }</td>
                                                    <td>${ comp.name }</td>
                                                    <td>${ comp.code }</td>
                                                    <td>${ comp.address }</td>
                                                    <td>${ comp.city }</td>
                                                    <td>${ comp.country }</td>
                                                    <td>
                                                        <form>
                                                            <a href="/companies/${comp.id}/edit" class="edit" style="cursor: pointer"><i class="material-icons">&#xE254;</i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="_delete('${comp.id}')" class="delete" style="cursor: pointer"><i class="material-icons">&#xE872;</i></a>
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
                url: `/companies/${id}`,
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
