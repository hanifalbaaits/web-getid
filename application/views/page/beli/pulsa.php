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
                        <!-- <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Validation - Alternet Style</h4>
                                <div class="nk-block-des">
                                    <p>You can add <code class="code-class">.is-alter</code> with <code
                                            class="code-class">.form-validate</code> class then all the error message
                                        show different style.</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <form class="form-validate is-alter" method="post"
                                    action="<?php echo site_url('beli/trx_pulsa')?>">
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="nomor">Masukan Nomor Tujuan</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="nomor" name="nomor"
                                                        required placeholder="masukan nomor tujuan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="pulsa">Pilih Nominal</label>
                                                <div class="form-control-wrap ">
                                                    <select class="form-control form-select" id="pulsa" name="pulsa"
                                                        data-placeholder="Pilih Pulsa" required>
                                                        <option label="empty" value=""></option>
                                                        <option value="X5">XL 5000</option>
                                                        <option value="X10">XL 10000</option>
                                                        <option value="X20">XL 20000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group float-right">
                                                <button type="submit" class="btn btn-lg btn-primary"
                                                    onclick="act_confirm()">Beli Pulsa</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>