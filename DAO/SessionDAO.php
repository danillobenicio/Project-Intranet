<?php

class SessionDAO {

    private static function IniciarSessao() {

        //Verifica se NAO existe sessão (se ela está desligada).
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function CriarSessao($id_user, $name_user, $email_user) {
        self::IniciarSessao();
        $_SESSION['login_usuario'] = $id_user;
        $_SESSION['name_usuario'] = $name_user;
        $_SESSION['email_usuario'] = $email_user;
    }

    public static function CodigoLogado() {
        self::IniciarSessao();
        return $_SESSION['login_usuario'];
    }

    public static function EmailLogado() {
        self::IniciarSessao();
        return $_SESSION['email_usuario'];
    }
    
    public static function DeslogarSessao() {
        self::IniciarSessao();
        //Matar a SESSAO LOGADA;
        unset($_SESSION['login_usuario']);
        unset($_SESSION['name_usuario']);
        
        header('location: Login.php');
    }
    
    public static function VerificarLogado() {
        self::IniciarSessao();
        if(!isset($_SESSION['login_usuario'])){
            header('location: Login.php');
        }
    }

}