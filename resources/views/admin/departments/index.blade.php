@extends('admin.master')

@section('title', 'departments |' . env('APP_NAME'))

@section('contant')

    <marquee onmouseover="this.stop();" onmouseout="this.start();">بسم الله الرحمن الرحيم (لا تنسوا الصلاة على النبي )</marquee>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">All Deppartments</h1>
        <a href="{{ route('admin.departments.create') }}" class="btn btn-outline-primary px-5">Add New </a>
    </div>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table style="text-align: center" class="table table-hover table-striped table-bordered">
        <tr class="bg-dark text-white">
            <th>ID</th>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>U vbtpdated At</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>

        @forelse ($departments as $dep)
            <tr id="row_{{ $dep->id }}">
                <td>{{ $dep->id }}</td>
                <td class="name_en">{{ $dep->name_en }}</td>
                <td class="name_ar">{{ $dep->name_ar }}</td>
                <td>{{ $dep->updated_at->diffForHumans() }}</td>
                <td>{{--  هناك مكتبة في بي اتش بي اسمها كاربون تحتوي على دوال للتحكم بالتواريخ مثل هاتان الدالتان --}}

                    {{--  الطريقة الرسمية || حرف الام كابيتال يجيب اختصار الشهر اما حرف الاف كابيتال يجيب اسم الشهر كامل --}}
                    {{-- {{ $dep->created_at->format('d M, Y') }} --}}

                    {{-- طريقة اخرى منذ متى --}}
                    {{ $dep->created_at->diffForHumans() }}
                </td>
                <td>
                    <a data-id="{{ $dep->id }}" class="btn btn-sm btn-primary btn_edit" data-toggle="modal"
                        data-target="#editModal">Edit</a>
                    <form class="d-inline" action="{{ route('admin.departments.destroy', $dep->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-danger"> Delete </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center">No Data Found</td>
            </tr>
        @endforelse

    </table>



    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" value="">
                        <div class="mb-3">
                            <label>English Name</label>
                            <input type="text" name="name_en" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Arabic Name</label>
                            <input type="text" name="name_ar" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{ $departments->links() }}
@stop

@section('scripts')

    <script>
        $('.btn_edit').click(function(e) {
            e.preventDefault();// لالفاء الوظيفة الافتراضية اي ان تاغ ال a بطل رابط

            var id = $(this).data('id');
            var name_en = $(this).parents('tr').find('.name_en').text();
            var name_ar = $(this).parents('tr').find('.name_ar').text();
            var url = '{{ route("admin.departments.index") }}/'+id;// لانه بنفعش امرر متغير هنا بالجافا سكريبت ودالة الابديت تحتاج متغير الاي دي قمنا بعمل الرابط على هذا الشكل

            $('#editModal form').attr('action', url);// معناها : في داخل العنصر صاحب الايد اديت مودل موجود فورم بدي اغير على خاصية الاكشن واعطيها قيمة متغير اليو ار ال

            $('#editModal input[name=name_en]').val(name_en);
            $('#editModal input[name=name_ar]').val(name_ar);
            $('#editModal input[name=id]').val(id);


            // console.log( id, name_en , name_ar );

        })

        $('#editModal form').submit(function(e){
            e.preventDefault();

            var new_en = $('#editModal input[name=name_en]').val();
            var new_ar = $('#editModal input[name=name_ar]').val();
            var id = $('#editModal input[name=id]').val();
            var url = $('#editModal form').attr('action');
            var data = $('#editModal form').serialize();

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function() {
                    $('#row_'+id).find('.name_en').text(new_en);
                    $('#row_'+id).find('.name_ar').text(new_ar);

                    $('#editModal').modal('hide');
                },
                error: function() {
                    console.log(err);
                }
            })


        })
    </script>

@stop
