@extends('template.main')
@section('container')
    <div class="container">
        <h1 class="text-center">Request</h1>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Requester</th>
                        <th scope="col">Requester Facility</th>
                        <th scope="col">date</th>
                        <th scope="col">start time</th>
                        <th scope="col">end time</th>
                        <th scope="col">Operation</th>
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
                            <button class="btn btn-secondary">Approve</button>
                            <form action="/booking/{{ $booking->id }}" method="POST" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="btn btn-secondary" onclick="return confirm('are you sure? ')" >Reject</button>
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