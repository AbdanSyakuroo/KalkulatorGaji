<?php
$ptkp = 0;
$gajibulanan = 0;
$statuskawin = "";
$jmltanggungan = 0;
$gajitahunan = 0;


if (isset($_POST["gajikotor"])) {
    $gajibulanan = $_POST["gajikotor"];
    $statuskawin = $_POST["sk"];
    $jmltanggungan = $_POST["jt"];
    $gajitahunan = $gajibulanan * 12; 
    
    
    

    if ($statuskawin == "tidak" && $jmltanggungan == 0) {
        $ptkp = "54000000";
    }
    elseif ($statuskawin == "tidak" && $jmltanggungan == 1) {
        $ptkp = "58500000";
    }
    elseif ($statuskawin == "tidak" && $jmltanggungan == 2) {
        $ptkp = "63000000";
    }
    elseif ($statuskawin == "tidak" && $jmltanggungan == 3) {
        $ptkp = "67500000";
    }
    elseif ($statuskawin == "kawin" && $jmltanggungan == 0) {
        $ptkp = "58500000";
    }
    elseif ($statuskawin == "kawin" && $jmltanggungan == 1) {
        $ptkp = "63000000";
    }
    elseif ($statuskawin == "kawin" && $jmltanggungan == 2) {
        $ptkp = "67500000";
    }
    elseif ($statuskawin == "kawin" && $jmltanggungan == 3) {
        $ptkp = "72000000";
    }
}

$pkp = $gajitahunan - $ptkp;
$pph = 5/100 * $pkp;
$ppb = $pph / 12;
$bpjsehat = 1/100 * $gajibulanan;
$bpjskerja = 2/100 * $gajibulanan;
$gajibersih = $gajibulanan - ($ppb + $bpjsehat + $bpjskerja);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tugas2</title>
    <!-- css bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
    <h1 class="text-center">Kalkulator Gaji</h1>
    <h5 class="text-center">Kalkulator Gaji membantu kamu menghitung gaji bersih bulanan dengan lebih mudah.</h5>
    <br><br>
    <div class="row">
        <div class="col">
            
        <form action="tugasModal.php" method="POST">
            <label for="">Gaji Kotor Bulanan</label><br>
            <input type="text" placeholder="Rp." name="gajikotor" style="width: 29%" value="<?php if(isset($gajibulanan)){echo $gajibulanan;};?>">
        
            <div class="d-flex">
                <div class="statuskawin">
                    <label for="">Status Perkawinan</label>
                    <select class="form-select" aria-label="Default select example" name="sk">
                        <option selected value="tidak">Tidak Kawin</option>
                        <option value="kawin">Kawin</option>
                    </select>
                </div>
                <div class="jmltanggungan ms-5">
                    <label for="">Jumlah Tanggungan</label>
                    <select class="form-select" aria-label="Default select example" name="jt">
                        <option selected value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">
                kirim data
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" <?php if (empty($_POST["gajikotor"])){echo "disabled";}?>>
                Submit
            </button>
        </form>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="col">
                            <?php echo "Gaji Bulanan : Rp " . number_format($gajibulanan , 2, ",", ".") . "<br>";
                            echo "Gaji Pertahun : Rp " . number_format($gajitahunan , 2, ",", ".") . "<br>";
                            echo "Penghasilan Tidak Kena Pajak (PTKP) : " . $ptkp . "<br>";
                            echo "Penghasilan Kena Pajak (PKP) : " . $pkp . "<br>";
                            echo "<hr>";
                            echo "Pajak Penghasilan Tahunan (PPh 21) : " . $pph . "<br>";
                            echo "Pajak Penghasilan Bulanan : " . $ppb . "<br>";
                            echo "BPJS Kesehatan : " . $bpjsehat . "<br>";
                            echo "BPJS Ketenagakerjaan : " . $bpjskerja . "<br>";
                            echo "<hr>";
                            echo "Gaji bersih bulanan (Take Home Pay) <br>";
                            echo "<h1>" . $gajibersih . "<h1>";
                                ?>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  </body>
</html>