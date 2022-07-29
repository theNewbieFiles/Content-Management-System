<?php


class AdminPage
{
    private $db;
    private $user;
    private $options;

    public function __construct(PDO $DB, User $User, array $Options){
        $this->db = $DB;
        $this->user = $User;
        $this->options = $Options;
    }

}