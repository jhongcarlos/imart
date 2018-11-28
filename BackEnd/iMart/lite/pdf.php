<?php 
// pdf
                                            function fetch_data()  
                                             {  
                                                  $em = $_POST['em'];
                                                  $output = '';
                                                  $sql = "SELECT * FROM tbl_orders ORDER BY id DESC";
                                                  $db = mysqli_connect('localhost','root','','imart');
                                                  if ($em != "") {
                                                    $sql = "SELECT * FROM tbl_orders WHERE email ='$em' ORDER BY id DESC ";
                                                  }
                                                  $result = mysqli_query($db, $sql);  
                                                  while($row = mysqli_fetch_array($result))  
                                                  {      
                                                  $output .= '
                                                                <table>
                                                                  <tr>
                                                                    <th align="left"><b>TRANSACTION NUMBER</b>: IMGS - 00000'.$row['userID'].'</th>
                                                                    <th align="right"><b>Date/Time</b>: '.$row["date"]. " " .$row["time"].'</th>
                                                                  </tr>
                                                                  <tr>
                                                                    <td><hr></td>
                                                                    <td><hr></td>
                                                                  </tr>
                                                                </table>
                                                                <table align="center" border="1">
                                                                <tr>
                                                                <th><b>Orders</b></th>
                                                                <th><b>Quantity</b></th>
                                                                <th><b>Price</b></th>
                                                                <th><b>Subtotal</b></th>
                                                                </tr>
                                                                <tr>
                                                                <td>'.$row["order_items"].'</td> 
                                                                <td>'.$row["qty"].'</td>
                                                                <td>'.$row["price"].'</td>
                                                                <td>'.$row['subtotal'].'</td>
                                                                </tr>
                                                                <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td><h2><b>Total</b>: '.$row["total"].'</h2> </td>
                                                                </tr>
                                                                </table>
                                                              <p>==============================================================================<br>=============================================================</p>
                                                              </div>';
                                                  }  
                                                  return $output;  
                                                  // <p><b>Contact Number</b>: '.$row["phone"]."  <b>Address</b>: '".$row["streetname"].'</p>  
                                                  //               <p><b>Email Address</b>: '.$row["email"].'</p> 
                                                  //               <p><b>Status</b>: '.$row["status"].'</p>
                                             }
                                             if(isset($_POST["pdf"]))  
                                               {  
                                                    require_once('tcpdf/tcpdf.php'); 
                                                    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                                                    $obj_pdf->SetCreator(PDF_CREATOR);  
                                                    $obj_pdf->SetTitle("Receipt");  
                                                    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                                                    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                                                    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                                                    $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                                                    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                                                    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
                                                    $obj_pdf->setPrintHeader(false);  
                                                    $obj_pdf->setPrintFooter(false);  
                                                    $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                                                    $obj_pdf->SetFont('helvetica', '', 11);  
                                                    $obj_pdf->AddPage();  
                                                    $content = '';  
                                                    $content .= '  
                                                    <div align="center">
                                                    <h1>iMart Grocery Shopper</h1>
                                                    <h4>12 Lorem ipsum St. Phase 3,<br> Meycauayan City, Bulacan.</h4><br>
                                                    <h3><u>Cash Bill</u></h3>
                                                    ';
                                                    $content .= fetch_data();  
                                                    // $content .= '</table>';  
                                                    $obj_pdf->writeHTML($content);  
                                                    ob_end_clean();
                                                    $obj_pdf->Output('file.pdf', 'I');  
                                               }  
                                             // End of PDF
 ?>