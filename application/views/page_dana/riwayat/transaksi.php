<div class="riwayat" style="padding: 100px 100px;">
    <div class="tabs ">
        <input type="radio" name="tabs" id="tabone" <?php if ($flag == 'transaksi') { echo 'checked="checked"'; } ?>>
        <label class="label" for="tabone" style="margin-bottom: 0; max-height: 50px;">Transaksi</label>
        <div class="tab">
            <div class="pt-3 d-flex justify-content-between">
                <div style="font-weight: bolder; font-size: larger;"></div>
                <div>
                    <form class="d-flex justify-content-center" method="get" enctype="multipart/form-data"
                        action="<?php echo site_url(). "/riwayat/index" ?>">
                        <div>
                            <input name="flag" value="transaksi" hidden />
                        </div>
                        <div>
                            <input style="border: 2px solid #dddddd; padding: 2px 15px; text-align: end;"
                                placeholder="Tanggal Mulai" class="textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="tgl_mulai" name="tgl_mulai" required />
                            <!-- <div class="form-note">Masukan tanggal mulai pencarian</div> -->
                        </div>
                        <div>
                            <input style="border: 2px solid #dddddd; padding: 2px 15px; text-align: end;"
                                placeholder="Tanggal Akhir" class="textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="tgl_akhir" name="tgl_akhir" required />
                            <!-- <div class="form-note">Masukan tanggal akhir pencarian</div> -->
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary"
                                onclick="return act_confirm()">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="pt-3">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col"><span class="sub-text">No</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">No. Referensi</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Tanggal Transaksi</span></th>
                                        <!-- <th class="nk-tb-col"><span class="sub-text">Kode Produk</span></th> -->
                                        <th class="nk-tb-col"><span class="sub-text">Deskripsi</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Nomor Tujuan</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Harga</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($transaksi) == 0) {?>
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <span class="tb-sub ml-2">Tidak ada Transaksi Terakhir</span>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php foreach ($transaksi as $key => $dt) { ?>
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <span class="tb-sub ml-2"><?php echo ++$key; ?></span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-sub ml-2"><?php echo $dt->OriginalTransID; ?></span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span
                                                class="tb-sub"><?php $tgl = date("d M Y H:i:s",strtotime($dt->Date)); echo $tgl; ?></span>
                                        </td>
                                        <!-- <td class="nk-tb-col">
                                            <span class="tb-lead"><?php echo $dt->Barcode; ?></span>
                                        </td> -->
                                        <td class="nk-tb-col">
                                            <?php if (strpos($dt->Product_x0020_Name, "DATA") !== false) { ?>
                                            <span
                                                class="tb-sub"><?php $des = $dt->Product_x0020_Name; echo $des; ?></span>
                                            <?php } else {?>
                                            <span
                                                class="tb-sub"><?php $des = $dt->Product_x0020_Name." PULSA ".$dt->Amount; echo $des; ?></span>
                                            <?php } ?>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-name">
                                                    <span class="tb-lead"><?php echo $dt->Phone; ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-sub tb-amount"><span>Rp
                                                </span><?php $harga = number_format($dt->Price, 0, ',', '.'); echo $harga;?></span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <?php if ($dt->Status == "SUCCESS") { ?>
                                            <span class="tb-sub text-success">Berhasil</span>
                                            <?php } else if ($dt->Status == "FAILED") { ?>
                                            <span class="tb-sub text-danger">Gagal</span>
                                            <?php } else { ?>
                                            <span class="tb-sub text-warning">Sedang di Proses></span>
                                            <?php } ?>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                            data-toggle="dropdown"><em
                                                                class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <!-- <a href="#"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Details</span></a> -->
                                                                    <a href="#"
                                                                        onClick="return detailTrx('<?php echo $dt->OriginalTransID; ?>','<?php echo $dt->TransID; ?>','<?php echo $dt->Barcode; ?>','<?php echo $des; ?>','<?php echo $dt->Phone; ?>','<?php echo $dt->Status; ?>','<?php echo $dt->SerialNumber; ?>','<?php echo $tgl; ?>','<?php echo $harga; ?>')"
                                                                        data-toggle="modal"
                                                                        data-target="#riwayat">Lihat</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="radio" name="tabs" id="tabtwo" <?php if ($flag == 'deposito') { echo 'checked="checked"'; } ?>>
        <label class="label" for="tabtwo" style="margin-bottom: 0; max-height: 50px;">Deposito</label>
        <div class="tab">
            <div class="pt-3 d-flex justify-content-between">
                <div style="font-weight: bolder; font-size: larger;"></div>
                <div>
                    <form class="d-flex justify-content-center" method="get" enctype="multipart/form-data"
                        action="<?php echo site_url(). "/riwayat/index" ?>">
                        <div>
                            <input name="flag" value="deposito" hidden />
                        </div>
                        <div>
                            <input style="border: 2px solid #dddddd; padding: 2px 15px; text-align: end;"
                                placeholder="Tanggal Mulai" class="textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="tgl_mulai" name="tgl_mulai" require />
                            <!-- <div class="form-note">Masukan tanggal mulai pencarian</div> -->
                        </div>
                        <div>
                            <input style="border: 2px solid #dddddd; padding: 2px 15px; text-align: end;"
                                placeholder="Tanggal Akhir" class="textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="tgl_akhir" name="tgl_akhir" require />
                            <!-- <div class="form-note">Masukan tanggal akhir pencarian</div> -->
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary"
                                onclick="return act_confirm()">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="pt-3">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col"><span class="sub-text">No.</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Tanggal Deposito</span></th>
                                        <!-- <th class="nk-tb-col"><span class="sub-text">Username</span></th> -->
                                        <!-- <th class="nk-tb-col"><span class="sub-text">Nama</span></th> -->
                                        <th class="nk-tb-col"><span class="sub-text">Tipe TopUp</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Bank</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Nomor Akun</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Atas Nama</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Nominal</span></th>
                                        <!-- <th class="nk-tb-col"><span class="sub-text">SN</span></th> -->
                                        <!-- <th class="nk-tb-col"><span class="sub-text">Note</span></th> -->
                                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($deposito) == 0) {?>
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <span class="tb-sub ml-2">Tidak ada Deposito Terakhir</span>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php foreach ($deposito as $key => $dt) { ?>
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <?php echo ++$key; ?></span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span
                                                class="tb-sub"><?php $tgl = date("d M Y H:i:s",strtotime($dt->daterequest)); echo $tgl; ?></span>
                                        </td>
                                        <!-- <td class="nk-tb-col">
                                            <span class="tb-lead"><?php echo $dt->storeid; ?></span>
                                        </td> -->
                                        <!-- <td class="nk-tb-col">
                                            <div class="user-card">
                                                <span class="tb-sub"><?php echo $dt->storeid; ?></span>
                                            </div>
                                        </td> -->

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
                                        <!-- <td class="nk-tb-col">
                                            <div class="user-card">
                                                <span class="tb-sub"><?php echo $dt->sn; ?></span>
                                            </div>
                                        </td> -->
                                        <!-- <td class="nk-tb-col">
                                            <div class="user-card">
                                                <span class="tb-sub"><?php echo $dt->notes; ?></span>
                                            </div>
                                        </td> -->
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <span class="tb-sub"><?php echo $dt->status; ?></span>
                                            </div>
                                        </td>
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

<!-- Modal Form -->
<div class="modal fade" id="riwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-header " style="background-color: #089aeb; color: white;">
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">
                    <span>Detail Transaksi</span>
                </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body" style="padding: 0 40px; font-size: 15px;">
                <div class="pt-5 pr-5 d-flex justify-content-between">
                    <div>
                        <div>
                            <div style="color: #d8d8d8; font-size: smaller;">
                                No. Referensi
                            </div>
                            <div>
                                k2828292nn
                            </div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Produk
                            </div>
                            <div>
                                XLD150
                            </div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Nomor Tujuan
                            </div>
                            <div>
                                0288729992
                            </div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Nomor Serial
                            </div>
                            <div>
                                XXX
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Transaksi ID
                            </div>
                            <div>
                                11182777829
                            </div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Deskripsi
                            </div>
                            <div>
                                XL Data 1 5gb 30hr
                            </div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Status
                            </div>
                            <div>
                                gagal
                            </div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Tanggal Transaksi
                            </div>
                            <div>
                                23 Januari 2021
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <hr style="border: solid #d8d8d8 1px;">
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        Metode Pembayaran
                    </div>
                    <div>
                        Saldo Get ID
                    </div>
                </div>
                <div>
                    <hr style="border: solid #d8d8d8 1px;">
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        Biaya Transaksi
                    </div>
                    <div>
                        17.000
                    </div>
                </div>
                <div>
                    <hr style="border: solid #d8d8d8 1px;">
                </div>
                <div class="d-flex justify-content-between" style="font-weight: 800;">
                    <div>
                        Total
                    </div>
                    <div>
                        17.000
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function detailTrx(referensi, transaksi, produk, deskripsi, nomor, status, serial, tgl, biaya) {
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
</script>