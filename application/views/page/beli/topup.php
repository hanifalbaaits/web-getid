<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><a class="back-to" href="<?php echo site_url("home"); ?>"><em
                                        class="icon ni ni-arrow-left"></em><span>Beranda</span></a></div>
                            <h2 class="nk-block-title fw-normal">Top Up Deposit</h2>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <form class="nk-wizard nk-wizard-simple is-alter" method="post"
                                    action="<?php echo site_url('beli/trx_topup')?>">
                                    <div class="nk-wizard-head">
                                        <h5>Nominal</h5>
                                    </div>
                                    <div class="nk-wizard-content">
                                        <div class="row gy-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-nominal">Nominal
                                                        Deposit</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" data-msg="Required"
                                                            class="form-control required" id="fw-nominal"
                                                            name="fw-nominal" required min="50000"
                                                            placeholder="Masukan Nominal Deposit yang di inginkan">
                                                    </div>
                                                    <div class="form-note">Nominal terkecil 50.000</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-wizard-head">
                                        <h5>Metode Pembayaran</h5>
                                    </div>
                                    <div class="nk-wizard-content">
                                        <div class="row gy-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-metode">Transfer Bank</label>
                                                    <div class="form-control-wrap ">
                                                        <div class="form-control-select">
                                                            <select class="form-control required" data-msg="Required"
                                                                id="fw-metode" name="fw-metode" required>
                                                                <option value="us">BCA (Bank Central Asia)</option>
                                                            </select>
                                                            <div class="form-note">Pilih Bank yang digunakan untuk
                                                                pembayaran</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="btn-execute-trx" style="display:none" type="submit"
                                        class="btn btn-sm btn-primary" onclick="return act_confirm()"></button>
                                    <!-- <div class="nk-wizard-head">
                                        <h5>Cara Pembayaran</h5>
                                    </div>
                                    <div class="nk-wizard-content">
                                        <div class="row gy-2">
                                            <div class="col-sm-6">
                                                <div class="card text-white bg-primary">
                                                    <div class="card-header">Header</div>
                                                    <div class="card-inner">
                                                        <h5 class="card-title">Primary card title</h5>
                                                        <p class="card-text">Some quick example text to build on the
                                                            card title and make up the bulk of the card's content.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<div class="modal" tabindex="-1" id="topUP">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pembayaran Top Up Saldo</h5>
            </div>
            <div class="modal-body">
                <div class="nk-iv-wg4">
                    <div class="nk-iv-wg4-sub">
                        <ul class="nk-iv-wg4-list">
                            <li>
                                <div class="sub-text">
                                    <h6 class="nk-iv-wg4-title title">Total Pembayaran</h6>
                                </div>
                                <div class="lead-text">
                                    <h6 class="nk-iv-wg4-title title">
                                        <?php echo "Rp ".number_format($nominal_topup, 0, ',', '.'); ?></h6>
                                    <input hidden id="nominal_topup" value="<?php echo $nominal_topup; ?>" />
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-iv-wg4-sub">
                        <h6 class="nk-iv-wg4-title">Silahkan melakukan pembayaran ke nomor rekening berikut:
                        </h6>
                        <ul class="nk-iv-wg4-overview g-2">
                            <li>
                                <div class="sub-text">Nama Bank</div>
                                <div class="lead-text">BCA (Bank Central Asia)</div>
                            </li>
                            <li>
                                <div class="sub-text">No Rekening</div>
                                <div class="lead-text">5035272639</div>
                            </li>
                            <li>
                                <div class="sub-text">Atas nama</div>
                                <div class="lead-text">PT. Teknologi Selular Pratama</div>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-iv-wg4-sub">
                        <h6 class="nk-iv-wg4-title">Pastikan Jumlah 3 digit terakhir benar.</h6>
                        <h6 class="nk-iv-wg4-title">Setelah melakukan pembayaran harap konfirmasi ke :</h6>
                        <?php
                        $name = $this->session->userdata('storename');
                        $id = $this->session->userdata('storeid');
                        $str = 'Halo, saya '.$name.' dengan username '.$id;
                        ?>
                        <a href="https://api.whatsapp.com/send?phone=+6287814001118&text=<?php echo urlencode($str);?>"
                            target="_blank">
                            <button id="add" class="btn btn-outline btn-primary" onClick="add_logbook()" type="button"
                                data-target="#createlogbook" data-toggle="modal">
                                <img src="https://web.whatsapp.com/img/favicon/1x/favicon.png">&nbspHubungi Admin
                            </button>
                        </a>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="modal-footer bg-light">
                <input hidden id="time_topup" value="<?php echo $time_topup;?>" />
                <input hidden id="user_topup" value="<?php echo $this->session->userdata('storeid');?>" />
                <span class="sub-text" style="float-left">Konfirmasi Pembayaran akan sampai
                    <?php echo $time_topup;?></span>
                <div class="form-group">
                    <a href="<?php echo site_url("home"); ?>" onClick="save_session()"><button
                            class="btn btn-sm btn-primary">Oke</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($flag == true) { ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#topUP').modal({
        backdrop: 'static',
        keyboard: false
    })
    $('#topUP').modal('show');
});
</script>
<?php } else { ?>
<script type="text/javascript">
$(document).ready(function() {
    localStorage.setItem('user_topup', null);
    localStorage.setItem('nominal_topup', null);
    localStorage.setItem('time_topup', null);
});
</script>
<?php } ?>


<script type="text/javascript">
function save_session() {
    let nominal_topup = $('#nominal_topup').val();
    let user_topup = $('#user_topup').val();
    let time_topup = $('#time_topup').val();
    localStorage.setItem('nominal_topup', nominal_topup);
    localStorage.setItem('time_topup', time_topup);
    localStorage.setItem('user_topup', user_topup);
}
</script>