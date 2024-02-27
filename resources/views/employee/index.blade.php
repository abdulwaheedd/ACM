@extends('layouts.master')
@section('content')
 <div class="container">
    <div class="text-right">
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
   @php($i=1)
   @foreach ($employees as $employee)
    <tr>
     <td>{{ $i++ }}</td>
     <td>{{ $employee->fullname }}</td>
     <td>{{ $employee->accessPermission==1?"Yes":"No" }}</td>
     <td>{{ $employee->isActive==1?"Yes":"No" }}</td>
     <td><img src="/asset/images/{{ $employee->photo }}" alt="" width="50"></td>
     <td>
      <a href="{{ route('employee.edit',['employee'=>$employee->id]) }}" class="btn btn-xs btn-info">Edit</a> |
     <form method="POST" action="{{ route('employee.destroy',['employee'=>$employee->id]) }}" style="display:inline" onsubmit="return confirm('Are you sure!?')">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
    </form>
     </td>
    </tr>    
   @endforeach
  </tbody>
 </table>
 {{ $employees->links() }}
 </div>
@endsection