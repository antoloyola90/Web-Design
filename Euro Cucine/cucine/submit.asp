<%
Dim name1,age,phone,email
name1 = Request.Form("name")
address = Request.Form("address")
phone = Request.Form("phone")
email = Request.Form("email")

Dim resbody

resbody = "<table><tr><td>Name: </td><td>" & name1 & "</td></tr>" &_ 
"<tr><td>Address:</td><td>" & address & "</td></tr>" &_
"<tr><td>Phone:</td><td>" & phone & "</td></tr>" &_
"<tr><td>Email:</td><td>" & email & "</td></tr></table>" 

Const cdoSendUsingPickup = 1 'Send message using the local SMTP service pickup directory. 
Const cdoSendUsingPort = 2 'Send the message using the network (SMTP over the network). 

Const cdoAnonymous = 0 'Do not authenticate
Const cdoBasic = 1 'basic (clear-text) authentication
Const cdoNTLM = 2 'NTLM

Set objMessage = CreateObject("CDO.Message") 
objMessage.Subject = "Customer Enquiry" 
objMessage.From = email
'objMessage.To = "" 
objMessage.To = "vinod@eurocucine.in,sales@eurocucine.in" 
'objMessage.Bcc = "" 
objMessage.HTMLBody = resbody

'==This section provides the configuration information for the remote SMTP server.

objMessage.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/sendusing") = 2 

'Name or IP of Remote SMTP Server
objMessage.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserver") = "smtp.gmail.com"

'Type of authentication, NONE, Basic (Base64 encoded), NTLM
objMessage.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpauthenticate") = cdoBasic

'Your UserID on the SMTP server
objMessage.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/sendusername") = "sales@eurocucine.in"

'Your password on the SMTP server
objMessage.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/sendpassword") = "abcd1234@"

'Server port (typically 25)
objMessage.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = 25

'Use SSL for the connection (False or True)
objMessage.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpusessl") = 1

'Connection Timeout in seconds (the maximum time CDO will try to establish a connection to the SMTP server)
objMessage.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpconnectiontimeout") = 60

objMessage.Configuration.Fields.Update

'==End remote SMTP server configuration section==

objMessage.Send 
Response.Redirect("http://www.eurocucine.in/main.htm")
%> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Euro Cucin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript1.2" src="supersleight-min.js"></script>
<link rel="stylesheet" href="style.css">
</head>

<div align="center"  >
<body  topmargin="0" leftmargin="0">
<table width="996" border="0" cellpadding="0" cellspacing="0" background="images/bg.jpg">
  <!--DWLayoutTable-->
  <tr>
    <td width="287" height="260">&nbsp;</td>
    <td width="385">&nbsp;</td>
    <td width="324">&nbsp;</td>
  </tr>
  <tr>
    <td height="242">&nbsp;</td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/1.png">
                <!--DWLayoutTable-->
                
                    <tr>
                      <td width="21" height="57"></td>
                      <td width="319" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <!--DWLayoutTable-->
                        <tr>
                          <td width="319" height="57" valign="middle"><div align="center" class="text1">
                            <div align="center"><strong>Please fill the following details to <br>
                          know more information</strong></div>
                          </div></td>
                        </tr>
                      </table>                      </td>
                      <td width="45"></td>
                    </tr>
                    <tr>
                      <td height="185"></td>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
                    
                    
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="68">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</div>
</html>
