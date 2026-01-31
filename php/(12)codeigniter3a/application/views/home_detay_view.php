<html>
    <head>
        <base href="<?=base_url()?>"/>
        <title>Ana Sayfa</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
        <script src="assets/jquery-3.7.1.min.js"></script>
        <style>
            .bosluk {
                margin-top: 15px;
                margin-bottom: 15px
            }

            #rezervasyonFormu {
                display: none;
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
                            <th width="30%">ARAÇ ID</th>
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
                            <td>
                                <a id="btnRezervasyon" class="btn btn-success btn-sm">Hızlı Rezervasyon</a>
                            </td>
                            <td>
                                <?=$sonuc?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <img src="arac_resimleri/<?=$arac_bilgileri->arac_id?>.jpg" class="img-fluid">
                </div>
            </div>

            <div class="row bosluk">
                <div id="rezervasyonFormu" class="col-md-6">
                    <h5>HIZLI REZERVASYON FORMU</h5>
                    <form action="home/rezervasyonEklePost" method="post">
                        <div class="form-group">
                            <label>ARAÇ ID: <?=$arac_bilgileri->arac_id?></label>
                            <input type="hidden" name="arac_id_" value="<?=$arac_bilgileri->arac_id?>">
                        </div>
                        <div class="form-group">
                            <label>TC KİMLİK:</label>
                            <input type="text" name="tc_kimlik_" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>AD SOYAD</label>
                            <input type="text" name="ad_soyad_" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ALMA TARİHİ</label>
                            <input type="date" name="alma_tarihi_" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>TESLİM TARİHİ</label>
                            <input type="date" name="teslim_tarihi_" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>GÜNLÜK FİYAT (TL)</label>
                            <input type="text" name="gunluk_fiyat_" value="<?=$arac_bilgileri->gunluk_fiyat?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>TUTAR (TL)</label>
                            <input type="text" name="tutar_" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="KİRALA" class="btn btn-primary">
                        </div>
                        
                    </form>
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

<script>
    $(function () {
        $('#btnRezervasyon').click(function() {
            $('#rezervasyonFormu').show(500);
        });

        $("input[name='teslim_tarihi_']").blur(function() {            
            var dt1=new Date($("input[name='alma_tarihi_']").val());
            var dt2=new Date($("input[name='teslim_tarihi_']").val());
            var fark = dt2.getTime()-dt1.getTime();
            var farkGun = Math.ceil(fark/(1000*3600*24));
            var gunlukFiyat=parseFloat($("input[name='gunluk_fiyat_']").val());
            $("input[name='tutar_']").val(parseInt(gunlukFiyat*farkGun)); 
        })
    });
</script>