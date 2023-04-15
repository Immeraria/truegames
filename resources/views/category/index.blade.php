
<!-- таблица категорий -->
<h2 class="my-4">Все Категории</h2>

<table class="table table-borderless">

    <tbody>
        @isset($categories)

            @foreach($categories as $category)
            <tr>
                
                <td class="col-2">{{ $category->category }}</td>
                <td class="col-1">
                    <form action="{{ route('catalog.category.destroy', $category->id)}}" method="post">
                    @method('delete')
                    @csrf
                        <button class="btn btn-dark mb-4" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @endisset
    </tbody>

</table>