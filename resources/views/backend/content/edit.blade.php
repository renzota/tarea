@extends('backend.template.main')

@section('content')
<div class="container">
    <h2>Editar Contenido: {{ ucfirst($content->type) }}</h2>

    <form action="{{ route('content.update', $content->type) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $content->title) }}" required>
        </div>

        <div class="form-group">
            <label for="subtitle">Subtítulo</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $content->subtitle) }}">
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $content->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="cta_text">Texto de CTA (Leer Más)</label>
            <input type="text" class="form-control" id="cta_text" name="cta_text" value="{{ old('cta_text', $content->cta_text) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection