<?php
declare(strict_types=1);

namespace controllers;

use core\Application;
use core\Request;
use models\MessageModel;

class MessageController extends Controller
{
    protected MessageModel $messageModel;
    protected Request $request;

    public function __construct(string $layout = "main_layout")
    {
        parent::__construct($layout);
        $this->request = new Request();
    }

    public function saveMessage(): void
    {

        if ($this->request->getRequestMethod() === 'post') {
            $this->messageModel = new MessageModel();
            $this->messageModel->loadData($this->request->getBody());

            $sent = $this->messageModel->createNewMessage();

            if ($sent && gettype($sent) == "boolean") {
                $this->render("messages", [
                    "pageName" => "Check Message",
                    "message" => "The message is sent successfully",
                    "message_type" => "success"
                ]);
            } else {
                $this->render("messages", [
                    "pageName" => "Check Message",
                    "message" => "Failure to send message<br>" . $sent,
                    "message_type" => "danger"
                ]);
            }
        }
    }
}