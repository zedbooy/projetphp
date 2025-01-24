@include('header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formateur</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Lucida Sans', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }
        .container:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        h1, h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease-in-out;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: #008d36;
        }
        .form-group button, .btn-primary, .btn-danger {
            display: inline-block;
            padding: 10px 20px;
            background-color: #008d36;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .form-group button:hover, .btn-primary:hover, .btn-danger:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #008d36;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f4f4f4;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formateur</h1>
        <form action="{{ route('formateur.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom & Prenom</label>
                <input type="text" id="name" name="name" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="groupe">Groupe</label>
                <input type="text" id="groupe" name="groupe" placeholder="Groupe" required>
            </div>
            <div class="form-group">
                <label for="jury_name">Nom du Juree</label>
                <input type="text" id="jury_name" name="jury_name" placeholder="Nom du Juree" required>
            </div>
            <div class="form-group">
                <label for="stage">Stage</label>
                <input type="text" id="stage" name="stage" placeholder="Stage" required>
            </div>
            <div class="form-group">
                <label for="major">Filliere</label>
                <input type="text" id="major" name="major" placeholder="Filliere" required>
            </div>
            <button type="submit" class="btn-primary">Ajouter</button>
        </form>

        <hr>

        <h2>Liste des Utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Groupe</th>
                    <th>Jury Name</th>
                    <th>Stage</th>
                    <th>Filliere</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->groupe }}</td>
                    <td>{{ $user->jury_name }}</td>
                    <td>{{ $user->stage }}</td>
                    <td>{{ $user->major }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form action="{{ route('formateur.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Delete</button>
                        </form>
                        <button type="button" onclick="toggleEditForm({{ $user->id }})" class="btn-primary">Edit</button>
                    </td>
                </tr>
                <tr id="edit-form-{{ $user->id }}" class="edit-form" style="display:none;">
                    <td colspan="8">
                        <form action="{{ route('formateur.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="name" value="{{ $user->name }}" placeholder="Nom" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" value="{{ $user->email }}" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="groupe" value="{{ $user->groupe }}" placeholder="Groupe" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="jury_name" value="{{ $user->jury_name }}" placeholder="Jury Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="stage" value="{{ $user->stage }}" placeholder="Stage" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="major" value="{{ $user->major }}" placeholder="Major" required>
                            </div>
                            <button type="submit" class="btn-primary">Update</button>
                            <button type="button" onclick="toggleEditForm({{ $user->id }})" class="btn-danger">Cancel</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function toggleEditForm(id) {
            var form = document.getElementById('edit-form-' + id);
            if (form.style.display === 'none') {
                form.style.display = 'table-row';
            } else {
                form.style.display = 'none';
            }
        }
    </script>
</body>
</html>

@include('footer')