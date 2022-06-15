@extends('layouts.main')

@section('title')
    Minticity
@endsection

@section('css')
@endsection

@section('content')
    <div class="conteiner">
        <div class="fs-2 text-center p-4">Kategori İşlemleri</div>
        @foreach ($categories as $category)
            <div class="border-bottom row">
                <div class="col-10">{{ $category['title'] }}</div>
                <div class="col-1"><a href="{{ route('editCategory', $category['id']) }}"><button type="button"
                            class="btn btn-primary">Düzenle</button></a></div>
                <div class="col-1">
                    <form action="{{ route('deleteCategory', $category['id']) }}" method="POST">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sil
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="p-3">
        <a href="{{ route('newCategory') }}"><button type="button" class="btn btn-success">Yeni Kategori Ekle
                +</button></a></div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
