<?php
include("functions/init.php");
if(!isset($_GET['id']) && !isset($_GET['other'])) {

} else {
$data =  $_GET['id'];
$other = $_GET['other'];
?>

<!-- right column -->
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"><?php echo strtoupper($data); ?></h3>
            <div class="card-tools">
                <button type="button" onclick="window.print();" id="prin" data-toggle="tooltip" title="Print Result"
                    class="btn btn-tool"><i class="fas fa-print"></i>
                </button>

                <button type="button" id="prin" data-toggle="tooltip" title="Edit Intake" class="btn btn-tool"><i
                        class="fas fa-edit"></i>
                </button>
                <button type="button" data-toggle="tooltip" title="Maximize" class="btn btn-tool"
                    data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
                <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool"
                    data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Admission No</th>
                        <th>Full Name</th>
                        <th>1st Term Bill</th>
                        <th>2nd Term Bill</th>
                        <th>3rd Term Bill</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $der = $_SESSION['aca'];

                  $sql = "SELECT * FROM student WHERE `class` = '$data' ORDER BY `name` asc";
                  $rsl = query($sql);
                  while($row = mysqli_fetch_array($rsl)) 
                  {
                  ?>
                    <tr>
                        <td><?php echo $row['adid'] ?> <br /><a
                                href="./deleteintake?id=<?php echo $data ?>&data=<?php echo $row['stid'] ?>&name=<?php echo $row['adid'] ?>"><button
                                    type="button" data-toggle="tooltip" title="Delete Intake" class="btn btn-tool"><i
                                        class="fas fa-trash text-danger"></i>
                                </button></a> | <a
                                href="editintake?id=<?php echo $data ?>&data=<?php echo $row['stid'] ?>&name=<?php echo $row['adid'] ?>"><button
                                    type="button" data-toggle="tooltip" title="Edit Intake" class="btn btn-tool"><i
                                        class="fas fa-edit text-danger"></i>
                                </button></a></td>
                        <td><?php echo $row['name'] ?></td>
                        <td>₦<?php echo number_format($row['fst']) ?>
                        </td>
                        <td>₦<?php echo number_format($row['snd']) ?></td>
                        <td>₦<?php echo number_format($row['trd']) ?></td>
                    </tr>
                    <?php
              }
              ?>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<?php
      }
      ?>




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
document.getElementById('prin').addEventListener('click', myfun);

function myfun() {
    window.print();
}
</script>

<script>
$(document).ready(function() {

    $("#delte").click(function() {

        $("#modal-delete").modal({
            backdrop: "static"
        });
    })

})
</script>