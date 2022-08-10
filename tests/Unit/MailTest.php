<?php


namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Mail\Transport\ArrayTransport;
use Illuminate\Support\Facades\Config;


class MailFailoverTransportTest extends TestCase
{
    public function testGetFailoverTransportWithConfiguredTransports()
    {
        Config::set('mail.default', 'failover');

        Config::set('mail.mailers', [
            'failover' => [
                'transport' => 'failover',
                'mailers' => [
                    'sendmail',
                    'array',
                ],
            ],

            'sendmail' => [
                'transport' => 'sendmail',
                'path' => '/usr/sbin/sendmail -bs',
            ],

            'array' => [
                'transport' => 'array',
            ],
        ]);

        $transport = app('mailer')->getSwiftMailer()->getTransport();
        $this->assertInstanceOf(\Swift_FailoverTransport::class, $transport);

        $transports = $transport->getTransports();
        $this->assertCount(2, $transports);
        $this->assertInstanceOf(\Swift_SendmailTransport::class, $transports[0]);
        $this->assertEquals('/usr/sbin/sendmail -bs', $transports[0]->getCommand());
        $this->assertInstanceOf(ArrayTransport::class, $transports[1]);
    }

    public function testGetFailoverTransportWithLaravelStyleMailConfiguration()
    {
        Config::set('mail.driver', 'failover');

        Config::set('mail.mailers', [
            'sendmail',
            'array',
        ]);

        Config::set('mail.sendmail', '/usr/sbin/sendmail -bs');

        $transport = app('mailer')->getSwiftMailer()->getTransport();
        $this->assertInstanceOf(\Swift_FailoverTransport::class, $transport);

        $transports = $transport->getTransports();
        $this->assertCount(2, $transports);
        $this->assertInstanceOf(\Swift_SendmailTransport::class, $transports[0]);
        $this->assertEquals('/usr/sbin/sendmail -bs', $transports[0]->getCommand());
        $this->assertInstanceOf(ArrayTransport::class, $transports[1]);
    }
}