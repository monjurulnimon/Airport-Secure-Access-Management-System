<?php
session_start();

// Sample requests data
$requests = [
    ['id'=>1,'name'=>'John Doe','zone'=>'A','purpose'=>'Maintenance','date'=>'2025-12-20','duration'=>'2h','status'=>'Pending','remarks'=>''],
    ['id'=>2,'name'=>'Jane Smith','zone'=>'B','purpose'=>'Inspection','date'=>'2025-12-21','duration'=>'4h','status'=>'Approved','remarks'=>'Approved by Officer X'],
    ['id'=>3,'name'=>'Bob Lee','zone'=>'C','purpose'=>'Delivery','date'=>'2025-12-22','duration'=>'3h','status'=>'Rejected','remarks'=>'Invalid credentials']
];

// Handle new request submission
if(isset($_POST['submit_request'])){
    $newRequest = [
        'id'=>count($requests)+1,
        'name'=>$_POST['name'] ?? 'Guest',
        'zone'=>$_POST['zone'] ?? '',
        'purpose'=>$_POST['purpose'] ?? '',
        'date'=>$_POST['date'] ?? '',
        'duration'=>$_POST['duration'] ?? '',
        'status'=>'Pending',
        'remarks'=>''
    ];
    $requests[] = $newRequest;
    $message = "Request submitted successfully!";
}

// Handle cancel request
if(isset($_GET['cancel_id'])){
    foreach($requests as &$r){
        if($r['id']==$_GET['cancel_id'] && $r['status']=='Pending'){
            $r['status'] = 'Cancelled';
            $r['remarks'] = 'Cancelled by user';
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employee Access Dashboard</title>
<style>
body{font-family:Arial,sans-serif;margin:0;padding:0;background:#f4f4f4;}
header{padding:20px;text-align:center;background:#ddd;}
nav{width:200px;float:left;padding:20px;background:#eee;height:100vh;box-sizing:border-box;}
nav a{display:block;margin-bottom:10px;text-decoration:none;color:#000;}
main{margin-left:220px;padding:20px;}
.card{background:#fff;padding:15px;margin-bottom:20px;border-radius:5px;box-shadow:0 0 3px rgba(0,0,0,0.1);}
table{width:100%;border-collapse:collapse;}
table th, table td{padding:10px;border:1px solid #ccc;text-align:left;}
form label{display:block;margin-top:10px;}
form input, form select{padding:5px;width:50%;margin-top:5px;}
form button{margin-top:15px;padding:8px 15px;}
</style>
</head>
<body>

<header>
<h1>Employee Access Dashboard</h1>
</header>



<nav>
    <ul class="sidebar-menu">
        <li><a href="temporary-access-request.php" class="menu-item">Temporary Access Request</a></li>
        <li><a href="request-status-tracking.php" class="menu-item"> Request Status Tracking</a></li>
        <li><a href="#pass" class="menu-item">Access Pass View</a></li>
        <li><a href="request-history.php" class="menu-item">Request History</a></li>
    </ul>
</nav>
<style>
/* Modern Colorful Sidebar */
.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu li {
    margin-bottom: 15px;
}

.menu-item {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    text-decoration: none;
    font-weight: bold;
    border-radius: 10px;
    color: #fff;
    background: linear-gradient(45deg, #6a11cb, #2575fc);
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.15);
}

.menu-item span.icon {
    margin-right: 10px;
    font-size: 18px;
}

/* Hover effect */
.menu-item:hover {
    transform: translateX(5px) scale(1.03);
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
    background: linear-gradient(45deg, #7f2aff, #3391ff); /* Slightly brighter gradient */
}

/* Smooth transition on click/focus */
.menu-item:focus, .menu-item:active {
    transform: scale(0.98);
    box-shadow: 0 1px 3px rgba(0,0,0,0.2);
}
</style>

<main>
<!-- 3. Access Pass View -->
<div id="pass" class="card">
  <h2>Access Pass View</h2>
  <table class="fancy-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Zone</th>
        <th>Date</th>
        <th>Duration</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($requests as $r){
        echo "<tr>
        <td>{$r['id']}</td>
        <td>{$r['name']}</td>
        <td>{$r['zone']}</td>
        <td>{$r['date']}</td>
        <td>{$r['duration']}</td>
        <td>{$r['status']}</td>
        <td>";
        if($r['status']=='Approved'){
            echo "<a href='#' class='action-link'>Print PDF</a>";
        } else { 
            echo "-"; 
        }
        echo "</td></tr>";
      } ?>
    </tbody>
  </table>
</div>

<style>
/* Table styling already defined for .fancy-table, reusing same styles */

/* Action link styling (same as Status Tracking) */
.action-link {
  color: #e60808ff; /* Green for approved actions */
  text-decoration: none;
  font-weight: 500;
}

.action-link:hover {
  text-decoration: underline;
}
</style>
</main>




