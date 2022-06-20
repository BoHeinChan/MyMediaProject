@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Trend Post</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Post ID</th>
                                    <th>Post Title</th>
                                    <th>Image</th>
                                    <th>View Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->post_id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            @if ($post->image == null)
                                                <img src="{{ asset('default/default-image.jpg') }}"
                                                    class="card-img-top w-50 rounded" alt="Image">
                                            @else
                                                <img src="{{ asset('storage/images/' . $post->image) }}"
                                                    class="card-img-top w-50" alt="Image">
                                            @endif
                                        </td>
                                        <td><i class="fa fa-eye" aria-hidden="true"> {{ $post->count }}</i></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
