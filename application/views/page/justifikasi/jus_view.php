<!-- Page -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Justification</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Justification</li>
            <li class="breadcrumb-item active">View Justification</li>
        </ol>

    </div>

    <div class="page-content">
        <!-- Example Panel With Tool -->
        <div class="panel panel-primary panel-line">
            <div class="panel-heading">

                <div class="panel-title">
                    <h3>Pengajuan Justifikasi</h3>
                </div>
                <hr />
                <div class="panel-actions">
                    <?php $iju = base64_encode($justifikasi->id_justifikasi); ?>
                    <div class="dropdown">
                        <a class="panel-action" data-toggle="dropdown" href="#" aria-expanded="false"><i
                                class="icon wb-settings" aria-hidden="true"></i></a>
                        <div class="dropdown-menu dropdown-menu-bullet" role="menu">
                            <a class="dropdown-item" href="#" role="menuitem"><i class="icon fa-file-pdf-o"
                                    aria-hidden="true"></i>
                                Preview Justification</a>
                            <!-- <a class="dropdown-item"
                                href="<?php echo site_url("justification/justifikasi_pdf?irb=".$iju); ?>"
                                target="_blank" role="menuitem"><i class="icon fa-file-pdf-o" aria-hidden="true"></i>
                                Preview Justification</a> -->
                        </div>
                    </div>
                    <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true"
                        aria-hidden="true"></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <div style="display:show" class="wizard-pane" id="wizard-confirm" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-3" style="margin:auto">
                                <h3>
                                    <img class="mr-10"
                                        src="<?php echo base_url() . "topicon/assets/"; ?>images/gratika_favicon.png">Gratika
                                </h3>
                            </div>
                            <div class="col-lg-6" style="margin:auto">
                                <h4 class="text-center">Form Pengajuan Justifikasi</h4>
                                <h4 class="text-center">Kebutuhan Barang atau Jasa</h4>
                            </div>
                            <div class="col-lg-3" style="margin:auto">
                                <h4 class="text-right">#<?php echo $justifikasi->nomor_justifikasi; 
                                $irb = base64_encode($justifikasi->id_rab); 
                                ?></h4>
                            </div>
                            <div class="col-lg-6"><br />
                                <div class="column" style="float: left;width: 20%;">
                                    <p><b>Project Name</b></p>
                                    <p><b>Divisi</b></p>
                                    <p><b>Sub Divisi</b></p>
                                </div>
                                <div class="column" style="float: left;width: 80%;">
                                    <p>: <?php if ($justifikasi->id_project !=0){
                                            echo " ".$justifikasi->project->nama_project;   
                                    } else { echo "No Project"; } ?>
                                    </p>
                                    <p>: <?php if ($justifikasi->id_project !=0){
                                            echo " ".$justifikasi->project->nama_divisi;   
                                    } else { echo " - "; } ?></p>
                                    <p>: <?php if ($justifikasi->id_project !=0){
                                            echo " ".$justifikasi->project->nama_subdiv;   
                                    } else { echo " - "; } ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6"><br />
                                <div class="column" style="float: left;width: 30%;">
                                    <p><b>Created By</b></p>
                                    <p><b>Manager Requester</b></p>
                                    <p><b>Division</b></p>
                                </div>
                                <div class="column" style="float: left;width: 70%;">
                                    <p>: <?php echo " ".$justifikasi->dibuat_nama; ?></p>
                                    <p>: <?php echo " ".$justifikasi->diminta_pegawai->full_name; ?></p>
                                    <p>:
                                        <?php echo " ".$justifikasi->diminta_pegawai->nmdivisi." - ".$justifikasi->diminta_pegawai->nmsubdiv; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6"><br />
                                <div class="column" style="float: left;width: 20%;">
                                    <p><b>Nomor RAB</b></p>
                                    <p><b>Status</b></p>
                                    <p><b>Dibuat tanggal</b></p>
                                    <p><b>File Pendukung</b></p>
                                </div>
                                <div class="column" style="float: left;width: 80%;">
                                    <p>: <a href="<?php echo site_url("rab/document_rab?irb=".$irb); ?>">
                                            <?php echo $justifikasi->nomor_rab; ?></a>
                                    </p>
                                    <p>: <?php echo " ".$justifikasi->status_jus->status; ?></p>
                                    <p>:<?php echo " ".$justifikasi->dibuat_tgl;?></p>
                                    <p>:
                                        <?php 
                                        if ($justifikasi->file_upload != null || $justifikasi->file_upload != "") {
                                            $file = explode("|",$justifikasi->file_upload);
                                            for ($i=0; $i < count($file); $i++) { 
                                                if ($i != count($file)-1) { ?>
                                        <a target="_blank"
                                            href="<?php echo "http://aplikasi2.gratika.id/corerka/core-rka/view_file/".$file[$i]; ?>"><?php echo explode("/",$file[$i])[1]; ?></a>,
                                        <?php       } else { ?>
                                        <a target="_blank"
                                            href="<?php echo "http://aplikasi2.gratika.id/corerka/core-rka/view_file/".$file[$i]; ?>"><?php echo explode("/",$file[$i])[1]; ?></a>
                                        <?php       }
                                            }
                                        } else {
                                            echo " Tidak ada file sebelumnya.";
                                        } 
                                        ?>

                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6"><br />
                                <div class="column" style="float: left;width: 30%;">
                                    <?php if ($justifikasi->status =='43') { ?>
                                    <p><b>Ditolak VP</b></p>
                                    <p><b>Tanggal Ditolak</b></p>
                                    <?php } else { ?>
                                    <p><b>Disetujui VP</b></p>
                                    <p><b>Tanggal Disetujui</b></p>
                                    <?php } ?>
                                    <?php if ($justifikasi->status =='45') { ?>
                                    <p><b>Ditolak BOD</b></p>
                                    <p><b>Tanggal Ditolak</b></p>
                                    <?php } else { ?>
                                    <p><b>Disetujui BOD</b></p>
                                    <p><b>Tanggal Disetujui</b></p>
                                    <?php } ?>
                                </div>
                                <div class="column" style="float: left;width: 70%;">
                                    <p>:<?php echo " ".$justifikasi->disetujui1_nama;?></p>
                                    <p>:<?php echo " ".$justifikasi->disetujui1_tgl;?></p>
                                    <p>:<?php echo " ".$justifikasi->disetujui2_nama;?></p>
                                    <p>:<?php echo " ".$justifikasi->disetujui2_tgl;?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr />
                                <div class="column" style="float: left;width: 12%;">
                                    <p><b>Latar Belakang</b></p>
                                </div>
                                <div class="column" style="float: left;width: 88%;">
                                    <p>: <?php echo $justifikasi->latar_belakang; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="column" style="float: left;width: 12%;">
                                    <p><b>Aspek Strategis</b></p>
                                </div>
                                <div class="column" style="float: left;width: 88%;">
                                    <p>: <?php echo $justifikasi->aspek_strategis; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="column" style="float: left;width: 12%;">
                                    <p><b>Aspek Bisnis</b></p>
                                </div>
                                <div class="column" style="float: left;width: 88%;">
                                    <p>: <?php echo $justifikasi->aspek_bisnis; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="column" style="float: left;width: 12%;">
                                    <p><b>Spesifikasi Teknis</b></p>
                                </div>
                                <div class="column" style="float: left;width: 88%;">
                                    <p>: <?php echo $justifikasi->spesifikasi_teknis; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="column" style="float: left;width: 12%;">
                                    <p><b>Aspek Lain</b></p>
                                </div>
                                <div class="column" style="float: left;width: 88%;">
                                    <p>: <?php echo $justifikasi->aspek_lain; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="column" style="float: left;width: 12%;">
                                    <p><b>Catatan</b></p>
                                </div>
                                <div class="column" style="float: left;width: 88%;">
                                    <p>: <?php echo $justifikasi->catatan; ?></p>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center">Item Barang / Jasa yang digunakan
                            <hr />
                        </h5>
                        <div class="page-invoice-table table-responsive">
                            <table class="table table-hover text-right">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Kegiatan</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Harga Satuan</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($justifikasi->items as $key => $item): ?>
                                    <tr>
                                        <td class='text-center'><?php echo $key+1; ?></td>
                                        <td class='text-center'><?php echo $item->kegiatan; ?></td>
                                        <td class='text-center'><?php echo $item->keterangan; ?></td>
                                        <td class='text-center'><?php echo $item->quantity; ?></td>
                                        <td><?php  echo "Rp. " . number_format( $item->harga, 0, ',', '.') . " ,-"; ?>
                                        </td>
                                        <td><?php  echo "Rp. " . number_format( $item->jumlah, 0, ',', '.') . " ,-"; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h5 class="text-center">COA saat pengunaan
                            <hr />
                        </h5>
                        <div class="page-invoice-table table-responsive">
                            <table class="table table-hover text-right">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nomor COA</th>
                                        <th class="text-center">Type COA</th>
                                        <th class="text-center">Bulan ke-</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($justifikasi->payments as $key => $pay): ?>
                                    <tr>
                                        <td class='text-center'><?php echo $key+1; ?></td>
                                        <td class='text-center'><?php echo $pay->no_coa; ?></td>
                                        <td class='text-center'><?php echo $pay->nama_tipe; ?></td>
                                        <td class='text-center'><?php echo $pay->bulan_coa; ?></td>
                                        <td><?php  echo "Rp. " . number_format( $pay->jumlah, 0, ',', '.') . " ,-"; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right clearfix">
                            <div class="float-right">
                                <p class="page-invoice-amount">Total harga item:
                                    <span><?php  echo "Rp. " . number_format( $justifikasi->total_item, 0, ',', '.') . " ,-"; ?></span>
                                </p>
                                <p class="page-invoice-amount">Total COA saat pengunaan:
                                    <span><?php  echo "Rp. " . number_format( $justifikasi->total_payment, 0, ',', '.') . " ,-"; ?></span>
                                </p>
                            </div>
                        </div>
                        <hr />
                        <div class="column" style="float: left;">
                            <p><b>Pesan sebelumnya &nbsp;&nbsp;&nbsp;&nbsp;:</b></p>
                        </div>
                        <div class="column" style="float: left;">
                            <p>&nbsp;<?php echo $justifikasi->keterangan; ?></p>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <?php if ($justifikasi->status == '40' && ($justifikasi->diminta_oleh == $idu || $role == '1')) { ?>
                    <button type="button" class="btn btn-info  float-right mr-5 ml-5"
                        onClick="return modal_confirm('periksa','rab')" data-toggle="modal"
                        data-target="#modal_confirm">Konfirmasi Periksa</button>
                    <?php } ?>
                    <?php if ($justifikasi->status == '47' && ($justifikasi->dibuat_oleh == $idu || $role == '1' || $role == '4')) { ?>
                    <button type="button" class="btn btn-info  float-right mr-5 ml-5"
                        onClick="return modal_confirm('check_last','rab')" data-toggle="modal"
                        data-target="#modal_confirm">Konfirmasi Selesai</button>
                    <?php } ?>
                    <?php if ($justifikasi->status == '46' && ($justifikasi->diminta_oleh == $idu || $role == '1' || $role == '5')) { ?>
                    <button type="button" class="btn btn-info  float-right mr-5 ml-5"
                        onClick="return modal_confirm('verifikasi','rab')" data-toggle="modal"
                        data-target="#modal_confirm">Verifikasi Keuangan</button>
                    <?php } ?>
                    <?php if ($justifikasi->status == '40' && ($justifikasi->diminta_oleh == $idu || $role == '1')) { ?>
                    <button type="button" class="btn btn-danger  float-right mr-5 ml-5"
                        onClick="return modal_confirm('cancel','rab')" data-toggle="modal"
                        data-target="#modal_confirm">Batalkan Pengajuan</button>
                    <?php } ?>

                    <!-- EXECUTE APPROVE REJECT REVISI RAB / RRA VP -->
                <!-- JIKA ROLE DEVELOPER ATAU VP -->
                <?php if ($justifikasi->status == '41' && ($role == '1' || $role == '3')) { ?>
                <!-- JIKA INI RAB -->
                <button type="button" class="btn btn-warning  float-right mr-5 ml-5"
                    onClick="return modal_confirm('revisi','rab')" data-toggle="modal"
                    data-target="#modal_confirm">Revisi
                    RAB</button>
                <button type="button" class="btn btn-danger  float-right mr-5 ml-5"
                    onClick="return modal_confirm('reject','rab')" data-toggle="modal"
                    data-target="#modal_confirm">Reject
                    RAB</button>
                <button type="button" class="btn btn-success  float-right mr-5 ml-5"
                    onClick="return modal_confirm('approve','rab')" data-toggle="modal"
                    data-target="#modal_confirm">Approve RAB</button>
                <?php } ?>

                <!-- EXECUTE APPROVE REJECT REVISI RAB / RRA BOD -->
                <!-- JIKA ROLE DEVELOPER ATAU VP -->
                <?php if ($justifikasi->status == '44' && ($role == '1' || $role == '2')) { ?>
                <!-- JIKA INI RAB -->
                <button type="button" class="btn btn-warning  float-right mr-5 ml-5"
                    onClick="return modal_confirm('revisi','rab')" data-toggle="modal"
                    data-target="#modal_confirm">Revisi
                    RAB</button>
                <button type="button" class="btn btn-danger  float-right mr-5 ml-5"
                    onClick="return modal_confirm('reject','rab')" data-toggle="modal"
                    data-target="#modal_confirm">Reject
                    RAB</button>
                <button type="button" class="btn btn-success  float-right mr-5 ml-5"
                    onClick="return modal_confirm('approve','rab')" data-toggle="modal"
                    data-target="#modal_confirm">Approve RAB</button>
                <?php } ?>

                <!-- BUTTON UNTUK UPDATE / STATUS REVISI -->
                <!-- developer atau admin -->
                <?php if ($justifikasi->status == '2' && ($role == '1' || $role == '4')) { ?>
                <button type="button" class="btn btn-warning  float-right mr-5 ml-5"
                    onClick="alert('on progres team');">Revisi RAB</button>
                <?php } ?>
            </div> -->
        </div>
    </div>
</div>
</div>
<!-- End Page -->

<!-- MODAL APPROVE RAB -->
<div id="modal_confirm" class="modal fade modal-danger" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="modal-tittle" class="modal-title"></h4>
            </div>
            <?php echo form_open_multipart('justification/execute'); ?>
            <div class="modal-body">
                <div class="row">
                    <input type="text" class="form-control validate_char" id="id_jus" name="id_jus"
                        value="<?php echo $justifikasi->id_justifikasi; ?>" hidden />
                    <input type="text" class="form-control validate_char" id="execute" name="execute" hidden>
                    <input type="text" class="form-control validate_char" id="type" name="type"
                        value="<?php echo $justifikasi->id_justifikasi; ?>" hidden />
                    <div class="col-lg-12 form-group row">
                        <label class="col-lg-3 col-form-label">Nomor JUSTIFIKASI: </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control validate_char" id="no_jus" name="no_jus"
                                value="<?php echo $justifikasi->nomor_justifikasi; ?>" disabled />
                        </div>
                    </div>
                    <div id="div_keterangan" class="col-lg-12 form-group row">
                        <label class="col-lg-3 col-form-label">Keterangan: </label>
                        <div class="col-lg-9">
                            <textarea type="text" class="form-control validate_char" id="keterangan" name="keterangan"
                                placeHolder="Type your reason" required /></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger float-right mr-5 ml-5"
                    onclick='return act_confirm()'>Lanjutkan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
function modal_confirm(execute, type) {
    if (execute == 'cancel' && type == 'rab') {
        $("#div_keterangan").show();
        $("#keterangan").prop('required', true);
        $('#modal-tittle').text("Form Pembatalan RAB");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;

    } else if (execute == 'periksa' && type == 'rab') {
        $("#div_keterangan").show();
        $("#keterangan").prop('required', true);
        $('#modal-tittle').text("Form Konfirmasi Manager");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;

    } else if (execute == 'check_last' && type == 'rab') {
        $("#div_keterangan").hide();
        $("#keterangan").prop('required', false);
        $('#modal-tittle').text("Form Konfirmasi Selesai");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;

    } else if (execute == 'verifikasi' && type == 'rab') {
        $("#div_keterangan").hide();
        $("#keterangan").prop('required', false);
        $('#modal-tittle').text("Form Verifikasi");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;

    } else if (execute == 'revisi' && type == 'rab') {
        $("#div_keterangan").show();
        $("#keterangan").prop('required', true);
        $('#modal-tittle').text("Form Revisi RAB");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;

    } else if (execute == 'approve' && type == 'rab') {
        $("#div_keterangan").hide();
        $("#keterangan").prop('required', false);
        $('#modal-tittle').text("Form Konfirmasi Approve RAB");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;

    } else if (execute == 'reject' && type == 'rab') {
        $("#div_keterangan").show();
        $("#keterangan").prop('required', true);
        $('#modal-tittle').text("Form Konfirmasi Reject RAB");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;

    } else if (execute == 'approve' && type == 'rra') {
        $("#div_keterangan").hide();
        $("#keterangan").prop('required', false);
        $('#modal-tittle').text("Form Konfirmasi Approve RRA");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;

    } else if (execute == 'reject' && type == 'rra') {
        $("#div_keterangan").show();
        $("#keterangan").prop('required', true);
        $('#modal-tittle').text("Form Konfirmasi Reject RRA");
        document.getElementById("execute").value = execute;
        document.getElementById("type").value = type;
    }
}
</script>