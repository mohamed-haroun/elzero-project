<?php

namespace models;

use assets\RULES;
use core\Application;
use PDOException;

class MessageModel extends Model
{

    public string $senderName;
    public string $senderEmail;
    public string $messageBody;

    public function createNewMessage(): bool|string
    {
        // The post Data

        $pdoConnect = Application::DBconnect();

        if ($this->validateData()) {

            try {
                $query = "INSERT INTO messages VALUES (:message_id,:message, :sender, :email)";

                $stmt = $pdoConnect->prepare($query);

                $stmt->execute(
                    [
                        ":message_id" => null,
                        ":sender" => $this->senderName,
                        ":email" => $this->senderEmail,
                        ":message" => $this->messageBody
                    ]
                );
            } catch (PDOException $exception) {
                return $exception->getMessage();
            }
            return true;
        } else {
            return false;
        }
    }

    public function toString(): string
    {
        return $this->senderName;
    }

    protected function rules(): array
    {
        return [
            'senderName'        => [RULES::RULE_REQUIRED->name],
            'senderEmail'       => [RULES::RULE_REQUIRED->name, RULES::RULE_EMAIL->name],
            'messageBody'       => [RULES::RULE_REQUIRED->name]
        ];
    }
}