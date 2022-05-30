@extends('admin.layout.app')

@section('content')
    <div class="col-10 offset-1 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">Change Password</legend>
                </div>
                <div class="card-body">
                    @if (Session::has('updatedPassword'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('updatedPassword') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('ChangePasswordOk'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('ChangePasswordOk') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form class="form-horizontal" action="{{ route('update_password') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="oldPassword" class="col-sm-3 col-form-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword"
                                            name="oldPassword" placeholder="Enter old password">
                                        @error('oldPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if (Session::has('fail'))
                                            <div class="invalid-feedback">
                                                {{ Session::get('fail') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newPassword" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('newPassword') is-invalid @enderror" id="newPassword"
                                            name="newPassword" placeholder="Enter new password">
                                        @error('newPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if (Session::has('MustGraterThan8'))
                                            <div class="alert alert-danger mt-2 mb-0">
                                                {{ Session::get('MustGraterThan8') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comfirmPassword" class="col-sm-3 col-form-label">Comfirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('comfirmPassword') is-invalid @enderror"
                                            id="comfirmPassword" name="comfirmPassword"
                                            placeholder="Enter comfirm password">
                                        @error('comfirmPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-10">
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
