<?php

namespace App\Helpers;

class Functions
{
    public static function getDirFiles($dir) : array {
        $filelist = glob($dir . '/*');
        // Dirctary object
        $files = [];
        foreach ($filelist as $file) {
            if (is_dir("$file")) {
                $files = array_merge( $files , self::getDirFiles("$file") ) ;
            } else {
                $files[] = $file;
            }
        }
        return $files;
    }
}
