@extends('LayoutUser')
@section('content')
<div class="card">
    <form class="form-horizontal" action="{{URL::to('/add-phong')}}" method="post">
        {{ csrf_field() }}             
        <div class="col-sm-4">
            <h2>THÔNG TIN ĐĂNG NHẬP</h2>
            <div class="form-group row2">
                <label for="txtHo">Họ và tên</label>
                <input type="text" class="form-control" id="txtHoTen" name="ho_ten">
            </div>
            <div class="form-group row2">
                <label for="txtGioiTinh">Mật khẩu</label>
                <input type="text" class="form-control" id="txtMatKhau" name="mat_khau">
            </div>
            <div class="form-group row2">
                <label for="txtGioiTinh">Email</label>
                <input type="text" class="form-control" id="txtEmail" name="e_mail">
            </div>
            <div class="form-group row2">
                <label for="txtNganh">Số điện thoại</label>
                <input type="text" class="form-control" id="txtPhone" name="so_dien_thoai">
            </div>
            <div class="border-top text-center row2">
                <div class="card-body">
                    <button type="submit" name="them" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>     
@endsection