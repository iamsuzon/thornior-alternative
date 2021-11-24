@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <div class="float-left">
                                    <a href="{{route('users.index')}}">Pending Bloggers</a>
                                </div>
                                <div class="float-right">
{{--                                    <form class="d-inline-block" action="{{route('users.create')}}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" value="active" class="btn btn-link">Active</button>--}}
{{--                                    </form>--}}
{{--                                    <form class="d-inline-block" action="{{route('users.create')}}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" value="declined" class="btn btn-link">Declined</button>--}}
{{--                                    </form>--}}
                                    <a class="btn btn-sm btn-link" href="{{route('users.edit','active')}}">Active</a>
                                    <a class="btn btn-sm btn-link" href="{{route('users.edit','declined')}}">Declined</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Registration Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}} <sub>{{$user->created_at->diffForHumans()}}</sub></td>
                                            <td>
                                                <div class="btn-group">
                                                    <form class="d-inline-block" action="{{route('users.update',$user->id)}}" method="POST">
                                                        @csrf @method('PUT')
                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Pending Request Available</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
