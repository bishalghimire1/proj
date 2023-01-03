
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Category</a></li>
                <li class="breadcrumb-item"><a href="#">Add Category</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                            <form action="{{route('category/add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Type</label>
                                        <input type="text" placeholder="Type" class="form-control" name="type">
                                    </div>
                                </div>
                              
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')

@endsection
@endsection
