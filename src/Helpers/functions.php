<?php


function getCustomerType(int $points): string
{
    if($points <200){
        return 'Normal';
    } elseif ($points < 500){
        return 'Regular';
    } elseif($points <1000){
        return 'Loyal';
    }
    return 'VIP';
}


function formatCustomerName(string $name): string
{
    return strtoupper($name);
}


function getTotalCustomers(array $customers): int
{
    return array_reduce($customers,function($carry,$customer){
        return $carry + 1;
    },0);
}


function getCustomerOfType(array $customers, string $type): array
{
    return array_values(array_filter($customers,function($customer) use ($type){
        return getCustomerType($customer['points']) === $type;
    }));
}

function getActiveCustomers(array $customers): array
{
    return array_values(array_filter($customers,function($customer){
        return $customer['status'] === 'Active';
    }));
}