@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                @if (Session::has('successdelete'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('successdelete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
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
                            <form action="{{ route('admin.search_post') }}">
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
                    @foreach ($posts as $post)
                        <div class="card mx-2 my-1 mb-0 bg-cyan">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                @if (isset($post->image) == 1)
                                    <div class="w-50">
                                        <h5 class="fw-bold">{{ $post->title }}</h5>
                                        <p class="card-text text-wrap">{{ $post->description }}</p>
                                        <a href="{{ route('admin.edit_post_page', $post->id) }}">
                                            <button class="btn btn-sm bg-dark text-white"><i
                                                    class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ route('admin.delete_post', $post->id) }}">
                                            <button class="btn btn-sm bg-danger text-white"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </a>
                                    </div>
                                    <div class="text-right w-25"><img src="{{ asset('storage/images/' . $post->image) }}"
                                            class="card-img-top w-100" alt="Image"></div>
                                @else
                                    <div class="w-50">
                                        <h5 class="fw-bold">{{ $post->title }}</h5>
                                        <p class="card-text text-wrap">{{ $post->description }}</p>
                                        <a href="{{ route('admin.edit_post_page', $post->id) }}">
                                            <button class="btn btn-sm bg-dark text-white"><i
                                                    class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ route('admin.delete_post', $post->id) }}">
                                            <button class="btn btn-sm bg-danger text-white"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="">{{ $posts->links() }}</div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
