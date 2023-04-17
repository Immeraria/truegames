
<!-- таблица товаров -->
<h2 class="my-4">Все товары</h2>

<table class="table table-borderless">

    <thead>
        <tr>
            <th class="col-3" scope="col">Название</th>
            <th class="col-3" scope="col">Категория</th>
            <th class="col-3" scope="col">Бренд</th>
            <th class="col-3" scope="col">Цена</th>
            <th class="col-3" scope="col">Колличество</th>
            <th class="col-1" scope="col"></th>
            <th class="col-1" scope="col"></th>
        </tr>
    </thead>

    <tbody>
        @isset($products)
            @foreach($products as $product)
            <tr>
                <td class="col-3">{{ $product->shortname }}</td>
                <td class="col-3">{{ $product->category }}</td>
                <td class="col-3">{{ $product->brand }}</td>
                <td class="col-3">{{ $product->price }}</td>
                <td class="col-3">{{ $product->count }}</td>
                <td class="col-1">
                    <form action="{{ route('catalog.product.edit', $product->id) }}" method="get">
                    @csrf
                        <button class="btn btn-dark" type="submit">Изменить</button>
                    </form>
                </td>
                <td class="col-1">
                    <form action="{{ route('catalog.product.destroy', $product->id) }}" method="post">
                    @method('delete')
                    @csrf
                        <button class="btn btn-dark" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>

</table>
