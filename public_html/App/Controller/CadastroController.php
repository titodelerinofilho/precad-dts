<?php

namespace App\Controller;

use \App\Model\Conexao;
use \App\Entity\Cadastro;

class CadastroController
{

    public function create(Cadastro $c)
    {

        $data = new \DateTime("now");

        $uploadsDir = "../uploads/";
        $allowedFileType = array('jpg', 'png', 'jpeg', 'pdf');

        $cgc = $c->getCgc();
        $arquivos = $c->getArquivos();

        $uploadsDir = $uploadsDir . md5($cgc).'/';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0755, true);
        }

        if (!empty(array_filter($arquivos['name']))) {
            // Loop through file items
            foreach ($arquivos['name'] as $id => $val) {
                // Get files upload path
                $fileName = $arquivos['name'][$id];
                $tempLocation = $arquivos['tmp_name'][$id];
                $targetFilePath = $uploadsDir.$fileName;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $newNameFile = md5($targetFilePath);
                $newNameFileToPath = $uploadsDir.$newNameFile.'.'.$fileType;

                if (in_array($fileType, $allowedFileType)) {
                    if (move_uploaded_file($tempLocation, $newNameFileToPath)) {
                        $sqlVal = "/".md5($cgc). "/";
                    } else {
                        die('<script>alert("Erro ao fazer upload do arquivo!"); window.location.href="../cadastrar.php";</script>');
                    }
                } else {
                    die('<script>alert("O arquivo não é permitido no servidor!"); window.location.href="../cadastrar.php";</script>');
                }
                if (!empty($sqlVal)) {
                    $c->setArquivos($sqlVal);
                }
            }
        }

        try {
            $sql = 'INSERT INTO register
                (tipocad,cgc,razao,fantasia,email,endereco,bairro,cidade,estado,area,arquivos,termos,responsaveis)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $c->getTipocad());
            $stmt->bindValue(2, $c->getCgc());
            $stmt->bindValue(3, $c->getRazao());
            $stmt->bindValue(4, $c->getFantasia());
            $stmt->bindValue(5, $c->getEmail());
            $stmt->bindValue(6, $c->getEndereco());
            $stmt->bindValue(7, $c->getBairro());
            $stmt->bindValue(8, $c->getCidade());
            $stmt->bindValue(9, $c->getEstado());
            $stmt->bindValue(10, $c->getArea());
            $stmt->bindValue(11, $c->getArquivos());
            $stmt->bindValue(12, $c->getTermos());
            $stmt->bindValue(13, $c->getResponsaveis());

            $stmt->execute();
            return true;
        }
        catch(\PDOException $exception) {
            echo 'Error: '.$exception->getMessage();
        }
    }

    public function show()
    {
        $sql = 'SELECT * FROM register';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return [];
        }
    }

    public function showOnly(Cadastro $c)
    {
        $sql = 'SELECT * FROM register WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $id = $c->getId();
        $stmt->bindParam(1, $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return [];
        }
    }
    public function getCadApproval() {
        $sql = 'SELECT * FROM register WHERE status = 1';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $resultado = $stmt->rowCount();
        } else {
            return 0;
        }
    }
    public function getCadNegative() {
        $sql = 'SELECT * FROM register WHERE status = 2';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $resultado = $stmt->rowCount();
        } else {
            return 0;
        }
    }
    public function getCadOpen() {
        $sql = 'SELECT * FROM register WHERE status = 0';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $resultado = $stmt->rowCount();
        } else {
            return 0;
        }
    }

    public function update(Cadastro $c)
    {
        $data = new \DateTime();

        $sql = 'UPDATE register
                SET tipocad = ?,
                cgc = ?,
                razao = ?,
                fantasia = ?,
                endereco = ?,
                bairro = ?,
                area = ?,
                arquivos = ?,
                termos = ?,
                responsaveis = ?,
                updatedAt = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $c->getTipocad());
        $stmt->bindValue(2, $c->getCgc());
        $stmt->bindValue(3, $c->getRazao());
        $stmt->bindValue(4, $c->getFantasia());
        $stmt->bindValue(5, $c->getEndereco());
        $stmt->bindValue(6, $c->getBairro());
        $stmt->bindValue(7, $c->getArea());
        $stmt->bindValue(8, $c->getArquivos());
        $stmt->bindValue(9, $c->getTermos());
        $stmt->bindValue(10, $c->getResponsaveis());
        $stmt->execute();

        return true;
    }

    public function approveCad(Cadastro $c) {
        $sql = 'UPDATE register SET status = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, '1');
        $id = $c->getId();
        $stmt->bindParam(2, $id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM register WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return true;
    }
}