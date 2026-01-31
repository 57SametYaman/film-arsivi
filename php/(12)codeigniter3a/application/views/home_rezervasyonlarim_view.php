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
                    <h5>Rezervasyonlarım</h5>
                </div>
                <div class="col-md-6">
                    TC Kimlik: <?=$tc?>
                </div>
                <? if(!$tc) { ?>
                <div class="col-md-6">
                    <form action="home/rezervasyonlarimPost" method="post">
                        <div class="form-group">
                            <label>TC Kimlik Numaranız:</label>
                            <input type="text" name="tc_kimlik_" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sorgula" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <? } ?>       
            </div>
            
            <div class="row bosluk">
                <? if (count($rezervasyonlar)>0) { ?>
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <th>Rez ID</th>
                            <th>Marka</th>
                            <th>Model</th>
                            <th>Alma Tarihi</th>
                            <th>Teslim Tarihi</th>
                            <th>Tutar (TL)</th>
                        </tr>
                        <? foreach($rezervasyonlar as $r) {?>
                        <tr>
                            <td><?=$r->rezervasyon_id?></td>
                            <td><?=$r->marka?></td>
                            <td><?=$r->model?></td>
                            <td><?=$r->alma_tarihi?></td>
                            <td><?=$r->teslim_tarihi?></td>
                            <td><?=$r->tutar?></td>
                        </tr>
                        <? } ?>
                    </table>
                </div>
                <? } ?>
            </row>
            
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