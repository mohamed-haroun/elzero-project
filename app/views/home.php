<?php

declare(strict_types=1);
use Doctrine\DBAL\DriverManager;
//Creating the doenv file
echo "<h1 class='display-3 my-5 text-success'>Lets start fun</h1>";

$connectionParams = [
    'dbname' => $_ENV['DB_SCHEMA'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => 'pdo_mysql',
];
try {
    $conn = DriverManager::getConnection($connectionParams);

    $builder = $conn->createQueryBuilder();

    $rows = $builder->select("user_id", 'first_name', 'last_name', 'email', 'birth_date', 'gender', 'created_at')
        ->from('users')
        ->fetchAllAssociative();

    echo "<table class='table table-bordered border-danger'>
  <thead>
    <tr class='text-center'>
      <th scope='col'>User ID</th>
      <th scope='col'>First Name</th>
      <th scope='col'>Last Name</th>
      <th scope='col'>Birth Date</th>
      <th scope='col'>Gender</th>
      <th scope='col'>Email</th>
      <th scope='col'>Created At</th>
    </tr>
  </thead>";
    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['birth_date'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";


} catch (\Doctrine\DBAL\Exception $e) {
}
