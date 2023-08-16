<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $testimonial->name }}</p>
</div>

<!-- Starscount Field -->
<div class="col-sm-12">
    {!! Form::label('starsCount', 'Starscount:') !!}
    <p>{{ $testimonial->starsCount }}</p>
</div>

<!-- Realurl Field -->
<div class="col-sm-12">
    {!! Form::label('realURL', 'Realurl:') !!}
    <p>{{ $testimonial->realURL }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $testimonial->content }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $testimonial->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $testimonial->updated_at }}</p>
</div>

