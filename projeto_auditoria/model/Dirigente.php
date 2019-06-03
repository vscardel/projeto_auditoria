<?php
	require_once("Usuario.php");
	require_once("Relatorio.php");
	require_once("Resposta.php");

	class Dirigente extends Usuario{

		private $unidade;

		public function getUnidade(){
			return $this->unidade;
		}

		public function setUnidade($unidade){
			$this->unidade = $unidade;
		}


		public function armazenaResposta($id,$prazo,$decisao,$conteudo,$id_rel){
			$sql_resp = "SELECT id_resposta FROM Resposta WHERE id_resposta = "."'".$id."'";
			$stmt_sql_resp = Datagetter::getConn()->prepare($sql_resp);
			$stmt_sql_resp->execute();
			$id_resp = $stmt_sql_resp->fetch(PDO::FETCH_ASSOC);

			if(!$id_resp){

				$sql_relatorio = "SELECT numero_relatorio,fk_Auditor_fk_Funcionario FROM Relatorio WHERE numero_relatorio = "."'".$id_rel."'";
				$stmt_sql_relatorio = Datagetter::getConn()->prepare($sql_relatorio);
				$stmt_sql_relatorio->execute();
				$id_relatorio = $stmt_sql_relatorio->fetch(PDO::FETCH_ASSOC);

				if($id_relatorio){
					$sql_insere_resposta = "INSERT INTO Resposta VALUES ( "."'".$id."'".','."'".$this->getSiape()."'".","."'".$id_relatorio['fk_Auditor_fk_Funcionario']."'".",".'"'.$prazo.'"'.','."'".$decisao."'".','."'".$conteudo."'".')';
					$stmt_insere_resposta = Datagetter::getConn()->prepare($sql_insere_resposta);
					$stmt_insere_resposta->execute();

					$sql_insere_associa = "INSERT INTO Associa_Rel_Resp_PPP VALUES ( "."'".$id."'".','.'"'.$id_rel.'"'.','."'".NULL."'".')';
					$stmt_insere_associa = Datagetter::getConn()->prepare($sql_insere_associa);
					$stmt_insere_associa->execute();

					return true;
				}
				else{
					return false;
				}
			}
			
		}

		public function recuperaRelatorios(){
			$sql_recupera_relatorios = "SELECT * FROM Relatorio WHERE fk_Dirigente_fk_Funcionario = "."'".$this->getSiape()."'";
			$stmt_recupera_relatorios = Datagetter::getConn()->prepare($sql_recupera_relatorios);
			$stmt_recupera_relatorios->execute();
			$relatorios = $stmt_recupera_relatorios->fetchAll(PDO::FETCH_ASSOC);

			$retorno = array();
			
			if($relatorios){
				foreach ($relatorios as $array) {
					$vetor = array();
					$vetor['num_rel'] = $array["numero_relatorio"];
					$vetor['auditor'] = $array["fk_Auditor_fk_Funcionario"];
					$vetor['dirigente']= $array["fk_Dirigente_fk_Funcionario"];
					$vetor['acao'] = utf8_encode($array["acao"]);
					$vetor['escopo'] = utf8_encode($array["escopo"]);
					$vetor['intro'] = utf8_encode($array["introducao"]);
					$vetor['exames'] = utf8_encode($array["exames"]);
					array_push($retorno, $vetor);
				}
				return $retorno;
			}
			else{
				return false;
			}
		}

		public function recuperaRespostas(){
			$sql_recupera_relatorios_dirigente = "SELECT numero_relatorio FROM Relatorio WHERE fk_Dirigente_fk_Funcionario = "."'".$this->getSiape()."'";
			$stmt_recupera_relatorios_dirigente = DataGetter::getConn()->prepare($sql_recupera_relatorios_dirigente);
			$stmt_recupera_relatorios_dirigente->execute();
			$retorno = $stmt_recupera_relatorios_dirigente->fetchAll(PDO::FETCH_ASSOC);

			$relatorios = array();

			foreach ($retorno as $relatorio) {
				array_push($relatorios,$relatorio['numero_relatorio']);
			}

			$ids_resposta = array();

			foreach ($relatorios as $num_relatorio) {
				$sql_ids_respostas = "SELECT fk_Resposta_id FROM Associa_Rel_Resp_PPP WHERE fk_relatorio_numero = "."'".$num_relatorio."'";
				$stmt_ids_respostas = DataGetter::getConn()->prepare($sql_ids_respostas);
				$stmt_ids_respostas->execute();
				$append = $stmt_ids_respostas->fetchAll(PDO::FETCH_ASSOC);

				if($append){
					foreach ($append as $id_resp) {
						array_push($ids_resposta, $id_resp['fk_Resposta_id']);
					}
				}
			}

			$resposta = array();

			foreach ($ids_resposta as $ids) {

				$sql_final = "SELECT * FROM Resposta WHERE id_resposta = ".$ids;
				$stmt_sql_final = DataGetter::getConn()->prepare($sql_final);
				$stmt_sql_final->execute();
				$bla = $stmt_sql_final->fetch(PDO::FETCH_ASSOC);
				$bla['manifestacao'] =  utf8_encode($bla['manifestacao']);
				array_push($resposta, $bla);
			}

			return $resposta;
		}
	}

?>