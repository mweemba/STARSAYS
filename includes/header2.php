 
  <style>
  * {
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 0px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
  height:50%;
   border-radius: 25px;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #800080;
  color: white;
  font-size: 17px;
  border: 0px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
  height:20%;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
  </style>
 <header id="header" class="d-flex align-items-center header-inner">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="index.html">The<span>Event</span></a></h1>-->
        <a href="index.php" class="scrollto"><img src="assets/img/logo.png" alt="" title=""></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
	
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
     
           <li class="dropdown"><a href="#"><span>Star Categories</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
		  <?php
										 $dataSQL="SELECT `category_id`, `category_name`, `session` FROM `star_categorys`";
											$stmt = $conn2->prepare($dataSQL);
											
											$stmt->execute();
											while($row = $stmt->fetch()){ ?>
           
            <li class="dropdown"><a href="star_categories.php?cat_id=<?php echo $row['category_id'];?>"><span><?php echo $row['category_name'];?></span> <i class="bi bi-chevron-right"></i></a>
             <!-- <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul> -->
            </li>
											<?php } ?>
			
           
          </ul>
        </li> 
          <li><a class="nav-link scrollto" href="How_It_Works.php">How It works</a></li>
          <li><a class="nav-link scrollto" href="about.php">About</a></li>
		  
		  
           <?php     if(starcheck($dbuser)=='N'){ 
	  
	

	  ?>
          <li><a class="nav-link scrollto" href="Star_Register.php">Register as a Star</a></li>
          
		   <?php }else{   ?>
          
		   <li><a class="nav-link scrollto" href="Star_menu.php">My Star Account</a></li>
          
       <?php }   ?>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    
	   <form class="example" action="action_page.php">
  <input type="text" placeholder="Search.." name="search">
 
</form>
		<br>				
	  <nav id="navbar2" class="navbar order-last order-lg-0">
	  <?php if(isset($_SESSION["user_id_wel"])){ ?>
	 <li class="dropdown left" style="list-style-type: none;"><a class="buy-tickets scrollto" href="#buy-tickets"><b><?php echo strtoupper(substr($firstname, 0, 1));echo strtoupper(substr($lastname, 0, 1)); ?></B></a> 	
         <ul>
		  
           
            <li class="dropdown"><a href="Profile.php"><span>Account</span> <i class="bi bi-chevron-right"></i></a>
             
            </li>
			 <li class="dropdown"><a href="#"><span>Orders</span> <i class="bi bi-chevron-right"></i></a>
             
            </li>
			 <li class="dropdown"><a href="#"><span>Following</span> <i class="bi bi-chevron-right"></i></a>
             
            </li>
			 <li class="dropdown"><a href="Logout.php"><span>Logout</span><i class="bi bi-chevron-right"></i></a>
             
            </li>
			<?php if(starcheck($dbuser)=='Y'){ ?>
			 <li class="dropdown"><a href="Star_menu.php" style="color:blue">Star Menu <i class="bi bi-star-fill"></i></a>
             
            </li>
			<?php } ?>
			
           
          </ul>
        </li>  
		<?php }

else{		?>

<li class="dropdown left" style="list-style-type: none;"><a class="buy-tickets scrollto" href="#buy-tickets"><b>Login</B></a> 

<ul>
		 
           
            <li class="dropdown"><a href="Login.php"><span>Login</span> <i class="bi bi-chevron-right"></i></a>
             
            </li>
											
			<li class="dropdown"><a href="Register.php"><span>Register</span> <i class="bi bi-chevron-right"></i></a>
             
            </li>
           
          </ul>

<?php } ?>

		
		  </nav>
    

    </div>
  </header><!-- End Header -->
