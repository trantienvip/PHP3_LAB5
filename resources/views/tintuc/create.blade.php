{{-- Neu edit thi se co bien $category truyen vao --}}
@extends('layout.master')

@section('title', 'Tin tuc Page')

@section(
    'content-title',
    isset($tintuc) ? 'Tintuc Edit' : 'Tintuc Create'
)
@section('content')
    <form
        action="{{isset($tintuc)
            ? route('tintuc.update', $tintuc->id)
            : route('tintuc.store')}}"
        class="form"
        method="POST"
    >
        {{-- Neu co du lieu $tintucgory thi se là update, ép kiểu method
            về PUT --}}
        @if (isset($tintuc))
            @method('PUT')
        @endif
        {{-- Bat buoc trong form se phai co token bang @csrf --}}
        @csrf

        {{-- Sau khi validate co loi, redirect kem $errors
            Kiem tra neu co loi bang ->any()
            Lay ra danh sach loi ->all() va foreach de hien thi
        --}}
        @if ($errors->any())
            <ul class="text-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input
                name="name"
                class="form-control"
                id="name"
                value="{{isset($tintuc) ? $tintuc->name : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input
                name="description"
                class="form-control"
                id="description"
                value="{{isset($tintuc) ? $tintuc->description : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Products</label>
            <select name="product_id" id="">
                @foreach ($tintuc->products as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Sumit</button>
            <a href="{{route('categories.index')}}" class="btn btn-warning">
                Cancel
            </a>
        </div>
    </form>

    <div>
        {{-- <table>
            <thead>
                <tr><th>Product Name</th></tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr><td>{{$product->name}}</td></tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}} --}}
    </div>

@endsection
