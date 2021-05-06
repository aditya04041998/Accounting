<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

// let's paginate data from an array...
$countries = array(
    'india','pakistan','china','japan','india','pakistan','china','japan'
);

// how many records should be displayed on a page?
$records_per_page = 10;

// include the pagination class
require 'Zebra Pageination/Zebra_Pagination.php';

// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records(count($countries));

// records per page
$pagination->records_per_page($records_per_page);

// here's the magic: we need to display *only* the records for the current page
$countries = array_slice(
    $countries,
    (($pagination->get_page() - 1) * $records_per_page),
    $records_per_page
);

?>

<table>
    <thead>
    <tr>
        <th>Countrys</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($countries as $index => $country): ?>
    <tr<?php echo $index % 2 ? ' class="even"' : ''; ?>>
        <td><?php echo $country; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php

// render the pagination links
$pagination->render();
?>
</body>
</html>


