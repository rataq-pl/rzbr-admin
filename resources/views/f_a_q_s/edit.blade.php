@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edytujesz <code>{{$fAQ->question}}</code>.
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($fAQ, ['route' => ['fAQS.update', $fAQ->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('f_a_q_s.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Zapisz', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('fAQS.index') }}" class="btn btn-default"> Anuluj </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
