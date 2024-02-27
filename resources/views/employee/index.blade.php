@extends('layouts.master')
@section('content')
 <div class="container">
    <div class="text-right">
        <br>
        <form action="" class="form-inline">
            <div class="input-group">
                <label for="qrCode">Enter Employee Id: &nbsp;</label>
                <div class="form-outline" data-mdb-input-init>
                    <input type="text" id="form1" class="form-control" />
                </div>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <a href="{{ route('employee.create') }}" class="btn btn-sm btn-success">Create Employee</a>
    </div>
  <table class="table">
  <thead>
   <tr>
    <th>ID</th>
    <th>Fullname</th>
    <th>AccessPermission</th>
    <th>isActive</th>
    <th>Photo</th>
    <th>Action</th>
   </tr>
  </thead>
  <tbody>
   @foreach ($employees as $employee)
    <tr>
     <td>{{ $employee->id }}</td>
     <td>{{ $employee->fullname }}</td>
     <td>{{ $employee->accessPermission==1?"Yes":"No" }}</td>
     <td>{{ $employee->isActive==1?"Yes":"No" }}</td>
     <td><img src="/asset/images/{{ $employee->photo }}" alt="" width="50"></td>
     <td>
      <a href="{{ route('employee.show',['employee'=>$employee->id]) }}" class="btn btn-xs btn-primary"><i class="fas fa-circle-info"></i></a> |
        <a href="{{ route('employee.edit',['employee'=>$employee->id]) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a> |
     <form method="POST" action="{{ route('employee.destroy',['employee'=>$employee->id]) }}" style="display:inline" onsubmit="return confirm('Are you sure!?')">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i><button>
    </form>
     </td>
    </tr>    
   @endforeach
  </tbody>
 </table>
 {{ $employees->links() }}
 </div>
@endsection