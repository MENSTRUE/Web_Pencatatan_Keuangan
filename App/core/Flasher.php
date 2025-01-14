<?php
class Flasher {
    public static function setFlash($type, $message) {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . '">';
            echo $_SESSION['flash']['message'];
            echo '</div>';
            unset($_SESSION['flash']);
        }
    }
}
