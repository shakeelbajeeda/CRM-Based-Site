@extends('layouts.userDashboard')
@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Icon Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->icon }}</td>
                        <td>{{ $product->title }}</td>
                        <td><a href="{{url('delete', [$product->id]) }}"><i class="fa fa-trash text-danger"></i></a><a
                                class="ml-3" href="{{ route('edit', [$product->id]) }}"><i
                                    class="fa fa-edit text-info"></i></a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div><br>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
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
    </script>
@endsection
