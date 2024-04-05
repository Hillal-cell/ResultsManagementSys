@extends('layouts.app', ['page' => __('Marks'), 'pageSlug' => 'marks'])

@section('content')



<div class="row">
    <div class="container my-5">
        <h2>Students</h2>


         @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <script>
        // Automatically close the error alert after 5 seconds
        setTimeout(function() {
            $('#error-alert').fadeOut('slow');
        }, 5000);
    </script>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


        <a class="btn btn-primary" href="./create.php" role="button">Insert New Student With Marks</a>
        <br>

        <table class="table text-center">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>ENGLISH</th>
                    <th>SST</th>
                    <th>MATHS</th>
                    <th>SCIENCE</th>
                    <th>TOTAL</th>
                    <th>DIVISION</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Get the database connection details from Laravel config
                $dbConnection = config('database.connections.mysql');
                $servername = $dbConnection['host'];
                $username = $dbConnection['username'];
                $password = $dbConnection['password'];
                $dbname = $dbConnection['database'];

                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Connection to the database failed : " . mysqli_connect_error());
                }

                // Define function to calculate total
                function calculateTotal($english, $sst, $maths, $science) {
                    return $english + $sst + $maths + $science;
                }

                // Define function to calculate division
                function calculateDivision($english, $sst, $maths, $science) {
                    $average = ($english + $sst + $maths + $science) / 4;
                    if ($average >= 90) {
                        return 1;
                    } elseif ($average >= 80) {
                        return 2;
                    } elseif ($average >= 75) {
                        return 3;
                    } elseif ($average >= 65) {
                        return 4;
                    } elseif ($average >= 60) {
                        return 5;
                    } elseif ($average >= 50) {
                        return 6;
                    } elseif ($average >= 40) {
                        return 7;
                    } elseif ($average >= 35) {
                        return 8;
                    } else {
                        return 9;
                    }
                }

                $sql = "SELECT id,name,english,sst,maths,science FROM students";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Error fetching data from the database : " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_array($result)) {
                    // Calculate total and division
                    $total = calculateTotal($row['english'], $row['sst'], $row['maths'], $row['science']);
                    $division = calculateDivision($row['english'], $row['sst'], $row['maths'], $row['science']);
                    
                    // Output table row with total and division
                    
                      echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[name]</td>
                                <td>$row[english]</td>
                                <td>$row[sst]</td>
                                <td>$row[maths]</td>
                                <td>$row[science]</td>
                                <td>$total</td>
                                <td>$division</td>
                                <td>
                                    <div>
                                        <a class=\"btn btn-primary\" href='" . route('pages.edit', ['id' => $row['id']]) . "' role=\"button\">Edit</a>
                                        <a class='btn btn-danger' href='" . route('pages.remove', ['id' => $row['id']]) . "' role='button'>Delete</a>
                                    </div>
                                </td>
                            </tr>";  
                    
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
@endsection
