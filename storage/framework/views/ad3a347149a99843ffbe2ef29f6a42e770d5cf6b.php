<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<table>
  <tr>
    <th>Name</th>
    <th><?php echo e($data['from_name'] ?? NULL); ?></th>
   
  </tr>
     <tr>
    <td>URL:</td>
    <td><a href="<?php echo e(URL::to($data['from_message']) ?? NULL); ?>"><?php echo e(URL::to($data['from_message']) ?? NULL); ?> </a></td>
  </tr>
</table>

</body>
</html><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/url_mail.blade.php ENDPATH**/ ?>