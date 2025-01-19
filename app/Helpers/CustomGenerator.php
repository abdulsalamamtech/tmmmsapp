<?php 

namespace App\Helpers;

class CustomGenerator {

    public static function generateUniqueATC() {
        $randomString = random_int(300, 999);
        $randomVal = uniqid('ATC');
        return $$randomVal . $randomString;
    }
    
    public static function generateUniquePFI() {
        $randomString = random_int(300, 999);
        $randomVal = uniqid('PFI');
        return $$randomVal . $randomString;
    }

    public static function generateUniqueName($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString.= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function generateUniquePhoneNumber($length = 10) {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString.= $characters[rand(0, strlen($characters) - 1)];
        }
        return '+234'. $randomString;
    }
    
    public static function generateUniqueEmail($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString.= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString. '@tmmmsapp.com';
    }
    public static function generateUniqueID($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString.= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function generateUniqueNumber($length = 10) {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString.= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function generateUniqueString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function generateUniqueCode($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function generateRandomNumber($length = 10) {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString.= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString.= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}