@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('admin.add_post_page') }}">
                    <button class="btn btn-primary mb-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </a>
                <a href="{{ route('admin.post') }}">
                    <button class="btn btn-dark mb-2">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button>
                </a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Posts</h3>

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
                        <div class="card mx-3 mt-3 bg-cyan">
                            @foreach ($posts as $post)
                                {{ $post->image }}
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
