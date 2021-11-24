@extends('layouts.admin_loggedin_app')

@section('content')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Admin Settings') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-6 card">
                                <div class="card-header">
                                    <h5 class="float-left">My Profile</h5>
                                    <button class="btn btn-info text-white float-right" data-toggle="modal"
                                            data-target="#editProfileModal">Edit Profile
                                    </button>
                                </div>
                                <div class="card-body">
                                    <img src="{{asset('upload/admin/avatar')}}/{{$admins['self']->image}}"
                                         width="100px">
                                    <h5>Name: {{$admins['self']->name}}</h5>
                                    <h5>Email: {{$admins['self']->email}}</h5>
                                    <h5>Role: {{$admins['self']->role}}</h5>
                                </div>
                            </div>
                            <div class="col-6 card">
                                <div class="card-header"><h5>All Admins</h5></div>
                                <div class="card-boy">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($admins['all'] as $admin)
                                            <tr>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->role}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">No Data Available</td>
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

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.settings.profile.edit',$admins['self']->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="profile-image text-center">
                            <p><input type="file" accept="image/*" name="image" id="file"
                                      onchange="profileImageEdit(event)" style="display: none;"></p>
                            <p class="text-center" id="image-label"><label for="file"
                                                                           style="cursor: pointer;"><i
                                        class="fas fa-camera"></i> Change Image</label></p>
                            <p id="image-box"><img src="{{asset('upload/admin/avatar')}}/{{$admins['self']->image}}" id="output" style="width: 50%;height: auto;border-radius: 2%"/></p>
                            <p id="remove-image" class="text-center" onclick="removeProfileImageEdit(event)"
                               style="display: none;cursor: pointer">Remove image</p>
                        </div>
                        <br>
                        <label for="name">Admin Name</label>
                        <input class="form-control" type="text" name="name" id="name"
                               placeholder="Write a name here" value="{{$admins['self']->name}}">
                        <br>
                        <label for="email">Email Address</label>
                        <input class="form-control" type="email" name="email" id="email"
                               placeholder="Write a email here" value="{{$admins['self']->email}}">
                        <br>
                        <label for="password">Password <sub>If you don't want to change the password, keep the field
                                empty</sub></label>
                        <input class="form-control" type="password" name="password" id="password"
                               placeholder="Write a strong password here">

                        <p class="mt-3">For this type of account(Super Administrator) no confirmation email will be
                            sent.</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Edit Product
        profileImageEdit = function (event) {
            // Product image
            document.getElementById('image-box').style.display = 'block';
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
            document.getElementById('image-label').style.display = 'none';
            document.getElementById('remove-image').style.display = 'block';
        };

        removeProfileImageEdit = function (event) {
            var imageInput = document.getElementById('file');
            imageInput.value = "";
            var image = document.getElementById('output');
            image.src = "";

            document.getElementById('image-box').style.display = 'none';
            document.getElementById('image-label').style.display = 'block';
            document.getElementById('remove-image').style.display = 'none';
        }
    </script>
@endsection
