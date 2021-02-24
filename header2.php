        <!--nav bar-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">Hospital</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="nav-item active"><a href="#">Home</a></li>
                    <li class="nav-item"><a href="patient.php">Patient</a></li>
                    <li class="nav-item"><a href="channel.php">Create Channels</a></li>
                    <li class="nav-item"><a href="user.php">Create User</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="#"><span class="glyphicon glyphicon-user"><?php echo $_SESSION['uname'] ?></span></a></li>
                    <li class="nav-item"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>                    
                </ul>

            </div>
        </nav>