<form action="" method="post">
    <input type="submit" name="export">
</form>
<?php
include('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
}
$writer=new Xlsx($spreadsheet);
header("Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition:attachment;filename=user.xlsx");
header("Cache-Control:max-age=0");
$writer->save("php://output");
}
?>