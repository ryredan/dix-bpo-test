@extends('layouts.app', ['pageSlug' => ''])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($news as $n)
            <div class="card" style="width: 18rem">
                <div class="card-header">
                    <h3 class="card-title">{{ $n->headline }}</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-subtitle" style="text-align: justify">{{ $n->subhead }}</h4>
                    {{-- <p style="text-align: justify">{{ str_replace('<br />', "\r\n", mb_substr(strip_tags($n->content, ['<br>']), 0, 300)) . '...'}}</p> --}}
                </div>
                <div class="card-footer">
                    <div class="row justify-content-end">
                        {{-- <a href="{{ route('news.edit', $n)}}" class="btn btn-primary btn-sm">Editar</a> --}}
                        <div class="col-sm-6">
                            <a href="{{ route('news.show', $n) }}" class="btn btn-primary btn-sm">Ler Mais</a>
                        </div>
                        <div class="col-sm-3">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('news.edit', $n) }}">Editar</a>
                                    <form method="POST" action="{{ route('news.destroy', $n) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="dropdown-item" value="Apagar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection