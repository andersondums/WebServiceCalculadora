<?php
// auto load compativel com zend framework
spl_autoload_register(function ($className) {
 
      // We assume classes with underscores are Zend Framework pseudo namespaced classes
      if (strpos($className, '_' ) !== FALSE) {
            $className = str_replace('_', '/', $className );
      }
 
      // This line provides real php 5.3 namespace support
      $file = str_replace('\\', '/', $className . '.php');
 
      // search include path for the file.
      $include_dirs = explode(PATH_SEPARATOR, get_include_path());
 
      foreach($include_dirs as $dir) {
        $full_file = $dir . '/'. $file;
 
        if (file_exists($full_file)) {
            require_once $full_file;
            return true;
        }
      }
 
      return false;
});


