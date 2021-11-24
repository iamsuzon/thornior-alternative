@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {!! session('success') !!}
                            </div>
                        @elseif (session('info'))
                            <div class="alert alert-info" role="alert">
                                {{ session('info') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <div class="float-left">
                                    <h5 class="m-0">All Category</h5>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#newCategoryModal">
                                        Add New
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td class="text-capitalize">{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                @if($category->status == 1)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{$category->created_at->format('D d-M-Y')}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button
                                                            class="btn btn-primary" data-toggle="modal"
                                                            data-target="#editCategoryModal-{{$category->id}}">Edit
                                                    </button>
                                                    <button class="btn btn-danger" data-toggle="modal"
                                                            data-target="#deleteCategoryModal-{{$category->id}}">Delete</button>
                                                </div>

                                                <!-- Edit Category Modal -->
                                                <div class="modal fade" id="editCategoryModal-{{$category->id}}"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="editCategoryModalLabel-{{$category->id}}"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editCategoryModalLabel-{{$category->id}}">Edit
                                                                    Category</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{route('admin.category.edit',$category->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <label for="name">Category Name</label>
                                                                    <input class="form-control" type="text"
                                                                           name="category_name" id="name"
                                                                           placeholder="Write a category name here"
                                                                           value="{{$category->name}}">

                                                                    <label class="mt-3 mb-0" for="cstatus">Category
                                                                        Status</label>
                                                                    <div class="radios" id="cstatus">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="status" id="activeRadio"
                                                                                   value="1"
                                                                                   @if($category->status == 1) checked="checked" @endif>
                                                                            <label class="form-check-label"
                                                                                   for="activeRadio">Active</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="status" id="inactiveRadio"
                                                                                   value="0"
                                                                                   @if($category->status == 0) checked="checked" @endif>
                                                                            <label class="form-check-label"
                                                                                   for="inactiveRadio">Inactive</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Discard
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        Changes
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Category Modal -->
                                                <div class="modal fade" id="deleteCategoryModal-{{$category->id}}"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="deleteCategoryModalLabel-{{$category->id}}"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteCategoryModalLabel-{{$category->id}}">Delete Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                    Are You Sure?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Discard
                                                                    </button>
                                                                    <a href="{{route('admin.category.delete',$category->id)}}" class="btn btn-danger">Delete</a>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Category Available</td>
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

    <!-- Create Category Modal -->
    <div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="name">Category Name</label>
                        <input class="form-control" type="text" name="category_name" id="name"
                               placeholder="Write a category name here">

                        <label class="mt-3 mb-0" for="cstatus">Category Status</label>
                        <div class="radios" id="cstatus">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="activeRadio" value="1">
                                <label class="form-check-label" for="activeRadio">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inactiveRadio" value="0">
                                <label class="form-check-label" for="inactiveRadio">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
