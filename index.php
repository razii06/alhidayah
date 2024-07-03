<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="height: 3000px">
    <!--header-->
    <?php include("header.php"); ?>
    <!--end header-->
    <div clas="container-lg">
        <div class="row">
            <!--sidebar-->
            <?php include("sidebar.php"); ?>
            <!--end sidebar-->

            <!--content-->
            <?php if (isset($_GET['x']) && $_GET['x']=='biodata') {include('biodata.php');
            }else if (isset($_GET['x']) && $_GET['x']=='nilaiakademik') {include('nilai_akademik.php');
            }else if (isset($_GET['x']) && $_GET['x']=='jadwalakademik') {include('jadwal_akademik.php');
            }else if (isset($_GET['x']) && $_GET['x']=='daftarkelas') {include('daftar_kelas.php');
            }
            ?>
            <!--end content-->
        </div>
        <div class="fixed-bottom text-center mb-2 bg-success mb-2 text-light">
            Al-Hidayah 2024
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>