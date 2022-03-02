<?php include('../admin/config/dbcon.php'); ?>

<?php include("includes/header.php"); ?>
<?php include("includes/navbar.php"); ?>
<?php include("includes/headertop.php"); ?>


<?php
$id = $_GET['id'];
$sql = "UPDATE hotnews SET name=name+1 WHERE id='$id'";
$result = mysqli_query($con, $sql);
?>


<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <h2 class="text-secondary">วิทยาลัยเทคนิคตราด</h2>
        <h1>
            <p class="text-info">“ล้ำเลิศวิชาการ ชำนาญงานฝีมือ ยึดถือคุณธรรม”</p>
        </h1>
    </div>
</div>

<!--Card Start-->
<?php
$Title = 'วิทยาลัยเทคนิคตราด';
$sql = "select*from faculty order by id  desc Limit 0,4";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
$i = 0;
while ($rs = mysqli_fetch_array($result)) {
    $i++;
    $id1[$i] = $rs['id'];
    $name[$i] = $rs['name'];
    $design[$i] = $rs['design'];
    $descrip[$i] = $rs['descrip'];
    $link[$i] = $rs['link'];
    $images[$i] = $rs['images'];
    
}
?>
<!--Schetdual Start-->
<div class="container mt-2 mb-5" style="padding-top:10px">

    <div class="row">
        <div class="col-md-12">
            <!-- Card -->
            <div class="card shadow">
                <div class="card-body d-flex flex-row ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="images/vec.png" class="rounded-circle mr-3" width="100px" alt="avatar">
                            </div>
                            <div class="col-md-8">
                                <h4 class="card-title blue-text mt-3 ml-2 "><?php echo $name[$i]; ?></h4>
                                <p class="card-text"><i class="far fa-clock pr-2"></i>
                                    <?php
                                    echo " 
                                    $name[$i]
                                            เขียนโดย 
                                            <b>$design[$i]</b>
                                             &nbsp;|&nbsp;ผู้เข้าชม $design[$i]<br>";
                                    echo "เอกสารดาวน์โหลด : <a href='../admin/upload/faculty/$images[$i]'>แนบไฟล์</a>";
                                    ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <?php
                echo "
                    <div class='card-body card-body-cascade'>
                        <h5 class='font-weight-bold indigo-text py-2 text-success'>วิทยาลัยเทคนิคตราด</h5>
                        <p class='card-text'>$design[$i]</p>
                    </div>";
                ?>

                <?php
                if ($images != "") {
                    echo "<hr>";
                    echo "<div class='view view-cascade overlay'>";
                    echo "<div class='mask rgba-white-slight'></div></a>";
                    echo "</div>";
                }
                ?>

            </div>
            <!-- Card -->
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>