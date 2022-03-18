@extends('template.main')
@section('container')
<div class="container">
     <h1 class="text-center">Book Facility</h1>

    <div class="row justify-content-center">
        <div class="col-sm-10 ">
            <form method="POST" action="/booking" class="mb-sm-5" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                  <label for="facility" class="form-label">facility</label>
                  <select class="form-select" name="facility_id">
                    @foreach ($facilities as $facility)
                      @if (old('facility_id')==$facility->id)
                      <option value="{{ $facility->id }}" selected>{{ $facility->name }}</option>  
                      @else
                      <option value="{{ $facility->id }}">{{ $facility->name }}</option>  
                      @endif
                    @endforeach
                  </select>
                </div>
                

                <div class="mb-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"  name="date" required value="{{ old('date') }}">
                  @error('date')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="start_time" class="form-label">start_time</label>
                  <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time"  name="start_time" required value="{{ old('start_time') }}">
                  @error('start_time')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="end_time" class="form-label">end_time</label>
                  <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time"  name="end_time" required value="{{ old('end_time') }}">
                  @error('end_time')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
        
                <button type="submit" class="btn btn-primary">Book Facility</button>
            </form>
        </div>
    </div>
    
</div>
@endsection