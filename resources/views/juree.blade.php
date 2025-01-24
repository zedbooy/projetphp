<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juree Page</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hidden-row {
            display: none;
        }
    </style>
    <script>
        function expandTask(fileId) {
            var validateRow = document.getElementById('validate-' + fileId);
            if (validateRow.style.display === 'none') {
                validateRow.style.display = 'table-row';
            } else {
                validateRow.style.display = 'none';
            }
        }

        function validateTask(fileId) {
            fetch(`/validate-task/${fileId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            }).then(response => {
                if (response.ok) {
                    console.log('Task validated successfully!');
                    alert('Task validated successfully!');
                } else {
                    return response.json().then(errorData => {
                        console.error('Failed to validate task.', errorData);
                        alert('Failed to validate task.');
                    });
                }
            }).catch(error => {
                console.error('Request failed:', error);
                alert('Request failed.');
            });
        }

        function refuseTask(fileId) {
            fetch(`/refuse-task/${fileId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            }).then(response => {
                if (response.ok) {
                    console.log('Task refused successfully!');
                    alert('Task refused successfully!');
                } else {
                    return response.json().then(errorData => {
                        console.error('Failed to refuse task.', errorData);
                        alert('Failed to refuse task.');
                    });
                }
            }).catch(error => {
                console.error('Request failed:', error);
                alert('Request failed.');
            });
        }
    </script>
</head>
<body>
    @if (session('success'))
        <div class="notification show" id="success-notification">
            {{ session('success') }}
        </div>
    @endif
    @include('header')
    <div class="container">
        <h1 class="mb-4">Welcome to the Juree Page</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>File Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr id="task-{{ $file->id }}">
                        <td>{{ $file->name }}</td>
                        <td>{{ $file->status }}</td>
                        <td>
                            <button class="btn btn-primary" onclick="expandTask({{ $file->id }})">Expand</button>
                        </td>
                    </tr>
                    <tr id="validate-{{ $file->id }}" class="hidden-row">
                        <td colspan="3">
                            <button class="btn btn-success" onclick="validateTask({{ $file->id }})">Validate</button>
                            <button class="btn btn-danger" onclick="refuseTask({{ $file->id }})">Refuse</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Include Bootstrap JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

@include('footer')