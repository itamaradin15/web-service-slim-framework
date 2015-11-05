<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Blade(),
    'templates.path' => './templates',
));

    /*$pdo = new PDO('mysql:host=mysql.hostinger.es;dbname=u844641889_profi;charset=utf8','u844641889_adin','lMOJm10Wb9');*/
    //$pdo = new PDO('mysql:host=localhost;dbname=profiles;charset=utf8','adin','canaima');
    $pdo = new PDO('mysql://$OPENSHIFT_MYSQL_DB_HOST;dbname=profiles;charset=utf8','adminPHMgZhG','st3AHdH-9JpQ');

    $db = new NotORM($pdo);

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);

$autentication  = function()
{

};

$app->get('/', function() use ($app,$db) {
    //$app->render('home');
    $usuario = $db->users()->where("id" AND "user",'2','keila')->fetch();
    if (!$usuario)
    {
        echo "no eres user";

    }
    else {
        echo "genial";
        echo "<br>";
        echo $usuario['user']." ".$usuario['pass'];
    }
    $table = $db->users()->where("id > ? AND user < ?", "1", "adin");
    echo $table['user'];
});

$app->get('/home', function() use ($app) {
    $app->render('home');
})->name('home');


$app->get('/list', function() use ($app,$db)
{
	$date['usuarios'] =$db->profiles();
    $app->render('list',$date);
})->name('list');

    $app->get('/new/profile',function() use($app)
      {
            $app->render('new');
      });

    $app->post('/new/profile',function() use($app,$db)
        {
            $request = $app->request;
            $nombre = $request->post('nombre');
            $apellido = $request->post('apellido');
            $correo = $request->post('correo');
            $d = date("d");
            $m =date("m");
            $y =date("Y");
            $fecha = $y."-".$m."-".$d;

            //insert data
        $insertado=$db->profiles()->insert(['nombre' => $nombre,'apellido' => $apellido,'correo' => $correo, 'fecha' => $fecha]);
        if ($insertado)
        {
            $app->flash('message','usuario insertado correctamente');
            $app->response->headers->set("Content-type","application/json");
            $app->response->status(200);
            $app->response->body(json_encode(["resp" => "dato insertado"]));

        }
        else
        {
            $app->flash('errors','hay errors al insertar usuario');
            $app->response->headers->set("Content-type","application/json");
            $app->response->status(500);
            $app->response->body(json_encode(["resp" => "error al insertar datos"]));
        }
        $app->redirect('../list');
    });



        $app->get('/edit/:id/profile', function($id=0) use($app,$db)
	    {
        $id = (int)$id;
        //search user by id
        if ($usuario = $db->profiles->where('id',$id)->fetch())
        {
            $resul =
            [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'apellido' => $usuario['apellido'],
                'correo' => $usuario['correo']
            ];
        }

        if (!$resul)
        {
            $app->halt(404,"user not found");
        }
        $app->render('edit',$resul);
    })->name('edituser');

    $app->post('/edit/:id/profile', function($id) use($app,$db)
        {
            $id=(int)$id;
            $request = $app->request;
            $nombre= $request->post('nombre');
            $apellido= $request->post('apellido');
            $correo= $request->post('correo');

            //update user
            $usuario = $db->profiles()->where('id',$id)->fetch();
            if ($usuario)
            {
                $usuario->update(["nombre" => $nombre,"apellido"=> $apellido,"correo" => $correo]);
            }

            $app->flash("message","user  update successfully");
            $redirecction = $app->urlFor('edituser',["id" => $id]);
            $app->redirect($redirecction);
        });

    $app->get('/del/:id/profile', function($id) use($app,$db)
    {
        $id = (int)$id;
        $usuario = $db->profiles()->where('id',$id)->fetch();
            if ($usuario)
            {
                $usuario->delete();
            }
        $app->redirect($app->urlFor('list'));
    });

$app->get('/api', function() use($app,$db)
    {
        $date['usuarios'] =$db->profiles();
        echo json_encode($date);
    });
$app->get('/api/:id', function($id) use($app,$db)
    {
         $usuario = $db->profiles()->where('id',$id)->fetch();
         if (!$usuario)
         {
            $error = ["error" => "id n: $id no found"];
            echo json_encode($error);
         }
         else
         {
            echo json_encode($usuario);
         }
    });

    $app->post('/api/new/profile',function() use($app,$db)
        {
            $request = $app->request;
            $nombre = $request->post('nombre');
            $apellido = $request->post('apellido');
            $correo = $request->post('correo');
            $d = date("d");
            $m =date("m");
            $y =date("Y");
            $fecha = $y."-".$m."-".$d;

        //insert data
        $insertado=$db->profiles()->insert(['nombre' => $nombre,'apellido' => $apellido,'correo' => $correo, 'fecha' => $fecha]);
        if ($insertado)
        {
            $app->flash('message','usuario insertado correctamente');
            $app->response->headers->set("Content-type","application/json");
            $app->response->status(200);
            $app->response->body(json_encode(["resp" => "dato insertado"]));

        }
        else
        {
            $app->flash('errors','hay errors al insertar usuario');
            $app->response->headers->set("Content-type","application/json");
            $app->response->status(500);
            $app->response->body(json_encode(["resp" => "error al insertar datos"]));
        }
    });

$app->run();