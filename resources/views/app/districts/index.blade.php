@extends('app.layouts')

@section('title', 'District')

@section('buttonAdd')
    <button class="btn btn-sm btn-outline-primary button-action-add-main" href="{{ route('districts.create') }}">Добавить</button>
@endsection

@section('content')

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Население</th>
            <th scope="col">Описание</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($districts as $district)
            <tr>
                <td>{{ $district->name }}</td>
                <td>{{ $district->population }}</td>
                <td>{{ Illuminate\Support\Str::limit($district->description, 60) }}</td>
                <td width="20">
                    <button type="button"
                            class="btn btn-sm btn-primary button-action button-show"
                            href="{{ route('districts.show', ['district' => $district->id]) }}"
                    >
                        Просмотреть
                    </button>
                    <button type="button"
                            class="btn btn-sm btn-info button-action button-edit"
                            href="{{ route('districts.edit', ['district' => $district->id]) }}"
                    >
                        Редактировать
                    </button>
                    <button
                            type="button"
                            class="btn btn-sm btn-secondary button-action button-remove"
                            href="{{ route('districts.destroy', ['district' => $district->id]) }}"
                    >
                        Удалить
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection