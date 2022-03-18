@extends('template.main')
@section('container')
<div class="container">
    <h1 class="text-center mb-sm-4" >Welcome</h1>
    <div class="row">
        @foreach ($facilities as $facility)
        <div class="col-sm-4">
                <div class="card" style="width: auto; height: auto">
                    <img src="{{ asset('storage/'.$facility->image) }}" class="card-img-top img-fluid">
                    <div class="card-body">
                    <h5 class="card-title">{{ $facility->name }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>

@endsection
