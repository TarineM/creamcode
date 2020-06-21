<?php

namespace Models;

class Utils
{
    /**
     * Transformer le nom, la nouvelle chaîne sera utilisée pour un nom de dossier/fichier
     * Remplacer les espaces par des underscores
     * Mettre en minuscule
     * Transformer les caractères spéciaux en caractères normaux
     * Quelques caractères spéciaux seront transformés
     * Exemple: Head & Shoulders --> head_and_shoulders
     * @param string $name
     * @return string
     */
    public function transform_name(string $name): string
    {
        $nameDir = strtolower($name);
        $nameDir = preg_replace(' ', '_', $nameDir);
        //$nameDir = preg_replace()
        return $nameDir;
    }

    public function enleverCaracteresSpeciaux($text) {
        // montrer des cas dans beaute test
        $utf8 = array(
        '/[áàâãªä]/u' => 'a',
        '/[ÁÀÂÃÄ]/u' => 'A',
        '/[ÍÌÎÏ]/u' => 'I',
        '/[íìîï]/u' => 'i',
        '/[éèêë]/u' => 'e',
        '/[ÉÈÊË]/u' => 'E',
        '/[óòôõºö]/u' => 'o',
        '/[ÓÒÔÕÖ]/u' => 'O',
        '/[úùûü]/u' => 'u',
        '/[ÚÙÛÜ]/u' => 'U',
        '/ç/' => 'c',
        '/Ç/' => 'C',
        '/ñ/' => 'n',
        '/Ñ/' => 'N',
        '//' => '-', // conversion d'un tiret UTF-8 en un tiret simple
        '/[]/u' => ' ', // guillemet simple
        '/[«»]/u' => ' ', // guillemet double
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
        }

    /**
     * Créer un dossier
     * @param string $nameDir
     * @return void
     */
    public function createDirectory(string $nameDir): void
    {
        $n = 5;
    }
}