@extends('layouts.app')

@section('content')
<div class="container">

    <!-- табы -->
    <div class="nav-tabs">
        <a href="#" data-tab="0" class="nav-tab">Добавление категорий</a>
        <a href="#" data-tab="1" class="nav-tab active">Добавление товаров</a>
    </div>

    <!-- то что в табах -->
    <div class="tab-content">

        <!-- добавление категорий -->
        <div data-tab-content="0" class="tab-pane">

            @include('category.create')

            @include('category.index')

        </div>

        <!-- добавление продуктов -->
        <div data-tab-content="1" class="tab-pane active">

            @include('products.create')

            @include('products.index')

        </div>

    </div>

</div>
@endsection