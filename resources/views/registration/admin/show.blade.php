@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Name: {{ $student->name }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">Username</th>
                              <th scope="col">Identification Number</th>
                              <th scope="col">Address</th>
                              <th scope="col">Age</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Interest</th>
                              <th scope="col">Class</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <th scope="row">{{ $student->username }}</th>
                                <td>{{ $student->ic }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->phone_number }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->interest }}</td>
                                <td>{{ $student->class }}</td>
                                <td><a onclick="return confirm('Are you sure to edit this student?')" href="{{ route('student:edit', $student) }}" class="btn btn-warning">Update</a>
                                    <a onclick="return confirm('Are you sure to delete this student?')" href="{{ route('student:destroy', $student) }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                          </tbody>
                      </table>
                      <a onclick="return confirm('Are you sure go back?')" href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection