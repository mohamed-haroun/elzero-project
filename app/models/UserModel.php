<?php

declare(strict_types=1);

namespace models;

use assets\RULES;
use core\Application;
use DateTimeZone;
use Exception;
use DateTime;

class UserModel extends Model
{

    public string $first_name;
    public string $last_name;
    public string $birth_date;

    public string $gender;
    public string $email;
    public string $user_password;
    public string $created_at;
    public string $status = 'inactive';
    public string $passwordConfirm;
    private int $user_id;
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function createNewUser(): bool
    {
        $connection = Application::DBconnect();

        $query = "INSERT INTO users
                    VALUES(:user_id, :first_name, :last_name, :birth_date, :gender, :email, :user_pass, :created_at, :status)";

        $stmt = $connection->prepare($query);

        $this->created_at = (new DateTime(timezone:new DateTimeZone('Africa/Cairo')))->format('Y-m-d h:i:s');

        $stmt->bindValue(":user_id", null);
        $stmt->bindValue(":first_name", $this->first_name);
        $stmt->bindValue(":last_name", $this->last_name);
        $stmt->bindValue(":birth_date", $this->birth_date);
        $stmt->bindValue(":gender", ucfirst($this->gender));
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":user_pass", sha1($this->user_password));
        $stmt->bindValue(":created_at", $this->created_at);
        $stmt->bindValue(":status", $this->status);

        return $stmt->execute();
    }

    public function login($email, $password): static | bool
    {
        $connection = Application::DBconnect();

        $query = "SELECT * FROM users WHERE email = :email AND user_password = :password";

        $stmt = $connection->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', sha1($password));

        $stmt->execute();

        return $stmt->fetchObject(static::class);
    }

    public function getUser($needle, $value): static|bool
    {
        $connection = Application::DBconnect();

        $query = "SELECT * FROM users WHERE $needle = :value";

        $stmt = $connection->prepare($query);

        $stmt->bindValue(":value", $value);

        $stmt->execute();

        if ($stmt->fetchAll()) {
            return true;
        }
        return false;
    }

    protected function rules():array
    {
        return [
            'first_name'         => [RULES::RULE_REQUIRED->name],
            'last_name'          => [RULES::RULE_REQUIRED->name],
            'birth_date'         => [RULES::RULE_REQUIRED->name],
            'email'              => [RULES::RULE_REQUIRED->name, RULES::RULE_EMAIL->name, RULES::RULE_UNIQUE->name],
            'user_password'      => [
                                     RULES::RULE_REQUIRED->name,
                                     [RULES::RULE_MIN->name, 'min' => 8],
                                     [RULES::RULE_MAX->name, 'max' => 64]
                                    ],
            'passwordConfirm'   => [RULES::RULE_REQUIRED->name, [RULES::RULE_MATCH->name, 'match' => 'user_password']],
        ];
    }
}