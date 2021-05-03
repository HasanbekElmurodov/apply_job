<?php
namespace app\commands;
use Yii;
use yii\console\Controller;

class EmailController extends Controller{
    public function actionSend()
    {
//        echo "asffas";
//        die();
        Yii::$app->mailer->compose()
            ->setFrom('hasanbek.elmurodov@gmail.com')
            ->setTo('Njuk97@gmail.com')
            ->setSubject('Ishladi')
            ->setHtmlBody('
                        <p>Assalomu alaykum, hurmatli <b>' . 'Nuriddin Jalilov' . '</b>.</p>
                        ')
//            ->attach(Yii::getAlias('@webroot/email/biyc_uz.pdf'))
            ->send();
    }
}