<?php
// Routes

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$app->post('/createNewUser', function ($request, $response, $args) {
    // assumes fields aren't left blank and contain proper information from client side
    if (isset($_POST['submit']))
    {
        // retrieve user information from html page
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        // protect against 1st order sql injection using stripslashes and parameterized queries
        $username = stripslashes($username);
        $password = stripslashes($password);
        $sex = stripslashes($sex);
        $email = stripslashes($email);
        // hash and salt password using bcrypt
        $password = password_hash($password, PASSWORD_BCRYPT);
        try
        {
            // connect to pocketgains database
            $db = $this->user;
            if ($db)
            {
                // check if username is taken
                $query = $db->prepare("SELECT username from User WHERE username = :username LIMIT 1");
                $query->execute(array('username' => $username));
                // username is not in use
                // need to figure out the way we want to display errors to the user
                if ($query->rowCount() == 0)
                {
                    // check if email is already in use
                    $query = $db->prepare("SELECT email from User WHERE email = :email LIMIT 1");
                    $query->execute(array('email' => $email));
                    // email is also not in use
                    if ($query->rowCount() == 0)
                    {
                        // insert user info into db
                        $query = $db->prepare("INSERT into User (username, password, email, sex)
                            values (:username, :password, :email, :sex)");
                        $query->execute(array('username' => $username, 'password' =>$password, 'email' => $email, 'sex' => $sex));
                    }
                    else
                        throw new PDOException("username or email already in use");
                }
                else
                    throw new PDOException("username or email already in use");
            }
            else
                throw new PDOException("could not connect to db");
        }
        catch (PDOException $e)
        {
            echo '{"error":{"text":' . $e->getMessage() .'}}';
        }
    }
});

$app->post('/login', function ($request, $response, $args) {
    // assumes fields aren't blank from client side
    // also assumes that the user has not logged in recently (session expired)
    if (isset($_POST['login']))
    {
        // retreive user information from html page
        $username = $_POST['username'];
        $password = $_POST['password'];
        // protect against sql injection using stripslashes and parameterized queries
        $username = stripslashes($username);
        $password = stripslashes($password);
        // connect to pocketgains db
        $db = $this->user;
        try
        {
            if ($db)
            {
                // grab username and password from db
                $query = $db->prepare("SELECT username, password FROM User WHERE username = :username
                    LIMIT 1");
                $query->execute(array('username' => $username));
                // ensures one result is returned
                if ($query->rowCount() == 1)
                {
                    //retrieve query results
                    $result = $query->fetchAll();
                    $hash = "";
                    foreach($result as $row)
                        $hash = $row['password'];
                    // verify passwords match
                    if (password_verify($password, $hash))
                    {
                        // create a new session for the user and store session id in db
                        session_start();
                        $session_id = session_id();
                        // assign the username to the session
                        $_SESSION['username'] = $username;
                        $query = $db->prepare("UPDATE User SET session_id = :session_id
                            WHERE username = :username");
                        $query->execute(array('session_id' => $session_id, 'username' => $username));
                        // go to user dashboard
                        return $this->renderer->render($response, 'dashboard.html', $args);
                    }
                    else
                        throw new PDOException("invalid username or password");
                }
                else
                    throw new PDOException("invalid username or password");
            }
            else
                throw new PDOException("could not connect to db");
        }
        catch (PDOException $e)
        {
            echo '{"error":{"text":' . $e->getMessage() .'}}';
        }
    }
});

$app->get('/inventory',
	function ($request, $response, $args) {
    try {
        $db = $this->user;
 
        //FIX SQL STATEMENT FOR NEWLY UPDATED DB
        $query = $db->prepare(
            'SELECT inv_id, inv_name 
                FROM Inven;');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_ASSOC);
 
        if($arr) {
            return $response->write(json_encode($arr));
            $db = null;
        } 
        else 
        {
            throw new PDOException('No records found.');
        }
 
    } 
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

$app->get('/inventory/{inv_id}',
	function ($request, $response, $args) {
    try {
        $db = $this->user;

        $query = $db->prepare(
        	'SELECT *
        		FROM Inven 
        		WHERE inv_id = :inv_id'
			)

        $query->execute(
        	array(
                'inv_id' => $args['inv_id']
                )
            );

        foreach($db->query('SELECT * FROM Inven WHERE inv_id = :inv_id) as $row') {
            printf('<img src = "%s" /<br/>', $row['url']);

		return;
    } 
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

$app->post('/addNewInventory',
	function ($request, $response, $args) {
        $db = $this->user;
        $parms = $request->getParsedBody();
        $uid = $parms['inv_id'];
        $aid = $parms['inv_pic'];
        $query = $db->prepare("INSERT INTO Inven (inv_name, inv_pic)
                    VALUES ($uid, $aid)");
        $query->bindParam(':inv', $uid);
        $query->bindParam(':inv_pic', $aid);
        $query->execute();
});

$app->delete('/deleteInven{inv_id}',
	function ($request, $response, $args) {
        $db = $this->user;
        $parms = $request->getParsedBody();
        $uid = $parms['inv_id'];
        $query = $db->prepare("DELETE * FROM Inven
                    WHERE  inv_id = :inv_id");
        $query->bindParam(':inv', $uid);
        $query->execute();
});


?>