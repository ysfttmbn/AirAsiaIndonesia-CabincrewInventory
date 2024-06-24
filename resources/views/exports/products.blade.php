<!DOCTYPE html>
<html>
<head>
    <title>Products PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Size</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
