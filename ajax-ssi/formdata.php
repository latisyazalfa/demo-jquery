<!DOCTYPE html>
<html>
<head>
    <title>Form Data</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap.css">
    <script src="bootstrap.bundle.js"></script>
    <!-- jQuery -->
    <script src="jquery-3.7.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fbb9a1;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fffbf3;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            color: #616065;
            margin-bottom: 20px;
        }
        
        form {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #e9ccc4;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #616065;
            border-radius: 3px;
        }
        
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #76c2ab;
            color: #76c2ab;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #76c2ab;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #cccccc;
            text-align: center;
        }
        
        th {
            background-color: #76c2ab;
            font-weight: bold;
            color: #76c2ab;
        }
    </style>
</head>
<body><br>
    <div class="container">
        <h1>Form Data</h1>
        <form id="Aleyda">
            <label for="floatingInput">Nama</label>
            <input type="text" class="form-control" id="floatingInput" name="text" placeholder="Masukkan Nama" required>
            <label for="floatingInput">NIM</label>
        <input type="number" class="form-control" id="floatingInput" name="number" placeholder="Masukkan NIM" required>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<!-- Table to display the response -->
<br>
        <table class="table mt-3 table-fixed table-bordered" id="responseTable">
            <thead>
                <tr>
                    <th class="col-6 text-center">Nama</th>
                    <th class="col-6 text-center">NIM</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
<!-- jQuery AJAX to submit the form data -->
<script>
        $(document).ready(function() {
            $('#Aleyda').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'formdata2.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Add a row to the table with the response data
                        var newRow = $('<tr><td class="text-center">' + response.text + '</td><td class="text-center">' + response.number + '</td></tr>');
                        newRow.hide();
                        $('#responseTable tbody').append(newRow);
                        newRow.fadeIn('slow');

                    }
                });
            });
        });
</script>
</body>
</html>
