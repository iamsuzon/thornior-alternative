@extends('layouts.admin_loggedin_app')

@section('content')
    <!-- creat account area start -->
    <section class="creat-account style-one">
        <div class="container">
            <div class="section-wrapper">
                <div class="account-link">
                    @if(isset($blogger_email))
                    <div class="link-title">
                        <h4>The link has been sent to</h4>
                        <p>{{$blogger_email}}</p>
                    </div>
                    <div class="link-icon">
                        <i class="far fa-check-circle"></i>
                    </div>
                    @else
                        <h4>Nothing To Show Here</h4>
                    @endif
                    <div class="link-btn">
                        <a href="{{route('admin.dashboard')}}" class="btn"><span>Go To Admin page</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- creat account area ends  -->
@endsection
