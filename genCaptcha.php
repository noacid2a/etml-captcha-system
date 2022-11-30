<?php
// Démarrage d'une session pour stocker le resultat de l'utilisateur et le comparer avec le captcha.
session_start();

// String de base pour les caractères du captcha
$captchaCode = '';
// Hauteur de l'image générée du captcha
$captchaHeight = 60;
// Largeur de l'image
$captchaWidth = 250;
// Nombre de caractères sur l'image: recommandé 5-7
$captchaTotalChars = 6;

// Liste des caractères qui peuvent figurer dans le captcha-
//- en essayant d'éviter les caractères trompeurs (l, 1, u et v)
$captchaChars = 'abcdefghijkmnpqrstvwxyz23456789/*-.@%&(';
// Police d'écriture utilisée dans le captcha
$captchaFont = './arialNB.ttf';

// Nombre de points aléatoires sur l'image
$captchaRandomDots = 40;
// Nombre de lignes aléatoires sur l'image
$captchaRandomLines = 25;
// Couleur du texte du captcha (hex > sera converti en rgb)
$captchaTextColor = "0xEA3526";
// Couleur du bruit -- couleur des lignes et des points (hex > sera converti en rgb)
$captchaNoiseColor = "0xEAB226";


$count = 0;
while ($count < $captchaTotalChars) { 
$captchaCode .= substr(
	$captchaChars,
	mt_rand(0, strlen($captchaChars)-1),
	1);
$count++;
}
// Calcul de la taille de la police d'écriture
$captchaFont_size = $captchaHeight * 0.65;
$captchaImage = @imagecreate(
	$captchaWidth,
	$captchaHeight
	);

// Couleurs de l'arrière plan et du bruit
$background_color = imagecolorallocate(
	$captchaImage,
	255,
	255,
	255
	);

$array_text_color = hextorgb($captchaTextColor);
$captchaTextColor = imagecolorallocate(
	$captchaImage,
	$array_text_color['red'],
	$array_text_color['green'],
	$array_text_color['blue']
	);

$array_noise_color = hextorgb($captchaNoiseColor);
$image_noise_color = imagecolorallocate(
	$captchaImage,
	$array_noise_color['red'],
	$array_noise_color['green'],
	$array_noise_color['blue']
	);

// Générer des points aléatoires au fond de l'image
for( $count=0; $count<$captchaRandomDots; $count++ ) {
imagefilledellipse(
	$captchaImage,
	mt_rand(0,$captchaWidth),
	mt_rand(0,$captchaHeight),
	2,
	3,
	$image_noise_color
	);
}

// Générer des lignes aléatoires au fond de l'image
for( $count=0; $count<$captchaRandomLines; $count++ ) {
imageline(
	$captchaImage,
	mt_rand(0,$captchaWidth),
	mt_rand(0,$captchaHeight),
	mt_rand(0,$captchaWidth),
	mt_rand(0,$captchaHeight),
	$image_noise_color
	);
}

// Création de la textbox avec les caractères du captcha -- methode imagettftext
$text_box = imagettfbbox(
	$captchaFont_size,
	0,
	$captchaFont,
	$captchaCode
	); 
$x = ($captchaWidth - $text_box[4])/2;
$y = ($captchaHeight - $text_box[5])/2;
imagettftext(
	$captchaImage,
	$captchaFont_size,
	0,
	$x,
	$y,
	$captchaTextColor,
	$captchaFont,
	$captchaCode
	);

/* Afficher l'image sur le formulaire -- en définissant qu'il s'agit d'une image jpg*/
header('Content-Type: image/jpeg'); 
/* Affichage de l'image avec la méthode imagejpeg */
imagejpeg($captchaImage);
/* Suppression de l'instance de l'image */
imagedestroy($captchaImage);
/* Variable de session avec le captcha qui sera comparée avec celle de l'utilisateur*/
$_SESSION['captcha'] = $captchaCode;

/* Méthode pour convertir le string hexadécimal de la couleur en rgb */
function hextorgb ($hexstring){
  $intHexDec = hexdec($hexstring);
  return array("red" => 0xFF & ($intHexDec >> 0x10),
               "green" => 0xFF & ($intHexDec >> 0x8),
               "blue" => 0xFF & $intHexDec);
			   }
?>