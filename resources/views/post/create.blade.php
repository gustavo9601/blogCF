@if($errors->any())
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
@endif

{{--
posts.store  // ruta generada en el controlador de recurso

--}}
<form method="post" action="{{ route('posts.store')  }}">
    @csrf

    <div class="row justify-content-center">
        <div class="col-7">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text"
                       class="form-control"
                       name="title"
                       id="title"
                       placeholder="Titulo"
                        value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea name="content" id="content" class="form-control" cols="30" rows="10">
                    {{old('content')}}
                </textarea>
            </div>
        </div>
        <div class="col-7 text-center">
            <button class="btn btn-outline-info">Guardar</button>
        </div>
    </div>
</form>