<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><a class="back-to" href="<?php echo site_url("home"); ?>"><em
                                        class="icon ni ni-arrow-left"></em><span>Beranda</span></a></div>
                            <h2 class="nk-block-title fw-normal">Riwayat Deposito</h2>
                        </div>
                    </div>
                    <div class="example-alert">
                        <div class="alert alert-success alert-icon">
                            <em class="icon ni ni-check-circle"></em> <strong></strong><?php echo $msg; ?>
                        </div>
                    </div>
                    <br />
                    <div class="card card-preview">
                        <div class="card-inner">
                            <h5 class="card-title">Pencarian Deposito</h5>
                            <form data-parsley-validate class="form-group form-validate is-alter" method="get"
                                enctype="multipart/form-data" action="<?php echo site_url(). "/riwayat/deposito" ?>">
                                <div class="row gy-4">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="form-label">Tanggal Mulai</label>
                                            <div class="form-control-wrap">
                                                <input id="tgl_mulai" name="tgl_mulai" type="text"
                                                    class="form-control date-picker" required>
                                            </div>
                                            <div class="form-note">Masukan tanggal mulai pencarian</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="form-label">Tanggal Selesai</label>
                                            <div class="form-control-wrap">
                                                <input id="tgl_akhir" name="tgl_akhir" type="text"
                                                    class="form-control date-picker" required>
                                            </div>
                                            <div class="form-note">Masukan tanggal akhir pencarian</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="form-label">&nbsp</label>
                                            <div class="form-control-wrap">
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    onclick="return act_confirm()">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br />
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Tanggal Deposito</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Username</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Nama</span></th>
                                            <?php if ($flg == false) { ?>
                                            <th class="nk-tb-col"><span class="sub-text">Saldo Deposit</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Saldo Sebelum</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Saldo Sesudah</span></th>
                                            <?php } else { ?>
                                            <th class="nk-tb-col"><span class="sub-text">Tipe TopUp</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Bank</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Nomor Akun</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Atas Nama</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Nominal</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">SN</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Note</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $dt) {
                                        if ($flg ==  false) {
                                            $nm = $dt->Store_x0020_Name;
                                            $date = $dt->DateTime;
                                        } else {
                                            $nm = $dt->name;
                                            $date = $dt->daterequest;
                                        }
                                        ?>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <span
                                                    class="tb-sub"><?php $tgl = date("d M Y H:i:s",strtotime($date)); echo $tgl; ?></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-lead"><?php echo $dt->storeid; ?></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <span class="tb-sub"><?php echo $nm; ?></span>
                                                </div>
                                            </td>

                                            <?php if ($flg ==  false) { ?>
                                            <td class="nk-tb-col">
                                                <span class="tb-sub tb-amount"><span>Rp
                                                    </span><?php echo number_format($dt->Value, 0, ',', '.'); ?></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-sub tb-amount"><span>Rp
                                                    </span><?php echo number_format($dt->Begin_x0020_Stock, 0, ',', '.'); ?></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-sub tb-amount"><span>Rp
                                                    </span><?php echo number_format($dt->End_x0020_Stock, 0, ',', '.'); ?></span>
                                            </td>
                                            <?php } else { ?>
                                            <td class="nk-tb-col">
                                                <span class="tb-lead"><?php echo $dt->topuptype; ?></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <span class="tb-sub"><?php echo $dt->institutionname; ?></span>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <span class="tb-sub"><?php echo $dt->accountnumber; ?></span>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-lead"><?php echo $dt->accountname; ?></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <span class="tb-sub"><?php echo $dt->nominal_transfer; ?></span>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <span class="tb-sub"><?php echo $dt->sn; ?></span>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <span class="tb-sub"><?php echo $dt->notes; ?></span>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <span class="tb-sub"><?php echo $dt->status; ?></span>
                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<!-- Modal Form -->
<!-- <div class="modal fade" tabindex="-1" id="detailDeposit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div class="nk-iv-wg4">
                    <div class="nk-iv-wg4-sub">
                        <h6 class="nk-iv-wg4-title title">Your Investment Details</h6>
                        <ul class="nk-iv-wg4-overview g-2">
                            <li>
                                <div class="sub-text">No. Referensi</div>
                                <div class="lead-text" id="referensi"></div>
                            </li>
                            <li>
                                <div class="sub-text">Transaksi ID</div>
                                <div class="lead-text" id="transaksi"></div>
                            </li>
                            <li>
                                <div class="sub-text">Produk</div>
                                <div class="lead-text" id="produk"></div>
                            </li>
                            <li>
                                <div class="sub-text">Deskripsi</div>
                                <div class="lead-text" id="deskripsi"></div>
                            </li>
                            <li>
                                <div class="sub-text">Nomor Tujuan</div>
                                <div class="lead-text" id="nomor"></div>
                            </li>
                            <li>
                                <div class="sub-text">Status</div>
                                <div class="lead-text"><span class="badge badge-success" id="status"
                                        style="color:white"></span></div>
                            </li>
                            <li>
                                <div class="sub-text">Nomor Serial</div>
                                <div class="lead-text" id="serial"></div>
                            </li>
                            <li>
                                <div class="sub-text">Tanggal Transaksi</div>
                                <div class="lead-text" id="tgl"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-iv-wg4-sub">
                        <ul class="nk-iv-wg4-list">
                            <li>
                                <div class="sub-text">Metode Pembayaran</div>
                                <div class="lead-text">Saldo GetID</div>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-iv-wg4-sub">
                        <ul class="nk-iv-wg4-list">
                            <li>
                                <div class="sub-text">Biaya Transaksi</div>
                                <div class="lead-text" id="biaya"></div>
                            </li>
                            <li>
                                <div class="sub-text">Pajak <span>(0%)</span></div>
                                <div class="lead-text">Rp 0</div>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-iv-wg4-sub">
                        <ul class="nk-iv-wg4-list">
                            <li>
                                <div class="lead-text">Total</div>
                                <div class="caption-text text-primary" id="total"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Modal Footer Text</span>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- <script type="text/javascript">
function detailDeposit(referensi, transaksi, produk, deskripsi, nomor, status, serial, tgl, biaya) {
    // alert('hai');
    // document.getElementById("add_rra_jumlah").value = "";
    $('#referensi').text(referensi);
    $('#transaksi').text(transaksi);
    $('#produk').text(produk);
    $('#deskripsi').text(deskripsi);
    $('#nomor').text(nomor);
    if (status == 'SUCCESS') {
        $('#status').text("Berhasil");
        $('#status').removeClass().addClass('badge badge-success');
    } else if (status == 'FAILED') {
        $('#status').text("Gagal");
        $('#status').removeClass().addClass('badge badge-danger');
    } else {
        $('#status').text("Sedang di Proses");
        $('#status').removeClass().addClass('badge badge-warning');
    }
    $('#serial').text(serial);
    $('#tgl').text(tgl);
    $('#biaya').text(biaya);
    $('#total').text(biaya);
}
</script> -->