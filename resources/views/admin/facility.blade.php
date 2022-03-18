@extends('template.main')
@section('container')
    <div class="container">
        <h1 class="text-center">List Facility</h1>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <a href="/facility/create" class="btn btn-primary">Add Facility</a>
        <div class="row mt-sm-4">
            @foreach ($facilities as $facility)
            <div class="col-sm-3 mt-sm-2">
                <div class="card" style="height: auto; ">
                    <img src="{{ asset('storage/'.$facility->image) }}" class="card-img-top img-fluid mt-sm-3" alt="...">
                    {{-- <div style="max-height: 350px; overflow: hidden">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-sm-3">    
                    </div> --}}
                    <div class="card-body">
                      <h5 class="card-title">{{ $facility->name }}</h5>
                      <a href="/facility/{{ $facility->id }}" class="btn btn-secondary">Detail</a>
                      <a href="/facility/{{ $facility->id }}/edit" class="btn btn-success">Edit</a>
                      <form action="/facility/{{ $facility->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('are you sure? ')" >Hapus</button>
                      </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection