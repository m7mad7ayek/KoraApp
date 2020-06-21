@extends('cms.admin.parent')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Authors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Authors</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">News CMS - Authors</h3>
                            <a href="{{route('authors.create')}}" class="btn btn-sm btn-info float-right">Create New
                                Author</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Age</th>
                                    <th>Articles</th>
                                    <th>Catgories</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Create Date</th>
                                    <th>Updated Date</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                <span hidden>{{$count = 0}}</span>
                                @foreach($authorsData as $author)
                                    <tr>
                                        <td><span class="badge badge-info">{{++$count}}</span></td>
                                        <td>{{$author->id}}</td>
                                        <td>
                                            <img src="{{url('images/authors/'.$author->image)}}" width="50" height="50">
                                        </td>
                                        <td>{{$author->name}}</td>
                                        <td>{{$author->email}}</td>
                                        <td>{{$author->mobile}}</td>
                                        <td>{{$author->age}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                               href="{{route('author.articles',[$author->id])}}">
                                                <i class="fas fa-sticky-note">
                                                </i>
                                                ({{$author->articles_count}}) Article/s
                                            </a>
                                            <span class="badge badge-dark"></span>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm"

                                               href="{{route('author.categories',[$author->id])}}">
                                                <i class="fas fa-sticky-note">
                                                </i>
                                                ({{$author->categories_count}}) Category/s
                                            </a>
                                            <span class="badge badge-dark"></span>
                                        </td>
                                        <td>{{$author->gender}}</td>
                                        <td>
                                            @if($author->status == 'Active')
                                                <span class="badge badge-success">{{$author->status}}</span>
                                            @else
                                                <span class="badge badge-danger">{{$author->status}}</span>
                                            @endif
                                        </td>
                                        <td>{{$author->created_at}}</td>
                                        <td>{{$author->updated_at}}</td>
                                        <td>
                                            <a href="#" onclick="confirmDelete(this, '{{$author->id}}')"
                                               class="btn btn-xs btn-danger" style="color: white;">Delete</a>
                                            <a href="{{route('authors.edit',[$author->id])}}"
                                               class="btn btn-xs btn-info" style="color: white;">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Age</th>
                                    <th>Articles</th>
                                    <th>Catgories</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Create Date</th>
                                    <th>Updated Date</th>
                                    <th>Settings</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div>
                                {{$authorsData->render()}}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('cms/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('cms/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        function confirmDelete(app, id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    deleteAuthor(app, id)
                }
            })
        }

        function deleteAuthor(app, id) {
            axios.delete('/cms/admin/authors/' + id)
                .then(function (response) {
                    // handle success (Status Code: 200)
                    console.log(response);
                    console.log(response.data);
                    showMessage(response.data);
                    app.closest('tr').remove();
                })
                .catch(function (error) {
                    // handle error (Status Code: 400)
                    console.log(error);
                    console.log(error.response.data);
                    showMessage(error.response.data);
                })
                .then(function () {
                    // always executed
                });
        }

        function showMessage(data) {
            Swal.fire({
                position: 'center',
                icon: data.icon,
                title: data.title,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
@endsection
