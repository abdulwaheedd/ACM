<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.index',['employees'=>Employee::paginate(2)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'photo' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        $imageName = time().'.'.request()->photo->getClientOriginalExtension();
        request()->photo->move(public_path('asset/images'), $imageName);
        Employee::create([
            'fullname'=>$request->fullname,
            'accessPermission'=>$request->acPermission,
            'isActive'=>$request->isActive,
            'photo'=>$imageName,
        ]);
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$employee)
    {
        $request->validate([
            'fullname' => 'required',
            'photo' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        $imageName = $request->oldphoto;
        if($request->hasFile('photo')){
            $imageName = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('asset/images'), $imageName);
        }
        Employee::where('id',$employee)->update([
            'fullname'=>$request->fullname,
            'accessPermission'=>$request->acPermission,
            'isActive'=>$request->isActive,
            'photo'=>$imageName,
        ]);
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($employee)
    {
        Employee::where('id',$employee)->delete();
        return redirect()->route('employee.index');
    }
}
