@extends('admin.master')
@section('content-admin')
    <div class="card mt-2">
        <h5 class="card-header">Add new product</h5>
        <div class="card-body">
            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror" >
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Desc</label>
                    <input type="text" name="desc" value="{{ old('desc') }}" class="form-control">
                    @error('desc')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea class="form-control" name="content_product" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control">
                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
