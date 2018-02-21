<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//

// Test

Route::get('test', function () {

	return view('pages.ticket.createRequest');
});

//////////////////////////////
// Ajax danh sách nhóm
Route::get('/getDataTeam/{id}', 'HomeController@getDataTeam')->name('get-data-team');
// Ajax danh sách nhân viên
Route::get('/getDataUser/{idTeam}', 'HomeController@getDataUser')->name('get-data-user');

//////////////////////////////
// Quản lý đăng nhập
// Authentication Routes...
Route::get('dang-nhap', 'Account\LoginController@showLoginForm')->name('login');
Route::post('dang-nhap', 'Account\LoginController@login');
Route::get('dang-xuat', 'Account\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Account\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Account\RegisterController@register');

/////////////////////////////
// Quên mật khẩu
// Password Reset Routes...
// Route::get('mat-khau/khoi-phuc', 'Account\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('mat-khau/email', 'Account\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('mat-khau/khoi-phuc/{token}', 'Account\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('mat-khau/khoi-phuc', 'Account\ResetPasswordController@reset')->name('password.request');

///////////////////////////////////////////////////////////////////////////////////////////////////
Route::group(['middleware' => ['isMember', 'auth']], function () {
	// Trang chủ
	Route::get('/', 'HomeController@homepage')->name('homepage');

	//// Quản lý nhân sự

	Route::group(['prefix' => 'quan-ly-nhan-su', 'middleware' => 'isAdmin'], function () {
		// Danh sách các bộ phận IT trong công ty
		Route::get('/', 'ManagerController@listPartIT')->name('list-part-it');
		// Danh sách các nhóm trong một bộ phận
		Route::get('/bo-phan/{slugPart}', 'ManagerController@listTeamInPart')->name('list-team-in-part');
		// Danh sách nhân viên trong một nhóm
		Route::get('/bo-phan/{slugPart}/nhom/{slugTeam}', 'ManagerController@listUserInTeam')->name('list-user-in-team');
		// Thêm nhân viên
		Route::get('/them-nhan-vien', 'ManagerController@createUser')->name('create-user');
		// Lưu thông tin nhân viên
		Route::post('/quan-ly-nhan-su/them-nhan-vien', 'ManagerController@saveCreateUser')->name('save-create-user');
		// Xóa nhân viên
		Route::get('/xoa-nhan-vien/{idUser}', 'ManagerController@removeUser')->name('remove-user');
		// Chỉnh sửa thông tin nhân viên

		// Lưu thông tin nhân viên

	});
// Comment
	Route::post('comment/{idComment}', 'CommentController@postComment')->name('post-comment');
// Notification
	Route::get('notification/{idNoti}/{status}', 'NotificationController@getNoti')->name('get-noti');
// Công việc

	Route::group(['prefix' => 'cong-viec'], function () {
		// Danh sách công việc

		// Thêm yêu cầu
		Route::get('/them-yeu-cau', 'TicketController@createTicket')->name('create-ticket');
		// Gửi yêu cầu
		Route::post('/them-yeu-cau', 'TicketController@saveCreateTicket')->name('save-create-ticket');
		// Chi tiết công việc
		Route::get('chi-tiet-cong-viec/{idTicket}', 'TicketController@viewTicket')->name('view-ticket');
		// Xóa công việc
		Route::get('/xoa-cong-viec/{id}', 'TicketController@removeTicket')->name('remove-ticket');
		// Sửa công việc
		Route::get('/chinh-sua-cong-viec/{id}', 'TicketController@editTicket')->name('edit-ticket');
		// Cập nhật công việc
		Route::post('/chinh-sua-cong-viec/{id}', 'TicketController@saveEditTicket')->name('save-edit-ticket');

		// Đóng công việc
		Route::get('/cap-nhat-cong-viec/{id}', 'TicketController@updateTicket')->name('update-ticket');
		Route::post('/dong-cong-viec/{id}/{rate}', 'TicketController@closeTicket')->name('close-ticket');
	});

// Công việc liên quan
	Route::group(['prefix' => 'cong-viec-lien-quan'], function () {
		Route::get('/', 'TicketController@relatedRequest')->name('related-request');
		Route::get('/{slugStatus}', 'TicketController@relatedRequestStatus')->name('related-request-status');
	});
// Công việc được giao
	Route::group(['prefix' => 'cong-viec-duoc-giao'], function () {
		Route::get('/', 'TicketController@assignedRequest')->name('assigned-request');
		Route::get('/{slugStatus}', 'TicketController@assignedRequestStatus')->name('assigned-request-status');
	});
// Công việc tôi yêu cầu
	Route::group(['prefix' => 'cong-viec-yeu-cau'], function () {
		Route::get('/', 'TicketController@myRequest')->name('my-request');
		Route::get('/{slugStatus}', 'TicketController@myRequestStatus')->name('my-request-status');
	});
// Công việc nhóm IT
	Route::group(['prefix' => 'cong-viec-nhom-it', 'middleware' => 'isTeamLeader'], function () {
		Route::get('/{slugTeam}', 'TicketController@listTeamTicket')->name('list-team-ticket');
		Route::get('/{slugTeam}/{slugStatus}', 'TicketController@listTeamTicketStatus')->name('list-team-ticket-status');
	});
// Công việc bộ phận IT
	Route::group(['prefix' => 'cong-viec-bo-phan-it', 'middleware' => 'isLeader'], function () {
		Route::get('/{slugPart}', 'TicketController@listPartTicket')->name('list-part-ticket');
		Route::get('/{slugPart}/{slugStatus}', 'TicketController@listPartTicketStatus')->name('list-part-ticket-status');
	});
});
