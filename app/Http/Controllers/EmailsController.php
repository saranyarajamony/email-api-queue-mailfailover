<?php

namespace App\Http\Controllers;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmailCreateRequest;
use App\Repositories\EmailRepository;
use App\Validators\EmailValidator;


//Send Mail related classes
use App\Library\EmailAttributes;
use App\Mail\DynamicMailer;
use Illuminate\Support\Facades\Mail;


//NOTE: we can have as many endpoints as we need eg: email{id}, updateEmail{id} etc.Not implemented as its not part of the task
//Only implementing STORE method to have the data saved for sending emails.
//created a INDEX method just to list all trhe entries in the email table just for test purpose


/**
 * Class EmailsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmailsController extends Controller
{
    /**
     * @var EmailRepository
     */
    protected $repository;

    /**
     * @var EmailValidator
     */
    protected $validator;

    /**
     * EmailsController constructor.
     *
     * @param EmailRepository $repository
     * @param EmailValidator $validator
     */
    public function __construct(EmailRepository $repository, EmailValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * created INDEX method just to list all the entries in the email table just for test purpose
     * 
     * Display list of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $emails = $this->repository->all();

        return response()->json([
            'data' => $emails
        ]);
    }

    /**
     * Store a newly created resource into the db and initiate sendMail.
     *
     * @param  EmailCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmailCreateRequest $request)
    {
        try {
           // $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $this->repository->create($request->all());

            $mailSendResponse = $this->sendEmail($request);

            /* $response = [
                'message' => 'Email created.',
                'data'    => $email->toArray(),
            ];*/

            return $mailSendResponse;
            
        } catch (ValidatorException $e) {

            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    /**
     * Method to setup the email attributes and send mail to queue so that the sending of the mail happens in the background 
     * without affecting  the response time of the application
     * 
     * @return \Illuminate\Http\Response
     */

    public function sendEmail(EmailCreateRequest $request)
    {

        //Setup email template attributes from the user request input
        $emailAttr = new EmailAttributes();
        $emailAttr->subject = $request->input('subject');
        $emailAttr->content = $request->input('content');
        $emailAttr->name = $request->input('username');
        $emailAttr->to = $request->input('to');
        $emailAttr->from = $request->input('from');

        $mailable = new DynamicMailer($emailAttr);


        //Queue instead to avoid delay in response time (Mail send in the background)
        Mail::to($mailable->emailAttributes->to)
            ->cc($mailable->emailAttributes->cc)
            ->bcc($mailable->emailAttributes->bcc)
            // ->send($mailable);
            ->queue($mailable);

        return response()->json([
            'message' => 'Account created',
            'data'    => 'Notification mail has been sent to ' . $mailable->emailAttributes->to
        ]);
    }
}
