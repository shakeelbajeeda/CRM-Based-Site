@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Discount_type</th>
                    <th scope="col">Price</th>
                    <th scope="col">description</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>{{ $product->discount_type }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img height="80px" width="100px" src="{{asset('storage/'. $product->image)}}" alt=""></td>
                        <td class="row">
                            <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                            <a class="ml-3 btn btn-info" href="{{ route('product.edit', $product->id) }}"><i
                                    class="fa fa-edit"></i></a>
                        </td>
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
