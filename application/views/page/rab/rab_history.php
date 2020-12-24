    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">History RAB</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item active">RAB</li>
                <li class="breadcrumb-item active">History RAB</li>
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
                melakukan pencarian History RAB.
            </div>
            <?php if (count($rab_history) > 0 && $msg == "") { ?>
            <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon wb-bell" aria-hidden="true"></i>List pengajuan RAB untuk bulan ini terdapat
                <?php echo count($rab_history); ?> data
            </div>
            <?php }?>
            <?php if ($msg != "") { ?>
            <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon wb-bell" aria-hidden="true"></i>List pengajuan RAB untuk <?php echo $msg; ?>
            </div>
            <?php }?>
            <?php if (count($rab_history) == 0) { ?>
            <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon wb-bell" aria-hidden="true"></i> Tidak ada data pengajuan RAB
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
                        action="<?php echo site_url(). "/rab/history" ?>">
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
                                <th style='width:10%'>Nomor RAB</th>
                                <th style='width:15%'>Project</th>
                                <th style='width:15%'>Requester</th>
                                <th style='width:10%'>Status</th>
                                <th style='width:15%'>Dibuat Tanggal</th>
                                <!-- <th style='width:15%'>Keterangan</th> -->
                                <th style='width:10%'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rab_history as $key => $dt) :
                                $irb = base64_encode($dt->id_rab);
                            ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $dt->nomor_pengajuan; ?></td>
                                <td><?php 
                                if ($dt->id_project != 0) {
                                    echo $dt->project->nama_project;
                                    $ipr = base64_encode($dt->project->id_project."&npr=".$dt->project->nama_project);
                                } else {
                                    echo "No Project";
                                    $ipr = base64_encode("0&npr=No Project");
                                }?></td>
                                <td><?php echo $dt->diminta_pegawai->full_name; ?></td>
                                <td>
                                    <?php 
                                    if ($dt->status == '3' || $dt->status == '5' || $dt->status == '9') { ?>
                                    <span class='badge badge-danger'
                                        data-content="<?php echo $dt->status_rab_c->description; ?>"
                                        data-trigger="hover" data-toggle="popover" tabindex="0"
                                        title="Keterangan"><?php echo $dt->status_rab_c->status; ?></span>
                                    <?php   } elseif ($dt->status == '6') { ?>
                                    <span class='badge badge-success'
                                        data-content="<?php echo $dt->status_rab_c->description; ?>"
                                        data-trigger="hover" data-toggle="popover" tabindex="0"
                                        title="Keterangan"><?php echo $dt->status_rab_c->status ?></span>
                                    <?php   } elseif ($dt->status == '7' || $dt->status == '8') { ?>
                                    <span class='badge badge-info'
                                        data-content="<?php echo $dt->status_rab_c->description; ?>"
                                        data-trigger="hover" data-toggle="popover" tabindex="0"
                                        title="Keterangan"><?php echo $dt->status_rab_c->status ?></span>
                                    <?php   } else { ?>
                                    <span class='badge badge-warning'
                                        data-content="<?php echo $dt->status_rab_c->description; ?>"
                                        data-trigger="hover" data-toggle="popover" tabindex="0"
                                        title="Keterangan"><?php echo $dt->status_rab_c->status ?></span>
                                    <?php  } ?>
                                </td>
                                <td><?php echo date("d M Y H:i:s",strtotime($dt->dibuat_tgl)); ?></td>
                                <!-- <td><?php echo $dt->status_rab_c->description; ?></td> -->
                                <td class="actions">
                                    <!-- BUTTON VIEW PROJECT -->
                                    <a href="<?php echo site_url("rab/view?irb=".$irb); ?>"
                                        class="btn btn-info btn-xs"><i class="icon wb-search"></i>
                                        View </a>

                                    <a href="<?php echo site_url("rab/document_rab?irb=".$irb); ?>"
                                        class="btn btn-success btn-xs"><i class="icon wb-file"></i>
                                        File </a>

                                    <?php if (($dt->status == '0' || $dt->status == '2') && ($dt->dibuat_oleh == $idu || $role == '1' || ($this->session->userdata('level') == 4 && $dt->diminta_oleh == $idu))) { ?>
                                    <!-- <a href="<?php echo site_url("rab/update?irb=".$irb); ?>"
                                        class="btn btn-warning btn-xs"><i class="icon wb-edit"></i>
                                        Update </a> -->
                                    <!-- <a href="#" class="btn btn-warning btn-xs"><i class="icon wb-edit"></i>
                                        Update </a> -->
                                    <?php } ?>

                                    <?php if (($dt->status == '0' || $dt->status == '2') && ($idu == "21" || $role == "1")) { ?>
                                    <a href="<?php echo site_url("rab/update?irb=".$irb); ?>"
                                        class="btn btn-warning btn-xs"><i class="icon wb-edit"></i>
                                        Update</a>
                                    <?php }?>

                                    <?php if (($dt->status == '0' || $dt->status == '2') && ($idu == "21" || $role == "1")) { ?>
                                    <a href="<?php echo site_url("justification/create?ipr=$ipr&irb=$irb"); ?>"
                                        class="btn btn-warning btn-xs"><i class="icon fa-credit-card"></i>
                                        Create Justification</a>
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

    <!-- Modal VIEW -->
    <div class="modal fade modal-info example-modal-lg" id="viewproject" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">View Project</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/pic/add_pic" ?>">
                    <div class="modal-body col-md-12">
                        <div class="row">
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Project name: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="view_nm_project" name="view_nm_project"
                                        readonly />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">COA: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="view_flag_coa" name="view_flag_coa"
                                        readonly />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Status: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="view_status_project"
                                        name="view_status_project" readOnly />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label id="label_status_coa" class="col-lg-3 col-form-label">Status COA: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="view_status_coa" name="view_status_coa"
                                        readOnly />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Division: </label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" id="view_division_project"
                                        name="view_division_project" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label id="label_number_coa" class="col-lg-3 col-form-label">Number COA: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="view_number_coa" name="view_number_coa"
                                        readOnly />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Sub Division: </label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" id="view_sub_project" name="view_sub_project"
                                        readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Add -->
    <div class="modal fade modal-info" id="addproject" aria-hidden="true" aria-labelledby="exampleModalInfo"
        role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/project/add_project" ?>"
                    onsubmit="disableButton()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Project Name: </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control validate_char" id="add_nm_project"
                                    name="add_nm_project"
                                    placeholder="type your project. only major projects, not including clients"
                                    autocomplete="off" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Status: </label>
                            <div class="col-md-9">
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" id="add_status_internal" name="status_project" value="0"
                                        checked />
                                    <label for="inputstatusexternal">Internal</label>
                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" id="add_status_external" name="status_project" value="1" />
                                    <label for="inputstatusinternal">External</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Division: </label>
                            <div class="col-md-9">
                                <select class="form-control" multiple data-plugin="select2" id='add_slc_division'
                                    name="add_slc_division[]" required>
                                    <?php foreach ($alldivisi as $divisi): ?>
                                    <option value="<?php echo $divisi->id; ?>"><?php echo $divisi->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Sub Division: </label>
                            <div class="col-md-9">
                                <select id="add_slc_subdiv" name="add_slc_subdiv[]" class="form-control" multiple
                                    data-plugin="select2" readonly="readonly">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label"><span class="badge badge-info">info</span> First check
                                whether the project has been registered before!</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add_submit" class="btn btn-primary">Add Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Edit -->
    <div class="modal fade modal-info" id="editproject" aria-hidden="true" aria-labelledby="exampleModalInfo"
        role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="clear_localstorage()">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Edit Project</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/project/edit_project" ?>">
                    <div class="modal-body">
                        <div class="form-group row">
                            <input type="text" class="form-control" id="edit_id_project" name="edit_id_project"
                                hidden />
                            <label class="col-md-3 form-control-label">Project Name: </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control validate_char" id="edit_nm_project"
                                    name="edit_nm_project" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Status: </label>
                            <div class="col-md-9">
                                <select id="edit_slc_status" name="edit_slc_status" class="form-control" required>
                                    <option value="0">Internal</option>
                                    <option value="1">External</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Division: </label>
                            <div class="col-md-9">
                                <select class="form-control" multiple data-plugin="select2" id='edit_slc_division'
                                    name="edit_slc_division[]" onchange="select_edit_division(event)" required>
                                    <?php foreach ($alldivisi as $divisi): ?>
                                    <option value="<?php echo $divisi->id; ?>"><?php echo $divisi->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Sub Division: </label>
                            <div class="col-md-9">
                                <select id="edit_slc_subdiv" name="edit_slc_subdiv[]" class="form-control" multiple
                                    data-plugin="select2" required>
                                    <!-- <?php foreach ($this->session->userdata('allsubdiv') as $divisi): ?>
                      <option value="<?php echo $divisi->id; ?>"><?php echo $divisi->nama; ?></option>
                    <?php endforeach; ?> -->
                                </select>
                            </div>
                        </div>
                        <?php if($this->session->userdata('level')=='administrator' || 
              $this->session->userdata('level')=='developer'){?>
                        <hr />
                        <div class="form-group row">
                            <input type="text" class="form-control" id="edit_id_procoa" name="edit_id_procoa" hidden />
                            <label id="edit_label_coa" class="col-md-3 form-control-label">COA: </label>
                            <div class="col-md-9">
                                <select id="edit_slc_flag" name="edit_slc_flag" onchange="select_flag_coa(event)"
                                    class="form-control" required>
                                    <option value="0">Tidak Memiliki</option>
                                    <option value="1">Memiliki</option>
                                    <option value="2">Belum Memiliki</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label id="edit_label_status" class="col-md-3 form-control-label">Status COA: </label>
                            <div class="col-md-9">
                                <select id="edit_status_coa" name="edit_status_coa" class="form-control">
                                    <option value="0">Non Active</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label id="edit_label_number" class="col-md-3 form-control-label">Number COA: </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="edit_nomer_coa" name="edit_nomer_coa" />
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="clear_localstorage()">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="clear_localstorage()">Edit
                            Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <script type="text/javascript">
function edit_project(id_project, nama, status, flag_coa, divisi, subdiv, id_coa, status_coa, nomer_coa) {
    localStorage.setItem('subdivisi', subdiv);

    $('#edit_slc_division').val(divisi.split('|')).trigger('change');
    var result = $('#edit_slc_division').val();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('project/getSubdiv');?>",
        data: {
            divisi: result
        },
        dataType: "json",
        async: false,
        success: function(data) {
            $('#edit_slc_subdiv').html(data);
            $('#edit_slc_subdiv').val(subdiv.split('|')).trigger('change');
        }
    });

    document.getElementById("edit_id_project").value = id_project;
    document.getElementById("edit_nm_project").value = nama;
    document.getElementById("edit_slc_status").value = status;
    document.getElementById("edit_slc_flag").value = flag_coa;

    if (flag_coa == '0') {
        $("#edit_label_status").hide();
        $("#edit_status_coa").hide();
        $("#edit_label_number").hide();
        $("#edit_nomer_coa").hide();
        document.getElementById("edit_id_procoa").value = null;
        document.getElementById("edit_status_coa").value = 0;
        document.getElementById("edit_nomer_coa").value = null;
    } else {
        $("#edit_label_status").show();
        $("#edit_status_coa").show();
        $("#edit_label_number").show();
        $("#edit_nomer_coa").show();
        document.getElementById("edit_id_procoa").value = id_coa;
        document.getElementById("edit_status_coa").value = status_coa;
        document.getElementById("edit_nomer_coa").value = nomer_coa;
    }
}

function view_project(id_project, nama, status, flag_coa, divisi, subdiv, id_coa, status_coa, nomer_coa) {
    var flag = flag_coa;
    if (status == '0') {
        status = 'Internal';
    } else {
        status = 'External';
    }
    if (status_coa == '0') {
        status_coa = 'Non Active';
    } else {
        status_coa = 'Active';
    }
    if (flag_coa == '0') {
        flag_coa = 'Tidak Memiliki';
    } else if (flag_coa == '1') {
        flag_coa = 'Memiliki';
    } else {
        flag_coa = 'Belum Memiliki';
    }


    document.getElementById("view_nm_project").value = nama;
    document.getElementById("view_status_project").value = status;
    document.getElementById("view_division_project").value = divisi;
    document.getElementById("view_sub_project").value = subdiv;
    document.getElementById("view_flag_coa").value = flag_coa;
    document.getElementById("view_status_coa").value = status_coa;
    document.getElementById("view_number_coa").value = nomer_coa;

    if (flag != '1') {
        $("#label_status_coa").hide();
        $("#view_status_coa").hide();
        $("#label_number_coa").hide();
        $("#view_number_coa").hide();
    } else {
        $("#label_status_coa").show();
        $("#view_status_coa").show();
        $("#label_number_coa").show();
        $("#view_number_coa").show();
    }
}

function select_project(e) {
    html = $.ajax({
        data: {
            id_project: e.target.value
        },
        type: "POST",
        url: "<?php echo site_url('project/getPROJECT');?>",
        async: false
    }).responseText;
    let position = html.split("|")[0];
    let division = html.split("|")[1];
    let images = html.split("|")[2];
    document.getElementById("slc_position").value = position;
    document.getElementById("slc_division").value = division;
    $("#slc_picture").attr("src", images);
}

function select_flag_coa(e) {
    let status = e.target.value;
    if (status == '0') {
        $("#edit_label_status").hide();
        $("#edit_status_coa").hide();
        $("#edit_label_number").hide();
        $("#edit_nomer_coa").hide();
    } else {
        $("#edit_label_status").show();
        $("#edit_status_coa").show();
        $("#edit_label_number").show();
        $("#edit_nomer_coa").show();
        document.getElementById("edit_id_procoa").value = id_coa;
        document.getElementById("edit_status_coa").value = status_coa;
        document.getElementById("edit_nomer_coa").value = nomer_coa;
    }
}

function select_edit_division(e) {
    let value = localStorage.getItem('subdivisi');
    $('#edit_slc_subdiv').val(value.split('|')).trigger('change');
}

function clear_localstorage() {
    localStorage.clear();
}

function disableButton() {
    var btn = document.getElementById('btn_add_submit');
    btn.disabled = true;
    btn.innerText = 'Posting...';
}

$(document).ready(function() {
    console.log("DOCUMENT READY FUNCTION");
});
    </script>