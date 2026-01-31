<html>
    <head>
        <base href="<?=base_url()?>"/>
        <title>Ana Sayfa</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
        <style>
            .bosluk {
                margin-top: 15px;
                margin-bottom: 15px
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="text-center">Sakarya Bip Oto</h1>
        </div>
        <div class="container-fluid bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-link text-light">Ana Sayfa</a>
                        <a class="btn btn-link text-light">Şifre Değiştir</a>
                        <a class="btn btn-link text-light">Oturumu Kapat</a>
                    </div>

                    <div class="col-md-6 text-right">                        
                        <a class="btn btn-link text-light" href="adminVehicle">Araçlar</a>
                        <a class="btn btn-link text-light">Rezervasyonlar</a>
                        <a class="btn btn-link text-light">Kullanıcılar</a>
                        <
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row bosluk">
                <div class="col-md-12">
                    <h3>Araç Listesi</h3>
                    <table class="table">
                        <tr>
                            <th>Resim</th>
                            <th>Araç ID</th>
                            <th>Marka</th>
                            <th>Model</th>
                            <th>Model Yılı</th>
                            <th>Müsait Mi</th>
                            <th>Günlük Fiyat</th>
                            <th>
                                <a href="adminVehicle/Ekle" class="btn btn-sm btn-danger">Araç Ekle</a>
                            </th>
                        </tr>
                        <? foreach($araclar as $arac) { ?>
                        <tr>
                            <td>
                                <? if($arac->resim_var_mi=='E') {?>
                                <img src="arac_resimleri/<?=$arac->arac_id?>.jpg" width="120px">
                                <? } ?>
                            </td>
                            <td><?=$arac->arac_id?></td>
                            <td><?=$arac->marka?></td>
                            <td><?=$arac->model?></td>
                            <td><?=$arac->model_yili?></td>
                            <td><?=$arac->musait_mi?></td>
                            <td><?=$arac->gunluk_fiyat?> TL</td>
                            <td>
                                <a href="adminVehicle/detay/<?=$arac->arac_id?>" class="btn btn-sm btn-warning">Detay</a>
                                <a href="adminVehicle/Sil/<?=$arac->arac_id?>" class="btn btn-sm btn-danger" onclick="return confirm('Bu aracı silmek istiyor musunuz?')">Sil</a>
                                <a href="adminVehicle/duzenle/<?=$arac->arac_id?>" class="btn btn-sm btn-primary">Düzenle</a>
                                <a href="adminVehicle/UploadImage/<?=$arac->arac_id?>/<?=$arac->resim_var_mi?>" class="btn btn-sm btn-dark">Resim Yükle</a>
                            </td>
                        </tr>
                        <? } ?>
                    </table>
                </div>
                
            </div>
        </div>

        <div class="container-fluid bg-dark text-light">
            <div class="row">
                <div class="col-md-12 text-center">
                    Bu site Sakarya MYO Bilgisayar Programcılığı
                    Bahar Dönemi İnternet Programcılığı 1 dersi için
                    örnek olarak geliştirilmiştir. <br> Tüm hakları saklıdır (c) 2025
                </div>
            </div>
        </div>
        
    </body>
</html>