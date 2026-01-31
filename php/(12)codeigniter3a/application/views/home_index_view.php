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

            .kenarlik {
                border  : 1px solid #6c757d;
                padding : 10px;
                margin  : 10px; 
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
                        <a class="btn btn-link text-light">Rezervasyonlar</a>
                        <a class="btn btn-link text-light">Profil</a>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row bosluk">
                <? foreach($araclar as $arac) { ?>
                <div class="col-md-3 kenarlik">                    
                    <img src="arac_resimleri/<?=$arac->arac_id?>.jpg" class="img-fluid rounded">
                    <h6>
                        <?=$arac->marka?> - <?=$arac->model?> (<?=$arac->model_yili?>)
                        <a href="home/detay/<?=$arac->arac_id?>" class="btn btn-sm btn-link float-right">Detay</a>
                    </h6>
                </div>
                <? } ?>                
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