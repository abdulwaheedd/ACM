@extends('layouts.master')
@section('content')
 <div class="container">
    <div class="card justify-content-center align-items-center" id="empCard" style="width: 18rem;">
      {{-- <img src="data:image/png;base64, {!!  base64_encode($withImage) !!}"/> --}}
      <a href="" id="qrcodedownload">{!! QrCode::size(150)->generate("{{ $empinfo->id }}") !!}</a>
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
    <br>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <button id="btnPrint" onclick="downloadSVG()" class="btn btn-info btn-sm">Print QR Code</button>
        <button id="btnPrintCard" onclick="downloadCard()" class="btn btn-info btn-sm">Print Card</button>
      </div>
    </div>
 </div>
@endsection

  <script>
    function downloadSVG() {
      const svg = document.getElementById('qrcodedownload').innerHTML;
      const blob = new Blob([svg.toString()]);
      const element = document.createElement("a");
      element.download = "w3c.svg";
      element.href = window.URL.createObjectURL(blob);
      element.click();
      element.remove();
    }
    function downloadCard() {
     var printContents = document.getElementById('empCard').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
  </script>