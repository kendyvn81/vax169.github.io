<?php
require_once '../_config.php';
if ($duysexy == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
    die();
}
$title = 'Bảng Gía Dịch Vụ';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>
	<div class="col-12">
							<div class="card">
								<div class="card-header">
							<div class="card-actions float-end">
								<div class="dropdown show">


									
								</div>
							</div>
							<h5 class="card-title mb-0">Bảng Giá Dịch Vụ Facebook</h5>
						</div>
								<table class="table">
									<thead>
										<tr>
											<th style="width:40%;">Tên</th>
										
                                            <th style="width:25%">Giá</th>
												<th style="width:17%;">Trạng Thái</th>
										</tr>
									</thead>
									<tbody>
											<tr class="table-secondary ">
											<td>Tăng Follow SV1 (Sale)</td>
											<td>8đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
											<tr class="table-warning">
											<td>Tăng Follow SV2 (Sale)</td>
											<td>17đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
											<tr class="table-success">
											<td>Tăng Follow SV3 (Sale)</td>
											<td>18đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
											<tr class="table-secondary ">
											<td>Tăng Follow SV4 (Sale)</td>
											<td>20đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
											<tr class="table-muted">
											<td>Tăng Follow SV5 (Sale)</td>
											<td>27đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
                                        </tr>
											<tr class="table-muted">
											<td>Tăng Follow SV6 (Sale)</td>
											<td>8đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
										<tr class="table-secondary ">
											<td>Tăng Follow Via</td>
											<td>23đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
											<tr class="table-warning">
											<td>Tăng Follow Clone Nuôi</td>
											<td>27đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
											<tr class="table-info">
											<td>Tăng Follow Via Việt</td>
											<td>35đ/follow</td>
											<td>Đang Hoạt Động</td>
										</tr>
										<tr class="table-muted">
                                            <td>Tăng Like Cho Fanpage</td>
											<td>20đ/like</td>
											<td>Đang Hoạt Động</td>
										</tr>
										
										<tr class="table-warning">
                                            <td>Tăng Like Cho Bài Viết</td>
											<td>6đ/like</td>
											<td>Đang Hoạt Động</td>
										</tr>

										<tr class="table-warning">
                                            <td>Tăng Like Tây Cho Bài Viết</td>
											<td>2đ/like</td>
											<td>Đang Hoạt Động</td>
										</tr>
										
										<tr class="table-success">
                                            <td>Tăng Comment Bài Viết</td>
											<td>42đ/comment</td>
											<td>Đang Hoạt Động</td>
										</tr>
										
										<tr class="table-warning">
                                            <td>Tăng Share Bài Viết</td>
											<td>8đ/share</td>
											<td>Đang Hoạt Động</td>
										</tr>
										
									
											
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					<div class="col-12">
							<div class="card">
								<div class="card-header">
							<div class="card-actions float-end">
								<div class="dropdown show">


									
								</div>
							</div>
							<h5 class="card-title mb-0">Bảng Giá Dịch Vụ TikTok</h5>
						</div>
								<table class="table">
									<thead>
										<tr>
											<th style="width:40%;">Tên</th>
										
                                            <th style="width:25%">Giá</th>
											 <th style="width:17%">Trạng Thái</th>
										</tr>
									</thead>
									<tbody>
									    	<tr class="table-success">
                                            <td>Tăng View TikTok</td>
											<td>1đ/View</td>
												<td>Đang Hoạt Động</td>
										</tr>
										<tr class="table-secondary ">
											<td>Tăng Follow TikTok</td>
											<td>27đ/follow</td>
												<td>Đang Hoạt Động</td>
										</tr>
										<tr class="table-success">
                                            <td>Tăng Tim TikTok</td>
											<td>30đ/Tim</td>
												<td>Đang Hoạt Động</td>
										</tr>
										
									
											
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
        </script>
<?php require_once '../includes/footer.php'; ?>