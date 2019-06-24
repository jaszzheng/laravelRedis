@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">

                    <h1>NO.{{ $article->id }}</h1>

                    </div>

                    <div class="card-body">
                        <h3 class="card-title">
                            {{ $article->title }}
                        </h3>
                    </div>

                @if (Auth::check())
                    <div class="card-footer">
                        <favorite
                            :article={{ $article->id }}
                                :favorited={{ $article->favorited() ? 'true' : 'false' }}
                        ></favorite>
                    </div>
                @endif
                </div>

            <a href="{{ url('/') }}">Back</a>

            </div>
        </div>
    </div>

@endsection
