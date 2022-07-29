<?php


class HTMLMaker
{

    private $db;

    public function __construct(PDO $DB){
        $this->db = $DB;


    }

    public function createMenu($MenuID){


        $query = $this->db->prepare("
SELECT link_id, link_order 
FROM cms_menus 
inner Join cms_menu_links 
on cms_menus.menu_name = cms_menu_links.menu_name 
WHERE cms_menus.menu_name = ?
ORDER BY cms_menu_links.link_order;");

        $query->execute([$MenuID]);

        $menu = "<ul>";

        while ($row = $query->fetch()) {
                $menu .= "<li>";


                $menu .= $this->createLink($row['link_id']);

                $menu .= "</li>";
        }

        $menu .= "</ul>";

        return $menu;

    }

    public function createLink($LinkID){
        $query = $this->db->prepare("SELECT * FROM cms_links WHERE link_id = ?");

        $query->execute([$LinkID]);

        $link = $query->fetch();

        $html = "<a href=\"" . $link['href'] . "\">" . $link['text'] . "</a>";

        return $html;
    }



}