<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Starscount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('starsCount', 'Starscount:') !!}
    {!! Form::number('starsCount', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Realurl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('realURL', 'Realurl:') !!}
    {!! Form::text('realURL', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'required']) !!}
</div>