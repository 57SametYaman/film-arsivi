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
                <div class="col-md-6">
                    <h3>Araç Resmi Yükleme Formu</h3>
                    <form action="adminVehicle/UploadImagePost" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Aaç Resmini Seçiniz:</label>
                        <input type="file" name="resim" class="form-control">
                        <input type="hidden" name="arac_id_" value="<?=$arac_id?>">
                        <input type="hidden" name="resim_var_mi_" value="<?=$resim_var_mi?>"
                    </div>
                    <div class="form-group text-danger">
                        <input type="submit" value="Yükle" class="btn btn-sm btn-dark">
                        <?=$uyari?>
                    </div>
                    </form>    
                </div>
                <div class="col-md-6">
                    
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