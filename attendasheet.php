 <?php
require_once 'connection.php'; //insert connection to page
require_once 'admin.php'; //Check login  
ob_start();
if(isset($_REQUEST['batch'])){

   function fetch_data()  
   {  
        $output = ''; 
        $connect = mysqli_connect("localhost", "root", "", "atendance");

        $sql = "SELECT * FROM student_reg where batch ='".$_REQUEST['batch']."' AND department ='".$_REQUEST['dpt']."'"; 
         $result = mysqli_query($connect, $sql);  
        while($row = mysqli_fetch_array($result))  
        {       
        $output .= '<tr>  
                            <td>'.$row["reg_number"].'</td>  
                            <td></td>  
                       </tr>  
                            ';  
        }  
        return $output;  
   }  
   if(isset($_POST["create_pdf"]))  
   {  
        require_once('tcpdf/tcpdf.php'); 
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Faculty of Technology - Lecture Attendance Details Report");  
        $obj_pdf->SetTitle("Faculty of Technology - Lecture Attendance Details Report");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $obj_pdf->SetDefaultMonospacedFont('helvetica');  
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false);  
        $obj_pdf->setPrintFooter(false);  
        $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        $obj_pdf->SetFont('helvetica', '', 10);  
        $obj_pdf->AddPage();  
        $content = '';  
        $content .= '  
        <h3 align="center">Attendance Sheet <br> Faculty of Technology -SEUSL </h3><br />
        <h3 align="left">Date : ....................... </h3>  
        <h3 align="left">Subject : ........................................................ </h3><br />  
        <table border="1" cellspacing="0" cellpadding="5">  
             <tr>  
                  <th width="30%">Registration Number</th>  
                  <th width="70%">Signature</th>
 
             </tr>  
        ';  
        $content .= fetch_data();  
        $content .= '</table>';  
        $content .= '<h3 align="left">Lecture Signature : ....................... </h3> ';  
        $obj_pdf->writeHTML($content);  
        $obj_pdf->Output('Attendance_Sheet.pdf', 'I');  
   }  

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SEUSL - Reports</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" type="text/css" href="css/boot.css">          
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">
              
                <h3 align="center">Attendance Sheet <br> Faculty of Technology -SEUSL </h3><br />
                <h3 align="left">Date : ....................... </h3>  
                <h3 align="left">Subject : ........................................................ </h3><br />  
                <div class="table-responsive"> 
                     <table class="table table-bordered" style="width: 100%; border: 1px solid red;">  
                          <tr>   
                               <th width="20%">Registration Number</th>  
                               <th width="50%">Signature</th>  

                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                          <button type="button" onclick="window.location.href='dashboard.php'" class="btn btn-success">Go to Dashboard</button>
                     </form> 
<?php } ?>
                </div>  
           </div>  
      </body>  
 </html>  