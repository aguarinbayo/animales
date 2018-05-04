<?php





class wiki
{

 public $urls;

public function __construct()
{
		$this->urls="GET https://api.gettyimages.com/v3/search/images?fields=id,title,thumb,referral_destinations&sort_order=best&phrase=Coracias garrulus"
;
}

#GET https://api.gettyimages.com/v3/search/images?fields=id,title,thumb,referral_destinations&sort_order=best&phrase=".WIKI;
	public function info()
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