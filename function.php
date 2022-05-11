<?php 
require 'koneksi.php';

// Menampilkan semua data
function query($query){
    global $db;

    $rows = [];
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

// Mengambil nilai action
function action($action){
    global $db;

    $query = "SELECT punch,kick,special,ppunch,pkick,pspecial FROM $action";
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

// Menghitung total data
function totalData(){
    global $db;

    $query = mysqli_query($db, "SELECT COUNT(*) FROM action");
    return (int) mysqli_fetch_row($query)[0];
}

// Jumlah data tiap kelas
function dataKelas(){
    global $db;

    $query = "SELECT COUNT(*) FROM action WHERE action4=";
    $jumlahData['punch'] = (int) mysqli_fetch_row(mysqli_query($db, $query."'punch'"))[0];
    $jumlahData['kick'] = (int) mysqli_fetch_row(mysqli_query($db, $query."'kick'"))[0];
    $jumlahData['special'] = (int) mysqli_fetch_row(mysqli_query($db, $query."'special'"))[0];

    return $jumlahData;
}

// Nilai Probabilitas pada kelas
function classProb(){
    global $db;

    $kelas['punch'] = dataKelas()['punch'] / totalData();
    $kelas['kick'] = dataKelas()['kick'] / totalData();
    $kelas['special'] = dataKelas()['special'] / totalData();

    return $kelas;
}

// Mengambil total action yang bernilai sama dengan punch/kick/special
function totalAction($action,$kasus){
    global $db;

    $query = "SELECT ppunch,pkick,pspecial FROM $action WHERE $action = '$kasus'";
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_row($result)){
        $rows[] = $row;
    }

    return $rows;
}

// Mengambil banyak action yang bernilai sama dengan punch/kick/special
function banyakAction($action,$pkasus,$kasus){
    global $db;

    $query = "SELECT p$pkasus FROM $action WHERE $action = '$kasus'";
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_row($result)){
        $rows[] = $row;
    }

    return (float) $rows[0][0];
}

function recomended($hasil){
    $result = '';
    if($hasil['punch'] > $hasil['kick'] or $hasil['punch'] > $hasil['special']){
        $result = 'Punch';
    } else if($hasil['kick'] > $hasil['punch'] or $hasil['kick'] > $hasil['special']){
        $result = 'Kick';
    } else if($hasil['special'] > $hasil['punch'] or $hasil['special'] > $hasil['kick']){
        $result = 'Special';
    }

    return $result;
}
?>