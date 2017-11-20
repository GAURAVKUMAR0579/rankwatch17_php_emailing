<?php
//composer require mailgun/mailgun-php:~1.7.2
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;
?>
<html>
<head>
<style>
body {background-color: powderblue;}
</style

</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<div id="main">

<h2 style="color:blue;"> <center>Send Email via Mailgun API Using PHP</center> </h2>
</div>
</div>
<div class="col-md-12">
<div class="matter">
<div id="login">
<form  <align ="center" action="index.php" method="post">
             <h2 style="color:blue;"> <center>      
	 <label class="lab">Sender's Name :</label>
     <input  type="text" name="sendername" id="to" placeholder="Senders Name"/></center> </h2>
                <h2 style="color:blue;"> <center>   
	<label class="lab">Receiver's Email Address :</label>
    <input type="email" name="to" id="to" placeholder="Receiver's email address" /></center> </h2>    
	          <h2 style="color:blue;"> <center>    
    <label class="lab">Subject :</label>
    <input type="text" name="subject" id="subject" placeholder="subject" required /></center> </h2>
             <h2 style="color:blue;"> <center>    
 <label class="lab">Message body :</label>

    
<textarea type="text" name="msg" id="msg" placeholder="Enter your message here.." required ></textarea></center> </h2>
 <center>   <input type="submit" value=" Send " name="submit"     style="height:40px; width:100px"  /> </center> 
</form>
</div>
</div>
</div>
</div>
<!-- Right side div -->
</div>
</body>
</html>
<?php
if (isset($_POST['sendername'])) {
$sendername=$_POST['sendername'];
$to = $_POST['to'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
$msgtype = 'text';
$html='';
//enter the api kay
$mgClient = new Mailgun('key-c106a713c508c31ec00bee64a8db7b62');
// Enter domain which you find in Default Password
$domain = "sandboxff337c16d18541e9902db310bca76caf.mailgun.org";

# Make the call to the client using mailgun.
$result = $mgClient->sendMessage($domain, array(
"from" => "$sendername <mailgun@sandboxff337c16d18541e9902db310bca76caf.mailgun.org>",
"to" => "Baz <$to>",
"subject" => "$subject",
"text" => "$msg!",
'html' => "$html"
));
echo "<script>alert('Email Sent Successfully.. !!');</script>";
}
?>