<?php


$customers = require __DIR__ . '/../src/Data/customers.php';
require __DIR__ . '/../src/Helpers/functions.php';


$totalCustomers = getTotalCustomers($customers);
$normalCustomers = getCustomerOfType($customers, 'Normal');
$regularCustomers = getCustomerOfType($customers, 'Regular');
$loyalCustomers = getCustomerOfType($customers, 'Loyal');
$vipCustomers = getCustomerOfType($customers, 'VIP');
$activeCustomers = getActiveCustomers($customers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customers</title>
</head>
<body>
    <h1>Customer List</h1>

    <h2>Statistics</h2>
    <ul>
        <li>Total customers: <?php echo $totalCustomers; ?></li>
        <li>Normal customers: <?php echo count($normalCustomers); ?></li>
        <li>Regular customers: <?php echo count($regularCustomers); ?></li>
        <li>Loyal customers: <?php echo count($loyalCustomers); ?></li>
        <li>VIP customers: <?php echo count($vipCustomers); ?></li>
        <li>Active customers: <?php echo count($activeCustomers); ?></li>
    </ul>

    <h2>Customer List</h2>

    <?php foreach ($customers as $customer): ?>
        <div style="margin-bottom: 16px; padding: 8px; border: 1px solid #ccc;">
            <p><strong>Name:</strong> <?php echo formatCustomerName($customer['name']); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $customer['date_of_birth']; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $customer['phone_number']; ?></p>
            <p><strong>Address:</strong> <?php echo $customer['address']; ?></p>
            <p><strong>Customer Points:</strong> <?php echo $customer['points']; ?></p>
            <p><strong>Customer Type:</strong> <?php echo getCustomerType($customer['points']); ?></p>
            <p><strong>Status:</strong> <?php echo $customer['status']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>