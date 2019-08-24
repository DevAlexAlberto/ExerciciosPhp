<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Implemente sua resolução aqui.
 */
class Resolucao implements TextWrapInterface {

  /**
   * {@inheritdoc}
   */
  public function textWrap(string $text, int $length): array {
    $palavras = [];
    $letras = [];
    $posicaoDaLetra = 1;
    $linhas = 0;
    $palavras[$linhas] = '';

    for ($i = 0; $i < strlen($text); $i++) {
      if (($text[$i] == ' ' && isset($text[$i + 1]) && $text[$i + 1] != ' ' && $posicaoDaLetra != 1) || $text[$i] != ' ') {
        $letras[$posicaoDaLetra] = $text[$i];
        $posicaoDaLetra++;
      }

      if (($posicaoDaLetra - 1) == $length) {
        if (in_array(' ', $letras)) {
          if (isset($text[$i + 1]) && $text[$i + 1] != ' ') {
            for ($e = count($letras); $e > 0; $e--) {
              if ($letras[$e] == ' ') {
                $i -= $length - $e;
                array_pop($letras);
                break;
              }
    
              array_pop($letras);
            }
          }
        }

        $palavras[$linhas] = implode($letras);

        $posicaoDaLetra = 1;
        $letras = [];
        $linhas++;
      } elseif ($i == (strlen($text)) - 1) {
        $palavras[$linhas] = implode($letras);
        $linhas++;
      }
    } 

    return $palavras;
  }

}
