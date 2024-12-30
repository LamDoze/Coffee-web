<?php
/**
 * Session Class
 */
class Session {
    // Initialize the session
    public static function init() {
        if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    // Set a session variable
    public static function set($key, $val) {
        $_SESSION[$key] = $val;
    }

    // Get a session variable
    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    // Check if session is set and user is logged in
    public static function checkSession() {
        self::init();
        if (self::get("login") == false) {
            self::destroy();
            header("Location: login.php");
            exit();
        }
    }

    // Check login status to redirect if logged in
    public static function checkLogin() {
        self::init();
        if (self::get("login") == true) {
            header("Location: index.php");
            exit();
        }
    }

    // Destroy the session
    public static function destroy() {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>
