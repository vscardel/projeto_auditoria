<?php
	require_once("Usuario.php");
	require_once("Relatorio.php");
	require_once("Resposta.php");

	class Auditor Extends Usuario{
		
		public function armazenaRelatorio($num,$s_auditor,$s_dirigente,$acao,$data,$escopo,$intr,$exame){
				$sql_recupera_relatorio = "SELECT numero_relatorio FROM Relatorio WHERE numero_relatorio = "."'".$num."'";
				$stmt_recupera_relatorio = DataGetter::getConn()->prepare($sql_recupera_relatorio);
				$stmt_recupera_relatorio->execute();
				$relatorio = $stmt_recupera_relatorio->fetch(PDO::FETCH_ASSOC);

				if(!$relatorio){
					// checa se os auditores e dirigentes existem

					$sql_recupera_auditor = "SELECT siape FROM Funcionario WHERE siape = "."'".$s_auditor."'";
					$stmt_recupera_auditor = DataGetter::getConn()->prepare($sql_recupera_auditor);
					$stmt_recupera_auditor->execute();
					$auditor = $stmt_recupera_auditor->fetch(PDO::FETCH_ASSOC);

					$sql_recupera_dirigente = "SELECT siape FROM Funcionario WHERE siape = "."'".$s_dirigente."'";
					$stmt_recupera_dirigente = DataGetter::getConn()->prepare($sql_recupera_dirigente);
					$stmt_recupera_dirigente->execute();
					$dirigente = $stmt_recupera_dirigente->fetch(PDO::FETCH_ASSOC);


					if($auditor and $dirigente){


						$data = date("Y/m/d:h:m:s");

						$sql_insere_relatorio = "INSERT INTO Relatorio VALUES ( ".'"'.$num.'"'.','.'"'.$s_auditor.'"'.','.'"'.$s_dirigente.'"'.','.'"'.$acao.'"'.','.'"'.$data.'"'.','.'"'.$escopo.'"'.','.'"'.$intr.'"'.','.'"'.$exame.'"'.')';
						$stmt_insere_relatorio = DataGetter::getConn()->prepare($sql_insere_relatorio);
						$stmt_insere_relatorio->execute();


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

		public function recuperaRelatorios(){
			$sql_recupera_relatorios = "SELECT * FROM Relatorio WHERE fk_Auditor_fk_Funcionario = "."'".$this->getSiape()."'";
			$stmt_recupera_relatorios = DataGetter::GetConn()->prepare($sql_recupera_relatorios);
			$stmt_recupera_relatorios->execute();

			$relatorios = $stmt_recupera_relatorios->fetchAll(PDO::FETCH_ASSOC);

			$retorno = array();
			
			if($relatorios){
				foreach ($relatorios as $array) {
					$ret = array();
					$ret['numero_relatorio'] = $array["numero_relatorio"];
					$ret['dirigente'] = $array["fk_Dirigente_fk_Funcionario"];
					$ret['acao'] = utf8_encode($array["acao"]);
					$ret['data'] = $array["dta"];
					$ret['escopo'] = utf8_encode($array["escopo"]);
					$ret['intr'] = utf8_encode($array["introducao"]);
					$ret['exame'] = utf8_encode($array["exames"]);
					array_push($retorno, $ret);
				}
				return $retorno;
			}
			else{
				return false;
			}
		}

		public function recuperaRespostas(){
			$sql_relatorio = "SELECT fk_siape_dirigente,manifestacao FROM Resposta WHERE fk_siape_auditor = '".$this->getSiape()."'";
			$stmt_relatorio = DataGetter::getConn()->prepare($sql_relatorio);
			$stmt_relatorio->execute();
			$retorno = $stmt_relatorio->fetchAll(PDO::FETCH_ASSOC);
			$resposta = array();
			foreach ($retorno as $value) {
				$sql = "SELECT numero_relatorio FROM Relatorio WHERE fk_Auditor_fk_Funcionario = '".$this->getSiape()."'"."AND fk_Dirigente_fk_Funcionario = '".$value['fk_siape_dirigente']."'";
				$stmt = DataGetter::getConn()->prepare($sql);
				$stmt->execute();
				$relatorio = $stmt->fetch(PDO::FETCH_ASSOC);
				$value['relatorio'] = $relatorio['numero_relatorio'];
				$value['manifestacao'] = utf8_encode($value['manifestacao']);
				array_push($resposta, $value);
			}
			return $resposta;
		}
	}
?>