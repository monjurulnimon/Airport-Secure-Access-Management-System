document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("employeeSearch");
    const tableBody = document.getElementById("employeeTableBody");

    function loadEmployees(query = "") {
        fetch("../controller/employee_search.php?q=" + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = "";

                if (data.length === 0) {
                    tableBody.innerHTML =
                        "<tr><td colspan='3'>No employees found</td></tr>";
                    return;
                }

                data.forEach(emp => {
                    tableBody.innerHTML += `
                        <tr>
                            <td>${emp.name}</td>
                            <td>${emp.email}</td>
                            <td>
                                <form method="POST" action="../controller/employee_controller.php"
                                      onsubmit="return confirm('Delete this employee?');">
                                    <input type="hidden" name="employee_id" value="${emp.id}">
                                    <button type="submit" name="deleteEmployee">Delete</button>
                                </form>
                            </td>
                        </tr>
                    `;
                });
            });
    }

    // 🔹 LOAD ALL EMPLOYEES ON PAGE LOAD
    loadEmployees();

    // 🔹 LIVE SEARCH
    searchInput.addEventListener("keyup", function () {
        loadEmployees(this.value);
    });
});
