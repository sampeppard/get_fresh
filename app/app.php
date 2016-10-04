<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $server = "mysql:host=localhost:8889;dbname=hair_salon";
    $username = "root";
    $password = "root";
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("index.html.twig", array("stylists" => Stylist::getAll()));
    });

    $app->post("/", function() use ($app) {
        $new_stylist = new Stylist($_POST["name"]);
        $new_stylist->save();
        return $app["twig"]->render("index.html.twig", array("stylists" => Stylist::getAll()));
    });

    $app->post("/delete_all", function() use ($app) {
        Stylist::deleteAll();
        return $app["twig"]->render("delete_all.html.twig");
    });

    $app->get("/stylists/{id}", function($id) use ($app) {
        $selected_stylist = Stylist::find($id);
        return $app["twig"]->render("stylist.html.twig", array("stylist" => $selected_stylist, "clients" => $selected_stylist->getClients()));
    });

    $app->get("/stylists/{id}/edit", function($id) use ($app) {
        $selected_stylist = Stylist::find($id);
        return $app["twig"]->render("edit_stylist.html.twig", array("stylist" => $selected_stylist));
    });

    $app->patch("/stylists/{id}", function($id) use ($app) {
        $new_name = $_POST["name"];
        $updated_stylist = Stylist::find($id);
        $updated_stylist->update($new_name);
        return $app["twig"]->render("stylist.html.twig", array("stylist" => $updated_stylist, "clients" => $updated_stylist->getClients()));
    });

    $app->post("/clients", function() use ($app) {
        $stylist_name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($stylist_name, $stylist_id, $id = null);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app["twig"]->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    return $app;

?>
