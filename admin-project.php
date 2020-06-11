<?php
include('require/config_pdo.php');
date_default_timezone_set("Asia/Bangkok");
$now = date('Y-m-d H:i:s');

$PROJECT_REWARD = $_GET['id'];

$sql = "SELECT *,COUNT(PROJECT_ID) as count FROM project";
$stmt=$db->prepare($sql);
$stmt->execute();
$row1=$stmt->fetch(PDO::FETCH_ASSOC);
    $COUNT = $row1['count'];

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php require_once __DIR__ . '/require/admin/head.php';?>
</head>

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
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill"
                                            href="#current-month" role="tab" aria-controls="pills-timeline"
                                            aria-selected="true">ทั้งหมด(<?=$COUNT?>)</a>
                                    </li>
                                    <!-- <li class="nav-item">
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
                                    </li> -->
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="current-month" role="tabpanel"
                                        aria-labelledby="pills-timeline-tab">
                                        <div class="card-body">
                                            <h5>ข้อมูลโครงการ</h5>
                                            <hr>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalCenter"><i class="ik ik-plus"></i>Add
                                                Project</button>
                                            <hr>
                                            <table id="alt-pg-dt" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>รหัสโครงการ</th>
                                                        <th class="nosort">ชื่อโครงการ</th>
                                                        <th>ราคาโครงการ</th>
                                                        <th>วันที่เริ่มต้น</th>
                                                        <th class="nosort">วันที่สิ้นสุด</th>
                                                        <th>สถานะ</th>
                                                        <th>REWARD</th>
                                                        <th class="nosort">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                        $sql = "SELECT * FROM project";
                                        $stmt=$db->prepare($sql);
                                        $stmt->execute();
                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                            $PROJECT_ID = $row['PROJECT_ID'];
                                            $PROJECT_NUMBER = $row['PROJECT_NUMBER'];
                                            $PROJECT_NAME = $row['PROJECT_NAME'];
                                            $PROJECT_PRICE = $row['PROJECT_PRICE'];
                                            $PROJECT_START = $row['PROJECT_START'];
                                            $PROJECT_END = $row['PROJECT_END'];
                                            $PROJECT_STS = $row['PROJECT_STATUS'];
                                            
                                        ?>
                                                    <tr>
                                                        <td>
                                                            <h6><?=$PROJECT_NUMBER?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?=$PROJECT_NAME?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?=$PROJECT_PRICE?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?=$PROJECT_START?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?=$PROJECT_END?></h6>
                                                        </td>
                                                        <td>
                                                            <?php
                                                        if($PROJECT_STS == 'เริ่มโครงการ'){
                                                            echo'<button type="button" class="btn btn-success"><i class="ik ik-check-circle"></i>เริ่มโครงการ</button>';
                                                        }else{
                                                            echo'<button type="button" class="btn btn-danger"><i class="ik ik-info"></i>สิ้นสุดโครงการ</button>';
                                                        }
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <a href="admin-project.php?id=<?=$PROJECT_ID?>"><button type="button" class="btn btn-info"><i class="ik ik-award"></i></button></a>
                                                        </td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#AwardModal"
                                                                    data-id="<?=$PROJECT_ID;?>"><i
                                                                        class="ik ik-award"></i></a>
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="current-month" role="tabpanel"
                                        aria-labelledby="pills-timeline-tab">
                                        <div class="card-body">
                                            <h5>รางวัล</h5>
                                            <hr>
                                            <table id="alt-pg-dt" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อรางวัล</th>
                                                        <th>การลงทุนขั้นต่ำ</th>
                                                        <th>จำนวนผู้ลงทุน</th>
                                                        <th>จำนวนผู้ลงทุนสูงสุด</th>
                                                        <th class="nosort">วันที่ได้รับรางวัลโดยประมาณ</th>
                                                        <th class="nosort">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                        $sql1 = "SELECT * FROM project_reward WHERE PROJECT_ID = :PROJECT_REWARD";
                                        $stmt1=$db->prepare($sql1);
                                        $stmt1->bindparam(':PROJECT_REWARD', $PROJECT_REWARD);
                                        $stmt1->execute();
                                        while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
                                            $REWARD_ID = $row1['REWARD_ID'];
                                            $PROJECT_ID = $row1['PROJECT_ID'];
                                            $amount = $row1['amount'];
                                            $NAME = $row1['NAME'];
                                            $REWARD_SUM = $row1['REWARD_SUM'];
                                            $REWARD_MAX = $row1['REWARD_MAX'];
                                            $ESTIMATED = $row1['ESTIMATED'];
                                            
                                        ?>
                                                    <tr>
                                                        <td>
                                                            <h6><?=$NAME?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?=$amount?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?=$REWARD_SUM?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?=$REWARD_MAX?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?=$ESTIMATED?></h6>
                                                        </td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterLabel">Project T10</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="project_query.php" method="POST" id="project_form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">PROJECT ID:</label>
                                    <input type="text" class="form-control" id="PROJECT_NUMBER" name="PROJECT_NUMBER"
                                        placeholder="กรุณากรอกรหัสโครงการ">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">PROJECT
                                        NAME:</label>
                                    <input type="text" class="form-control" id="PROJECT_NAME" name="PROJECT_NAME"
                                        placeholder="กรุณากรอกชื่อโครงการ">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">PROJECT
                                        PRICE:</label>
                                    <input type="text" class="form-control" id="PROJECT_PRICE" name="PROJECT_PRICE"
                                        placeholder="กรุณากรอกราคาโครงการ">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">PROJECT
                                        UNIT:</label>
                                    <input type="text" class="form-control" id="PROJECT_NUM_UNIT"
                                        name="PROJECT_NUM_UNIT" placeholder="กรุณากรอกราคาต่อหน่วย">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">PROJECT
                                        TIMESTAMP:</label>
                                    <input type="text" class="form-control" id="PROJECT_DATE" name="PROJECT_DATE"
                                        value="<?=$now?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">SOFT CAP:</label>
                                    <input type="text" class="form-control" id="PROJECT_SOFT_CAP"
                                        name="PROJECT_SOFT_CAP" placeholder="PROJECT_SOFT_CAP">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">HARD CAP:</label>
                                    <input type="text" class="form-control" id="PROJECT_HARD_CAP"
                                        name="PROJECT_HARD_CAP" placeholder="PROJECT_HARD_CAP">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">PROJECT START
                                        DATE:</label>
                                    <input type="date" class="form-control" id="PROJECT_START" name="PROJECT_START">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">PROJECT END
                                        DATE:</label>
                                    <input type="date" class="form-control" id="PROJECT_END" name="PROJECT_END">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>FILE UPLOAD:</label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control file-upload-info" placeholder="Upload Files"
                                    name="PROJECT_FILES" id="PROJECT_FILES">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">PROJECT DETAIL:</label>
                            <textarea class="form-control" id="PROJECT_DETAIL" rows="4"
                                name="PROJECT_DETAIL"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary mr-2" value="Submit" name="submit">
                        <input type="hidden" value="project" name="do">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
   

    <div class="modal fade" id="AwardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterLabel">รางวัลสำหรับแคมเปญ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="project_query.php" method="POST" id="award_form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">ชื่อแคมเปญ:</label>
                                    <input type="text" class="form-control" id="PROJECT_NAME" name="PROJECT_NAME">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">ชื่อรางวัล:</label>
                                    <input type="text" class="form-control" id="NAME" name="NAME">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">จำนวนลงทุนขั้นต่ำ:</label>
                                    <input type="text" class="form-control" id="MINIMUM" name="MINIMUM"
                                        placeholder="ขั้นต่ำในการซื้อ">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">จำนวนผู้ลงทุนสูงสุด:</label>
                                    <input type="text" class="form-control" id="REWARD_MAX" name="REWARD_MAX"
                                        placeholder="จำนวนผู้ซื้อสูงสุด">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">วันที่ได้รับรางวัลโดยประมาณ:</label>
                                    <input type="date" class="form-control" id="ESTIMATED" name="ESTIMATED"
                                        placeholder="วันที่ได้รับของ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary mr-2" value="Submit" name="submit">
                        <input type="hidden" value="reward" name="do">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
            <input type="hidden" name="PROJECT_ID" id="PROJECT_ID">
            <input type="hidden" name="PROJECT_ID" id="PROJECT_ID" value="<?=$PROJECT_ID?>" />
            </form>
        </div>
    </div>
</div>
<?php require_once __DIR__.'/require/admin/jquery.php'; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#AwardModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var PROJECT_ID = button.data('id')
            var modal = $(this)

            $.ajax({
                type: "POST",
                url: "project_query.php",
                data: {
                    PROJECT_ID: PROJECT_ID,
                    do: 'get_project'
                },
                dataType: "json",
                success: function(response) {
                    console.log(response)
                    var arr_input_key = ['PROJECT_NAME']
                    $.each(response, function(indexInArray, valueOfElement) {
                        if (jQuery.inArray(indexInArray, arr_input_key) !== -1) {
                            if (valueOfElement != '') {
                                modal.find('input[name="' + indexInArray + '"]')
                                    .val(valueOfElement)
                            }
                        }
                    });
                    modal.find('#PROJECT_ID').val(PROJECT_ID)
                }
            });
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#project_form").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "project_query.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response)
                    if (response == "Error") {
                        swal("รหัสโครงการนี้ได้ถูกใช้ไปแ้ว !!", {
                            icon: "warning",
                        });
                    }
                    if (response == "Success") {
                        let timerInterval
                        Swal.fire({
                            title: 'บันทึกข้อมูลเสร็จสิ้น',
                            html: 'นับถอยหลัง <b></b> milliseconds.',
                            timer: 2000,
                            timerProgressBar: true,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    const content = Swal
                                    .getContent()
                                    if (content) {
                                        const b = content
                                            .querySelector('b')
                                        if (b) {
                                            b.textContent = Swal
                                                .getTimerLeft()
                                        }
                                    }
                                }, 100)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                        setTimeout(function() {
                            window.location.href = "admin-project.php";
                        }, 2000);
                    }
                },
                error: function() {}
            });
        }));
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#award_form").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "project_query.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response)
                    if (response == "Error") {
                        swal("รหัสโครงการนี้ได้ถูกใช้ไปแ้ว !!", {
                            icon: "warning",
                        });
                    }
                    if (response == "Success") {
                        let timerInterval
                        Swal.fire({
                            title: 'บันทึกข้อมูลเสร็จสิ้น',
                            html: 'นับถอยหลัง <b></b> milliseconds.',
                            timer: 2000,
                            timerProgressBar: true,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    const content = Swal
                                    .getContent()
                                    if (content) {
                                        const b = content
                                            .querySelector('b')
                                        if (b) {
                                            b.textContent = Swal
                                                .getTimerLeft()
                                        }
                                    }
                                }, 100)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                        setTimeout(function() {
                            window.location.href = "admin-project.php";
                        }, 2000);
                    }
                },
                error: function() {}
            });
        }));
    });
</script>

</body>

</html>