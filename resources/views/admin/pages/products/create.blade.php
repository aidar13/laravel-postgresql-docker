@extends('admin.layouts.index')

@section('title', 'Продукты')

@section('content')

    <div class="container container-fluid">
        <div class="title-block">
            <div class="row row--multiline align-items-center">
                <div class="col-md-8">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('products.index') }}">Управление продуктами</a></li>
                        <li><span>Добавить продукт</span></li>
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
            <form method="post" action="{{route('products.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')

                <h2 class="title-primary">Продукт</h2>
                <div class="input-group">
                    <label class="input-group__title">Артикл <span class="required">*</span></label>
                    <input type="text" name="article" placeholder="Артикл" class="input-regular" value="" required>
                </div>
                <br>
                <div class="input-group">
                    <label class="input-group__title">Название <span class="required">*</span></label>
                    <input type="text" name="name" placeholder="Название" class="input-regular" value="" required>
                </div>
                <br>
                <div class="input-group">
                    <div class="input-group__title">Доп. данные </div>
                    <textarea name="data" class="tinymce-here input-regular"></textarea>
                </div>
                <div class="input-group">
                    <label class="input-group__title">Статус</label>
                    <select name="status" class="input-regular chosen" data-placeholder="" required>
                        <option value="available">available</option>
                        <option value="unavailable">unavailable</option>
                    </select>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn--green">Сохранить</button>
                    </div>
                </div>
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
