<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lab 9 - Query</title>
        <meta charset="utf-8">

        <style>
            table, th, td
            {
                border: 1px solid;
            }

            th, td
            {
                padding: 5px;
            }
        </style>
    </head>

    <body>

        <h1>Cars</h1>

        <?php
            require_once "settings.php";
            $conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

            if ($conn)
            {
                // 1. All Cars

                echo "<h2>1. All Cars</h2>";
                $query = "SELECT * FROM cars";
                $result = mysqli_query ($conn, $query);

                if ($result)
                {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['car_id'] . "</td>";
                        echo "<td>" . $row['make'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['yom'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                else
                    echo "<p>There are no cars to display.</p>";

                // 2. Make, Model, Price (sort by Make, Model)

                echo "<h2>2. Make, Model, Price (sort by Make, Model)</h2>";
                $query = "SELECT make, model, price FROM cars ORDER BY make, model;";
                $result = mysqli_query ($conn, $query);

                if ($result)
                {
                    echo "<table>";
                    echo "<tr><th>Make</th><th>Model</th><th>Price</th></tr>";
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['make'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                else
                    echo "<p>There are no cars to display.</p>";

                // 3. Make, Model (filter by price >= 20000)

                echo "<h2>3. Make, Model (filter by price >= 20000)</h2>";
                $query = "SELECT make, model FROM cars WHERE price >= 20000";
                $result = mysqli_query ($conn, $query);

                if ($result)
                {
                    echo "<table>";
                    echo "<tr><th>Make</th><th>Model</th></tr>";
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['make'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                else
                    echo "<p>There are no cars to display.</p>";

                // 4. Make, Average Price (group by make)

                echo "<h2>4. Make, Average Price (group by make)</h2>";
                $query = "SELECT make, AVG(price) AS avg_price FROM cars GROUP BY make";
                $result = mysqli_query ($conn, $query);

                if ($result)
                {
                    echo "<table>";
                    echo "<tr><th>Make</th><th>Average Price</th></tr>";
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['make'] . "</td>";
                        echo "<td>" . $row['avg_price'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                else
                    echo "<p>There are no cars to display.</p>";

                // 5. Make, Model (filter by price < 15000 and price > 10000)

                echo "<h2>5. Make, Model (filter by price &lt; 15000 and price &gt; 10000)</h2>";
                $query = "SELECT make, model FROM cars WHERE price < 15000 AND price > 10000";
                $result = mysqli_query ($conn, $query);

                if ($result)
                {
                    echo "<table>";
                    echo "<tr><th>Make</th><th>Model</th></tr>";
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['make'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                else
                    echo "<p>There are no cars to display.</p>";

                mysqli_close ($conn);
            }

            else
                echo "<p>Unable to connect to the db.</p>";
        ?>
    </body>
</html>