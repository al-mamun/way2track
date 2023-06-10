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
    <th>{{ $data['from_name'] ?? NULL }}</th>
   
  </tr>
     <tr>
    <td>URL:</td>
    <td><a href="{{ URL::to($data['from_message']) ?? NULL }}">{{ URL::to($data['from_message']) ?? NULL }} </a></td>
  </tr>
</table>

</body>
</html>