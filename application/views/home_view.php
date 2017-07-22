<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color:  #a9daff }
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}
.button1:hover span {display:none}
.button1:hover:before {content:"Send"}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}
.button1:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
<script>
    var myVar;
    function start(){
        var html;
        html="<center><img src='<?php echo base_url('images/mail_sending.jpg'); ?>' style='width:120px;height:90px;'></center>";
        document.getElementById("sending").innerHTML=html;
        myVar=setInterval(function () { checkMail(); }, 1000);
      
    }
   function sendMail(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","<?php echo site_url('home/setemail/'); ?>",false);
    xmlhttp.send(null);  
  }
  function checkMail(){
      
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","<?php echo site_url('Status_check'); ?>",false);
    xmlhttp.send(null);
    var x=xmlhttp.responseText;
    document.getElementById("getdata").innerHTML=x;
    if(x<(<?php echo $this->session->userdata('n'); ?>)){
        sendMail();
        var html;
        html="<center><img src='<?php echo base_url('images/mail_send.png'); ?>' style='width:40px;height:40px;'></center>";
        document.getElementById("name"+x).innerHTML=html;
        
    
    }
    else{
        var html;
        html="<center><form action='<?php echo site_url('home/page1'); ?>'><input type='image' src='<?php echo base_url('images/home.gif'); ?>' alt='Submit' width='80' height='80'></form></center>";
        document.getElementById("sending").innerHTML=html;
        clearInterval(myVar);
    }
  }
   </script>
</head>
<body>
<center><br><h1 style="font-size:300%;"><b>COLLEGE OF ENGINEERING ATTINGAL</b></h1></center>
<center><h2><b>SALARY SCALE LIST</h2></b></center><br>
<div id="getdata" style="color:green"></div>
<div style="overflow-x:auto;">
  <table>
    <tr><?php
   
    $n=0;
    $e_check=0;
        foreach($column_name AS $key){  ?>
  <th><?php echo $key; ++$n; ?></th>
<?php
if($key=='Email') $e_check=1;
}
if($e_check!=1) echo '<th><p style="color:red;">Email Field Missing</p></th>';
else {
?>
  <th><div id="sending">&nbsp;&nbsp;&nbsp;&nbsp;<button class="button button1" onclick="javascript:start()"><span>Send</span></button></div></th> <?php } ?>
    </tr>
    <?php
    $c=1;
    $total=count($details);
    foreach($details as $key){  ?>
    <tr><?php  for($i=0;$i<$n;$i++) echo '<td>'.$key[$i].'</td>';
    if($e_check!=1) echo '<td></td>'; else { ?>
      <td><?php
        $this->session->set_userdata('name'.$c, $key['1']);
        $this->session->set_userdata($key['1'], $key[$n-1]);    
      ?>
    <?php if($c<$total){ ?><div id="name<?php echo $c; ?>"><center><img src="<?php echo base_url('images/mail_notsend.png'); ?>" style="width:40px;height:40px;"></center></div><?php } ?></td>
    </tr>
    <?php 
    ++$c;
    
    } 
      }
    $this->session->set_userdata('n', $c-1);
    $this->session->set_userdata('next', '1');
    $c=1;
    
    ?>
  </table>
</div>

</body>
</html>
