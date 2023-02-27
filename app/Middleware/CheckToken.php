<?php

namespace App\Middleware;

use System\Src\Controller;
use System\Src\Token;
use App\Models\UserModel;

class CheckToken extends Controller
{
    public $user = null;
    protected $token;

    public function __construct()
    {
        $token = new Token;
        $getAccessToken = $token->getBearerToken();
        if ($getAccessToken === null) {
            echo json(['error' => true, 'message' => 'Token lỗi']);
            die();
        }

        $user = $token->decode($getAccessToken);
        if (isset($user['error'])) {
            echo json($user); die();
        }

        #Lấy thông tin user mới nhất
        $userModel = new UserModel;
        $user = $userModel->getUser($user['email']);
        if ($user == null) {
            return json(['error' => true, 'message' => 'Tài khoản không tồn tại trong hệ thống']);
        }

        if ($user['is_active'] != 1) {
            return json(['error' => true, 'message' => 'Tài khoản đã bị khóa']);
        }

        if ($user['level'] != 1) {
            return json(['error' => true, 'message' => 'Bạn không có quyền truy cập']);
        }

        $this->user = $user;
    }
}