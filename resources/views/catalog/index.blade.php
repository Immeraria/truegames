@extends('layouts.app')

@section('content')
<div class="mx-6 container">
    <section>
        <div class="container py-3">
            <h1 class="my-4">Каталог</h1>
            @foreach($products as $product)
            <div class="row my-4">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">

                        <img src="{{ asset('storage/' . $images->where('category', $product->category)->where('product_id', $product->id)->value('url')) }}" class="w-100" />
                        <a href="#!">
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="product-name">
                        <a class="textdn" href="{{route('catalog.show', $product->id)}}">{{ $product->name }}</a>
                        <div class="product-info">
                            <div>Бренд: <span class="value">{{ $product->brand }}</span></div>
                            <div>Осталось на складе: <span class="value">{{ $product->count }}</span></div>
                            <div><span class="value">{{$product->description}}</span></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                    <div class="d-flex flex-row align-items-center mb-1">
                        <h4 class="mb-1 me-1">{{$product->price}}руб.</h4>
                        <span class="text-danger"><s>{{$product->price*1.25}}руб.</s></span>
                    </div>
                    <h6 class="text-success">Бесплатная доставка</h6>
                    @guest
                    <form action="" method="" class="d-flex flex-column mt-4">
                        @csrf
                        <button class="btn btn-primary btn-sm" type="button"> <a class="text-white text-decoration-none" href="{{route('catalog.show', $product->id)}} ">Узнать больше</a> </button>
                        <button class="btn btn-outline-primary btn-sm mt-2" type="submit">
                            Авторизируйтесь
                        </button>
                    </form>
                    @endguest
                    @if(Auth::user())
                    @if( count( $baskets->where('product_id', $product->id)->where('user_id', Auth::user()->id) ) === 0)
                    <form action="{{ route('basket.store') }}" method="post" class="d-flex flex-column mt-4">
                        @csrf
                        <button class="btn btn-primary btn-sm" type="button"> <a class="text-white text-decoration-none" href="{{route('catalog.show', $product->id)}}">Узнать больше</a> </button>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-outline-primary btn-sm mt-2" type="submit">
                            Добавить в корзину
                        </button>
                    </form>
                    @endif
                    @if( count( $baskets->where('product_id', $product->id)->where('user_id', Auth::user()->id) ) === 1 )
                    <form action="{{ route('basket.destroy') }}" method="post" class="d-flex flex-column mt-4">
                        @method('delete')
                        @csrf
                        <button class="btn btn-primary btn-sm" type="button">Узнать больше</button>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button class="btn btn-outline-danger btn-sm mt-2" type="submit">
                            Удалить из корзины
                        </button>
                    </form>
                    @endif
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </section>
</div>
@endsection