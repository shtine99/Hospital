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
        <h1 class="m-0">Add New Department</h1>
        <a href="#" onclick="history.back()" class="btn btn-outline-primary px-5">Return Back </a>
    </div>

    <div class="text-right">
        <button class="btn btn-primary bt-sm my-2" id="add_row">Add Row</button>
    </div>
    <form action="{{ route('admin.departments.store') }}" method="POST">

        @csrf

        <div class="item-wrapper">
            <div class="item">
                <div class="mb-3">
                    <label>English Name</label>
                    <input type="text" name="name_en" required placeholder="English Name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Arabic Name</label>
                    <input type="text" name="name_ar" required placeholder="Arabic Name" class="form-control">
                </div>
            </div>
        </div>

        <button class="btn btn-success">Add</button>
    </form>

@stop

{{-- @section('scripts')

    <script>
        let row = `<div class="item">
                        <button class="btn_remove"><i class="fas fa-times"></i></button>
                        <hr>
                        <div class="mb-3">
                            <label>English Name</label>
                            <input type="text" name="name_en[]" required placeholder="English Name" class="form-control ">
                        </div>
                        <div class="mb-3">
                            <label>Arabic Name</label>
                            <input type="text" name="name_ar[]" required placeholder="Arabic Name" class="form-control mb-3">
                        </div>
                    </div>`;

        $('#add_row').click(function() {
            $('.item-wrapper').append(row)
        });

        // $('.btn_remove').click(function() {// الزر الذي تنشئه الجافا سكريبت لا تطبق عليه الاكواد وكان الصفحة لا تراه من الاساس
        //     alert(55)
        // }) يجب الامساك بعنصر موجود بالصفحة من البداية وليس عنصر يتم انشاءه بعد الضغط على زر مثلا

        $('body').on('click', '.btn_remove', function(
        e) { // هنا معناه اننا امسكنا بالبدي كعنصر موجود فعلا و(on) تعني انه اي تصرف يحدث عليك عند الضغط وبالتحديد علة زر الحذف طبفلي الكود التالي في الدالة
            e.preventDefault();
            $(this).parent().remove(); // اي ان عند الضغط هنا this قم بحذف العنصرالاب
        });
    </script>
@stop --}}
