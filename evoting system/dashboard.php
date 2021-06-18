<?php
  session_start();
  if(!isset($_SESSION['userdata'])){
      header("location:../index.html");
  }
  $userdata=$_SESSION['userdata'];
  $groupsdata=$_SESSION['groupsdata'];

  if($_SESSION['userdata']['status']==0)
  {
    $status='<b style="color:red">Not Voted</b>';

  }
  else
  {
    $status='<b style="color:green">Voted</b>';
  }
  ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<title>online voting system-Dashboard</title>
</head>
<body>
      <div id="mainsection">
              <div id="headersection">
	             <a href="index.html"><button id="back">Back</button></a>
	             <a href="logout.php"><button id="logout">Logout</button></a>
               <h1 style="text-align:center">"Time to vote here!!"</h1>
              </div>
      
  
                <hr>
            <div id="mainpanel">
              <div id="profile">
                <center><img src="admin images/<?php echo $userdata['photo'] ?>" height="100px" width="100px"></center><br><br>
                <b> Name:</b> <?php echo $userdata['name']?><br><br>
                <b> Mobile:</b><?php echo $userdata['mobile']?><br><br>
                <b> Address:</b><?php echo $userdata['address']?><br><br>
                <b> Status:</b><?php echo $status ?><br><br>
              </div>
              <div id="Group">
                    <?php
                         if($_SESSION['groupsdata'])
                            {
                                for($i=0; $i<count($groupsdata); $i++)
                                    { 

                     ?>
               
                        <div>
                        <img style="float: right " src="../groupimages/<?php echo $groupsdata[$i]['photo'] ?>"  height="100" width="100">
                        <b>Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
                        <b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                        <form action="api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                        <?php
                             if($_SESSION['userdata']['status']==0)
                             {
                              ?>
                              <input type="submit" name="votebtn" value="Vote" id="votebtn">
                              <?php
                             }
                             else
                             {
                              ?>
                              <button disabled type="button" name="votebtn" value="Vote" id="voted">voted</button>
                             <?php
                           }
                           ?>
                             
                       
                        </form>
                      </div>
                      <br>
                      <hr>
                      <br>
                                        

                    <?php
                                        
               }
                    }                 

                    else
                        {
                          
                        }
                                         
                            
                   ?> 
              </div>
      </div>
      
</body>
</html>
