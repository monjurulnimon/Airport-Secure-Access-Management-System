

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
        <li><a href="#request" class="menu-item">Temporary Access Request</a></li>
        <li><a href="request-status-tracking.php" class="menu-item"> Request Status Tracking</a></li>
        <li><a href="access-pass-view.php" class="menu-item">Access Pass View</a></li>
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

<!-- 1. Temporary Access Request -->
<div id="request" class="card">
  <h2>Temporary Access Request</h2>
  <?php if(isset($message)) echo "<p>$message</p>"; ?>
  <form method="post" action="request-status-tracking.php" >

    <!-- Name -->
    <label for="name">Your Name</label>
    <input type="text" name="name" class="fancy-input">

    <!-- Zone -->
    <label for="zone">Select Access Zone</label>
    <select name="zone" class="fancy-select">
      <option value="A">Zone A</option>
      <option value="B">Zone B</option>
      <option value="C">Zone C</option>
    </select>

    <!-- Purpose -->
    <label for="purpose">Visit Purpose</label>
    <input type="text" name="purpose" class="fancy-input">

    <!-- Date -->
    <label for="date">Choose Date</label>
    <input type="date" name="date" class="fancy-input">

    <!-- Duration -->
    <label for="duration">Duration (hours)</label>
    <input type="number" name="duration" class="fancy-input">

    <!-- Agree Checkbox -->
    <label class="toggle-container">
      <input type="checkbox" name="agree">
      I agree to the rules
    </label>

    <button type="submit" name="submit_request" class="fancy-button">Submit Request</button>
  </form>

  <style>
  /* Card container */
  .card {
    background-color: #ffffff; /* White background */
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1); /* Smooth shadow */
    max-width: 500px;
    margin: 50px auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* Fancy Form Inputs */
  .fancy-input {
      width: 100%;
      padding: 12px 15px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 12px;
      background-color: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      font-size: 16px;
      color: #333;
      transition: all 0.3s ease;
  }

  .fancy-input:focus {
      outline: none;
      transform: scale(1.02);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  /* Fancy Select */
  .fancy-select {
      width: 100%;
      padding: 12px 15px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 12px;
      background-color: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      font-size: 16px;
      color: #333;
      appearance: none;
      cursor: pointer;
      transition: all 0.3s ease;
  }

  .fancy-select:hover, .fancy-select:focus {
      transform: scale(1.02);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  /* Fancy Submit Button */
  .fancy-button {
      width: 100%;
      padding: 12px 0;
      font-size: 16px;
      font-weight: bold;
      color: #fff;
      background: linear-gradient(45deg, #4CAF50, #45A049);
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  .fancy-button:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 14px rgba(0,0,0,0.15);
  }

  /* Toggle Checkbox */
  .toggle-container {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      font-size: 14px;
      color: #555;
  }

  .toggle-container input[type="checkbox"] {
      margin-right: 10px;
      width: 18px;
      height: 18px;
      accent-color: #4CAF50;
  }
  </style>
</div>
</main>


