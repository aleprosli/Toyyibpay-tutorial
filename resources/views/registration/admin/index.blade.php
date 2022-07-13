@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Club Member List</div>
                @if ( session()->has('alert-message'))
                    <div class="alert {{ session()->get('alert-type') }}">
                        {{ session()->get('alert-message') }}
                    </div>
                @endif
                <form action="" method="">
                    <div class="input-group mt-2 p-2">
                        <input type="text" class="form-control" name="keyword" value="{{ request()->get('keyword') }}" placeholder="Search by Identification Number">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Identification Number</th>
                              <th scope="col">Detail</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{ $student->name }}</th>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->ic }}</td>
                                    <td><a onclick="return confirm('Are you sure to show this student?')" href="{{ route('student:show', $student) }}" class="btn btn-primary">Details</a></td>
                                    <td>{{ $student->status }}</td>
                                    <td><a onclick="return confirm('Are you sure to approve this student?')" href="{{ route('student:approve', $student) }}" class="btn btn-success">Approved</a>
                                        <a onclick="return confirm('Are you sure to reject this student?')" href="{{ route('student:reject', $student) }}" class="btn btn-danger">Reject</a></td>
                                </tr>
                            @endforeach
                          </tbody>
                      </table>
                      {{ $students->links() }}
                      <a onclick="return confirm('Are you sure go back?')" href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection