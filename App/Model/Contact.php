<?php
namespace App\Model;
use App\Utils\BddConnect;
class Contact extends BddConnect{
    private ?int $id_contact_user;
    private ?string $name_contact_user;
    private ?string $first_name_contact_user;
    private ?string $mail_contact_user;
    private ?string $message_contact_user;

    public function getId():?int{
        return $this->id_contact_user;
    }
    public function setId(?int $id){
        $this->id_contact_user = $id;
    }
    public function getNom():?string{
        return $this->name_contact_user;
    }
    public function setNom(?string $name){
        $this->name_contact_user = $name;
    }
    public function getPrenom():?string{
        return $this->first_name_contact_user;
    }
    public function setPrenom(?string $firstName){
        $this->first_name_contact_user = $firstName;
    }
    public function getMail():?string{
        return $this->mail_contact_user;
    }
    public function setMail(?string $mail){
        $this->mail_contact_user = $mail;
    }
    public function getMessage():?string{
        return $this->message_contact_user;
    }
    public function setMessage(?string $message){
        $this->message_contact_user = $message;
    }
    public function add(){
        try {
            $nom = $this->getNom();
            $prenom =$this->getPrenom();
            $mail = $this->getMail();
            $message = $this->getMessage();
            $req = $this->connexion()->prepare('INSERT INTO contact_user(name_contact_user,first_name_contact_user,
            mail_contact_user, message_contact_user)VALUES(?,?,?,?)');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->bindParam(2, $prenom, \PDO::PARAM_STR);
            $req->bindParam(3, $mail, \PDO::PARAM_STR);
            $req->bindParam(4, $message, \PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findOneBy(){
        try {
            $mail = $this->getMail();
            $req = $this->connexion()->prepare('SELECT id_contact_user,name_contact_user,first_name_contact_user, 
            mail_contact_user, message_contact_user FROM contact_user WHERE mail_contact_user = ?');
            $req->bindParam(1, $mail, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Contact::class);
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}
?>