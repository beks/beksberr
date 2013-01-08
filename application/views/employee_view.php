<html>
<head>
<title>Advanced Web Tech</title>

<base href="<?php echo base_url() ?>" />

<!--<link type="text/css" rel="stylesheet" href="css/demo_table.css" />-->
<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.8.2.custom.css" />
<link type="text/css" rel="stylesheet" href="css/styles.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery-templ.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>


<script type="text/javascript" src="js/all.js"></script>
</head>
<body>

<div ><li><a href="<?php echo site_url('home/do_logout')?>"><font color="3A3A3A">Logout</font></a></li></div>

<div id="tabs">

    <ul>
        
		<li><a href="#read">Read</a></li>
        <li><a href="#create">Create</a></li>
		<li><a href="#update">Update</a></li>
		<li><a href="#logout">Log Out</a></li>
    </ul>

	
    <div id="read">
        <table id="records">
		
   <form action="<?php echo site_url('home/search')?>" id="searchform" method="GET" >
   
         <p>Enter Your Search</p>
         
          <label >Employee No</label>
           <input type= "text" name="emp_no">
           
           <label >Birth Date</label>
           <input type= "text" name="birth_date">
           
             <label >First name</label>
           <input type= "text" name="first_name">
		   
           <label >Last name</label>
           <input type= "text" name="last_name">
		   
		 
           
        <input type= "submit" name="submit">   
    </form>       
         <br> <table align="center"> 
		 <div id="read">
        <table id="records">
            <thead>
                <tr >
				<th>  </th>
                    <th>Emp No</th>
					<th>Birth Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
					<th>Actions</th>
                </tr>
            </thead>
			<tbody>
			
			<?php foreach($query as $employee):?>
            <tr>
			     <td><input type='checkbox' name='chkboxes' value='$emp_no'>
                <td><?php echo ($employee->emp_no); ?> </td>  
                <td><?php echo ($employee->birth_date); ?> </td>                    
                <td><?php echo ($employee->first_name); ?> </td>                    
                <td><?php echo ($employee->last_name); ?> </td>
                 <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
             <?php endforeach; ?> 
            </tr>  </tbody>
        </table></br>
		</table>
		</table>
		
		
    </div>

    <div id="create">
        <form action="" method="post">
           <p>
               <label for="cemp_no">Emp N0:</label>
               <input type="text" id="cemp_no" name="cemp_no" />
           </p>
           
		   <p>
               <label for="cbirth_date">Birth Date:</label>
               <input type="date" id="cbirth_date" name="cbirth_date" />
           </p>
		   
		   <p>
               <label for="cfirst_name">First Name:</label>
               <input type="text" id="cfirst_name" name="cfirst_name" />
           </p>
		   <p>
               <label for="clast_name">Last Name:</label>
               <input type="text" id="clast_name" name="clast_name" />
           </p>
		   <p>
               <label for="cgender" >Gender:</label>
               <input type="text" id="cgender" name="cgender" color="red"/>
               
		   
		   </p>
		   <p>
               <label for="chire_date">Hire Date:</label>
               <input type="date" id="chire_date" name="chire_date" />
           </p>
           
           <p>
               <label>&nbsp;</label>
               <input type="submit" name="createSubmit" value="Submit" />
           </p>
        </form>
    </div>

 <!-- delete confirmation dialog box -->
<div id="delConfDialog" title="Confirm">
    <p>Are you sure?</p>
</div>


<!-- message dialog box -->
<div id="msgDialog"><p></p></div>


<div id="update" title="Update">
    <div>
        <form action="" method="post">
            <p>
               <label for="birth_date">Birth_Date:</label>
               <input type="date" id="birth_date" name="birth_date" />
            </p>
            
			<p>
               <label for="first_name">First_Name:</label>
               <input type="text" id="first_name" name="first_name" />
            </p>
			<p>
               <label for="last_name">Last_Name:</label>
               <input type="text" id="last_name" name="last_name" />
            </p>
			<p>
               <label for="gender">Gender:</label>
               <input type="text" id="gender" name="gender" />
			   
            </p>
			<p>
               <label for="hire_date">Hire_Date:</label>
               <input type="date" id="hire_date" name="hire_date" />
            </p>
			<input type="submit" name="createsubmit" value="Submit" />
            <input type="hidden" id="userId" name="id" />
        </form>
    </div>
</div>






</body>
</html>

