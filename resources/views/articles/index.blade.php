@extends('layouts.app')

@section('content')

    <div class="container" id="app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>Recently View Articles</h1>
                </div>
            <ul>
                @foreach($reView as $article)
                    <div class="card mb-3">
                        <div class="card-header">
                    <li>
                        <a href="{{ route('article.show', $article->id) }}">NO.{{ $article->id }}</a>
                    </li>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            {{ $article->title }}
                            </blockquote>
                            <div class="panel-footer">

                            </div>
                        </div>
                    </div>

                @endforeach

            </ul>
            </div>


            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>All Articles</h1>
                </div>

            <ul>
                @foreach($articles as $article)
                    <div class="card mb-3">
                        <div class="card-header">
                            <li>
                                <a href="{{ route('article.show', $article->id) }}">NO.{{ $article->id }}</a>
                            </li>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                {{ $article->title }}
                            </blockquote>
                        </div>
                    </div>
                    @if (Auth::check())
                        <div class="panel-footer">
                            <favorite
                                :article={{ $article->id }}
                                    :favorited={{ $article->favorited() ? 'true' : 'false' }}
                            ></favorite>
                        </div>
                    @endif
                @endforeach
                    {{ $articles->links() }}
            </ul>

            </div>

        </div>

    </div>
@endsection



