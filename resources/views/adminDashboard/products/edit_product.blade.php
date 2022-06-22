@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">Edit Product</div>
        <form method="post" action="{{ route('product.update', $product->id) }}" class="mb-5">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4 mt-4">
                    <select name="category_id" class="form-control" aria-label="Default select example">
                        <option selected> Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="text" name="title" class="form-control" value="{{ $product->title }}"
                        placeholder="Title" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="number" name="discount" class="form-control" value="{{ $product->discount }}"
                        placeholder="Discount" required>
                    @error('discount')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <select name="discount_type" class="form-control" aria-label="Default select example">
                        <option selected> Discount Type</option>
                        <option value="Flat" {{ $product->discount_type == 'Flat' ? 'selected' : '' }}>Flat</option>
                        <option value="Percent" {{ $product->discount_type == 'Percent' ? 'selected' : '' }}>Percent
                        </option>
                    </select>
                    @error('discount_type')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}"
                        placeholder="Price" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea3" rows="1" placeholder="Discription">{{ $product->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 text-right mt-4">
                    <button type="submit" name="update" class="px-5 fs-2 btn btn-primary"> <i class="fa fa-clock"></i>
                        Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
