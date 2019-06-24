@extends('layouts.app')

@section('content')

    <div class="container" id="app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>My Favorites</h1>
                </div>


                @forelse($myFavorites as $myFavorite)
                    <div class="card mb-3">
                        <div class="card-header">

                        <a href="{{ route('article.show', $myFavorite->id) }}">NO.{{ $myFavorite->id }}</a>

                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                            {{ $myFavorite->title }}
                            </h3>
                        </div>
                            @if (Auth::check())
                            <div class="card-footer">
                                <favorite
                                    :article={{ $myFavorite->id }}
                                        :favorited={{ $myFavorite->favorited() ? 'true' : 'false' }}
                                ></favorite>
                            </div>
                            @endif

                    </div>
                        @empty

                            <p>You have no favorite posts.</p>

                @endforelse


            </div>

        </div>

    </div>
@endsection



