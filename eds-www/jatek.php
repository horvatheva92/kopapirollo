<?php
	if(isset($_POST['targy'])){
		$szamitogep = rand(1,3);
		$jatekos = $_POST["targy"];
			
		 switch($szamitogep)
		{
			case 1:
				$szamitogep = "Kő";
				break;

			case 2:
				$szamitogep = "Papír";
				break;

			case 3:
				$szamitogep = "Olló";
				break;
		}
			 
		switch($jatekos)
		{
			case 1:
				$jatekos = "Kő";
				break;
				
			case 2:
				$jatekos = "Papír";
				break;
				
			case 3:
				$jatekos = "Olló";
				break;
			
			default:
				die("Helytelen tárgy");
				break;
		}
			 
		echo "<tr>";
		echo "<td>".$jatekos."</td>";
		echo "<td>".$szamitogep."</td>";
		if($szamitogep==$jatekos)
		{
			echo "<td>Döntetlen</td>";
		}else{
				 
			if(($jatekos== "Kő" && $szamitogep== "Olló") OR ($jatekos== "Papír" && $szamitogep== "Kő") OR ($jatekos== "Olló" && $szamitogep== "Papír"))
			{
				 echo "<td>Nyertél</td>";
			} else {
				 echo "<td>Vesztettél</td>";
			}
		}
		echo "</tr>";

	}
?>