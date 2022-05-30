@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('deletedCategory'))
                    <div class="alert alert-warning" alert-dismissible fade show" role="alert">
                        {{ Session::get('deletedCategory') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <a href="{{ route('admin.add_category_page') }}">
                    <button class="btn btn-primary mb-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </a>
                <a href="{{ route('admin.category') }}">
                    <button class="btn btn-dark mb-2">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button>
                </a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category</h3>
                        <div class="card-tools">
                            <form action="{{ route('admin.search_category') }}">
                                @csrf
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit_category_page', $category->id) }}">
                                                    <button class="btn btn-sm bg-dark text-white"><i
                                                            class="fas fa-edit"></i></button>
                                                </a>
                                                <a href="{{ route('admin.delete_category', $category->id) }}">
                                                    <button class="btn btn-sm bg-danger text-white"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-danger">
                                            There are no categories.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="mx-2">{{ $categories->links() }}</div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
