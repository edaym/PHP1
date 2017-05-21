<?php

$fichierSource = $_FILES['uploadfile']['name'];
$largeurDestination = 200;
$hauteurDestination = 150;
$im = ImageCreateTrueColor ($largeurDestination, $hauteurDestination)
or die ("Ошибка при создании изображения");

$source = ImageCreateFromJpeg("$fichierSource");
$largeurSource = imagesx($source);
$hauteurSource = imagesy($source);

$blanc = ImageColorAllocate ($im, 255, 255, 255);
$gris[0] = ImageColorAllocate ($im, 90, 90, 90);
$gris[1] = ImageColorAllocate ($im, 110, 110, 110);
$gris[2] = ImageColorAllocate ($im, 130, 130, 130);
$gris[3] = ImageColorAllocate ($im, 150, 150, 150);


for ($i=0; $i<=7; $i++) {
    ImageFilledRectangle ($im, $i, $i, $largeurDestination-$i, $hauteurDestination-$i, $gris[$i]);
}

ImageCopyResampled($im, $source, 8, 8, 0, 0, $largeurDestination-(2*8), $hauteurDestination-(2*8), $largeurSource, $hauteurSource);
//ImageString($im, 0, 12, $hauteurDestination-18, "$fichierSource - ($largeurSource x $hauteurSource)", $blanc);

$miniature = "img/mini_$fichierSource";
ImageJpeg ($im, $miniature);
echo "Миниатюра успешно создана: $miniature";

?>