<?php
	
	class Relatorio{
		private $numero;
		private $siape_auditor;
		private $siape_dirigente;
		private $acao;
		private $data;
		private $escopo;
		private $introducao;
		private $exame;

		public function getNumero(){
			return $this->numero;
		}

		public function getSiapeAud(){
			return $this->siape_auditor;
		}

		public function getSiapeDir(){
			return $this->siape_dirigente;
		}

		public function getAcao(){
			return $this->acao;
		}

		public function getData(){
			return $this->data;
		}

		public function getEscopo(){
			return $this->escopo;
		}

		public function getIntroducao(){
			return $this->introducao;
		}

		public function getExame(){
			return $this->exame;
		}

		public function setNumero($numero){
			$this->numero = $numero;
		}

		public function setSiapeAud($siape){
			$this->siape_auditor = $siape;
		}

		public function setSiapeDir($siape){
			$this->siape_dirigente = $siape;
		}

		public function setAcao($acao){
			$this->acao = $acao;
		}

		public function setData($data){
			$this->data = $data;
		}

		public function setEscopo($escopo){
			$this->escopo = $escopo;
		}

		public function setIntroducao($introducao){
			$this->introducao = $introducao;
		}

		public function setExame($exame){
			$this->exame = $exame;
		}
	}

?>