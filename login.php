<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

        <style type="text/css">

            body,td,th{
                color: #000000;
            }

            body{
                background-color: #f0f0f0;
            }

            .style1{
                font-family: arial, helvetica, sans-serif;
                font-size: 14px;
                padding: 12px;
                line-height: 25px;
                border-radius: 4px;
                text-decoration: none;
            }

            .style1{
                font-family: arial, helvetica, sans-serif;
                font-size: 17px;
                line-height: 25px;
                border-radius: 4px;
                text-decoration: none;
            }
        
        </style>

    </head>
    <body>
        
        <div class="container">
            <table width="100%" height="100%" border="0" cellspacing="0" align="center">
                <tr>
                    <td align="center" valign="middle">
                        <table class="table-bordred" width="350" border="0" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
                            <form action="" name="frm_login" id="frm_login">

                                <tr>
                                    <td height="45px" colspan="2" align="left" valigh="middle" bgcolor="#FF9900" class="style2">
                                        <div align="center">
                                            <strong>Login</strong>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <div id="err" style="color: red">                                    
                                    </div>
                                </tr>

                                <tr>
                                    <td width="118" align="left" valign="middle" class="style1">Username</td>
                                    <td width="118" align="left" valign="middle" class="style1">
                                        <input type="text" class="form-control" size="10px" id="username" placeholder="Username" name="username" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="118" align="left" valign="middle" class="style1">Password</td>
                                    <td width="118" align="left" valign="middle" class="style1">
                                        <input type="password" class="form-control" size="10px" id="password" placeholder="password" name="password" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="118" align="left" valign="middle" class="style1">User Type</td>
                                    <td width="118" align="left" valign="middle" class="style1">
                                        <select class="form-control" id="utype" name="utype" placeholder="UserType">
                                            <option value="">Please Select</option>
                                            <option value="1">pharmacist</option>
                                            <option value="2">Doctor</option>
                                            <option value="3">Receptionst</option>
                                        </select>
                                    </td>                           
                                </tr>
                            
                                <tr>
                                    <td colspan="2" align="right" valign="middle" class="style1">
                                        <button class="btn btn-primary" type="button" onclick="login()">Sign In</button>
                                        <button class="btn btn-warning" type="button" onclick="reset()">Reset</button>                                    
                                    </td>
                                </tr>
                            
                            </form>
                        </table>
                    </td>
                </tr>
            
            </table>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="compn/jquery.validate.min.js"></script>
        <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

        <script>

            function login(){
                if($('#username').val() == ""){
                    $('#username').parent('td').addClass('has-error');
                    return false;
                }else if($('#password').val() == ""){
                    $('#password').parent('td').addClass('has-error');
                    return false;
                }else if($('#utype').val() == ""){
                    $('#utype').parent('td').addClass('has-error');
                    return false;
                }               
                var data = $("#frm_login").serialize();
                $.ajax({
                    type : 'POST',
                    url : 'php/login/validate_login.php',
                    data : data,
                    success: function(response){
                        console.log(response);
                        if(response == 1){
                            window.location.replace('index.php');
                            
                        }else if(response == 3){
                            $("#err").hide().html("Username or Password or Role Incorrect. Please Check").fadeIn('slow');
                        }
                    }
                });
            }
        
        </script>        
    </body>
</html>