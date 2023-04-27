@extends('layouts.app')

@section('content')
    <h1>Nuovo progetto</h1>
    <div class="container">
        <form action="{{route('portfolios.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome progetto</label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" value="{{ old('name')}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="customer" class="form-label">Customer</label>
                <input type="text" name="customer" class="form-control @error('customer') is-invalid @enderror" id="customer" value="{{ old('customer')}}">
                @error('customer')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="type-id" class="form-label">Categoria</label>
              <select class="form-select @error('type_id') is-invalid @enderror" id="type-id" name="type_id" aria-label="Default select example">
                <option value="" selected>Seleziona tipo di lavoro</option>
                @foreach ($types as $type)
                  <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
              </select>
              {{-- <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" aria-describedby="titleHelp"> --}}
              {{-- errore title --}}
              @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="technologies" class="form-label">tecnologia utilizzata</label>
                <div class="@error('technologies') is-invalid @enderror">
                    @foreach($technologies as $tech)
                    <div class=form-check>
                        <input name="technologies[]" class="form-check-input" type="checkbox" value="{{$tech->id}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $tech->name }}
                        </label>
                    </div>
                    @endforeach()
                </div>
              @error('technologies')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description')}}">
                @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" value="{{ old('url')}}">
                @error('url')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Aggiungi progetto</button>
        </form>
    </div>
@endsection