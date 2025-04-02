@extends('layouts.admin')
@section('content')
<div class="py-5">
    <form action="{{url('products/update/'.$product->id)}}" method="post">
        @csrf
        @method('patch')
        {{-- <input type="hidden" name="id" value="{{$product->id}}"> --}}
        <div class="mb-3">
            <label for="name" class="form-label">اسم المنتج</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="اسم المنتج" value="{{$product->name}}">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">الكمية</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="الكمية" value="{{$product->quantity}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">السعر</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="السعر" value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">وصف المنتج</label>
            <textarea class="form-control" id="description" name="description"  rows="3">{{$product->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">اختر الصنف</label>
            {{-- <label for="description" class="form-label">{{$categoryName->id}}</label> --}}
            <select class="form-select" id="category" name="category" aria-label="Default select example">
                {{-- <option value="{{$categoryName->id}}">{{$categoryName->name}}</option>
                @foreach ($categories as $category )
                @if ($categoryName->name != $category->name){
                    <option value="{{$category->id}}" {{ $product->category == 1 ? 'selected' : '' }}>{{$category->name}}</option>
                }
                @endif
                @endforeach --}}
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
                {{-- <option value="" disabled {{ is_null($product->category) ? 'selected' : '' }}>اختر الصنف</option>
                <option value="1" {{ $product->category == 1 ? 'selected' : '' }}>ملابس</option>
                <option value="2" {{ $product->category == 2 ? 'selected' : '' }}>احذية</option>
                <option value="3" {{ $product->category == 3 ? 'selected' : '' }}>اكسسوارات</option> --}}
              </select>
        </div>

        <div class="mb-3">
            <input type="submit" value="حفظ" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
