<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/8/20
 * Time: 18:02
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeployController extends Controller
{

    public function deploy(Request $request)
    {
        $commands = ['cd /var/www/kuainiao', 'git pull'];

        $signature = $request->header('X-Hub-Signature');


        $payload = file_get_contents('php://input');

        if ($this->isFromGithub($payload, $signature)) {
   /*         foreach ($commands as $command) {
                 $a = shell_exec($command);


                Storage::put(
                    $command,
                   $a
                );            }*/

            shell_exec('cd /var/www/kuainiao');
            shell_exec('git pull');
            http_response_code(200);
        } else {
            abort(403);
        }
    }
    private function isFromGithub($payload, $signature)
    {
        return 'sha1=' . hash_hmac('sha1', $payload, env('WECHAT_SECRET'), false) === $signature;
    }
}

