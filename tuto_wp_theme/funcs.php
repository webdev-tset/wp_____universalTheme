<?php 
/*CONCERNANT LES BALISES HTML*/




/**
 * FONCTION NON TEMRINER, RESTE A FAIRE:
 * - prendre en compte le param $opt, si =0 =>ajoute (par défaut), si =1, supprime
 * --------------------------------------
 * AJOUTER DES DONNEES A DES ELEMENTS HTML
 * @param string $tag Required. The html element in string form to modify
 * @param string|array $attr Required. The name of the attribute to add(by default($opt==1)) or remove($opt==0)
 * @param bool $opt Optional. add(0) or delete(1) an attribute
 * @return string HTML string format
 */
    function add_attr($tag, $attr, $opt = 0){

        $str_attr="";
        $pos = strpos($tag, " ");
        $start = substr($tag, 0, $pos);
        $end = substr($tag, $pos);
        if(count($attr)!=0 && gettype($attr) == 'array')
            foreach($attr as $k=>$v){
                $str_attr .= "$k=\"$v\" ";
            }
        return $tag ? "$start $str_attr $end" : $tag;
    }
/*-------------------------*/
/**
 * FONCTION NON TEMRINER, RESTE A FAIRE:
 * - rien n'a été fait, tout reste à faire
 * --------------------------------------
 * RETOURNE UN ARRAY CONTENANT TOUTES LES BALISES INDIVIDUELLEMENT
 * LA BOUCLE foreach RENVOIE TOUTE LA BALISE(ouverte et fermante) SSI IL N'EST PAS A FOND DE $tag, 
 * SINON, IL NE RETOURNE QUE LA BALISE ouvrante OU fermante, SELON LE CAS
 * @param string $tag Required. The html element in string form to modify
 * @return array HTML string format
 */
    function cut_tags($tag){
    }
/*-------------------------*/