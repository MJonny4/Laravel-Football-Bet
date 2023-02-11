<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['nom', 'email', 'password', 'actiu', 'rol', 'token'];

    const create = [
        'nom' => ['required', 'max:255', 'string'],
        'email' => ['required', 'max:255', 'email', 'unique:usuaris,email'],
        'password' => ['required', 'min:4', 'max:255', 'confirmed'],
        'token' => ['required', 'min:4', 'max:255']
    ];


    public function sendEmail()
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'wickfire48@gmail.com';                     // SMTP username
            $mail->Password = 'cwjuvqjixntdmogq';                             // SMTP password
            $mail->SMTPSecure = 'ssl';       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('wickfire48@gmail.com', 'QuisIon');
            $mail->addAddress($this->email, $this->nom);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Activa el teu compte';
            $mail->Body = 'Hola, <b>' . $this->nom . '</b>.<br>Per activar el teu compte clica <a href="http://localhost/imlaravel/public/activar/' . $this->token . '">aquí</a>.';
            $mail->AltBody = 'Hola, ' . $this->nom . '. Per activar el teu compte clica aquí: http://localhost/imlaravel/public/activar/' . $this->token;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


}
