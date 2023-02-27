<?php

namespace App\Controllers\API\V1\Users;

use App\Models\RefreshToken;
use System\Src\Controller;
use App\Models\UserModel;
use System\Src\Token;

class LoginController extends Controller
{
    protected $userModel;
    protected $token;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->token = new Token();
    }

    public function store()
    {
        if ($this->isMethod('POST') == false) {
            return json(['error' => true, 'message' => 'Phương thức không hổ trợ']);
        }

        if ($this->input('email') == null || $this->input('password') == null) {
            return json(['error' => true, 'message' => 'Email và mật khẩu không được trống']);
        }

        $user = $this->userModel->getUser($this->input('email'));
        if ($user == null) {
            return json(['error' => true, 'message' => 'Địa chỉ Email không tồn tại']);
        }
        
        if (! password_verify($this->input('password'), $user['password'])) {
            return json(['error' => true, 'message' => 'Mật khẩu không đúng']);
        }

        if ($user['is_active'] != 1) {
            return json(['error' => true, 'message' => 'Tài khoản đã bị khóa']);
        }

        if ($user['level'] != 1) {
            return json(['error' => true, 'message' => 'Bạn không có quyền truy cập']);
        }

        #remove Password
        unset($user['password']);

        #Create Refresh Token
        $refresh_token = generateUUID();

        #Save refresh token
        $refreshToken = new RefreshToken;
        $refreshToken->insert([
            'user_id' => $user['id'],
            'refresh_token' => $refresh_token,
            'time_exp' => time() + (86400 * 60)
        ]);

        return json([
            'error' => false,
            'user' => $user,
            'access_token' => $this->token->get($user),
            'refresh_token' => $refresh_token
        ]);
    }


    public function refreshToken()
    {
        if ($this->isMethod('POST') == false) {
            return json(['error' => true, 'message' => 'Phương thức không hổ trợ']);
        }

        $refresh_token = $this->input('refresh_token');
        if ($refresh_token == null) {
            return json(['error' => true, 'message' => 'Refresh token không được trống']);
        }

        $refreshTokenModel = new RefreshToken;
        $user = $refreshTokenModel->getUserByRefreshToken($refresh_token);
        if ($user == null) {
            return json(['error' => true, 'message' => 'Refresh token không chính xác']);
        }

        #Thời hạn sống
        if ($user['time_exp'] < time()) {
            return json(['error' => true, 'message' => 'Refresh token đã hết hạn', 'code' => 401]);
        }

        #remove Password
        unset($user['password']);

        #Create Refresh Token
        $refresh_token = generateUUID();

        #Save refresh token
        $refreshToken = new RefreshToken;
        $refreshToken->insert([
            'user_id' => $user['id'],
            'refresh_token' => $refresh_token,
            'time_exp' => time() + (86400 * 60)
        ]);
        
        return json([
            'error' => false,
            'access_token' => $this->token->get($user),
            'refresh_token' => $refresh_token
        ]);
    }
}