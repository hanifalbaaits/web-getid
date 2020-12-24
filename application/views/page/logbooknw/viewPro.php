    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Project Detail</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item"><a href="logbook">Logbook</a></li>
                <li class="breadcrumb-item active">Project Detail</li>
            </ol>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title project-title">
                                RKA Web
                                <hr />
                            </h4>
                            <div class="row" style="margin-left: 1px; margin-right: 30px;">
                                <div class="column" style="float: left;width: 12%;">
                                    <p><b>ID</b></p>
                                    <p><b>Division</b></p>
                                    <p><b>Sub Divisi</b></p>
                                </div>
                                <div class="column" style="float: left;width: 50%;">
                                    <p id="v_division">: PRO12</p>
                                    <p id="v_division">: Technical Supoort</p>
                                    <p id="v_position">: Development | Implementation | Bisnis Support</p>
                                </div>
                            </div>
                            <hr />
                            <div class="row" style="margin-left: 1px; margin-right: 30px;">
                                <div class="column" style="float: left;width: 12%;">
                                    <p><b>Client Name</b></p>
                                    <p><b>PIC Name</b></p>
                                </div>
                                <div class="column" style="float: left;width: 50%;">
                                    <p id="v_client_name">: Graha Informatika Nusantara</p>
                                    <p id="v_pic_name">: Rizky Ardiansyah</p>
                                </div>
                            </div>
                            <hr />
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
                            <div class="container">
                                <div class="mt-5" style="float:left;">
                                    <h4 class="card-title" style="margin: auto;">List Issue</h4>
                                </div>
                                <div class="mr-10 ml-10" style="float:right; text-align: center; ">
                                    <div class="num green-600">10</div>
                                    <p style="margin: auto;">Activity</p>
                                </div>
                                <div class="mr-10 ml-10" style="float:right; text-align: center; ">
                                    <div class="num orange-600">5</div>
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
                                        <th style="width:20%">Employee Name</th>
                                        <th style="width:15%">Client Name</th>
                                        <th style="width:15%">Division</th>
                                        <th style="width:20%">Issue</th>
                                        <th style="width:10%">Progress</th>
                                        <th style="width:5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Abdul Hanif Al Baaits</td>
                                        <td>Graha Informatika Nusantara</td>
                                        <td>Technical Support <small>Development</small></td>
                                        <td>Core RKA transaksi COA</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="auto" data-trigger="hover"
                                                    data-original-title="90 %">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-success progress-bar-indicating"
                                                            style="width: 90%" role="progressbar">
                                                            <span class="sr-only">90%</span>
                                                        </div>
                                                    </div>
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
                                        <td>Technical Support <small>Development</small></td>
                                        <td>Web RKA Create RAB</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="auto" data-trigger="hover"
                                                    data-original-title="50 %">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-warning progress-bar-indicating"
                                                            style="width: 50%" role="progressbar">
                                                            <span class="sr-only">50%</span>
                                                        </div>
                                                    </div>
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
                                        <td>Technical Support <small>Development</small></td>
                                        <td>Core RKA searching RAB</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="auto" data-trigger="hover"
                                                    data-original-title="20 %">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-danger progress-bar-indicating"
                                                            style="width: 20%" role="progressbar">
                                                            <span class="sr-only">20%</span>
                                                        </div>
                                                    </div>
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
                                    <tr>
                                        <td>4</td>
                                        <td>Indra Dian Indriana</td>
                                        <td>Graha Informatika Nusantara</td>
                                        <td>Technical Support <small>Implementation</small></td>
                                        <td>Reprehenderit do magna voluptate</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="auto" data-trigger="hover"
                                                    data-original-title="20 %">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-danger progress-bar-indicating"
                                                            style="width: 20%" role="progressbar">
                                                            <span class="sr-only">20%</span>
                                                        </div>
                                                    </div>
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
                                    <tr>
                                        <td>5</td>
                                        <td>Raihan Hendraji</td>
                                        <td>Graha Informatika Nusantara</td>
                                        <td>Technical Support <small>Bisnis Support</small></td>
                                        <td>Ex excepteur consectetur sunt laborum</td>
                                        <td class="work-progress">
                                            <div class="row">
                                                <div class="col-10 mt-10" style="vertical-align: middle;"
                                                    data-toggle="tooltip" data-placement="auto" data-trigger="hover"
                                                    data-original-title="20 %">
                                                    <div class="progress progress-xs table-content">
                                                        <div class="progress-bar progress-bar-danger progress-bar-indicating"
                                                            style="width: 20%" role="progressbar">
                                                            <span class="sr-only">20%</span>
                                                        </div>
                                                    </div>
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

                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <p class="mb-10">
                                <span class="float-right pl-10">1</span>
                                Total Issue Done
                            </p>
                            <p>
                                <span class="float-right pl-10">4</span>
                                Total Issue Progress
                            </p>
                            </ul>
                            <div class="progress progress-xs mb-10" data-toggle="tooltip" data-placement="top"
                                data-trigger="hover" data-original-title="40 %">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemax="100"
                                    aria-valuemin="0" aria-valuenow="60" style="width: 40%;">
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="project-option-title">Manager In</h4>
                            <div class="media mt-5 mb-5">
                                <div class="pr-20 text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-5 font-size-16">Rizky Ardiansyah</h4>
                                    <span>Development</span>
                                </div>
                            </div>
                            <div class="media mt-5 mb-5">
                                <div class="pr-20 text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-5 font-size-16">Fuad Hasan</h4>
                                    <span>Bisnis Support</span>
                                </div>
                            </div>
                            <div class="media mt-5 mb-5">
                                <div class="pr-20 text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-5 font-size-16">Danang Widayanto</h4>
                                    <span>Implementation</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="project-option-title">Staff In</h4>
                            <div class="media mt-5 mb-5">
                                <div class="pr-20 text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-5 font-size-16">Abdul Hanif A</h4>
                                    <span>Development</span>
                                </div>
                            </div>
                            <div class="media mt-5 mb-5">
                                <div class="pr-20 text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-5 font-size-16">Christian Boy A</h4>
                                    <span>Development</span>
                                </div>
                            </div>
                            <div class="media mt-5 mb-5">
                                <div class="pr-20 text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-5 font-size-16">Raihan Hendraji</h4>
                                    <span>Bisnis Supoort</span>
                                </div>
                            </div>
                            <div class="media mt-5 mb-5">
                                <div class="pr-20 text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img src="<?php echo base_url(). "global/" ?>portraits/1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-5 font-size-16">Indra Dian Indriana</h4>
                                    <span>Implementation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                            <label class="col-md-3 form-control-label">Choose Issue: </label>
                            <div class="col-md-9">
                                <select id="add_slc_issue" name="add_slc_issue" onchange="select_pic(event)"
                                    class="form-control" data-plugin="select2" data-placeholder="Select your Issue"
                                    data-allow-clear="true">
                                    <option></option>
                                    <!-- <?php foreach ($pegawais as $pgw): ?>
                                <option value="<?php echo $pgw->iduser; ?>">
                                    <?php echo $pgw->full_name." | ".$pgw->nik; ?></option>
                                <?php endforeach; ?> -->
                                    <option value="1">Membuat RKA Web</option>
                                    <option value="1">Membuat Modul RAB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Activity: </label>
                            <div class="col-md-9">
                                <textarea id="add_activity" name="add_activity validate_char" class="form-control"
                                    placeholder="Type your activity"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Note: </label>
                            <div class="col-md-9">
                                <textarea id="add_note" name="add_note validate_char" class="form-control"
                                    placeholder="Type your note"></textarea>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="form-control-label"><span class="badge badge-info">info</span> First check
                                whether the client has been registered before!</label>
                        </div> -->
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
                            <label class="col-md-3 form-control-label">Choose Issue: </label>
                            <div class="col-md-9">
                                <select id="edit_slc_issue" name="edit_slc_issue" onchange="select_pic(event)"
                                    class="form-control" data-plugin="select2" data-placeholder="Select your Issue"
                                    data-allow-clear="true">
                                    <option></option>
                                    <!-- <?php foreach ($pegawais as $pgw): ?>
                                <option value="<?php echo $pgw->iduser; ?>">
                                    <?php echo $pgw->full_name." | ".$pgw->nik; ?></option>
                                <?php endforeach; ?> -->
                                    <option value="1">Membuat RKA Web</option>
                                    <option value="1">Membuat Modul RAB</option>
                                </select>
                            </div>
                        </div>
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
                        <!-- <div class="form-group row">
                            <label class="form-control-label"><span class="badge badge-info">info</span> First check
                                whether the client has been registered before!</label>
                        </div> -->
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