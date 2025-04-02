@extends('layouts.admin')
@section('content')
<div class="py-5">
    <a href="products/create" class="btn btn-outline-dark mb-4">إضافة منتج</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">اسم المنتج</th>
            <th scope="col">الصنف</th>
            <th scope="col">السعر</th>
            <th scope="col">الكمية</th>
            <th scope="col">الاحداث</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product )
            <tr>
              <th scope="row">{{++$key}}</th>
              <td>{{$product->name}}</td>
              <td>{{$categories[$product->category]?? 'غير محدد'}}</td>
              {{-- <td>{{$product->category->name}}</td> --}}
              {{-- <td>{{ optional($product->category)->name ?? "لا يوجد تصنيف" }}</td> --}}
              <td>{{$product->price}}</td>
              <td>{{$product->quantity}}</td>
              <td>
                  <a href="{{url('products/delete/'.$product->id)}}" class="btn btn-danger">حذف</a>
                  <a href="{{url('products/edit/'.$product->id)}}" class="btn btn-info">تعديل</a>

              </td>
            </tr>

            @endforeach

        </tbody>
      </table>
      {{$products->links()}}
</div>
@endsection
