<?php
$statusKawin = "belum";
$jumlahTanggungan = 0;
$gajiBulanan = 0;

ini_set('display_errors', 0);
if (isset($_POST["submit"])) {
    $gajiBulanan = $_POST["GKB"];
    $statusKawin = $_POST["SP"];
    $jumlahTanggungan = $_POST["JT"];


    if ($statusKawin == "belum" && $jumlahTanggungan == 0) {
        $ptkp = 54000000;
    } else if ($statusKawin == "belum" && $jumlahTanggungan == 1) {
        $ptkp = 58500000;
    } else if ($statusKawin == "belum" && $jumlahTanggungan == 2) {
        $ptkp = 63000000;
    } else if ($statusKawin == "belum" && $jumlahTanggungan == 3) {
        $ptkp = 67500000;
    } else if ($statusKawin == "kawin" && $jumlahTanggungan == 0) {
        $ptkp = 58500000;
    } else if ($statusKawin == "kawin" && $jumlahTanggungan == 1) {
        $ptkp = 63000000;
    } else if ($statusKawin == "kawin" && $jumlahTanggungan == 2) {
        $ptkp = 67500000;
    } else if ($statusKawin == "kawin" && $jumlahTanggungan == 3) {
        $ptkp = 72000000;
    };
};



$gajiTahunan = $gajiBulanan * 12;
$PKP = $gajiTahunan - $ptkp;
//-------------------------------------------------------------
$PPH21 = (5 / 100) * $PKP;
$PPB = $PPH21 / 12;
$BPJS = (1 / 100) * $gajiBulanan;
$BPJSK = (2 / 100) * $gajiBulanan;
//--------------------------------------------------------------
$gajiBersih = $gajiBulanan - ($PPB + $BPJS + $BPJSK);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        img{
           width: 400px;
           height: 400px;
           margin-left: 100px;
        }

    </style>
</head>

<body>

    <h2 class="text-center mt-5">Kalkulator Penghitungan Gaji</h2>
    <h6 class="text-center">Kalkulator Gaji membantu kamu menghitung gaji bersih bulanan dengan lebih mudah</h6>
    <div class="container">
        <div class="row mt-5 kai">
        <div class="col-6">
            <form action="kalkugajialert.php" method="POST">
                <h5>Gaji Kotor Bulanan</h5>
                <input type="text" name="GKB" placeholder="Rp." style="width: 500px;">

                <div class="d-flex mt-3">
                    <div class="stkwn">
                        <h5>Status Perkawinan</h5>
                        <select class="form-select" aria-label="Default select example" style="width: 250px;" name="SP">
                            <option selected>Status</option>
                            <option value="kawin">Sudah Kawin</option>
                            <option value="belum">Belum Kawin</option>
                        </select>
                    </div>
                    <div class="jmltgn ms-2">
                        <h5>Jumlah Tanggungan</h5>
                        <select class="form-select" aria-label="Default select example" style="width: 250px;" name="JT">
                            <option selected>Jumlah</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-3" name="submit" value="Kirim" id="liveAlertBtn"></input>
            </form>
        </div>
        <div class="col-6">
                <?php if(isset($_POST["submit"])){
                 echo '<div class="alert alert-success alert-dismissible fade show me-5" role="alert" id="liveAlertPlaceholder">
                Gaji bulanan : Rp. '.round($gajiBulanan).'
                <br>
                Gaji disetahunkan : Rp.  '.round($gajiTahunan).'
                <br>
                Penghasilan Tidak Kena Pajak (PTKP) :  '.round($ptkp).'
                <br>
                Penghasilan Kena Pajak (PKP) :  '.round($PKP).'
                <br>
                <hr>
                Pajak Penghasilan Tahunan :  '.round($PPH21).'
                <br>
                Pajak Penghasilan Bulanan :  '.round($PPB).'
                <br>
                BPJS Kesehatan :  '.round($BPJS).' 
                <br>
                BPJS Ketenagakerjaan :  '.round($BPJSK).'
                <br>
                <hr>
                Gaji Bersih Bulanan : <h3><b> '.round($gajiBersih).' </b></h3>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }else{
                echo '<img src="Calculator-pana.png" alt="">';
            };
           ?>
        </div>
    </div>
    </div>
    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>



</html>