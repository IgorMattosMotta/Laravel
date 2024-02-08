@extends('layouts.main')

@section('title', 'Editando: '. $event->title)

@section('content')

   <div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$event->title}}</h1>
    <form action="/events/update/{{$event->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="from-control-file">
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview">
        </div>  
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento:" value="{{$event->title}}">
            </div>  
        <div class="form-group">
        <label for="date">Data do evento:</label>
        <input type="date" class="form-control" id="date" name="date" value="{{date('Y-m-d', strtotime($event->date));}}">
            </div> 
        <div class="form-group"> 
            <label for="city">Local:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento:" value="{{$event->city}}">
            </div>  
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description" placeholder="Descrição do evento:">{{$event->description}}</textarea>
            </div>  
        <div class="form-group">
            <label for="title">Adicione infraestrutura: </label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>  
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food"> Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Bar"> Open Bar
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
        </div>
        <div class="form-group">    
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="1" {{$event->private == 1 ? "selected = 'selected'" : ""}}>Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <div class="form-group">    
            <input type="submit" class="btn btn-primary" value="Editar Evento">
        </div>
    </form>
   </div>

@endsection('content')