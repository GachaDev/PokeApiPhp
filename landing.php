<?php
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $ch = curl_init("https://pokeapi.co/api/v2/pokemon/" . $nombre . "/");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $datos_pokemon = json_decode($response, true);
    $types = [
        "normal" => "gray",
        "fighting" => "red",
        "flying" => "skyblue",
        "poison" => "purple",
        "ground" => "brown",
        "rock" => "darkgray",
        "bug" => "green",
        "ghost" => "indigo",
        "steel" => "silver",
        "fire" => "orange",
        "water" => "blue",
        "grass" => "limegreen",
        "electric" => "yellow",
        "psychic" => "pink",
        "ice" => "cyan",
        "dragon" => "darkblue",
        "dark" => "black",
        "fairy" => "lightpink",
        "stellar" => "gold",
        "unknown" => "darkgray"
    ];

    curl_close($ch);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poké Ball</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once "header.php";
    ?>
    <main>
        <section class="form-content">
            <form action="landing.php" method="post">
                <label for="nombre">Nombre o ID del Pokémon:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ejemplo: pikachu" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : "" ?>">
                <button type="submit">Buscar</button>
            </form>
        </section>
        <section class="pokemon">
            <?php if (isset($datos_pokemon)): ?>
                <div class="card-pokemon">
                    <div style="background-color: <?= $types[$datos_pokemon['types'][0]['type']['name']]; ?>" class="pokemon-img">
                        <div class="circle">
                            <img src="<?= $datos_pokemon['sprites']['front_default']; ?>" alt="<?= $datos_pokemon['name']; ?>">
                        </div>
                    </div>
                    <div class="content">
                        <h3><?= ucfirst($datos_pokemon['name']); ?></h3>
                        <span>Tipo = <?= $datos_pokemon['types'][0]['type']['name'] ?></span>
                        <span>HP = <?= $datos_pokemon['stats'][0]['base_stat']; ?></span>
                        <span>Ataque = <?= $datos_pokemon['stats'][1]['base_stat']; ?></span>
                        <span>Defensa = <?= $datos_pokemon['stats'][2]['base_stat']; ?></span>
                        <span>Ataque-Especial = <?= $datos_pokemon['stats'][3]['base_stat']; ?></span>
                        <span>Defensa-Especial = <?= $datos_pokemon['stats'][4]['base_stat']; ?></span>
                    </div>
                </div>
            <?php else: ?>
                <?php if (isset($_POST['nombre'])): ?>
                    <span>No se encontró el Pokémon con ese nombre/id</span>
                <?php else: ?>
                    <span>Escribe el nombre/id del Pokémon para obtener su carta</span>
                <?php endif; ?>
            <?php endif; ?>
            <img class="charizard" src="https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/006.png" alt="Charizard">
        </section>
    </main>
</body>
</html>
