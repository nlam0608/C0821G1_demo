@extends('admin.master')
@section('content-admin')
    <div class="card mt-2">
        <h5 class="card-header">Add new product</h5>
        <div class="card-body">
            <form method="post" action="">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $categories->name}}" class="form-control  @error('name') is-invalid @enderror" >
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
