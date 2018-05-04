<?php





class img
{

 public $urls;

public function __construct()
{
		$this->urls="https://en.wikipedia.org/w/api.php?action=query&titles=".IMAGENS."&prop=revisions&rvprop=content&rvsection=0";
}


	public function imagen()
	{
			$val=$this->urls;
			return $val;
	}

/*	public function json()
	{
		$data =json_decode( file_get_contents($this->urls), true );
		$val=(!empty($data))? 1:0;

			if($val==1):
				for($i=0;$i<count($data);$i++):
					$pais[$i]=$data[$i];
				endfor;
				return $pais;
		
			else:
				echo "<script>alert('Se encuontro problemas error en el servicio');</script>";
			endif;
		
	}





	public function val_enlase()
	{
		if($this->pais()==1){
					return $this->json();

		}else{
			echo "<script>alert('Se encuontro problemas en la ubicacion de los paises');</script>";
		}
	}
*/

}





?>