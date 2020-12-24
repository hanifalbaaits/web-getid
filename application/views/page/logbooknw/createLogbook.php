    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Logbook</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item"><a href="logbookNw">Logbook</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>

        <div class="page-content">
            <div class="card">
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    onSubmit="disableButton()" enctype="multipart/form-data"
                    action="<?php echo site_url(). "/logbookNw/create" ?>">
                    <div class="modal-body">
                        <div class="pearls row">
                            <div id="pearl-project" class="pearl current col-3">
                                <div class="pearl-icon"><i class="icon wb-order" aria-hidden="true"></i></div>
                                <span class="pearl-title">Project</span>
                            </div>
                            <div id="pearl-logbook" class="pearl col-3">
                                <div class="pearl-icon"><i class="icon fa-book" aria-hidden="true"></i></div>
                                <span class="pearl-title">Logbook</span>
                            </div>
                            <div id="pearl-activity" class="pearl col-3">
                                <div class="pearl-icon"><i class="icon fa-pencil" aria-hidden="true"></i></div>
                                <span class="pearl-title">Activity</span>
                            </div>
                            <div id="pearl-confirm" class="pearl col-3">
                                <div class="pearl-icon"><i class="icon wb-check" aria-hidden="true"></i></div>
                                <span class="pearl-title">Confirmation</span>
                            </div>
                        </div>
                        <hr />

                        <div id="wizard-content" class="wizard-content">
                            <div style="display:show" class="wizard-pane" id="wizard-project" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-9 form-group row">
                                        <label class="col-lg-3 col-form-label"><b>Choose your Case: </b></label>
                                        <div class="col-lg-9">
                                            <div class="radio-custom radio-default radio-inline">
                                                <input type="radio" id="add_type_project" name="add_type"
                                                    onchange="select_radio_project(event)" value="0" checked />
                                                <label for="inputType_project">Project</label>
                                            </div>
                                            <div class="radio-custom radio-default radio-inline">
                                                <input type="radio" id="add_type_support" name="add_type"
                                                    onchange="select_radio_project(event)" value="1" />
                                                <label for="inputType_project">SUPPORT</label>
                                            </div>
                                            <div class="radio-custom radio-default radio-inline">
                                                <input type="radio" id="add_type_management" name="add_type"
                                                    onchange="select_radio_project(event)" value="2" />
                                                <label for="inputType_project">MANAGEMENT</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="loading" style="display:none"
                                        class="loader vertical-align-middle loader-circle"></div>
                                    <div id="div_project" class="col-lg-9 form-group row">
                                        <label class="col-lg-3 col-form-label"><b>Project: </b></label>
                                        <div class="col-lg-9">
                                            <!-- <select id="add_id_project" name="add_id_project"
                                                class="custom_select form-control" data-plugin="select2"
                                                data-placeholder="Select your Project" data-allow-clear="true"
                                                onchange="select_id_project(event,null)">
                                                <option></option>
                                                <?php foreach ($projects as $project){
                                                    echo "<option value=".$project->id_project.">".$project->nama_project."</option>";
                                                } ?>
                                            </select> -->
                                            <select id="add_id_project" name="add_id_project" data-plugin="selectpicker"
                                                data-live-search="true" onchange="select_id_project(event,null)">
                                                <option selected disabled>Select your Project</option>
                                                <?php foreach ($projects as $project){
                                                    echo "<option value=".$project->id_project.">".$project->nama_project."</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="div_project_btn" class="col-lg-3 form-group row">
                                        <a class="btn btn-outline btn-primary"
                                            href="<?php echo site_url("project"); ?>"><i class="icon wb-search"></i>
                                            Can't find your Project ?</a>
                                    </div>
                                    <input hidden type="text" class="selectpicker form-control" id="add_id_project_id"
                                        name="add_id_project_id" value="" />
                                    <div id="div_tittle" class="col-lg-9 form-group row" style="display:none">
                                        <label class="col-lg-3 col-form-label"><b>Title Case: </b></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control validate_char" id="add_tittle"
                                                name="add_tittle" placeHolder="type your tittle" />
                                        </div>
                                    </div>
                                    <div class="col-lg-9 form-group row">
                                        <label class="col-lg-3 col-form-label"><b>Client: </b></label>
                                        <div class="col-lg-9">
                                            <!-- <select id="add_id_client" name="add_id_client" class="form-control"
                                                data-plugin="select2" data-placeholder="Select your Client"
                                                data-allow-clear="true" onchange="select_id_client(event)" required>
                                                <option></option>
                                            </select> -->
                                            <select id="add_id_client" name="add_id_client"
                                                class="selectpicker form-control" data-plugin="selectpicker"
                                                data-live-search="true" onchange="select_id_client(event)" required>
                                                <!-- <option>Select your Client</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div id="div_relation_btn" class="col-lg-3 form-group row" style="display:none">
                                        <a class="btn btn-outline btn-success btn-md" data-target="#addrelation"
                                            data-toggle="modal" href="#" onclick="open_modal_rel()"><i
                                                class="icon fa-sitemap"></i>
                                            Add Relation</a>
                                    </div>
                                    <div id="div_add_clipic_btn" class="col-lg-3 form-group row" style="display:none">
                                        <a class="btn btn-outline btn-info btn-md" data-target="#add_pic_client"
                                            data-toggle="modal" href="#"><i class="icon fa-users"></i>
                                            Add Client or PIC</a>
                                    </div>
                                    <div class="col-lg-9 form-group row">
                                        <label class="col-lg-3 col-form-label"><b>PIC: </b></label>
                                        <div class="col-lg-9">
                                            <!-- <select id="add_id_pic" name="add_id_pic" class="form-control"
                                                data-plugin="select2" data-placeholder="Select your PIC"
                                                data-allow-clear="true" required>
                                                <option></option>
                                            </select> -->
                                            <select id="add_id_pic" name="add_id_pic" class="selectpicker form-control"
                                                data-plugin="selectpicker" data-live-search="true" required>
                                                <!-- <option>Select your PIC</option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="wizard-pane" id="wizard-project-confirm" role="tabpanel">
                                <div class="text-center">
                                    <h4>Please check and confirm your logbook.</h4><br />
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 form-group row">
                                        <label class="col-lg-3 col-form-label"><b>Project: </b></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="add_project_con" />
                                        </div>
                                    </div>
                                    <div id="div_tittle_con" class="col-lg-9 form-group row" style="display:none">
                                        <label class="col-lg-3 col-form-label"><b>Title Case: </b></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="add_tittle_con" />
                                        </div>
                                    </div>
                                    <div class="col-lg-9 form-group row">
                                        <label class="col-lg-3 col-form-label"><b>Client: </b></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="add_client_con" />
                                        </div>
                                    </div>
                                    <div class="col-lg-9 form-group row">
                                        <label class="col-lg-3 col-form-label"><b>PIC: </b></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="add_pic_con" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="wizard-pane" id="wizard-logbook" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 form-group row">
                                        <label class="col-lg-3 col-form-label"><b>Have Issue: </b></label>
                                        <div class="col-lg-6">
                                            <div class="radio-custom radio-default radio-inline">
                                                <input type="radio" id="add_radio_issue_yes" name="add_radio_issue"
                                                    onchange="select_radio_issue(event)" value="1" checked />
                                                <label for="inputType_project">YES</label>
                                            </div>
                                            <div class="radio-custom radio-default radio-inline">
                                                <input type="radio" id="add_radio_issue_no" name="add_radio_issue"
                                                    onchange="select_radio_issue(event)" value="0" />
                                                <label for="inputType_project">NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input hidden type="text" class="form-control" id="add_type_issue"
                                        name="add_type_issue" value="1" />
                                    <div class="col-lg-6 form-group row">
                                        <label class="col-lg-3 col-form-label">Issue: </label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control validate_char" id="add_issue" name="add_issue"
                                                placeholder="type your issue" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 form-group row">
                                        <label class="col-lg-3 col-form-label">Start Date: </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="custom_datepicker form-control"
                                                id="add_date_start" name="add_date_start" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 form-group row">
                                        <label class="col-lg-3 col-form-label">Start Time: </label>
                                        <div class="col-lg-9">
                                            <input type="time" class="custom_timepicker form-control"
                                                id="add_time_start" name="add_time_start" value="08:00" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 form-group row">
                                        <label class="col-lg-3 col-form-label">Date Target: </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="custom_datepicker form-control"
                                                id="add_date_target" name="add_date_target" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 form-group row">
                                        <label class="col-lg-3 col-form-label">Time Target: </label>
                                        <div class="col-lg-9">
                                            <input type="time" class="custom_timepicker form-control"
                                                id="add_time_target" name="add_time_target" value="17:00" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 form-group row">
                                        <label class="col-lg-3 col-form-label">Location: </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control validate_char" id="add_location"
                                                name="add_location" placeHolder="type your location" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 form-group row">
                                        <label class="col-lg-3 col-form-label">Status: </label>
                                        <div class="col-lg-9">
                                            <select id="add_status" name="add_status" class="custom_select form-control"
                                                onchange="select_id_progress(event)" required>
                                                <option value="1">Progress</option>
                                                <option value="2">Done</option>
                                                <option value="3">Hold</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="display:none" class="col-lg-6 form-group row" id="div_date_complete">
                                        <label class="col-lg-3 col-form-label">Date Complete: </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="custom_datepicker form-control"
                                                id="add_date_complete" name="add_date_complete" />
                                        </div>
                                    </div>
                                    <div style="display:none" class="col-lg-6 form-group row" id="div_time_complete">
                                        <label class="col-lg-3 col-form-label">Time Complete: </label>
                                        <div class="col-lg-9">
                                            <input type="time" class="custom_timepicker form-control"
                                                id="add_time_complete" name="add_time_complete" value="17:00" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="wizard-pane" id="wizard-activity" role="tabpanel">
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
                                    <tbody id="add_act_table">
                                        <tr id="add_act_id1">
                                            <td>1
                                                <input hidden type="text" class="form-control" name="add_act_id[]"
                                                    value="0" required />
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="add_act_activity[]"
                                                    id="add_act_activity1" placeholder="type your activity"
                                                    required></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="add_act_note[]" id="add_act_note1"
                                                    placeholder="type your note" required></textarea>
                                            </td>
                                            <td>
                                                <select name="add_act_status[]" class="custom_select form-control"
                                                    id="add_act_status1" onchange="select_act_id_progress(event,'1')"
                                                    required>
                                                    <option value="1">Progress</option>
                                                    <option value="2">Done</option>
                                                </select></td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="icon wb-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <input type="text" class="custom_datepicker form-control"
                                                        id="add_act_date_start1" name="add_act_date_start[]" required />
                                                    <span class="input-group-addon">
                                                        <i class="icon wb-time" aria-hidden="true"></i>
                                                    </span>
                                                    <input type="text" class="custom_timepicker form-control"
                                                        data-autoclose="true" name="add_act_time_start[]"
                                                        id="add_act_time_start1" required />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="icon wb-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <input type="text" class="custom_datepicker form-control"
                                                        id="add_act_date_complete1" name="add_act_date_complete[]"
                                                        disabled />
                                                    <span class="input-group-addon">
                                                        <i class="icon wb-time" aria-hidden="true"></i>
                                                    </span>
                                                    <input type="text" class="custom_timepicker form-control"
                                                        data-autoclose="true" id="add_act_time_complete1"
                                                        name="add_act_time_complete[]" disabled />
                                                </div>
                                            </td>
                                            <td>
                                                <button id="add_addDinamis" type="button"
                                                    class="btn btn-pure btn-default icon wb-plus p-0"></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div id=alert-add-logbook style="display:none" class="alert dark alert-danger alert-dismissible"
                            role="alert">
                            <i class="icon wb-alert-circle" aria-hidden="true"></i> Alert, Required all data field!
                        </div>
                        <div id=alert-add-logbook2 style="display:none"
                            class="alert dark alert-danger alert-dismissible" role="alert">
                            <i class="icon wb-alert-circle" aria-hidden="true"></i> Alert, Status logbook cannot be
                            'done' if the activity status is still progressing !
                        </div>
                        <div id=alert-validate-date style="display:none"
                            class="alert dark alert-danger alert-dismissible" role="alert">
                            <i class="icon wb-alert-circle" aria-hidden="true"></i> Alert, Check your date. Target date
                            / Complete Date must be greater
                            than start date!
                        </div>
                        <hr />
                        <div class="wizard-buttons">
                            <button id="btn_add_back" type="button" class="btn btn-primary btn-outline disabled"
                                onClick="back()">Back</button>
                            <button id="btn_add_next" type="button" class="btn btn-primary btn-outline float-right"
                                onClick="next()">Next</button>
                            <button style="display:none" id="btn_add_submit" type="submit"
                                onClick="return custom_create_confirm()"
                                class="btn btn-success btn-outline float-right">Create
                                Logbook</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Page -->


    <!-- Modal Add RELATION -->
    <div class="modal fade modal-info example-modal-lg" id="addrelation" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Add Relation Client and PIC</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbookNw/add_prodet" ?>"
                    onsubmit="disableButton()">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-9 form-group row">
                                <label class="col-lg-3 col-form-label"><b>Project: </b></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control validate_char" id="add_rel_project"
                                        value="Logbook" disabled />
                                    <input type="text" class="form-control validate_char" id="add_rel_id_project" hidden
                                        name="add_rel_id_project" required />
                                </div>
                            </div>
                            <div id="loading-rel" style="display:hide" class="loader loader-circle">
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-lg-9 form-group row">
                                <label class="col-lg-3 col-form-label"><b>PIC: </b></label>
                                <div class="col-lg-9">
                                    <select id="add_rel_id_pic" name="add_rel_id_pic" class="custom_select form-control"
                                        data-plugin="select2" data-placeholder="Select your Pic" required
                                        data-allow-clear="true">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="checkbox-custom checkbox-primary">
                                    <input type="checkbox" id="checkbox_pic" onclick="checkbox_check()" />
                                    <label for="checkbox_pic">New PIC</label>
                                </div>
                            </div>
                            <div id="div_rel_pic_left" style="display:none" class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Status</label>
                                    <div class="col-lg-9">
                                        <div class="radio-custom radio-default radio-inline">
                                            <input class="form-control" type="radio" id="add_status_external"
                                                name="status_pic" onchange="select_radio(event)" value="0" checked />
                                            <label for="inputstatusexternal">External</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input class="form-control" type="radio" id="add_status_internal"
                                                name="status_pic" onchange="select_radio(event)" value="1" />
                                            <label for="inputstatusinternal">Internal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3">PIC name: </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control validate_char" id="add_nm_pic"
                                            name="add_nm_pic" placeHolder="type your pic name" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3">Note: </label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control validate_char" id="add_note_pic"
                                            name="add_note_pic" placeholder="Briefly Describe your pic"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="div_rel_pic_right" style="display:none" class="col-lg-5">
                                <div style="display:none" id="add_label_select_pic" class="form-group row">
                                    <label class="col-lg-3 col-form-label">Employee: </label>
                                    <div class="col-lg-8">
                                        <select id="add_select_pic" name="add_slc_pic" onchange="select_pic(event)"
                                            class="form-control" data-plugin="select2"
                                            data-placeholder="Select your PIC" data-allow-clear="true">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="display:none" id="add_label_slc_position"
                                        class="col-lg-3 col-form-label">Position: </label>
                                    <div class="col-lg-9">
                                        <input style="display:none" type="text" class="form-control" id="slc_position"
                                            name="slc_position" readOnly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="display:none" id="add_label_slc_division"
                                        class="col-lg-3 col-form-label">Division: </label>
                                    <div class="col-lg-9">
                                        <input style="display:none" type="text" class="form-control" id="slc_division"
                                            name="slc_division" readOnly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="display:none" id="add_label_slc_picture"
                                        class="col-lg-3 col-form-label">Picture: </label>
                                    <div class="col-lg-9">
                                        <img style="display:none" width="180" height="180" id="slc_picture"
                                            name="slc_picture" alt=""
                                            src="<?php echo base_url(). "images/" ?>default_profile.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div id="div_rel_pic" class="col-lg-9 form-group row">
                                <label class="col-lg-3 col-form-label"><b>Client connected: </b></label>
                                <div class="col-lg-9">
                                    <select id="add_rel_id_client" name="add_rel_id_client"
                                        class="custom_select form-control" data-plugin="select2"
                                        data-placeholder="Select your Client" data-allow-clear="true">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="checkbox-custom checkbox-primary">
                                    <input type="checkbox" id="checkbox_client" onclick="checkbox_check()" />
                                    <label for="checkbox_client">New Client</label>
                                </div>
                            </div>
                            <div id="div_rel_client" style="display:none" class="col-lg-9 form-group row">
                                <label class="col-lg-3 col-form-label">Client Name: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control validate_char" id="add_nm_client"
                                        name="add_nm_client" placeHolder="type your pic name" autocomplete="off" />
                                </div>
                            </div>
                            <div id="div_rel_client_note" style="display:none" class="col-lg-9 form-group row">
                                <label class="col-lg-3 col-form-label">Note: </label>
                                <div class="col-lg-9">
                                    <textarea class="form-control validate_char" id="add_note_client"
                                        name="add_note_client" placeholder="Briefly Describe your pic"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_relation_submit" onclick="return act_confirm()"
                            class="btn btn-primary">Add Relation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Add PIC CLIENT CLIPIC -->
    <div class="modal fade modal-info example-modal-lg" id="add_pic_client" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Add Client or PIC</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbookNw/add_clipic" ?>"
                    onsubmit="disableButton()">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-9 form-group row">
                                <label class="col-lg-3 col-form-label"><b>Add: </b></label>
                                <div class="col-lg-9">
                                    <div class="radio-custom radio-default radio-inline">
                                        <input type="radio" id="add_radio_client" name="add_radio_clipic"
                                            onchange="select_radio_clipic(event)" value="0" checked />
                                        <label for="inputType_project">Client</label>
                                    </div>
                                    <div class="radio-custom radio-default radio-inline">
                                        <input type="radio" id="add_radio_piv" name="add_radio_clipic"
                                            onchange="select_radio_clipic(event)" value="1" />
                                        <label for="inputType_project">PIC</label>
                                    </div>
                                </div>
                            </div>
                            <div id="loading-clipic" style="display:none" class="loader loader-circle">
                            </div>
                        </div>
                        <hr />
                        <div id="div_clipic_client" style="display:show" class="row">
                            <div class="col-lg-9 form-group row">
                                <label class="col-lg-3 col-form-label">Client Name: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control validate_char" id="clipic_nm_client"
                                        name="clipic_nm_client" placeHolder="type your pic name" autocomplete="off"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-9 form-group row">
                                <label class="col-lg-3 col-form-label">Note: </label>
                                <div class="col-lg-9">
                                    <textarea class="form-control validate_char" id="clipic_note_client"
                                        name="clipic_note_client" placeholder="Briefly Describe your pic"
                                        requiered></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="div_clipic_pic" style="display:none" class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Status</label>
                                    <div class="col-lg-9">
                                        <div class="radio-custom radio-default radio-inline">
                                            <input class="form-control" type="radio" id="clipic_status_external"
                                                name="clipic_status_pic" onchange="select_radio_clipic_pic(event)"
                                                value="0" checked />
                                            <label for="inputstatusexternal">External</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input class="form-control" type="radio" id="add_status_internal"
                                                name="clipic_status_pic" onchange="select_radio_clipic_pic(event)"
                                                value="1" />
                                            <label for="inputstatusinternal">Internal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3">PIC name: </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control validate_char" id="clipic_nm_pic"
                                            name="clipic_nm_pic" placeHolder="type your pic name" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3">Note: </label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control validate_char" id="clipic_note_pic"
                                            name="clipic_note_pic" placeholder="Briefly Describe your pic"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div style="display:none" id="clipic_label_select_pic" class="form-group row">
                                    <label class="col-lg-3 col-form-label">Employee: </label>
                                    <div class="col-lg-8">
                                        <select id="clipic_select_pic" name="clipic_slc_pic"
                                            onchange="select_pic(event)" class="form-control" data-plugin="select2"
                                            data-placeholder="Select your PIC" data-allow-clear="true">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="display:none" id="clipic_label_slc_position"
                                        class="col-lg-3 col-form-label">Position: </label>
                                    <div class="col-lg-9">
                                        <input style="display:none" type="text" class="form-control"
                                            id="clipic_slc_position" name="clipic_slc_position" readOnly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="display:none" id="clipic_label_slc_division"
                                        class="col-lg-3 col-form-label">Division: </label>
                                    <div class="col-lg-9">
                                        <input style="display:none" type="text" class="form-control"
                                            id="clipic_slc_division" name="clipic_slc_division" readOnly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="display:none" id="clipic_label_slc_picture"
                                        class="col-lg-3 col-form-label">Picture: </label>
                                    <div class="col-lg-9">
                                        <img style="display:none" width="180" height="180" id="clipic_slc_picture"
                                            name="clipic_slc_picture" alt=""
                                            src="<?php echo base_url(). "images/" ?>default_profile.png">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_relation_submit" onclick="return act_confirm()"
                            class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <script>
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

function custom_create_confirm(con) {
    let value = parseInt(localStorage.getItem('create-wizard-lbNw')); //kalo udah sampe angka 2 (paling terakhir);
    if (value == 3) {
        var x = confirm("Yakin melanjutkan ? , Jika logbook sudah dalam status 'done' tidak dapat di update kembali.");
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

function select_id_project(e, flag) {
    $("#alert-add-logbook").hide();
    $("#add_id_client").find("option").remove();
    $("#add_id_pic").find("option").remove();
    if (flag != null) { //DARI BUTTON RADIO PROJECT MANGEMNT / SUPPORT
        id = flag;
        $("#div_relation_btn").hide();
    } else {
        id = e.target.value;
        $("#div_relation_btn").show();
    }
    //GET CLIENT DARI ID PROJECT
    client = $.ajax({
        data: {
            id_project: id
        },
        type: "POST",
        url: "<?php echo site_url('logbookNw/getClient');?>",
        // async: false,
        beforeSend: function() {
            $("#loading").show();
        },
        success: function(msg) {
            $("#loading").hide();
            console.log("[client]: " + msg);
            let dataC = JSON.parse(msg);
            for (let i = 0; i < dataC.length; i++) {
                const element = dataC[i];
                let name = element.nama_client;
                let value = element.id_client;
                $('#add_id_client').append("<option value='" + value + "'>" + name + "</option>");
            }
            if (dataC.length > 0 && flag == null) {
                for (let i = 0; i < dataC[0].list_pic.length; i++) {
                    const element = dataC[0].list_pic[i];
                    let name = element.nama_pic;
                    let value = element.id_pic;
                    if (element.id_internal == 0) {
                        name = name + " (External)";
                    } else {
                        name = name + " (Internal)";
                    }
                    $('#add_id_pic').append("<option value='" + value + "'>" + name + "</option>");
                }
            }
            if (id == "61" || id == "62") {
                select_id_client(null);
            }
            $('.selectpicker').selectpicker('refresh');
        }
    });
}

function select_id_client(e) {
    $("#alert-add-logbook").hide();
    $("#add_id_pic").find("option").remove();
    let id_type_project = $("input[name='add_type']:checked").val();
    let id = "";
    if (id_type_project == "1" || id_type_project == "2") {
        id = "0";
    } else {
        id = e.target.value;
    }
    console.log("ke tekan select id_client: " + id);
    //GET CLIENT DARI ID PROJECT
    pic = $.ajax({
        data: {
            id_client: id,
            id_type_project: id_type_project
        },
        type: "POST",
        url: "<?php echo site_url('logbookNw/getPIC');?>",
        async: false
    }).responseText;
    console.log("[pic]: " + pic);
    let dataP = JSON.parse(pic);
    for (let i = 0; i < dataP.length; i++) {
        const element = dataP[i];
        let name = element.nama_pic;
        let value = element.id_pic;
        if (element.id_internal == 0) {
            name = name + " (External)";
        } else {
            name = name + " (Internal)";
        }
        $('#add_id_pic').append(`<option value="${value}">${name}</option>`);
    }
    $('.selectpicker').selectpicker('refresh');
}

function select_id_progress(e) {
    $("#alert-add-logbook").hide();
    let status = e.target.value;
    if (status == '2') {
        document.getElementById("add_date_complete").required = true;
        document.getElementById("add_time_complete").required = true;
        $("#div_date_complete").show();
        $("#div_time_complete").show();
    } else {
        document.getElementById("add_date_complete").required = false;
        document.getElementById("add_time_complete").required = false;
        $("#div_date_complete").hide();
        $("#div_time_complete").hide();
    }
}

function select_act_id_progress(e, id) {
    $("#alert-add-logbook").hide();
    let id_date_complete = "#add_act_date_complete" + id;
    let id_time_complete = "#add_act_time_complete" + id;
    let status = e.target.value;
    if (status == '2') {
        $(id_date_complete).prop('required', true);
        $(id_time_complete).prop('required', true);
        $(id_date_complete).prop("disabled", false);
        $(id_time_complete).prop("disabled", false);
    } else {
        $(id_date_complete).prop('required', false);
        $(id_time_complete).prop('required', false);
        $(id_date_complete).prop("disabled", true);
        $(id_time_complete).prop("disabled", true);
    }
}

function add_removeDinamis(id) {
    let value = parseInt(localStorage.getItem('create-wizard-lbNw')); //kalo udah sampe angka 2 (paling terakhir);
    if (value == 3) { //INI KETIKA WIZARD UDH COMPLETE NGGA BISA REMOVE / ADD
        return;
    }

    let confirm = delX_confirm();
    if (confirm) {
        let form = "#add_act_id" + id;
        $(form).remove();
        let count = JSON.parse(localStorage.getItem('form-dinamis-add'));
        let newCt = [];
        for (let index = 0; index < count.length; index++) {
            const element = count[index];
            if (element != id) {
                newCt.push(element);
            }
        }
        localStorage.setItem('form-dinamis-add', JSON.stringify(newCt));
    };
}

function set_confirm_lb() {
    let project_type = $("input[name='add_type']:checked").val();
    let nama_project = "";
    if (project_type == 0) {
        nama_project = $("#add_id_project option:selected").text();
        $("#div_tittle_con").hide();
    } else if (project_type == 1) {
        nama_project = "SUPPORT";
        $("#div_tittle_con").show();
    } else {
        nama_project = "MANAGEMENT";
        $("#div_tittle_con").show();
    }
    let nama_client = $("#add_id_client option:selected").text();
    let nama_pic = $("#add_id_pic option:selected").text();
    document.getElementById("add_project_con").value = nama_project;
    document.getElementById("add_client_con").value = nama_client;
    document.getElementById("add_pic_con").value = nama_pic;
    document.getElementById("add_tittle_con").value = document.getElementById("add_tittle").value;;

    $("#pearl-project").attr('class', 'pearl current col-3');
    $("#pearl-logbook").attr('class', 'pearl current col-3');
    $("#pearl-activity").attr('class', 'pearl current col-3');
    $("#pearl-confirm").attr('class', 'pearl current col-3');
    $("#wizard-project-confirm").show();
    $("#wizard-project").hide();
    $("#wizard-logbook").show();
    $("#wizard-activity").show();
    // $("#div_relation_btn").hide();
    // $("#div_project_btn").hide();
    $("#btn_add_next").hide();
    $("#btn_add_submit").show();
    $("#add_radio_issue_yes").prop("disabled", true);
    $("#add_radio_issue_no").prop("disabled", true);

    let type_issue = $("input[name='add_radio_issue']:checked").val();
    if (type_issue != 1) {
        document.getElementById("add_issue").value = "";
    }

    $("#wizard-content :input").attr("readonly", true);
    $('.custom_datepicker').attr("disabled", true);
    $('.custom_timepicker').attr("disabled", true);
    $('.custom_select').attr("disabled", true);
}

function next() {
    let value = parseInt(localStorage.getItem('create-wizard-lbNw'));
    console.log("flag wizard next: " + value);
    if (value == 0) {
        let id_project = document.getElementById("add_id_project").value;
        let id_client = document.getElementById("add_id_client").value;
        let id_pic = document.getElementById("add_id_pic").value;
        let project_type = $("input[name='add_type']:checked").val();
        let tittle = document.getElementById("add_tittle").value;

        if (id_client == "" || id_pic == "" || (project_type == 0 && id_project == "")) {

            $("#alert-add-logbook").show();
            $("#pearl-project").attr('class', 'pearl current col-3 active error');
            $("#wizard-project").show();
            $("#wizard-logbook").hide();
            $("#wizard-activity").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline disabled');
            $("#btn_add_submit").click();

        } else if (project_type != 0 && tittle == "") {

            $("#alert-add-logbook").show();
            $("#pearl-project").attr('class', 'pearl current col-3 active error');
            $("#wizard-project").show();
            $("#wizard-logbook").hide();
            $("#wizard-activity").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline disabled');
            $("#btn_add_submit").click();

        } else {
            localStorage.setItem('create-wizard-lbNw', value + 1);
            $("#alert-add-logbook").hide();
            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-logbook").attr('class', 'pearl current col-3');
            $("#wizard-project").hide();
            $("#wizard-logbook").show();
            $("#wizard-activity").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline');
        }

    } else if (value == 1) {
        let type_issue = $("input[name='add_radio_issue']:checked").val();
        let date_start = document.getElementById("add_date_start").value;
        let time_start = document.getElementById("add_time_start").value;
        let date_target = document.getElementById("add_date_target").value;
        let time_target = document.getElementById("add_time_target").value;
        let issue = document.getElementById("add_issue").value;
        let location = document.getElementById("add_location").value;
        let status = document.getElementById("add_status").value;
        let date_complete = document.getElementById("add_date_complete").value;
        let time_complete = document.getElementById("add_time_complete").value;

        if (status == '2') { //done (harus ada time complete)
            if (date_start == "" || time_start == "" || date_target == "" || time_target == "" || location == "" ||
                date_complete == "" || time_complete == "" || (issue == "" && type_issue == "1")) {

                $("#alert-add-logbook").show();
                $("#pearl-logbook").attr('class', 'pearl current col-3 active error');
                $("#wizard-project").hide();
                $("#wizard-logbook").show();
                $("#wizard-activity").hide();
                $("#btn_add_next").show();
                $("#btn_add_submit").hide();
                $("#btn_add_submit").click();

            } else {
                localStorage.setItem('create-wizard-lbNw', value + 1);
                $("#alert-add-logbook").hide();
                $("#pearl-project").attr('class', 'pearl current col-3');
                $("#pearl-logbook").attr('class', 'pearl current col-3');
                $("#pearl-activity").attr('class', 'pearl current col-3');
                $("#wizard-project").hide();
                $("#wizard-logbook").hide();
                $("#wizard-activity").show();
                $("#btn_add_next").show();
                $("#btn_add_submit").hide();
            }
        } else {
            if (date_start == "" || time_start == "" || date_target == "" || time_target == "" || location == "" ||
                (issue == "" && type_issue == "1")) {

                $("#alert-add-logbook").show();
                $("#pearl-logbook").attr('class', 'pearl current col-3 active error');
                $("#wizard-project").hide();
                $("#wizard-logbook").show();
                $("#wizard-activity").hide();
                $("#btn_add_next").show();
                $("#btn_add_submit").hide();
                $("#btn_add_submit").click();

            } else {
                //ini diakal akalin di tuker tanggal nya bulan ke day.            
                let ds = date_start.split('/');
                let dt = date_target.split('/');
                let tgl_start = ds[1] + "/" + ds[0] + "/" + ds[2] + " " + time_start + ":00";
                let tgl_target = dt[1] + "/" + dt[0] + "/" + dt[2] + " " + time_target + ":00";
                var dstart = new Date(tgl_start);
                var dtarget = new Date(tgl_target);

                if (dstart.getTime() >= dtarget.getTime()) {
                    $("#alert-add-logbook").hide();
                    $("#alert-validate-date").show();
                    $("#pearl-logbook").attr('class', 'pearl current col-3 active error');
                    $("#wizard-project").hide();
                    $("#wizard-logbook").show();
                    $("#wizard-activity").hide();
                    $("#btn_add_next").show();
                    $("#btn_add_submit").hide();
                } else {
                    localStorage.setItem('create-wizard-lbNw', value + 1);
                    $("#alert-add-logbook").hide();
                    $("#alert-validate-date").hide();
                    $("#pearl-project").attr('class', 'pearl current col-3');
                    $("#pearl-logbook").attr('class', 'pearl current col-3');
                    $("#pearl-activity").attr('class', 'pearl current col-3');
                    $("#wizard-project").hide();
                    $("#wizard-logbook").hide();
                    $("#wizard-activity").show();
                    $("#btn_add_next").show();
                    $("#btn_add_submit").hide();
                }
            }
        }

    } else if (value == 2) {

        let count = JSON.parse(localStorage.getItem('form-dinamis-add'));
        let fg = false;
        for (let i = 0; i < count.length; i++) {
            const element = count[i];
            if (document.getElementById("add_act_activity" + element).value == "") {
                $("#alert-add-logbook").show();
                $("#btn_add_submit").click();
                break;
            } else if (document.getElementById("add_act_note" + element).value == "") {
                $("#alert-add-logbook").show();
                $("#btn_add_submit").click();
                break;
            } else if (document.getElementById("add_act_date_start" + element).value == "") {
                $("#alert-add-logbook").show();
                $("#btn_add_submit").click();
                break;
            } else if (document.getElementById("add_act_time_start" + element).value == "") {
                $("#alert-add-logbook").show();
                $("#btn_add_submit").click();
                break;
            } else if (document.getElementById("add_status").value == "2" && document.getElementById("add_act_status" +
                    element).value == "1") {
                $("#alert-add-logbook2").show();
                break;

            } else {

                if (document.getElementById("add_act_status" + element).value == "2" &&
                    (document.getElementById("add_act_date_complete" + element).value == "" || document.getElementById(
                        "add_act_time_complete" + element).value == "")) {
                    $("#alert-add-logbook").show();
                    $("#btn_add_submit").click();
                    break;

                } else {
                    let status_act = document.getElementById("add_act_status" + element).value;
                    let ds_act = document.getElementById("add_act_date_start" + element).value.split('/');
                    let dc_act = document.getElementById("add_act_date_complete" + element).value.split('/');
                    let tgl_start_act = ds_act[1] + "/" + ds_act[0] + "/" + ds_act[2] + " " + document.getElementById(
                        "add_act_time_start" + element).value + ":00";
                    let tgl_complete_act = dc_act[1] + "/" + dc_act[0] + "/" + dc_act[2] + " " + document
                        .getElementById(
                            "add_act_time_complete" + element).value + ":00";
                    var dstart_act = new Date(tgl_start_act);
                    var dcomp_act = new Date(tgl_complete_act);

                    if (status_act == "2" && (dstart_act.getTime() >= dcomp_act.getTime())) {
                        $("#alert-validate-date").show();
                        break;
                    } else if (i == count.length - 1) {
                        fg = true;
                    }

                }
            }
        }
        if (fg) {
            localStorage.setItem('create-wizard-lbNw', value + 1);
            $("#alert-add-logbook").hide();
            $("#alert-add-logbook2").hide();
            $("#alert-validate-date").hide();
            //confirmation
            set_confirm_lb();
        }

    } else {
        console.log("tinggal di submit");
    }
}

function back() {
    let value = parseInt(localStorage.getItem('create-wizard-lbNw'));
    console.log("flag wizard back: " + value);
    if (value > 0) {
        value = value - 1;
        localStorage.setItem('create-wizard-lbNw', value);
        if (value == 0) { //form project

            // let project_type = $("input[name='add_type']:checked").val();
            // if (project_type == 0) {
            //     $("#div_project_btn").show();
            //     $("#div_relation_btn").show();
            // } else {
            //     $("#div_project_btn").hide();
            //     $("#div_relation_btn").hide();
            // }
            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-logbook").attr('class', 'pearl col-3');
            $("#pearl-activity").attr('class', 'pearl col-3');
            $("#pearl-confirm").attr('class', 'pearl col-3');
            $("#wizard-project").show();
            $("#wizard-logbook").hide();
            $("#wizard-activity").hide();
            $("#btn_add_next").show();
            $("#btn_add_submit").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline disabled');
            $("#alert-add-logbook").hide();
            $("#alert-validate-date").hide();
            $("#wizard-content :input").attr("readonly", false);

        } else if (value == 1) { //form logbook
            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-logbook").attr('class', 'pearl current col-3');
            $("#pearl-activity").attr('class', 'pearl col-3');
            $("#pearl-confirm").attr('class', 'pearl col-3');
            $("#wizard-project").hide();
            $("#wizard-logbook").show();
            $("#wizard-activity").hide();
            $("#btn_add_next").show();
            $("#btn_add_submit").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline');
            $("#alert-add-logbook").hide();
            $("#alert-validate-date").hide();
            // $("#div_relation_btn").hide();
            // $("#div_project_btn").hide();
            $("#wizard-content :input").attr("readonly", false);

        } else if (value == 2) { //form activity
            $("#pearl-project").attr('class', 'pearl current col-3');
            $("#pearl-logbook").attr('class', 'pearl current col-3');
            $("#pearl-activity").attr('class', 'pearl current col-3');
            $("#pearl-confirm").attr('class', 'pearl col-3');
            $("#wizard-project").hide();
            $("#wizard-logbook").hide();
            $("#wizard-activity").show();
            $("#btn_add_next").show();
            $("#btn_add_submit").hide();
            $("#btn_add_back").attr('class', 'btn btn-primary btn-outline');
            $("#alert-add-logbook").hide();
            $("#alert-validate-date").hide();
            // $("#div_relation_btn").hide();
            // $("#div_project_btn").hide();

            //hide confirmation
            $("#wizard-project-confirm").hide();
            $("#wizard-content :input").attr("readonly", false);
            $("#add_radio_issue_yes").prop("disabled", false);
            $("#add_radio_issue_no").prop("disabled", false);
            $('.custom_datepicker').attr("disabled", false);
            $('.custom_timepicker').attr("disabled", false);
            $('.custom_select').attr("disabled", false)
        } else {
            console.log("tidak ada");
        }
    }
}

function select_radio_project(e) {
    $("#alert-add-logbook").hide();
    let status = e.target.value;
    if (status == '0') {
        document.getElementById("add_tittle").required = false;
        $("#div_project").show();
        $("#div_project_btn").show();
        // $("#div_relation_btn").show();
        $("#div_add_clipic_btn").hide();
        $("#div_tittle").hide();
        $("#add_id_client").find("option").remove();
        $("#add_id_pic").find("option").remove();
        document.getElementById("add_id_project").value = "";
        document.getElementById("add_id_project_id").value = "";
        $('.selectpicker').selectpicker('refresh');
    } else if (status == '1') {
        document.getElementById("add_tittle").required = true;
        $("#div_project").hide();
        $("#div_project_btn").hide();
        $("#div_tittle").show();
        $("#div_relation_btn").hide();
        $("#div_add_clipic_btn").show();
        select_id_project(null, '61');
        document.getElementById("add_id_project").value = "";
        document.getElementById("add_id_project_id").value = "61";
    } else {
        document.getElementById("add_tittle").required = true;
        $("#div_project").hide();
        $("#div_project_btn").hide();
        $("#div_tittle").show();
        $("#div_relation_btn").hide();
        $("#div_add_clipic_btn").show();
        select_id_project(null, '62');
        document.getElementById("add_id_project").value = "";
        document.getElementById("add_id_project_id").value = "62";
    }
}

function select_radio_issue(e) {
    let status = e.target.value;
    document.getElementById("add_type_issue").value = status;
    if (status == '0') {
        document.getElementById("add_issue").required = false;
        document.getElementById("add_issue").disabled = true;
        document.getElementById("add_issue").value = "";
    } else {
        document.getElementById("add_issue").required = true;
        document.getElementById("add_issue").disabled = false;
    }
}

//FUNCTION UNTUK MODAL RELASI

function select_pic(e, flag) {
    if (flag != null) {
        id_pic = flag;
    } else {
        id_pic = e.target.value;
    }
    $.ajax({
        data: {
            id_pic: id_pic
        },
        type: "POST",
        url: "<?php echo site_url('pic/getPIC');?>",
        // async: false
        beforeSend: function() {
            $("#loading-rel").show();
            $("#loading-clipic").show();
        },
        success: function(msg) {
            let position = msg.split("|")[0];
            let division = msg.split("|")[1];
            let images = msg.split("|")[2];
            document.getElementById("slc_position").value = position;
            document.getElementById("slc_division").value = division;
            $("#slc_picture").attr("src", images);
            $("#loading-rel").hide();
            // ID CLIPIC MODAL CLIPIC
            document.getElementById("clipic_slc_position").value = position;
            document.getElementById("clipic_slc_division").value = division;
            $("#clipic_slc_picture").attr("src", images);
            $("#loading-clipic").hide();
        }
    });
}

function open_modal_rel() {
    $("#alert-add-logbook").hide();
    let id_project = document.getElementById("add_id_project").value;
    let nama_project = $("#add_id_project option:selected").text();
    document.getElementById("add_rel_id_project").value = id_project;
    document.getElementById("add_rel_project").value = nama_project;
    let id = "61"; //61/62
    let id_type_project = "1"; //1/2

    client = $.ajax({
        data: {
            id_project: id
        },
        type: "POST",
        url: "<?php echo site_url('logbookNw/getClient');?>",
        // async: false,
        beforeSend: function() {
            $("#loading-rel").show();
        },
        success: function(msg) {
            let dataC = JSON.parse(msg);
            for (let i = 0; i < dataC.length; i++) {
                const element = dataC[i];
                let name = element.nama_client;
                let value = element.id_client;
                $('#add_rel_id_client').append("<option value='" + value + "'>" + name + "</option>");
            }
            pic = $.ajax({
                data: {
                    id_client: id,
                    id_type_project: id_type_project
                },
                type: "POST",
                url: "<?php echo site_url('logbookNw/getPIC');?>",
                async: false
            }).responseText;
            let dataP = JSON.parse(pic);
            for (let i = 0; i < dataP.length; i++) {
                const element = dataP[i];
                let name = element.nama_pic;
                let value = element.id_pic;
                if (element.id_internal == 0) {
                    name = name + " (External)";
                } else {
                    name = name + " (Internal)";
                }
                $('#add_rel_id_pic').append(`<option value="${value}">${name}</option>`);
            }
            $("#loading-rel").hide();
        }
    });

}

function select_radio(e) {
    let status = e.target.value;
    if (status == '0') {
        // $("#div_rel_pic_left").show();
        // $("#div_rel_pic_right").hide();
        $("#add_label_select_pic").hide();
        $("#add_nm_pic").removeAttr('readonly');
        $("#add_label_slc_position").hide();
        $("#slc_position").hide();
        $("#add_label_slc_division").hide();
        $("#slc_division").hide();
        $("#add_label_slc_picture").hide();
        $("#slc_picture").hide();
        document.getElementById("add_nm_pic").required = true;
        document.getElementById("add_note_pic").required = true;
        document.getElementById("add_select_pic").required = false;

    } else {
        // $("#div_rel_pic_left").hide();
        // $("#div_rel_pic_right").show();
        // $("#add_slc_pic").show();
        let id = "";
        client = $.ajax({
            data: {
                id_project: id
            },
            type: "POST",
            url: "<?php echo site_url('pic/getAllpegawai');?>",
            // async: false,
            beforeSend: function() {
                $("#loading-rel").show();
            },
            success: function(msg) {
                $("#loading-rel").hide();
                let dataC = JSON.parse(msg);
                for (let i = 0; i < dataC.length; i++) {
                    const element = dataC[i];
                    let name = element.full_name;
                    let value = element.iduser;
                    let nmsubdiv = element.nmsubdiv;
                    $('#add_select_pic').append("<option value='" + value + "'>" + name + " | " + nmsubdiv +
                        " </option>");
                }
                select_pic(null, dataC[0].iduser);
            }
        });
        $("#add_label_select_pic").show();
        $("#add_nm_pic").attr('readonly', 'readonly');
        $("#add_label_slc_position").show();
        $("#slc_position").show();
        $("#slc_division").show();
        $("#add_label_slc_division").show();
        $("#add_label_slc_picture").show();
        $("#slc_picture").show();
        document.getElementById("add_nm_pic").required = false;
        document.getElementById("add_note_pic").required = true;
        document.getElementById("add_select_pic").required = true;
    }
}

function checkbox_check() {
    let check_box_pic = document.getElementById("checkbox_pic").checked;
    let check_box_client = document.getElementById("checkbox_client").checked;

    if (check_box_pic) { //jika pic di check
        $("#add_rel_id_pic").prop('disabled', true);
        $("#div_rel_pic_left").show()
        $("#div_rel_pic_right").show();
        document.getElementById("add_rel_id_pic").required = false;
        document.getElementById("add_nm_pic").required = true;
        document.getElementById("add_note_pic").required = true;

    } else {
        $("#add_rel_id_pic").prop('disabled', false);
        $("#div_rel_pic_left").hide()
        $("#div_rel_pic_right").hide();
        document.getElementById("add_rel_id_pic").required = true;
        document.getElementById("add_nm_pic").required = false;
        document.getElementById("add_note_pic").required = false;
    }

    if (check_box_client) { //jika client di check
        $("#add_rel_id_client").prop('disabled', true);
        $("#div_rel_client").show()
        $("#div_rel_client_note").show();
        document.getElementById("add_rel_id_client").required = false;
        document.getElementById("add_nm_client").required = true;
        document.getElementById("add_note_client").required = true;
    } else {
        $("#add_rel_id_client").prop('disabled', false);
        $("#div_rel_client").hide()
        $("#div_rel_client_note").hide();
        document.getElementById("add_rel_id_client").required = true;
        document.getElementById("add_nm_client").required = false;
        document.getElementById("add_note_client").required = false;
    }

}

//FUNCTION ADD CLIPIC CLIENT OR PIC
function select_radio_clipic(e) {
    let status = e.target.value;
    if (status == '0') {
        $("#div_clipic_client").show();
        $("#div_clipic_pic").hide();
        document.getElementById("clipic_nm_client").required = true;
        document.getElementById("clipic_note_client").required = true;
        document.getElementById("clipic_nm_pic").required = false;
        document.getElementById("clipic_note_pic").required = false;
    } else {
        $("#div_clipic_client").hide();
        $("#div_clipic_pic").show();
        document.getElementById("clipic_nm_client").required = false;
        document.getElementById("clipic_note_client").required = false;
        document.getElementById("clipic_nm_pic").required = true;
        document.getElementById("clipic_note_pic").required = true;
    }
}

function select_radio_clipic_pic(e) {
    let status = e.target.value;
    if (status == '0') {
        $("#clipic_label_select_pic").hide();
        $("#clipic_nm_pic").removeAttr('readonly');
        $("#clipic_label_slc_position").hide();
        $("#clipic_slc_position").hide();
        $("#clipic_label_slc_division").hide();
        $("#clipic_slc_division").hide();
        $("#clipic_label_slc_picture").hide();
        $("#clipic_slc_picture").hide();
        document.getElementById("clipic_nm_pic").required = true;
        document.getElementById("clipic_note_pic").required = true;
        document.getElementById("clipic_select_pic").required = false;

    } else {
        let id = "";
        client = $.ajax({
            data: {
                id_project: id
            },
            type: "POST",
            url: "<?php echo site_url('pic/getAllpegawai');?>",
            // async: false,
            beforeSend: function() {
                $("#loading-clipic").show();
            },
            success: function(msg) {
                $("#loading-clipic").hide();
                let dataC = JSON.parse(msg);
                for (let i = 0; i < dataC.length; i++) {
                    const element = dataC[i];
                    let name = element.full_name;
                    let value = element.iduser;
                    let nmsubdiv = element.nmsubdiv;
                    $('#clipic_select_pic').append("<option value='" + value + "'>" + name + " | " +
                        nmsubdiv +
                        " </option>");
                }
                select_pic(null, dataC[0].iduser);
            }
        });
        $("#clipic_label_select_pic").show();
        $("#clipic_nm_pic").attr('readonly', 'readonly');
        $("#clipic_label_slc_position").show();
        $("#clipic_slc_position").show();
        $("#clipic_slc_division").show();
        $("#clipic_label_slc_division").show();
        $("#clipic_label_slc_picture").show();
        $("#clipic_slc_picture").show();
        document.getElementById("clipic_nm_pic").required = false;
        document.getElementById("clipic_note_pic").required = true;
        document.getElementById("clipic_select_pic").required = true;
    }
}

$(document).ready(function() {
    console.log("DOCUMENT READY FUNCTION");
    // let value = localStorage.getItem('create-wizard-lbNw');
    // if (value == null) {
    localStorage.setItem('create-wizard-lbNw', 0);
    // }
    console.log("flag document ready: ");

    var add_buttonAdd = $('#add_addDinamis');
    let last_act = parseInt("1");
    var first = [];
    first.push(last_act);
    localStorage.setItem('form-dinamis-add', JSON.stringify(first));

    $(add_buttonAdd).click(function() {
        let value = parseInt(localStorage.getItem(
            'create-wizard-lbNw')); //kalo udah sampe angka 2 (paling terakhir);
        if (value == 3) { //INI KETIKA WIZARD UDH COMPLETE NGGA BISA REMOVE / ADD
            return;
        }

        //Check maximum number of input fields
        let count = JSON.parse(localStorage.getItem('form-dinamis-add'));
        let id = count[count.length - 1] + 1;
        $("#add_act_table").append(
            "<tr id='add_act_id" + id + "'><td>" + id +
            "<input hidden type='text' class='form-control' name='add_act_id[]' value='0' required /></td><td><textarea class='form-control' id='add_act_activity" +
            id +
            "' name='add_act_activity[]' placeholder='type your activity' required></textarea></td>" +
            "<td><textarea class='form-control' id='add_act_note" + id +
            "' name='add_act_note[]' placeholder='type your note' required></textarea></td>" +
            "<td><select id='add_act_status" + id +
            "' name='add_act_status[]' class='custom_select form-control' onchange='select_act_id_progress(event," +
            id +
            ")' required><option value='1'>Progress</option><option value='2'>Done</option></select></td>" +
            "<td><div class='input-group'><span class='input-group-addon'><i class='icon wb-calendar' aria-hidden='true'></i></span><input type='text' class='custom_datepicker form-control' id='add_act_date_start" +
            id +
            "' name='add_act_date_start[]' required/><span class='input-group-addon'><i class='icon wb-time' aria-hidden='true'></i></span><input type='text' class='custom_timepicker form-control' name='add_act_time_start[]' id='add_act_time_start" +
            id + "' required/></div></td>" +
            "<td><div class='input-group'><span class='input-group-addon'><i class='icon wb-calendar' aria-hidden='true'></i></span><input type='text' class='custom_datepicker form-control' id='add_act_date_complete" +
            id +
            "' name='add_act_date_complete[]' disabled/><span class='input-group-addon'><i class='icon wb-time' aria-hidden='true'></i></span><input type='text' class='custom_timepicker form-control' id='add_act_time_complete" +
            id + "' name='add_act_time_complete[]' disabled/></div></td>" +
            "<td><button type='button' onClick='return add_removeDinamis(" + id +
            ")' class='btn btn-pure btn-default icon wb-trash p-0'></button></td></tr>"
        );
        count.push(id);
        localStorage.setItem('form-dinamis-add', JSON.stringify(count));

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