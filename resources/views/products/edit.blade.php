@extends('layouts.app')
@section('content')
<!-- форма добавления -->
<form class="container mx-6" action="{{ route('catalog.product.update', $product->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('patch')
    <select name="category" class="form-select" aria-label="Default select example">
        
        @foreach($categories as $category)

            <option>{{$category->category}}</option>

        @endforeach

    </select>
    
    <div class="input-group my-3">
        <span class="input-group-text" id="basic-addon1">Краткое название</span>
        <input value="{{ $product->shortname }}"  name="shortname" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
    </div>

    <div class="input-group my-3">
        <span class="input-group-text" id="basic-addon1">Полное название</span>
        <input value="{{ $product->name }}" name="name" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Описание</span>
        <textarea name="description" class="form-control" aria-label="With textarea">{{ $product->description }}</textarea>
    </div>

    <div class="input-group my-3">
        <span class="input-group-text" id="basic-addon1">Цена</span>
        <input value="{{ $product->price }}" name="price" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
    </div>

    <div class="input-group my-3">
        <span class="input-group-text" id="basic-addon1">бренд</span>
        <input value="{{ $product->brand }}" name="brand" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
    </div>

    <div class="input-group my-3">
        <span class="input-group-text" id="basic-addon1">Цвет</span>
        <input value="{{ $product->color }}" name="color" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Колличество</span>
        <input value="{{ $product->count }}" name="count" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
    </div>

    <div class="input-group my-3 form-file">
        <input value="" name="images[]" type="file" multiple class="form-file-input form-control" id="customFile">
    </div>

    <button type="submit" class="btn btn-dark mb-4">Добавить товар</button>

</form>
@endsection