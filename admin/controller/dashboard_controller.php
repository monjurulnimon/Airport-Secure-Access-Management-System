<?php
require_once "../model/dashboard_model.php";

$model = new DashboardModel();

$totalUsers         = $model->totalEmployees();
$securityOfficers   = $model->totalSecurityOfficers();
$zones              = $model->totalZones();
$pendingRequests    = $model->pendingRequests();
$approvedRequests   = $model->approvedRequests();
$rejectedRequests   = $model->rejectedRequests();
?>
