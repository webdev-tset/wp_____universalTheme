<?php 



/****
 * GETTERS FOR ROOT'S TAGS (<main/>,<header/>,...) TEMPLATES 
 * 'get_<tagname>(){}'
 ****/
    function get_main(){
        get_template_part('parts/part_posts');
    }


/*-----------------------------------------------------------------------------------------------------*/


/****
 * GETTERS CALLING OTHER GETTERS
 * 'get_§getter_name(){}'
 ****/
    function get_§author(){
        social_network_links();
    }
    function get_§author_coord(){
        social_network_links('coord');
    }
    function get_§pagination(){
// https://codex.wordpress.org/Pagination
// https://developer.wordpress.org/themes/functionality/pagination/
// https://developer.wordpress.org/reference/functions/paginate_links/
        $pages=paginate_links(['type'=>'array']);
        if($pages == null)return;
        $active="active";
        // foreach($pages as $page)
        //     var_dump((int)$page);
        echo'<ul class="pagination">';
        foreach($pages as $page){
            if(strpos($page,"current") === false)$rpl="";else $rpl=$active; 
            echo "<li class='page-item ${$rpl}'>".str_replace("page-numbers", "page-link", $page)."</li>";
        }
        echo'<nav aria-label="Page navigation">
        </ul>
        <form method="POST" action="page_to_create.php">
            <input type="hidden" value="a json of all data that would give all information about this page and let page_to_create.php decide what to render" />
            <fieldset>
                <label for="pagination_choose">...ou choisir un page</label>
                <input id="pagination_choose" name="pagination_choose" type="text" />
            </fieldset>
            <fieldset>
                <input type="submit">
            </fieldset>
        </form>
        </nav>';
    }


/*-----------------------------------------------------------------------------------------------------*/



/****
 * GETTERS ONLY OUTPUTING, AND ONLY FROM/TO PLAIN DATA
 * '§§GETTER_NAME(){}'
 ****/
    function §§SHORTLINKT_TITLE(){
        echo the_title(). ' + some custom words.';
    }
    function §§SOCIAL_NETWORK_LINKS($args){
        echo 'I HAVE TO RETRIEVE rs LINKS FROM THE AUTHOR';
    }