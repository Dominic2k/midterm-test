<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
class CreateTable extends Controller
{
    public function createTable (){
        if(!Schema::hasTable('addresses')){
                Schema::create('addresses',function($table){
                    $table->integer('id')->unsigned()->notNullable();
                    $table->string('street')->nullable();
                    $table->string('country')->collation('utf8_unicode_ci')->notNullable();
                    $table->integer('icon_id')->nullable();
                    $table->integer('monster_id')->notNullable();
                });
        }
        if(!Schema::hasTable('articles')){
            Schema::create('articles',function($table){
                $table->integer('id')->unsigned()->notNullable();
                $table->integer('category_id')->unsigned()->notNullable();
                $table->string('title', 255)->collation('utf8_unicode_ci')->notNullable();
                $table->string('slug', 255)->collation('utf8_unicode_ci')->notNullable()->default('');
                $table->text('content')->collation('utf8_unicode_ci')->notNullable();
                $table->string('image', 255)->collation('utf8_unicode_ci')->nullable();
                $table->enum('status', ['PUBLISHED', 'DRAFT'])->collation('utf8_unicode_ci')->default('PUBLISHED');
                $table->date('date')->notNullable();
                $table->tinyInteger('featured')->default(0);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
            });
        }
        if(!Schema::hasTable('bills')){
            Schema::create('bills',function($table){
                $table->integer('id')->unsigned()->notNullable();
                $table->integer('id_customer')->nullable();
                $table->date('date_order')->nullable();
                $table->float('total')->nullable()->comment('tổng tiền');
                $table->string('payment', 200)->nullable()->comment('hình thức thanh toán');
                $table->string('note', 500)->nullable();
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            });
        }
        if(!Schema::hasTable('bill_detail' )){
            Schema::create('bill_detail',function($table){
                $table->integer('id')->unsigned()->notNullable();
                $table->integer('id_bill')->notNullable();
                $table->integer('id_product')->notNullable();
                $table->integer('quantity')->comment('số lượng');
                $table->double('unit_price');
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }// mediumBlob
        if(!Schema::hasTable('comments')){
            Schema::create('comments',function($table){
                $table->increments('id');
                $table->string('username');
                $table->text('comment');
                $table->integer('id_product')->unsigned();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('customer')){
            Schema::create('customer',function($table){
                $table->increments('id');
                $table->string('name', 100);
                $table->string('gender', 10);
                $table->string('email', 50);
                $table->string('address', 100);
                $table->string('phone_number', 20);
                $table->string('note', 200);
                $table->timestamp('created_at')->useCurrent()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->useCurrent()->default(DB::raw('CURRENT_TIMESTAMP'));
            });
        }
        if(!Schema::hasTable('failed_jobs')){
            Schema::create('failed_jobs',function($table){
                $table->bigIncrements('id')->unsigned();
                $table->text('connection');
                $table->text('queue');
                $table->longText('payload');
                $table->longText('exception');
                $table->timestamp('failed_at')->useCurrent();
            });
        }
        if(!Schema::hasTable('icons')){
            Schema::create('icons',function($table){
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('icon', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('menu_items')){
            Schema::create('menu_items',function($table){
                $table->increments('id');
                $table->string('name', 100);
                $table->string('type', 20)->nullable();
                $table->string('link', 255)->nullable();
                $table->unsignedInteger('page_id')->nullable();
                $table->unsignedInteger('parent_id')->nullable();
                $table->unsignedInteger('lft')->nullable();
                $table->unsignedInteger('rgt')->nullable();
                $table->unsignedInteger('depth')->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
            });
        }
        if(!Schema::hasTable('migrations')){
            Schema::create('migrations',function($table){
                $table->increments('id');
                $table->string('migration', 191);
                $table->integer('batch');
            });
        }
        if(!Schema::hasTable('model_has_permissions')){
            Schema::create('model_has_permissions',function($table){
                $table->unsignedInteger('permission_id');
                $table->string('model_type', 255);
                $table->unsignedBigInteger('model_id');
            });
        }
        if(!Schema::hasTable('model_has_roles')){
            Schema::create('model_has_roles',function($table){
                $table->unsignedInteger('role_id');
                $table->string('model_type', 255);
                $table->unsignedBigInteger('model_id');
            });
        }
        if(!Schema::hasTable('monsters')){
            Schema::create('monsters',function($table){
                $table->unsignedInteger('id')->primary();
                $table->string('address', 255)->nullable();
                $table->string('browse', 255)->nullable();
                $table->boolean('checkbox')->nullable();
                $table->text('wysiwyg')->nullable();
                $table->string('color', 255)->nullable();
                $table->string('color_picker', 255)->nullable();
                $table->date('date')->nullable();
                $table->date('date_picker')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->dateTime('datetime')->nullable();
                $table->dateTime('datetime_picker')->nullable();
                $table->string('email', 255)->nullable();
                $table->integer('hidden')->nullable();
                $table->string('icon_picker', 255)->nullable();
                $table->string('image', 255)->nullable();
                $table->string('month', 255)->nullable();
                $table->integer('number')->nullable();
                $table->double('float', 8, 2)->nullable();
                $table->string('password', 255)->nullable();
                $table->string('radio', 255)->nullable();
                $table->string('range', 255)->nullable();
                $table->integer('select')->nullable();
                $table->string('select_from_array', 255)->nullable();
                $table->integer('select2')->nullable();
                $table->string('select2_from_ajax', 255)->nullable();
                $table->string('select2_from_array', 255)->nullable();
                $table->text('simplemde')->nullable();
                $table->text('summernote')->nullable();
                $table->text('table')->nullable();
                $table->text('textarea')->nullable();
                $table->string('text', 255);
                $table->text('tinymce')->nullable();
                $table->string('upload', 255)->nullable();
                $table->string('upload_multiple', 255)->nullable();
                $table->string('url', 255)->nullable();
                $table->text('video')->nullable();
                $table->string('week', 255)->nullable();
                $table->text('extras')->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->longText('base64_image')->nullable();
            });
        }
        if(!Schema::hasTable('monster_article')){
            Schema::create('monster_article',function($table){
                $table->unsignedInteger('id')->autoIncrement();
                $table->unsignedInteger('monster_id');
                $table->unsignedInteger('article_id');
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
            });
        }
        if(!Schema::hasTable('monster_category')){
            Schema::create('monster_category',function($table){
                $table->unsignedInteger('id')->autoIncrement();
                $table->unsignedInteger('monster_id');
                $table->unsignedInteger('category_id');
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
            });
        }
        if(!Schema::hasTable('monster_tag')){
            Schema::create('monster_tag',function($table){
                $table->increments('id'); // Tạo cột 'id' tự động auto-increment và là khóa chính
                $table->unsignedInteger('monster_id'); // Tạo cột 'monster_id' kiểu unsigned integer
                $table->unsignedInteger('tag_id'); // Tạo cột 'tag_id' kiểu unsigned integer
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->softDeletes();
            });
        }
        if(!Schema::hasTable('news')){
            Schema::create('news',function($table){
                $table->integer('id', 10)->primary();
                $table->string('title', 200)->comment('tiêu đề');
                $table->text('content')->comment('nội dung');
                $table->string('image', 100)->comment('hình');
                $table->timestamp('create_at')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('pages')){
            Schema::create('pages',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('template');
                $table->string('name');
                $table->string('title');
                $table->string('slug');
                $table->text('content')->nullable();
                $table->text('extras')->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
            });
        }
        if(!Schema::hasTable('password_resets')){
            Schema::create('password_resets',function($table){
                $table->string('email', 255);
                $table->string('token', 255);
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
            });
        }
        if(!Schema::hasTable('permissions')){
            Schema::create('permissions',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('name');
                $table->string('guard_name');
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('postalboxes')){
            Schema::create('postalboxes',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('postal_name', 255)->nullable();
                $table->integer('monster_id')->unsigned();
            });
        }
        if(!Schema::hasTable('products')){
            Schema::create('products',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('name', 100)->nullable();
                $table->unsignedInteger('id_type')->nullable();
                $table->text('description')->nullable();
                $table->float('unit_price')->nullable();
                $table->float('promotion_price')->nullable();
                $table->string('image', 255)->nullable();
                $table->string('unit', 255)->nullable();
                $table->tinyInteger('new')->default(0);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('revisions')){
            Schema::create('revisions',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('revisionable_type', 255);
                $table->integer('revisionable_id')->unsigned();
                $table->integer('user_id')->unsigned()->nullable();
                $table->string('key', 255);
                $table->text('old_value')->nullable();
                $table->text('new_value')->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('roles')){
            Schema::create('roles',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('name', 255);
                $table->string('guard_name', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('role_has_permissions')){
            Schema::create('role_has_permissions',function($table){
                $table->integer('permission_id')->unsigned();
                $table->integer('role_id')->unsigned();
            });
        }
        if(!Schema::hasTable('settings')){
            Schema::create('settings',function($table){
                $table->increments('id'); // Chỉ giữ auto_increment cho id
                $table->string('key', 255); // Tạo cột key kiểu string(255)
                $table->string('name', 255); // Tạo cột name kiểu string(255)
                $table->string('description', 255)->nullable();
                $table->string('value', 255)->nullable(); // Tạo cột value kiểu string(255) và có thể null
                $table->text('field'); // Tạo cột field kiểu text
                $table->tinyInteger('active'); // Xóa auto_increment khỏi active
                $table->timestamp('created_at')->nullable(); // Tạo cột created_at kiểu timestamp và có thể null
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('slide')){
            Schema::create('slide',function($table){
                $table->integer('id', 11)->primary();
                $table->string('link', 100);
                $table->string('image', 100);
            });
        }
        if(!Schema::hasTable('tags')){
            Schema::create('tags',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('name', 255);
                $table->string('slug', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
            });
        }// interger
        if(!Schema::hasTable('type_products')){
            Schema::create('type_products',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('name', 100);
                $table->text('description');
                $table->string('image', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('users')){
            Schema::create('users',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->string('name', 255);
                $table->string('email', 255)->unique();
                $table->string('password', 255);
                $table->string('remember_token', 100)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
        if(!Schema::hasTable('wishlists')){
            Schema::create('wishlists',function($table){
                $table->integer('id', 10)->unsigned()->primary();
                $table->integer('id_user')->unsigned();
                $table->integer('id_product')->unsigned();
                $table->integer('quantity')->default(1);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }else{

        }
        return "ok,tao roi";

    }

}
