@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">Add Product</div>
        <form method="post" action="{{ route('product.store') }}" class="my-5" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <select name="category_id" class="form-control" aria-label="Default select example">
                        <option selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title"
                    >
                    @error('title')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <input type="number" name="discount" class="form-control" value="{{ old('discount') }}"
                        placeholder="Discount">
                    @error('discount')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <select name="discount_type" class="form-control" aria-label="Default select example">
                        <option value="" selected>Discount Type</option>
                        <option value="Flat">Flat</option>
                        <option value="Percent">Percent</option>
                    </select>
                    @error('discount_type')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}"
                        placeholder="Price">
                    @error('price')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <textarea name="description" value="{{ old('description') }}" class="form-control" id="exampleFormControlTextarea3"
                        rows="1" placeholder="Discription"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <label class="form-label" for="customFile">Default file input example</label>
                    <input type="file" name="image" class="form-control" id="customFile" />
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
@endsection
