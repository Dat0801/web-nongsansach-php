<?php
class Session {
    static public function data($key, $value = '') {
        global $config;
        if(!empty($config['session'])) {
            $session_config = $config['session'];
            if(!empty($session_config['session_key'])) {
                $sessionKey = $session_config['session_key'];

            } else {
                self::showErrors('Thiếu cấu hình session_key. Vui lòng kiểm tra file: configs/session.php');
            }
        } else {
            self::showErrors('Thiếu cấu hình session. Vui lòng kiểm tra file: configs/session.php');
        }
    }

    static public function showErrors($message) {
        $data = [
            'message' => $message
        ];
        App::$app->loadError('exception', $data);
        die();
    }
}