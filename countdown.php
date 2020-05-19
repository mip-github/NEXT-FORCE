<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="TimeCircles/TimeCircles.js"></script>
<link rel="stylesheet" type="text/css" href="TimeCircles/TimeCircles.css">

<?php
    include('require/config.php');
    $sql = "SELECT * FROM project WHERE PROJECT_ID='1'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($result);
?>

<div data-date="<?php echo $row->PROJECT_END; ?>" id="count-down"></div>
<script type="text/javascript">
    $(function () {
        $("#count-down").TimeCircles();
    });
</script>