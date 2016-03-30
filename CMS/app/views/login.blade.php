<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="/css/main.css" />
	<link rel="stylesheet" type="text/css" href="/css/form.css" />
        
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="/css/mystyle.css" />
    <link rel="stylesheet" type="text/css" href="/css/token-input.css" />
    <link rel="stylesheet" type="text/css" href="/css/token-input-facebook.css" />
    <link rel="stylesheet" type="text/css" href="/css/jqueryui.css" />
	<link rel="stylesheet" type="text/css" href="/css/uploadfile.css" />

	
	<script type='text/javascript' src='/js/jquery.min.js'></script>

	<script type='text/javascript' src='/js/jquery.appear-1.1.1.js'></script>
	<script type='text/javascript' src='/js/tooltip.min.js'></script>

	<script type='text/javascript' src='/js/tinymce.editor.js'></script>

	<script type='text/javascript' src='/js/core.js'></script>
	<script type='text/javascript' src='/js/ajax.js'></script>
	<script type='text/javascript' src='/js/funcs.js'></script>	
	<script type='text/javascript' src='/js/jquery.uploadfile.min.js'></script>

	<link rel="shortcut icon" href="/css/images/healthcare.ico" />
	<link rel="stylesheet" type="text/css" href="/assets/7b8be64/gridview/styles.css" />
	<link rel="stylesheet" type="text/css" href="/assets/bda30421/pager.css" />
	<script type="text/javascript" src=""></script>
	<script type="text/javascript" src="/assets/89e1c5f0/jquery.ba-bbq.js"></script>
	<title>Tijarti - Login Site</title>
</head>

<body>

	<?php
		if( $errors->any() )
		{
			$message = $errors->first();
			if( $message === 'SUCCESS' )
				Functions::alertSuccessMessage('');
			else if( $message !== '' )
				Functions::alertErrorMessage ($message);	
		}		
	?>
	
<table cellpadding="0" cellspacing="0" border="0" class="content-table">

    <tr valign="top">
        <td width="1px" class="side-menu">
            <div id="right_column">
            </div>
        </td>
        <td class="login-page">

            <div id="main_column_login" class="clear">
                <div class="login-wrap">
                    <h1 class="clear" style="font-weight: bold;">
                        <a href="/" class="float-left">Tijarti</a>
                        <span style="padding: 2px 0px 0px 0px;">Administration panel</span>
                    </h1>
                    <form action="postLogin" method="post" name="loginform" class="cm-form-highlight cm-skip-check-items">
                        <div class="login-content">
                            <div class="clear-form-field">
                                <p><label for="email" class="cm-required cm-failed-label">Email:</label></p>
                                <input id="email" type="text" name="email" size="20" class="input-text cm-focus" tabindex="1" value="" ></input>
                            </div>
                            <div class="clear-form-field">
                                <p><label for="password" class="cm-required cm-failed-label">Password:</label></p>
                                <input type="password" id="password" name="password" size="20" class="input-text" tabindex="2" value="" ></input>
                            </div>
					        <div class="buttons-container nowrap">
                                <div class="float-left">
                                    <span  class="submit-button cm-button-main ">
                                        <input type="submit" name="dispatch[auth.login]" value="Sign In" tabindex="3" />
                                    </span>
                                </div>
                                <div class="float-right" style="display:none;">
                                    <a href="forget_password.php" class="underlined">Forgot your password?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--main_column_login-->
            </div>
        </td>
    </tr>
</table>
</body>

</html>
