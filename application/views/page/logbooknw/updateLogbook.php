    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Logbook</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item"><a href="logbookNw">Logbook</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </div>

        <div class="page-content">
            <div class="card">
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    onSubmit="disableButton()" enctype="multipart/form-data"
                    action="<?php echo site_url(). "/logbookNw/update" ?>">
                    <div class="card-block">
                        <h4 class="card-title project-title">
                            ID <?php echo $idlogbook ?>
                            <hr />
                        </h4>
                        <input hidden type="text" class="form-control" name="edit_id_logbook"
                            value="<?php echo $logbook->id_logbook; ?>" required />
                        <input hidden type="text" class="form-control" name="edit_id_prodet"
                            value="<?php echo $logbook->id_project_detail; ?>" required />
                        <input hidden type="text" class="form-control" name="edit_id_project_id"
                            value="<?php echo $logbook->id_project; ?>" required />
                        <div class="row">
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label"><b>Project Name: </b></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"
                                        value="<?php echo $logbook->nama_project; ?>" readOnly required />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label"><b>Client Name: </b></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="<?php echo $logbook->nm_client; ?>"
                                        readOnly required />
                                </div>
                            </div>
                            <?php if ($logbook->tittle != null && ($logbook->tittle != "" || $logbook->tittle != "-")) { ?>
                            <div id="t_edit_tittle" class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label"><b>Tittle : </b></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="edit_tittle" name="edit_tittle"
                                        value="<?php echo $logbook->tittle; ?>" palecholder="type your title" />
                                </div>
                            </div>
                            <?php  } else {
                                echo "<div class='col-lg-6 form-group row'></div>";
                            } ?>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label"><b>PIC Name: </b></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"
                                        value="<?php echo $logbook->lb_pic->nama_pic; ?>" readOnly required />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Date Target: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"
                                        value="<?php echo date("d M Y",strtotime($logbook->date_target)); ?>" readOnly
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Time Target: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"
                                        value="<?php echo date("H:i:s",strtotime($logbook->date_target)); ?>" readOnly
                                        required />
                                </div>
                            </div>
                            <?php if ($logbook->issue != null || $logbook->issue != '') { ?>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Issue: </label>
                                <div class="col-lg-9">
                                    <textarea class="form-control validate_char" id="edit_issue" name="edit_issue"
                                        placeholder="type your issue" required><?php echo $logbook->issue; ?></textarea>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Location: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control validate_char" id="edit_location"
                                        name="edit_location" value="<?php echo $logbook->location; ?>" required />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group row">
                                <label class="col-lg-3 col-form-label">Status: </label>
                                <div class="col-lg-9">
                                    <select id="edit_status" name="edit_status" class="form-control"
                                        onchange="select_id_progress(event)" required>
                                        <option value="1" <?php if ($logbook->id_progress ==1) {echo " selected";} ?>>
                                            Progress</option>
                                        <option value="2" <?php if ($logbook->id_progress ==2) {echo " selected";} ?>>
                                            Done</option>
                                        <option value="3" <?php if ($logbook->id_progress ==3) {echo " selected";} ?>>
                                            Hold</option>
                                    </select>
                                </div>
                            </div>
                            <?php if ($logbook->issue != null || $logbook->issue != '') { 
                                echo '<div class="col-lg-6 form-group row"></div>';
                            }?>
                            <div style="display:none" class="col-lg-6 form-group row" id="div_date_complete">
                                <label class="col-lg-3 col-form-label">Date Complete: </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" class="custom_datepicker form-control"
                                            id="edit_date_complete" name="edit_date_complete" />
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="col-lg-6 form-group row" id="div_time_complete">
                                <label class="col-lg-3 col-form-label">Time Complete: </label>
                                <div class="col-lg-9">
                                    <!-- <input type="time" class="form-control" id="edit_time_complete"
                                        name="edit_time_complete" value="17:00" /> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon wb-time" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" class="custom_timepicker form-control" data-autoclose="true"
                                            id="edit_time_complete" name="edit_time_complete" value="17:00" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id=alert-edit-logbook style="display:none"
                            class="alert dark alert-danger alert-dismissible" role="alert">
                            <i class="icon wb-alert-circle" aria-hidden="true"></i> Alert, Required all data field !
                        </div>
                        <div id=alert-edit-validate-date style="display:none"
                            class="alert dark alert-danger alert-dismissible" role="alert">
                            <i class="icon wb-alert-circle" aria-hidden="true"></i> Alert, Complete date must be
                            greater
                            than start date!
                        </div>
                    </div>
                    <div class="card-block ">
                        <table id="edit_table" class="table table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:2.5%">#</th>
                                    <th style="width:20%">Activity</th>
                                    <th style="width:25%">Note</th>
                                    <th style="width:10%">Status</th>
                                    <th style="width:20%">Start Date</th>
                                    <th style="width:20%">Complete Date</th>
                                    <th style="width:2.5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="edit_act_table">
                                <?php $i=1; foreach ($logbook->list_activity as $dt): ?>
                                <tr id="edit_act_id<?php echo $i; ?>">
                                    <td><?php echo $i; ?>
                                        <input hidden type="text" class="form-control" name="edit_act_id[]"
                                            value="<?php echo $dt->id_activity; ?>" required />
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="edit_act_activity[]"
                                            placeholder="type your activity"
                                            required><?php echo $dt->activity; ?></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="edit_act_note[]"
                                            placeholder="type your note"
                                            required><?php if($dt->note !=null) {echo $dt->note; }?></textarea>
                                    </td>
                                    <td>
                                        <select name="edit_act_status[]" class="form-control"
                                            onchange="select_act_id_progress(event,'<?php echo $i;?>')" required>
                                            <option value="1"
                                                <?php if ($dt->status ==1 || $dt->status ==1) {echo " selected";} ?>>
                                                Progress</option>
                                            <option value="2" <?php if ($dt->status ==2) {echo " selected";} ?>>
                                                Done</option>
                                        </select></td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="custom_datepicker form-control"
                                                name="edit_act_date_start[]"
                                                value="<?php echo date("d/m/Y",strtotime($dt->date_start)); ?>"
                                                required />
                                            <span class="input-group-addon">
                                                <i class="icon wb-time" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="custom_timepicker form-control"
                                                data-autoclose="true" name="edit_act_time_start[]"
                                                value="<?php echo date("H:i",strtotime($dt->date_start)); ?>"
                                                required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="custom_datepicker form-control"
                                                id="edit_act_date_complete<?php echo $i; ?>"
                                                name="edit_act_date_complete[]"
                                                <?php if ($dt->status != 2) {echo ' disabled';} ?>
                                                value="<?php if($dt->date_complete != "") {echo date("d/m/Y",strtotime($dt->date_complete));} ?>" />
                                            <span class="input-group-addon">
                                                <i class="icon wb-time" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="custom_timepicker form-control"
                                                data-autoclose="true" id="edit_act_time_complete<?php echo $i; ?>"
                                                name="edit_act_time_complete[]"
                                                <?php if ($dt->status != 2) {echo ' disabled';} ?>
                                                value="<?php if($dt->date_complete != "") {echo date("H:i",strtotime($dt->date_complete));} else {echo "17:00";} ?>" />
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($i==1) { ?>
                                        <button id="edit_addDinamis" type="button"
                                            class="btn btn-pure btn-default icon wb-plus p-0"></button>
                                        <?php } else { ?>
                                        <!-- <button type='button' onClick='return edit_removeDinamis(" +
                                            index + ")' class='btn btn-pure btn-default icon wb-trash p-0'></button> -->
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $i++ ; endforeach; ?>
                            </tbody>
                        </table>
                        <hr />

                    </div>
                    <div class="modal-footer">
                        <button id="btn_edit_submit" style="display:show" type="submit"
                            onClick="return custom_update_confirm()" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- End Page -->

    <script>
function disableButton() {
    $('.custom_datepicker').attr("disabled", false);
    $('.custom_timepicker').attr("disabled", false);
    $('.custom_select').attr("disabled", false)
    var btn = document.getElementById('btn_edit_submit');
    btn.disabled = true;
    btn.innerText = 'Posting...';
}

function custom_update_confirm() {
    var x = confirm("Yakin melanjutkan ? , Jika logbook sudah dalam status 'done' tidak dapat di update kembali.");
    if (x) {
        return true;
    } else {
        return false;
    }
}

function select_id_progress(e) {
    let status = e.target.value;
    if (status == '2') {
        document.getElementById("edit_date_complete").required = true;
        document.getElementById("edit_time_complete").required = true;
        $("#div_date_complete").show();
        $("#div_time_complete").show();
    } else {
        document.getElementById("edit_date_complete").required = false;
        document.getElementById("edit_time_complete").required = false;
        $("#div_date_complete").hide();
        $("#div_time_complete").hide();
    }
}

function select_act_id_progress(e, id) {
    let id_date_complete = "#edit_act_date_complete" + id;
    let id_time_complete = "#edit_act_time_complete" + id;
    let status = e.target.value;
    if (status == '2') {
        $(id_date_complete).prop('required', true);
        $(id_time_complete).prop('required', true);
        $(id_date_complete).prop("disabled", false);
        $(id_time_complete).prop("disabled", false);
        // document.getElementById(id_date_complete).required = true;
        // document.getElementById(id_time_complete).required = true;
        // document.getElementById(id_date_complete).disabled = false;
        // document.getElementById(id_time_complete).disabled = false;
    } else {
        $(id_date_complete).prop('required', false);
        $(id_time_complete).prop('required', false);
        $(id_date_complete).prop("disabled", true);
        $(id_time_complete).prop("disabled", true);
    }
}

function edit_removeDinamis(id) {
    let confirm = delX_confirm();
    if (confirm) {
        let form = "#edit_act_id" + id;
        $(form).remove();
        let count = JSON.parse(localStorage.getItem('form-dinamis-edit'));
        let newCt = [];
        for (let index = 0; index < count.length; index++) {
            const element = count[index];
            if (element != id) {
                newCt.push(element);
            }
        }
        localStorage.setItem('form-dinamis-edit', JSON.stringify(newCt));
    };
}

$(document).ready(function() {
    var edit_buttonAdd = $('#edit_addDinamis');
    let last_act = parseInt("<?php echo count($logbook->list_activity);?>");
    var first = [];
    first.push(last_act);
    localStorage.setItem('form-dinamis-edit', JSON.stringify(first));

    $(edit_buttonAdd).click(function() {
        //Check maximum number of input fields
        let count = JSON.parse(localStorage.getItem('form-dinamis-edit'));
        let id = count[count.length - 1] + 1;
        $("#edit_act_table").append(
            "<tr id='edit_act_id" + id + "'><td>" + id +
            "<input hidden type='text' class='form-control' name='edit_act_id[]' value='0' required /></td><td><textarea class='form-control' name='edit_act_activity[]' placeholder='type your activity' required></textarea></td>" +
            "<td><textarea class='form-control' name='edit_act_note[]' placeholder='type your note' required></textarea></td>" +
            "<td><select name='edit_act_status[]' class='form-control' onchange='select_act_id_progress(event," +
            id +
            ")' required><option value='1'>Progress</option><option value='2'>Done</option></select></td>" +
            "<td><div class='input-group'><span class='input-group-addon'><i class='icon wb-calendar' aria-hidden='true'></i></span><input type='text' class='custom_datepicker form-control' name='edit_act_date_start[]' required/><span class='input-group-addon'><i class='icon wb-time' aria-hidden='true'></i></span><input type='text' class='custom_timepicker form-control' name='edit_act_time_start[]' required/></div></td>" +
            "<td><div class='input-group'><span class='input-group-addon'><i class='icon wb-calendar' aria-hidden='true'></i></span><input type='text' class='custom_datepicker form-control' id='edit_act_date_complete" +
            id +
            "' name='edit_act_date_complete[]' disabled/><span class='input-group-addon'><i class='icon wb-time' aria-hidden='true'></i></span><input type='text' class='custom_timepicker form-control' id='edit_act_time_complete" +
            id + "' name='edit_act_time_complete[]' disabled/></div></td>" +
            "<td><button type='button' onClick='return edit_removeDinamis(" + id +
            ")' class='btn btn-pure btn-default icon wb-trash p-0'></button></td></tr>"
        );
        count.push(id);
        localStorage.setItem('form-dinamis-edit', JSON.stringify(count));

        $('.custom_datepicker').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('.custom_timepicker').clockpicker({
            autoclose: true
        });
    });
});
    </script>