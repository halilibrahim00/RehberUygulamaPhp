<?php require_once 'header.php'; ?>
<center><h2>KİŞİLER LİSTESİ</h2></center>
<?php

$rehber = $db->query('SELECT * FROM telrehber')->fetchAll(PDO::FETCH_ASSOC);


?>
<center>

<table border="1" style="widht: 350;height: 200;"  >
    <?php foreach ($rehber as $kişi):  ?>
        
        
        <tr >
            
            <td style="color:darkblue"><?php echo $kişi['ad']." ". $kişi['soyad']  ?></td>
            <td style="color:darkblue"><?php echo $kişi['telefon'] ?></td>
            <td ><a style="color:darkcyan" href="index.php?sayfa=oku&RehberId=<?php echo $kişi['RehberId'] ?>">OKU</a></td>
            <td><a style="color:red" href="index.php?sayfa=guncelle&RehberId=<?php echo $kişi['RehberId'] ?>">GÜNCELLE</a></td>
            <td><a style="color:black" href="index.php?sayfa=sil&ad=<?php echo $kişi['ad'] ?>">SİL</a></td>           
        </tr>
       
     <?php endforeach; ?>  
    
</table>
</center>


