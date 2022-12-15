@extends('layouts.master')
@section('content')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
    <a href="{{route('product/form')}}"><button class="btn btn-primary btn-block">Add Product</button></a>

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Table</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">All Products</a></li>
            </ol>
            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Name</th>
                                        <th>Product ID</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Tag</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product_table as $key=>$items)
                                    <tr>
                                        <!-- <td><img class="rounded-circle" width="35" src="{{URL::to('assets/images/'.$items->avatar)}}" alt=""></td> -->
                                        <td class="name">{{$items->name}}</td>
                                        <td class="product_id">{{$items->id}}</td>
                                        <td  class="price">{{$items->price}}</td>
                                        <td  class="description">{{$items->description}}</td>
                                        <td  class="tags">{{$items->tags}}</td>
                                        <td  class="category">{{$items->category}}</td>
                                        <td><div><img src="{{ URL::to('storage/images/'.$items->product_image) }}" width="40" alt=""></div></td>
                                        <!-- @if ($items->role_name =='Admin')
                                        <td><span class="badge light badge-success">{{$items->role_name}}</span></td>
                                        @else
                                        <td><span class="badge light badge-info">{{$items->role_name}}</span></td>
                                        @endif
                                        <td class="email">{{$items->email}}</td>
                                        <td hidden class="phone_number">{{$items->phone_number}}</td>
                                        <td hidden class="status">{{$items->status}}</td>
                                        @if ($items->status =='active')
                                        <td>
                                            <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success me-1"></i>{{$items->status}}
                                            </span>
                                        </td>
                                        @else
                                        <td>
                                            <span class="badge light badge-denger">
                                            <i class="fa fa-circle text-denger me-1"></i>{{$items->status}}
                                            </span>
                                        </td>
                                        @endif
                                       
                                        <td class="join_date">{{$items->join_date}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary shadow btn-xs sharp me-1 edit_user" href="#" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger shadow btn-xs sharp delete_user" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>												 -->
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary shadow btn-xs sharp me-1 edit_product" href="#" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger shadow btn-xs sharp delete_product" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>	
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>User ID</th>
                                        <th>Role Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Joining Date</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Expense Modal -->
<div id="edit_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product/update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Product ID</label>
                            <input type="text" class="form-control" id="product_id" name="product_id" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tag</label>
                            <input type="text" class="form-control" id="tag" name="tags">
                        </div>
                        <!-- <div class="mb-3 col-md-6">
                            <label class="form-label">Join Date</label>
                            <input type="text" class="form-control" id="e_join_date" name="join_date" readonly>
                        </div> -->
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary-save submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Expense Modal -->

<!-- Delete User Modal -->
<div class="modal custom-modal fade" id="delete_user" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Product</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('product/delete') }}" method="POST">
                        @csrf
                        <input type="hidden" id="e_id" name="id">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary-cus continue-btn submit-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary-cus cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
</div>
<!-- /Delete User Modal -->
@section('script')
    <!-- Bootstrap Core JS -->
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
    
    {{-- show data on model or edit --}}
    <script>
        $(document).on('click','.edit_product',function()
        {
            var _this = $(this).parents('tr');
            $('#product_id').val(_this.find('.product_id').text());
            $('#name').val(_this.find('.name').text());
            $('#description').val(_this.find('.description').text());
            $('#price').val(_this.find('.price').text());
            $('#category').val(_this.find('.category').text());
            $('#tag').val(_this.find('.tags').text());
            // $('#e_join_date').val(_this.find('.join_date').text());
        });
    </script>

    {{-- delete user --}}
    <script>
        $(document).on('click','.delete_product',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.product_id').text());
        });
    </script>

@endsection
@endsection
