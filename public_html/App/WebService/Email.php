<?php

namespace App\WebService;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class Email
{

    const HOST      = 'smtplw.com.br';
    const USER      = 'tidts';
    const PASS      = 'cPQOBOuJ9236';
    const SECURE    = 'TLS';
    const PORT      = 587;
    const CHARSET   = 'UTF-8';

    const FROM_EMAIL = 'cadastro@dts.tec.br';
    const FROM_NAME = 'Cadastro - DTS Distribuidora';
    

    /**
     * Erro de envio de email.
     * @var string
     */
    private $error;

    /**
     * Retorno da mensagem de error
     * @return string
     */
    public function getError() {
        return $this->error;
    }

    public function sendMail($addresses, $subject, $body, $attachments = [], $ccs = [], $bccs = []) {
        $this->error = '';

        $obMail = new PHPMailer(true);

        $obMail->isSMTP(true);
        $obMail->Host       = self::HOST;
        $obMail->SMTPAuth   = true;
        $obMail->Username   = self::USER;
        $obMail->Password   = self::PASS;
        $obMail->SMTPSecure = self::SECURE;
        $obMail->Port       = self::PORT;
        $obMail->CharSet    = self::CHARSET;

        $obMail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

        $addresses = is_array($addresses) ? $addresses : [$addresses];
        foreach($addresses as $address) {
            $obMail->addAddress($address);
        }

        $attachments = is_array($attachments) ? $attachments : [$attachments];
        foreach($attachments as $attachment) {
            $obMail->addAttachment($attachment);
        }

        $ccs = is_array($ccs) ? $ccs : [$ccs];
        foreach($ccs as $cc) {
            $obMail->addCC($cc);
        }

        $bccs = is_array($bccs) ? $bccs : [$bccs];
        foreach($bccs as $bcc) {
            $obMail->addBCC($bcc);
        }

        $obMail->isHTML(true);
        $obMail->Subject = $subject;
        $obMail->Body = $body;

        return $obMail->send();

        try {

        } catch(PHPMailerException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
}
