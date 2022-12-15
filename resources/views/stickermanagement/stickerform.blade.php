
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Sticker</a></li>
                <li class="breadcrumb-item"><a href="#">Add Sticker</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                            <form action="{{route('sticker/add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price</label>
                                        <input type="text" placeholder="Price" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="row">
                                    
                                <div class="mb-3 col-md-6">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                </div>
                                <div class="row">
                                <div class="mb-3">
                                    <label class="mb-1">Category</label>
                                    <select class="form-control default-select wide @error('role_name') is-invalid @enderror" name="category" id="category">
                                        <option selected disabled>-- Select Category --</option>
                                        @foreach ($category as $name)
                                            <option value="{{ $name }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tags</label>
                                        <input type="tel" class="form-control" name="tags">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Upload File</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="upload[]">
                                            </div>
                                            <span class="input-group-text">Upload</span>
                                        </div>
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
