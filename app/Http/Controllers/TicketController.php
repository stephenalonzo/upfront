<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Response;
use App\Models\AgentTicket;
use App\Models\StatusTicket;
use Illuminate\Http\Request;
use App\Models\CategoryTicket;
use App\Models\PriorityTicket;
use App\Models\ResponseTicket;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class TicketController extends Controller
{

    public function index()
    {

        // Check authenticated user role
        // Show tickets that relate to the customer or agent

        $user = User::find(auth()->user()->id);
        
        foreach ($user->roles as $role)
        {

            if ($role->title == 'Agent')
            {
                return view('tickets.index', [
                    'tickets' => Ticket::where('agent_id', auth()->id())->get(),
                    'users'   => User::find(auth()->user()->id)
                ]);

            } else {

                return view('tickets.index', [
                    'tickets' => Ticket::where('email', auth()->user()->email)->get(),
                    'users'   => User::find(auth()->user()->id)
                ]);

            }

        }

    }

    public function create()
    {

        // Return a view that shows a form to create a ticket
        return view('tickets.create');

    }

    // Submit the support ticket
    public function store(Request $request)
    {

        // Validate input fields
        $inputFields = $request->validate([
            'subject'       => 'required',
            'description'   => 'required',
            'categories'    => 'required', 
            'priority'      => 'required',
            'agent_id'      => 'required'
        ]);

        // Default values
        $inputFields['user_id']     = auth()->id();
        $inputFields['name']        = auth()->user()->name;
        $inputFields['email']       = auth()->user()->email;
        $inputFields['agent_id']    = $request->agent_id;
        
        // Check if user uploaded attachment
        // If this is true, store the uploaded attachment
        if ($request->has('files'))
        {

            $inputFields['files']       = $request->file('files')->store('attachments', 'public');

        }

        // Check if the ticket was created successfully
        if (Ticket::create($inputFields))
        {

            // Setting values for relationship tables in an array
            $arr = array(
                'ticket_id'     => Ticket::latest('id')->first()->get('id'),
                'category_id'   => Category::where('id', $request->categories)->get(),
                'priority_id'   => Priority::where('id', $request->priority)->get(),
                'agent_id'      => Agent::where('id', $request->agent_id)->get(),
                'status_id'     => Status::where('id', 1)->get(),
            );

            foreach ($arr as $key => $value)
            {

                foreach ($value as $ticket)
                {

                    $tickets[$key] = $ticket->id;

                }

            }
            
            CategoryTicket::create($tickets);
            PriorityTicket::create($tickets);
            AgentTicket::create($tickets);
            StatusTicket::create($tickets);

        }

        return redirect('/');

    }

    // Show selected ticket
    public function show(Ticket $ticket)
    {

        return view('tickets.show', [
            'ticket' => $ticket,
            'users'   => User::find(auth()->id())
        ]);

    }

    // Show assigned tickets
    public function show_assigned()
    {
        

        return view('tickets.assigned', [
            'tickets' => Ticket::where('agent_id', auth()->id())->get(), 
            'users'   => User::find(auth()->id())
        ]);


    }

    // Show selected ticket
    public function destroy(Ticket $ticket)
    {

        if ($ticket->user_id == auth()->id())
        {

            $ticket->delete();
            return redirect('/');

        } else {

            abort('403', 'Invalid permissions');

        }

    }

    // Respond to ticket
    public function respond(Request $request, Ticket $ticket)
    {

        require base_path('vendor/autoload.php');

        $mail = new PHPMailer(true);

        try {

            // PHPMailer Config
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = '';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';                 //SMTP username
            $mail->Password   = '';                    //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('hi@stephenalonzo.dev', 'Stephen Alonzo');
            $mail->addAddress($request->ticket->email, $request->ticket->name);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'UpFront - Your ticket received a response!';
            $mail->Body    = $request->response;

            // Ticket response data handling
            $inputFields = $request->validate([
                'response'  => 'required'
            ]);
    
            $inputFields['user_id'] = auth()->id();

            if(Response::create($inputFields))
            {

                $arr = array(
                    'response_id'   => Response::where('response', $request->response)->get('id'),
                    'status_id'     => Status::where('title', 'In Progress')->get('id'),
                    'user_id'       => User::where('id', auth()->user()->id)->get('id'),
                    'ticket_id'     => Ticket::where('id', $request->ticket->id)->get('id')
                );
    
                foreach ($arr as $key => $value)
                {
                    
                    foreach ($value as $ticket)
                    {
                        
                        $statuses['status_id']  = StatusTicket::where('ticket_id', $request->ticket->id)->get('status_id');
                        
                        foreach ($statuses['status_id'] as $status)
                        {
                            
                            $tickets[$key]  = $ticket->id;
                            
                        }
                        
                    }
                    
                }
                
                $users = User::find(auth()->user()->id);
                
                foreach ($users->roles as $role)
                {
        
                    if ($status->status_id == 1 && $role->id == 1)
                    {
                    
                        $mail->send();

                        ResponseTicket::create($tickets);
                        StatusTicket::where('ticket_id', $request->ticket->id)->update(['status_id' => 2]);
        
                    } elseif ($status->status_id == 2 && $role->id == 1) {

                        $mail->send();
        
                        ResponseTicket::create($tickets);

                    } else {
        
                        ResponseTicket::create($tickets);
        
                    }

                }
                
            }
        
        } catch (Exception $e) {

            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            
        }
        
        return redirect('/tickets/'.$request->ticket->id);

    }

    // Close ticket
    public function close(Request $request, Ticket $ticket)
    {
        
        $ticket_id['status_id']     = Status::where('title', 'Closed')->get('id');

        foreach ($ticket_id['status_id'] as $ticket)
        {

            $statuses['status_id'] = StatusTicket::get('status_id');

            foreach ($statuses['status_id'] as $status)
            {

                if ($status->status_id == 2)
                {

                    $tickets['status_id'] = $ticket->id;
                    StatusTicket::where('ticket_id', $request->ticket->id)->update(['status_id' => 3]);

                }
                
            }

        }

        return redirect('/tickets/'.$request->ticket->id);

    }

}
