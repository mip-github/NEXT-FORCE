<!doctype html>
<html class="no-js" lang="en">

<head> <?php require_once __DIR__ . '/require/admin/head.php';?> </head>

<body>
    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">

            <?php require_once __DIR__ . '/require/admin/sidebar.php';?>

            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="card">
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill"
                                            href="#current-month" role="tab" aria-controls="pills-timeline"
                                            aria-selected="true">ทั้งหมด()</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month"
                                            role="tab" aria-controls="pills-profile" aria-selected="false">รอตรวจสอบ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill"
                                            href="#previous-month" role="tab" aria-controls="pills-setting"
                                            aria-selected="false">เอกสารไม่ครบ/ไม่สมบูรณ์</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting1-tab" data-toggle="pill"
                                            href="#previous1-month" role="tab" aria-controls="pills-setting1"
                                            aria-selected="false">ตรวจสอบเรียบร้อย</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="current-month" role="tabpanel"
                                        aria-labelledby="pills-timeline-tab">
                                        <div class="card-body">
                                            <h5>ข้อมูลสมาชิกทั้งหมด</h5>
                                            <hr>
                                            <table id="data_table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>หมายเลขสมาชิก</th>
                                                        <th class="nosort">ชื่อสมาชิก</th>
                                                        <th>สถานะ(ยืนยันตัวตน)</th>
                                                        <th>จำนวนเงินลงทุน(MCOIN)</th>
                                                        <th class="nosort">วันที่อัพเดทล่าสุด</th>
                                                        <th class="nosort">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>001</td>
                                                        <td><img src="../img/users/1.jpg" class="table-user-thumb"
                                                                alt=""></td>
                                                        <td>Erich Heaney</td>
                                                        <td>erich@example.com</td>
                                                        <td>erich@example.com</td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="last-month" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="card-body">
                                            <h5>ข้อมูลสมาชิกที่รอตรวจสอบ</h5>
                                            <hr>
                                            <table id="data_table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>หมายเลขสมาชิก</th>
                                                        <th class="nosort">ชื่อสมาชิก</th>
                                                        <th>สถานะ(ยืนยันตัวตน)</th>
                                                        <th>จำนวนเงินลงทุน(MCOIN)</th>
                                                        <th class="nosort">วันที่อัพเดทล่าสุด</th>
                                                        <th class="nosort">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>002</td>
                                                        <td><img src="../img/users/1.jpg" class="table-user-thumb"
                                                                alt=""></td>
                                                        <td>Erich Heaney</td>
                                                        <td>erich@example.com</td>
                                                        <td>erich@example.com</td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="previous-month" role="tabpanel"
                                        aria-labelledby="pills-setting-tab">
                                        <div class="card-body">
                                        <h5>ข้อมูลสมาชิกที่เอกสารไม่สมบูรณ์</h5>
                                        <hr>
                                            <table id="data_table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>หมายเลขสมาชิก</th>
                                                        <th class="nosort">ชื่อสมาชิก</th>
                                                        <th>สถานะ(ยืนยันตัวตน)</th>
                                                        <th>จำนวนเงินลงทุน(MCOIN)</th>
                                                        <th class="nosort">วันที่อัพเดทล่าสุด</th>
                                                        <th class="nosort">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>003</td>
                                                        <td><img src="../img/users/1.jpg" class="table-user-thumb"
                                                                alt=""></td>
                                                        <td>Erich Heaney</td>
                                                        <td>erich@example.com</td>
                                                        <td>erich@example.com</td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="previous1-month" role="tabpanel"
                                        aria-labelledby="pills-setting1-tab">
                                        <div class="card-body">
                                        <h5>ข้อมูลสมาชิกที่เอกสารไม่สมบูรณ์</h5>
                                        <hr>
                                            <table id="data_table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>หมายเลขสมาชิก</th>
                                                        <th class="nosort">ชื่อสมาชิก</th>
                                                        <th>สถานะ(ยืนยันตัวตน)</th>
                                                        <th>จำนวนเงินลงทุน(MCOIN)</th>
                                                        <th class="nosort">วันที่อัพเดทล่าสุด</th>
                                                        <th class="nosort">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>004</td>
                                                        <td><img src="../img/users/1.jpg" class="table-user-thumb"
                                                                alt=""></td>
                                                        <td>Erich Heaney</td>
                                                        <td>erich@example.com</td>
                                                        <td>erich@example.com</td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="pic/AW_Icon_V1-15.png" width="20" /> &nbsp;
                                        <h3>แจ้งเตือนเงินเข้าระบบ</h3>
                                    </div>
                                    <table class="table table-hover mb-0 without-header">
                                        <tbody>
                                            <div>
                                                <tr>
                                                    <td class="text-left">
                                                        <h6 class="fw-700">Colleen Hurst</h6></br>
                                                        <div class="d-inline-block">
                                                            <p class="text-muted mb-0">หมายเลขสมาชิก</p>
                                                            <p class="text-muted mb-0">ประเภทการโอนเงิน</p>
                                                            <p class="text-muted mb-0">ธนาคาร</p>
                                                            <p class="text-muted mb-0">เลขที่บัญชี</p>
                                                            <p class="text-muted mb-0">ประเภทบัญชี</p>
                                                            <p class="text-muted mb-0">วันที่โอน</p>
                                                            <p class="text-muted mb-0">เวลาที่โอน</p>
                                                            <p class="text-muted mb-0">จำนวนที่โอน</p></br>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <span
                                                            class="badge badge-pill badge-warning mb-1">รอตรวจสอบ</span>
                                                        <div class="d-inline-block"><br><br>
                                                            <p class="text-muted mb-0">34567891021235A</p>
                                                            <p class="text-muted mb-0">โอนเงินผ่านะนาคาร</p>
                                                            <p class="text-muted mb-0">ธนาคารกรุงเทพ</p>
                                                            <p class="text-muted mb-0">123-4-56789-0</p>
                                                            <p class="text-muted mb-0">ออมทรัพย์</p>
                                                            <p class="text-muted mb-0">18/03/2020</p>
                                                            <p class="text-muted mb-0">15:41</p>
                                                            <p class="text-muted mb-0">500 THB</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="mb-0">ดูรูปหลักฐาน</p><br>
                                                        <img src="pic/slip.jpeg" width="120" />
                                                    </td>
                                                    <td class="text-right">
                                                        <button type="button"
                                                            class="btn btn-success">ยืนยันการโอน</button></br></br>
                                                        <button type="button"
                                                            class="btn btn-secondary">หลักฐานไม่ถูกต้อง</button>
                                                    </td>
                                                </tr>
                                            </div>

                                        </tbody>
                                    </table></br></br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- แจ้งเตือน-->

        </div>
    </div>
    </div>

    <?php require_once __DIR__ . '/require/admin/script.php';?>

</body>

</html>