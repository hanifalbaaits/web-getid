<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Beranda</h3>
                            <div class="nk-block-des text-soft">
                                <p>Selamat Datang, <?php echo $this->session->userdata('storename'); ?></p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <!-- <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em
                                                    class="icon ni ni-download-cloud"></em><span>Export</span></a>
                                        </li>
                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em
                                                    class="icon ni ni-reports"></em><span>Reports</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary"
                                                    data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-user-add-fill"></em><span>Add
                                                                    User</span></a></li>
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-coin-alt-fill"></em><span>Add
                                                                    Order</span></a></li>
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-note-add-fill-c"></em><span>Add
                                                                    Page</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h6 class="subtitle">Total Deposit</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left" title="Total Deposited"></em>
                                        </div>
                                    </div>
                                    <div class="card-amount">
                                        <span class="amount"><span
                                                class="currency currency-usd">Rp</span><?php echo " ".number_format($saldo, 0, ',', '.'); ?></span>
                                        <!-- <span class="change up text-danger"><em
                                                class="icon ni ni-arrow-long-up"></em>1.93%</span> -->
                                    </div>
                                    <!-- <div class="invest-data">
                                        <div class="invest-data-amount g-2">
                                            <div class="invest-data-history">
                                                <div class="title">This Month</div>
                                                <div class="amount">2,940.59 <span
                                                        class="currency currency-usd">USD</span></div>
                                            </div>
                                            <div class="invest-data-history">
                                                <div class="title">This Week</div>
                                                <div class="amount">1,259.28 <span
                                                        class="currency currency-usd">USD</span></div>
                                            </div>
                                        </div>
                                        <div class="invest-data-ck">
                                            <canvas class="iv-data-chart" id="totalDeposit"></canvas>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h6 class="subtitle">Total Withdraw</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left" title="Total Withdraw"></em>
                                        </div>
                                    </div>
                                    <div class="card-amount">
                                        <span class="amount"> 49,595.34 <span class="currency currency-usd">USD</span>
                                        </span>
                                        <span class="change down text-danger"><em
                                                class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                    </div>
                                    <div class="invest-data">
                                        <div class="invest-data-amount g-2">
                                            <div class="invest-data-history">
                                                <div class="title">This Month</div>
                                                <div class="amount">2,940.59 <span
                                                        class="currency currency-usd">USD</span></div>
                                            </div>
                                            <div class="invest-data-history">
                                                <div class="title">This Week</div>
                                                <div class="amount">1,259.28 <span
                                                        class="currency currency-usd">USD</span></div>
                                            </div>
                                        </div>
                                        <div class="invest-data-ck">
                                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-4">
                            <div class="card card-bordered  card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h6 class="subtitle">Balance in Account</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left" title="Total Balance in Account"></em>
                                        </div>
                                    </div>
                                    <div class="card-amount">
                                        <span class="amount"> 79,358.50 <span class="currency currency-usd">USD</span>
                                        </span>
                                    </div>
                                    <div class="invest-data">
                                        <div class="invest-data-amount g-2">
                                            <div class="invest-data-history">
                                                <div class="title">This Month</div>
                                                <div class="amount">2,940.59 <span
                                                        class="currency currency-usd">USD</span></div>
                                            </div>
                                            <div class="invest-data-history">
                                                <div class="title">This Week</div>
                                                <div class="amount">1,259.28 <span
                                                        class="currency currency-usd">USD</span></div>
                                            </div>
                                        </div>
                                        <div class="invest-data-ck">
                                            <canvas class="iv-data-chart" id="totalBalance"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6 col-xxl-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group mb-1">
                                        <div class="card-title">
                                            <h6 class="title">Investment Overview</h6>
                                            <p>The investment overview of your platform. <a href="#">All
                                                    Investment</a></p>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#thisyear">This
                                                Year</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#alltime">All
                                                Time</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-0">
                                        <div class="tab-pane active" id="overview">
                                            <div class="invest-ov gy-2">
                                                <div class="subtitle">Currently Actived Investment</div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">49,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Amount</div>
                                                    </div>
                                                    <div class="invest-ov-stats">
                                                        <div><span class="amount">56</span><span
                                                                class="change up text-danger"><em
                                                                    class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                                        </div>
                                                        <div class="title">Plans</div>
                                                    </div>
                                                </div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">49,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Paid Profit</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invest-ov gy-2">
                                                <div class="subtitle">Investment in this Month</div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">49,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Amount</div>
                                                    </div>
                                                    <div class="invest-ov-stats">
                                                        <div><span class="amount">23</span><span
                                                                class="change down text-danger"><em
                                                                    class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                                        </div>
                                                        <div class="title">Plans</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="thisyear">
                                            <div class="invest-ov gy-2">
                                                <div class="subtitle">Currently Actived Investment</div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">89,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Amount</div>
                                                    </div>
                                                    <div class="invest-ov-stats">
                                                        <div><span class="amount">96</span><span
                                                                class="change up text-danger"><em
                                                                    class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                                        </div>
                                                        <div class="title">Plans</div>
                                                    </div>
                                                </div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">99,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Paid Profit</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invest-ov gy-2">
                                                <div class="subtitle">Investment in this Month</div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">149,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Amount</div>
                                                    </div>
                                                    <div class="invest-ov-stats">
                                                        <div><span class="amount">83</span><span
                                                                class="change down text-danger"><em
                                                                    class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                                        </div>
                                                        <div class="title">Plans</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="alltime">
                                            <div class="invest-ov gy-2">
                                                <div class="subtitle">Currently Actived Investment</div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">249,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Amount</div>
                                                    </div>
                                                    <div class="invest-ov-stats">
                                                        <div><span class="amount">556</span><span
                                                                class="change up text-danger"><em
                                                                    class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                                        </div>
                                                        <div class="title">Plans</div>
                                                    </div>
                                                </div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">149,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Paid Profit</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invest-ov gy-2">
                                                <div class="subtitle">Investment in this Month</div>
                                                <div class="invest-ov-details">
                                                    <div class="invest-ov-info">
                                                        <div class="amount">249,395.395 <span
                                                                class="currency currency-usd">USD</span>
                                                        </div>
                                                        <div class="title">Amount</div>
                                                    </div>
                                                    <div class="invest-ov-stats">
                                                        <div><span class="amount">223</span><span
                                                                class="change down text-danger"><em
                                                                    class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                                        </div>
                                                        <div class="title">Plans</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6 col-xxl-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner d-flex flex-column h-100">
                                    <div class="card-title-group mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Top Invested Plan</h6>
                                            <p>In last 30 days top invested schemes.</p>
                                        </div>
                                        <div class="card-tools mt-n4 mr-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                        <li><a href="#" class="active"><span>30
                                                                    Days</span></a></li>
                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-list gy-3">
                                        <div class="progress-wrap">
                                            <div class="progress-text">
                                                <div class="progress-label">Strater Plan</div>
                                                <div class="progress-amount">58%</div>
                                            </div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar" data-progress="58"></div>
                                            </div>
                                        </div>
                                        <div class="progress-wrap">
                                            <div class="progress-text">
                                                <div class="progress-label">Silver Plan</div>
                                                <div class="progress-amount">18.49%</div>
                                            </div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-orange" data-progress="18.49">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-wrap">
                                            <div class="progress-text">
                                                <div class="progress-label">Dimond Plan</div>
                                                <div class="progress-amount">16%</div>
                                            </div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-teal" data-progress="16"></div>
                                            </div>
                                        </div>
                                        <div class="progress-wrap">
                                            <div class="progress-text">
                                                <div class="progress-label">Platinam Plan</div>
                                                <div class="progress-amount">29%</div>
                                            </div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-pink" data-progress="29"></div>
                                            </div>
                                        </div>
                                        <div class="progress-wrap">
                                            <div class="progress-text">
                                                <div class="progress-label">Vibranium Plan</div>
                                                <div class="progress-amount">33%</div>
                                            </div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-azure" data-progress="33"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invest-top-ck mt-auto">
                                        <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6 col-xxl-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Recent Activities</h6>
                                        </div>
                                        <div class="card-tools">
                                            <ul class="card-tools-nav">
                                                <li><a href="#"><span>Cancel</span></a></li>
                                                <li class="active"><a href="#"><span>All</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-activity">
                                    <li class="nk-activity-item">
                                        <div class="nk-activity-media user-avatar bg-success"><img
                                                src="<?php echo base_url(); ?>images/avatar/c-sm.jpg" alt=""></div>
                                        <div class="nk-activity-data">
                                            <div class="label">Keith Jensen requested to Widthdrawl.</div>
                                            <span class="time">2 hours ago</span>
                                        </div>
                                    </li>
                                    <li class="nk-activity-item">
                                        <div class="nk-activity-media user-avatar bg-warning">HS</div>
                                        <div class="nk-activity-data">
                                            <div class="label">Harry Simpson placed a Order.</div>
                                            <span class="time">2 hours ago</span>
                                        </div>
                                    </li>
                                    <li class="nk-activity-item">
                                        <div class="nk-activity-media user-avatar bg-azure">SM</div>
                                        <div class="nk-activity-data">
                                            <div class="label">Stephanie Marshall got a huge bonus.</div>
                                            <span class="time">2 hours ago</span>
                                        </div>
                                    </li>
                                    <li class="nk-activity-item">
                                        <div class="nk-activity-media user-avatar bg-purple"><img
                                                src="<?php echo base_url(); ?>images/avatar/d-sm.jpg" alt=""></div>
                                        <div class="nk-activity-data">
                                            <div class="label">Nicholas Carr deposited funds.</div>
                                            <span class="time">2 hours ago</span>
                                        </div>
                                    </li>
                                    <li class="nk-activity-item">
                                        <div class="nk-activity-media user-avatar bg-pink">TM</div>
                                        <div class="nk-activity-data">
                                            <div class="label">Timothy Moreno placed a Order.</div>
                                            <span class="time">2 hours ago</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6 col-xxl-4">
                            <div class="card card-bordered h-100">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Notifications</h6>
                                        </div>
                                        <div class="card-tools">
                                            <a href="html/subscription/tickets.html" class="link">View
                                                All</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="timeline">
                                        <h6 class="timeline-head">November, 2019</h6>
                                        <ul class="timeline-list">
                                            <li class="timeline-item">
                                                <div class="timeline-status bg-primary is-outline"></div>
                                                <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em>
                                                </div>
                                                <div class="timeline-data">
                                                    <h6 class="timeline-title">Submited KYC Application</h6>
                                                    <div class="timeline-des">
                                                        <p>Re-submitted KYC form.</p>
                                                        <span class="time">09:30am</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-status bg-primary"></div>
                                                <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em>
                                                </div>
                                                <div class="timeline-data">
                                                    <h6 class="timeline-title">Submited KYC Application</h6>
                                                    <div class="timeline-des">
                                                        <p>Re-submitted KYC form.</p>
                                                        <span class="time">09:30am</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-status bg-pink"></div>
                                                <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em>
                                                </div>
                                                <div class="timeline-data">
                                                    <h6 class="timeline-title">Submited KYC Application</h6>
                                                    <div class="timeline-des">
                                                        <p>Re-submitted KYC form.</p>
                                                        <span class="time">09:30am</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-12 col-xxl-8">
                            <div class="card card-bordered card-full">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Transaksi Terakhir</h6>
                                        </div>
                                        <div class="card-tools">
                                            <a href="<?php echo site_url("riwayat/transaksi"); ?>" class="link">Lihat
                                                semua</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-tb-list">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span>No. Referensi</span></div>
                                        <div class="nk-tb-col"><span>Tanggal Transaksi</span></div>
                                        <div class="nk-tb-col"><span>Kode Produk</span></div>
                                        <div class="nk-tb-col"><span>Deskripsi</span></div>
                                        <div class="nk-tb-col"><span>Nomor Tujuan</span></div>
                                        <div class="nk-tb-col"><span>Harga</span></div>
                                        <div class="nk-tb-col"><span>Status</span></div>
                                        <div class="nk-tb-col"><span></span></div>
                                    </div>
                                    <?php if (count($data) == 0) { ?>
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col">
                                            Tidak ada Transaksi Terakhir
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php foreach ($data as $key => $dt) { ?>
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col">
                                            <!-- <div class="align-center"> -->
                                            <span class="tb-sub ml-2"><?php echo $dt->OriginalTransID; ?></span>
                                            <!-- </div> -->
                                        </div>
                                        <div class="nk-tb-col">
                                            <span
                                                class="tb-sub"><?php $tgl = date("d M Y H:i:s",strtotime($dt->Date)); echo $tgl; ?></span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead"><?php echo $dt->Barcode; ?></span>
                                        </div>

                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <?php if (strpos($dt->Product_x0020_Name, "DATA") !== false) { ?>
                                                <span
                                                    class="tb-sub"><?php $des = $dt->Product_x0020_Name; echo $des; ?></span>
                                                <?php } else {?>
                                                <span
                                                    class="tb-sub"><?php $des = $dt->Product_x0020_Name." PULSA ".$dt->Amount; echo $des; ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-name">
                                                    <span class="tb-lead"><?php echo $dt->Phone; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-sub tb-amount"><span>Rp
                                                </span><?php $harga = number_format($dt->Price, 0, ',', '.'); echo $harga;?></span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <?php if ($dt->Status == "SUCCESS") { ?>
                                            <span class="tb-sub text-success">Berhasil</span>
                                            <?php } else if ($dt->Status == "FAILED") { ?>
                                            <span class="tb-sub text-danger">Gagal</span>
                                            <?php } else { ?>
                                            <span class="tb-sub text-warning">Sedang di Proses></span>
                                            <?php } ?>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-action">
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown"><em
                                                        class="icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li><a href="#"
                                                                onClick="return detailTrx('<?php echo $dt->OriginalTransID; ?>','<?php echo $dt->TransID; ?>','<?php echo $dt->Barcode; ?>','<?php echo $des; ?>','<?php echo $dt->Phone; ?>','<?php echo $dt->Status; ?>','<?php echo $dt->SerialNumber; ?>','<?php echo $tgl; ?>','<?php echo $harga; ?>')"
                                                                data-toggle="modal" data-target="#detailTrx">Lihat</a>
                                                        </li>
                                                        <!-- <li><a href="#">Invoice</a></li>
                                                        <li><a href="#">Print</a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<!-- Modal Form -->
<div class="modal fade" tabindex="-1" id="detailTrx">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div class="nk-iv-wg4">
                    <div class="nk-iv-wg4-sub">
                        <!-- <h6 class="nk-iv-wg4-title title">Your Investment Details</h6> -->
                        <ul class="nk-iv-wg4-overview g-2">
                            <li>
                                <div class="sub-text">No. Referensi</div>
                                <div class="lead-text" id="referensi"></div>
                            </li>
                            <li>
                                <div class="sub-text">Transaksi ID</div>
                                <div class="lead-text" id="transaksi"></div>
                            </li>
                            <li>
                                <div class="sub-text">Produk</div>
                                <div class="lead-text" id="produk"></div>
                            </li>
                            <li>
                                <div class="sub-text">Deskripsi</div>
                                <div class="lead-text" id="deskripsi"></div>
                            </li>
                            <li>
                                <div class="sub-text">Nomor Tujuan</div>
                                <div class="lead-text" id="nomor"></div>
                            </li>
                            <li>
                                <div class="sub-text">Status</div>
                                <div class="lead-text"><span class="badge badge-success" id="status"
                                        style="color:white"></span></div>
                            </li>
                            <li>
                                <div class="sub-text">Nomor Serial</div>
                                <div class="lead-text" id="serial"></div>
                            </li>
                            <li>
                                <div class="sub-text">Tanggal Transaksi</div>
                                <div class="lead-text" id="tgl"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-iv-wg4-sub">
                        <ul class="nk-iv-wg4-list">
                            <li>
                                <div class="sub-text">Metode Pembayaran</div>
                                <div class="lead-text">Saldo GetID</div>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-iv-wg4-sub">
                        <ul class="nk-iv-wg4-list">
                            <li>
                                <div class="sub-text">Biaya Transaksi</div>
                                <div class="lead-text" id="biaya"></div>
                            </li>
                            <!-- <li>
                                <div class="sub-text">Pajak <span>(0%)</span></div>
                                <div class="lead-text">Rp 0</div>
                            </li> -->
                        </ul>
                    </div>
                    <div class="nk-iv-wg4-sub">
                        <ul class="nk-iv-wg4-list">
                            <li>
                                <div class="lead-text">Total</div>
                                <div class="caption-text text-primary" id="total"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="modal-footer bg-light">
                <!-- <span class="sub-text">Modal Footer Text</span> -->
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    let user_topup = localStorage.getItem('user_topup');
    let nominal_topup = localStorage.getItem('nominal_topup');
    let time_topup = localStorage.getItem('time_topup');
    if (user_topup != null && nominal_topup != null && time_topup != null &&
        user_topup != "" && nominal_topup != "" && time_topup != "") {
        setSession = $.ajax({
            data: {
                user_topup: user_topup,
                nominal_topup: nominal_topup,
                time_topup: time_topup
            },
            type: "POST",
            url: "<?php echo site_url('login/setSession_topup');?>",
            async: false
        }).responseText;
    } else {
        localStorage.setItem('user_topup', null);
        localStorage.setItem('nominal_topup', null);
        localStorage.setItem('time_topup', null);
    }
});
</script>

<script type="text/javascript">
function detailTrx(referensi, transaksi, produk, deskripsi, nomor, status, serial, tgl, biaya) {
    // alert('hai');
    // document.getElementById("add_rra_jumlah").value = "";
    $('#referensi').text(referensi);
    $('#transaksi').text(transaksi);
    $('#produk').text(produk);
    $('#deskripsi').text(deskripsi);
    $('#nomor').text(nomor);
    if (status == 'SUCCESS') {
        $('#status').text("Berhasil");
        $('#status').removeClass().addClass('badge badge-success');
    } else if (status == 'FAILED') {
        $('#status').text("Gagal");
        $('#status').removeClass().addClass('badge badge-danger');
    } else {
        $('#status').text("Sedang di Proses");
        $('#status').removeClass().addClass('badge badge-warning');
    }
    $('#serial').text(serial);
    $('#tgl').text(tgl);
    $('#biaya').text(biaya);
    $('#total').text(biaya);
}
</script>