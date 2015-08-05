<?php

namespace spec\Sungcaya\Phpass;

use Hautelook\Phpass\PasswordHash;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhpassHasherSpec extends ObjectBehavior
{
    function let(PasswordHash $hasher)
    {
        $this->beConstructedWith($hasher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sungcaya\Phpass\PhpassHasher');
    }

    function it_hashes_a_string_password(PasswordHash $hasher)
    {
        $hasher->HashPassword('password')->shouldBeCalled()->willReturn('hashed');

        $this->make('password')->shouldReturn('hashed');
    }

    function it_checks_if_a_string_matches_the_hashed_value(PasswordHash $hasher)
    {
        $hasher->CheckPassword('password','hashed-password')->shouldBeCalled()->willReturn(true);

        $this->check('password', 'hashed-password')->shouldReturn(true);
    }

    function it_returns_false_if_the_hashed_password_is_empty(PasswordHash $hasher)
    {
        $hasher->CheckPassword()->shouldNotBeCalled();

        $this->check('password', '')->shouldReturn(false);
    }

    function it_does_not_need_rehashing()
    {
        $this->needsRehash('hashed-password')->shouldReturn(false);
    }

}
