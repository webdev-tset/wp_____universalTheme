<?php 



/****
 * GETTERS FOR <main/> TEMPLATES 
 ****/
    function get_main(){
        get_template_part('parts/part_posts');
    }




/****
 * GETTERS CALLING OTHER GETTERS
 ****/
    function get_address_author(){
        social_network_links();
    }




/****
 * GETTERS ONLY OUTPUTING, AND ONLY FROM/TO PLAIN DATA
 ****/
    function the_shortlink_title(){
        echo the_title(). ' + some custom words.';
    }
    function social_network_links(){
        echo 'I HAVE TO RETRIEVE rs LINKS FROM THE AUTHOR';
    }