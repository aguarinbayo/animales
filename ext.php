<?php





class ext
{

 public $urls_ex;
 public $url_priva;

public function __construct()
{
		$this->urls_ex="http://apiv3.iucnredlist.org/api/v3/country/getspecies/".CODE."?token=91ce64bae8516aa63a985b446c9d4288ea92ea7f9717a83941c76f3fb6ef3ca9";

}


	public function pais()
	{
			$val=(!empty($this->urls_ex))? 1:0;
			return $val;
	}

	public function id()
	{
			return $this->$url_priva;
	}

	public function json()
	{
		$data =json_decode( file_get_contents($this->urls_ex), true );
		$val=(!empty($data))? 1:0;

			if($val==1):
				
				return $this->urls_ex;
		
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


}





?>