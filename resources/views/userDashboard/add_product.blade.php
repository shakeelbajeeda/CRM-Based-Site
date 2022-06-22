@extends('layouts.userDashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">@if(@$product) Edit @else Add @endif Product</div>
        <form method="post"
            action="@if (@$product) {{ route('update', [$product->id]) }} @else{{ route('save') }} @endif"
            class="my-5">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="icon" class="form-control" value="{{ @$product->icon }}"
                        placeholder="Icon Name" required>
                    @error('icon')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <input type="text" name="title" class="form-control" value="{{ @$product->title }}"
                        placeholder="Title" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-4 text-center">
                    @if (@$product->id)
                        <button type="submit" name="add" class="px-3 btn btn-primary"> <i class="fa fa-clock"></i>
                            Update</button>
                    @else
                        <button type="submit" name="add" class="px-3 btn btn-primary"> <i class="fa fa-plus"></i>
                            Add</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
