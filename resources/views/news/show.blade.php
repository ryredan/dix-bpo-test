@extends('layouts.app', ['pageSlug' => 'news'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 style="text-align: center">{{ $news->headline }}</h1>
                    <h4 style="text-align: center">{{ $news->subhead }} </h4>
                    {!! $news->content !!}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection