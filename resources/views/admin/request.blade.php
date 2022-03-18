@extends('template.main')
@section('container')
    <div class="container">
        <h1 class="text-center">ini halaman request admin</h1>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-striped ">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th >Requester</th>
                        <th >Requester Facility</th>
                        <th >date</th>
                        <th >start time</th>
                        <th >end time</th>
                        <th >operation</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($bookings as $booking)
                      <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->facility->name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->start_time }}</td>
                        <td>{{ $booking->end_time }}</td>
                        <td>
                          {{-- <a href="/booking/{{ $booking->id }}/edit" class="badge bg-success text-decoration-none">Edit</a> --}}
                          <form action="/booking/{{ $booking->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-secondary border-0" onclick="return confirm('are you sure? ')" >Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection