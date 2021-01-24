<!-- <div class="parent">
    <img class="img-pojok" src="<?php echo base_url(); ?>assets_dana/Group 1.png" alt="">
</div> -->
<div class="beranda d-flex justify-content-between pt-3">
    <div class="saldo">
        <img style="width: 450px; margin: 120px 0 0 0;" src="<?php echo base_url(); ?>assets_dana/Group 306@2x.png"
            alt="">
        <div class="centered">
            <div class="cen-one">
                Saldo Anda
            </div>
            <div class="cen-two">
                <?php echo "Rp ".number_format($saldo, 0, ',', '.'); ?>
            </div>
            <div>
                <a class="top-up" href="<?php echo site_url("beli/topup"); ?>">
                    Top Up Saldo
                </a>
            </div>
        </div>
    </div>
    <div class="pt-5" style="padding-right: 100px;">
        <img style="width: 350px;" src="<?php echo base_url(); ?>assets_dana/loncat.png" alt="">
    </div>
</div>

<div class="text-center" onclick="scrollto('trans');" style="cursor: pointer; position: relative; top: -20px;">
    <div class="parent">
        <img class="img-transaksi" src="<?php echo base_url(); ?>assets_dana/gel-home.png" alt="">
        <div class="trans-last">
            Transaksi <br>
            Terakhir <br>
            <i class="fas fa-angle-down"></i>
        </div>
    </div>
</div>
<div id="trans" style="background-color: #f9f9f9; color: black; padding: 50px 100px ;">
    <!-- <table class="table" style="background-color: white;">
        <thead>
            <tr>
                <th>Transaksi Terakhir</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <th>
                    <a class="lihat-semua" href="#">
                        Lihat Semua
                    </a>
                </th>
            </tr>
            <tr>
                <th scope="col">No. Referensi</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Nomor Tujuan</th>
                <th scope="col">Harga</th>
                <th class="text-center" scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
        </tbody>
    </table> -->
    <div class="col-xl-12 col-xxl-8">
        <div class="card card-bordered card-full">
            <div class="card-inner border-bottom">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">Transaksi Terakhir</h6>
                    </div>
                    <div class="card-tools">
                        <a href="<?php echo site_url("riwayat/transaksi"); ?>" class="link">Lihat
                            semua</a>
                    </div>
                </div>
            </div>
            <div class="nk-tb-list">
                <div class="nk-tb-item nk-tb-head table-head">
                    <div class="nk-tb-col "><span class="sub-text">No. Referensi</span></div>
                    <div class="nk-tb-col "><span class="sub-text">Tanggal Transaksi</span></div>
                    <div class="nk-tb-col "><span class="sub-text">Kode Produk</span></div>
                    <div class="nk-tb-col "><span class="sub-text">Deskripsi</span></div>
                    <div class="nk-tb-col "><span class="sub-text">Nomor Tujuan</span></div>
                    <div class="nk-tb-col "><span class="sub-text">Harga</span></div>
                    <div class="nk-tb-col "><span class="sub-text">Status</span></div>
                    <div class="nk-tb-col "><span class="sub-text"></span></div>
                </div>
                <?php if (count($data) == 0) { ?>
                <div class="nk-tb-item">
                    <div class="nk-tb-col">
                        Tidak ada Transaksi Terakhir
                    </div>
                </div>
                <?php } ?>
                <?php foreach ($data as $key => $dt) { ?>
                <div class="nk-tb-item">
                    <div class="nk-tb-col">
                        <!-- <div class="align-center"> -->
                        <span class="tb-sub ml-2"><?php echo $dt->OriginalTransID; ?></span>
                        <!-- </div> -->
                    </div>
                    <div class="nk-tb-col">
                        <span class="tb-sub"><?php $tgl = date("d M Y H:i:s",strtotime($dt->Date)); echo $tgl; ?></span>
                    </div>
                    <div class="nk-tb-col">
                        <span class="tb-lead"><?php echo $dt->Barcode; ?></span>
                    </div>

                    <div class="nk-tb-col">
                        <div class="user-card">
                            <?php if (strpos($dt->Product_x0020_Name, "DATA") !== false) { ?>
                            <span class="tb-sub"><?php $des = $dt->Product_x0020_Name; echo $des; ?></span>
                            <?php } else {?>
                            <span
                                class="tb-sub"><?php $des = $dt->Product_x0020_Name." PULSA ".$dt->Amount; echo $des; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="nk-tb-col">
                        <div class="user-card">
                            <div class="user-name">
                                <span class="tb-lead"><?php echo $dt->Phone; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="nk-tb-col">
                        <span class="tb-sub tb-amount"><span>Rp
                            </span><?php $harga = number_format($dt->Price, 0, ',', '.'); echo $harga;?></span>
                    </div>
                    <div class="nk-tb-col">
                        <?php if ($dt->Status == "SUCCESS") { ?>
                        <span class="tb-sub text-success">Berhasil</span>
                        <?php } else if ($dt->Status == "FAILED") { ?>
                        <span class="tb-sub text-danger">Gagal</span>
                        <?php } else { ?>
                        <span class="tb-sub text-warning">Sedang di Proses></span>
                        <?php } ?>
                    </div>
                    <div class="nk-tb-col nk-tb-col-action">
                        <div class="dropdown">
                            <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                <ul class="link-list-plain">
                                    <li><a href="#"
                                            onClick="return detailTrx('<?php echo $dt->OriginalTransID; ?>','<?php echo $dt->TransID; ?>','<?php echo $dt->Barcode; ?>','<?php echo $des; ?>','<?php echo $dt->Phone; ?>','<?php echo $dt->Status; ?>','<?php echo $dt->SerialNumber; ?>','<?php echo $tgl; ?>','<?php echo $harga; ?>')"
                                            data-toggle="modal" data-target="#detailTrx">Lihat</a>
                                    </li>
                                    <!-- <li><a href="#">Invoice</a></li>
                                                        <li><a href="#">Print</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailTrx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
            <div class="modal-body" style="padding: 0 40px; font-size: 15px; color:black;">
                <div class="pt-5 pr-5 d-flex justify-content-between">
                    <div>
                        <div>
                            <div style="color: #d8d8d8; font-size: smaller;">
                                No. Referensi
                            </div>
                            <div id="referensi"></div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Produk
                            </div>
                            <div id="produk"></div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Nomor Tujuan
                            </div>
                            <div id="nomor"></div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Nomor Serial
                            </div>
                            <div id="serial"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Transaksi ID
                            </div>
                            <div id="transaksi"></div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Deskripsi
                            </div>
                            <div id="deskripsi"></div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Status
                            </div>
                            <div>
                                <span class="badge badge-success" id="status" style="color:white"></span>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div style="color: #d8d8d8; font-size: smaller;">
                                Tanggal Transaksi
                            </div>
                            <div id="tgl"></div>
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
                    <div id="biaya"></div>
                </div>
                <div>
                    <hr style="border: solid #d8d8d8 1px;">
                </div>
                <div class="d-flex justify-content-between" style="font-weight: 800;">
                    <div>
                        Total
                    </div>
                    <div id="total"></div>
                </div>
            </div>
            <br />
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    let user_topup = localStorage.getItem('user_topup');
    let nominal_topup = localStorage.getItem('nominal_topup');
    let time_topup = localStorage.getItem('time_topup');
    if (user_topup != null && nominal_topup != null && time_topup != null &&
        user_topup != "" && nominal_topup != "" && time_topup != "") {
        setSession = $.ajax({
            data: {
                user_topup: user_topup,
                nominal_topup: nominal_topup,
                time_topup: time_topup
            },
            type: "POST",
            url: "<?php echo site_url('login/setSession_topup');?>",
            async: false
        }).responseText;
    } else {
        localStorage.setItem('user_topup', null);
        localStorage.setItem('nominal_topup', null);
        localStorage.setItem('time_topup', null);
    }
});
</script>

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