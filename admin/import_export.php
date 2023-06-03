<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>
  
<style>
</style>
</head>
<body>
<div style="position:absolute;margin-top:-500px;">
<table id="mytable" border="1">
  <tr>
    <th>S.No</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Password</th>
    <th>Register time</th>
  </tr>
  <?php
  include('db.php');
  $sql3="select * from user";
  $result3=mysqli_query($con,$sql3);
  if(mysqli_num_rows($result3)>0)
  {
    while($row3=mysqli_fetch_assoc($result3))
    {
?>
<tr>
  <td><?=$row3["id"]?></td>
  <td><?=$row3["name"]?></td>
  <td><?=$row3["mobile"]?></td>
  <td><?=$row3["email"]?></td>
  <td><?=$row3["password"]?></td>
  <td><?=$row3["reg_time"]?></td>
</tr>
<?php
    }
  }
  ?>
  </table>
</div>
<?php
include('aheader.php');
?>
<div id="ex1" class="one modal">
<h3 class="text-center text-success">SUCCESS</h3>
<p>Excel datas are upload and inserted successfully...</p>
</div>
<div class="container">
<h4 class="mt-4">IMPORT USER / EXPORT USER</h4>
<div class="row">
<div class="col-md-6">
<div class="card-header bg-danger text-white">EXPORT</div>
<div class="card shadow-lg">
<div class="card-body">
<span class="text-danger" id="nouser"></span>
</div>
<div class="card-footer">
<!--<form action="" method="post">
  <input type="submit" name="export" value="Export as Excel" class="btn btn-danger">
</form>-->
<button id="export" class="btn btn-danger">Export as Excel</button>
<script type="text/javascript">
  $(document).ready(function(){
$("#export").click(function(){
$("#mytable").table2excel({
filename:"User.xls"
});
});
  });
</script>
</div>
</div>
</div>
<div class="col-md-6">
<div class="card shadow-lg">
<form action="" method="post" enctype="multipart/form-data">
<div class="card-header bg-primary text-white">IMPORT</div>
<div class="card-body">
    <input type="file" name="myimage" required>
</div>
<div class="card-footer">
<input type="submit" class="btn btn-primary" name="upload" value="Upload">
</div>
</form>
</div>
</div>

</div>
</div>
<div class="container-fluid">
<div class="row bg-dark p-4 text-white text-right fixed-bottom">
<div class="col">
&copy; <?php echo date('Y'); ?> R.Ganesh kumar copyrights reserved
</div>
</div>
</div>
<?php
include('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST["export"]))
{
include('db.php');
$sql2="select * from user";
$result2=mysqli_query($con,$sql2);
if(mysqli_num_rows($result2)>0)
{
$spreadsheet=new Spreadsheet();
$sheet=$spreadsheet->getActiveSheet();
$sheet->setCellValue('A1','ID');
$sheet->setCellValue('B1','NAME');
$sheet->setCellValue('C1','MOBILE');
$sheet->setCellValue('D1','EMAIL');
$sheet->setCellValue('E1','PASSWORD');
$sheet->setCellValue('F1','REGISTERED TIME');
$row=2;
while($row2=mysqli_fetch_assoc($result2))
{
  $sheet->setCellValue('A'.$row,$row2["id"]);
  $sheet->setCellValue('B'.$row,$row2["name"]);
  $sheet->setCellValue('C'.$row,$row2["mobile"]);
  $sheet->setCellValue('D'.$row,$row2["email"]);
  $sheet->setCellValue('E'.$row,$row2["password"]);
  $sheet->setCellValue('F'.$row,$row2["reg_time"]);
  $row++;
}
$writer=new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
header("Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition:attachment;filename=user_data.xlsx");
header("Cache-Control:max-age=0");
$writer->save("php://output");
}
else
{
  echo "<script>document.getElementById('nouser').innerHTML='No data to export';</script>";
}
}
if(isset($_POST["upload"]))
{
    include('db.php');
    $target_dir="excels/";
    $target_file=$target_dir.basename($_FILES["myimage"]["name"]);
    if(strstr($target_file,'.xls') || strstr($target_file,'.xlsx'))
    {
    if(move_uploaded_file($_FILES["myimage"]["tmp_name"],$target_file))
    {
        $reader=new Xlsx();
        $spreadsheet=$reader->load($target_file);
        $sheet_data=$spreadsheet->getActiveSheet()->toArray();
        $row_count=count($sheet_data)-1;
        for($i=1;$i<=$row_count;$i++)
        {
            $name=$sheet_data[$i][0];
            $mobile=$sheet_data[$i][1];
            $email=$sheet_data[$i][2];
            $password=$sheet_data[$i][3];
            $sql="insert into user values (NULL,'$name','$mobile','$email','$password',NULL)";
            if(mysqli_query($con,$sql))
            {
              
            }
        }
        ?>
        <script>
        Swal.fire({
  icon: 'success',
  title: 'Success...',
  text: 'Excel data uploaded and inserted successfully!',
})
        </script>
        <?php
    }
    }
    else
    {
    echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Error to import...',
       
      })
    </script>";
    }
}
?>

</body>
</html>