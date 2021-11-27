<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('khachhang.index');
});
Route::get('/information', 'HomeController@information');
Route::get('/index', 'HomeController@index');
Route::get('/dangky', 'HomeController@register');
Route::get('/dangnhap', 'HomeController@login');
Route::post('/login','HomeController@datalogin');
Route::get('/logout', 'HomeController@logout');
Route::post('/dangky-taikhoan', 'HomeController@dangky_taikhoan');

//khachhang...................................................................

Route::get('/them-phong', 'UserController@them_phong');
Route::get('/qly-phong', 'UserController@qly_phong');
Route::get('/header', 'UserController@header_NQN');

//phong
Route::post('/add-phong', 'UserController@add_phong');//them

Route::get('/xoa-phong/{xoa}','UserController@xoa_phong'); //xoa

Route::get('/phong-trong/{trangthai}','UserController@phong_trong');
Route::get('/phong-co-nguoi/{trangthai}','UserController@phong_co_nguoi');

Route::get('/sua-phong/{id}','UserController@sua_phong'); //sua
Route::post('/update-phong/{update}','UserController@update_phong'); 

//Thongtin_User
Route::get('/thongtin-user', 'UserController@thongtin_user');

//Khachtro
Route::get('/them-khach-tro', 'UserController@them_khach_tro');
Route::get('/qly-khach-tro', 'UserController@qly_khach_tro');

Route::post('/add-khach-tro', 'UserController@add_khach_tro');//them

Route::get('/xoa-khach-tro/{xoa}','UserController@xoa_khach_tro'); //xoa

Route::get('/sua-khach-tro/{id}','UserController@sua_khach_tro'); //sua
Route::post('/update-khach-tro/{update}','UserController@update_khach_tro');

//loaiPhong
Route::get('/them-loai-phong', 'UserController@them_loai_phong');
Route::get('/qly-loai-phong', 'UserController@qly_loai_phong');

Route::post('/add-loai-phong', 'UserController@add_loai_phong');//them

Route::get('/xoa-loai-phong/{xoa}','UserController@xoa_loai_phong'); //xoa

Route::get('/sua-loai-phong/{id}','UserController@sua_loai_phong'); //sua
Route::post('/update-loai-phong/{update}','UserController@update_loai_phong');

//thongtincanhan

Route::get('/thongtin-canhan', 'UserController@thongtin_canhan');

//admin..............................................................................
Route::get('/admin','AdminController@admin');
Route::get('/layout','AdminController@Layout_Admin');
Route::post('/login-admin','AdminController@datalogin_admin');

//dangky-hopdong............................................
Route::post('/hop-dong','UserController@hop_dong');

//Quanly-hopdong*************************************************
Route::get('/qly-hop-dong','AdminController@qly_hop_dong');

//Quanly-hopdong*************************************************
Route::get('/qly-tai-khoan','AdminController@qly_tai_khoan');