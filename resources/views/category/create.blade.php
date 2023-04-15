<form class="mx-6" action="{{ route('catalog.category.store') }}" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="input-group my-3">
        <span class="input-group-text" id="basic-addon1">Категория</span>
        <input name="category" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
    </div>

    <button type="submit" class="btn btn-dark mb-4">Добавить Категорию</button>

</form>