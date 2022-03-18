@extends('template.main')
@section('container')

<div class="container">
    <div class="row justify-content-center my-sm-3">
        <h1 class="text-center">{{ $facility->name }}</h1>
        <div class="col-sm-8">
            <div style=" overflow: hidden; height: auto; width: auto">
                <img src="{{ asset('storage/'.$facility->image) }}" class="img-fluid mt-sm-3">    
            </div>

            <article class="my-sm-3 fs-5">
                {!! $facility->body !!}
            </article>

            <a href="/facility" class="btn btn-info"> Back</a>
        </div>
    </div>
</div>

@endsection