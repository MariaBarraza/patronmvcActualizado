@extends('layouts.admin')

@section('titulo','Administración | Crear noticias')
@section('titulo2','Crear Notic¡as')

@section('breadcrumbs')
@endsection

@section('contenido')
<a href="{{route('noticias.index')}}" class="btn btn-primary btn-sm" style="margin-bottom: 20px"><i class="fas fa-arrow-left"></i> Volver a la lista de noticias</a>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear noticias</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('noticias.store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="txtTitulo" name="txtTitulo" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Cuerpo</label>
                            <textarea class="form-control" rows=12 name="txtCuerpo"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection

@section('estilos')
@endsection