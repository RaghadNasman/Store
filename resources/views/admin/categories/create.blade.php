@extends('layouts.admin')
@section('content')
<div class="py-5">
    <a href="/categories" class="btn btn-outline-dark mb-4">كل التصنيفات</a>
    <form action="{{url('categories/store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم المنتج</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="اسم الصنف">
        </div>

        <div class="mb-3">
            <input type="submit" value="حفظ" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
