<?php require_once 'header.php'; ?>

<?php

$sorgu = $db->prepare('SELECT * FROM telrehber WHERE RehberId=?');

$sorgu->execute([
    $_GET['RehberId']
]
    
);

$kişi = $sorgu->fetch(PDO::FETCH_ASSOC);

?>
<center>
<h2 style="color:darkblue"><?php echo "ADI:". $kişi['ad'] ; ?></h2>
<h2 style="color:darkblue"><?php echo "SOYAD:". $kişi['soyad'];  ?></h2>

<h3 style="color:darkblue"><?php echo "TELEFON:". $kişi['telefon'] ?></h3>
<h4 style="color:darkblue"><?php echo "KAYIT TARİHİ:". $kişi['kayıtTarih'] ?></h4>
<hr>
</center>






