@extends('layouts.app', ['pageSlug' => 'publish'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Nova publicação</h2>
                </div>
                <div class="card-body">
                    @if($news->exists)
                    <form action="{{ route('news.update', $news) }}" method="post">
                        @method('PUT')
                    @else
                    <form action="{{ route('news.store') }}" method="post">
                    @endif
                        @csrf
                        <div class="form-group">
                            <input type="text" name="headline" id="headline" class="form-control" placeholder="Título" value="{{ old('headline', $news->headline) }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subhead" id="subhead" class="form-control" placeholder="Subtitulo" value="{{ old('subhead', $news->subhead) }}">
                        </div>
                        <div class="form-group">
                            <textarea id="news-content" name="news_content">{{ old('news_content', $news->content) }}</textarea>
                        </div>
                        <input type="submit" value="Publicar" class="btn btn-primary btn-round btn-lg">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdn.tiny.cloud/1/ygqmp4sxjkq9zzb8kpill0behcv5emp1ipdcln6etrgbjtam/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
    selector: '#news-content',
    });
</script>
@endsection
