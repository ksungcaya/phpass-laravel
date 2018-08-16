<?php namespace Sungcaya\Phpass;

use Hautelook\Phpass\PasswordHash;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class PhpassHasher implements HasherContract
{
    /**
     * @var PasswordHash
     */
    protected $hasher;

    /**
     * Create PhpassHasher instance.
     *
     * @param PasswordHash $hasher
     */
    public function __construct(PasswordHash $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * Get information about the given hashed value.
     *
     * @param  string  $hashedValue
     * @return array
     */
    public function info($hashedValue)
    {
        return password_get_info($hashedValue);
    }

    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @param  array   $options
     * @return string
     *
     * @throws \RuntimeException
     */
    public function make($value, array $options = [])
    {
        return $this->hasher->HashPassword($value);
    }

    /**
     * Check the given plain value against a hash.
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = [])
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }

        return $this->hasher->CheckPassword($value, $hashedValue);
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }
}
