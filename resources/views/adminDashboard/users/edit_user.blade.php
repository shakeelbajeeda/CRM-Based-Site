@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">Edit User</div>
        <form method="post" action="{{ route('user.update', $user->id) }}" class="my-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4 mt-4">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="UserName"
                        required>
                    @error('name')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email"
                        required>
                    @error('email')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="text" name="password" class="form-control" value="{{ $user->password }}"
                        placeholder="Password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="number" name="phone" class="form-control" value="{{ $user->phone }}"
                        placeholder="Phone" required>
                    @error('phone')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}"
                        placeholder="Address" required>
                    @error('address')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <select name="status" class="form-control" aria-label="Default select example">
                        <option selected>Status</option>
                        <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Block</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <select name="role" class="form-control" aria-label="Default select example">
                        <option selected>Role</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="customFile">Select Image</label>
                    <input type="file" value="" name="image" class="form-control" id="customFile" />
                    @error('image')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 text-center mt-4">
                    <button type="submit" name="add" class="px-5 fs-2 btn btn-primary float-right"> <i
                            class="fa fa-clock"></i>
                        Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
