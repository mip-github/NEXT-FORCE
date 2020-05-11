<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="TimeCircles/TimeCircles.js"></script>
<link rel="stylesheet" type="text/css" href="TimeCircles/TimeCircles.css">

<?php
    include('require/config.php');
    $sql = "SELECT * FROM orders WHERE orderNumber='10100'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($result);
?>

<div data-date="<?php echo $row->requiredDate; ?>" id="count-down"></div>
<script type="text/javascript">
    $(function () {
        $("#count-down").TimeCircles();
    });
</script>