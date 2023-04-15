@extends('layouts.app')

@section('content')
<div class="mx-6 container">



    <section>
        <div class="container py-5">
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <h1 class="my-4">Каталог</h1>
                            @foreach($products as $product)
                            <div class="row my-4">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">

                                        <img src="{{ asset('storage/' . $images->where('category', $product->category)->where('product_id', $product->id)->value('url')) }}" 

                                        class="w-100" />
                                        <a href="#!">
                                            <div class="hover-overlay">
                                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5 class="text-truncate">{{$product->name}}</h5>
                                    <div class="d-flex flex-row">
                                        <span>На складе: {{$product->count}}</span>
                                    </div>
                                    <div class="mt-1 mb-0 text-muted small">
                                        <span>100% cotton</span>
                                        <span class="text-primary"> • </span>
                                        <span>Light weight</span>
                                        <span class="text-primary"> • </span>
                                        <span>Best finish<br /></span>
                                    </div>
                                    <div class="mb-2 text-muted small">
                                        <span>Unique design</span>
                                        <span class="text-primary"> • </span>
                                        <span>For men</span>
                                        <span class="text-primary"> • </span>
                                        <span>Casual<br /></span>
                                    </div>
                                    <p class="text-truncate mb-4 mb-md-0">
                                        {{$product->description}}
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">{{$product->price}}руб.</h4>
                                        <span class="text-danger"><s>{{$product->price*1.25}}руб.</s></span>
                                    </div>
                                    <h6 class="text-success">Бесплатная доставка</h6>
                                    <form action="{{ route('basket.store', $product->id) }}" method="post" class="d-flex flex-column mt-4">
                                        @csrf
                                        <button class="btn btn-primary btn-sm" type="button">Узнать больше</button>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button class="btn btn-outline-primary btn-sm mt-2" type="submit">
                                            Добавить в корзину
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection