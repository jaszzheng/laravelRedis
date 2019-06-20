@extends('layouts.master')


@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Most View Articles</h1>
        </div>

            <ul>
                @foreach($rank as $article)
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                    <li>
                        <a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a>
                    </li>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                @endforeach

            </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <h1>All Articles</h1>
        </div>

            <ul>
                @foreach($articles as $article)
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                    <li>
                        <a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a>
                    </li>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                @endforeach

            </ul>
    </div>
@endsection



