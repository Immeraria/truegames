<!-- форма добавления -->
<form class="mx-6" action="{{ route('catalog.product.store') }}" enctype="multipart/form-data" method="POST">
    @csrf

    <select name="category" class="form-select" aria-label="Default select example">

        @foreach($categories as $category)

        <option>{{$category->category}}</option>

        @endforeach

    </select>

    <div class="input-group my-3 @error('shortname') is-invalid @enderror">
        <span class="input-group-text" id="basic-addon1">Краткое название</span>
        <input name="shortname" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
        
    </div>
    @error('shortname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="input-group my-3 @error('title') is-invalid @enderror">
        <span class="input-group-text" id="basic-addon1">Полное название</span>
        <input name="name" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
        
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="input-group mb-3 @error('description') is-invalid @enderror">
        <span class="input-group-text">Описание</span>
        <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
        
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="input-group my-3 @error('price') is-invalid @enderror">
        <span class="input-group-text" id="basic-addon1">Цена</span>
        <input name="price" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
        
    </div>
    @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="input-group my-3 @error('brand') is-invalid @enderror">
        <span class="input-group-text" id="basic-addon1">бренд</span>
        <input name="brand" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
        
    </div>
    @error('brand')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="input-group my-3 @error('color') is-invalid @enderror">
        <span class="input-group-text" id="basic-addon1">Цвет</span>
        <input name="color" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
        
    </div>
    @error('color')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="input-group mb-3 @error('count') is-invalid @enderror">
        <span class="input-group-text" id="basic-addon1">Колличество</span>
        <input name="count" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
        
    </div>
    @error('count')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="input-group my-3 @error('images') is-invalid @enderror form-file">
        <input name="images[]" type="file" multiple class="form-file-input form-control" id="customFile">
        
    </div>
    @error('images')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <button type="submit" class="btn btn-dark mb-4">Добавить товар</button>

</form>