<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Data</title>
</head>

<body>

    <h1>Create Page</h1>
    <div class="card-form">
        <form action="{{ route('insertData') }}" method="POST">
            <div class="card-header"></div>
            <div class="card-body">
                @csrf
                <label for="name">Plane Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="type">Type:</label>
                <input type="text" name="type" id="type" required>

                <label for="brand">Brand:</label>
                <input type="text" name="brand" id="brand" required>

                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" required>



                <button type="submit">Submit</button>
            </div>            
        </form>
    </div>


</body>
<style>
    body {
        background-color: pink;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .card-form {
        background-color: white;
        border-radius: 8px;
        padding: 12px;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .card-footer {
        margin-top: 12px;
    }
</style>

</html>