@extends('layouts.app')

@section('content')

    <div class="container" id="app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (Auth::check())
                    <div class="page-header">
                        <h1>Most View Articles</h1>
                    </div>

            <ul>
                @foreach($rank as $article)
                    <div class="card mb-3">
                        <div class="card-header">
                            <li>
                                <a href="{{ route('article.show', $article->id) }}">NO.{{ $article->id }}</a>
                            </li>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                                {{ $article->title }}
                            </h3>

                        </div>
                    </div>
                @endforeach

            </ul>
                @endif
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
                @endforeach
                {{ $articles->links() }}
            </ul>

            </div>

        </div>

    </div>
@endsection



