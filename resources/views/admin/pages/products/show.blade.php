@extends('admin.layouts.index')

@section('title', 'Заявки на вступление в члены МСК')

@section('content')

    <div class="container container-fluid">
        <div class="title-block">
            <div class="row row--multiline align-items-center">
                <div class="col-md-4">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('products.index') }}">Управление продуктами</a></li>
                        <li><span>{{ $product->article }}</span></li>
                    </ul>
                </div>
                <div class="col-md-8 text-right-md text-right-lg">
                    <div class="flex-form">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}">Назад</a>
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

        <div class="block">
            <h2 class="title-primary">Продукты</h2>
            <div class="input-group">
                <div class="input-group__title">Артикл</div>
                <input type="text" value="{{ $product->article }}" placeholder="Артикл" class="input-regular" name="article" disabled>
            </div>
            <div class="input-group">
                <div class="input-group__title">Названии</div>
                <input type="text" value="{{ $product->name }}"  name="name"placeholder="Названии" class="input-regular" disabled>
            </div>
            <div class="input-group">
                <div class="input-group__title">Статус</div>
                <input type="text" value="{{ $product->status }}"  name="name"placeholder="Названии" class="input-regular" disabled>
            </div>
            <div class="input-group">
                <label class="input-group__title">Доп. данные</label>
                <textarea name="data" class="tinymce-text-here input-regular"
                          disabled>{!! json_decode($product->data) !!}</textarea>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    @role('admin')
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Редактировать</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <!--Only this page's scripts-->
    <!---->
@endsection
