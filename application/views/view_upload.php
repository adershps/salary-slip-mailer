<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('<?php echo base_url('images/background.jpg'); ?>');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
form {
        width: 60%;
        background: #3fcdc0;
        margin: 0 auto;
        padding: 2.5%;
      }
</style>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<br><br><br>
<div class="w3-jumbo w3-animate-top">
    &nbsp;&nbsp;&nbsp;
    <label><strong>Select a CSV file : </strong></label>    
<form action="<?php echo site_url('home/page2'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="file" name="file" accept=".csv">
    <input type="submit" name="file_submit" value="Upload File" />
</form>
</div>
</div>
</html>

