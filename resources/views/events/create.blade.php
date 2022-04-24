@extends("layouts.app")

@section("title", "Criar Evento")

@section("content")

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1> Crie o seu evento </h1>

        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image"> Imagem: <span class="input-required"> * </span> </label>
                <input type="file" class="form-control-file" name="image" id="image" required>
            </div>

            <div class="form-group">
                <label for="title"> Evento: <span class="input-required"> * </span> </label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Nome do evento" required>
            </div>

            <div class="form-group">
                <label for="title"> Descrição: <span class="input-required"> * </span> </label>
                <textarea name="description" id="description" class="form-control" placeholder="O que acontecerá no evento" required></textarea>
            </div>

            <div class="form-group">
                <label for="city"> Cidade: <span class="input-required"> * </span> </label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Local para o evento" required>
            </div>

            <div class="form-group">
                <label for="title"> O evento é privado ? </label>
                <select name="private" id="private" class="form-control">
                    <option value="0"> Não </option>
                    <option value="1"> Sim </option>
                </select>
            </div>

            <input type="submit" class="btn btn-primary" value="Criar evento">
        </form>
    </div>

@endsection