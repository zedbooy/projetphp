@include('header')

<style>
    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .container h2 {
        text-align: center;
        color: #008d36;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
        text-align: center; /* Center the form group */
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    .form-group input[type="file"] {
        display: block;
        margin: 0 auto; /* Center the file input */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }
    .form-group input[type="file"]:focus {
        border-color: #008d36;
    }
    .btn-primary {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #008d36;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #006f2d;
    }
    .notification {
        display: none;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 4px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        text-align: center;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
    .notification.show {
        display: block;
        opacity: 1;
    }
    .uploaded-files {
        margin-top: 20px;
        text-align: center;
    }
    .uploaded-files h3 {
        color: #008d36;
    }
    .uploaded-files ul {
        list-style-type: none;
        padding: 0;
    }
    .uploaded-files ul li {
        margin: 5px 0;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .status-circle {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .status-valid {
        background-color: green;
    }
    .status-invalid {
        background-color: red;
    }
</style>

<div class="container">
    @if (session('success'))
        <div class="notification show" id="success-notification">
            {{ session('success') }}
        </div>
    @endif

    <h2>Télécharger des Fichiers</h2>

    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choisir les fichiers</label>
            <input type="file" name="file" id="file" class="form-control">
            @error('file')
                <div class="notification show" style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Télécharger</button>
    </form>

    @if ($files->isNotEmpty())
        <div class="uploaded-files">
            <h3>Fichiers téléchargés</h3>
            <ul>
                @foreach ($files as $file)
                    <li>
                        @if ($file->status == 'valid')
                            <span class="status-circle status-valid"></span> Validée - {{ $file->name }}
                        @else
                            <span class="status-circle status-invalid"></span> Non Validée - {{ $file->name }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('success-notification');
        if (notification) {
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);
        }
    });
</script>

@include('footer')