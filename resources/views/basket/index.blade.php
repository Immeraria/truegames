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
                                    <div class="col-md-8 flex-fill ">
                                        <div class="info">
                                            <div class="row justify-content-center">
                                                <div class="col-md-5 product-name flex-fill">
                                                    <div class="product-name">
                                                        <a class="textdn" href="#">{{ $product->name }}</a>
                                                        <div class="product-info">
                                                            <div>Цвет: <span class="value">{{ $product->color }}</span></div>
                                                            <div>Бренд: <span class="value">{{ $product->brand }}</span></div>
                                                            <div>Осталось на складе: <span class="value">{{ $product->count }}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 quantity align-self-center justify-self-center flex-fill">
                                                    <form class="product-name pay-product-main--item digit-field ">
                                                        <div id="basket-btn-minus" class="digit-field-button decrease inactive">&minus;</div>
                                                        <input type="text" class="quant_value" readonly name="quant[14813169]" value="1">
                                                        <div id="basket-btn-plus" class="digit-field-button increase ">&plus;</div>
                                                    </form>
                                                </div>
                                                <div class="col-md-3 price align-self-center flex-fill">
                                                    <h5>{{ $product->price }} руб.</h5>
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
                            <div class="summary-item total"><span class="text">Всего</span><span class="price">{{ array_sum($price) }} руб.</span></div>
                            <button type="button" class="btn btn-primary btn-lg btn-block">Перейти к оформлению</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection