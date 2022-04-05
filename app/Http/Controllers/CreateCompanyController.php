<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CreateCompanyController extends Controller
{
    public function createCompany(Request $request) {
        $companyId = $request->input('id');

        $domain = $request->input('domain');
        try{
            $this->createEnvFile($domain, $companyId);
            $this->createTables($request);
            $result = array("status" => "success", "desc" => "Новый файл конфигураций и БД успешно созданы");
        } catch (\Exception $e) {
            $result = array("status" => "error", "desc" => "Произошла ошибка при создании файла конфигурации или БД");
        }

        return $result;
    }

    private function createTables($request) {
        $companyId = $request->input('id');
        $userId = $request->input('user_id');
        $this->createCategoryTable($companyId);
        $this->createProductTable($companyId);
        $this->createCompanyTable($request);
        $this->createPageTable($companyId);
        $this->createNewsTable($companyId);
        $this->createReviewTable($companyId);
        $this->createGalleryTable($companyId);
        $this->createProductChange($companyId);
        $this->createSessionTable($companyId);
        $this->createUserRoleTable($companyId, $userId);
    }

    private function createCategoryTable($companyId) {
        Schema::create($companyId.'_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->string('slug', 250);
            $table->integer('parent_id')->nullable();
            $table->string('description', 800)->nullable();
            $table->string('photo', 500)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    private function createProductTable($companyId) {
        Schema::create($companyId.'_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('prod_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('rubric_id')->nullable();
            $table->string('up_text', 300)->nullable();
            $table->text('down_text')->nullable();
            $table->string('price', 100)->nullable();
            $table->json('fields')->nullable();
            $table->integer('units')->nullable();
            $table->integer('view')->nullable();
            $table->string('photo')->nullable();
            $table->integer('priority')->nullable();
            $table->string('stock')->nullable();
            $table->integer('rating')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });

        Log::info("createProductTable created");
    }

    private function createCompanyTable($request) {
        $companyId = $request->input('id');
        $companyTitle = $request->input('title');
        $companyDomain = $request->input('domain');
        $companyCityid = $request->input('city_id');
        $companyAddress = $request->input('address');
        $companyPhone = $request->input('phone');
        $companyEmail = $request->input('email');
        $companyWorktime = $request->input('work_time');
        Schema::create($companyId.'_companies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('domain')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->float('raiting')->nullable();
            $table->string('work_time')->nullable();
            $table->string('data_coord')->nullable();
            $table->timestamps();
        });
        DB::table($companyId.'_companies')->insert([
            "title" => $companyTitle,
            "domain" => $companyDomain,
            "city_id" => $companyCityid,
            "address" => $companyAddress,
            "phone" => $companyPhone,
            "email" => $companyEmail,
            "work_time" => $companyWorktime,
        ]);

        Log::info("createCompanyTable created");

    }

    private function createPageTable($companyId) {
        Schema::create($companyId.'_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });

        Log::info("createPageTable created");
    }

    private function createNewsTable($companyId) {
        Schema::create($companyId.'_news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('description')->nullable();
            $table->string('photo', 1000)->nullable();
            $table->integer('status')->nullable();
            $table->date('date')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });

        Log::info("createNewsTable created");
    }

    private function createReviewTable($companyId) {
        Schema::create($companyId.'_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->nullable();
            $table->text('description')->nullable();
            $table->integer('delivery')->nullable();
            $table->integer('quality')->nullable();
            $table->integer('price')->nullable();
            $table->integer('view')->nullable();
            $table->float('rating')->nullable();
            $table->integer('prod_id')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });

        Log::info("createReviewTable created");
    }

    private function createGalleryTable($companyId) {
        Schema::create($companyId.'_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('photo', 500);
            $table->string('description', 1000)->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Log::info("createGalleryTable created");
    }

    private function createProductChange($companyId){
        Schema::create($companyId.'_product_changes', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('change_type');
            $table->integer('status')->nullable();
            $table->timestamps();
        });

        Log::info("createProductChange created");
    }

    private function createSessionTable($companyId) {
        Schema::create($companyId.'_sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity')->index();
        });

        Log::info("createSessionTable created");
    }

    private function createUserRoleTable($companyId, $user_id) {
        Schema::create($companyId.'_user_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('role_id');
            $table->timestamps();
        });
        DB::table($companyId.'_user_roles')->insert([
            "user_id" => $user_id,
            "role_id" => 4
        ]);

        Log::info($user_id." - createUserRoleTable created");
    }

    private function createSettingsTable($companyId, $user_id) {
        Schema::create($companyId.'_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });
        DB::table($companyId.'_settings')->insert([
            ["name" => "banner_available", "value" => 1],
            ["name" => "background", "value" => 0],
            ["name" => "menu", "value" => 0],
            ["name" => "banner_items", "value" => 0],
            ["name" => "template", "value" => "main-template"],
            ["name" => "popular_categories", "value" => 1],
            ["name" => "sales_products", "value" => 1],
            ["name" => "faq_block", "value" => 0],
            ["name" => "faq_block", "value" => 1],
            ["name" => "review_block", "value" => 0],
            ["name" => "menu_about", "value" => 1],
            ["name" => "menu_contants", "value" => 1],
            ["name" => "menu_catalog", "value" => 1],
            ["name" => "menu_news", "value" => 1],
            ["name" => "menu_sales", "value" => 1],
            ["name" => "menu_reviews", "value" => 1],
            ["name" => "city", "value" => 0]
        ]);

        Log::info($user_id." - createUserRoleTable created");
    }

    private function createEnvFile($domain, $companyId){
        $dir = "site/";
        $domain = str_replace(array("http://", "https://", "/"), "", $domain);
        $text = $this->getEnvFileText($domain, $companyId);
        $path = public_path('../site/');
        $file = fopen($path.$domain, "w");
        fwrite($file, $text);
        fclose($file);
    }


    private function getEnvFileText($domain, $companyId) {
        return $text = "APP_NAME=". $domain ."
APP_ENV=local
APP_KEY=base64:YvfONjxzne/n9/LM+YiIX8J3yiv/k8EzHKBdJYJImrY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=store.portal
DB_USERNAME=root
DB_PASSWORD=
DB_PREFIX=". $companyId ."_

DB_CONNECTION_AUTH=mysql
DB_HOST_AUTH=127.0.0.1
DB_PORT_AUTH=3306
DB_DATABASE_AUTH=auth.portal
DB_USERNAME_AUTH=root
DB_PASSWORD_AUTH=

DB_CONNECTION_PORTAL=mysql
DB_HOST_PORTAL=127.0.0.1
DB_PORT_PORTAL=3306
DB_DATABASE_PORTAL=portal
DB_USERNAME_PORTAL=root
DB_PASSWORD_PORTAL=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

PORTAL_AUTH=http://authportal.loc
PORTAL_IMG=http://img.portal.loc
PORTAL=http://portal.loc";
    }

}
