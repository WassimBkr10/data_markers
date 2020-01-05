<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>


<!DOCTYPE html>
<html>
	<head>
		 	<meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">

          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>Register</title>
		

         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		 
         <!-- JQURY -->

         <!-- //////////////////////////// -->
		<link href='accountsMang/style.css' rel='stylesheet' type='text/css'>


		 
		 
		 


          <link rel="stylesheet" href="scss/main.css">
         <link rel="stylesheet" href="scss/skin.css">

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

          <script src="script/index.js"></script>
		 
	</head>
	<style>
	* {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  	font-size: 16px;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
body {

  	margin: 0;
}
button {
  border: none;
  padding: 10px;
  border-radius: 5px;
}

.register {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 100px auto;
}
.register h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.register form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.register form label {

  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
 	height: 50px;
  	background-color: #3274d6;
  	color: #ffffff;
}
.register form input[type="password"], .register form input[type="text"], .register form input[type="email"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.register form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
  	margin-top: 20px;
  	background-color: #3274d6;
 	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.register form input[type="submit"]:hover {
	background-color: #2868c7;
  	transition: background-color 0.2s;
}
table.blueTable {
  border: 1px solid #1C6EA4;
  
  background-color: #;
  width: 100%;
  text-align: center;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #ffffff;
  padding: 3px 2px;
  
}
table.blueTable tbody td {
  font-size: 13px;
  
}
table.blueTable tr:nth-child(even) {

  background: #;
  
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  text-align: center;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
th,
td {
  height: 50px;
  vertical-align: center;
  border: 1px solid black;
}
</style>
	<body id="wrapper" >
	
	<div class=" background-dark  ">
	 <header>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">

                        <a class="navbar-brand" href="#">
                            <h1>graphicom</h1><span>gis & Software</span></a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="index_Style_DELEG.php">Back</a></li>
							<li><a href="save/Save.php">Save Files</a></li>
                            <li><a href="logout.php">Logout</a></li>
							<li><a ><p style="color:#00994d; opacity: 0.7;">WELCOME, <?=$_SESSION['name']?>!</p></a></li> 

                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </nav>
    </header>
	
	<div class="section hero text-center" style="height:100%; top:10px;">

				   <div class="container" style="height:100%;">
  			             <div class="row">
  			        	   <div class="col-md-12">
                              <h2 class=" btn-primary slide">Add Accounts</h2>

                             </div>


			
			     <br> <br> <br> <br>
		          <div class="register">
		         	   <h1>REGISTER</h1>
		          	      <form action="register.php" method="post" autocomplete="off">
			          	     <label for="username">
			     		      <i class="fas fa-user"></i>
			        	      </label>
			        	      <input type="text" name="username" placeholder="Username" id="username" required>
			        	      <label for="password">
				            	<i class="fas fa-lock"></i>
				              </label>
			        	     <input type="password" name="password" placeholder="Password" id="password" required>
				             <label for="email">
			 	             <i class="fas fa-envelope"></i>
			        	     </label>
			        	     <input type="email" name="email" placeholder="Email" id="email" required>

			         	     <div align="center"><br>
			        	     <h3> Role : </h3>
                              <input type="radio" name="Role" value="editor" checked> Editor<br>
                             <input type="radio" name="Role" value="admin" > Administrator<br>
                              <hr>
                             </div>
				
				
				              <input type="submit" value="Register">
			               </form> 
		              </div> 
			   
			   
			   

			   
		<br> <br> 
		
		        <div class="section hero text-center  dark-bg " style="top:-150px;">
		            <div class="background-image" style="background: no-repeat center center; background-size: cover; opacity: .2; "></div>


                        <div class="container" style="height:10%;">
  			             <div class="row">
  			        	   <div class="col-md-12">

  						<h2 class=" btn-primary slide">Accounts List</h2>
  						<p class="lead"></p>
  						
	                     <table class="blueTable">
                          <thead>
                              <th>ID</th>
                              <th>Username</th>
                        	  <th>Email</th>
                              <th>Role</th>
	                          <th>Supprimer</th>
                          </thead>
                         <tbody>

                              <?php include_once("accountsMang/filesLogic.php");
                                include_once("accountsMang/dbConfig.php");  
                                foreach ($files as $file): ?>
                                  <tr>
                                     <td><?php echo $file['id']; ?></td>
                                     <td><?php echo $file['username']; ?></td>
	                                 <td><?php echo $file['email']; ?></td>
									 <td><?php echo $file['Role']; ?></td>
	                                 <td><a href="supprime_accounts.php?id=<?php echo $file['id'] ?>" onclick = "if(window.confirm('Are you sure you want to delete this?')){return true;}else{return false;}"  class="btn btn-primary slide" style="   height: 100%; border-radius: 5px; font-size: 11px;">supprimer</a></td>
                                  </tr>
                               <?php endforeach;?>

                          </tbody>
                         </table>
						 
	                            <br>
	                           <?php    
	                           include_once("accountsMang/dbConfig.php");	
                               $requete = "SELECT * FROM accounts ORDER BY id DESC"; 
	                           $resultat = mysqli_query($db, $requete);
                               // <!-- ETAT  -->
	
	                            if(isset($_GET["etat"])){
		                 	    if($_GET["etat"]=="success")	echo "<p style='color: green;'> succès</p>";
		                     	else if($_GET["etat"]=='erreur')
		            		    echo "<p style='color: red;'>erreur</p>";
	                    	    } 
	                 	        ?>						
								
                               	<!-- Retour vers la page d'accueil & Nombre total :  -->
	
	
	                           <hr/><p><b>Nombre total : </b> <?php echo mysqli_num_rows($resultat)?>  Accounts.</p>
	                            <?  php mysqli_close($db);	//Fermer la connexion ?>
	                                <hr/><p> </p>					

                           
                        </div>
  					</div>
  				</div>
  			</div>
  		</div>	
	</div>	
		
</div>
		
		    <div id="panel">
        <div id="panel-admin">
            <div class="panel-admin-box">
                <div id="tootlbar_colors">
                    <button class="color" style="background-color:#1abac8;" onclick="mytheme(0)"></button>
                    <button class="color" style="background-color:#ff8a00;" onclick="mytheme(1)"> </button>
                    <button class="color" style="background-color:#b4de50;" onclick="mytheme(2)"> </button>
                    <button class="color" style="background-color:#e54e53;" onclick="mytheme(3)"> </button>
                    <button class="color" style="background-color:#1abc9c;" onclick="mytheme(4)"> </button>
                    <button class="color" style="background-color:#159eee;" onclick="mytheme(5)"> </button>
                </div>
            </div>

        </div>
        <a class="open" href="#"><span><i class="fa fa-gear fa-spin"></i></span></a>
    </div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</body>
</html>