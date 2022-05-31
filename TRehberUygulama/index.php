<?php
require_once('baglan.php');

if(!isset($_GET['sayfa'])){
    $_GET['sayfa']  ='index';
}

Switch ($_GET['sayfa']) {
    case 'index':
        require_once 'anasayfa.php';
    break;

    case 'insert':
       require_once 'ekle.php';
     break;

     case 'oku':
        require_once 'oku.php';
    break;
    
    case'guncelle':
        require_once 'guncelle.php';
        break;
    case 'sil':
        require_once 'sil.php';
        break;
    case 'kontrol':
        require_once 'kontrol.php';
        break;
    
    case 'ara':
        require 'ara.php';
        break;
    case 'clas':
        require_once 'ClasDb.php';
}

?> 