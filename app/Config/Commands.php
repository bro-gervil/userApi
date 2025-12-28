<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Email\Email;
use App\Models\NotificationModel;

class SendNotifications extends BaseCommand
{
    protected $group = 'Custom';
    protected $name = 'send:notifications';
    protected $description = 'Envoyer les notifications à partir de la base de données';
    public function run(array $params)
    {
        // Logique pour envoyer les notifications
        $this->sendNotifications();
    }
    private function sendNotifications()
    {
        // Chargement des données utilisateur à notifier
        $db = \Config\Database::connect();
        $builder = $db->table('notification');
        $notifications = $builder->get()->getResult();
        foreach ($notifications as $notification) {
            // Envoi par email
            $this->sendEmailNotification($notification);
        }
        CLI::write('Notifications envoyées.', 'green');
    }
    private function sendEmailNotification($notification)
    {
        $email = \Config\Services::email();
        $email->setTo($notification->email);
        $email->setSubject('Nouvelle Notification');
        $email->setMessage($notification->message);
        if ($email->send()) {
            CLI::write('Email envoyé à : ' . $notification->email, 'green');
        } else {
            CLI::write('Échec de l\'envoi de l\'email à : ' . $notification->email, 'red');
        }
    }
}
?>
// Ajoutez la commande cron suivante dans votre fichier crontab (en utilisant crontab -e):
// 0 * * * * php /chemin/vers/votre/application/public/index.php send:notifications