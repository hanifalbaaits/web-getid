    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">View Logbook</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item"><a href="logbook">Logbook</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </div>

        <div class="page-content">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title project-title">
                        ID <?php echo $idlogbook ?>
                        <hr />
                    </h4>
                    <div class="row" style="margin-left: 1px; margin-right: 30px;">
                        <div class="column" style="float: left;width: 12%;">
                            <p><b>Name</b></p>
                            <p><b>Division</b></p>
                            <p><b>Position</b></p>
                        </div>
                        <div class="column" style="float: left;width: 50%;">
                            <p>: <?php echo $logbook->nama_pegawai; ?></p>
                            <p>: <?php echo $logbook->nm_divisi." - ".$logbook->nm_subdiv; ?></p>
                            <p>: <?php echo $logbook->nm_jabatan; ?></p>
                        </div>
                    </div>
                    <hr />
                    <div class="row" style="margin-left: 1px; margin-right: 30px;">
                        <div class="column" style="float: left;width: 12%;">
                            <p><b>Project Name</b></p>
                            <?php if ($logbook->tittle != null && ($logbook->tittle != "" || $logbook->tittle != "-")) {
                                echo "<p><b>Tittle</b></p>";
                            }?>
                            <p><b>Client Name</b></p>
                            <p><b>PIC Name</b></p>
                        </div>
                        <div class="column" style="float: left;width: 50%;">
                            <p>: <?php echo $logbook->nama_project; ?></p>
                            <?php if ($logbook->tittle != null && ($logbook->tittle != "" || $logbook->tittle != "-")) {
                                echo "<p><b>: ".$logbook->tittle."</b></p>";
                            }?>
                            <p>: <?php echo $logbook->nm_client; ?></p>
                            <p>: <?php echo $logbook->lb_pic->nama_pic; ?></p>
                        </div>
                        <div class="column" style="float: left; width: 14%;">
                            <p><b>Location</b></p>
                            <p><b>Status</b></p>
                        </div>
                        <div class="column" style="float: left; width: 24%;">
                            <p>: <?php echo $logbook->location; ?></p>
                            <p>: <?php if($logbook->id_progress == 1) {
                                    echo "Progress"; $color_prog="progress-bar-warning";
                                    } elseif ($logbook->id_progress == 2) {
                                    echo "Done"; $color_prog="progress-bar-success";
                                    } else {  echo "Hold"; $color_prog="progress-bar-danger"; }?></p>
                        </div>
                    </div>
                    <hr />
                    <div class="row" style="margin-left: 1px; margin-right: 30px;">
                        <div class="column" style="float: left;width: 12%;">
                            <p><b>Start Date</b></p>
                            <p><b>Date Target</b></p>
                        </div>
                        <div class="column" style="float: left;width: 50%;">
                            <p>: <?php echo date("d M Y H:i:s",strtotime($logbook->date_start)); ?></p>
                            <p>: <?php echo date("d M Y H:i:s",strtotime($logbook->date_target)); ?></p>
                        </div>
                        <div class="column" style="float: left; width: 14%;">
                            <p><b>Date Complete</b></p>
                            <p><b>Date Modified</b></p>
                        </div>
                        <div class="column" style="float: left; width: 24%;">
                            <p>: <?php if($logbook->date_complete != null || $logbook->date_complete != ""){
                                echo date("d M Y H:i:s",strtotime($logbook->date_complete));
                                }?></p>
                            <p>: <?php if($logbook->date_modified != null || $logbook->date_modified != ""){
                                echo date("d M Y H:i:s",strtotime($logbook->date_modified));
                                }?></p>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="card-block ">
                    <h4 class="card-title project-title">
                        <?php 
                        if ($logbook->issue != null && $logbook->issue != "" && $logbook->issue != "-") {
                            echo "ISSUE: ".$logbook->issue; ?>
                        <div class="row">
                            <div class="col-10 mt-30" style="vertical-align: middle;">
                                <div class="progress progress-xs table-content">
                                    <div class="progress-bar <?php echo " ".$color_prog." "; ?> progress-bar-indicating"
                                        style="width: <?php echo $logbook->persentase_progress; ?>%" role="progressbar">
                                        <span class="sr-only"><?php echo $logbook->persentase_progress; ?>%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 mt-20">
                                <?php echo $logbook->persentase_progress; ?> %
                            </div>
                        </div>
                        <?php } ?>
                        <hr />
                    </h4>
                    <table class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:30%">Activity</th>
                                <th style="width:30%">Note</th>
                                <th style="width:5%">Status</th>
                                <th style="width:15%">Start Date</th>
                                <th style="width:15%">Complete Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($logbook->list_activity as $dt): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td style="text-align:justify;"><?php echo $dt->activity; ?></td>
                                <td style="text-align:justify;"><?php echo $dt->note; ?></td>
                                <?php 
                                if ($dt->status == 1 || $dt->status == 3) {
                                    echo "<td><span class='badge badge-warning'>".$dt->namaStatus."</span></td>";
                                } else {
                                    echo "<td><span class='badge badge-success'>".$dt->namaStatus."</span></td>";
                                }
                                ?>
                                <td><?php echo date("d M Y H:i:s",strtotime($dt->date_start)); ?></td>
                                <td><?php if($dt->date_complete != null || $dt->date_complete != ""){
                                echo date("d M Y H:i:s",strtotime($dt->date_complete));
                                }?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr />
                </div>
            </div>

        </div>
    </div>
    <!-- End Page -->