<?php
include('server.php');

// fetch the record to be updated

if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    
    $edit_state=true;
    
    $rec=mysqli_query($db," SELECT * FROM info WHERE id=$id ");
    
    $record=mysqli_fetch_array($rec);
    
    $name = $record['name']; 
    
    $address = $record['address'];
    
    $id = $record['id'];
    
    
}




?>

<html>

    <head><title>How To Create ,delete,upadate database record: PHP and MYSQL</title></head>
    
    
   <!-- <link rel="stylesheet" type="text/css" hreft="style.css">-->
    <style>
             body {
    
    font-size: 19px;
    
                 }

  table{
    
    width:50px;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
    
}


tr{
    
    border-bottom: 1px solid #cbcbcb;

     
        }

th,td{
    
       border: none;
    height: 30px;
    padding: 2px;
    
    
}

tr:hover{
    
    background: #F5F5F5;
}
  form 
        {
            
            
            width: 500px;
            margin: 50px auto;
            text-align: left;
            padding: 20px;
            border: 1px solid #bbbbbb;
            
        } 
        
        .input-group{
            
            margin: 10px 0px 10px 0px;
        }
        
        .input-group label{
            
            display: block;
            text-align: left;
            margin:3px;
           
        }
        .input-group input{
            
            height:30px;
            width:350px;
            padding: 5px 10px;
            font-size: 16px;
            border-radius :5px;
            border: 1px solid grey;
            
            
        }      
        .btn{
            
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #5F9EA0;
            border:none;
            border-radius:5px;
            
         }
        
        .msg
        {     
            margin: 30px auto;
            padding:10px;
            border-radius:5px;
            color:#3c763d;
            background: #dff0d8;
            border:1px solid #3c763d;
            width:500px;
            text-align: center;
            
            
            
        }
     
        .edit_btn{
            
            text-decoration: none;
            padding: 2px 5px;
            background: #2E8B57;
            color: white;
            border-radius:3px;
        
        }
        
        .del_btn{
            text-decoration: none;
            padding: 2px 5px;
            color: white;
            border-radius:3px;
            background: #800000;
            
        }
        
    </style>
    
    <body>
        
        <table>
            
            <?php
            
            if(isset($_SESSION['msg'])): ?>
            
            <div class="msg">
            
            <?php  echo $_SESSION['msg'];  
                
                   unset($_SESSION['msg']);
                ?>
            
                
            </div>
            
            <?php endif ?>
            
            <thead>
            
                <tr>
                    <th>Name</th>
                    
                    <th>Address</th>
                    
                    <th colspan="2">Action</th>
                 
                </tr>
            
            </thead>
            
            <tbody>
            
                <?php while($row = mysqli_fetch_array($result))
             
                { ?>
             
                
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    
                    <td><?php echo $row['address'];?> </td>
                    
                    <td><a  class="edit_btn" href="index2.php?edit=<?php echo $row['id'];?>">Edit</a></td> 
                    
                <td><a  class= "btn" href="server.php?del=<?php echo $row['id'];?>">Delete</a></td>
                
                </tr>
                
                
               <?php
             }
                ?>
                
                
            </tbody>
        
        </table>
        
        <form method="POST" action="server.php" >
            
            <input type="hidden" name="id" value="<?php echo $id;?>">
            
            
        <div class="input-group">
            
            
            <label>Name</label>
            
            <input type="text" name="name" value="<?php echo $name ; ?>"/>
            
            </div>
               
        <div class="input-group">
            
            <label>Address</label>
            
            <input type="text" name="address" value="<?php echo $address ; ?>"/>
            </div>
            
            <div class="input-group">
                
                <?php if($edit_state == false):?>
                
                <button type="submit" name="save" class="btn">Save</button>
                
                <?php else: ?>
                
                <button type="submit" name="update" class="btn">Update</button>
                
                <?php endif ?>
                
            
            
            </div>
            
        </form>
    
    </body>

</html>