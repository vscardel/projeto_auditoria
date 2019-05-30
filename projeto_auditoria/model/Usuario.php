<?php
	
	require_once('bancoDeDados.php');

	class Usuario{

		private $siape;
		private $cpf;
		private $nome;
		private $senha;

		public function getSiape(){
			return $this->siape;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSiape($siape){
			$this->siape = $siape;
		}

		public function setCpf($cpf){
			$this->cpf = $cpf;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}

		
		public function efetuaLogin(){
			// 1 eh auditor 2 eh auditor chefe e 3 eh dirigente
			$sql = "SELECT siape,senha FROM Funcionario WHERE siape = " ."'".$this->getSiape()."'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if(!$result){
				return false;
			}
			else if($result['senha']!=$this->getSenha()){
				return false;
			}
			else{
				$sql_consulta_auditor = "SELECT fk_funcionario_SIAPE FROM Auditor WHERE fk_funcionario_SIAPE = "."'".$this->getSiape()."'";
				$stmt_consulta_auditor = DataGetter::getConn()->prepare($sql_consulta_auditor);
				$stmt_consulta_auditor->execute();
				$resultado_auditor = $stmt_consulta_auditor->fetch(PDO::FETCH_ASSOC);

				$sql_consulta_dirigente = "SELECT fk_funcionario_SIAPE FROM Dirigente WHERE fk_funcionario_SIAPE = "."'".$this->getSiape()."'";
				$stmt_consulta_dirigente = DataGetter::getConn()->prepare($sql_consulta_dirigente);
				$stmt_consulta_dirigente->execute();
				$resultado_dirigente = $stmt_consulta_dirigente->fetch(PDO::FETCH_ASSOC);

				if($resultado_auditor){
					return 1;
				}
				else if($resultado_dirigente){
					return 3;
				}
			}
		}

		public function efetuaCadastro($tipo,$unidade){

			$sql_checa_siape = "SELECT siape FROM Funcionario WHERE siape = "."'".$this->getSiape()."'";
			$sql_checa_cpf = "SELECT cpf FROM Funcionario WHERE cpf = "."'".$this->getCpf()."'";
			$stmt_siape = DataGetter::getConn()->prepare($sql_checa_siape);
			$stmt_siape->execute();
			$stmt_cpf = DataGetter::getConn()->prepare($sql_checa_cpf);
			$stmt_cpf->execute();

			if(!$stmt_siape->fetch(PDO::FETCH_ASSOC)){

				if(!$stmt_cpf->fetch(PDO::FETCH_ASSOC)){

					$sql_cadastro = "INSERT INTO Funcionario VALUES (". '"'.$this->getSiape().'"'.','.'"'.$this->getCpf().'"'.','.'"'.$this->getNome().'"'.','.'"'.$this->getSenha().'"'.')';
					$stmt_cadastro = DataGetter::getConn()->prepare($sql_cadastro);
					$stmt_cadastro->execute();

					if($tipo == 1){ //auditor 
						$insere_auditor = "INSERT INTO Auditor VALUES (". '"'.$this->getSiape().'"'.','.'"'."0".'"'.')';
						$stmt_insere_auditor = DataGetter::getConn()->prepare($insere_auditor);
						$stmt_insere_auditor->execute();
					}
					else if($tipo == 2){//auditor chefe
						$insere_auditor_chefe = "INSERT INTO Auditor VALUES (". '"'.$this->getSiape().'"'.','.'"'."1".'"'.')';
						$stmt_insere_auditor_chefe = DataGetter::getConn()->prepare($insere_auditor_chefe);
						$stmt_insere_auditor_chefe->execute();
					}
					else if($tipo == 3){ //dirigente
						$insere_dirigente = "INSERT INTO Dirigente VALUES (". '"'.$this->getSiape().'"'.','.'"'.$unidade.'"'.')';
						$stmt_insere_dirigente = DataGetter::getConn()->prepare($insere_dirigente);
						$stmt_insere_dirigente->execute();
					}

					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}

		public function alteraCadastro($nome,$senha){
			if($nome == '' and $senha == ''){
				return false;
			}
			else{
				$sql_nome = "UPDATE Funcionario SET nome = ".'"'.$nome.'"'. "WHERE siape = ".'"'.$this->getSiape().'"';
				$sql_senha = "UPDATE Funcionario SET senha = ".'"'.$senha.'"'. "WHERE siape = ".'"'.$this->getSiape().'"';
				$stmt_nome = DataGetter::getConn()->prepare($sql_nome);
				$stmt_senha = DataGetter::getConn()->prepare($sql_senha);

				if($nome == ''){
					$stmt_senha->execute();
				}
				else if($senha == ''){
					$stmt_nome->execute();
				}
				else{
					$stmt_nome->execute();
					$stmt_senha->execute();
				}
				return true;
			}
		}


		
		public function deletaUsuario($tipo){
			$sql_checa_siape = "DELETE FROM Funcionario WHERE siape = "."'".$this->getSiape()."'";
			$stmt_checa_siape = DataGetter::getConn()->prepare($sql_checa_siape);
			$stmt_checa_siape->execute();


			if($tipo == 0 or $tipo == 1){ //auditor e auditor chefe
				$sql_delete_auditor = "DELETE FROM Auditor WHERE fk_funcionario_SIAPE = "."'".$this->getSiape()."'";
				$stmt_delete_auditor = DataGetter::getConn()->prepare($sql_delete_auditor);
				$stmt_delete_auditor->execute();

				if($stmt_delete_auditor->rowCount()){
					return true;
				}
			}
			else if($tipo == 2){ // dirigente
				$sql_deleta_dirigente = "DELETE FROM Dirigente WHERE fk_funcionario_SIAPE = "."'".$this->getSiape()."'";
				$stmt_deleta_dirigente = DataGetter::getConn()->prepare($sql_deleta_dirigente);
				$stmt_deleta_dirigente->execute();

			}

		}

		public function RecuperaOrdenado($caractere){
			
			$sql_checa_letra = "SELECT * FROM Funcionario WHERE nome LIKE '$caractere%'";
			$stmt_checa_letra = DataGetter::getConn()->prepare($sql_checa_letra);
			$stmt_checa_letra->execute();
			$lista_nomes = $stmt_checa_letra->fetchAll(PDO::FETCH_ASSOC);

			$retorno = array();

			foreach ($lista_nomes as $funcionario) {
				$obj = new Usuario();
				$obj->setSiape($funcionario['SIAPE']);
				$obj->setCpf($funcionario['cpf']);
				$obj->setNome(utf8_encode($funcionario['nome']));
				$obj->setSenha($funcionario['senha']);
				array_push($retorno, $obj);

			}
			
			return $retorno;
		}

	}

?>