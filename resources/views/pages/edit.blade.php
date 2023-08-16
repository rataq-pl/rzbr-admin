@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edytujesz <code>{{$page->title}}</code>.
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($page, ['route' => ['pages.update', $page->id], 'method' => 'patch', 'files' => true]) !!}

            <div class="card-body">
                <div class="row">
                    @include('pages.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Zapisz', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('pages.index') }}" class="btn btn-default"> Anuluj </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
