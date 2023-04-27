@extends('layouts.app')

@section('content')
    <div>
        <div class="container mb-5 mt-5">
            <h2>
                Show
            </h2>
        </div>
        <div class="container">
            <div class="row">
                <div>
                    <h1>{{ $portfolio->name }}</h1>
                    <h2 class="badge rounded-pill bg-warning">
                       {{$portfolio->type->name}} 
                    </h2>
                    <p>{{ $portfolio->slug }}</p>
                    <p>
                        @forelse($portfolio->technologies as $technology)
                            <span class="badge rounded-pill text-bg-warning">{{ $technology->name }}</span>
                        @empty
                            -
                        @endforelse
                    </p>
                </div>
                <div>
                    <h3>
                        {{ $portfolio->customer }}
                    </h3>
                    <p>
                        {{ $portfolio->description }}
                    </p>
                    <h3>
                        {{ $portfolio->url }}
                    </h3>
                </div>
                <div>
                    <a href="{{ route('portfolios.edit',$portfolio) }}">{{ __('Modifica progetto') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection