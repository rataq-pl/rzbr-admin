<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('title', 'Tytuł:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-4">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-4">
    {!! Form::label('image', 'Zdjęcie:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
    @if (isset($blog->image))
        <img src="{{asset($blog->image)}}" style="max-width:150px;"/>
    @endif
</div>
<div class="clearfix"></div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Treść:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control tinymce']) !!}
</div>