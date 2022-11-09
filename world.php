<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';



$conn = new PDO("mysql:host=$host;port=3307;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);
$lookup = filter_input(INPUT_GET, 'lookup', FILTER_SANITIZE_STRING);

if ($lookup == 'cities') {
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$country%'");
} else {
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
<?php if ($lookup == 'cities'):?>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>
  <?php foreach ($results as $r): ?>
    <tr>
      <td><?=$r['name'];?></td>
      <td><?=$r['district'];?></td>
      <td><?=$r['population'];?></td>
    </tr>
  <?php endforeach; ?>
<?php else: ?>
  <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
  </tr>
  <?php foreach ($results as $r): ?>
    <tr>
      <td><?= $r['name'];?></td>
      <td><?= $r['continent'];?></td>
      <td><?= $r['independence_year'];?></td>
      <td><?= $r['head_of_state'];?></td>
    </tr>
  <?php endforeach; ?>
  <?php endif; ?>
</table>


