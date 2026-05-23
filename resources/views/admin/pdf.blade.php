<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf</title>
</head>
<body>
    <h1>All Orders</h1>

<table border="1"
cellpadding="10"
width="100%">

<tr>

<th>ID</th>
<th>Name</th>
<th>Total</th>
<th>Status</th>

</tr>

@foreach($orders as $order)

<tr>

<td>{{ $order->id }}</td>

<td>{{ $order->name }}</td>

<td>{{ $order->total }}</td>

<td>{{ $order->status }}</td>

</tr>

@endforeach

</table>
</body>
</html>