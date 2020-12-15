<?php
include("library/MyImage.php");
$files = null;
$image = new MyImage();
$image->searchDir($image->filePath,$files);
$dir = $image->getDir($image->filePath);
// echo COUNT($files,true).'<br>';
// echo count($image->dir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>瀑布流布局waterfall</title>
  <link rel="stylesheet" href="style.css?20201212">
  <script src="jquery-3.1.1.min.js"></script>
  <script src="script.js"></script>
</head>
<body>
  <div id="main">
	<?php
	$image = [];
	foreach($files as $key=>$file){
		list($width,$height,$type,$attr) = getimagesize($file);
		if($width>=MyImage::$fileWidth){
			$image[] = $file;
		}
	}  
    $i = 0;
    foreach($image as $key=>$file){
        if(MyImage::$imageNum!=0 && $i >= MyImage::$imageNum){
        break;
        }
        $i++;
		echo '<div class="box">
		<span>'.$file.'</span>
		<div class="pic">
		  <img src="'.$file.'">
		</div>
	  </div>';
    }
    ?>
  </div>
</body>
</html>
