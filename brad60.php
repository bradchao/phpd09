<?php
    /*
        SELECT o.CustomerID, o.EmployeeID, o.OrderDate, p.ProductName, od.UnitPrice, od.Quantity
        FROM orderdetails od
        JOIN orders o ON (o.OrderID = od.OrderID)
        JOIN products p ON (p.ProductID = od.ProductID)
        WHERE od.OrderID = 10248        

        {
            'cid': 'VINET',
            'eid' : 5,
            'date': '1996-07-04',
            'detail':[
                        {
                            'pname': 'Queso Cabrales',
                            'price': 14,
                            'qty': 12
                        },
                        {
                            'pname': 'Queso Cabrales',
                            'price': 14,
                            'qty': 12
                        },
                        {
                            'pname': 'Queso Cabrales',
                            'price': 14,
                            'qty': 12
                        },
                    ]
        }
    */



?>