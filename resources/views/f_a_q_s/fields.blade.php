<!-- Question Field -->
<div class="form-group col-sm-12">
    {!! Form::label('question', 'Pytanie:') !!}
    {!! Form::text('question', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('answer', 'Odpowiedź:') !!}
    {!! Form::textarea('answer', null, ['class' => 'form-control', 'required']) !!}
</div>