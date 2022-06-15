<div class="catecory_contant">
    <div class="row">
        <div class="col-12 py-4 px-3 text-center border-bottom">KATEGORİLER</div>
        @foreach ($categories as $category)
            <div class="col-12 py-4 px-3 text-center border-bottom"><a href="{{ route('blogList', $category['id']) }}">{{ $category['title'] }}</a></div>
        @endforeach
    </div>
    <div class="new_category_btn text-center p-4">
        <a href="{{ route('categoryList') }}"><button type="button" class="btn btn-secondary">Kategory İşlemleri</button></a>
    </div>
</div>