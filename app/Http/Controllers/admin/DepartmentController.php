<?php

namespace App\Http\Controllers\admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('id', 'desc')->paginate(5);
        // dd($departments);
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $en = $request->name_en ;
        $ar = $request->name_ar ;
        // $i = 0;
        Department::create([
            'name_en' => $en ,
            'name_ar' => $ar ,
        ]);
        // foreach ($request as $name_en => $name){

        //     $i++ ;
        // }

        return redirect()->route('admin.departments.create')->with('msg', 'Department added successfully')->with('type', 'success');
        // return redirect()->route('admin.departments.index')->with('msg', 'Department added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Department::find($id)->update([
            'name_en'=>$request->name_en ,
            'name_ar'=>$request->name_ar ,
        ]);

        return redirect()->route('admin.departments.index')->with('msg', 'Department updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        // Department::find($id)->destroy();//للبحث عن العنصر واذا وجد يحذه وان لم يوجد يمكن تطبيق شرط عليها كاظهار رسالة
        Department::destroy($id);// تحذف ماشرة
        return redirect()->route('admin.departments.index')->with('msg', 'Department deleted successfully')->with('type', 'danger');

    }
}
