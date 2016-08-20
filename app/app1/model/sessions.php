<?php

/*
  this calss used for handling sessions

 */

define(session_save_path, dirname(realpath(__FILE__) . DIRECTORY_SEPARATOR . 'sessions'));

class sessions extends SessionHandler {

    private $sessionName = 'mySession';
    private $sessionMaxTimeLife = 0;
    private $sessionPath = '/';
    private $sessionHttpOnly = true;
    private $sessionDomain = '.phpdev.com';
    private $sessionSsl = false;
    private $sessionSvaePath = session_save_path;
    private $sessionCipherAlog = MCRYPT_BLOWFISH;
    private $sessionCipherMode = MCRYPT_MODE_ECB;
    private $sessionCipherKey = 'wezmcrypt@y2016h';
    private $ttl = 1;

    function __construct() {
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', 'files');
        session_name($this->sessionName);
        session_save_path($this->sessionSvaePath);
        session_set_cookie_params($this->sessionMaxTimeLife, 
                $this->sessionPath, $this->sessionDomain, 
                $this->sessionSsl, $this->sessionHttpOnly);
        session_set_save_handler($this, TRUE);
    }

    public function __get($key) {
        return false !== $_SESSION[$key] ? $_SESSION[$key] : FALSE;
    }

    public function __set($key, $value) {
        return $_SESSION[$key] = $value;
    }

    public function __isset($key) {
        return isset($_SESSION[$key]) ? TRUE : FALSE;
    }

    public function write($id, $data) {
        parent::write($id, mcrypt_encrypt($this->sessionCipherAlog, $this->sessionCipherKey
                        , $data, $this->sessionCipherMode));
    }

    public function read($id) {
        return mcrypt_decrypt($this->sessionCipherAlog, $this->sessionCipherKey
                , parent::read($id), $this->sessionCipherMode);
    }

    public function start() {
        if ('' === session_id()) {
            session_start();
            $this->sesstionStartTIME();
            $this->checkTimeValid();
        }
    }

    private function sesstionStartTIME() {
        if (!isset($this->sesstion_start_time)) {
            $this->sesstion_start_time = time();
        }
    }

    private function checkTimeValid() {
        if ((time() - $this->session_start) > (1 * 60)) {
            $this->renew_session();
            $this->generatFingerPrint();
        }

        return TRUE;
    }

    private function renew_session() {
        $this->session_start_time = time();
        session_regenerate_id(TRUE);
    }

    public function kill() {
        session_unset();
        setcookie($this->sessionName, '', time() - 1000, $this->sessionPath
                , $this->sessionDomain, $this->sessionSsl, $this->sessionHttpOnly);
        session_destroy();
    }

    private function generatFingerPrint() {
        $userAgentId = $_SERVER['HTTP_USER_AGENT'];
        $sessionId = session_id();
        $this->cipherKey = mcrypt_create_iv(16);
        $this->fingerPrint = md5($userAgentId . $this->cipherKey . $sessionId);
    }

    public function IsValidFingerPrint() {
        if (!isset($this->fingerPrint)) {
            $this->generatFingerPrint();
        }
        $fingerPrint = md5($userAgentId . $this->cipherKey . $sessionId);
        if ($fingerPrint === $this->fingerPrint) {
            return TRUE;
        }
        return FALSE;
    }

}

$session = new sessions();
$session->start();
if (!isset($session->IsValidFingerPrint())) {
    $session->kill();
}




