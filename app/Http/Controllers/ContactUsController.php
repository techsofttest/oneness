<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer; // Import PHPMailer
use Illuminate\Support\Facades\Http; // Import the Http facade
use App\Models\Seo;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Service;
class ContactUsController extends Controller
{
    //


    public function index(Request $request)
    {
        $data['page_seo'] = Seo::find(1);
        $data['contact'] = Contact::find(1);
        
         $data['contact_content'] = Page::find(13);


                $data['timing'] = Page::find(12);


        if ($request->isMethod('post')) {

           
        
            
            // Detect hostname
            if (isset($_SERVER["OS"]) && $_SERVER["OS"] == "Windows_NT") {
                $hostname = strtolower($_SERVER["COMPUTERNAME"]);
            } else {
                $hostname = `hostname`;
                $hostnamearray = explode('.', $hostname);
                $hostname = $hostnamearray[0];
            }


            // Sanitize and validate inputs
            $name = htmlspecialchars($request->input('name'), ENT_QUOTES, 'UTF-8');            
            $email = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL);
            $phone = htmlspecialchars($request->input('phone'), ENT_QUOTES, 'UTF-8');
   


            $message = htmlspecialchars($request->input('message'), ENT_QUOTES, 'UTF-8');



            


            $title = "Aluer Aesthetic & Dental Clinic";
            $heading = 'Contacts';
            $subject = "Contacts || Aluer Aesthetic & Dental Clinic";

            

            // Email body
          $body = '<div style="font-family: Arial,Helvetica,sans-serif; line-height: 18px;">
                <p>Dear Admin,</p>
                <p>You have received an Enquiry from :<b>'.$name.'</b>.Contact him/her immediately.</p>
                <table width="600" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td align="left" valign="top" bgcolor="#FFFFFF">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #c4891f">
                                    <tbody>
                                        <tr style="">
                                            <td align="left" valign="top" background="" bgcolor="#FFFFFF">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="100%" align="left" valign="top" colspan="2" style="text-align:center; padding: 2%; border-bottom:1px solid #c4891f;">
                                                                <h4 style="text-transform: uppercase;font-size: 26px;color: #58595b;font-weight: 800;">Aluer Aesthetic & Dental Clinic</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="22" align="center" valign="top" bgcolor="#FFFFFF">
                                                <table width="92%" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td height="14" align="left" valign="middle">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <table align="center" width="500px" cellpadding="5">
                                                                <thead style="background-color:#ce0707;color:white">
                                                                    <tr>
                                                                        <th colspan="2"><h3>CONTACT MESSAGE</h3></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="background-color:#eee">
                                                                  
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <td>' . $name . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Phone</th>
                                                                        <td>' . $phone . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Email</th>
                                                                        <td>' . $email . '</td>
                                                                    </tr>

                                                                    
                                                                    <tr>
                                                                        <th>Message</th>
                                                                        <td>' . $message . '</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-top:1px solid #c4891f; padding:10px; text-align:center;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" style="font-family:Tahoma;font-size:12px;font-weight:normal;color:#333333;text-decoration:none"><strong>Aluer Aesthetic & Dental Clinic</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="middle">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>';

                   
               
            // Prepare and send email
            $mail = new PHPMailer;
            $mail->IsSMTP();
            // $mail->Host = (strpos($hostname, 'cpnl') === FALSE) ? 'relay-hosting.secureserver.net' : 'localhost';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587; // or 465 for SSL
            $mail->SMTPSecure = 'tls'; // or 'ssl' if using Port 465

            $mail->SMTPAuth = true;
            $mail->Username = 'techsofttest@gmail.com';
            $mail->Password = 'celzboqebpcusnce ';
            $mail->From = 'techsofttest@gmail.com';
            $mail->FromName = 'Aluer Aesthetic & Dental Clinic';
            $mail->AddAddress('techsofttest@gmail.com');
            $mail->Subject = $subject;
            $mail->IsHTML(true);

            $mail->Body = $body;

            ob_start(); // Start capturing output
            $mailresult = $mail->Send();
            $mailconversation = nl2br(htmlspecialchars(ob_get_clean())); // Capture PHPMailer output and convert to HTML

            if (!$mailresult) {
                $_SESSION['error'] = 'Unable to send email. Please try again later.' . $mail->ErrorInfo;
                return redirect()->back()->with('error', 'Message not Sent');


            } else {
                $_SESSION['success'] = 'Request proposal submitted successfully.';
                return redirect()->back()->with('success', 'Message Sent Successfully');

            }

          
        }


        return view('contact',$data);
    }
}
