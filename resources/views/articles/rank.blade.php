@extends('layouts.master')


@section('content')

            <h1>Most View Articles</h1>

            <ul>
                @foreach($rank as $article)

                    <li>
                        <a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a>
                    </li>
                @endforeach

            </ul>

            <h1>All Articles</h1>

            <ul>
                @foreach($articles as $article)

                    <li>
                        <a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a>
                    </li>
                @endforeach

            </ul>
@endsection



