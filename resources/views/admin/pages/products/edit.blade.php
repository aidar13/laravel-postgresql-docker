@extends('admin.layouts.index')

@section('title', 'Продукты')

@section('content')

    <div class="container container-fluid">
        <div class="title-block">
            <div class="row row--multiline align-items-center">
                <div class="col-md-8">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('products.index') }}">Управление продуктами</a></li>
                        <li><a href="{{ route('products.show', $product) }}">{{ $product->article }}</a></li>
                        <li><span>Редактировать</span></li>
                    </ul>
                </div>
                <div class="col-md-4 text-right-md text-right-lg">
                    <div class="flex-form">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @role('admin')

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="block">
            <form method="post" action="{{route('products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <h2 class="title-primary">Продукт</h2>
                <div class="input-group">
                    <label class="input-group__title">Артикл <span class="required">*</span></label>
                    <input type="text" name="article" placeholder="Артикл" class="input-regular" value="{{ $product->article }}">
                </div>
                <br>
                <div class="input-group">
                    <label class="input-group__title">Название <span class="required">*</span></label>
                    <input type="text" name="name" placeholder="Название" class="input-regular" value="{{ $product->name }}">
                </div>
                <br>
                <div class="input-group">
                    <div class="input-group__title">Доп. данные </div>
                    <textarea name="data" class="tinymce-here input-regular">{!! json_decode($product->data) !!}</textarea>
                </div>
                <div class="input-group">
                    <label class="input-group__title">Статус</label>
                    <select name="status" class="input-regular chosen" data-placeholder="" required>
                        <option value="available" {{ $product->status == 'available' ? 'selected' : '' }}>available</option>
                        <option value="unavailable" {{ $product->status == 'unavailable' ? 'selected' : '' }}>unavailable</option>
                    </select>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn--green">Сохранить</button>

                        <a class="btn btn-danger btn--red" href="{{ route('products.destroy', $product->id) }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('delete-form').submit();" title="Удалить">Удалить
                        </a>
                    </div>
                </div>
            </form>

            <form id="delete-form" action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-none">
                @csrf
                @method('DELETE')
            </form>
        </div>

        @endrole
    </div>

@endsection
@section('scripts')
    <!--Only this page's scripts-->
    <script src="https://cdn.tiny.cloud/1/eutvjr9zyhc4qtchwyfwhutknw2iunsf80kiuye2fdomu2wd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/admin/assets/api.js"></script>
    <script src="/admin/assets/js/tinymce.js"></script>
    <!---->
@endsection
