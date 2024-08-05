<?php
session_start();
if (!isset($_SESSION['print_data'])) {
    header("Location: product.php");
    exit;
}

$data = $_SESSION['print_data'];
unset($_SESSION['print_data']); // Clear data after use
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Receipt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">Payment Receipt</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Customer Name:</strong> <?= htmlspecialchars($data['customer_name']) ?></p>
                        <p><strong>Customer Address:</strong> <?= htmlspecialchars($data['customer_address']) ?></p>
                        <p><strong>Product Name:</strong> <?= htmlspecialchars($data['product_name']) ?></p>
                        <p><strong>Quantity:</strong> <?= htmlspecialchars($data['quantity']) ?></p>
                        <p><strong>Selling Cost Each:</strong> $<?= htmlspecialchars($data['selling_cost_each']) ?></p>
                        <p><strong>Total Cost:</strong> $<?= htmlspecialchars($data['total_cost']) ?></p>
                        <p><strong>Sell Date:</strong> <?= htmlspecialchars($data['sell_date']) ?></p>
                        <button class="btn btn-primary no-print" onclick="window.print()">Print Receipt</button>
                        <br><br>
                        <div class="mb-3">
                    <a href="product.php" class="btn btn-danger">Back to home</a>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
