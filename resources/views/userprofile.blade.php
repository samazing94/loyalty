@extends('layouts.dashboard')
@section('section')

       @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1> Hello, {{ Auth::user()->email}} </h1>
    <p>You are logged in!</p>
    <table id="pageTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        {{ Auth::user()->email }}
                    </td>
                    <td>
                        {{ Auth::user()->name }}
                    </td>
                    <td>
                        {{ Auth::user()->email }}
                    </td>
                </tr>
            </tbody>
        </table>
@endsection