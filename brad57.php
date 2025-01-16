<?php
/*
SELECT e.EmployeeID, e.LastName, SUM(od.UnitPrice*od.Quantity) total
FROM orders o
JOIN orderdetails od ON (o.OrderID = od.OrderID)
JOIN employees e ON (o.EmployeeID = e.EmployeeID)
GROUP BY e.EmployeeID
ORDER BY total DESC

4 Peacock 250187.4500
驗算
SELECT SUM(UnitPrice*Quantity) total
FROM orderdetails
WHERE OrderID IN (
	SELECT OrderID FROM orders
    WHERE EmployeeID = 4
)
*/


?>