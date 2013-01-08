<html>
<head><title>Search</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>/css/table.css" type="text/css" media="screen" />
   <style type="text/css">

 #navbar ul { 
        margin: 0; 
        padding: 10px; 
        list-style-type: none; 
        text-align: center; 
        background-color: #000;
        font-family: sans-serif; 
        } 
 
#navbar ul li {  
        display: inline;
        font-family: sans-serif; 
        } 
 
#navbar ul li a { 
        text-decoration: none; 
        padding: .2em 5em; 
        color: #fff; 
        background-color: #000;
        font-family: sans-serif; 
        } 
#Search ul li a { 
        text-decoration: none; 
        padding: .2em 5em; 
        color: #fff; 
        background-color: #000;
        font-family: sans-serif; 
        } 
 
#navbar ul li a:hover { 
        color: #000; 
        background-color: #fff;
        font-family: sans-serif; 
        }
#navbar label { 
font: 100;
color: white;
font-family: sans-serif; 
}
#Sform form { 
font: 100;
text-align: center;
color: green;
font-weight:bolder;
}
#Sform input {  
        font: 100;
        color: red;
        display:inline;
        font-weight: bolder;
        } 
</style>

</head>
<body>
<div id='search'>
</div>
  <li><a href="<?php echo site_url('home/do_logout')?>"><font color="red">Logout</font></a></li> 
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

<div id="read">   
          <table id="records">  
    <thead>
    <tr>
    <th>Employee Number</th>
    <th>Birth Date</th>
    <th>First Name</th>
    <th>Last Name</th>  
</tr>	
    </thead>
    
    <tbody> 
     
    <?php foreach($query as $employee):?>
            <tr>
                <td><?php echo ($employee->emp_no); ?> </td>  
                <td><?php echo ($employee->birth_date); ?> </td>                    
                <td><?php echo ($employee->first_name); ?> </td>                    
                <td><?php echo ($employee->last_name); ?> </td>
                <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
             <?php endforeach; ?> 
            </tr>
                      
        </tbody>  
        
        </table> 
</div>
<body style="background-color: #4E0000;">
 <div id="header">
 <div id="navbar"> 
  <ul> 
        <li><a href="<?php echo site_url('home/search')?>"><b>Home</b></a></li> 
        <li><a href="<?php echo site_url('home/add_post')?>"><b>Add Employee</b> New</a></li> 
        <li><a href="<?php echo site_url('home/delete_post')?>"><b>Delete Employee</b></a></li> 
        <li><a href="#"><b>Update Employee</b></a></li> 
        <li><a href="<?php echo site_url('home/do_logout')?>"><font color="red">Logout</font></a></li> 
  </ul> 
</div> 
 
 </div>
   <form action="<?php echo site_url('home/add_main')?>" method="post">
 
 <div class="control-group"> 
 <label class="control-group"> Employee Number:  </label>
 <div class="controls"> <input type="text" id="emp_no" name="emp_no" value=""/></div>
 </div>
 
<div class="control-group"> 
<label class="control-group"> Birth Date: </label>
<div class="controls"> <input type="text" id="birth_date" name="birth_date" value=""/></div>
</div>

<div class="control-group"> 
<label class="control-group"> First Name: </label>
<div class="controls"> <input type="text" id="first_name" name="first_name" value=""/></div>
</div>

<div class="control-group"> 
<label class="control-group"> Last Name: </label>
<div class="controls"> <input type="text" id="last_name" name="last_name" value=""/></div>
</div>

<div class="control-group"> 
<label class="control-group"> Gender: </label>
<div class="controls"> <input type="text" id="gender" name="gender" value=""/></div>
</div>

<div class="control-group"> 
<label class="control-group"> Hire Date: </label>
<div class="controls"> <input type="text" id="hire_date" name="hire_date" value=""/></div>
</div>

<div class="control-group"> 
<label class="control-group"> From Date: </label>
<div class="controls"> <input type="text" id="from_date" name="from_date" value=""/></div>
</div>

<div class="control-group"> 
<label class="control-group"> To Date: </label>
<div class="controls"> <input type="text" id="to_date" name="to_date" value=""/></div>
</div>
     -->
<div class="control-group"> 
<label class="control-group"> Department No: </label>
<div class="controls"> <input type="text" id="dept_no" name="dept_no" value=""/></div>
</div>

 
 <div class="controls"> <input type= "submit" name="submit"></div>
 

 
 
 </form>
 

        <br/>
        <div id="footer">
         <div id="navbar"> 
  <ul> 
   <label><b> Created by: Beki Tahiri W1171569</b></label> 
    
  </ul> 
</div> 
        </div>       
   </body>
</html>