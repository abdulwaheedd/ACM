@extends('layouts.master')
@section('content')
 <div class="container">
    <div class="card" style="width: 18rem;">
      {{-- <img src="data:image/png;base64, {!!  base64_encode($withImage) !!}"/> --}}
      {!! QrCode::size(300)->generate("{{ $empinfo->fullname }}") !!}
      <div class="card-body">
        <table class="table">
          <tr>
            <th>Fullname</th><td>{{ $empinfo->fullname }}</td>
          </tr>
          <tr>
            <th>Access Permision</th><td>{{ $empinfo->accessPermission==0?"No":"Yes" }}</td>
          </tr>
          <tr>
            <th>Is Active</th><td>{{ $empinfo->isActive==0?"No":"Yes" }}</td>
          </tr>
          <tr>
            <td colspan="2" class="text-center">
              <img src="/asset/images/{{ $empinfo->photo }}" width="50" class="card-img-top" alt="...">
            </td>
          </tr>
        </table>
      </div>
    </div>
 </div>
@endsection