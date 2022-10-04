<?php
require './vendor/autoload.php';

use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class PasswordHasher {

    private static ?PasswordHasher $instance = null;

    private PasswordHasherInterface $hasher;

    public function __construct()
    {
        $factory = new Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory([
            'common' => ['algorithm' => 'bcrypt'],
            'memory-hard' => ['algorithm' => 'sodium'],
        ]);

        $this->hasher = $factory->getPasswordHasher('common');
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function hash(?string $password): ?string
    {
        if (!$password) return null;

        return $this->hasher->hash($password);
    }

    public function check(?string $hash, ?string $password): bool
    {
        if (!$hash || !$password) return false;

        return $this->hasher->verify($hash, $password);
    }
}
