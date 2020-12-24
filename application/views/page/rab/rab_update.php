<!-- Page -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Update RAB</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">RAB</li>
            <li class="breadcrumb-item active">Update RAB</li>
        </ol>

    </div>

    <div class="page-content">
        <!-- Example Panel With Tool -->
        <div class="panel panel-primary panel-line">
            <div class="panel-heading">

                <div class="panel-title">
                    <h3>Pengajuan Rencana Anggaran Biaya (RAB)</h3>
                </div>
                <hr />
                <div class="panel-actions">
                    <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true"
                        aria-hidden="true"></a>
                </div>
            </div>
            <div class="panel-body">
                <!-- <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    onSubmit="disableButton()" enctype="multipart/form-data"
                    action="<?php echo site_url(). "/rab/save_update" ?>"> -->
                <?php $dttgl = array('data-toggle' => 'validator'); echo form_open_multipart('rab/save_update'); ?>
                <div class="modal-body">
                    <div class="pearls row">
                        <div id="pearl-project" class="pearl current col-3">
                            <div class="pearl-icon"><i class="icon wb-envelope" aria-hidden="true"></i></div>
                            <span class="pearl-title">Form</span>
                        </div>
                        <div id="pearl-item" class="pearl col-3">
                            <div class="pearl-icon"><i class="icon wb-order" aria-hidden="true"></i></div>
                            <span class="pearl-title">Item</span>
                        </div>
                        <div id="pearl-coa" class="pearl col-3">
                            <div class="pearl-icon"><i class="icon wb-payment" aria-hidden="true"></i></div>
                            <span class="pearl-title">COA</span>
                        </div>
                        <div id="pearl-confirm" class="pearl col-3">
                            <div class="pearl-icon"><i class="icon wb-check" aria-hidden="true"></i></div>
                            <span class="pearl-title">Confirmation</span>
                        </div>
                    </div>
                    <hr />
                    <div id="wizard-content" class="wizard-content">
                        <div style="display:show" class="wizard-pane" id="wizard-project" role="tabpanel">
                            <h4 class="text-right mr-60">#<?php echo $rab->nomor_pengajuan; ?></h4>
                            <div class="row">
                                <input type="text" class="form-control validate_char" id="id_rab"
                                    name="id_rab" placeHolder="type your location" hidden value="<?php echo $rab->id_rab; ?>" />
                                <input type="text" class="form-control validate_char" id="add_rra_ket"
                                    name="add_rra_ket" placeHolder="type your location" hidden />
                                <div id="div_project" class="col-lg-6 form-group row">
                                    <label class="col-lg-3 col-form-label"><b>Project: </b></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control validate_char" id="add_id_project"
                                            name="add_id_project" value="<?php echo $rab->id_project; ?>" readOnly
                                            hidden />
                                        <input type="text" class="form-control validate_char"
                                            value="<?php echo $rab->project->nama_project; ?>" disabled />
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-3 col-form-label"><b>Manager request: </b></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control validate_char" id="add_id_pic"
                                            name="add_id_pic" value="<?php echo $rab->diminta_oleh; ?>" readOnly
                                            hidden />
                                        <input type="text" class="form-control validate_char"
                                            value="<?php echo $rab->diminta_pegawai->full_name; ?>" disabled />
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-3 col-form-label">Sasaran: </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control validate_char" id="add_sasaran"
                                            value="<?php echo $rab->sasaran; ?>" name="add_sasaran"
                                            placeHolder="type your purpose" required />
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-3 col-form-label">Catatan: </label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control validate_char" id="add_catatan" name="add_catatan"
                                            placeholder="type your note"
                                            required><?php echo $rab->catatan; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-3 col-form-label">Fasilitas: </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control validate_char" id="add_fasilitas"
                                            name="add_fasilitas" value="<?php echo $rab->fasilitas; ?>"
                                            placeHolder="type your facility" required />
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-3 control-label"><b>File:</b></label>
                                    <input type="text" class="form-control validate_char" id="add_path_file"
                                    name="add_path_file" hidden value="<?php echo $rab->file_upload; ?>" />
                                    <div class="col-lg-9">
                                        <?php 
                                        if ($rab->file_upload != null || $rab->file_upload != "") {
                                            $file = explode("|",$rab->file_upload);
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
                                            echo "Tidak ada file sebelumnya.";
                                        }
                                        ?>
                                        <br />
                                        <input type="file" id="input-file-now" name='add_file[]' data-plugin="dropify"
                                            data-default-file="" multiple="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display:none" class="wizard-pane" id="wizard-item" role="tabpanel">
                            <h5 class="text-center">Item yang dibutuhkan
                                <hr />
                            </h5>
                            <table id="add_table_item" class="table table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:2.5%">#</th>
                                        <th style="width:30%">Kegiatan</th>
                                        <th style="width:15%">Jumlah</th>
                                        <th style="width:20%">Harga Satuan</th>
                                        <th style="width:30%">Keterangan</th>
                                        <th style="width:2.5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="add_tb_body_item">
                                    <?php foreach ($rab->items as $key => $item): ?>
                                    <tr id="add_tb_tr_item<?php echo $key; ?>">
                                        <td><?php echo ($key+1); ?>
                                            <input hidden type="text" class="form-control" name="add_item_id[]"
                                                value="<?php echo $key; ?>" required />
                                        </td>
                                        <td>
                                            <textarea class="form-control" name="add_kegiatan[]"
                                                id="add_kegiatan<?php echo $key; ?>" placeholder="type your activity"
                                                required><?php echo $item->kegiatan; ?></textarea>
                                        </td>
                                        <td>
                                            <input type="number" min="1" class="form-control" name="add_jumlah[]"
                                                id="add_jumlah<?php echo $key; ?>"
                                                value="<?php echo $item->quantity; ?>" required
                                                placeholder="type your count item" />
                                        </td>
                                        <td>
                                            <input type="number" min="1" class="form-control" name="add_harga[]"
                                                id="add_harga<?php echo $key; ?>" value="<?php echo $item->harga; ?>"
                                                required placeholder="type your price item" />

                                        <td>
                                            <textarea class="form-control" name="add_keterangan[]"
                                                id="add_keterangan<?php echo $key; ?>"
                                                placeholder="type your note"><?php echo $item->keterangan; ?></textarea>
                                        </td>
                                        <td>
                                            <?php if ($key ==0) { ?>
                                            <button id="add_itemDinamis" type="button"
                                                class="btn btn-pure btn-default icon wb-plus p-0"></button>
                                            <?php } else { ?>
                                            <button type="button"
                                                onClick="return remove_itemDinamis('<?php echo $key; ?>')"
                                                class="btn btn-pure btn-default icon wb-trash p-0"></button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div style="display:none" class="wizard-pane" id="wizard-coa" role="tabpanel">
                            <h5 class="text-center">COA yang digunakan
                                <h6 class="text-right">Nilai yang dibutuhkan untuk item : <b id="label_total_item"></b>
                                </h6>
                                <a id="btn_add_rra" style="display:none" href="#" onClick="return show_rra()"
                                    class="btn btn-info btn-xs" data-toggle="modal" data-target="#showRRA">
                                    <i class="icon wb-plus"></i> RRA </a>
                                <hr />
                            </h5>
                            <table id="add_table_coa" class="table table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:2.5%">#</th>
                                        <th style="width:30%">Nomor COA</th>
                                        <th style="width:15%">Bulan ke -</th>
                                        <th style="width:15%">Saldo COA saat ini</th>
                                        <th style="width:15%">Jumlah</th>
                                        <th style="width:10%">RRA</th>
                                        <th style="width:12.5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="add_tb_body_coa">
                                    <?php foreach ($rab->payments as $key => $payment): ?>
                                    <tr id="add_tb_tr_coa<?php echo $key; ?>">
                                        <td><?php echo ($key+1); ?>
                                            <input hidden type="text" class="form-control" name="add_coa_id[]"
                                                value="<?php echo $key; ?>" required />
                                        </td>
                                        <td>
                                            <select id="add_coa_nmr<?php echo $key; ?>" name="add_coa_nmr[]"
                                                class="form-control" data-plugin="select2" data-live-search="true"
                                                onchange="changeSaldo_tabel('<?php echo $key; ?>')" required>
                                                <?php 
                                                    $flag_pendapatan = 0;
                                                    $bln_today = (int) date('m'); 
                                                    $dumy_coa = "";
                                                    foreach ($coas as $coa ):
                                                    if ($coa->id_type == '1') {
                                                        $flag_pendapatan = 12;
                                                        continue;
                                                    }    
                                                        
                                                    if ($dumy_coa != $coa->no_coa) { 
                                                        if ($coa->no_coa == $payment->no_coa) { ?>
                                                <option value="<?php echo $coa->no_coa; ?>" selected>
                                                    <?php echo $coa->no_coa." | ".$coa->name_type; ?>
                                                </option>
                                                <?php   } else { ?>
                                                <option value="<?php echo $coa->no_coa; ?>">
                                                    <?php echo $coa->no_coa." | ".$coa->name_type; ?>
                                                </option>
                                                <?php   } ?>
                                                <?php $dumy_coa = $coa->no_coa; } ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select id="add_coa_bln<?php echo $key; ?>" name="add_coa_bln[]"
                                                class="form-control" data-plugin="select2" data-live-search="true"
                                                onchange="changeSaldo_tabel('<?php echo $key; ?>')" required>
                                                <option value="<?php echo $payment->bulan_coa; ?>">
                                                    <?php echo "Month ".$payment->bulan_coa; ?>
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <?php if (count($coas) > 0) { 
                                                $salcoa = "";
                                                foreach ($coas as $coa ):
                                                if ($coa->no_coa == $payment->no_coa && $coa->bulan_ke == $payment->bulan_coa) {
                                                    $salcoa = "Rp. " . number_format( $coa->saldo_coa, 0, ',', '.') . " ,-";
                                                    break;
                                                }    
                                                endforeach;
                                            ?>
                                            <input disabled type="text" class="form-control" name="add_coa_harga[]"
                                                id="add_coa_harga<?php echo $key; ?>" value="<?php echo $salcoa; ?>" />
                                            <?php }  ?>
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" name="add_saldo[]"
                                                id="add_saldo<?php echo $key; ?>"
                                                value="<?php echo $payment->jumlah; ?>" required
                                                placeholder="type your value needed" />
                                        </td>
                                        <td>
                                            <?php if ($payment->status == "1" || $payment->status == 1) { ?>
                                            <span class="badge badge-danger"><i class="icon wb-close"
                                                    aria-hidden="true"></i></span>
                                            <?php } else { ?>
                                            <span class="badge badge-success"><i class="icon wb-check"
                                                    aria-hidden="true"></i></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($key == 0 || $key == "0") { ?>
                                            <button id="add_coaDinamis" type="button"
                                                class="btn btn-pure btn-default icon wb-plus p-0"></button>
                                            <button type="button"
                                                onClick="return remove_coaDinamis(<?php echo $key; ?>)"
                                                class="btn btn-pure btn-default icon wb-trash p-0"></button>
                                            <?php } else { ?>
                                            <button type="button"
                                                onClick="return remove_coaDinamis(<?php echo $key; ?>)"
                                                class="btn btn-pure btn-default icon wb-trash p-0"></button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- </div> -->
                        </div>
                        <div style="display:none" class="wizard-pane" id="wizard-confirm" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3" style="margin:auto">
                                    <h3>
                                        <img class="mr-10"
                                            src="<?php echo base_url() . "topicon/assets/"; ?>images/gratika_favicon.png">Gratika
                                    </h3>
                                </div>
                                <div class="col-lg-6" style="margin:auto">
                                    <h4 class="text-center">Form Pengajuan Rencana Anggaran Biaya</h4>
                                </div>
                                <div class="col-lg-3" style="margin:auto">
                                    <h4 class="text-right">#<?php echo $rab->nomor_pengajuan; ?></h4>
                                </div>

                                <div class="col-lg-6"><br />
                                    <div class="column" style="float: left;width: 20%;">
                                        <p><b>Project Name</b></p>
                                        <p><b>Divisi</b></p>
                                        <p><b>Sub Divisi</b></p>
                                    </div>
                                    <div class="column" style="float: left;width: 80%;">
                                        <p id="c_project">: <?php echo $rab->project->nama_project; ?></p>
                                        <p id="c_divisi">: <?php echo $rab->project->nama_divisi; ?></p>
                                        <p id="c_subdiv">: <?php echo $rab->project->nama_subdiv; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6"><br />
                                    <div class="column" style="float: left;width: 30%;">
                                        <p><b>Created By</b></p>
                                        <p><b>Division</b></p>
                                        <p><b>Manager Requester</b></p>
                                        <p><b>Division</b></p>
                                    </div>
                                    <div class="column" style="float: left;width: 70%;">
                                        <p id="c_created">: <?php echo $this->session->userdata('full_name'); ?></p>
                                        <p id="c_created_div">:
                                            <?php echo $this->session->userdata('nmdivisi')." | ".$this->session->userdata('nmsubdiv');?>
                                        </p>
                                        <p id="c_pic">: <?php echo $rab->diminta_pegawai->full_name; ?></p>
                                        <p id="c_pic_div">:
                                            <?php echo $rab->diminta_pegawai->nmdivisi." | ".$rab->diminta_pegawai->nmsubdiv ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <hr />
                                    <div class="column" style="float: left;width: 10%;">
                                        <p><b>Sasaran :</b></p>
                                    </div>
                                    <div class="column" style="float: left;width: 80%;">
                                        <p id="c_sasaran"></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="column" style="float: left;width: 10%;">
                                        <p><b>Fasilitas :</b></p>
                                    </div>
                                    <div class="column" style="float: left;width: 80%;">
                                        <p id="c_fasilitas"></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="column" style="float: left;width: 10%;">
                                        <p><b>Catatan :</b></p>
                                    </div>
                                    <div class="column" style="float: left;width: 80%;">
                                        <p id="c_catatan"></p>
                                    </div>
                                </div>

                            </div>
                            <h5 class="text-center">Item yang dibutuhkan
                                <hr />
                            </h5>
                            <div class="page-invoice-table table-responsive">
                                <table class="table table-hover text-right">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Kegiatan</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Harga Satuan</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="c_table_item"></tbody>
                                </table>
                            </div>
                            <h5 class="text-center">COA yang digunakan
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
                                    <tbody id="c_table_coa"></tbody>
                                </table>
                            </div>

                            <div class="text-right clearfix">
                                <div class="float-right">
                                    <!-- <p>Sub - Total amount:
                                            <span>Rp 17.000.000</span>
                                        </p>
                                        <p>VAT:
                                            <span>$35</span>
                                        </p> -->
                                    <p class="page-invoice-amount">Total harga item:
                                        <span id="c_total_item"></span>
                                    </p>
                                    <p class="page-invoice-amount">Total nilai COA:
                                        <span id="c_total_coa"></span>
                                    </p>
                                    <p class="page-invoice-amount">Kekurangan :
                                        <span id="c_total_sisa"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="alert-add-rab" style="display:none" class="alert dark alert-danger alert-dismissible"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon wb-alert-circle" aria-hidden="true"></i> Alert, Semua field di isi.
                    </div>
                    <div id="alert-confirm" style="display:none" class="alert dark alert-danger alert-dismissible"
                        role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon wb-alert-circle" aria-hidden="true"></i> Alert, Sesuaikan nilai item yang
                        dibutuhkan dengan nilai COA yang digunakan. Jika tidak memiliki saldo pada bulan ini, ajukan
                        RRA pada buton biru dibawah ini.
                    </div>
                    <hr />
                    <div class="wizard-buttons">
                        <button id="btn_add_back" type="button" class="btn btn-primary btn-outline disabled"
                            onClick="back()">Back</button>
                        <button id="btn_add_next" type="button" class="btn btn-primary btn-outline float-right"
                            onClick="next()">Next</button>
                        <button style="display:none" id="btn_rra" type="button"
                            class="btn btn-info btn-outline float-right" onClick="pengajuan_rra()">Pengajuan
                            RRA</button>
                        <button style="display:none" id="btn_add_submit" type="submit"
                            onClick="return custom_create_confirm()"
                            class="btn btn-success btn-outline float-right">Update
                            RAB</button>
                    </div>

                </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<!-- Modal RRA -->
<div id="showRRA" class="modal fade modal-danger" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Form Pengajuan RRA</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="column" style="float: left;width: 13%;">
                            <p><b>Project</b></p>
                            <p><b>Periode</b></p>
                        </div>
                        <div class="column" style="float: left;width: 37%;">
                            <p id="vr-project">: <?php echo $rab->project->nama_project; ?></p>
                            <p id="vr-periode">: <?php echo date("Ym"); ?></p>
                        </div>
                        <div class="column" style="float: left;width: 13%;">
                            <p><b>Tanggal</b></p>
                            <p><b>NO</b></p>
                        </div>
                        <div class="column" style="float: left;width: 25%;">
                            <p id="vr-tanggal"><?php echo date('d/M/Y'); ?></p>
                            <p id="vr-no"><b>#<?php 
                                $ket_rra = "";
                                if ($rab->rra_join != null) {
                                    echo $rab->rra_join->no_rra;
                                    $ket_rra = $rab->rra_join->keterangan;
                                } else {
                                    echo "01-RRA".date("Ym"); 
                                }
                            ?>
                            </b></p>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-6 form-group row">
                        <label class="col-lg-3 col-form-label">Keterangan</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control validate_char" id="add_rra_ket_modal"
                                name="add_rra_ket_modal" placeHolder="type your tittle" 
                                value="<?php echo $ket_rra;?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group row">
                        <label class="col-lg-3 col-form-label">COA</label>
                        <div class="col-lg-9">
                            <select id="add_coa_nmr_rra" name="add_rra_coa" class="form-control" data-plugin="select2"
                                data-live-search="true" onchange="changeSaldo_tabel('_rra')" required>
                                <?php
                                $flag_pendapatan_rra = 0;
                                $bln_today = (int) date('m'); 
                                $dumy_coa = ""; 
                                foreach ($coas as $coa ): 
                                if ($coa->id_type == '1') {
                                    $flag_pendapatan_rra = 12;
                                    continue;
                                }

                                if ($dumy_coa != $coa->no_coa) { ?>
                                <option value="<?php echo $coa->no_coa; ?>">
                                    <?php echo $coa->no_coa." | ".$coa->name_type; ?>
                                </option>
                                <?php $dumy_coa = $coa->no_coa; } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group row">
                        <label class="col-lg-4 col-form-label">Saldo COA sekarang</label>
                        <div class="col-lg-8">
                            <?php if (count($coas) > 0) { ?>
                            <input type="text" class="form-control validate_char" id="add_rra_saldo" disabled
                                value="<?php echo "Rp. " . number_format( $coas[$flag_pendapatan_rra + $bln_today]->saldo_coa, 0, ',', '.') . " ,-";?>" />
                            <?php } else { ?>
                            <input type="text" class="form-control validate_char" id="add_rra_saldo" disabled />
                            <?php }  ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group row">
                        <label class="col-lg-3 col-form-label">Bulan Ke</label>
                        <div class="col-lg-9">
                            <select id="add_coa_bln_rra" name="add_rra_bln" class="form-control" data-plugin="select2"
                                data-live-search="true" onchange="changeSaldo_tabel('_rra')" required>
                                <?php for ($i=$bln_today+1; $i <= 12; $i++) { ?>
                                <option value="<?php echo $i; ?>">
                                    <?php echo "Month ".$i; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group row">
                        <label class="col-lg-4 col-form-label">Jumlah</label>
                        <div class="col-lg-8">
                            <input type="number" min="1" class="form-control validate_char" id="add_rra_jumlah"
                                name="add_rra_jumlah" placeHolder="type total you want" required />
                        </div>
                    </div>
                </div>
                <hr />
                <div class="alert dark alert-icon alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon wb-info" aria-hidden="true"></i>INFO: &nbsp;&nbsp; Pilih COA dan bulan tentukan
                    jumlah yang dibutuhkan untuk memenuhi nilai item RAB.
                </div>
                <div id="alert-rra" style="display:none" class="alert dark alert-icon alert-danger alert-dismissible"
                    role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon wb-info" aria-hidden="true"></i>Alert: &nbsp;&nbsp; Lengkapi Semua Field. Jumlah
                    tidak boleh lebih besar dari saldo COA.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onClick="return tambah_rra()" class="btn btn-primary">Tambahkan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
function show_rra() {
    $('#wizard-coa').hide();
    $("#alert-rra").hide();
    document.getElementById("add_rra_jumlah").value = "";
}

function tambah_rra() {
    let rra_keterangan = document.getElementById("add_rra_ket_modal").value;
    let rra_name_coa = $("#add_coa_nmr_rra").find('option:selected').html().trim();
    let rra_value_coa = $("#add_coa_nmr_rra").find('option:selected').attr("value");
    let rra_name_bulan = $("#add_coa_bln_rra").find('option:selected').html().trim();
    let rra_value_bulan = document.getElementById("add_coa_bln_rra").value;
    let rra_jumlah = document.getElementById("add_rra_jumlah").value;
    let rra_saldo = document.getElementById("add_rra_saldo").value;
    document.getElementById("add_rra_ket").value = rra_keterangan;
    if (rra_keterangan == "" || rra_jumlah == "" || rra_jumlah == "0") {
        $("#alert-rra").show();
        return;
    }
    let replace = rra_saldo.replace(/\D/g, '');
    console.log("rra_jumlah: " + rra_jumlah);
    console.log("replace: " + replace);
    if (parseInt(rra_jumlah) > parseInt(replace)) {
        $("#alert-rra").show();
        return;
    }
    // console.log("rra_keterangan: " + rra_keterangan);
    // console.log("rra_name_coa: " + rra_name_coa);
    // console.log("rra_value_coa: " + rra_value_coa);
    // console.log("rra_name_bulan: " + rra_name_bulan);
    // console.log("rra_value_bulan: " + rra_value_bulan);
    // console.log("rra_jumlah: " + rra_jumlah);
    // console.log("rra_saldo: " + rra_saldo);
    let count = JSON.parse(localStorage.getItem('form-dinamis-coa'));
    let id = 0;
    let idx = id + 1;
    if (count.length != 0) {
        id = count[count.length - 1] + 1;
        idx = id + 1;
    }
    //BUAT SELECT NYA COAS
    let dt_select = "<option selected value='" + rra_value_coa + "'>" + rra_name_coa + "</option>";
    let bln_select = "<option selected value='" + rra_value_bulan + "'>" + rra_name_bulan + "</option>";
    let tr = $("<tr id='add_tb_tr_coa" + id + "'></tr>");
    let td1 = "<td>" + idx +
        "<input hidden type='text' class='form-control' name='add_coa_id[]' value='0' required /></td>";
    let td2 = "<td><select id='add_coa_nmr" + id +
        "' name='add_coa_nmr[]' class='form-control selectpicker selectrra' data-plugin='selectpicker' data-live-search='true' onchange='changeSaldo_tabel(" +
        id + ")' required>" + dt_select + "</select></td>";
    let td3 = "<td><select id='add_coa_bln" + id +
        "' name='add_coa_bln[]' class='form-control selectpicker selectrra' data-plugin='selectpicker' data-live-search='true' onchange='changeSaldo_tabel(" +
        id + ")' required>" + bln_select + "</select></td>";
    let td4 =
        "<td><input disabled type='text' class='form-control' name='add_coa_harga[]' id='add_coa_harga" +
        id + "' value='" + rra_saldo + "' /></td>";
    let td5 = "<td><input type='number' min='0' class='form-control' name='add_saldo[]' id='add_saldo" +
        id + "' required value='" + rra_jumlah + "' readOnly /></td>";
    let td6 =
        "<td><span class='badge badge-success'><i class='icon wb-check' aria-hidden='true'></i></span></td>";
    let td7 = "<td><button type='button' onClick='return remove_coaDinamis(" + id +
        ")'  class='btn btn-pure btn-default icon wb-trash p-0'></button></td></td>";

    tr = tr.append(td1, td2, td3, td4, td5, td6, td7);
    $("#add_tb_body_coa").append(tr);
    count.push(id);
    localStorage.setItem('form-dinamis-coa', JSON.stringify(count));
    $('.selectpicker').select2({
        width: '100%'
    });
    $('#showRRA').modal('hide');
    $('#btn_rra').hide();

}

function disableButton() {
    $('.custom_datepicker').attr("disabled", false);
    $('.custom_timepicker').attr("disabled", false);
    $('.custom_select').attr("disabled", false)
    var btn = document.getElementById('btn_add_submit');
    var btn_rel = document.getElementById('btn_relation_submit');
    btn.disabled = true;
    btn.innerText = 'Posting...';
    btn_rel.disabled = true;
    btn_rel.innerText = 'Posting...';
}

function select_id_project(e) {
    $("#add_coa_nmr0").find("option").remove();
    $("#add_coa_nmr_rra").find("option").remove();

    //GET COAS DARI ID PROJECT
    coas = $.ajax({
        data: {
            id_project: e.target.value
        },
        type: "POST",
        url: "<?php echo site_url('rab/getCoasAPI');?>",
        success: function(msg) {
            let month = new Date();
            // console.log("month: " + month.getMonth());
            // console.log("[coas]: " + msg);
            let dataC = JSON.parse(msg);
            let dumy_coa = "";

            let flag_pendapatan = 0;
            for (let i = 0; i < dataC.length; i++) {
                const element = dataC[i];
                if (element.id_type == '1') {
                    flag_pendapatan = 12;
                    continue;
                }
                let no_coa = element.no_coa;
                let name = element.no_coa + " | " + element.name_type;
                if (dumy_coa != no_coa) {
                    $('#add_coa_nmr0').append("<option value='" + no_coa + "'>" + name + "</option>");
                    $('#add_coa_nmr_rra').append("<option value='" + no_coa + "'>" + name + "</option>");
                    dumy_coa = no_coa;
                }
            }
            $('#add_coa_nmr0').selectpicker('refresh');
            $('#add_coa_nmr_rra').selectpicker('refresh');
            document.getElementById("add_coa_harga0").value = convertToRupiah(dataC[flag_pendapatan + (month
                    .getMonth())]
                .saldo_coa);
            document.getElementById("add_rra_saldo").value = convertToRupiah(dataC[flag_pendapatan + month
                    .getMonth() + 1]
                .saldo_coa);
        }
    });
}

function changeSaldo_tabel(element) {
    let nomor = document.getElementById("add_coa_nmr" + element).value;
    let bulan = document.getElementById("add_coa_bln" + element).value;
    console.log("element-> " + element);
    console.log("nomor-> " + nomor);
    console.log("bulan-> " + bulan);
    filter = $.ajax({
        data: {
            nomor: nomor,
            bulan: bulan
        },
        type: "POST",
        url: "<?php echo site_url('rab/filterByNmrBulan');?>",
        success: function(msg) {
            let dataC = JSON.parse(msg);
            $('#add_coa_harga' + element).val(convertToRupiah(dataC[0].saldo_coa));
            $('#add_rra_saldo').val(convertToRupiah(dataC[0].saldo_coa));
            otomatis_isi_value(element, element);
        }
    });
}

function custom_create_confirm(con) {
    let value = parseInt(localStorage.getItem('create-wizard-rab')); //kalo udah sampe angka 2 (paling terakhir);
    if (value == 3) {
        var x = confirm("Yakin untuk melanjutkan ?.");
        if (x) {
            localStorage.clear();
            return true;
        } else {
            return false;
        }

    } else {
        return true;
    }
}

function remove_itemDinamis(id) {
    let confirm = delX_confirm();
    if (confirm) {
        let form = "#add_tb_tr_item" + id;
        $(form).remove();
        let count = JSON.parse(localStorage.getItem('form-dinamis-item'));
        let newCt = [];
        for (let index = 0; index < count.length; index++) {
            const element = count[index];
            if (element != id) {
                newCt.push(element);
            }
        }
        localStorage.setItem('form-dinamis-item', JSON.stringify(newCt));
    };
}

function remove_coaDinamis(id) {
    let confirm = delX_confirm();
    if (confirm) {
        let form = "#add_tb_tr_coa" + id;
        $(form).remove();
        let count = JSON.parse(localStorage.getItem('form-dinamis-coa'));
        let newCt = [];
        for (let index = 0; index < count.length; index++) {
            const element = count[index];
            if (element != id) {
                newCt.push(element);
            }
        }
        localStorage.setItem('form-dinamis-coa', JSON.stringify(newCt));
    };
}

function set_confirm_lb() {
    let ipr = document.getElementById("add_id_project").value;
    let ipg = document.getElementById("add_id_pic").value;
    let sasaran = document.getElementById("add_sasaran").value;
    let fasilitas = document.getElementById("add_fasilitas").value;
    let catatan = document.getElementById("add_catatan").value;

    // project = $.ajax({
    //     data: {
    //         ipr: ipr
    //     },
    //     type: "POST",
    //     url: "<?php echo site_url('rab/getProjectByID');?>",
    //     async: false
    // }).responseText;
    // let dtPro = JSON.parse(project);
    // pegawai = $.ajax({
    //     data: {
    //         ipg: ipg
    //     },
    //     type: "POST",
    //     url: "<?php echo site_url('rab/getPegawaiByID');?>",
    //     async: false
    // }).responseText;
    // let dtPeg = JSON.parse(pegawai);
    // $("#c_project").text(': ' + dtPro[0].project.nama_project);
    // $("#c_divisi").text(': ' + dtPro[0].project.nama_divisi);
    // $("#c_subdiv").text(': ' + dtPro[0].project.nama_subdiv);
    // $("#c_pic").text(': ' + dtPeg[0].full_name);
    // $("#c_pic_div").text(': ' + dtPeg[0].nmdivisi + " | " + dtPeg[0].nmsubdiv);
    $("#c_sasaran").text(sasaran);
    $("#c_fasilitas").text(fasilitas);
    $("#c_catatan").text(catatan);

    let countItem = JSON.parse(localStorage.getItem('form-dinamis-item'));
    let total_item = 0;
    $("#c_table_item").find("tr").remove();
    for (let i = 0; i < countItem.length; i++) {
        const element = countItem[i];
        let ids = i + 1;
        let kegiatan = document.getElementById("add_kegiatan" + element).value;
        let jumlah = document.getElementById("add_jumlah" + element).value;
        let harga = document.getElementById("add_harga" + element).value;
        let hrg = convertToRupiah(harga);
        let total = convertToRupiah(jumlah * harga);
        total_item += jumlah * harga;
        $('#c_table_item').append(
            "<tr><td class='text-center'>" + ids + "</td><td class='text-center'>" + kegiatan +
            "</td><td class ='text-center'>" + jumlah + "</td><td>" + hrg +
            "</td><td>" + total + "</td></tr>");
    }

    let countCoa = JSON.parse(localStorage.getItem('form-dinamis-coa'));
    let total_Coa = 0;
    $("#c_table_coa").find("tr").remove();
    let idx = 1;
    for (let a = 0; a < countCoa.length; a++) {
        const element = countCoa[a];

        if (document.getElementById("add_saldo" + element).value == 0) {
            continue;
        }

        let nmr_sec = $("#add_coa_nmr" + element + " option:selected").html().trim();
        let bulan = document.getElementById("add_coa_bln" + element).value;
        let add_saldo = document.getElementById("add_saldo" + element).value;
        total_Coa += parseInt(add_saldo);
        let split_sec = nmr_sec.split('|');
        // console.log("selected: " + nmr_sec);
        // console.log("bulan: " + bulan);
        // console.log("add_saldo0: " + add_saldo0);
        // console.log("split: " + split_sec);
        $('#c_table_coa').append(
            "<tr><td class='text-center'>" + idx +
            "</td><td class='text-center'>" + split_sec[0] +
            "</td><td class='text-center'>" + split_sec[1] +
            "</td><td class='text-center'>" + bulan + "</td><td>" + convertToRupiah(add_saldo) + "</td></tr>"
        );
        idx++;
    }
    // console.log("total_item: " + total_item);
    // console.log("total_Coa: " + total_Coa);
    $("#c_total_item").text(convertToRupiah(total_item));
    $("#c_total_coa").text(convertToRupiah(total_Coa));
    $("#c_total_sisa").text(convertToRupiah(total_item - total_Coa));


    if (total_Coa != total_item) {
        $("#alert-confirm").show();
        $("#btn_add_submit").hide();
        $("#btn_add_next").hide();
        $("#btn_rra").show();
        $("#btn_add_rra").show()
    }
}

function pengajuan_rra() {
    back();
    $('#wizard-coa').hide();
    $("#alert-rra").hide();
    // document.getElementById("add_rra_jumlah").value = "";
    otomatis_isi_value('_rra', '_rra');
    $('#showRRA').modal('show');
    $('#btn_rra').hide();
}

function next() {
    let value = parseInt(localStorage.getItem('create-wizard-rab'));
    console.log("flag wizard next: " + value);
    if (value == 0) {
        let id_project = document.getElementById("add_id_project").value;
        let id_pic = document.getElementById("add_id_pic").value;
        let sasaran = document.getElementById("add_sasaran").value;
        let fasilitas = document.getElementById("add_fasilitas").value;
        let catatan = document.getElementById("add_catatan").value;
        // let file = document.getElementById("add_file").value;
        let file = "dumy"
        // console.log("file: " + file);
        // console.log("id_project: " + id_project);
        // console.log("id_pic: " + id_pic);

        if (id_project == "" || id_pic == "" || sasaran == "" ||
            fasilitas == "" || catatan == "" || file == "") {

            $("#alert-add-rab").show();
            $("#pearl-project").attr('class', 'pearl current col-3 active error');
            $("#wizard-project").show();
            $("#wizard-item").hide();
            $("#wizard-coa").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline disabled');
            $("#btn_add_submit").click();

        } else {
            localStorage.setItem('create-wizard-rab', value + 1);
            $("#alert-add-rab").hide();
            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-item").attr('class', 'pearl current col-3');
            $("#wizard-project").hide();
            $("#wizard-item").show();
            $("#wizard-coa").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline');
        }

    } else if (value == 1) {
        let count = JSON.parse(localStorage.getItem('form-dinamis-item'));
        let fg = false;
        for (let i = 0; i < count.length; i++) {
            const element = count[i];
            if (document.getElementById("add_kegiatan" + element).value == "") {
                $("#alert-add-rab").show();
                $("#btn_add_submit").click();
                break;
            } else if (document.getElementById("add_jumlah" + element).value == "") {
                $("#alert-add-rab").show();
                $("#btn_add_submit").click();
                break;
            } else if (document.getElementById("add_harga" + element).value == "") {
                $("#alert-add-rab").show();
                $("#btn_add_submit").click();
                break;
            }
            // else if (document.getElementById("add_keterangan" + element).value == "") {
            //     $("#alert-add-rab").show();
            //     $("#btn_add_submit").click();
            //     break;
            // } 
            else if (i == count.length - 1) {
                fg = true;
            }
        }
        if (fg) {
            localStorage.setItem('create-wizard-rab', value + 1);
            $("#alert-add-rab").hide();
            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-item").attr('class', 'pearl current col-3');
            $("#pearl-coa").attr('class', 'pearl current col-3');
            $("#wizard-project").hide();
            $("#wizard-item").hide();
            $("#wizard-coa").show();

            let count = JSON.parse(localStorage.getItem('form-dinamis-item'));
            let total = 0;
            for (let i = 0; i < count.length; i++) {
                const element = count[i];
                let jumlah = document.getElementById("add_jumlah" + element).value;
                let harga = document.getElementById("add_harga" + element).value;
                total += jumlah * harga;
            }
            $("#label_total_item").text(convertToRupiah(total));

            //DISINI PANGGIL FUNCTION BUAT OTOMATIS VALUE KE ISI.
            otomatis_isi_value('0', '0');
        }

    } else if (value == 2) {
        let count = JSON.parse(localStorage.getItem('form-dinamis-coa'));
        let jumlah_coa = 0;
        // console.log("count: " + count);
        let fg = false;
        for (let i = 0; i < count.length; i++) {
            const element = count[i];
            let dmy_n = document.getElementById("add_coa_harga" + element).value;
            let rep_s = dmy_n.replace(/\D/g, '');
            if (document.getElementById("add_coa_nmr" + element).value == "") {
                $("#alert-add-rab").show();
                $("#btn_add_submit").click();
                break;
            } else if (document.getElementById("add_coa_bln" + element).value == "") {
                $("#alert-add-rab").show();
                $("#btn_add_submit").click();
                break;
            } else if (document.getElementById("add_saldo" + element).value == "" || document.getElementById(
                    "add_saldo" + element).value == null) {
                $("#alert-add-rab").show();
                $("#btn_add_submit").click();
                break;
            } else if (parseInt(document.getElementById("add_saldo" + element).value) > parseInt(rep_s)) {
                $("#alert-confirm").show();
                break;
            } else if (i == count.length - 1) {
                fg = true;
            }
            jumlah_coa += parseInt(document.getElementById("add_saldo" + element).value);
        }
        // if (fg || count.length == 0) {
        console.log("JUMLAH NILAI COA : " + jumlah_coa);
        let countItem = JSON.parse(localStorage.getItem('form-dinamis-item'));
        let total_item = 0;
        for (let i = 0; i < countItem.length; i++) {
            const element = countItem[i];
            let ids = i + 1;
            let jumlah = document.getElementById("add_jumlah" + element).value;
            let harga = document.getElementById("add_harga" + element).value;
            total_item += jumlah * harga;
        }
        console.log("JUMLAH NILAI ITEM : " + total_item);
        // if (jumlah_coa != total_item) {
        //     $("#alert-confirm").show();
        //     return;
        // }
        // console.log("MASUK KE FORM CONFIRM");
        localStorage.setItem('create-wizard-rab', value + 1);
        $("#alert-add-rab").hide();
        $("#alert-confirm").hide();
        $("#pearl-project").attr('class', 'pearl current col-3');
        $("#pearl-item").attr('class', 'pearl current col-3');
        $("#pearl-coa").attr('class', 'pearl current col-3');
        $("#pearl-confirm").attr('class', 'pearl current col-3');
        $("#wizard-project").hide();
        $("#wizard-item").hide();
        $("#wizard-coa").hide();
        $("#wizard-confirm").show();
        $("#btn_add_submit").show();
        $("#btn_add_next").hide();
        $("#btn_rra").hide();
        $("#btn_add_rra").hide();
        set_confirm_lb();
        // }
    } else {
        console.log("tinggal di submit");
    }
}

function otomatis_isi_value(id_total, id_harga) {
    //CARI SALDO TOTAL ITEM
    let count = JSON.parse(localStorage.getItem('form-dinamis-item'));
    let total = 0;
    for (let i = 0; i < count.length; i++) {
        const element = count[i];
        let jumlah = document.getElementById("add_jumlah" + element).value;
        let harga = document.getElementById("add_harga" + element).value;
        total += jumlah * harga;
    }
    //CARI SALDO TOTAL COA YG DIGUNAKAN
    let count_c = JSON.parse(localStorage.getItem('form-dinamis-coa'));
    let jumlah_coa = 0;

    for (let i = 0; i < count_c.length; i++) {
        const element_c = count_c[i];
        if (element_c == id_total) {
            continue;
        }
        console.log("elemeent: " + element_c);
        if (document.getElementById("add_saldo" + element_c).value != null) {
            jumlah_coa += parseInt(document.getElementById("add_saldo" + element_c).value);
            console.log("jumlah coa: " + jumlah_coa);
        }
    }

    //CEK UNTUK UBAH ID biasa / rra
    let tot = "";
    if (id_total == '_rra') {
        tot = document.getElementById("add_rra_saldo").value;
    } else {
        tot = document.getElementById("add_coa_harga" + id_total).value;
    }
    console.log("total item: " + total);
    console.log("total saldo: " + jumlah_coa);

    if (tot != null) {
        let jml = tot.replace(/\D+/g, '');
        console.log("jml saldo coa: " + jml);
        let selisih = total - jumlah_coa;
        console.log("selisih coa: " + selisih);
        if (parseInt(jml) > selisih) {
            if (id_harga == '_rra') {
                document.getElementById("add_rra_jumlah").value = selisih;
            } else {
                document.getElementById("add_saldo" + id_harga).value = selisih;
            }
        } else {
            if (id_harga == '_rra') {
                document.getElementById("add_rra_jumlah").value = jml;
            } else {
                document.getElementById("add_saldo" + id_harga).value = jml;
            }
        }
    }
}

function back() {
    let value = parseInt(localStorage.getItem('create-wizard-rab'));
    if (value > 0) {
        value = value - 1;
        // console.log("flag wizard back: " + value);
        localStorage.setItem('create-wizard-rab', value);
        if (value == 0) { //form project
            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-item").attr('class', 'pearl col-3');
            $("#pearl-coa").attr('class', 'pearl col-3');
            $("#pearl-confirm").attr('class', 'pearl col-3');
            $("#wizard-project").show();
            $("#wizard-coa").hide();
            $("#wizard-item").hide();
            $("#wizard-confirm").hide();
            $("#btn_add_next").show();
            $("#btn_add_submit").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline disabled');
            $("#alert-add-rab").hide();

        } else if (value == 1) { //form item
            //dihapus kembali COA list kecuali ID yg ke-1
            // let count = JSON.parse(localStorage.getItem('form-dinamis-coa'));
            // let newCt = [];
            // for (let index = 0; index < count.length; index++) {
            //     const element = count[index];
            //     if (index == 0) {
            //         newCt.push(element);
            //     } else {
            //         let form = "#add_tb_tr_coa" + element;
            //         $(form).remove();
            //     }
            // }
            // localStorage.setItem('form-dinamis-coa', JSON.stringify(newCt));

            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-item").attr('class', 'pearl current col-3');
            $("#pearl-coa").attr('class', 'pearl col-3');
            $("#pearl-confirm").attr('class', 'pearl col-3');
            $("#wizard-project").hide();
            $("#wizard-item").show();
            $("#wizard-coa").hide();
            $("#btn_add_next").show();
            $("#btn_add_submit").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline');
            $("#alert-add-rab").hide();

        } else if (value == 2) { //form coa
            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-item").attr('class', 'pearl current col-3');
            $("#pearl-coa").attr('class', 'pearl current col-3');
            $("#pearl-confirm").attr('class', 'pearl col-3');
            $("#wizard-project").hide();
            $("#wizard-item").hide();
            $("#wizard-coa").show();
            $("#wizard-confirm").hide();
            $("#btn_add_next").show();
            $("#btn_add_submit").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline');
            $("#alert-add-rab").hide();
            $("#btn_rra").hide();

        } else {
            console.log("tidak ada");
        }
    }
}

function convertToRupiah(angka) {
    var res = angka.toString().replace(".", ",");
    split = res.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

    if (ribuan) {
        separator = sisa ? ',' : '';
        rupiah += separator + ribuan.join(',');
    }
    rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
    return "Rp. " + rupiah;
}

$(document).ready(function() {
    // console.log("DOCUMENT READY FUNCTION");
    localStorage.setItem('create-wizard-rab', 0);
    // console.log("flag document ready: ");

    var add_buttonItem = $('#add_itemDinamis');
    var add_buttonCoa = $('#add_coaDinamis');
    var arr_item = <?php echo json_encode($arr_item); ?> ;
    var arr_payment = <?php echo json_encode($arr_payment); ?> ;
    localStorage.setItem('form-dinamis-item', JSON.stringify(arr_item));
    localStorage.setItem('form-dinamis-coa', JSON.stringify(arr_payment));

    $(add_buttonItem).click(function() {
        //Check maximum number of input fields
        let count = JSON.parse(localStorage.getItem('form-dinamis-item'));
        let id = count[count.length - 1] + 1;
        let idx = id + 1;
        $("#add_tb_body_item").append(
            "<tr id='add_tb_tr_item" + id + "'><td>" + idx +
            "<input hidden type='text' class='form-control' name='add_item_id[]' value='0' required /></td>" +
            "<td><textarea class='form-control' name='add_kegiatan[]' id='add_kegiatan" +
            id +
            "' placeholder='type your activity' required></textarea></td>" +
            "<td><input type='number' min='1' class='form-control' name='add_jumlah[]' id='add_jumlah" +
            id + "' required placeholder='type your count item' /></td>" +
            "<td><input type='number' min='1' class='form-control' name='add_harga[]' id='add_harga" +
            id +
            "' required placeholder='type your price item' /></td>" +
            "<td><textarea class='form-control' name='add_keterangan[]' id='add_keterangan" +
            id +
            "' placeholder='type your note'></textarea></td>" +
            "<td><button type='button' onClick='return remove_itemDinamis(" +
            id +
            ")'  class='btn btn-pure btn-default icon wb-trash p-0'></button></td></tr>"
        );
        count.push(id);
        localStorage.setItem('form-dinamis-item', JSON.stringify(count));
    });


    $(add_buttonCoa).click(function() {
        //Check maximum number of input fields
        let count = JSON.parse(localStorage.getItem('form-dinamis-coa'));
        let id = 0;
        let idx = id + 1;

        if (count.length != 0) {
            id = count[count.length - 1] + 1;
            idx = id + 1;
        }

        //BUAT SELECT NYA COAS
        let dt_select = "";
        let bln_select = "";
        filter = $.ajax({
            type: "GET",
            url: "<?php echo site_url('rab/getCoas');?>", //api ini udah ke filter setiap coa
            async: false
        }).responseText;
        let dataC = JSON.parse(filter);
        let tdy = new Date();
        let i = tdy.getMonth() + 1;

        let flag_pendapatan = 0;
        for (let i = 0; i < dataC.length; i++) {
            if (dataC[i].id_type == '1') {
                flag_pendapatan = 1;
                continue;
            }
            let nomor = dataC[i].no_coa;
            let type = dataC[i].no_coa + " | " + dataC[i].name_type;
            dt_select += "<option value='" + nomor + "'>" + type + "</option>";
        }
        saldoCoa = $.ajax({
            data: {
                nomor: dataC[flag_pendapatan].no_coa,
                bulan: i
            },
            type: "POST",
            url: "<?php echo site_url('rab/filterByNmrBulan');?>",
            async: false
        }).responseText;
        let dataS = JSON.parse(saldoCoa);
        let saldoAwal = convertToRupiah(dataS[0].saldo_coa);
        //BUAT SELECT NYA MONTH
        // for (let i = 1; i <= 12; i++) {
        bln_select += "<option value='" + i + "'>Month " + i + "</option>";
        // }

        let tr = $("<tr id='add_tb_tr_coa" + id + "'></tr>");
        let td1 = "<td>" + idx +
            "<input hidden type='text' class='form-control' name='add_coa_id[]' value='0' required /></td>";
        let td2 = "<td><select id='add_coa_nmr" + id +
            "' name='add_coa_nmr[]' class='form-control selectpicker' data-plugin='selectpicker' data-live-search='true' onchange='changeSaldo_tabel(" +
            id + ")' required>" + dt_select + "</select></td>";
        let td3 = "<td><select id='add_coa_bln" + id +
            "' name='add_coa_bln[]' class='form-control selectpicker' data-plugin='selectpicker' data-live-search='true' onchange='changeSaldo_tabel(" +
            id + ")' required>" + bln_select + "</select></td>";
        let td4 =
            "<td><input disabled type='text' class='form-control' name='add_coa_harga[]' id='add_coa_harga" +
            id + "' value='" + saldoAwal + "' /></td>";
        let td5 =
            "<td><input type='number' min='0' class='form-control' name='add_saldo[]' id='add_saldo" +
            id + "' required placeholder='type your value needed' value='0'/></td>";
        let td6 =
            "<td><span class='badge badge-danger'><i class='icon wb-close' aria-hidden='true'></i></span></td>";
        let td7 = "<td><button type='button' onClick='return remove_coaDinamis(" + id +
            ")'  class='btn btn-pure btn-default icon wb-trash p-0'></button></td></td>";

        tr = tr.append(td1, td2, td3, td4, td5, td6, td7);
        $("#add_tb_body_coa").append(tr);
        count.push(id);
        localStorage.setItem('form-dinamis-coa', JSON.stringify(count));
        $('.selectpicker').select2({
            width: '100%'
        });
        otomatis_isi_value(id, id);
    });

    $('#showRRA').on('hide.bs.modal', function(e) {
        $('#wizard-coa').show();
        $("#alert-confirm").hide();
    });

});
</script>