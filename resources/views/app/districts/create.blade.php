@extends('app.layouts')

@section('title', 'District')

@section('content')

    {!! Form::model('', ['route' => ['districts.store']]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Название') !!}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->getBag('default')->first('name') }}</div>
             @endif
        </div>

        <div class="form-group">
            {!! Form::label('population', 'Насиление') !!}
            {!! Form::text('population', '', ['class' => 'form-control']) !!}
            @if($errors->has('population'))
                <div class="alert alert-danger">{{ $errors->getBag('default')->first('population') }}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Описание') !!}
            {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
            @if($errors->has('description'))
                <div class="alert alert-danger">{{ $errors->getBag('default')->first('description') }}</div>
            @endif
        </div>

        <button class="btn btn-success" type="submit">Add</button>
    {!! Form::close() !!}

@endsection