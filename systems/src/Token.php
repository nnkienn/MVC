<?php

namespace System\Src;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use DomainException;
use InvalidArgumentException;
use UnexpectedValueException;

class Token
{
    protected $key;
    protected $payload;

    public function __construct()
    {
        $this->key = $_ENV['APP_KEY'];
        $this->payload = [
            'iss' => $_ENV['BASE_URL'],
            'aud' => $_ENV['BASE_URL'],
            'iat' => time(),
            'exp' => time() + 3600
        ];
    }

    public function get($data = [])
    {
        return JWT::encode(array_merge($this->payload, $data), $this->key, 'HS256');
    }

    public function decode($jwt = '')
    {
        try {
            $info = JWT::decode($jwt, new Key($this->key, 'HS256'));
            return json_decode(json_encode($info), true);
        } catch (InvalidArgumentException $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        } catch (DomainException $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        } catch (SignatureInvalidException $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        } catch (BeforeValidException $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        } catch (ExpiredException $e) {
            return ['error' => true, 'message' => $e->getMessage(), 'code' => 401];
        } catch (UnexpectedValueException $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }

    private function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }
    /**
     * get access token from header
     * */
    public function getBearerToken() {
        $headers = $this->getAuthorizationHeader();
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }
}