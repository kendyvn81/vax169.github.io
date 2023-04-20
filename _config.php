<?php
session_start();
error_reporting(1);
date_default_timezone_set('Asia/Ho_Chi_Minh');
/* connect mysql */
$conn = mysqli_connect('localhost', 'root', '', 'subquare') or die('Không thể kết nối đến cơ sở dữ liệu, vui lòng thử lại.');
mysqli_set_charset($conn, "utf8");
include_once 'Mailer/PHPMailerAutoload.php';

$check_site                = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM table_site WHERE site_id = '1'"));
$site_id                   = $check_site['site_id'];
$site_title                = $check_site['site_title'];
$site_logo                 = $check_site['site_logo'];
$site_name                 = $check_site['site_name'];
$site_keyword              = $check_site['site_keyword'];
$site_domain               = $check_site['site_domain'];
$site_fb_token             = $check_site['site_fb_token'];
$site_facebook             = $check_site['site_facebook'];
$site_zalo                 = $check_site['site_zalo'];
$site_fanpage              = $check_site['site_fanpage'];
$site_mail_username        = $check_site['site_mail_username'];
$site_mail_password        = $check_site['site_mail_password'];
$site_autolike_partner_id  = $check_site['site_autolike_partner_id'];
$site_autolike_partner_key = $check_site['site_autolike_partner_key'];
$site_mmo_partner_id       = $check_site['site_mmo_partner_id'];
$site_mmo_partner_key      = $check_site['site_mmo_partner_key'];
$site_card_partner_id      = $check_site['site_card_partner_id'];
$site_card_partner_key     = $check_site['site_card_partner_key'];
$site_status               = $check_site['site_status'];
$site_time                 = $check_site['site_time'];
$site_automxh              = true;

$duysexy = false;
if (isset($_SESSION['login']) && $_SESSION['login'] == 'ok') {
    $check_user     = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM table_user WHERE user_username = '" . $_SESSION['user_username'] . "'"));
    $user_id        = $check_user['user_id'];
    $user_token     = $check_user['user_token'];
    $user_username  = $check_user['user_username'];
    $user_fullname  = $check_user['user_fullname'];
    $user_fb_id     = $check_user['user_fb_id'];
    $user_phone     = $check_user['user_phone'];
    $user_email     = $check_user['user_email'];
    $user_point     = $check_user['user_point'];
    $user_ip        = $check_user['user_ip'];
    $user_level     = $check_user['user_level'];
    $user_status    = $check_user['user_status'];
    $user_time_last = $check_user['user_time_last'];
    $user_time      = $check_user['user_time'];
    $duysexy        = true;
    if ($user_level == 0) {
        $user_level_type = 'Khách!';
    } else if ($user_level == 1) {
        $user_level_type = 'Thành viên';
    } else if ($user_level == 2) {
        $user_level_type = 'Công tác viên';
    } else if ($user_level == 3) {
        $user_level_type = 'Đại lí';
    } else if ($user_level == 4) {
        $user_level_type = 'Quản trị viên';
    }

    $total_point_used = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(buff_payment) FROM table_buff WHERE buff_username = '$user_username' ")) ['SUM(buff_payment)'];

    $total_service_buy = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(buff_id) FROM table_buff WHERE buff_username = '$user_username' ")) ['SUM(buff_id)'];

    $total_point_recharge = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(banking_amount) FROM table_banking WHERE banking_username = '$user_username' ")) ['SUM(banking_amount)'];
    
}

function curl2AutoMxh($urlCreateService) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlCreateService);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $head[] = "api-token: 847c24cadb2f0d707b0ab70b74915ec2";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
}

function curlAutoMxh($urlCreateService,$dataPostCreate) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlCreateService);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $head[] = "api-token: 847c24cadb2f0d707b0ab70b74915ec2";
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPostCreate);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
}

function generateRandomString($length) {
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>