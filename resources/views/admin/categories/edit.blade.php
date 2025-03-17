@extends('layouts.admin')
@section('content')
<div class="py-5">
    <form action="{{url('categories/update/'.$category->id)}}" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="mb-3">
            <label for="name" class="form-label">اسم الصنف</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="اسم الصنف" value="{{$category->name}}">
        </div>

        <div class="mb-3">
            <input type="submit" value="حفظ" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
