<?php
// 1. Definimos el Endpoint con la DEMO_KEY que elegiste
$url = "https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY";

// 2. Consumimos la API usando file_get_contents
$response = file_get_contents($url);

// 3. Convertimos el JSON en un objeto de PHP para usar sus datos
$data = json_decode($response);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <meta charset="UTF-8">
    <title>Investigación NASA - APOD</title>
    <style>
        body { font-family: sans-serif; background-color: #1a1a1a; color: white; display: flex; justify-content: center; }
        .card { max-width: 800px; background: #2c2c2c; padding: 20px; border-radius: 15px; margin-top: 50px; text-align: center; }
        img, iframe { width: 100%; border-radius: 10px; margin: 15px 0; }
        p { text-align: justify; line-height: 1.6; }
    </style>
</head>
<body>
    <div id="google_translate_element"></div>
    <div class="card">
        <h1><?php echo $data->title; ?></h1>
        <span>Fecha: <?php echo $data->date; ?></span>

        <?php if($data->media_type == 'image'): ?>
            <img src="<?php echo $data->url; ?>" alt="Foto de la NASA">
        <?php else: ?>
            <iframe src="<?php echo $data->url; ?>" height="400" frameborder="0" allowfullscreen></iframe>
        <?php endif; ?>

        <h3>Explicación:</h3>
        <p><?php echo $data->explanation; ?></p>
    </div>
</body>
</html>