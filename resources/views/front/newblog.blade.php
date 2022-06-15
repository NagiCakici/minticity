@extends('layouts.main')

@section('title')
    Minticity
@endsection

@section('css')
@endsection

{{-- @if (Session::has('message_sent'))
    @php
        Alert::success(Session::get('message_sent'));
    @endphp
@endif --}}
@if ($errors->any())
    @php
        $errorsMessage = '';
    @endphp
    @foreach ($errors->all() as $hatalar)
        @php
            $errorsMessage .= $hatalar;
        @endphp
    @endforeach
@endif

@section('content')
    <div class="conteiner">
        <div class="fs-2 text-center p-4">Yeni içerik ekleme</div>
        <form action="{{ route('addBlog') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">

                    <label for="category" class="form-label">İçerik Adı:</label>
                    <input type="text" name="title" class="form-control" id="category" aria-describedby="categoryHelp">
                    <div class="text-danger">
                        {{ isset($errorsMessage) ? $errorsMessage : '' }}
                    </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Kısa Metin:</label>
                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Metin:</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <option selected>Kategori Şecimi</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                  </select>

            </div>
            <div class="border-bottom row">
                <div class="col-3"><button type="submit" class="btn btn-success">Ekle +</button></div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
