<?php
	class Resposta{
		private $id;
		private $prazo;
		private $decisao;
		private $manifestacao;

		public function getId(){
			return $this->id;
		}

		public function getPrazo(){
			return $this->prazo;
		}

		public function getDecisao(){
			return $this->decisao;
		}

		public function getConteudo(){
			return $this->conteudo;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function setPrazo($prazo){
			$this->prazo = $prazo;
		}

		public function setDecisao($decisao){
			$this->decisao = $decisao;
		}

		public function setManifestacao($manifestacao){
			$this->manifestacao = $manifestacao;
		}
	}
?>