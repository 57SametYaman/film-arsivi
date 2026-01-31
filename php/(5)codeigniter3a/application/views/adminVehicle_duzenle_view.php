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
                    <h3>Araç Ekleme Formu</h3>
                    <form action="adminVehicle/duzenle Post" method="post">
                    <div class="form-group">
                        <label>MARKA:</label>
                        <input type="text" value="<?=$arac->marka?>" name="marka_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>MODEL:</label>
                        <input type="text" value="<?=$arac->model?>" name="model_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>MODEL YILI:</label>
                        <input type="text" value="<?=$arac->model_yili?>" name="model_yili_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>VİTES:</label><br>
                        <input type="radio" name="vites_" value="Manuel" <?=$arac->vites=='Manuel' ? 'checked':'null'?>> Manuel
                        <input type="radio" name="vites_" value="Otomatik" <?=$arac->vites=='Otomatik' ? 'checked':'null'?>> Otomatik
                        <input type="radio" name="vites_" value="Tiptonik" <?=$arac->vites=='Tiptonik' ? 'checked':'null'?>> Yarı Otomatik
                    </div>
                    <div class="form-group">
                        <label>YAKIT:</label>
                        <select name="yakit_" class="form-control">
                            <option value="Benzin" <?=$arac->yakit=='Benzin' ? 'selected':'null'?>>Benzin</option>
                            <option value="Dizel" <?=$arac->yakit=='Dizel' ? 'selected':'null'?>>Dizel</option>
                            <option value="LPG" <?=$arac->yakit=='LPG' ? 'selected':'null'?>>LPG</option>
                            <option value="Elektrik" <?=$arac->yakit=='Elektrik' ? 'selected':'null'?>>Elektrik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>GÜNLÜK FİYAT:</label>
                        <input type="text" value="<?=$arac->gunluk_fiyat?>" name="gunluk_fiyat_" class="form-control">
                    </div>
                    <div class="form-group text-danger">
                        <input type="submit" value="Düzenle" class="btn btn-sm btn-dark">
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