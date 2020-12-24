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
            <!-- <div class="row"> -->
            <!-- <div class="col-xxl-9 col-xl-8 col-lg-12"> -->
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title project-title">
                        ID LB891PR72PD61PG821PC12
                        <hr />
                    </h4>
                    <div class="row" style="margin-left: 1px; margin-right: 30px;">
                        <div class="column" style="float: left;width: 12%;">
                            <p><b>Name</b></p>
                            <p><b>Division</b></p>
                            <p><b>Position</b></p>
                        </div>
                        <div class="column" style="float: left;width: 50%;">
                            <p id="v_name">: Abdul Hanif Al Baaits</p>
                            <p id="v_division">: Technical Supoort - Development</p>
                            <p id="v_position">: Development Staff</p>
                        </div>
                    </div>
                    <hr />
                    <div class="row" style="margin-left: 1px; margin-right: 30px;">
                        <div class="column" style="float: left;width: 12%;">
                            <p><b>Project Name</b></p>
                            <!-- <p id="vt_tittle"><b>Tittle</b></p> -->
                            <p><b>Client Name</b></p>
                            <p><b>PIC Name</b></p>
                        </div>
                        <div class="column" style="float: left;width: 50%;">
                            <p id="v_project_name">: RKA Web</p>
                            <!-- <p id="v_tittle">: EXAMPLE</p> -->
                            <p id="v_client_name">: Graha Informatika Nusantara</p>
                            <p id="v_pic_name">: Rizky Ardiansyah</p>
                        </div>
                        <div class="column" style="float: left; width: 14%;">
                            <p><b>Location</b></p>
                            <p><b>Status</b></p>
                        </div>
                        <div class="column" style="float: left; width: 24%;">
                            <p id="v_location">: Slipi</p>
                            <p id="v_id_progress">: Done</p>
                        </div>
                    </div>
                    <hr />
                    <div class="row" style="margin-left: 1px; margin-right: 30px;">
                        <div class="column" style="float: left;width: 12%;">
                            <p><b>Start Date</b></p>
                            <p><b>Date Target</b></p>
                        </div>
                        <div class="column" style="float: left;width: 50%;">
                            <p id="v_date_start">: 22 Nov 2019 08:00:00</p>
                            <p id="v_date_target">: 22 Nov 2019 17:00:00</p>
                        </div>
                        <div class="column" style="float: left; width: 14%;">
                            <p><b>Date Complete</b></p>
                            <p><b>Date Modified</b></p>
                        </div>
                        <div class="column" style="float: left; width: 24%;">
                            <p id="v_date_complete">: 22 Nov 2019 17:00:00</p>
                            <p id="v_date_mod">: 22 Nov 2019 17:00:00</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-block">
                            <ul class="project-team-items clearfix">
                                <li class="team-item">
                                    <a href="#" class="avatar avatar-sm my-5">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/4.jpg">
                                    </a>
                                </li>
                                <li class="team-item item-divider">
                                    <i class="icon wb-chevron-right mr-0"></i>
                                </li>
                                <li class="team-item">
                                    <a class="avatar avatar-sm my-5 mr-5" data-member-id="m_1">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg" />
                                    </a>
                                    <a class="avatar avatar-sm my-5 mr-5" data-member-id="m_2">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/2.jpg" />
                                    </a>
                                    <a class="avatar avatar-sm my-5 mr-5" data-member-id="m_3">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/3.jpg" />
                                    </a>
                                    <a class="avatar avatar-sm my-5 mr-5" data-member-id="m_4">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/5.jpg" />
                                    </a>
                                    <a class="avatar avatar-sm my-5 mr-5" data-member-id="m_5">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/6.jpg" />
                                    </a>
                                    <a class="avatar avatar-sm my-5 mr-5" data-member-id="m_6">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/7.jpg" />
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                <div class="card-block ">
                    <div class="project-controls clearfix">
                        <div class="float-left">
                            <a href="<?php echo site_url("logbookNw/status/3"); ?>" onclick='return del_confirm()'
                                class="btn btn-outline btn-danger"><i class="icon wb-trash"></i> Delete </a>
                        </div>
                        <div class="float-right">
                            <a href="<?php echo site_url("logbookNw/status/3"); ?>" onclick='return act_confirm()'
                                class="btn btn-outline btn-primary"><i class="icon wb-close"></i> Hold </a>
                            <a href="#" class="btn btn-outline btn-success" data-toggle="modal"
                                data-target="#donelogbook" onClick="return done_logbook('1')"><i
                                    class="icon wb-check"></i>
                                Done
                            </a>
                            <div class="dropdown">
                                <button type="button" class="btn btn-warning btn-outline dropdown-toggle mr-0"
                                    data-toggle="dropdown" aria-expanded="true">
                                    <i class="icon wb-pencil"></i> Update
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item" role="menuitem" data-toggle="modal"
                                        data-target="#editlocation" onClick="return edit_location('1','Jakarta')">
                                        Update Location
                                    </a>
                                    <a href="#" class="dropdown-item" role="menuitem" data-toggle="modal"
                                        data-target="#addactivity">
                                        Add Activity
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block ">
                    <h4 class="card-title project-title">
                        ISSUE : Membuat Web RKA
                        <div class="row">
                            <div class="col-10 mt-30" style="vertical-align: middle;">
                                <div class="progress progress-xs table-content">
                                    <div class="progress-bar progress-bar-warning progress-bar-indicating"
                                        style="width: 50%" role="progressbar">
                                        <span class="sr-only">50%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 mt-20">
                                50 %
                            </div>
                        </div>
                        <hr />
                    </h4>
                    <table class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:25%">Activity</th>
                                <th style="width:30%">Note</th>
                                <th style="width:5%">Status</th>
                                <th style="width:15%">Start Date</th>
                                <th style="width:15%">Complete Date</th>
                                <th style="width:5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td style="text-align:justify;">Reprehenderit do magna
                                    voluptate
                                    consequat nisi in
                                    deserunt. Ex esse sit
                                    nulla
                                    aliqua.</td>
                                <td style="text-align:justify;">Ex excepteur consectetur
                                    sunt laborum eu magna ipsum ut. Aliqua deserunt elit
                                    minim incididunt tempor
                                    ut tempor aliqua. Veniam esse cupidatat dolore eiusmod
                                    eiusmod veniam commodo.</td>
                                <td><span class="badge badge-success">Done</span></td>
                                <td>2 April 2020 09:00</td>
                                <td>3 April 2020 09:00</td>
                                <td>
                                    <a href="<#" data-toggle="modal" data-target="#editactivity"
                                        onClick="return edit_activity('1','1','activity','catatan')"
                                        class="btn btn-pure btn-default icon wb-pencil p-0 btn-edit"></a>
                                    <a href="<?php echo site_url("logbookNw/delete_activity/3"); ?>"
                                        onclick='return del_confirm()'
                                        class="btn btn-pure btn-default icon wb-trash p-0 btn-trash"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td style="text-align:justify;">Reprehenderit do magna
                                    voluptate
                                    consequat nisi in
                                    deserunt. Ex esse sit
                                    nulla
                                    aliqua.</td>
                                <td style="text-align:justify;">Ex excepteur consectetur
                                    sunt laborum eu magna ipsum ut. Aliqua deserunt elit
                                    minim incididunt tempor
                                    ut tempor aliqua. Veniam esse cupidatat dolore eiusmod
                                    eiusmod veniam commodo.</td>
                                <td><span class="badge badge-warning">Progress</span></td>
                                <td>2 April 2020 09:00</td>
                                <td></td>
                                <td>
                                    <a href="<#" data-toggle="modal" data-target="#editactivity"
                                        onClick="return edit_activity('1','1','activity','catatan')"
                                        class="btn btn-pure btn-default icon wb-pencil p-0 btn-edit"></a>
                                    <a href="<?php echo site_url("logbookNw/delete_activity/3"); ?>"
                                        onclick='return del_confirm()'
                                        class="btn btn-pure btn-default icon wb-trash p-0 btn-trash"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr />
                </div>
            </div>
            <!-- <div class="panel panel-bordered panel-info is-collapse">
                <div class="panel-heading">
                    <h3 class="panel-title">Issue : Membuat Web RKA</h3>
                    <div class="panel-actions">
                        <a class="panel-action icon wb-plus" data-toggle="panel-collapse" aria-expanded="true"
                            aria-hidden="true"></a>
                        <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel panel-body card-block project-comments">
                    <div class="comments">
                        <div class="comment media">
                            <div class="pr-15">
                                1.
                            </div>
                            <div class="comment-body media-body">
                                <div class="comment-title">
                                    <div class="comment-meta float-right">
                                        <span>04.07.11, 8:02 AM</span>
                                    </div>
                                    <a href="javascript:void(0)" class="comment-author">
                                        <b>Activity</b>
                                    </a>
                                </div>
                                <div class="comment-content">
                                    <p style="text-align:justify;">
                                        Script web untuk pembuatan bagian list rka.
                                    </p>
                                    <a href="<#" data-toggle="modal" data-target="#editactivity"
                                        onClick="return edit_activity('1','1','activity','catatan')"
                                        class="btn btn-pure btn-default icon wb-pencil p-0 btn-edit"></a>
                                    <a href="<?php echo site_url("logbookNw/delete_activity/3"); ?>"
                                        onclick='return del_confirm()'
                                        class="btn btn-pure btn-default icon wb-trash p-0 btn-trash"></a>
                                </div>
                                <div class="comment-title">
                                    <b>Note</b>
                                </div>
                                <div class="comment-content">
                                    <p style="text-align:justify;">
                                        API Searching dan GET data dari backend masih data null, sehingga belum
                                        dapat di
                                        view.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="comment media">
                            <div class="pr-15">
                                2.
                                <a href="#" class="avatar avatar-sm">
                                    <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg" alt="...">
                                </a>
                            </div>
                            <div class="comment-body media-body">
                                <div class="comment-title">
                                    <div class="comment-meta float-right">
                                        <span>04.07.11, 8:02 AM</span>
                                    </div>
                                    <a href="javascript:void(0)" class="comment-author">
                                        <b>Activity</b>
                                    </a>
                                </div>
                                <div class="comment-content">
                                    <p style="text-align:justify;">
                                        Membuat modal create update delete RKA
                                    </p>
                                    <a href="<#" data-toggle="modal" data-target="#editactivity"
                                        onClick="return edit_activity('1','1','activity','catatan')"
                                        class="btn btn-pure btn-default icon wb-pencil p-0 btn-edit"></a>
                                    <a href="<?php echo site_url("logbookNw/delete_activity/3"); ?>"
                                        onclick='return del_confirm()'
                                        class="btn btn-pure btn-default icon wb-trash p-0 btn-trash"></a>
                                </div>
                                <div class="comment-title">
                                    <b>Note</b>
                                </div>
                                <div class="comment-content">
                                    <p style="text-align:justify;">
                                        done
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="float-right">
                        <a href="#" class="btn btn-outline btn-info" data-toggle="modal" data-target="#addactivity"
                            onClick="return done_logbook('1')"><i class="icon wb-plus"></i>
                            Add Activity
                        </a>
                    </div>
                </div>
            </div> -->

            <!-- </div> -->
            <!-- <div class="col-xxl-3 col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <p class="mb-10">
                                <span class="float-right pl-10">4h 30m</span>
                                Time estimated
                            </p>
                            <p>
                                <span class="float-right pl-10">2h 10m</span>
                                Time working
                            </p>
                            </ul>
                            <div class="progress progress-xs mb-10">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemax="100"
                                    aria-valuemin="0" aria-valuenow="60" style="width: 60%;">
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="project-option-title">Label</h4>
                            <span class="badge badge-default badge-outline mr-5 mb-5">Default</span>
                            <span class="badge badge-primary mr-5 mb-5">Primary</span>
                            <span class="badge badge-success mr-5 mb-5">Success</span>
                            <span class="badge badge-info mr-5 mb-5">Info</span>
                            <span class="badge badge-warning mr-5 mb-5">Warning</span>
                            <span class="badge badge-danger mr-5 mb-5">Danger</span>
                            <span class="badge badge-dark mr-5 mb-5">Dark</span>
                        </div>
                        <div class="card-block">
                            <h4 class="project-option-title">Assigned to</h4>
                            <div class="media mt-0">
                                <div class="pr-20 text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/4.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-5 font-size-16">Tim Collins</h4>
                                    <span>Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-block project-participators">
                            <h4 class="project-option-title">People</h4>
                            <div class="media mt-0">
                                <div class="pr-20 text-middle">
                                    <span>Assignee</span>
                                </div>
                                <div class="media-body">
                                    <a href="javascript:void(0)" class="avatar avatar-sm text-middle">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/4.jpg">
                                    </a>
                                    <span class="font-size-16 ml-5">Tim Collins</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pr-20 text-middle">
                                    <span>Reporter</span>
                                </div>
                                <div class="media-body">
                                    <a href="javascript:void(0)" class="avatar avatar-sm text-middle">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/4.jpg">
                                    </a>
                                    <span class="font-size-16 ml-5">Tim Collins</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pr-20">
                                    <span>Votes
                                        <span>
                                </div>
                                <div class="media-body">
                                    <a class="media-content">
                                        <span>11</span>
                                        vote for this issue
                                    </a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pr-20">
                                    <span>Watches
                                        <span>
                                </div>
                                <div class="media-body">
                                    <a class="media-content">
                                        <span>56</span>
                                        start watching this issue
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-block project-dates">
                            <h4 class="project-option-title">Dates</h4>
                            <p class="mb-10">
                                <span>Created:</span>
                                5 days ago
                            </p>
                            <p class="mb-10">
                                <span>Updates:</span>
                                6 days ago
                            </p>
                        </div>
                        <div class="card-block">
                            <h4 class="project-option-title">Developers</h4>
                            <a href="#">Create branch</a>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">Agile</h4>
                            <span class="pr-50">Future Sprint</span>
                            <span>Sprit - Signature</span>
                            <a href="#" class="project-agility-view">View on Board</a>
                        </div>
                        <div class="card-block project-fast-operation">
                            <a href="#">
                                <i class="icon wb-check-circle mr-10"></i>
                                <span>Create checklist</span>
                            </a>
                            <a href="#">
                                <i class="icon wb-bell mr-10"></i>
                                <span>Due date</span>
                            </a>
                            <a href="#">
                                <i class="icon wb-folder mr-10"></i>
                                <span>Move to archive</span>
                            </a>
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->

        </div>
    </div>
    <!-- End Page -->

    <!-- Modal Done logbook -->
    <div class="modal fade modal-info" id="donelogbook" aria-hidden="true" aria-labelledby="searchModal" role="dialog"
        tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Done Logbook</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbook" ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="start_date">Date Complete</label>
                                <input type="text" class="form-control" id="edit_date_complete"
                                    name="edit_date_complete" autocomplete="off" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="end_date">Time Complete</label>
                                <input type="time" class="form-control" id="add_time_complete" name="add_time_complete"
                                    value="17:00" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Edit Location -->
    <div class="modal fade modal-info" id="editlocation" aria-hidden="true" aria-labelledby="exampleModalInfo"
        role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Edit Location</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbookNw/edit_location" ?>"
                    onsubmit="disableButton()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Location: </label>
                            <div class="col-md-9">
                                <textarea id="edit_location" name="edit_location" class="form-control"
                                    placeholder="type location you're doing logbook"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add_submit" class="btn btn-primary">Update Location</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Add ISSUE -->
    <div class="modal fade modal-info" id="addissue" aria-hidden="true" aria-labelledby="exampleModalInfo" role="dialog"
        tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Add Issue</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbookNw/add_issue" ?>"
                    onsubmit="disableButton()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Your Issue: </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control validate_char" id="add_issue" name="add_issue"
                                    placeholder="Type your issue" autocomplete="off" required />
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="form-control-label"><span class="badge badge-info">info</span> First check
                                whether the client has been registered before!</label>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add_submit" class="btn btn-primary">Add Issue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Add Activity -->
    <div class="modal fade modal-info" id="addactivity" aria-hidden="true" aria-labelledby="exampleModalInfo"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Add Activity</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbook/add_activity" ?>"
                    onsubmit="disableButton()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Activity: </label>
                            <div class="col-md-9">
                                <textarea id="edit_activity" name="edit_activity validate_char" class="form-control"
                                    placeholder="Type your activity"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Note: </label>
                            <div class="col-md-9">
                                <textarea id="edit_note" name="edit_note validate_char" class="form-control"
                                    placeholder="Type your note"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Start Date: </label>
                            <div class="col-md-9">
                                <input id="edit_activity" name="edit_activity validate_char" class="form-control"
                                    placeholder="Type your activity" value="2 April 2020" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Status: </label>
                            <div class="col-md-9">
                                <select id="edit_slc_issue" name="edit_slc_issue" onchange="select_pic(event)"
                                    class="form-control" data-plugin="select2" data-placeholder="Select your status"
                                    data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Progress</option>
                                    <option value="1">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Complete Date: </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="start_date" name="start_date"
                                    autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add_submit" class="btn btn-primary">Add Activity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Edit Activity -->
    <div class="modal fade modal-info" id="editactivity" aria-hidden="true" aria-labelledby="exampleModalInfo"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Edit Activity</h4>
                </div>
                <form data-parsley-validate class="form-horizontal form-label-left" method="post"
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbook/edit_activity" ?>"
                    onsubmit="disableButton()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Activity: </label>
                            <div class="col-md-9">
                                <textarea id="edit_activity" name="edit_activity validate_char" class="form-control"
                                    placeholder="Type your activity"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Note: </label>
                            <div class="col-md-9">
                                <textarea id="edit_note" name="edit_note validate_char" class="form-control"
                                    placeholder="Type your note"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Start Date: </label>
                            <div class="col-md-9">
                                <input id="edit_activity" name="edit_activity validate_char" class="form-control"
                                    placeholder="Type your activity" value="2 April 2020" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Status: </label>
                            <div class="col-md-9">
                                <select id="edit_slc_issue" name="edit_slc_issue" onchange="select_pic(event)"
                                    class="form-control" data-plugin="select2" data-placeholder="Select your status"
                                    data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Progress</option>
                                    <option value="1">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Complete Date: </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="start_date" name="start_date"
                                    autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add_submit" class="btn btn-primary">Edit Activity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <script>
function disableButton() {
    var btn = document.getElementById('btn_add_submit');
    btn.disabled = true;
    btn.innerText = 'Posting...';
}
    </script>