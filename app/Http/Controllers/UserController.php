<?php
namespace App\Http\Controllers;


use App\Cliente;
use App\Incidencia;
use App\Tecnico;
use App\Vehiculo;
use Illuminate\Http\Request;
use App\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /*$usuario=\App\Users::find(Auth::id());
        if($usuario) {
            $idusuario = $usuario->id;

            switch ($usuario->tipo) {
                case "1":

                    return view("estadisticas");
                    break;
                case "2":
                    return view("estadisticas");
                    break;
                case "3":
                    $tipoincidencia = $request->get('tipoincidencia');
                    $estado = $request->get('estado');
                    $cliente_id = $request->get('cliente_id');
                    $usuario_id = $request->get('usuario_id');
                    $tecnico_id = $request->get('tecnico_id');

                    $incidencia = Incidencia::orderBy('id', 'DESC')
                        ->tipoincidencia($tipoincidencia)
                        ->estado($estado)
                        ->cliente_id($cliente_id)
                        ->usuario_id($usuario_id)
                        ->tecnico_id($tecnico_id)
                        ->paginate(6);

                    $users = Users::all()->where('tipo', '=', 2);

                    $tecnicos = Tecnico::all();
                    $clientes = Cliente::all();

                    return view('incidencia', compact('incidencia', 'users', 'tecnicos', 'clientes'));
                    break;
                case "4":
                    $tecnicoid = Tecnico::select('id')->where('email', $usuario->email)->get();
                    $tecnico = Tecnico::find($tecnicoid)->first();
                    $incidenciaid = Incidencia::select('id')->where('estado', 1)->where('tecnico_id', $tecnico->id)->first();

                    if ($incidenciaid) {
                        $incidencia = Incidencia::find($incidenciaid->id);

                        $clienteid = Incidencia::select('cliente_id')->where('id', $incidenciaid->id)->first();
                        $cliente = Cliente::find($clienteid->cliente_id);

                        $tecnicoid = Incidencia::select('tecnico_id')->where('id', $incidenciaid->id)->first();
                        $tecnico = Tecnico::find($tecnicoid->tecnico_id);

                        $vehiculoid = Vehiculo::select('id')->where('cliente_id', $clienteid->cliente_id)->first();
                        $vehiculo = Vehiculo::find($vehiculoid->id);


                        return view('tecnico', [
                            "incidencia" => $incidencia,
                            "cliente" => $cliente,
                            "vehiculo" => $vehiculo,
                            "tecnico" => $tecnico

                        ]);
                    } else {
                        $misincidencias = Incidencia::select("*")->where("tecnico_id", $idusuario)->get();
                        return view('misIncidencias', ["misincidencias" => $misincidencias]);
                    }
                    break;
            }
        }
        else{
            return view('auth/login');
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function sendEmail(Request $request)
    {

        /*if(Auth::check()==false){
            return redirect('/login');
        }*/

        require '../vendor/autoload.php';

//Create a new PHPMailer instance
        $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
        $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 0;

//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "czoner3@gmail.com";

//Password to use for SMTP authentication
        $mail->Password = "12345Abcde";

//Set who the message is to be sent from
        $mail->setFrom('czoner3@gmail.com', 'Czone Group');

//Set an alternative reply-to address
        $mail->addReplyTo('julencastillo98@gmail.com', 'Julen Castillo');

//Set who the message is to be sent to
        $mail->addAddress('eric.munoz@ikasle.egibide.org', 'julen castillo');

//Set the subject line
        $mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
        $mail->msgHTML("Luego un smite?");

//Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

//Attach an image file
      //  $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            return redirect()->route('home');
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
        function save_mail($mail) {
            //You can change 'Sent Mail' to any other folder or tag
            $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

            //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
            $imapStream = imap_open($path, $mail->Username, $mail->Password);

            $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
            imap_close($imapStream);

            return $result;


        }
    }
}
