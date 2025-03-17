@extends('layouts.admin')
@section('content')
    <div class="py-5">
        <a href="/products" class="btn btn-outline-dark mb-4">كل المنتجات</a>
        <form action="{{ url('products/store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">اسم المنتج</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المنتج">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">الكمية</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="الكمية">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">السعر</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="السعر">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">وصف المنتج</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">اختر الصنف</label>
                <select class="form-select" id="category" name="category" aria-label="Default select example">
                    <option value="#" selected></option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input type="submit" value="حفظ" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection
