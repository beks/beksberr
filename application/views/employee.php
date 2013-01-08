<html>
<head><title>search</title></head>
<body>


   <form action="search" method="GET" >
   
         <p>Enter Your Search</p>
          <label >Employee No</label>
           <input type= "text" name="emp_no">
           
           <label >Last name</label>
           <input type= "text" name="last_name">
           
        <input type= "submit" name="submit">   
    </form> 
    
    <tbody>
            <?php foreach($query as $employee): ?>
            <tr>
               
                <td>
                      <?php echo ($employee->$emp_no); ?>
                </td>
                
                <td>
                      <?php echo ($employee->$last_name); ?>
                </td>
                <?php endforeach; ?>
            </tr>
                      
        </tbody>
   </body>
</html>