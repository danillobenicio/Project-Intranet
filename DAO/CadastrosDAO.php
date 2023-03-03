<?php

    require_once 'Conexao.php';


    class CadastrosDAO extends Conexao {
    

        #SETORES
        public function CadastrarSetor($nome_setor) {

            if (trim($nome_setor) == '') {
                return 0;
            }
    
            //1o Passo: Criar uma Variável que receberá um Objeto de CONEXAO
            $conexao = parent::retornaConexao();
    
            //2o Passo: Criar uma Variável que deverá conter o Comando SQL - INSERT
            $comando = 'INSERT INTO tipo_setor (descricao) values (?)';
    
            //3o Passo: Criar o Objeto que será configurado para ser executado no Banco de Dados
            $sql = new PDOStatement();
    
            //4o Passo: Fazer com que o SQL receba a Conexão que vai estar preparada para o Comando.
            $sql = $conexao->prepare($comando);
    
            //5o Passo: Ver se existe o "?" no Comando, se tiver fazer o "bindValue".
            $sql->bindValue(1, $nome_setor);
    
            //6o Passo: Precisamos EXECUTAR.
    
            try {
    
                $sql->execute(); //se der tudo certo, "retorna MSG 1"    
                return 1;
            } catch (Exception $ex) { // se por acaso der algum ERRO, "retorna MSG -1"
                return -1;
            }
        }



        public function ConsultarSetores() {

            $conexao = parent::retornaConexao();

            $comando = 'SELECT
                            cod_setor, 
                            descricao
                        FROM 
                            tipo_setor
                        ORDER BY descricao ASC';
           
            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            $sql->execute();
            
            return $sql->fetchAll();

        }

        public function DetalharSetor($id) {
            
            $conexao = parent::retornaConexao();

            $comando = 'SELECT  
                            cod_setor,
                            descricao
                        FROM 
                            tipo_setor
                            where cod_setor = ?';

            $sql = new PDOStatement();
            
            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $id);

            //Configura o ARRAY para somente trazer a coluna e seu valor (eliminando o indice do ARRAY)
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            $sql->execute();

            return $sql->fetchAll();
            
        }

        public function AlterarSetor($nome_setor, $id) {

            if (trim($nome_setor) == '') {
                return 0;
            }
    
            $conexao = parent::retornaConexao();
            
            $comando = 'UPDATE tipo_setor SET descricao = ? WHERE cod_setor = ?';
    
            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);
    
            $sql->bindValue(1, $nome_setor);
            $sql->bindValue(2, $id);
    
            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                return -1;
            }
        }

        public function ExcluirSetor($id){

            $conexao = parent::retornaConexao();

            $comando = 'DELETE FROM tipo_setor WHERE cod_setor = ?';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $id);

            try {
                $sql->execute();
                return 4;
            } catch (Exception $ex) {
                return -2;
            }

        }

        #E-mails Ramais

        public function CadastrarEmailRamal($nome, $email, $sel_setor, $ramal, $sel_telefone) {

            if (trim($nome) == '' || trim($email) == ''  || trim($sel_setor) == ''  || trim($ramal) == '' || trim($sel_telefone) == '') {
                return 0;
            }
    
            //1o Passo: Criar uma Variável que receberá um Objeto de CONEXAO
            $conexao = parent::retornaConexao();
    
            //2o Passo: Criar uma Variável que deverá conter o Comando SQL - INSERT
            $comando = 'INSERT INTO tb_info_pessoa (pertence_pessoa, email, setor, ramal, pertence_telefone) values (?, ?, ?, ?, ?)';
    
            //3o Passo: Criar o Objeto que será configurado para ser executado no Banco de Dados
            $sql = new PDOStatement();
    
            //4o Passo: Fazer com que o SQL receba a Conexão que vai estar preparada para o Comando.
            $sql = $conexao->prepare($comando);
    
            //5o Passo: Ver se existe o "?" no Comando, se tiver fazer o "bindValue".
            $sql->bindValue(1, $nome);
            $sql->bindValue(2, $email);
            $sql->bindValue(3, $sel_setor);
            $sql->bindValue(4, $ramal);
            $sql->bindValue(5, $sel_telefone);
    
            //6o Passo: Precisamos EXECUTAR.
    
            try {
    
                $sql->execute(); //se der tudo certo, "retorna MSG 1"    
                return 1;
            } catch (Exception $ex) { // se por acaso der algum ERRO, "retorna MSG -1"
                return -1;
            }
        }

        public function ConsultarEmailsRamais() {

            $conexao = parent::retornaConexao();

            $comando = 'SELECT 
                            tip.cod_ramal,
                            tip.pertence_pessoa,
                            tip.ramal,
                            tip.email, 
                            tf.descricao as filial,
                            ts.descricao as setor
                        FROM 
                            tb_info_pessoa tip
                        INNER JOIN tipo_setor ts ON ts.cod_setor = tip.setor
                        INNER JOIN tb_telefone tt ON tt.cod_telefone = tip.pertence_telefone
                        INNER JOIN tb_filial tf ON tf.cod_filial = tt.pertence_filial';
           
            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            $sql->execute();
            
            return $sql->fetchAll();

        }

        public function DetalharEmailRamal($id) {
            
            $conexao = parent::retornaConexao();

            $comando = 'SELECT
                        tip.cod_ramal,
                                tip.pertence_pessoa,
                                tip.ramal,
                                tip.email, 
                                tf.descricao as filial,
                                ts.descricao as setor
                            FROM 
                                tb_info_pessoa tip
                            INNER JOIN tipo_setor ts ON ts.cod_setor = tip.setor
                            INNER JOIN tb_telefone tt ON tt.cod_telefone = tip.pertence_telefone
                            INNER JOIN tb_filial tf ON tf.cod_filial = tt.pertence_filial
                            where cod_ramal = ?';

            $sql = new PDOStatement();
            
            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $id);

            //Configura o ARRAY para somente trazer a coluna e seu valor (eliminando o indice do ARRAY)
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            $sql->execute();

            return $sql->fetchAll();
            
        }

        public function ConsultarFiliais() {

            $conexao = parent::retornaConexao();

            $comando = 'SELECT 
                            cod_filial,
                            descricao,
                            cod_filial_atak
                        FROM 
                            tb_filial';
           
            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            $sql->execute();
            
            return $sql->fetchAll();

        }

        public function ConsultarTelefone(){

            $conexao = parent::retornaConexao();

            $comando = 'SELECT
                            t.cod_telefone,
                            f.descricao
                        FROM 
                            tb_telefone t INNER JOIN tb_filial f ON t.pertence_filial = f.cod_filial
                        ORDER BY f.descricao';
            
            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando);

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();

        }



    }

?>