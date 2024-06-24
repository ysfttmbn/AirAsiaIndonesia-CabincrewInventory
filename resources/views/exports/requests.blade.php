<!DOCTYPE html>
<html>
<head>
    <title>Requests Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Requests Export</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->product->product_name }}</td>
                    <td>{{ $request->quantity }}</td>
                    <td>{{ $request->status }}</td>
                    <td>{{ $request->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($request->created_at)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($request->updated_at)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
