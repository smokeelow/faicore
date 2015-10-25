<?php
class FAI_MAIL
{
    public static function getRegTemplate($id,$pass,$name,$email)
    {
        return $template = '
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Surprise E-mail Template</title>

<!-- Hotmail ignores some valid styling, so we have to add this -->
<style type="text/css">
.ReadMsgBody
{width: 100%; background-color: #d2d2d2;}
.ExternalClass
{width: 100%; background-color: #d2d2d2;}
body
{width: 100%; height: 100%; background-color: #FFFFFF;}

html
{width: 100%; height: 100%;}

</style>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" screen_capture_injected="true">

<!-- HTML Source Code Protected By: <http://www.DesignerWiz.com> FREE HTML Source Code Encryption Protection -->
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" align="center">
	<tbody><tr>
		<td width="100%" height="100%" background="http://cdn.faicore.com/images/email/first/bg.jpg" valign="top">

		<!-- Main wrapper -->
		<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
			<tbody><tr>
				<td valign="top">





					<!-- Empty Table -->
					<table width="602" border="0" cellpadding="0" cellspacing="0" align="center">
						<tbody><tr>
							<td width="602" height="20">
							</td>
						</tr>
					</tbody></table>

					<!-- Shadows + Navigation -->
					<table width="654" height="136" border="0" cellpadding="0" cellspacing="0" align="center">
						<tbody><tr>
							<td width="26" height="136">
								<!-- Shadow Left -->
								<img src="http://cdn.faicore.com/images/email/first/shadow_left.jpg" alt="" style="display: block;">

							</td>

							<td width="602" height="136" valign="top">

								<!-- Nav Border Image -->
								<table width="602" border="0" cellpadding="0" cellspacing="0" align="center">
									<tbody><tr>
										<td width="602" style="line-height: 1px;" valign="top">
											<img src="http://cdn.faicore.com/images/email/first/nav_border_top.jpg" alt="" border="0" style="display: block;">
										</td>
									</tr>
								</tbody></table>

								<!-- Navigation -->
								<table width="602" border="0" cellpadding="0" cellspacing="0" align="center" style="font-size: 14px; color: #575757; font-weight: bold; text-align: left; font-family: Helvetica, Arial, sans-serif; line-height: 40px;">
									<tbody><tr>
										<td width="1" bgcolor="#dcdcdc"></td>
										<td width="600" bgcolor="#FFFFFF">

											<table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
												<tbody><tr>
													<td width="30" height="75"></td>
													<td width="150">
														<a href="'.Yii::app()->getFConfig('webURL').'" style="font-size:26px; text-decoration:none; color:#F17171;" title="'.Yii::app()->getFConfig('serverName').'">'.Yii::app()->getFConfig('serverName').'</a>
													</td>
													<td width="20"></td>
													<td width="90" mc:edit="nav1"><a href="'.Yii::app()->getFConfig('webURL').'/main" style="text-decoration: none; color: #575757;">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home').'</a></td>
													<td width="30"></td>
													<td width="120" mc:edit="nav2"><a href="'.Yii::app()->getFConfig('webURL').'/cp" style="text-decoration: none; color: #575757;">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'My account').'</a></td>
													<td width="30"></td>
													<td width="100" mc:edit="nav3"><a href="'.Yii::app()->getFConfig('webURL').'/rankings" style="text-decoration: none; color: #575757;">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rankings').'</a></td>
													<td width="30"></td>
												</tr>
											</tbody></table>

											<!-- Empty Table -->
											<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
												<tbody><tr>
													<td width="600" height="20" style="line-height: 1px;">

													</td>
												</tr>
											</tbody></table>

											<!-- Nav Border bottom Image -->
											<table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
												<tbody><tr>
													<td width="600" style="line-height: 1px;" valign="top">
														<img src="http://cdn.faicore.com/images/email/first/middle_shadow.jpg" alt="" border="0" style="display: block;">
													</td>
												</tr>
											</tbody></table>

										</td>
										<td width="1" bgcolor="#dcdcdc"></td>
									</tr>
								</tbody></table>

							</td>
							<td width="26" height="136">
								<!-- Shadow Right -->
								<img src="http://cdn.faicore.com/images/email/first/shadow_right.jpg" alt="" border="0" style="display: block;">
							</td>
						</tr>
					</tbody></table><!-- End Shadow + Navigation -->

					<!-- White Color Wrapper -->
					<table width="602" border="0" cellpadding="0" cellspacing="0" align="center">
						<tbody><tr>
							<td bgcolor="#FFFFFF">

								<!-- Border Wrapper ( left + right 1px ) -->
								<table width="602" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
									<tbody><tr>
										<td width="1" bgcolor="#dcdcdc"></td>
										<td width="31"></td>
										<td width="538">

											<!-- Empty Table -->
											<table width="538" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
												<tbody><tr>
													<td width="538" height="20" style="line-height: 1px;">

													</td>
												</tr>
											</tbody></table>

											<!-- Text Under The Header -->
											<table width="538" border="0" cellpadding="0" cellspacing="0" align="center" style="font-size: 14px; color: #b8b8b8; text-align: left; font-family: Helvetica, Arial, sans-serif; line-height: 20px;">
												<tbody><tr>
													<td width="538" style="color:#4D4D4D;">
													    <div style="margin-bottom:20px; font-size:20px; font-weight:bold; text-align:center;">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration information').':</div>
                                                        <div style="background: #FAFAFA;padding: 9px;border: 1px dashed #DDD;margin: 10px 0;"><span style="font-weight:bold; display:inline-block; width:120px;">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account').':</span> '.$id.'</div>
													    <div style="background: #FAFAFA;padding: 9px;border: 1px dashed #DDD;margin: 10px 0;"><span style="font-weight:bold; display:inline-block; width:120px;">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password').':</span> '.$pass.'</div>
													    <div style="background: #FAFAFA;padding: 9px;border: 1px dashed #DDD;margin: 10px 0;"><span style="font-weight:bold; display:inline-block; width:120px;">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name').':</span> '.$name.'</div>
													    <div style="background: #FAFAFA;padding: 9px;border: 1px dashed #DDD;margin: 10px 0;"><span style="font-weight:bold; display:inline-block; width:120px;">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'E-Mail').':</span> '.$email.'</div>
                                                    </td>
												</tr>
											</tbody></table><!-- End Text Under The Header -->

											<!-- Empty Table -->
											<table width="538" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
												<tbody><tr>
													<td width="538" height="20" style="line-height: 1px;">

													</td>
												</tr>
											</tbody></table>

										</td><td width="31"></td>
										<td width="1" bgcolor="#dcdcdc"></td>
									</tr>
								</tbody></table><!-- End Border Wrapper ( left + right 1px ) -->

								<!-- Dashed Border -->
								<table width="602" border="0" cellpadding="0" cellspacing="0" align="center">
									<tbody><tr>
										<td width="1" height="1" bgcolor="#dcdcdc"></td>
										<td width="600" height="1" style="border-bottom: 1px dashed #d4d4d4"></td>
										<td width="1" height="1" bgcolor="#dcdcdc"></td>
									</tr>
								</tbody></table>

								<!-- Empty Table -->
								<table width="602" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
									<tbody><tr>
										<td width="1" height="1" bgcolor="#dcdcdc"></td>
										<td width="600" height="8" style="line-height: 1px;">

										</td>
										<td width="1" height="1" bgcolor="#dcdcdc"></td>
									</tr>
								</tbody></table>

								<!-- Footer -->
								<table width="602" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" style="font-size: 12px; color: #b8b8b8; font-weight: normal; text-align: left; font-family: Helvetica, Arial, sans-serif; line-height: 18px;">
									<tbody><tr>
										<td width="1" height="90" bgcolor="#dcdcdc"></td>
										<td width="31"></td>
										<td width="323" height="90" mc:edit="company">'.Yii::app()->getFConfig('serverName').'<br>'.Yii::app()->getFConfig('email').'<br>'.Yii::app()->getFConfig('serverCredits').'</td>

										<td width="31"></td>
										<td width="1" height="90" bgcolor="#dcdcdc"></td>
									</tr>
								</tbody></table>

								<!-- Empty Table -->
								<table width="602" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
									<tbody><tr>
										<td width="602" style="line-height: 1px;">
											<img src="http://cdn.faicore.com/images/email/first/shadow_bottom.jpg" alt="" style="display: block;">
										</td>
									</tr>
								</tbody></table>

							</td>
						</tr>
					</tbody></table><!-- End White Color Wrapper -->

					<!-- Empty Table -->
					<table width="602" border="0" cellpadding="0" cellspacing="0" align="center">
						<tbody><tr>
							<td width="602" height="8">

							</td>
						</tr>
					</tbody></table>

				</td>
			</tr>
		</tbody></table><!-- End Main wrapper -->

		</td>
	</tr>
</tbody></table><!-- End Wrapper -->

<!-- Done -->




</body></html>';
    }
}