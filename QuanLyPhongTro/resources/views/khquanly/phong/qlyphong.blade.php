@extends('LayoutUser')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Danh sách phòng trọ</h4>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Số phòng</th>
                        <th>Loại phòng</th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($room as $key => $value)
                    <tr>
                        <td>{{$value->so_phong}}</td>
                        <td>{{$value->loai_phong}}</td>
                        <td>
                        <span class="text-ellipsis">
                            <?php
                                if($value->trang_thai == 0){
                            ?>
                                    <a href="{{URL::to('/phong-trong/'.$value->id_phong)}}"><span class="fa fa-square-o"></span></a>
                            <?php
                                }else{
                            ?>
                                    <a href="{{URL::to('/phong-co-nguoi/'.$value->id_phong)}}"><span class="fa fa-check-square-o"></span></a>
                            <?php
                                }
                            ?>
                        </span>
                        
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tính
                            </button>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Modal Heading</h4>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div> 
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    Modal body..
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>   
                        </td>
                        <td>
                            <a href="{{URL::to('/sua-phong/'.$value->id_phong)}}" class="active edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active" title="Sửa"></i>
                            </a>
                            <a href="{{URL::to('/xoa-phong/'.$value->id_phong)}}" class="active delete" onclick="return confirm('Chắc chưa???')" ui-toggle-class="">
                                <i class="fa fa-times text-danger text" title="Xóa"></i>
                            </a>
                            <!-- <a href="{{URL::to('/sua-phong/'.$value->id_phong)}}" class="active eye" style="float: right;" ui-toggle-class="">
                                <i class="fa fa-eye text-success text-active" title="Sửa"></i>
                            </a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection