<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><a class="back-to" href="<?php echo site_url("home"); ?>"><em
                                        class="icon ni ni-arrow-left"></em><span>Beranda</span></a></div>
                            <h2 class="nk-block-title fw-normal">Informasi Profil</h2>
                        </div>
                    </div>
                    <div class="card card-bordered">
                        <div class="nk-data data-list">
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Nama Lengkap</span>
                                    <span class="data-value"><?php echo $this->session->userdata('storename'); ?></span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em
                                            class="icon ni ni-forward-ios"></em></span></div>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Email</span>
                                    <span class="data-value"><?php echo $this->session->userdata('storeid'); ?></span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more disable"><em
                                            class="icon ni ni-lock-alt"></em></span></div>
                            </div>
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Nomor Telepon</span>
                                    <span
                                        class="data-value text-soft"><?php echo $this->session->userdata('telephone'); ?></span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em
                                            class="icon ni ni-forward-ios"></em></span></div>
                            </div>
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Alamat</span>
                                    <span class="data-value"><?php echo $this->session->userdata('address'); ?></span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em
                                            class="icon ni ni-forward-ios"></em></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<!-- @@ Profile Edit Modal @e -->
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <form data-parsley-validate class="form-group form-validate is-alter" method="post"
                enctype="multipart/form-data" action="<?php echo site_url(). "/profile/update" ?>">
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Ubah Profil</h5>
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-lg" name="fullname"
                                    value="<?php echo $this->session->userdata('storename'); ?>"
                                    placeholder="masukan nama lengkap" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="phone-no">Nomor Telepon</label>
                                <input type="text" class="form-control form-control-lg" name="phone"
                                    value="<?php echo $this->session->userdata('telephone'); ?>"
                                    placeholder="Masukan nomor telepon" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="birth-day">Alamat</label>
                                <input type="text" class="form-control form-control-lg" name="address"
                                    placeholder="masukan alamat"
                                    value="<?php echo $this->session->userdata('address'); ?>" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return act_confirm()">Ubah
                                Profil</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>