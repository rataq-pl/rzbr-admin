<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Tytuł:') !!}
    <p>{{ $blog->title }}</p>
</div>

<!-- Url Field -->
<div class="col-sm-12">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $blog->url }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Zdjęcie:') !!}
    <p><img src="{{ asset($blog->image) }}" style="max-width:200px;"/></p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Treść:') !!}
    {!! $blog->content !!}
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Utworzono:') !!}
    <p>{{ $blog->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Aktualizowano:') !!}
    <p>{{ $blog->updated_at }}</p>
</div>

