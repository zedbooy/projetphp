@include('header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Page</title>
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        .news-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            padding: 20px;
            width: calc(33.333% - 20px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .news-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .news-item h2 {
            font-size: 1.5em;
            margin-top: 0;
            color: #333;
        }

        .news-item .date {
            color: #888;
            font-size: 0.9em;
        }

        .news-item img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
            border-radius: 8px;
        }

        .read-more {
            display: inline-block;
            margin-top: 10px;
            color: #0093e0;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .read-more:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="news-item">
            <h2>We Are Hiring!</h2>
            <p class="date">2/10/2024</p>
            <img src="int2.jpg" alt="Activités parascolaires">
            <p>📢 Séance de Recrutement du Club Enactus EMSI Marrakech !  

🚀 Prêt à changer le monde avec vos idées ?  
Le Club Enactus EMSI Marrakech vous invite à une rencontre spéciale de recrutement pour découvrir l’univers passionnant de l'entrepreneuriat social et de l'innovation.  

📅 Date : Vendredi 13 décembre 2024  
🕕 Heure : 18h15  
📍 Lieu : Amphithéâtre EMSI Gueliz</p>
            <a href="#" class="read-more">READ MORE</a>
        </div>
        <div class="news-item">
            <h2>Cyber Security Session 1</h2>
            <p class="date">3/6/2024</p>
            <img src="int3.jpg" alt="BANK OF AFRICA - OFPPT - Recrutement">
            <p>🔒💻 CYBER SECURITY SESSION 1 💻🔒
            Get ready to dive into the exciting world of cybersecurity! 🚀</p>
            <a href="#" class="read-more">READ MORE</a>
        </div>
        <div class="news-item">
            <h2>Séance de recrutement</h2>
            <p class="date">22/9/2024</p>
            <img src="int4.jpg" alt="ACTIVITES DES CLUBS 2024/2025">
            <p>Séance de recrutement du club d'innovation  à l'EMSI Marrakech! Rejoignez-nous pour explorer le monde passionnant de la technologie. 🚀 Tous les niveaux de compétence sont les bienvenus. Rendez-vous à  EMSI GUELIZ le 28 Novembre a 17H30</p>
            <a href="#" class="read-more">READ MORE</a>
        </div>
    </div>
</body>
</html>

@include('footer')