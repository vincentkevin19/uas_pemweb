@extends('template.main')
@section('container')
    <div class="container">
        <h1 class="text-center">List Facility</h1>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <div class="row mt-sm-4">
            @foreach ($facilities as $facility)
            <div class="col-sm-3">
                <div class="card" style="height: auto; ">
                    <img src="{{ asset('storage/'.$facility->image) }}" class="card-img-top img-fluid mt-sm-3" alt="...">
                    {{-- <div style="max-height: 350px; overflow: hidden">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-sm-3">    
                    </div> --}}
                    <div class="card-body">
                      <h5 class="card-title">{{ $facility->name }}</h5>
                      <a href="/facility/{{ $facility->id }}" class="btn btn-secondary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection