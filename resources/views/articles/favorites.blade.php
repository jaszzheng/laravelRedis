@extends('layouts.app')

@section('content')

    <div class="container" id="app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>My Favorites</h1>
                </div>
            <ul>
                @forelse($myFavorites as $myFavorite)
                    <div class="card mb-3">
                        <div class="card-header">
                    <li>
                        <a href="{{ route('article.show', $myFavorite->id) }}">NO.{{ $myFavorite->id }}</a>
                    </li>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            {{ $myFavorite->title }}
                            </blockquote>
                            @if (Auth::check())
                            <div class="panel-footer">
                                <favorite
                                    :article={{ $myFavorite->id }}
                                        :favorited={{ $myFavorite->favorited() ? 'true' : 'false' }}
                                ></favorite>
                            </div>
                            @endif
                        </div>
                        @empty
                            <p>You have no favorite posts.</p>
                    </div>

                @endforelse

            </ul>
            </div>

        </div>

    </div>
@endsection



