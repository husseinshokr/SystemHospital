<?php
    session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
        <!--link rel="stylesheet" href="compn/bootstrap.min.css">
        <link rel="stylesheet" href="compn/jquery.dataTables.min.css"-->
    </head>
    <body>
        <?php include("header.php") ?>

        <br>

        <div class="container-fluid">
            
            <div class="row">
                
                <div class="col-sm-8">
                    <form action="" id="frm-invoice">
                        <table class="table table-bordered">
                            <tr>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>Option</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Item Code" name="icode" id="icode" size="30px" required>
                                </td>

                                <td>
                                    <input type="text" class="form-control" placeholder="Item Name" name="iname" id="iname" size="30px" required>
                                </td>

                                <td>
                                    <input type="text" class="form-control" placeholder="Price" name="price" id="price" size="30px" required>
                                </td>

                                <td>
                                    <input type="number" class="form-control" placeholder="Qty" name="qty" id="qty" size="30px" required>
                                </td>

                                <td>
                                    <input type="text" class="form-control" placeholder="Amount" name="amount" id="amount" size="30px" required>
                                </td>

                                <td>
                                    <button class="btn btn-info" type="button" onclick="additem()">Add</button>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <table class="table table-bordered" id="tbl-item">
                        <thead>
                            <tr>
                                <th>Delete</th>
                                <th>Item No</th>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <tbody>
                                
                                </tbody>
                            </tr>
                        </thead>
                    </table>

                </div>

                <div class="col-sm-4">

                    <div class="form-group" align="left">
                        <label>Total</label>
                        <input type="text" class="form-control" placeholder="Total" name="total" id="total" size="30px">
                    </div>

                    <div class="form-group" align="left">
                        <label>Pay</label>
                        <input type="text" class="form-control" placeholder="Pay" name="pay" id="pay" size="30px">
                    </div>

                    <div class="form-group" align="left">
                        <label>Balance</label>
                        <input type="text" class="form-control" placeholder="Balance" name="bal" id="bal" size="30px">
                    </div>

                    <div class="form-group" align="right">
                        <button class="btn btn-success" type="button">Print</button>
                        <button class="btn btn-warning" type="button" onclick="reset()">Reset</button>
                    </div>

                </div>

            </div>

        </div>  

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="compn/jquery.validate.min.js"></script>
        <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <!--script src="compn/jquery.min.js"></script>
        <script src="compn/bootstrap.min.js"></script>
        <script src="compn/jquery.dataTables.min.js"></script-->

        <script>

            getItemCode();
            var tot = 0;
            var total = 0;
            function additem(){
                var itemcode = $('#icode').val();
                var iname = $('#iname').val();
                var price = $('#price').val();
                var qty = $('#qty').val();
                tot = price * qty;

                var table =
                    "<tr>" +
                        "<td><button type='button' name='record' class='btn btn-danger' onclick='deleterow(this)'>Delete</button></td>"  + 
                        "<td>" + itemcode + "</td>" +
                        "<td>" + iname + "</td>" +
                        "<td>" + price + "</td>" +
                        "<td>" + qty + "</td>" +
                        "<td>" + tot + "</td>" +
                    "</tr>";

                total += Number(tot);
                $("#total").val(total);
                $("#tbl-item tbody").append(table);

                $('#icode').val('');
                $('#iname').val('');
                $('#price').val('');
                $('#qty').val(1);
                $('#amount').val('');
            }

            function deleterow(e){
                totalcost = parseInt($(e).parent().parent().find('td:last').text(), 10);
                total -= totalcost;
                $("#total").val(total);
                $(e).parent().parent().remove();
            }

            function getItemCode(){
                $('#icode').empty();
                $('#icode').keyup(function(e){
                    $.ajax({
                        type : "POST",
                        url : 'php/item/get_item.php',
                        dataType : 'JSON',
                        data : { itemcode : $('#icode').val()},
                        success: function(data){
                            $('#iname').val(data[0].itemname);
                            $('#price').val(data[0].sellprice);
                            $('#qty').focus();
                        }
                    });
                });
            }

            $(function(){
                $("#price,#qty").on("keydown, keyup, click", tot);
                function tot(){
                    var sum = (Number($("#price").val()) * Number($("#qty").val()) );

                    $('#amount').val(sum);
                }
            });

            $(function(){
                $("#total,#pay").on("keydown, keyup, click", tot);
                function tot(){
                    var sum = (Number($("#pay").val()) - Number($("#total").val()) );

                    $('#bal').val(sum);
                }
            });

            function reset(){
                window.location.href = "view_pres.php";
            }
        
        </script>

    </body>
    
</html>