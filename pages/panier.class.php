<?php 
class panier{

	private $DB;

	public function __construct($DB){
		if(!isset($_SESSION)){
			session_start();
		}
		if (!isset($_SESSION['panier'])){
			$_SESSION['panier'] =array();
		}
		$this->DB = $DB;
		if (isset($_GET['delpanier'])) {
			$this->del($_GET['delpanier']);
		}
		

	}

	public function count(){
		return array_sum($_SESSION['panier']);
	}

	public function total(){
		$total = 0;
		$ids =array_keys($_SESSION['panier']);
		 if (empty($ids)) {
             $prestation = array();
        }else{
             $prestation = $this->DB->query('SELECT id, price FROM prestation WHERE id IN ('.implode(',',$ids).')');
        }
		foreach ($prestation as $prest) {
			$total += $prest->price * $_SESSION['panier'][$prest->id];
		}
		return $total;
	}
	public function add($prest_id){
		if (isset($_SESSION['panier'][$prest_id])){
			$_SESSION['panier'][$prest_id]++;
		}else{
			$_SESSION['panier'][$prest_id] = 1;
		}
		}
	public function del($prest_id){
		    unset($_SESSION['panier'][$prest_id]);
	}	
}