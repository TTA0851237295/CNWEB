@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa Sản Phẩm</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   id="name" 
                   name="name" 
                   value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" 
                      name="description"
                      rows="3">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" 
                   class="form-control @error('price') is-invalid @enderror" 
                   id="price" 
                   name="price" 
                   step="0.01" 
                   value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="store_id" class="form-label">Cửa hàng:</label>
            <select class="form-control @error('store_id') is-invalid @enderror" 
                    id="store_id" 
                    name="store_id">
                <option value="">Chọn cửa hàng</option>
                @foreach($stores as $store)
                    <option value="{{ $store->id }}" 
                            {{ old('store_id', $product->store_id) == $store->id ? 'selected' : '' }}>
                        {{ $store->name }}
                    </option>
                @endforeach
            </select>
            @error('store_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection