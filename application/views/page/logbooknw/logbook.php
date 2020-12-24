    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">List Logbook</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item active">LogbookNw (Testing Mode)</li>
            </ol>
        </div>

        <div class="page-content">

            <!-- Panel Table Add Row -->
            <div class="panel">
                <div class="panel-body">
                    <div class="alert dark alert-icon alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon wb-info" aria-hidden="true"></i>INFO: &nbsp;&nbsp; <a class="alert-link"
                            href="help"> Klik
                            disini</a> untuk penulisan dan tata cara penggunaan logbook !
                        <!-- <a class="alert-link" href="help">LIHAT</a> -->

                    </div>
                    <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon wb-bell" aria-hidden="true"></i><?php echo $info; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-15">
                                <!-- <a href="logbook/create">
                                <button id="add" class="btn btn-outline btn-primary" type="button">
                                    <i class="icon wb-plus" aria-hidden="true"></i> Create Logbook
                                </button>
                                </a>   -->
                                <?php 
                                    $token = hash('sha256',$this->session->userdata('auth'));
                                    $mask = base64_encode('05061996');
                                    $hash = '?auth='.$token.'&mask='.$mask;
                                ?>
                                <?php if($this->session->userdata('level') == '5' || $this->session->userdata('level') == '6' || $this->session->userdata('level') == '7') { ?>
                                <!-- <button id="add" class="btn btn-outline btn-primary" onClick="add_logbook()"
                                    type="button" data-target="#createlogbook" data-toggle="modal">
                                    <i class="icon wb-plus" aria-hidden="true"></i> Create Logbook
                                </button> -->
                                <a class="btn btn-outline btn-primary"
                                    href="<?php echo site_url("logbookNw/viewCrt".$hash); ?>"><i
                                        class="icon wb-plus"></i> Create Logbook </a>
                                <?php } ?>
                                <button id="search" class="btn btn-outline btn-primary" type="button"
                                    data-target="#searchModal" data-toggle="modal">
                                    <i class="icon fa-filter" aria-hidden="true"></i> Filter
                                </button>
                                <?php if($jumlah > 0){?>
                                <a id="download" class="btn btn-outline btn-primary"
                                    href="<?php echo site_url("logbookNw/export"); ?>">
                                    <i class="icon wb-download" aria-hidden="true"></i> Download
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php $idac = 1; 
                    foreach($logbooks as $list): ?>
                    <div class="card border border-info">
                        <div class="card-block">
                            <div class="container">
                                <div class="mt-5" style="float:left;">
                                    <h4 class="card-title" style="margin: auto;"><?php echo $list->nama_project; ?></h4>
                                </div>
                                <!-- <div class="mr-10 ml-10 mt-5" style="float:right; ">
                                    <a href="logbookNw/viewPro" class="btn btn-outline btn-primary btn-sm"
                                        type="button">
                                        <i class="icon wb-search" aria-hidden="true"></i> Detail Project
                                    </a>
                                </div> -->
                                <div class="mr-10 ml-10" style="float:right; text-align: center; ">
                                    <div class="num green-600"><?php echo $list->count_activity; ?></div>
                                    <p style="margin: auto;">Activity</p>
                                </div>
                                <div class="mr-10 ml-10" style="float:right; text-align: center; ">
                                    <div class="num orange-600"><?php echo $list->count_issue; ?></div>
                                    <p style="margin: auto;">Issue</p>
                                </div>
                            </div>
                            <br />
                            <hr class="mt-25" />
                            <table class="table table-hover table-responsive dataTable table-striped w-full"
                                cellspacing="0" data-plugin="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <?php if($this->session->userdata('level') != '5' && $this->session->userdata('level') != '6' && $this->session->userdata('level') != '7') { 
                                            echo "<th style='width:15%'>Employee Name</th>";
                                            echo "<th style='width:15%'>Division</th>";
                                            echo "<th style='width:20%'>Client Name</th>";
                                            echo "<th style='width:35%''>Issue</th>";
                                        } else {
                                            echo "<th style='width:20%'>Client Name</th>";
                                            echo "<th style='width:35%'>Issue</th>";
                                            echo "<th style='width:15%'>Starting Date</th>";
                                            echo "<th style='width:15%'>Date Target</th>";
                                        }
                                        ?>
                                        <th style="width:5%">Status</th>
                                        <th style="width:10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($list->list_logbook as $log): ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <?php if($this->session->userdata('level') != '5' && $this->session->userdata('level') != '6' && $this->session->userdata('level') != '7') { 
                                            echo  '<td>'.$log->nama_pegawai.'</td>';
                                            echo  '<td>'.$log->nm_subdiv.'</td>';
                                            echo  '<td>'.$log->nm_client.'</td>';
                                        } else {
                                            echo '<td>'.$log->nm_client.'</td>';
                                        }
                                        ?>
                                        <td id="activityTrig<?php echo $idac;?>" href="#" data-trigger="hover"
                                            data-animation="fade"><?php echo $log->issue; ?></td>
                                        <?php if($this->session->userdata('level') == '5' || $this->session->userdata('level') == '6' || $this->session->userdata('level') == '7') { 
                                            echo  '<td>'.date("d M Y H:i:s",strtotime($log->date_start)).'</td>';
                                            echo  '<td>'.date("d M Y H:i:s",strtotime($log->date_target)).'</td>';
                                        } ?>
                                        <td><?php if($log->id_progress == '1'){
                                                echo '<span class="badge badge-warning">Progress</span>';
                                            } else if($log->id_progress == '2'){
                                                echo '<span class="badge badge-success">Done</span>';
                                            } else {
                                                echo '<span class="badge badge-info">Hold</span>';
                                            }?>
                                        </td>
                                        <td class="actions">
                                            <!-- VIEW LOGBOOK  -->
                                            <?php 
                                                $token = hash('sha256',$this->session->userdata('auth'));
                                                $mask = base64_encode($log->id_logbook);
                                                $hash = '?auth='.$token.'&mask='.$mask;
                                            ?>
                                            <?php 
                                            if ( ($level == 3 && ($log->divisi == $subdiv)) 
                                                ||($level == 4 && ($log->subdiv == $subdiv)) || ($level != 3 && $level !=4))  { ?>
                                            <a class="btn btn-success btn-xs"
                                                href="<?php echo site_url("logbookNw/view".$hash); ?>"
                                                target="_blank"><i class="icon wb-search"></i> View </a>
                                            <div id="activityPop<?php echo $idac;?>" hidden>
                                                <table class="table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:5%">#</th>
                                                            <th style="width:30%">Activity</th>
                                                            <th style="width:40%">Note</th>
                                                            <th style="width:5%">Status</th>
                                                            <th style="width:20%">Start Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $ii=1; foreach ($log->list_activity as $act): ?>
                                                        <tr>
                                                            <td><?php echo $ii++; ?></td>
                                                            <td style="text-align:justify;"><?php echo $act->activity;?>
                                                            </td>
                                                            <td style="text-align:justify;"><?php echo $act->note;?>
                                                            </td>
                                                            <td><?php if($act->status == '1'){
                                                                    echo '<span class="badge badge-warning">Progress</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-success">Done</span>';
                                                                } ?>
                                                            </td>
                                                            <td><?php echo date("d M Y H:i:s",strtotime($act->date_start)); ?>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } ?>

                                            <!-- <a class="btn btn-success btn-xs" href="#"
                                                onClick="return view_logbook2('<?php echo $log->id_logbook;?>','<?php echo $log->id_project;?>')"
                                                 data-toggle="modal"
                                                data-target="#viewlogbook"><i class="icon wb-search"></i> View </a> -->

                                            <!-- UPDATE LOGBOOK  -->
                                            <?php if(($this->session->userdata('level') == '5' || $this->session->userdata('level') == '6' || $this->session->userdata('level') == '7' )
                                            && ($log->id_progress == '1' || $log->id_progress == '3' || $log->id_progress == '4' )) { ?>
                                            <a href="<?php echo site_url("logbookNw/viewUpd".$hash); ?>"
                                                class="btn btn-info btn-xs"><i class="icon wb-edit"></i> Edit
                                            </a>
                                            <!-- <a href="#" onClick="return edit_logbook2('<?php echo $log->id_logbook; ?>','<?php echo $log->id_project_detail;?>',
                                                '<?php echo $log->id_progress; ?>','<?php echo $log->id_project;?>')"
                                                class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#editlogbook"><i class="icon wb-edit"></i> Edit
                                            </a> -->
                                            <!-- DELETE LOGBOOK  -->
                                            <a href="<?php echo site_url("logbookNw/delete/$log->id_logbook"); ?>"
                                                onclick='return del_confirm()' class="btn btn-danger btn-xs"><i
                                                    class="icon wb-trash"></i> Delete </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php $i++; $idac++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- End Panel Table Add Row -->
        </div>
    </div>
    <!-- End Page -->

    <!-- Modal -->
    <div class="modal fade modal-info" id="searchModal" aria-hidden="true" aria-labelledby="searchModal" role="dialog"
        tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Filter Logbook</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbookNw" ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="start_date">Start Date</label>
                                <input type="text" class="custom_datepicker form-control" id="start_date"
                                    name="start_date" />
                            </div>
                            <div class=" form-group col-md-6">
                                <label class="form-control-label" for="end_date">End Date</label>
                                <input type="text" class="custom_datepicker form-control" id="end_date"
                                    name="end_date" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">In Week</label>
                            <div>
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" id="week_date1" name="week_date" value="1" />
                                    <label for="week_date">Week 1</label>
                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" id="week_date2" name="week_date" value="2" />
                                    <label for="week_date">Week 2</label>
                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" id="week_date3" name="week_date" value="3" />
                                    <label for="week_date">Week 3</label>
                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" id="week_date4" name="week_date" value="4" />
                                    <label for="week_date">Week 4</label>
                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" id="week_date5" name="week_date" value="5" />
                                    <label for="week_date">Week 5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->