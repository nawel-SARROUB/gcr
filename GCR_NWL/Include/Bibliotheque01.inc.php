<?php
function formSelectDepuisRecordset($unLabel, $unName, $id, $jeuEnregistrements, $valeuroptionnel = NULL, $unTabindex) {
    $codeHTML = '<label for="' . $id . '">' . $unLabel . '</label>'
            . '<select name="' . $unName . '" id="' . $id . '" tabindex="' . $unTabindex . '">';
    $jeuEnregistrements->setFetchMode(PDO::FETCH_NUM);
    $ligne = $jeuEnregistrements->fetch();

    if ($valeuroptionnel === NULL) {
        while ($ligne == true) {
            $codeHTML .= '<option value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
            $ligne = $jeuEnregistrements->fetch();
        }
    } else {
        while ($ligne == true) {
            $codeHTML .= '<option';

            if ($ligne[0] == $valeuroptionnel) {
                $codeHTML .= ' selected ="selected"';
            }
            $codeHTML .= ' value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
            $ligne = $jeuEnregistrements->fetch();
        }
    }
    $codeHTML .= '</select>';
    return $codeHTML;
}

function formInputText($css, $nom, $nomlabel, $size, $css2, $valeur, $lectureSeule, $required=FALSE) {
    $codeHTML = '<label class="' . $css . '" for="' . $nom . '">' . $nomlabel . '</label>
<input type="text" value="' . $valeur . '" size="' . $size . '" name="' . $nom . '" class="' . $css2 . '"'
            . ($lectureSeule == TRUE ? ' readonly="readonly"' : '')
            . ($required == TRUE ? ' required="required"' : '') . '/>'
            . "</br></br>";
    return $codeHTML;
}

function formBoutonSubmit($nom, $id, $value, $tabIndex) {
    $codeBtnSub = '<input type="submit" value="' . $value . '" name="' . $nom . '" id="' . $id . '" tabindex="' . $tabIndex . '" />';
    return $codeBtnSub;
}

function formInputHidden($hidNom, $hiddenId, $hidValue) {
    $codeHidden = '<input type="hidden" value="' . $hidValue . '" name="' . $hidNom . '" id="' . $hiddenId . '" />';
    return $codeHidden;
}


function formTextArea($css, $nom, $nomlabel,$valeur, $cols, $rows, $maxlength, $tabIndex, $lectureSeule, $required=FALSE) {
    $codeTextArea = '<label class="' . $css . '" for="' . $nom . '">' . $nomlabel . '</label>'
            . '<textarea value="' . $valeur . '" cols="' . $cols . '" rows="' . $rows . '" maxlength="' . $maxlength . '" tabindex="' .$tabIndex. '"' 
            . ($lectureSeule == TRUE ? ' readonly="readonly"' : '')
            . ($required == TRUE ? ' required="required"' : '') . '">'
            . $valeur
            . "</textarea>"
            . "</br></br>";
    return $codeTextArea;
}

function formInputPassword($css, $nom, $nomlabel, $size, $maxlength, $tabIndex, $valeur, $required=FALSE) {
    $codeHTML = '<label class="' . $css . '" for="' . $nom . '">' . $nomlabel . '</label>
<input type="password" value="' . $valeur . '" size="' . $size . '" maxlength="' . $maxlength . '" tabindex="' .$tabIndex. '" name="' . $nom . '"'
            . ($required == TRUE ? ' required="required"' : '') . '/>'
            . "</br></br>";
            
    return $codeHTML;
}

function formInputIdentifiant($css, $nom, $nomlabel, $size, $maxlength, $tabIndex, $valeur, $required=FALSE) {
    $codeHTML = '<label class="' . $css . '" for="' . $nom . '">' . $nomlabel . '</label>
<input type="text" value="' . $valeur . '" size="' . $size . '" maxlength="' . $maxlength . '" tabindex="' .$tabIndex.  '" name="' . $nom . '"'
            . ($required == TRUE ? ' required="required"' : '') . '/>'
            . "</br></br>";
    return $codeHTML;
}

?>