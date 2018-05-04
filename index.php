<?php

include "views/partials/header.php";


if( isset ($_GET["page"])  && !empty($_GET["page"]) ){
    // $view=$_GET['page'].".php";
  switch($_GET["page"]){
    case "son":
      $view = "views/pages/son.php";
      break;
      case 'mesure':
       $view = "views/pages/mesure.php";
       break;
       case 'map':
        $view = "views/pages/map.php";
        break;
     case 'lieux':
        $view = "views/pages/lieux.php";
        break;
      case 'parametres':
        $view = "views/pages/parametres.php";
        break;
      case 'sensibilisation':
        $view = "views/pages/sensibilisation.php";
        break;
      case 'contact':
        $view = "views/pages/contact.php";
        break;
    default:
      $view = "views/pages/mesure.php";  // home page
}

}
else {
  $view="views/pages/mesure.php";
}

include $view;


include "views/partials/footer.php";

?>
