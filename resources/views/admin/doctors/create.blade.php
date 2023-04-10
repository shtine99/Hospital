@extends('admin.master')

@section('title', 'departments |' . env('APP_NAME'))

@section('styles')
    <style>
        button.btn_remove {
            background: red;
            border: 0;
            color: white;
            width: 49px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 3px;
            position: relative;
            top: 27px;
            font-size: 14px;
            opacity: .8;
        }

        button.btn_remove:hover {
            opacity: 1;
        }
    </style>
@stop

@section('contant')

    {{-- السيشن هو المسؤول عن ارسال البيانات من رابط الى رابط --}}
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">Add New Doctor</h1>
        <a href="#" onclick="history.back()" class="btn btn-outline-primary px-5">Return Back </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="text-right">
        <button class="btn btn-primary bt-sm my-2" id="add_row">Add Row</button>
    </div>
    <form action="{{ route('admin.doctors.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" autocomplete="new-password" >
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" enctype="multipart/form-data">
        </div>
        <div class="mb-3">
            <label>Bio</label>
            <textarea name="bio"  rows="5" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control">
                <option selected disabled>Select</option>
                @foreach ($departments as $dep)
                    <option value="{{ $dep->id }}">{{ $dep->name_en }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Add</button>
    </form>

@stop

