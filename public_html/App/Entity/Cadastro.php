<?php

namespace App\Entity;

class Cadastro
{

    private $id;
    private $tipocad;
    private $cgc;
    private $razao;
    private $fantasia;
    private $email;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;
    private $area;
    private $arquivos;
    private $termos;
    private $status;
    private $responsaveis;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getTipocad()
    {
        return $this->tipocad;
    }

    public function setTipocad($tipocad)
    {
        return $this->tipocad = $tipocad;
    }

    public function getCgc()
    {
        return $this->cgc;
    }

    public function setCgc($cgc)
    {
        return $this->cgc = $cgc;
    }

    public function getRazao()
    {
        return $this->razao;
    }

    public function setRazao($razao)
    {
        return $this->razao = $razao;
    }

    public function getFantasia()
    {
        return $this->fantasia;
    }

    public function setFantasia($fantasia)
    {
        return $this->fantasia = $fantasia;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        return $this->endereco = $endereco;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        return $this->bairro = $bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        return $this->cidade = $cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        return $this->estado = $estado;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area)
    {
        return $this->area = $area;
    }

    public function getArquivos()
    {
        return $this->arquivos;
    }

    public function setArquivos($arquivos)
    {
        return $this->arquivos = $arquivos;
    }

    public function getTermos()
    {
        return $this->termos;
    }

    public function setTermos($termos)
    {
        return $this->termos = $termos;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        return $this->status = $status;
    }

    public function getResponsaveis()
    {
        return $this->responsaveis;
    }

    public function setResponsaveis($responsaveis)
    {
        return $this->responsaveis = $responsaveis;
    }
}