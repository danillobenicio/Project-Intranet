<?php

   /* require_once 'Conexao.php';
    require_once 'SessionDAO.php';

    class UsuarioDAO extends Conexao {
        
        public function ConsultarReuniao() {

            $conexao = parent::retornaConexao();

            $comando = 'SELECT id, sala, dh_inicio, dh_fim, titulo, descricao, prioridade  FROM tb_eventos_reunioes';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);

            $sql->setFetchMode(PDO::FETCH_ASSOC);
       
            $sql->execute();

            return $sql->fetchAll();

        }

    }*/
?>