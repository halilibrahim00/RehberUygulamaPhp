<?php
require_once 'header.php';
?>
<center>
<table>
    <tr>
        <form action="" method = "POST">
            <h1 style="color:red">KİŞİLERDE ARA</h1>
            <td>SOYAD:</td>
           <td><input type="text" name="soyadı" value="<?php echo isset($_POST['soyadı']) ? $_POST['soyadı'] : null; ?>" placeholder="Soyadınız"></td>
           <td><input type="submit" name="btnara" value="ARA"></td>
           <input type="hidden" name="submit" value="1">
           </form>
    </tr>    
</table>
</center>

<?php



if(!isset($_POST['soyadı'])){
    echo "<center>";
    echo "Herhangi bir veri Girilmedi";
    echo "</center>";
}
else{
    $gelen = $_POST['soyadı'];
    $sorgu =$db->prepare('SELECT * FROM telrehber WHERE soyad LIKE ?');
    $sorgu->execute(array('%'.$gelen.'%'));
    $liste = $sorgu->fetchAll(PDO::FETCH_ASSOC);
    echo "<hr>";
    
    if($sorgu->rowCount()!="0"){
        foreach($liste as $veri){
            echo "<center>";
            echo "AD:<strong>".$veri['ad']."</strong><br>";
           echo "SOYAD:<strong>".$veri['soyad']."</strong><br>";
           echo "TELEFON:<strong>".$veri["telefon"]."</strong><br>";
           echo "<hr>";
           echo "</center>";
        }
    }
    else{
        echo "<center>";
        echo "KİŞİ BULUNAMADI!";
        echo "</center>";
    }    
   
}   

?>

