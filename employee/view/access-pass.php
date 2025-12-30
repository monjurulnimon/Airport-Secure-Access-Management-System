<?php
require_once __DIR__ . "/../controller/access-pass-controller.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Access Pass</title>
    <link rel="stylesheet" href="employee.css">

    <style>
        .pass-card {
            max-width: 520px;
            margin: 25px auto;
            padding: 20px;
            border: 2px solid #000;
            font-family: Arial, sans-serif;
            background: #fff;
        }

        .pass-header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .pass-header h2 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 1px;
        }

        .pass-header h4 {
            margin: 5px 0 0;
            font-weight: normal;
        }

        .pass-body p {
            margin: 6px 0;
        }

        .pass-footer {
            border-top: 1px dashed #000;
            margin-top: 15px;
            padding-top: 10px;
        }

        .note {
            font-size: 12px;
            font-style: italic;
            margin-top: 10px;
        }

        .print-btn {
            margin-top: 15px;
            padding: 6px 14px;
            cursor: pointer;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .pass-card, .pass-card * {
                visibility: visible;
            }
            .pass-card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .print-btn, .top-nav {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="top-nav">
    <a href="employee-dashboard.php">Dashboard</a>
    <a href="request-access.php">Request Access</a>
    <a href="request-status.php">Request Status</a>
    <a href="access-pass.php">Access Pass</a>
    <a href="request-history.php">Request History</a>
    <a href="auth/logout.php">Logout</a>
</div>

<div class="main">
    <div class="panel">
        <h3>Approved Access Pass</h3>

        <div class="panel-body">

            <?php if (!empty($passes)): ?>
                <?php foreach ($passes as $pass): ?>

                    <?php
                        $validFrom = date("d M Y, h:i A", strtotime($pass["visit_date"]));
                        $validTill = date(
                            "d M Y, h:i A",
                            strtotime($pass["visit_date"] . " +" . (int)$pass["duration_hours"] . " hours")
                        );
                        $passId = "APS-" . date("Y") . "-" . rand(10000, 99999);
                    ?>

                    <div class="pass-card">
                        <div class="pass-header">
                            <h2>ASAMS International Airport</h2>
                            <h4>Temporary Access Pass</h4>
                        </div>

                        <div class="pass-body">
                            <p><strong>Employee Name:</strong> <?= htmlspecialchars($pass["employee_name"]) ?></p>
                            <p><strong>Zone:</strong> <?= htmlspecialchars($pass["zone_name"]) ?></p>
                            <p><strong>Pass ID:</strong> <?= $passId ?></p>
                            <p><strong>Issue Date:</strong> <?= date("d M Y") ?></p>

                            <hr>

                            <p><strong>Valid From:</strong> <?= $validFrom ?></p>
                            <p><strong>Valid Till:</strong> <?= $validTill ?> (<?= (int)$pass["duration_hours"] ?> Hours)</p>
                        </div>

                        <div class="pass-footer">
                            <p><strong>Authorized By:</strong> Airport Security Division</p>
                            <p><strong>Signature:</strong> _Nimon_</p>

                            <p class="note">
                                * This pass must be displayed at all times inside the airport premises.
                            </p>

                            <button class="print-btn" onclick="window.print()">Print Pass</button>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <p>No approved access passes available.</p>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
