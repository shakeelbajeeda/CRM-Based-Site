@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">Add User</div>
        <form method="post" action="{{ route('user.store') }}" class="my-5" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 mt-4">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" placeholder="UserName">
                    @error('name')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                        value="{{ old('password') }}" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}" placeholder="Phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address') }}" placeholder="Address">
                    @error('address')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <select name="status" class="form-control @error('status') is-invalid @enderror"
                        aria-label="Default select example">
                        <option selected>Status</option>
                        <option value="1">Active</option>
                        <option value="0">Block</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <select name="role" class="form-control @error('role') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" selected>Role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="customFile">Select Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        id="customFile" />
                    @error('image')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 text-center mt-4">
                    <button type="submit" name="add" class="px-5 fs-2 btn btn-primary float-right"> <i
                            class="fa fa-plus"></i>
                        Add</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('error'))
            toastMixin.fire({
                animation: true,
                icon: 'error',
                title: '{{ session()->get('error') }}'
            });
        @endif
    </script>
@endsection
