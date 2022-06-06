<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class DemoController extends Controller {
    public function MakeMigrationFile() {
        return Artisan::call('make:migration my_table');
    }

    public function RunMigration() {
        Artisan::call('migrate');
    }

    public function AppCacheClear() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        return Artisan::call('view:clear');
    }

    public function EnvConfig() {
//        $this->SetEnvValue('DB_DATABASE', 'laravel');
//        $this->SetEnvValue('ON_SIGNAL_API_KEY', '12345678910');
//        $this->SetEnvValue('SMS_API_KEY', '12345678910');
//        $this->SetEnvValue('SMS_API_USER', 'alamgir');
//        $this->SetEnvValue('SMS_API_PASS', '1234');
        $result = extension_loaded('BCMath');
        return $result;

    }

    public function SetEnvValue($envKey, $envValue) {
        $envFilePath = app()->environmentFilePath();
        $envStr = file_get_contents($envFilePath);
        $envStr .= "\n";

        $keyStartPosition = strpos($envStr, "{$envKey}=");
        $keyEndPosition = strpos($envStr, "\n", $keyStartPosition);
        $oldLine = substr($envStr, $keyStartPosition, $keyEndPosition - $keyStartPosition);


        if(!$keyStartPosition || !$keyEndPosition || !$oldLine) {
            $envStr .= "{$envKey}={$envValue}\n";
        } else{
            $envStr = str_replace($oldLine, "{$envKey}={$envValue}", $envStr);
        }

        $envStr = substr($envStr, 0, -1);
        $changeResult = file_put_contents($envFilePath, $envStr);
        if(!$changeResult) {
            return false;
        } else{
            return true;
        }
    }
}
