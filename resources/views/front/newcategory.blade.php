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
        <div class="fs-2 text-center p-4">Yeni Kategori </div>
        <form action="{{ route('addCategory') }}" method="post">
            @csrf
            <div class="mb-3">
                    <label for="category" class="form-label">Kategori Adı:</label>
                    <input type="text" name="title" class="form-control" id="category" aria-describedby="categoryHelp">
                    <div class="text-danger">
                        {{ isset($errorsMessage) ? $errorsMessage : '' }}
                    </div>
            </div>
            <div class="border-bottom row">
                <div class="col-6 text-end"><a href="{{ route('categoryList') }}"><button type="button"
                            class="btn btn-light">Geri dön</button></a></div>
                <div class="col-6"><button type="submit" class="btn btn-success">Ekle +</button></div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
