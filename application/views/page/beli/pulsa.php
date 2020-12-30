<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><a class="back-to" href="<?php echo site_url("home"); ?>"><em
                                        class="icon ni ni-arrow-left"></em><span>Beranda</span></a></div>
                            <h2 class="nk-block-title fw-normal">Beli Pulsa</h2>
                        </div>
                    </div>
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form class="nk-wizard nk-wizard-simple is-alter" method="post"
                                        action="<?php echo site_url('beli/trx_pulsa')?>">
                                        <div class="nk-wizard-head">
                                            <h5>Pulsa</h5>
                                        </div>
                                        <div class="nk-wizard-content">
                                            <div class="row gy-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nomor">Masukan Nomor
                                                            Tujuan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" data-msg="Required"
                                                                class="form-control required" id="nomor" name="nomor"
                                                                required placeholder="masukan nomor tujuan">
                                                        </div>
                                                        <div class="form-note">Masukan Nomor tujuan. ex: 0877xxxxxxxx
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="pulsa">Pilih Pulsa</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control required"
                                                                    data-msg="Required" id="pulsa" name="pulsa" required
                                                                    data-placeholder="Pilih Pulsa">
                                                                    <?php foreach ($product as $key => $pro) :
                                                                     if (strpos($pro->productname, "DATA") !== false) { continue;
                                                                        } else { 
                                                                        if ($pro->status != "ACTIVE") { continue; }
                                                                        $des = $pro->productname." PULSA ".$pro->amount; }
                                                                    ?>
                                                                    <option value="<?php echo $pro->barcode;?>">
                                                                        <?php echo $des;?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-note">Pilih Pulsa yang di inginkan</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-wizard-head">
                                            <h5>Konfirmasi Pembayaran</h5>
                                        </div>
                                        <div class="nk-wizard-content">
                                            <div class="row gy-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fw-metode">Kata Sandi</label>
                                                        <div class="form-control-wrap ">
                                                            <input type="password" data-msg="Required"
                                                                class="form-control required" id="sandi" name="sandi"
                                                                required placeholder="masukan kata sandi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="btn-execute-trx" style="display:none" type="submit"
                                            class="btn btn-sm btn-primary" onclick="return act_confirm()"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>