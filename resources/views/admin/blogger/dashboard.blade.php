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
                        @elseif(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{route('admin.blogger.create')}}" class="btn btn-success">Create New Blogger</a>

                            <br>
                            <br>

                        <div class="card">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($bloggers as $blogger)
                                    <tr>
                                        <th scope="row">{{$blogger->id}}</th>
                                        <td>{{$blogger->name}}</td>
                                        <td>{{$blogger->email}}</td>
                                        <td>{{$blogger->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if($blogger->account_status == 1)
                                                <a class="btn btn-success btn-sm" href="{{route('admin.blogger.account.giveapproval',$blogger->id)}}">Approve</a>
                                            @else
                                                <div class="btn-group">
                                                    <a class="btn btn-secondary btn-sm disabled" href="#">Link Sent</a>
                                                    <a class="btn btn-primary btn-sm" href="{{route('admin.blogger.sent.again',$blogger->email)}}">Send Again</a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Data Available</td>
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
@endsection
