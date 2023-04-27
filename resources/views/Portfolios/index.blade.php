@extends('layouts.app')

@section('content')
    <h1>index</h1>

    <div>
        <div class="container mb-5 mt-5">
            <h2>
                Portfolio
            </h2>
        </div>
        <div>
            <ul class="container">
                <li>
                    <a class="nav-link" href="{{ route('portfolios.create') }}">{{ __('Aggiungi progetto') }}</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Description</th>
                            <th scope="col">Tipo di lavoro</th>
                            <th scope="col">Tecnologia utilizzata</th>
                            <th scope="col">Url</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($portfolio as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</a></td>
                            <td>{{ $item->customer }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <span class="badge rounded-pill text-bg-dark">
                                    {{ $item->type ? $item->type->name: '-' }}
                                </span>
                            </td>
                            <td>
                                @forelse($item->technologies as $technology)
                                    <span class="badge rounded-pill text-bg-primary">{{ $technology->name }}</span>
                                @empty
                                    -
                                @endforelse
                            </td>
                            <td>{{ $item->url }}</td>
                            <td>
                                <form action="{{route('portfolios.destroy',$item)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="DELETE">
                                </form>
                                <a href="{{route('portfolios.edit',$item)}}">
                                    <input type="submit" class="btn btn-primary" value="MODIFICA">
                                </a>
                                <a href="{{route('portfolios.show',$item)}}">
                                    <input type="submit" class="btn btn-primary" value="VAI AL PROGETTO">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection