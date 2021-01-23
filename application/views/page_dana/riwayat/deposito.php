<div class="riwayat" style="padding: 100px 100px;">
    <div class="tabs ">
        <input type="radio" name="tabs" id="tabone">
        <label for="tabone" style="margin-bottom: 0; max-height: 50px;">Transaksi</label>
        <div class="tab">
            <div class="pt-3 d-flex justify-content-between">
                <div style="font-weight: bolder; font-size: larger;">
                    <!-- Riwayat Transaksi -->
                </div>
                <div>
                    <form class="d-flex justify-content-center" action="#">
                        <div>
                            <input style="border: 2px solid #dddddd; padding: 2px 15px; text-align: end;"
                                placeholder="Tanggal Mulai" class="textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="date" />
                        </div>
                        <div>
                            <input style="border: 2px solid #dddddd; padding: 2px 15px; text-align: end;"
                                placeholder="Tanggal Akhir" class="textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="date" />
                        </div>
                        <div>
                            <button class="lanjut">Submit</button>
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
                                        <th class="nk-tb-col"><span class="sub-text">No. Referensi</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Tanggal Transaksi</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Kode Produk</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Deskripsi</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Nomor Tujuan</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Harga</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($data) == 0) {?>
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <span class="tb-sub ml-2">Tidak ada Transaksi Terakhir</span>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php foreach ($data as $key => $dt) { ?>
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <span class="tb-sub ml-2"><?php echo $dt->OriginalTransID; ?></span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span
                                                class="tb-sub"><?php $tgl = date("d M Y H:i:s",strtotime($dt->Date)); echo $tgl; ?></span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-lead"><?php echo $dt->Barcode; ?></span>
                                        </td>
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
                                                                        data-target="#detailTrx">Lihat</a>
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
                <!-- <table class="table table-hover">
                    <thead>
                        <tr style="background-color: #089aeb; color: white;">
                            <th scope="col">No. Referensi</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Nomor Tujuan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">o3qb3b3l3l jl </th>
                            <td>31 Desmber 2020 20:07:15</td>
                            <td>XL10</td>
                            <td>XL Pulsa 10000</td>
                            <td>0976527755</td>
                            <td>Rp 10.000</td>
                            <td>Berhasil</td>
                        </tr>
                        <tr>
                            <th scope="row">o3qb3b3l3l jl </th>
                            <td>31 Desmber 2020 20:07:15</td>
                            <td>XL10</td>
                            <td>XL Pulsa 10000</td>
                            <td>0976527755</td>
                            <td>Rp 10.000</td>
                            <td>Berhasil</td>
                        </tr>
                        <tr>
                            <th scope="row">o3qb3b3l3l jl </th>
                            <td>31 Desmber 2020 20:07:15</td>
                            <td>XL10</td>
                            <td>XL Pulsa 10000</td>
                            <td>0976527755</td>
                            <td>Rp 10.000</td>
                            <td>Berhasil</td>
                        </tr>
                        <tr>
                            <th scope="row">o3qb3b3l3l jl </th>
                            <td>31 Desmber 2020 20:07:15</td>
                            <td>XL10</td>
                            <td>XL Pulsa 10000</td>
                            <td>0976527755</td>
                            <td>Rp 10.000</td>
                            <td>Berhasil</td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
            <!-- <div class="d-flex justify-content-center">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item pr-2">
                            <a class="page-link" style="background-color: #e4e4e4; border-radius: 50%;" href="#"
                                tabindex="-1">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item pl-2">
                            <a class="page-link" style="background-color: #e4e4e4; border-radius: 50%;" href="#">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> -->
        </div>

        <input type="radio" name="tabs" id="tabtwo" checked="checked">
        <label for="tabtwo" style="margin-bottom: 0; max-height: 50px;">Deposito</label>
        <div class="tab">
            <div class="pt-3 d-flex justify-content-between">
                <div style="font-weight: bolder; font-size: larger;">
                    <!-- Riwayat Deposito -->
                </div>
                <div>
                    <form class="d-flex justify-content-center" action="#">
                        <div>
                            <input style="border: 2px solid #dddddd; padding: 2px 15px; text-align: end;"
                                placeholder="Tanggal Mulai" class="textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="date" />
                        </div>
                        <div>
                            <input style="border: 2px solid #dddddd; padding: 2px 15px; text-align: end;"
                                placeholder="Tanggal Akhir" class="textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="date" />
                        </div>
                        <div>
                            <button class="lanjut">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="pt-3">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">No. Referensi</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Tanggal Transaksi</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Kode Produk</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Deskripsi</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Nomor Tujuan</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Harga</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($data) == 0) {?>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <span class="tb-sub ml-2">Tidak ada Transaksi Terakhir</span>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($data as $key => $dt) { ?>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <span class="tb-sub ml-2"><?php echo $dt->OriginalTransID; ?></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span
                                                    class="tb-sub"><?php $tgl = date("d M Y H:i:s",strtotime($dt->Date)); echo $tgl; ?></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-lead"><?php echo $dt->Barcode; ?></span>
                                            </td>
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
                                                                            data-target="#detailTrx">Lihat</a>
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
            <!-- <div class="d-flex justify-content-center">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item pr-2">
                            <a class="page-link" style="background-color: #e4e4e4; border-radius: 50%;" href="#"
                                tabindex="-1">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item pl-2">
                            <a class="page-link" style="background-color: #e4e4e4; border-radius: 50%;" href="#">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal Form -->
<div class="modal fade" tabindex="-1" id="detailTrx">
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
                        <!-- <h6 class="nk-iv-wg4-title title">Your Investment Details</h6> -->
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
                            <!-- <li>
                                <div class="sub-text">Pajak <span>(0%)</span></div>
                                <div class="lead-text">Rp 0</div>
                            </li> -->
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
                <!-- </div> -->
            </div>
            <div class="modal-footer bg-light">
                <!-- <span class="sub-text">Modal Footer Text</span> -->
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary" data-dismiss="modal">Kembali</button>
                </div>
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