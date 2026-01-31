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
                        <a href="home" class="btn btn-link text-light">Ana Sayfa</a>                        
                    </div>

                    <div class="col-md-6 text-right">                        
                        <a class="btn btn-link text-light">Rezervasyonlar</a>
                        <a class="btn btn-link text-light">Profil</a>
                        <
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row bosluk">
                <div class="col-md-6">
                    <h3>Araç Bilgileri</h3>
                    <table class="table">
                        <tr>
                            <th>ARAÇ ID</th>
                            <td><?=$arac_bilgileri->arac_id?></td>
                        </tr>
                        <tr>
                            <th>MARKA</th>
                            <td><?=$arac_bilgileri->marka?></td>
                        </tr>
                        <tr>
                            <th>MODEL</th>
                            <td><?=$arac_bilgileri->model?></td>
                        </tr>
                        <tr>
                            <th>MODEL YILI</th>
                            <td><?=$arac_bilgileri->model_yili?></td>
                        </tr>
                        <tr>
                            <th>YAKIT</th>
                            <td><?=$arac_bilgileri->yakit?></td>
                        </tr>
                        <tr>
                            <th>VİTES</th>
                            <td><?=$arac_bilgileri->vites?></td>
                        </tr>
                        <tr>
                            <th>MÜSAİT Mİ</th>
                            <td><?=$arac_bilgileri->musait_mi?></td>
                        </tr>
                        <tr>
                            <th>GÜNLÜK FİYAT</th>
                            <td><?=$arac_bilgileri->gunluk_fiyat?> TL</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a class="btn btn-success btn-sm">Hızlı Rezervasyon</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <img src="arac_resimleri/<?=$arac_bilgileri->arac_id?>.jpg" class="img-fluid">
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