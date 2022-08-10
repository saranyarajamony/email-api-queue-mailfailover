## About API

Create an email service API, which can be open source and reusable in any other services.
• Use l5 repository as application structure (https://github.com/andersao/l5-repository)
• The API should provide an abstraction between multiple email service providers.
• The email sending service should handle massive concurrent sending request, and
not delay the response time
• Build email template system to accept user input html template and store in the table
• The email template should contain dynamic variable such as username, so each email
sending request will send dynamic email.
• Create a RESTful API that accepts the necessary information and sends emails.
• If one of the services goes down, it can quickly failover to another provider without
affecting your customers. (you can set failover number to 3 and switch to another
service)
Example Email Providers:
• PostMark (https://postmarkapp.com/)
• Mailgun (https://www.mailgun.com/)
• Mandrill (https://mandrillapp.com/)
• Amazon SES (https://aws.amazon.com/ses/)
All listed services are free to try and are simple to sign up for, so please register your own
test accounts on each.
Development environment:
• Github: Post the code and share the repo link from the email address, we will
have a look
• Target platform: API

## Mail providers used
* Mailtrap
* Mailgun
* Sendgrid
* PostMark

## Testcase
* Used PHPUnit
* written test case for checking MailFailoverTransportTest
