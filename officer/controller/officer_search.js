function searchRequests(value) {

    if (value.trim() === "") {
        document.getElementById("searchResults").innerHTML = "";
        return;
    }

    fetch("../controller/search_requests.php?q=" + encodeURIComponent(value))
        .then(response => response.json())
        .then(data => {
            let html = "";

            if (data.length === 0) {
                html = "<p>No matching requests found</p>";
            } else {
                data.forEach(row => {
                    html += `
                        <div class="request-block">
                            <table>
                                <tr>
                                    <th>Visitor</th>
                                    <th>Zone</th>
                                    <th>Purpose</th>
                                    <th>Duration</th>
                                </tr>
                                <tr>
                                    <td>${row.employee_name}</td>
                                    <td>${row.zone_name}</td>
                                    <td>${row.visit_purpose}</td>
                                    <td>${row.duration_hours} Hour</td>
                                </tr>
                            </table>
                        </div>
                    `;
                });
            }

            document.getElementById("searchResults").innerHTML = html;
        });
}
