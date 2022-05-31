<?php
 require_once 'header.php'; 
//-----------------------------------







//------------------------------------
if(isset($_POST['submit'])){

    $ad = isset($_POST['adı']) ? $_POST['adı'] : null;
    $soyad = isset($_POST['soyadı']) ? $_POST['soyadı'] : null;
    $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;

     if(!$ad){
         echo 'Ad giriniz...';
     }elseif(!$soyad){
         echo 'Soyad Giriniz...';
     }elseif(!$telefon){
        echo 'Telefon Giriniz...';
    }
     
    else{

        $sorgu = $db->prepare('INSERT INTO telrehber SET 
        ad=?,
        soyad=?,
        telefon=?
        ');
        $ekle = $sorgu->execute([
            $ad,$soyad,$telefon
        ]);

        if($ekle){
            header('Location:index.php');
        }else{
            $hata =$sorgu->errorInfo($hata);
            echo 'mysqg hatası:'. $hata[2];
        }
     }
}
?>

<center>
<form  action="" method="post">
    <fieldset style="">
    <table border="1"  style="widht: 350;height: 200;">
       <tr>
           <td>AD:</td>
           <td><input type="text" name="adı" value="<?php echo isset($_POST['adı']) ? $_POST['adı'] : null; ?>" placeholder="Adınız"></td>
       </tr>
       <tr>
           <td>SOYADAD:</td>
           <td><input type="text" name="soyadı" value="<?php echo isset($_POST['soyadı']) ? $_POST['soyadı'] : null; ?>" placeholder="Soyadınız"></td>
       </tr>
       <tr>
           <td>TELEFON:</td>
           <td><input type="text" name="telefon" value="<?php echo isset($_POST['telefon']) ? $_POST['telefon'] : null; ?>" placeholder="+90(___) (__) (__)(__)"></td>
       </tr>
       <input type="hidden" name="submit" value="1">
       
       <tr>          
           <td style="text-aling:center"><input type="submit" name="btnkayıt" value="Kaydet"></td>
           <td><input type="reset" value="Sıfırla"></td>
       </tr>
     
    </table>
    </fieldset>
</form>
</center>
