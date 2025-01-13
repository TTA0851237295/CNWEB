@extends('layouts.app')

@section('content')
    <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Quản lý Vấn đề</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('products.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Tạo mới sản phẩm</span></a>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Tên cửa hàng</th>
                        <th> Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($products as $product)
                            <tr>                            
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ number_format($product->price) }} VNĐ</td>
                                <td>{{ $product->store->name }}</td>
                                <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="edit" title="Sửa">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="#" class="delete" data-id="{{ $product->id }}" title="Xóa" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                                        <i class="material-icons">delete</i>
                                    </a>
                                    <!-- Modal xác nhận xóa -->
                                    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $product->id }}">Xác nhận xóa</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa sản phẩm "{{ $product->name }}" không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>

            {{-- Phân trang --}}
            <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
    </div>

    
@endsection
