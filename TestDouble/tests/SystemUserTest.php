<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\SenderSpy;
use nestorbs\SystemUser;
use nestorbs\Sender;

class SystemUserTest extends TestCase
{
    /** @test */
    public function should_send_mail_when_user_information_is_requested()
    {
        $sender = new SenderSpy();
        $systemUser = new SystemUser($sender);

        $systemUser->getUser();

        $this->assertTrue($sender->mailSent());
    }

    /** @test */
    public function should_send_mail_when_user_information_is_requested_()
    {
        $senderSpy = $this->prophesize(Sender::class);
        $systemUser = new SystemUser($senderSpy->reveal());

        $systemUser->getUser();

        $senderSpy->sendMail()->shouldBeCalled();
    }
}
