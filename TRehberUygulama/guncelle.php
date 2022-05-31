<?php
require_once 'header.php';
if(!isset($_GET['RehberId']) || empty($_GET['RehberId'])){
    header('Location:index.php');
    exit;
}

$sorgu = $db->prepare('SELECT * FROM telrehber WHERE RehberId=?');
$sorgu->execute([
    $_GET['RehberId']
]);
$kişi=$sorgu->fetch(PDO::FETCH_ASSOC);


if(!$kişi){
    header('Location:index.php');
    exit;
}

if(isset($_POST['submit'])){
    $ad = isset($_POST['adı']) ? $_POST['adı'] : $_POST['adı'];
    $soyad = isset($_POST['soyadı']) ? $_POST['soyadı'] :  $_POST['soyadı'];
    $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : $_POST['telefon'];

     if(!$ad){
         echo 'Ad giriniz...';
     }elseif(!$soyad){
         echo 'Soyad Giriniz...';
     }elseif(!$telefon){
        echo 'Telefon Giriniz...';
    }
    else{
        $sorgu =$db->prepare('UPDATE telrehber SET
        ad=?,
        soyad=?,
        telefon=?
        WHERE rehberId = ?');
        $guncelle = $sorgu->execute([
            $ad,$soyad,$telefon,$kişi['RehberId']
        ]);
        if($guncelle){
            header('Location:index.php?sayfa=oku&RehberId='.$kişi['RehberId']);
        }
        else {
            echo 'Güncelleme BAŞARISIZI...';
        }
    }
}



?>
<center>
<form  action="" method="post">
    <fieldset>
    <table border="1">
       <tr>
           <td>AD:</td>
           <td><input type="text" name="adı" value="<?php echo isset($_POST['adı']) ? $_POST['adı'] : $kişi['ad']; ?>" placeholder="Adınız"></td>
       </tr>
       <tr>
           <td>SOYADAD:</td>
           <td><input type="text" name="soyadı" value="<?php echo isset($_POST['soyadı']) ? $_POST['soyadı'] : $kişi['soyad']; ?>" placeholder="Soyadınız"></td>
       </tr>
       <tr>
           <td>TELEFON:</td>
           <td><input type="text" name="telefon" value="<?php echo isset($_POST['telefon']) ? $_POST['telefon'] : $kişi['telefon']; ?>" placeholder="+90(___) (__) (__)(__)"></td>
       </tr>
       <input type="hidden" name="submit" value="1">
       <tr>          
           <td><input type="submit" name="btnkayıt" value="Güncelle"></td>
           <td><input type="reset" value="Sıfırla"></td>
       </tr>
    </table>
    </fieldset>
</form>
</center>