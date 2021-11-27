<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\HopDong;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Redirect;
session_start();
class UserController extends Controller
{
    public function header_NQN()
    {
        return View('khquanly.headerNQN');
    }
    //kiemtradangnhap
    public function AuthLogin(){
        $id_user = Session::get('user_id');
        if($id_user){
            return Redirect::to('/header');
        }else{
            return Redirect::to('/dangnhap')->send();
        }
    }
    //kiemtrahopdong
    public function AuthHopDong(){

        $user_id = Session::get('user_id');
        $hopdong_id = HopDong::where('user_id', $user_id)->first();

        if($hopdong_id){
            return Redirect::to('/thongtin-canhan');
        }else{
            return Redirect::to('/header')->send();
        }
    }

//User..............................................................................
    public function thongtin_user()
    {
        return View('khquanly.thongtinUser.thongtindangnhap');
    }
    public function sua_thongtin_dangnhap($id){
        $this->AuthLogin();
        $this->AuthHopDong();
        $edit = DB::table('tbl_loginuser')->where('user_id', $id)->get();
        $manager = view('khquanly.thongtinUser.thongtindangnhap')->with('edit_thongtin', $edit);
        return view('LayoutUser')->with('khquanly.thongtinUser.thongtindangnhap', $manager);
    }
    public function update_thongtin_dangnhap(Request $request, $update){
        $this->AuthLogin();
        $this->AuthHopDong();
        $data = array();
        $data['user_fullname'] = $request->ho_ten;
        $data['user_password'] = $request->mat_khau;
        $data['user_email'] = $request->e_mail;
        $data['user_phone'] = $request->so_dien_thoai;
        DB::table('tbl_loginuser')->where('user_id', $update)->update($data);
        //Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('qly-phong');
    }


//Phong.............................................................................
    public function them_phong(){
        $this->AuthLogin();
        $this->AuthHopDong();
        $loai = DB::table('tbl_loaiphong')->orderBy('id_loaiphong','desc')->get();
        return View('khquanly.phong.themphong')->with('loai_phong',$loai);
    }
    public function qly_phong(){
        $this->AuthLogin();
        $this->AuthHopDong();
        $phong = DB::table('tbl_phong')->get();
        $data = view('khquanly.phong.qlyphong')->with('room',$phong);
        return view('LayoutUser')->with('khquanly.phong.qlyphong',$data);
        //return View('khquanly.qlyphong');
    }
    public function add_phong(Request $request)
    {
        $this->AuthLogin();
        $this->AuthHopDong();
        $data = array();
        $data['so_phong'] = $request->so_phong;
        $data['loai_phong'] = $request->loai_phong;
        $data['trang_thai'] = $request->trang_thai;

        DB::table('tbl_phong')->insert($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('/them-phong');
    }
    public function phong_trong($trangthai){
        $this->AuthLogin();
        $this->AuthHopDong();
        DB::table('tbl_phong')->where('id_phong', $trangthai)->update(['trang_thai'=>1]);
        //Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('/qly-phong');
    }

    public function phong_co_nguoi($trangthai){
        $this->AuthLogin();
        $this->AuthHopDong();
        DB::table('tbl_phong')->where('id_phong', $trangthai)->update(['trang_thai'=>0]);
        //Session::put('message','Bỏ kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('qly-phong');
    }

    public function sua_phong($id){
        $this->AuthLogin();
        $this->AuthHopDong();
        $edit = DB::table('tbl_phong')->where('id_phong', $id)->get();
        $manager = view('khquanly.phong.suaphong')->with('edit_phong', $edit);
        return view('LayoutUser')->with('khquanly.phong.suaphong', $manager);
    }

    public function update_phong(Request $request, $update){
        $this->AuthLogin();
        $this->AuthHopDong();
        $data = array();
        $data['so_phong'] = $request->so_phong;
        $data['loai_phong'] = $request->loai_phong;

        DB::table('tbl_phong')->where('id_phong', $update)->update($data);
        //Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('qly-phong');
    }

    public function xoa_phong($xoa){
        $this->AuthLogin();
        $this->AuthHopDong();
        DB::table('tbl_phong')->where('id_phong', $xoa)->delete();
        //Session::put('message','');
        return Redirect::to('/qly-phong');
    }

//Khachtro..............................................................................................
    public function them_khach_tro(){
        $this->AuthLogin();
        $this->AuthHopDong();
        return View('khquanly.khachtro.themkhachtro');
    }
    public function qly_khach_tro(){
        $this->AuthLogin();
        $this->AuthHopDong();
        $khachtro = DB::table('tbl_khachtro')->get();
        $data = view('khquanly.khachtro.qlykhachtro')->with('room',$khachtro);
        return view('LayoutUser')->with('khquanly.khachtro.qlykhachtro',$data);
    }
    public function add_khach_tro(Request $request)
    {
        $this->AuthLogin();
        $this->AuthHopDong();
        $data = array();
        $data['so_phong'] = $request->so_phong;
        $data['ho_dem'] = $request->ho_dem;
        $data['ten_khachtro'] = $request->ten_khachtro;
        $data['so_cmnd'] = $request->so_cmnd;
        $data['so_phone'] = $request->so_phone;
        $data['que_quan'] = $request->que_quan;
        $data['ho_khau'] = $request->ho_khau;

        DB::table('tbl_khachtro')->insert($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('/them-khach-tro');
    }
    public function xoa_khach_tro($xoa){
        $this->AuthLogin();
        $this->AuthHopDong();
        DB::table('tbl_khachtro')->where('id_khachtro', $xoa)->delete();
        //Session::put('message','');
        return Redirect::to('/qly-khach-tro');
    }
    public function sua_khach_tro($id){
        $this->AuthLogin();
        $this->AuthHopDong();
        $edit = DB::table('tbl_khachtro')->where('id_khachtro', $id)->get();
        $manager = view('khquanly.khachtro.suakhachtro')->with('edit_khachtro', $edit);
        return view('LayoutUser')->with('khquanly.khachtro.suakhachtro', $manager);
    }

    public function update_khach_tro(Request $request, $update){
        $this->AuthLogin();
        $this->AuthHopDong();
        $data = array();
        $data['so_phong'] = $request->so_phong;
        $data['ho_dem'] = $request->ho_dem;
        $data['ten_khachtro'] = $request->ten_khachtro;
        $data['so_cmnd'] = $request->so_cmnd;
        $data['so_phone'] = $request->so_phone;
        $data['que_quan'] = $request->que_quan;
        $data['ho_khau'] = $request->ho_khau;

        DB::table('tbl_khachtro')->where('id_khachtro', $update)->update($data);
        //Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('qly-khach-tro');
    }

//loaiphong.............................................................................
    public function them_loai_phong(){
        $this->AuthLogin();
        $this->AuthHopDong();
        return View('khquanly.loaiphong.themloaiphong');
    }
    public function add_loai_phong(Request $request)
    {
        $this->AuthLogin();
        $this->AuthHopDong();
        $data = array();
        $data['stt'] = $request->stt;
        $data['loai_phong'] = $request->loai_phong;
        $data['gia_phong'] = $request->gia_phong;
        $data['mo_ta'] = $request->mo_ta;

        DB::table('tbl_loaiphong')->insert($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('/them-loai-phong');
    }
    public function qly_loai_phong(){
        $this->AuthLogin();
        $this->AuthHopDong();
        $phong = DB::table('tbl_loaiphong')->get();
        $data = view('khquanly.loaiphong.qlyloaiphong')->with('room',$phong);
        return view('LayoutUser')->with('khquanly.loaiphong.qlyloaiphong',$data);
        //return View('khquanly.qlyphong');
    }
    public function sua_loai_phong($id){
        $this->AuthLogin();
        $this->AuthHopDong();
        $edit = DB::table('tbl_loaiphong')->where('id_loaiphong', $id)->get();
        $manager = view('khquanly.loaiphong.sualoaiphong')->with('edit_loaiphong', $edit);
        return view('LayoutUser')->with('khquanly.loaiphong.sualoaiphong', $manager);
    }

    public function update_loai_phong(Request $request, $update){
        $this->AuthLogin();
        $this->AuthHopDong();
        $data = array();
        $data['stt'] = $request->stt;
        $data['loai_phong'] = $request->loai_phong;
        $data['gia_phong'] = $request->gia_phong;
        $data['mo_ta'] = $request->mo_ta;

        DB::table('tbl_loaiphong')->where('id_loaiphong', $update)->update($data);
        //Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('qly-loai-phong');
    }

    public function xoa_loai_phong($xoa){
        $this->AuthLogin();
        $this->AuthHopDong();
        DB::table('tbl_loaiphong')->where('id_loaiphong', $xoa)->delete();
        //Session::put('message','');
        return Redirect::to('qly-loai-phong');
    }

//thongtincanhan.........................................................................................................
    public function thongtin_canhan()
    {
        return View('khquanly.thongtinUser.thongtincanhan');
    }

    // public function update_loai_phong(Request $request, $update){
    //     //$this->AuthLogin();
    //     $data = array();
    //     $data['stt'] = $request->stt;
    //     $data['loai_phong'] = $request->loai_phong;
    //     $data['gia_phong'] = $request->gia_phong;
    //     $data['mo_ta'] = $request->mo_ta;

    //     DB::table('tbl_loaiphong')->where('id_loaiphong', $update)->update($data);
    //     //Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
    //     return Redirect::to('qly-loai-phong');
    // }

//hopdong.....................................................................................................................
    public function hop_dong(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $hopdong= new HopDong();
        $hopdong->ho_ten=$data['ho_ten'];
        $hopdong->nam_sinh=$data['nam_sinh'];
        $hopdong->dia_chi=$data['dia_chi'];
        $hopdong->so_dien_thoai=$data['so_dien_thoai'];
        $hopdong->e_mail=$data['e_mail'];
        $hopdong->user_id=Session::get('user_id');

        $hopdong->save();
        $dieukhien=$hopdong->id_hopdong;
        Session::put('id_hopdong',$dieukhien);
        return Redirect::to('/thongtin-canhan');
    }
}


