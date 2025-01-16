<?php
    /*
        SELECT o.CustomerID, o.EmployeeID, o.OrderDate, p.ProductName, od.UnitPrice, od.Quantity
        FROM orderdetails od
        JOIN orders o ON (o.OrderID = od.OrderID)
        JOIN products p ON (p.ProductID = od.ProductID)
        WHERE od.OrderID = 10248        

        {
            'error': 0,     
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
    if (!isset($_REQUEST['orderId'])){
        $respont = ['error' => 1];
    }else{
        $orderId = $_REQUEST['orderId'];
        $mysqli = new mysqli('localhost','root','', 'brad');
        $mysqli->set_charset('utf8');
        $sql = 'SELECT o.CustomerID, c.CompanyName, o.EmployeeID, e.LastName, o.OrderDate, p.ProductName, od.UnitPrice, od.Quantity, (od.UnitPrice * od.Quantity) sum
                FROM orderdetails od
                JOIN orders o ON (o.OrderID = od.OrderID)
                JOIN products p ON (p.ProductID = od.ProductID)
                JOIN employees e ON (e.EmployeeID = o.EmployeeID)
                JOIN customers c ON (o.CustomerID = c.CustomerID)
                WHERE od.OrderID = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $orderId);
        if (!$stmt->execute()){
            $respont = ['error' => 2];
        }else{
            $stmt->store_result();
            if ($stmt->num_rows == 0){
                $respont = ['error' => 3];
            }else{
                $respont = ['error' => 0];
                $stmt->bind_result($cid,$cname,$eid,$ename,$date,$pname,$price,$qty,$sum);
                while ($stmt->fetch()){
                    $respont['cid'] = $cid;
                    $respont['cname'] = $cname;
                    $respont['eid'] = $eid;
                    $respont['ename'] = $ename;
                    $respont['date'] = substr($date,0 ,10) ;
                    $respont['detail'][] = [
                        'pname' => $pname,
                        'price' => $price,
                        'qty' => $qty,
                        'sum' => $sum,
                    ];
                }
            }
        }
    }

    header('Content-type: application/json');
    echo json_encode($respont);
?>