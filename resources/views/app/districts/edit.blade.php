@extends('app.layouts')

@section('title', 'District')

@section('content')

    @foreach ($errors->all() as $error)

        <div>{{ $error }}</div>

    @endforeach

    {!! Form::model($district, ['route' => ['districts.update', $district->getId()], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Название') !!}
            {!! Form::text('name', $district->getName(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('population', 'Насиление') !!}
            {!! Form::text('population', $district->population, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Описание') !!}
            {!! Form::textarea('description', $district->description, ['class' => 'form-control']) !!}
        </div>

        <button class="btn btn-success" type="submit">Update</button>
    {!! Form::close() !!}

@endsection