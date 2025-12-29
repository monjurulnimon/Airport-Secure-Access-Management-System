<!DOCTYPE html>
<html>
<head>
    <title>Pending Access Requests</title>
    <link rel="stylesheet" href="officer.css">
</head>
<body>

<!-- Top Navigation -->
<div class="top-nav">
    <a href="officer-dashboard.php">Dashboard</a>
    <a href="#">Logout</a>
</div>

<div class="main">

    <div class="section">
        <h2>Pending Access Requests</h2>

        <!-- REQUEST 1 -->
        <div class="request-block">

            <table>
                <tr>
                    <th>Visitor Name</th>
                    <th>Requested Zone</th>
                    <th>Reason</th>
                    <th>Duration</th>
                </tr>

                <tr>
                    <td>Ali Hasan</td>
                    <td>Terminal A</td>
                    <td>Maintenance Work</td>
                    <td>2 Hours</td>
                </tr>
            </table>

            <div class="remarks-area">
                <strong>Officer Remarks (for this request):</strong>
                <textarea placeholder="Write your comment here..." data-request-id="101"></textarea>
            </div>

            <div class="action-buttons">
                <button class="approve" data-request-id="101">Approve</button>
                <button class="reject" data-request-id="101">Reject</button>
            </div>

        </div>

        <!-- REQUEST 2 -->
        <div class="request-block">

            <table>
                <tr>
                    <th>Visitor Name</th>
                    <th>Requested Zone</th>
                    <th>Reason</th>
                    <th>Duration</th>
                </tr>

                <tr>
                    <td>Rahim Uddin</td>
                    <td>Control Room</td>
                    <td>System Inspection</td>
                    <td>1 Hour</td>
                </tr>
            </table>

            <div class="remarks-area">
                <strong>Officer Remarks (for this request):</strong>
                <textarea placeholder="Write your comment here..." data-request-id="102"></textarea>
            </div>

            <div class="action-buttons">
                 <button class="approve" data-request-id="102">Approve</button>
                <button class="reject" data-request-id="102">Reject</button>
            </div>

        </div>

    </div>

</div>

</body>
</html>
