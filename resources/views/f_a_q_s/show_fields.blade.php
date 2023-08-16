<!-- Question Field -->
<div class="col-sm-12">
    {!! Form::label('question', 'Pytanie:') !!}
    <p>{{ $fAQ->question }}</p>
</div>

<!-- Answer Field -->
<div class="col-sm-12">
    {!! Form::label('answer', 'Odpowiedź:') !!}
    <p>{{ $fAQ->answer }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Utworzono:') !!}
    <p>{{ $fAQ->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Aktualizowano:') !!}
    <p>{{ $fAQ->updated_at }}</p>
</div>

