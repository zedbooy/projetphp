@include('header')

<div style="position: relative; display: flex; justify-content: center; align-items: center; margin-top: 100px;">
    <div style="position: absolute; left: -200px; text-align: right; margin-right: 50px; color: black; line-height: 2.5;">
        <p style="font-size: 20px; font-weight: bold; padding-left: 250px;">Données personnelles administratives</p>
        <div class="shift-left">
            <p>Matricule:</p>
            <p>Nom et Prénom:</p>
            <p>Campus:</p>
            <p>Classe:</p>
            <p>Groupe:</p>
            <p>Sous Groupe:</p>
            <p>E-mail:</p>
            <p>E-mail EMSI:</p>
            <p>N° CNE:</p>
        </div>
    </div>
    <div style="text-align: center;">
        <i class="fas fa-user-circle" style="font-size: 200px; color: green;"></i>
        <h2 style="color: green;">{{ Auth::user()->name }}</h2>
        <p style="color: green;">{{ Auth::user()->email }}</p>
    </div>
</div>

<style>
    .shift-left {
        transform: translateX(-25%);
    }
</style>

@include('footer')