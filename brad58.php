<?php
/* 逾時訂單
SELECT o.OrderDate, c.CompanyName, e.LastName, o.RequiredDate, o.ShippedDate
FROM orders o
JOIN employees e ON (e.EmployeeID = o.EmployeeID)
JOIN customers c ON (c.CustomerID = o.CustomerID)
WHERE o.ShippedDate > o.RequiredDate
ORDER BY c.CustomerID
*/
?>