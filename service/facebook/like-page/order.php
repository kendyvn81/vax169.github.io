<?php
include_once "../../../_config.php";
if ($duysexy == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
    die();
}
$result = mysqli_query($conn,"SELECT * FROM table_service WHERE service_slug = 'buff-like-page-facebook'");
$row = mysqli_fetch_assoc($result);
$title = $row['service_title'];
include_once "../../../includes/header.php";
require_once '../../../includes/navbar.php';
?>
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card"></div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-sans-serif"><a href="/"><strong><i class="fas fa-globe"></i>
                                <?=$site_name;?></strong></a>
                    </li>
                    <li class="breadcrumb-item font-sans-serif active" aria-current="page"><i class="fas fa-link"></i>
                        <?=$row['service_title'];?></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row g-0">
    <div class="col-lg-8 pe-lg-2 mb-3">
        <div class="card h-lg-100 overflow-hidden">
            <div class="card-header bg-light">
                <div class="row justify-content-between">
                    <div class="col-md-auto">
                        <h5 class="mb-3 mb-md-0"><?=$row['service_title'];?></h5>
                    </div>
                    <div class="col-md-auto"><a class="btn btn-falcon-primary btn-sm"
                            href="/service/facebook/like-page/list"><span class="fas fa-list fs--2 mr-1"></span> Danh
                            sách
                            đơn</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <p class="mb-0">
                <form action="" id="form_id" class="user" method="POST" accept-charset="utf-8">
                    <div class="mb-3">
                        <label>Nhập ID Fanpage hoặc Link Fanpage:</label>
                        <input type="text" id="buff_fb_id" name="idfb" onpaste="getUID();" class="form-control"
                            placeholder="Nhập link bài viết cần tăng" required="">
                        <label>(*) Nếu nhập <code>Link Fanpage</code> hệ thống sẽ tự động <code>Get ID Fanpage</code>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label>Máy chủ:</label>
                        <div class="form-check">
                            <input class="form-check-input" checked="checked" id="buff_server" type="radio"
                                onchange="bill();" name="server" value="sv1" data-bs-toggle="collapse" />
                            <label class="form-check-label" for="buff_server">Server 1
                                (<b><?=$row['service_price'];?>₫</b>)
                                <?=$row['service_price_info'];?> <b class="text-warning">(Hoạt động)</b></label>

                        </div>

                        <?php if ($row['service_price_server_1'] != 0) { ?>
                        <div class="form-check">
                            <input class="form-check-input" id="buff_server_1" type="radio" onchange="bill();"
                                name="server" value="sv2" data-bs-toggle="collapse" />
                            <label class="form-check-label" for="buff_server_1">Server 2
                                (<b><?=$row['service_price_server_1'];?>₫</b>) <?=$row['service_info_server_1'];?> <b
                                    class="text-warning">(Hoạt động)</b></label>

                        </div>
                        <?php } ?>
                        <?php if ($row['service_price_server_2'] != 0) { ?>
                        <div class="form-check">
                            <input class="form-check-input" id="buff_server_2" type="radio" onchange="bill();"
                                name="server" value="sv3" data-bs-toggle="collapse" />
                            <label class="form-check-label" for="buff_server_2">Server 3
                                (<b><?=$row['service_price_server_2'];?>₫</b>) <?=$row['service_info_server_2'];?> <b
                                    class="text-warning">(Hoạt động)</b></label>

                        </div>
                        <?php } ?>
                        <?php if ($row['service_price_server_3'] != 0) { ?>
                        <div class="form-check">
                            <input class="form-check-input" id="buff_server_3" type="radio" onchange="bill();"
                                name="server" value="sv4" data-bs-toggle="collapse" />
                            <label class="form-check-label" for="buff_server_3">Server 4
                                (<b><?=$row['service_price_server_3'];?>₫</b>) <?=$row['service_info_server_3'];?> <b
                                    class="text-warning">(Hoạt động)</b></label>

                        </div>
                        <?php } ?>
                        <?php if ($row['service_price_server_4'] != 0) { ?>
                        <div class="form-check">
                            <input class="form-check-input" id="buff_server_4" type="radio" onchange="bill();"
                                name="server" value="sv5" data-bs-toggle="collapse" />
                            <label class="form-check-label" for="buff_server_4">Server 5
                                (<b><?=$row['service_price_server_4'];?>₫</b>) <?=$row['service_info_server_4'];?> <b
                                    class="text-warning">(Hoạt động)</b></label>

                        </div>
                        <?php } ?>
                        <div class="alert alert-warning alert-dismissible fade show fs--1" role="alert"> - Tốc độ tăng like page Sv2 và Sv3 trong 1 ngày lên từ 50-300 like! sẽ chạy sau khi mua từ 1-12h sau khi mua.<br> - Tốc độ tăng like page Sv2 và Sv3 trong 1 ngày lên từ 300-5000 like! sẽ chạy sau khi mua từ 1-12h sau khi mua.<br> - Riêng đối vớí Sv2 và Sv3 và Sv4 hỗ trợ bảo hành đối với page có số like ban đầu dưới 10k like (riêng đối với id dưới 10k like page có dấu hiệu tụt like không phải của hệ thống sẽ ko hỗ trợ bảo hành!) <br> - Những máy chủ có bảo hành thì chỉ bảo hành khi tụt trên 70%. <br></div>
                    </div>
                    <div class="mb-3">
                        <label>Số lượng:</label>
                        <input type="number" id="buff_amount" name="amount" onkeyup="bill();" class="form-control mb-3"
                            placeholder="Nhập số lượng cần tăng" value="100" required="">
                        <div class="alert alert-warning alert-dismissible fade show fs--1 text-center" role="alert">
                            Tổng tiền = (Số lượng) x (Giá 1 like) </div>
                    </div>
                    <div class="mb-3">
                        <label>Ghi chú:</label>
                        <textarea type="text" id="buff_note" class="form-control" rows="3"
                            placeholder="Nhập ghi chú nếu cần" required=""></textarea>
                    </div>
                    <div class="alert alert-success" role="alert">
                        <center><strong>Thành Tiền: <span id="total_payment" class="text-danger">0</span> VNĐ</strong>
                        </center>
                    </div>
                    <center>
                        <button type="button" class="btn btn-primary btn-rounded me-1 mb-1" id="submit"
                            onclick="buy_service();"><i class="fa fa-dollar-sign"></i> Thanh Toán</button>
                    </center>
                </form>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 mt-3 mt-lg-0">
            <div class="bg-holder bg-card page_speed_227445930"></div>
            <div class="card-body p-3">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-4xl rounded-circle border page_speed_1005751458"><img
                                class="rounded-circle"
                                src="https://graph.facebook.com/<?php echo isset($user_fb_id) ? $user_fb_id : '4'; ?>/picture?width=500&height=500&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662"
                                width="100%" alt="user"></div>
                    </div>
                    <div class="col pl-0">
                        <h6 class="fs-0 mb-1"><?=$user_username;?></h6>
                        <div class="card bg-soft-success text-primary mb-1"><strong
                                class="p-1 font-sans-serif fs--1 text-center">Hiện có: <strong
                                    class="text-danger"><?=number_format($user_point);?></strong> coin</strong></div>
                        <div class="card bg-soft-info text-primary"><strong
                                class="p-1 font-sans-serif fs--1 text-center">Cấp độ: <?=$user_level_type;?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-0 overflow-hidden">
            <div class="bg-holder bg-card"></div>
            <div class="card-body position-relative">
                <div class="alert alert-info" role="alert">
                    <h5 class="alert-heading font-weight-semi-bold">Thông tin</h5>
                    <?=$row['service_info'];?>
                </div>
                <div class="alert alert-danger" role="alert">
                    <h5 class="alert-heading font-weight-semi-bold">Lưu ý</h5>
                    <?=$row['service_noted'];?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function getUID() {
    setTimeout(() => {
        var idfb = $('[name=idfb]').val();
        if (!isURL(idfb)) {
            $('#followFacebook').prop("disabled", false);
            return;
        }
        $('[name=idfb]').prop("disabled", true).val('Đang xử lý...');
        $.ajax({
            url: WEBSITE_URL + prefix + '/tool/facebook/get-id.php',
            type: 'GET',
            dataType: 'JSON',
            data: {
                url: idfb
            },
            success: (data) => {
                if (data.error) {
                    swal(data.msg, "error");
                    $('[name=idfb]').prop("disabled", false).val(data.msg);
                } else {
                    $('[name=idfb]').prop("disabled", false).val(data.msg);
                }
            }
        })
    }, 500);
};

function buy_service() {
    var buff_fb_id = $('#buff_fb_id').val();
    var buff_server = $('input[name=server]:checked').val();
    var buff_amount = $('#buff_amount').val();
    var buff_note = $('#buff_note').val();
    if (!buff_fb_id) {
        swal('Trường link bài viết không được bỏ trống.', 'error');
        return;
    }
    if (!buff_server) {
        swal('Trường server không được bỏ trống.', 'error');
        return;
    }
    if (!buff_amount) {
        swal('Trường số lượng không được bỏ trống.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'service/facebook/like-page/order.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: '<?=$row['service_slug'];?>',
            buff_fb_id: buff_fb_id,
            buff_server: buff_server,
            buff_amount: buff_amount,
            buff_note: buff_note
        },
        beforeSend: function() {
            wait('#submit', false);
        },
        complete: function() {
            wait('#submit', true, '<i class="fa fa-dollar-sign"></i> Thanh Toán');
        },
        success: (data) => {
            if (data.error) {
                swal(data.msg, "error");
            } else {
                swal(data.msg, "success");
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        }
    })
}
</script>
<script>
function bill() {
    var amount = $('[name=amount]').val();
    var server = $('input[name=server]:checked').val();
    if (server == 'sv1') {
        var price = <?=$row['service_price'];?>;
    } else if (server == 'sv2') {
        var price = <?=$row['service_price_server_1'];?>;
    } else if (server == 'sv3') {
        var price = <?=$row['service_price_server_2'];?>;
    } else if (server == 'sv4') {
        var price = <?=$row['service_price_server_3'];?>;
    } else if (server == 'sv5') {
        var price = <?=$row['service_price_server_4'];?>;
    }
    var price = amount * price;
    var total_payment = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    $('#total_payment').html(formatNumber(total_payment));
}

$(document).ready(function() {
    bill();
});
</script>
<?php require_once '../../../includes/footer.php'; ?>