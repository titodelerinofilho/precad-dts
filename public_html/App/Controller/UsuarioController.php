<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Usuario;
use App\Model\Conexao;

class UsuarioController {

    const USER_TABLE = 'users';

    public static function getLastId()
    {
        $sql = 'SELECT MAX(id) as userId FROM '.self::USER_TABLE;
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetch(\PDO::FETCH_BOTH);

        $id = $dados['userId'] + 1;

        return $id;
    }

    public function findByUser(Usuario $c): array
    {
        $sql = 'SELECT * FROM '.self::USER_TABLE.' WHERE user = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $c->getUser());

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return ["data" => "Inexistente"];
        }
      }

      public function cadastrar(Usuario $c): bool
      {
          $sql = 'INSERT INTO '.self::USER_TABLE.' (id,user,email,pass) VALUES (?,?,?,?)';
          $stmt = Conexao::getConn()->prepare($sql);
          $stmt->bindValue(1, $c->getId());
          $stmt->bindValue(2, $c->getUser());
          $stmt->bindValue(3, $c->getEmail());
          $stmt->bindValue(4, $c->getPassword());
          $stmt->execute();

          if(!$stmt) {
            return false;
          } else {
            return true;
          }
      }

      public function passwordChange(Usuario $c): bool
      {
        $sql = 'UPDATE '.self::USER_TABLE.' SET pass = ? WHERE id = ? ';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $c->getPassword());
        $stmt->bindValue(2, $c->getId());
        $stmt->execute();

        return true;
      }

}

