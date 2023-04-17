@extends('layouts.app')

@section('content')
<section class="shopping-cart">
    <div class="container">
        <div class="container">

            <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            @foreach($basket as $product)
                            <div class="product">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-fluid mx-auto d-block image" src="{{asset('storage/' . $images->where('category', $product->category)->where('product_id', $product->id)->value('url'))}}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5 product-name">
                                                    <div class="product-name">
                                                        <a href="#">{{ $product->name }}</a>
                                                        <div class="product-info">
                                                            <div>Цвет: <span class="value">{{ $product->color }}</span></div>
                                                            <div>Бренд: <span class="value">{{ $product->brand }}</span></div>
                                                            <div>Осталось на складе: <span class="value">{{ $product->count }}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 quantity">
                                                    <label for="quantity">Колличество:</label>
                                                    <input class="form-control quantity-input text-center" id="quantity" type="number" value="{{ $baskets->where('user_id', Auth::user()->id)->where('product_id', $product->id)->value('count') }}">
                                                </div>
                                                <div class="col-md-3 price">
                                                    <span>{{ $product->price }} руб.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Итог</h3>
                            <div class="summary-item"><span class="text">Без скидки</span><span class="price">{{ array_sum($price) * 1.25 }} руб.</span></div>
                            <div class="summary-item"><span class="text">Со скидкой</span><span class="price">{{ array_sum($price) }} руб.</span></div>
                            <div class="summary-item"><span class="text">Доставка</span><span class="price">0 руб.</span></div>
                            <div class="summary-item total"><span class="text">Total</span><span class="price">{{ array_sum($price) }} руб.</span></div>
                            <button type="button" class="btn btn-primary btn-lg btn-block">Перейти к оформлению</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection