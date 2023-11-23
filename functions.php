<?php
function nav_item (string $lien, string $titre, string $linkClass = ''): string
{
    $classe = '';
    if( $_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = ' active';
    }
    return <<<HTML
    <li class="nav-item">
        <a class="nav-link $classe " href="$lien ">$titre</a>
    </li>
HTML;
}

function nav_menu (string $linkClass = ''): string
{
    return 
    nav_item('/index.php', 'Accueil', $linkClass).
    nav_item('/movie.php', 'Films', $linkClass);
}


function checkbox(string $name, string $value, array $data): string 
{
    $attribute = '';
    if (isset($data[$name]) && in_array($value, $data[$name])){
            $attribute .= 'checked';
    }

    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attribute>
HTML;
}

function radio(string $name, string $value, array $data): string 
{
    $attribute = '';
    if (isset($data[$name]) && $value ===  $data[$name]){
            $attribute .= 'checked';
    }

    return <<<HTML
    <input type="radio" name="{$name}" value="$value" $attribute>
HTML;
}

function dump ($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}