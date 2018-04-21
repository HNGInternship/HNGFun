<?php 
  $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'akinsource'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
  ?>

<!DOCTYPE html>
<html>
<body style="padding:0; margin:0">

<table border="0" cellpadding="0" cellspacing="0" style="margin: 0; padding: 0" width="100%">
    <tr>
        <td align="center" valign="top" bgcolor="#ce9fe8">
			<table width="640" cellspacing="0" cellpadding="0" bgcolor="#" class="100p">
                <tr>
                    <td background="images/header-bg.jpg" bgcolor="#f6546a" width="640" valign="top" class="100p">
                                <div>
								    <table width="640" border="0" cellspacing="0" cellpadding="20" class="100p">
                                        <tr>
                                            <td valign="top">
                                                
                                                <table border="0" cellspacing="0" cellpadding="0" width="600" class="100p">
                                                    <tr>
                                                        <td height="35"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="color:#FFFFFF; font-size:24px;">
                                                            <font face="'Roboto', Arial, sans-serif">
                                                                <span style="font-size:44px;">Akinsource</span><br />
                                                                <br />
                                                                <Span style="font-size:24px;">Coder Extraordinaire!<br />
                                                                HNG Intern</Span>
                                                                <br /><br />
																

                                                                <table border="0" cellspacing="0" cellpadding="10" style="border:2px solid #FFFFFF;">
                                                                    <tr>
                                                                        <td align="center" style="color:#FFFFFF; font-size:16px;"><font face="'Roboto', Arial, sans-serif"><a href="https://github.com/akinsource" style="color:#FFFFFF; text-decoration:none;">Portfolio</a></font></td>
                                                                    </tr>
                                                                </table>

                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35"></td>
                                                    </tr>
													<tr> 
													<td>
													<img width="600" src="<?php echo $user->image_filename ?>" alt="Akinsource">"
													</td>
													</tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<h3><i>Time is of the essence!</i></h3>
<?php echo $user->name ?>
</body?
</html>
