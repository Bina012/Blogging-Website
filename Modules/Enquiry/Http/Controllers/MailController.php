<?php

namespace Modules\Enquiry\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Enquiry\Emails\SendEmail;
use Illuminate\Support\Facades\Mail;
use Modules\Enquiry\Entities\Enquiry;
use Modules\Enquiry\Jobs\SendBlogEmail;


class MailController extends Controller
{

    public function sendMail()
    {
        dispatch(new SendBlogEmail());
    }
   
}
