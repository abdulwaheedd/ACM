@extends('layouts.master')
@section('content')
 <div class="container">
 <form action="{{ route('employee.update',['employee'=>$employee->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="firstname">Fullname</label>
    <input type="text" class="form-control" value="{{ $employee->fullname }}" id="fullname" name="fullname">
    @error('fullname')
        <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="lastname">Access Permission</label>
    <select class="form-control" id="acPermission" name="acPermission">
      <option value="0" @if(!$employee->accessPermission) selected='selected' @endif>No</option>
      <option value="1" @if($employee->accessPermission) selected='selected' @endif>Yes</option>
    </select>
    @error('accessPermission')
        <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="lastname">Is Active</label>
    <select class="form-control" id="isActive" name="isActive">
      <option value="0" @if(!$employee->isActive) selected='selected' @endif>No</option>
      <option value="1" @if($employee->isActive) selected='selected' @endif>Yes</option>
    </select>
    @error('isActive')
        <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="firstname">Photo</label>
    <input type="file" class="form-control" id="photo" name="photo">
    <input type="hidden" id="oldphoto" name="oldphoto" value="{{ $employee->photo }}">
    @error('photo')
        <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
 </form>
 </div>
@endsection