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
                                    action="<?php echo site_url('beli/trx_paket')?>">
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
                                                            name="fw-nominal" required
                                                            placeholder="Masukan Nominal Deposit yang di inginkan">
                                                    </div>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


                                    <!-- <?php
                        $name = $this->session->userdata('full_name');
                        $str = 'Halo mimin, saya '.$name;
                        ?>
                        <a href="https://api.whatsapp.com/send?phone=+6281196301551&text=<?php echo urlencode($str);?>"
                            target="_blank"> -->

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

<script type="text/javascript">
$(document).ready(function() {
    alert("hai");
});
</script>