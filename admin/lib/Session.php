<?php
/*
** Sessiion Class
*/
class Session {

  public static function init(){
    session_start();
  }

  public static function set($key, $value){
    $_SESSION[$key] = $val;
  }

  public static function get($key){
        return $_SESSION[$key];
  }

  public static function checkSession(){ // check if isset session to destroy
     self::init();
     if(self::get("login") !== false){
        self::destroy();
        header("Location: login.php");
     }
  }

  public static function destroy(){
    session_destroy();
    header("Location: login.php");
  }

}
