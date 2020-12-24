    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">List Logbook</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item active">Logbook</li>
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
                        <i class="icon wb-bell" aria-hidden="true"></i>Anda memiliki 7 Logbook
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-15">
                                <!-- <a href="logbook/create">
                  <button id="add" class="btn btn-outline btn-primary" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Create Logbook
                  </button>
                </a>   -->

                                <button id="add" class="btn btn-outline btn-primary" onClick="add_logbook()"
                                    type="button" data-target="#createlogbook" data-toggle="modal">
                                    <i class="icon wb-plus" aria-hidden="true"></i> Create Issue
                                </button>
                                <button id="search" class="btn btn-outline btn-primary" type="button"
                                    data-target="#searchModal" data-toggle="modal">
                                    <i class="icon fa-filter" aria-hidden="true"></i> Filter
                                </button>
                                <a id="download" class="btn btn-outline btn-primary"
                                    href="<?php echo site_url("logbook/export"); ?>">
                                    <i class="icon wb-download" aria-hidden="true"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-info">
                        <div class="card-block">
                            <div class="container">
                                <div class="mt-5" style="float:left;">
                                    <h4 class="card-title" style="margin: auto;">RKA Web</h4>
                                </div>
                                <div class="mr-10 ml-10 mt-5" style="float:right; ">
                                    <a href="logbookNw/viewPro" class="btn btn-outline btn-primary btn-sm"
                                        type="button">
                                        <i class="icon wb-search" aria-hidden="true"></i> Detail Project
                                    </a>
                                </div>
                                <div class="mr-10 ml-10" style="float:right; text-align: center; ">
                                    <div class="num green-600">6</div>
                                    <p style="margin: auto;">Activity</p>
                                </div>
                                <div class="mr-10 ml-10" style="float:right; text-align: center; ">
                                    <div class="num orange-600">3</div>
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
                                        <th style="width:15%">Employee Name</th>
                                        <th style="width:15%">Client Name</th>
                                        <th style="width:15%">Issue</th>
                                        <th style="width:25%">Progress</th>
                                        <th style="width:5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Abdul Hanif Al Baaits</td>
                                        <td>Graha Informatika Nusantara</td>
                                        <td>Core RKA transaksi COA</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="top" data-trigger="hover"
                                                    data-original-title="Progress">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-success progress-bar-indicating"
                                                            style="width: 90%" role="progressbar">
                                                            <span class="sr-only">90%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    90 %
                                                </div>
                                            </div>
                                        </td>
                                        <td class="actions">
                                            <a class="btn btn-success btn-xs" id="activityTrig1" href="logbookNw/view"
                                                data-trigger="hover" data-animation="fade"><i
                                                    class="icon wb-search"></i> Detail </a>
                                            <div id="activityPop1" hidden>
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
                                                            <td><span class="badge badge-success">Done</span></td>
                                                            <td>2 April 2020 09:00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Christian Boy Aritonang</td>
                                        <td>Graha Informatika Nusantara</td>
                                        <td>Web RKA Create RAB</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="top" data-trigger="hover"
                                                    data-original-title="Progress">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-warning progress-bar-indicating"
                                                            style="width: 50%" role="progressbar">
                                                            <span class="sr-only">50%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    50 %
                                                </div>
                                            </div>
                                        </td>
                                        </td>
                                        <td class="actions">
                                            <a class="btn btn-success btn-xs" id="activityTrig2" href="logbookNw/view"
                                                data-trigger="hover" data-animation="fade"><i
                                                    class="icon wb-search"></i> Detail </a>
                                            <div id="activityPop2" hidden>
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
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Abdul Hanif Al Baaits</td>
                                        <td>Graha Informatika Nusantara</td>
                                        <td>Core RKA searching RAB</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="top" data-trigger="hover"
                                                    data-original-title="Progress">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-danger progress-bar-indicating"
                                                            style="width: 20%" role="progressbar">
                                                            <span class="sr-only">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    20 %
                                                </div>
                                            </div>
                                        </td>
                                        </td>
                                        <td class="actions">
                                            <a class="btn btn-success btn-xs" id="activityTrig3" href="logbookNw/view"
                                                data-trigger="hover" data-animation="fade"><i
                                                    class="icon wb-search"></i> Detail </a>
                                            <div id="activityPop3" hidden>
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
                                                            <td><span class="badge badge-warning">Progress</span></td>
                                                            <td>2 April 2020 09:00</td>
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
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card border border-info">
                        <div class="card-block">
                            <div class="container">
                                <div class="mt-5" style="float:left;">
                                    <h4 class="card-title" style="margin: auto;">Gina Apps</h4>
                                </div>
                                <div class="mr-10 ml-10 mt-5" style="float:right; ">
                                    <a href="logbookNw/viewPro" class="btn btn-outline btn-primary btn-sm"
                                        type="button">
                                        <i class="icon wb-search" aria-hidden="true"></i> Detail Project
                                    </a>
                                </div>
                                <div class="mr-10 ml-10" style="float:right; text-align: center; ">
                                    <div class="num green-600">2</div>
                                    <p style="margin: auto;">Activity</p>
                                </div>
                                <div class="mr-10 ml-10" style="float:right; text-align: center; ">
                                    <div class="num orange-600">1</div>
                                    <p style="margin: auto;">Issue</p>
                                </div>
                            </div>
                            <br />
                            <hr class="mt-25" />
                            <table class="table table-hover dataTable table-striped w-full" cellspacing="0"
                                data-plugin="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:15%">Employee Name</th>
                                        <th style="width:15%">Client Name</th>
                                        <th style="width:15%">Issue</th>
                                        <th style="width:25%">Progress</th>
                                        <th style="width:5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td style="width:10px">Rio Yudha P</td>
                                        <td>Graha Informatika Nusantara</td>
                                        <td>Notifikasi Delay</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="top" data-trigger="hover"
                                                    data-original-title="Progress">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-success progress-bar-indicating"
                                                            style="width: 90%" role="progressbar">
                                                            <span class="sr-only">90%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    90 %
                                                </div>
                                            </div>
                                        </td>
                                        </td>
                                        <td class="actions">
                                            <a class="btn btn-success btn-xs" id="activityTrig4" href="logbookNw/view"
                                                data-trigger="hover" data-animation="fade"><i
                                                    class="icon wb-search"></i> Detail </a>
                                            <div id="activityPop4" hidden>
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
                                                            <td><span class="badge badge-success">Done</span></td>
                                                            <td>2 April 2020 09:00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                    enctype="multipart/form-data" action="<?php echo site_url(). "/logbook" ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="start_date">Start Date</label>
                                <input type="text" class="form-control" id="start_date" name="start_date"
                                    autocomplete="off" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="end_date">End Date</label>
                                <input type="text" class="form-control" id="end_date" name="end_date"
                                    autocomplete="off" />
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