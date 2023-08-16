<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Tytuł:') !!}
    <p>{{ $page->title }}</p>
</div>

<!-- Url Field -->
<div class="col-sm-12">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $page->url }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Zdjęcie:') !!}
    <p><img src="{{ asset($page->image) }}" style="max-width:150px;"/></p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Treść:') !!}
    {!! $page->content !!}
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Utworzono:') !!}
    <p>{{ $page->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Aktualizowano:') !!}
    <p>{{ $page->updated_at }}</p>
</div>

