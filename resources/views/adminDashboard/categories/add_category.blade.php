@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">
        </div>
        <form method="post"
            action="@if (@$category->id) {{ route('category.update', $category->id) }} @else {{ route('category.store') }} @endif"
            class="my-5">
            @csrf
            @if (@$category)
                {{ method_field('PUT') }}
            @endif
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="title" class="form-control" value="{{ @$category->title }}"
                        placeholder="Category" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 text-center">

                    <button type="submit" name="add" class="px-5 fs-2 btn btn-primary"> <i
                            class="@if (@$category) fa fa-clock @else fa fa-plus @endif"></i>
                        @if (@$category)
                            Update
                        @else
                            Add
                        @endif
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection
