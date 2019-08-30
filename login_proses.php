<?php
session_start();
include 'inc/koneksi.php';

// query mengambil account dari form login //

$username = $_POST['username'];
$password = $_POST['password'];
if ($username == "" or $password == "") {

    echo "<script>alert('username dan atau password tidak boleh kosong')</script>";
    echo"<meta http-equiv=refresh content=0;url=login.php>";

} else{

    // query memanggil account dari database //

    $query = mysql_query("SELECT * FROM account WHERE username = '".$username."' AND password = '".md5($password)."'");
    $rows  = mysql_num_rows($query);
    if ($rows == 0) {

        echo "<script>alert('username dan atau password salah')</script>";
        echo"<meta http-equiv=refresh content=0;url=login.php>";

    } else {


    //  Penempatan account sesuai divisi //

        $rows1 = mysql_fetch_array($query);
        
        $_SESSION['account_myers_briggs']['id']         = $rows1['id_account'];
        $_SESSION['account_myers_briggs']['username']   = $rows1['username'];
        $_SESSION['account_myers_briggs']['divisi']     = $rows1['divisi'];

        if ($rows1['divisi'] == 'Mahasiswa') {

            echo"<meta http-equiv=refresh content=0;url=mahasiswa/index.php>";

        } else if ($rows1['divisi'] == 'DPA') {

            echo"<meta http-equiv=refresh content=0;url=dpa/index.php>";

        } else if ($rows1['divisi'] == 'Administrator') {
           
            echo"<meta http-equiv=refresh content=0;url=admin/index.php>";

        

        }

    }
} 
?>