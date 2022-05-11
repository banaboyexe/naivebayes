<?php 
require "function.php";

$label = ['punch', 'kick', 'special'];
$action = ['action1','action2','action3'];

$showAll = query("SELECT * FROM action");

$kasus = [];
if(isset($_POST['submit'])){
    $kasus['action1'] = $_POST['action1'];
    $kasus['action2'] = $_POST['action2'];
    $kasus['action3'] = $_POST['action3'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Naive Bayes</title>
</head>
<body>

    <!-- Input Kasus Baru -->
    <div class="container">
        <h1 class="text-center mt-3">Naive Bayes Classifier</h1><br>
        <h2 class="text-center">Arcade Fighting Game</h2>
        <h6 class="text-center">Created by Bana Khusnan</h6>
        <div class="row mb-5 justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <!-- Input Kasus -->
                        <h5 class="card-title">Input Kasus</h5>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Action 1</label>
                                <select class="form-select" name="action1" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="punch">Punch</option>
                                    <option value="kick">Kick</option>
                                    <option value="special">Special</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Action 2</label>
                                <select class="form-select" name="action2" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="punch">Punch</option>
                                    <option value="kick">Kick</option>
                                    <option value="special">Special</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail2" class="form-label">Action 3</label>
                                <select class="form-select" name="action3" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="punch">Punch</option>
                                    <option value="kick">Kick</option>
                                    <option value="special">Special</option>
                                </select>
                            </div>

                            
                            <div class="d-flex align-items-center mb-3">
                                <button type="submit" name="submit" class="btn btn-primary me-6">Submit</button>
                                <p class="mt-3 me-8">
                                    <small class="text-danger">
                                        Nb : Isikan form diatas terlebih dahulu, jika tidak diisikan tidak ada tabel penghitungan. Tabel penghitungan ada dipaling bawah
                                    </small>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Action Game -->
        <div class="row justify-content-center">
            <div class="col-md-12 my-5">
                <h2>Action Game</h2>
                <table class="table text-center">
                    <tr>
                        <th>Action1</th>
                        <th>Action2</th>
                        <th>Action3</th>
                        <th>Action4</th>
                    </tr>
            
                    <?php foreach($showAll as $val) : ?>
                    <tr>
                        <td><?php echo $val['action1'] ?></td>
                        <td><?php echo $val['action2'] ?></td>
                        <td><?php echo $val['action3'] ?></td>
                        <td><?php echo $val['action4'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

    </div>

    <!-- Probabilitas -->
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-12">
                <!-- Freq Action4 -->
                <h2>Tabel Frekuensi Action4</h2>
                <table class="table text-center">
                    <tr>
                        <th>Action1</th>
                        <th>Banyak Data</th>
                        <th>Total Data</th>
                        <th>Probabilitas</th>
                    </tr>
            
                    <?php
                    $i = 0;
                    foreach(datakelas() as $val) : ?>
                    <tr>
                        <td><?php echo strtoupper($label[$i]) ?></td>
                        <td><?php echo $val; ?></td>
                        <td><?php echo totalData() ?></td>
                        <td><?php echo round(classProb()[$label[$i]],2); ?></td>
                    </tr>
                    <?php 
                    $i++;
                    endforeach;?>
                </table>
            </div>
        </div>

        <?php foreach($action as $act) : ?>
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5">
                <!-- Probabilitas Action1 -->
                <h2>Tabel Probabilitas <?php echo strtoupper($act) ?></h2>
                <table class="table text-center">
                    <tr>
                        <th><?php echo strtoupper($act) ?></th>
                        <th>P</th>
                        <th>K</th>
                        <th>S</th>
                        <th>P(Action|Punch)</th>
                        <th>P(Action|Kick)</th>
                        <th>P(Action|Special)</th>
                    </tr>
                
                    <?php
                    $i = 0;
                    foreach(action($act) as $val) : ?>
                    <tr>
                        <td><?php echo strtoupper($label[$i]) ?></td>
                        <td><?php echo $val['punch']; ?></td>
                        <td><?php echo $val['kick']; ?></td>
                        <td><?php echo $val['special']; ?></td>
                        <td><?php echo $val['ppunch']; ?></td>
                        <td><?php echo $val['pkick']; ?></td>
                        <td><?php echo $val['pspecial']; ?></td>
                    </tr>
                    <?php 
                    $i++;
                    endforeach; ?>
                </table>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Penghitungan Kasus Baru -->
    <?php if (isset($_POST['submit'])) : ?>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                <h2>Penghitungan Kasus Baru</h2>
                <table class="table text-center">
                    <tr>
                        <th rowspan="2">Arcade Fighting Game</th>
                        <th colspan="3">Action 1(<?= strtoupper($kasus['action1']) ?>)</th>
                        <th colspan="3">Action 2(<?= strtoupper($kasus['action2']) ?>)</th>
                        <th colspan="3">Action 3(<?= strtoupper($kasus['action3']) ?>)</th>
                        <th colspan="3">Action 4</th>
                    </tr>
                    <tr>
                        <!-- Action1 -->
                        <?php for($i = 0; $i < 3; $i++) : ?>
                            <th><?php echo $label[$i] ?></th>
                        <?php endfor; ?>

                        <!-- Action2 -->
                        <?php for($i = 0; $i < 3; $i++) : ?>
                            <th><?php echo $label[$i] ?></th>
                        <?php endfor; ?>

                        <!-- Action3 -->
                        <?php for($i = 0; $i < 3; $i++) : ?>
                            <th><?php echo $label[$i] ?></th>
                        <?php endfor; ?>

                        <!-- Action4 -->
                        <?php for($i = 0; $i < 3; $i++) : ?>
                            <th><?php echo $label[$i] ?></th>
                        <?php endfor; ?>
                    </tr>

                    <!-- Isinya -->
                    <tr>
                        <th>Probabilitas</th>
                        <?php foreach(totalAction('action1',$kasus['action1']) as $action) : ?>
                            <td><?php echo $action[0] ?></td>
                            <td><?php echo $action[1] ?></td>
                            <td><?php echo $action[2] ?></td>
                        <?php endforeach; ?>
                        <?php foreach(totalAction('action2',$kasus['action2']) as $action) : ?>
                            <td><?php echo $action[0] ?></td>
                            <td><?php echo $action[1] ?></td>
                            <td><?php echo $action[2] ?></td>
                        <?php endforeach; ?>
                        <?php foreach(totalAction('action3',$kasus['action3']) as $action) : ?>
                            <td><?php echo $action[0] ?></td>
                            <td><?php echo $action[1] ?></td>
                            <td><?php echo $action[2] ?></td>
                        <?php endforeach; ?>
                        <?php for($i = 0; $i < 3; $i++) : ?>
                            <td><?php echo round(classProb()[$label[$i]],2); ?></td>
                        <?php endfor; $hasil = []; ?>
                    </tr>

                    <tr>
                        <th rowspan="3">Action 4</th>
                        <td>Punch</td>
                        <td colspan="12">
                            <?php echo banyakAction('action1', 'punch', $kasus['action1']) ?> * <?php echo banyakAction('action2', 'punch', $kasus['action2']) ?> * <?php echo banyakAction('action3', 'punch', $kasus['action3']) ?> * <?php echo round(dataKelas()['punch']/totalData(),2) ?> = <?php $hasil['punch'] = round(banyakAction('action1', 'punch', $kasus['action1']) * banyakAction('action2', 'punch', $kasus['action2']) * banyakAction('action3', 'punch', $kasus['action3']) * round(dataKelas()['punch']/totalData(),2),2); echo $hasil['punch'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Kick</td>
                        <td colspan="12">
                            <?php echo banyakAction('action1', 'kick', $kasus['action1']) ?> * <?php echo banyakAction('action2', 'kick', $kasus['action2']) ?> * <?php echo banyakAction('action3', 'kick', $kasus['action3']) ?> * <?php echo round(dataKelas()['kick']/totalData(),2) ?> = <?php $hasil['kick'] = round(banyakAction('action1', 'kick', $kasus['action1']) * banyakAction('action2', 'kick', $kasus['action2']) * banyakAction('action3', 'kick', $kasus['action3']) * round(dataKelas()['kick']/totalData(),2),2); echo $hasil['kick'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Spesial</td>
                        <td colspan="12">
                            <?php echo banyakAction('action1', 'special', $kasus['action1']) ?> * <?php echo banyakAction('action2', 'special', $kasus['action2']) ?> * <?php echo banyakAction('action3', 'special', $kasus['action3']) ?> * <?php echo round(dataKelas()['special']/totalData(),2) ?> = <?php $hasil['special'] = round(banyakAction('action1', 'special', $kasus['action1']) * banyakAction('action2', 'special', $kasus['action2']) * banyakAction('action3', 'special', $kasus['action3']) * round(dataKelas()['special']/totalData(),2),2); echo $hasil['special'] ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5">
                <h2>Kesimpulan Penghitungan Kasus Baru</h2>
                <table class="table text-center">
                    <tr>
                        <th>Action 1</th>
                        <th>Action 2</th>
                        <th>Action 3</th>
                        <th>Action 4 Di Rekomendasikan</th>
                    </tr>

                    <tr>
                        <td><?php echo $kasus['action1'] ?></td>
                        <td><?php echo $kasus['action2'] ?></td>
                        <td><?php echo $kasus['action3'] ?></td>
                        <td><?php echo recomended($hasil) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php endif ?>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>