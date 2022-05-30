@extends('admin.layout.app')

@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">User Profile</legend>
                </div>
                <div class="card-body">
                    @if (Session::has('updated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('updated') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form class="form-horizontal" action="{{ route('update_admin', $user->id) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') ?? $user->name }}"
                                            placeholder="Enter name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') ?? $user->email }}"
                                            placeholder="Enter email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            value="{{ $user->phone }}" placeholder="Enter phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select name="gender" class="form-control" id="gender">
                                            @if ($user->gender == null)
                                                {
                                                <option value="empty" selected>Choose gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                }
                                            @elseif ($user->gender == 'male')
                                                {
                                                <option value="empty">Choose gender</option>
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                                }
                                            @else
                                                {
                                                <option value="empty">Choose gender</option>
                                                <option value="male">Male</option>
                                                <option value="female" selected>Female</option>
                                                }
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="address" id="address"
                                            placeholder="Enter address">{{ $user->address }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <a href="{{ route('change_password') }}">Change Password</a>
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
