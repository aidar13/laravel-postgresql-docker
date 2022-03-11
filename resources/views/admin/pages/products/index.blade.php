@extends('admin.layouts.index')

@section('title', 'Продукты')

@section('content')

<div class="container container-fluid">
    <div class="title-block">
        <div class="row row--multiline align-items-center">
            <div class="col-md-4">
                <h1 class="title-primary" style="margin-bottom: 0">Управление продуктами</h1>
            </div>
            <div class="col-md-8 text-right-md text-right-lg">
                <div class="flex-form">
                    <div>
                        @role('admin')
                            <a class="btn btn-success" href="{{ route('products.create') }}">Создать новый продукт</a>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <br>
    <div class="block">
        <h2 class="title-secondary">Список продуктов</h2>
        <table class="table table-records">
            <colgroup>
                <col span="1" style="width: 3%;">
                <col span="1" style="width: 30%;">
                <col span="1" style="width: 30%;">
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 40%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Артикл</th>
                    <th>Название</th>
                    <th>Статус</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->article }}</td>
                        <td>{{ $product->name }}</td>
                        <td><b>{{ $product->status }}</b></td>
                        <td>
                            <a class="icon-btn icon-btn--green icon-eye" href="{{ route('products.show', [ $product->id ]) }}" title="Смотреть"></a>

                            @role('admin')
                                <a class="icon-btn icon-btn--yellow icon-edit" href="{{ route('products.edit', [ $product->id]) }}" title="Редактировать"></a>

                                <a href="javascript:;" title="Удалить"
                                   onclick="document.querySelector('#model-{{ $product->id }}').submit()"
                                   class="icon-btn icon-btn--pink icon-delete"></a>

                                <form action="{{ route('products.destroy', $product->id) }}" id="model-{{ $product->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endrole

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->appends(\Illuminate\Support\Facades\Request::except('page'))->links("vendor.pagination.admin") }}
    </div>
</div>

@endsection
@section('scripts')
    <!--Only this page's scripts-->
    <!---->
@endsection
