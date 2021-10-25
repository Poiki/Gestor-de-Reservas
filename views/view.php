<?php

class View
{
	public function show($data)
	{
		$viewName = $data[0];
		$folder = $data[1];

		include("views/header.php");
		if ($data) {
			include("views/$folder/$viewName.php");
		} else {
			include("views/$viewName.php");
		}
		include("views/footer.php");
	}
}
