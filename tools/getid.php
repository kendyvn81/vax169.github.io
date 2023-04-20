<?php
require_once '../_config.php';
if ($duysexy == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
    die();
}
$title = 'Lấy ID Facebook';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (isset($_POST["link"])){

$url = "https://id.atpsoftware.vn/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "linkCheckUid=".$_POST["link"];

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

$idfb=explode("<", explode('padding: 10px 100px 0px 100px;text-transform: uppercase;font-size: 16px;font-weight: 700;outline: none;position: relative;transition: all .3s ease-out;z-index: 0;text-align: center;overflow: hidden;">' , $resp)[1])[0];

}

?>

  
<script>
   Swal.fire(
			'Thông Báo',
			'BẠN CÓ THỂ GET UID Ở ĐÂY ĐỂ MUA DỊCH VỤ FACEBOOK',
			'info'
	);
</script>
  
            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				

	


                        <div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Lấy ID Facebook</h5>
								</div>
								<div class="card-body">
								    <form action="" method="POST">
									    <input type="text" name="link" class="form-control" placeholder="Link post , Link profile , ..."><br></br>
									    <center><button class="btn btn-primary">Lấy Ngay</button></center>
									</form>
								</div>
							</div>
                        </div>

                        
                        <?php
                        
                        if ($idfb){
                        
                        ?>
                        
                        <div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Get Thành Công</h5>
								</div>
								<div class="card-body">
								    <div class="alert alert-danger alert-dismissible" role="alert">
											
											<div class="alert-message">
												<center><?=$idfb;?></center>
											</div>
										</div>

								</div>
							</div>
                        </div>
                        
                        <?php
                        
                        }else if ($resp){
                        
                        ?>
                        
                        <div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Get Thất Bại</h5>
								</div>
								<div class="card-body">
								    <div class="alert alert-danger alert-dismissible" role="alert">
											
											<div class="alert-message">
												<center>Link Không Hợp Lệ</center>
											</div>
										</div>

								</div>
							</div>
                        </div>
                        
                        <?php
                        }
                        ?>
			

            </script>
<?php require_once '../includes/footer.php'; ?>