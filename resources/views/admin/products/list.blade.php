@extends('admin.master')
@section('content-admin')
    <div class="col-12 mt-2">
        <a class="btn btn-success" href="{{ route('products.create') }}">Thêm mới</a>
        <button class="btn btn-danger delete-product">Delete</button>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Danh sách sản phẩm</h5>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Thể loại sản phẩm</th>
                    <th>Giá tiền(VND)</th>
                    <th></th>
                </tr>
                @forelse($products as $key => $product)
                <tr id="product-item-{{$product->id}}">
                    <td><input type="checkbox" class="product-checked" value="{{$product->id}}"></td>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ asset('storage/' . $product->image)  }}" alt="" width="100"></td>
                    <td>
                        {{ $product->category->name ?? 'Chưa phân loại' }}
                    </td>
                    <td>{{ number_format($product->price)  }} </td>
                    <td><a href="{{ route('products.update', $product->id) }}" class="btn btn-primary">Cập nhật</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No data</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
