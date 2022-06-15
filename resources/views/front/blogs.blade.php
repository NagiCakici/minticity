@extends('layouts.main')

@section('title')
    Minticity
@endsection

@section('css')
@endsection

@section('content')
    <div class="conteiner">

        <div class="text-end p-3 pe-5"><a href="{{ route('newBlog') }}"><button type="button" class="btn btn-success">Yeni İçerik Ekle +</button></a></div>

            <div class="row g-4">
                @foreach ($blogs as $blog)
                 <div class="col-4">
                     <div class="blog_contant">
                         <div class="blog_img"><img src="{{ $blog->image }}"></div>
                         <div class="fs-3 text-center p-2">{{ $blog->title }}</div>
                         <div class="text-center p-2">{{ $blog->text }}</div>
                     </div>
                 </div>
                @endforeach
            </div>

    </div>
@endsection

@section('js')
    <script></script>
@endsection
