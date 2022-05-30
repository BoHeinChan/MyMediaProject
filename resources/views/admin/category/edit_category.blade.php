@extends('admin.layout.app')

@section('content')
    <div class="col-10 offset-1 mt-3">
        <div class="col-md-10 offset-1">
            <a href="{{ route('admin.category') }}">
                <button class="btn btn-dark mb-2">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </button>
            </a>
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">Edit Category</legend>
                </div>
                <div class="card-body">
                    @if (Session::has('successUpdate'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('successUpdate') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form class="form-horizontal" action="{{ route('admin.edit_category', $category->id) }}"
                                method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            value="{{ $category->title ?? old('title') }}" id="title" name="title"
                                            placeholder="Add title">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30"
                                            rows="10"
                                            placeholder="Add description">{{ $category->description ?? old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn bg-dark text-white">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
