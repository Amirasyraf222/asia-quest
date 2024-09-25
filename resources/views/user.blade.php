<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #dee2e6);
            font-family: 'Poppins', sans-serif;
        }
        .exclusive-table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .exclusive-table th {
            background-color: #6c757d;
            color: white;
        }
        .exclusive-table tr:hover {
            background-color: #f1f1f1;
        }
        .page-title {
            text-align: center;
            padding: 20px;
            font-size: 2rem;
            color: #495057;
        }
        .pagination {
            justify-content: center;
        }
        .filter-select {
            width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="page-title">User List</h2>

    <div class="d-flex justify-content-end">
        <select id="userLimit" class="form-select filter-select" onchange="fetchUsers(1)">
            <option value="5">Show 5 users</option>
            <option value="10" selected>Show 10 users</option>
            <option value="15">Show 15 users</option>
        </select>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered exclusive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
            </tbody>
        </table>
    </div>

    <nav>
        <ul class="pagination" id="paginationLinks">
        </ul>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    const apiUrl = '{{ route('api.users') }}';

    async function fetchUsers(page = 1) {
        const userLimit = document.getElementById('userLimit').value;

        const response = await fetch(`${apiUrl}?page=${page}&limit=${userLimit}`);
        const data = await response.json();
        renderUsers(data.data);  
        renderPagination(data);  
    }

    function renderUsers(users) {
        const userTableBody = document.getElementById('userTableBody');
        userTableBody.innerHTML = '';  

        users.forEach(user => {
            const row = `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.age}</td>
                    <td>${user.location}</td>
                </tr>
            `;
            userTableBody.insertAdjacentHTML('beforeend', row);
        });
    }

    function renderPagination(data) {
        const paginationLinks = document.getElementById('paginationLinks');
        paginationLinks.innerHTML = '';  

        if (data.prev_page_url) {
            paginationLinks.innerHTML += `<li class="page-item"><a class="page-link" href="#" onclick="fetchUsers(${data.current_page - 1})">Previous</a></li>`;
        }

        for (let i = 1; i <= data.last_page; i++) {
            paginationLinks.innerHTML += `<li class="page-item ${i === data.current_page ? 'active' : ''}"><a class="page-link" href="#" onclick="fetchUsers(${i})">${i}</a></li>`;
        }

        if (data.next_page_url) {
            paginationLinks.innerHTML += `<li class="page-item"><a class="page-link" href="#" onclick="fetchUsers(${data.current_page + 1})">Next</a></li>`;
        }
    }

    fetchUsers();  
</script>
</body>
</html>
