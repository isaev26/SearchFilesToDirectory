<?php
//Search to
$dir = '/opt/lampp/htdocs';

function dirToArray($dir) {
  
   $result = array();

   $cdir = scandir($dir);
   foreach ($cdir as $key => $value)
   {
      if (!in_array($value,array(".","..")))
      {
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
         }
         else
         {
            $result[] = $value;
         }
      }
   }
  
   return $result;
}

function imgToArray($arrDir)
{
    foreach($arrDir as $key => $value){
        //Type images
        $imgs = array('.png', '.jpg');
        foreach($imgs as $img){
            if(strpos($value, $img) !== false){
                $arrImgs[] = $value;
            }
        }
    }
    return $arrImgs;
}

$arrDir = dirToArray($dir);
$arrImages = imgToArray($arrDir);

echo '<pre>';
// print_r($arrImages);
echo '</pre>';
?>
