    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">History Justification</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item active">Justification</li>
                <li class="breadcrumb-item active">History Justification</li>
            </ol>
            <div class="page-header-actions">
                <label class="form-label"><b>Last Update <?php echo date("d M Y H:i:s"); ?></b></label>
            </div>
        </div>

        <div class="page-content">
            <div class="col-xxl-3">
                <div class="row h-full" data-plugin="matchHeight">
                    <div class="col-xxl-12 col-lg-3 col-sm-4">
                        <!-- Card -->
                        <div class="card card-block p-30 bg-blue-600">
                            <div class="card-watermark darker font-size-60 m-15"><i class="icon wb-time"
                                    aria-hidden="true"></i></div>
                            <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-group">
                                    <span class="counter-number"><?php echo $proses; ?></span>
                                    <span class="counter-number-related text-capitalize">Submission</span>
                                </div>
                                <div class="counter-label text-capitalize">on Process</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <div class="col-xxl-12 col-lg-3 col-sm-4">
                        <!-- Card -->
                        <div class="card card-block p-30 bg-yellow-600">
                            <div class="card-watermark darker font-size-60 m-15"><i class="icon fa-user"
                                    aria-hidden="true"></i></div>
                            <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-group">
                                    <span class="counter-number"><?php echo $vp; ?></span>
                                    <span class="counter-number-related text-capitalize">Submission</span>
                                </div>
                                <div class="counter-label text-capitalize">Waiting Approval Vice President</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <div class="col-xxl-12 col-lg-3 col-sm-4">
                        <!-- Card -->
                        <div class="card card-block p-30 bg-green-600">
                            <div class="card-watermark darker font-size-60 m-15"><i class="icon fa-user"
                                    aria-hidden="true"></i></div>
                            <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-group">
                                    <span class="counter-number"><?php echo $bod; ?></span>
                                    <span class="counter-number-related text-capitalize">Submission</span>
                                </div>
                                <div class="counter-label text-capitalize">Waiting Approval BoD</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <div class="col-xxl-12 col-lg-3 col-sm-4">
                        <!-- Card  -->
                        <div class="card card-block p-30 bg-purple-600">
                            <div class="card-watermark lighter font-size-60 m-15"><i class="icon fa-credit-card"
                                    aria-hidden="true"></i></div>
                            <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-wrap font-size-30">
                                    <span class="counter-number"><?php echo $finance; ?></span>
                                    <span class="counter-number-related text-capitalize">Submission</span>
                                </div>
                                <div class="counter-label text-capitalize">Finish in Finance</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
            </div>
            <div class="alert dark alert-icon alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon wb-info" aria-hidden="true"></i>INFO: &nbsp;&nbsp; Pilih start date dan end date untuk
                melakukan pencarian History Justification.
            </div>
            <?php if (count($justifikasi_history) > 0 && $msg == "") { ?>
            <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon wb-bell" aria-hidden="true"></i>List pengajuan Justification untuk bulan ini terdapat
                <?php echo count($justifikasi_history); ?> data
            </div>
            <?php }?>
            <?php if ($msg != "") { ?>
            <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon wb-bell" aria-hidden="true"></i>List pengajuan Justification untuk <?php echo $msg; ?>
            </div>
            <?php }?>
            <?php if (count($justifikasi_history) == 0) { ?>
            <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon wb-bell" aria-hidden="true"></i> Tidak ada data pengajuan Justification
            </div>
            <?php } ?>

            <div class="panel panel-primary panel-line is-collapse">
                <div class="panel-heading">
                    <h3 class="panel-title">Searching</h3>
                    <div class="panel-actions">
                        <a class="panel-action icon wb-plus" data-toggle="panel-collapse" aria-expanded="true"
                            aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form data-parsley-validate class="form-group" method="get" enctype="multipart/form-data"
                        action="<?php echo site_url(). "/justification/history" ?>">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Start Date : </label>
                            <div class="col-md-4">
                                <input type="text" class="custom_datepicker form-control" placeholder="Select a date"
                                    id="std" name="std" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">End Date : </label>
                            <div class="col-md-4">
                                <input type="text" class="custom_datepicker form-control" placeholder="Select a date"
                                    id="etd" name="etd" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn_add_submit" class="btn btn-primary">Filter</button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="panel panel-bordered panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>

                    <div class="panel-actions">
                        <!-- <div class="dropdown">
                            <a class="panel-action" data-toggle="dropdown" href="#" aria-expanded="false"><i
                                    class="icon wb-settings" aria-hidden="true"></i></a>
                            <div class="dropdown-menu dropdown-menu-bullet" role="menu">
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i
                                        class="icon wb-download" aria-hidden="true"></i> Download</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i
                                        class="icon wb-print" aria-hidden="true"></i> Print</a>
                            </div>
                        </div> -->
                        <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true"
                            aria-hidden="true"></a>
                        <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped table-responsive" data-plugin="dataTable">
                        <thead>
                            <tr>
                                <th style='width:5%'>#</th>
                                <th style='width:10%'>Nomor Justifikasi</th>
                                <th style='width:15%'>Project</th>
                                <th style='width:15%'>Requester</th>
                                <th style='width:10%'>Status</th>
                                <th style='width:15%'>Dibuat Tanggal</th>
                                <!-- <th style='width:15%'>Keterangan</th> -->
                                <th style='width:10%'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($justifikasi_history as $key => $dt) :
                                $irb = base64_encode($dt->id_justifikasi); 
                            ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $dt->nomor_justifikasi; ?></td>
                                <td><?php 
                                if ($dt->id_project != 0) {
                                    echo $dt->project->nama_project;
                                } else {
                                    echo "No Project";
                                }?></td>
                                <td><?php echo $dt->diminta_pegawai->full_name; ?></td>
                                <td>
                                    <?php 
                                    if ($dt->status == '43' || $dt->status == '45' || $dt->status == '49') { ?>
                                    <span class='badge badge-danger'
                                        data-content="<?php echo $dt->status_jus->description; ?>" data-trigger="hover"
                                        data-toggle="popover" tabindex="0"
                                        title="Keterangan"><?php echo $dt->status_jus->status; ?></span>
                                    <?php   } elseif ($dt->status == '46') { ?>
                                    <span class='badge badge-success'
                                        data-content="<?php echo $dt->status_jus->description; ?>" data-trigger="hover"
                                        data-toggle="popover" tabindex="0"
                                        title="Keterangan"><?php echo $dt->status_jus->status ?></span>
                                    <?php   } elseif ($dt->status == '47' || $dt->status == '48') { ?>
                                    <span class='badge badge-info'
                                        data-content="<?php echo $dt->status_jus->description; ?>" data-trigger="hover"
                                        data-toggle="popover" tabindex="0"
                                        title="Keterangan"><?php echo $dt->status_jus->status ?></span>
                                    <?php   } else { ?>
                                    <span class='badge badge-warning'
                                        data-content="<?php echo $dt->status_jus->description; ?>" data-trigger="hover"
                                        data-toggle="popover" tabindex="0"
                                        title="Keterangan"><?php echo $dt->status_jus->status ?></span>
                                    <?php  } ?>
                                </td>
                                <td><?php echo date("d M Y H:i:s",strtotime($dt->dibuat_tgl)); ?></td>
                                <!-- <td><?php echo $dt->status_jus->description; ?></td> -->
                                <td class="actions">
                                    <!-- BUTTON VIEW PROJECT -->
                                    <a href="<?php echo site_url("justification/view?irb=".$irb); ?>"
                                        class="btn btn-info btn-xs"><i class="icon wb-search"></i>
                                        View </a>

                                    <!-- <a href="<?php echo site_url("justification/document_justification?irb=".$irb); ?>"
                                        class="btn btn-success btn-xs"><i class="icon wb-file"></i>
                                        File </a> -->

                                    <?php if (($dt->status == '40' || $dt->status == '42') && ($dt->dibuat_oleh == $idu || $role == '41' || ($this->session->userdata('level') == 4 && $dt->diminta_oleh == $idu))) { ?>
                                    <!-- <a href="<?php echo site_url("justification/update?irb=".$irb); ?>"
                                        class="btn btn-warning btn-xs"><i class="icon wb-edit"></i>
                                        Update </a> -->
                                    <!-- <a href="#" class="btn btn-warning btn-xs"><i class="icon wb-edit"></i>
                                        Update </a> -->
                                    <?php } ?>

                                    <?php if (($dt->status == '40' || $dt->status == '42') && ($idu == "21" || $role == "1")) { ?>
                                    <!-- <a href="<?php echo site_url("justification/update?irb=".$irb); ?>"
                                        class="btn btn-warning btn-xs"><i class="icon wb-edit"></i>
                                        Update</a> -->
                                    <?php }?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page -->

    <script type="text/javascript">
    </script>