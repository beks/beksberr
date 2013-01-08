<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<!--<link type="text/css" rel="stylesheet" href="css/demo_table.css" />-->
<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.8.2.custom.css" />
<link type="text/css" rel="stylesheet" href="css/styles.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery-templ.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<head>    
    <title> Welcome </title>
</head>
<body>
    <div id='login_form'>
    <?php if (!empty($msg)) {
        echo $msg;
    } ?>
        <form action="<?php echo site_url('login/process') ?>" method='post' name='process'>
            <h2>User Login</h2>
            <br />
                  
            <label for='username'>Username</label>
            <input type='text' name='username' id='username' size='25' /><br />
        
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' size='32' /><br />                            
        
            <input type='Submit' value='Login' />            
        </form>
    </div>
</body>
</html>