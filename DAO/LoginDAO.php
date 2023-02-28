<?php

    require_once 'Conexao.php';

    require_once 'SessionDAO.php';

    class LoginDAO extends Conexao {
    
        public function ValidarLogin($login_usuario, $senha_usuario) {
            
            if(trim($login_usuario) == '' || trim($senha_usuario) == ''){
                return 0;
            }
            
            $conexao = parent::retornaConexao();
            
            $comando = 'SELECT login, name, email FROM sec_users WHERE login = ? and pswd = ?';
            
            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);
            
            $sql->bindValue(1, $login_usuario);
            $sql->bindValue(2, $senha_usuario);
            
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            $sql->execute();
            
            $user = $sql->fetchAll();
            
            //Verificação se houve registro no BD;
            if(count($user) == 0) {
                return -3;
            } else {
                $id_user = $user[0]['login'];
                $name_user = $user[0]['name'];
                $email_user = $user[0]['email'];
                SessionDAO::CriarSessao($id_user, $name_user, $email_user);
                header('location: index.php');
            }
                   
        }

        
        public function ConsultarReunioes() {

            $conexao = parent::retornaConexao();

            $comando = 'SELECT id, sala, dh_inicio, dh_fim, titulo, descricao, prioridade, status  FROM tb_eventos_reunioes WHERE email = ?';
           
            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, SessionDAO::EmailLogado());

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            $sql->execute();
            
            return $sql->fetchAll();

        }
        
    }

?>