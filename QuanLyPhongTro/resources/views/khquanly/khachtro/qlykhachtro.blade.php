@extends('LayoutUser')
@section('content')
<div class="card">
    <div class="card-body">
    <nav class=" navbar-light bg-light">
        <div>
            <form class="d-flex">
            <div class="search">
                <input class="form-control" type="search" id="myInput" onkeyup="myFunction()" placeholder="Search" aria-label="Search">
            </div>
            </form>
        </div>
    </nav>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Phòng</th>
                        <th>Họ đệm</th>
                        <th>Tên</th>
                        <th>Số CMND</th>
                        <th>Số điện thoại</th>
                        <th>Quê quán</th>
                        <th>Hộ khẩu thường trú</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach($room as $key => $value)            
                    <tr>                       
                        <td>{{$value->so_phong}}</td>
                        <td>{{$value->ho_dem}}</td>
                        <td>{{$value->ten_khachtro}}</td>
                        <td>{{$value->so_cmnd}}</td>
                        <td>{{$value->so_phone}}</td>
                        <td>{{$value->que_quan}}</td>
                        <td>{{$value->ho_khau}}</td>
                        <td>
                            <a href="{{URL::to('/sua-khach-tro/'.$value->id_khachtro)}}" class="active edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active" title="Sửa"></i>
                            </a>
                            <a href="{{URL::to('/xoa-khach-tro/'.$value->id_khachtro)}}" class="active delete" onclick="return confirm('Chắc chưa???')" ui-toggle-class="">
                                <i class="fa fa-times text-danger text" title="Xóa"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Start Search -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }   
  }
}
</script>
<!-- End Search -->
@endsection