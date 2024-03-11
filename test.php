<?php
function thisIsMyFunction() {
  echo 'Tout va bien';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>
    <?php
      thisIsMyfunction();
      $firstWord = 'Hello';
      $secondWord = 'World !';
      echo $firstWord . ' ' . $secondWord;

      $age = 18;
      if ($age >= 18) {
        echo 'Vous êtes majeur';
      } else {
        echo 'Vous êtes mineur';
      }


      while ($age < 30) {
        $age++;
        echo $age ;
      }

      for ($i = 0; $i < 10; $i++) {
        echo $i;
      }

      $tab =  [12, 5, 8, 9, 13, 76, 87];
      for ($i = 0; $i < count($tab); $i++) {
        echo $tab[$i];
      }


      $isIn = false;
      for ($j = 0; $j < count($tab); $j++) {
        if ($tab[$j] == $_GET['number']) {
          $isIn = true;
        }
      }

      if ($isIn) {
        echo 'Le nombre est présent';
      } else {
        echo 'Le nombre n\'est pas présent';
      }
    ?>
  </h1>

  <h2><?php echo $_GET['number']; ?></h2>
</body>
</html>
