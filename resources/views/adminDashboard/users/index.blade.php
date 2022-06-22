@extends('layouts.dashboard')
@section('content')
    <style>
        .table-responsive1 {
            width: 100%;
            margin-bottom: 15px;
            overflow-x: auto;
            /* overflow-y: hidden; */
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #DDD;
        }

        .w_50 {
            width: 50px;
        }

        .w_100 {
            width: 100px;
        }

        .w_150 {
            width: 150px;
        }

        .w_250 {
            width: 250px;
        }

        .w_200 {
            width: 200px;
        }

        .w_120 {
            width: 120px;
        }

        .w_130 {
            width:
        }
    </style>
    <div class="container">
        <div class="table-responsive1">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr class="d-flex">
                        <th class="w_50">ID</th>
                        <th class="w_150">Username</th>
                        <th class="w_250">Email</th>
                        <th class="w_150">Phone</th>
                        <th class="w_200">Address</th>
                        <th class="w_200">Image</th>
                        <th class="w_120">Status</th>
                        <th class="w_100">Role</th>
                        <th class="W_120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="d-flex">
                            <td class="overflow-auto w_50">{{ $user->id }}</td>
                            <td class="overflow-auto w_150">{{ $user->name }}</td>
                            <td class="overflow-auto w_250">{{ $user->email }}</td>
                            <td class="overflow-auto w_150">{{ $user->phone }}</td>
                            <td class="overflow-auto w_200">{{ $user->address }}</td>
                            <td class="overflow-auto w_200"><img height="100px" width="100px"
                                    src="{{ asset('storage/' . $user->image) }}" alt=""></td>
                            <td class="overflow-auto w_120 text-center"><button onclick="block_user()" class="rounded-pill mt-4 {{$user->status=='1'?'btn btn-primary' : 'btn btn-danger'}}">{{ $user->status == '1' ? 'Active' : 'Blocked' }}</button></td>
                            <td class="overflow-auto w_100">{{ $user->role }}</td>

                            <td class="row overflow-auto w_120">
                                <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                <a class="ml-3 btn btn-info" style="height: 40px"
                                    href="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
    <script>
        function block_user() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you want to {{$user->status=="1" ? "Block" : "Unblock"}} this user?',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{$user->status=="1" ? "Block" : "Unblock"}}',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'User Blocked!',
                        '',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }

        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('message'))
            toastMixin.fire({
                animation: true,
                title: '{{ session()->get('message') }}'
            });
        @endif
        @if (session()->has('error'))
            toastMixin.fire({
                animation: true,
                icon: 'error',
                title: '{{ session()->get('error') }}'
            });
        @endif
    </script>
@endsection
