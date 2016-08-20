<?php
if (!isset($_SESSION['username'])) {
    header("location:?page=login.php");
}
include 'nav_bar.php';
?>

<script>

    $(document).ready(function () {
        $(".profil_img").hover(function () {
            $(".profile_pic").show();
        });

    });

    $(document).ready(function () {
        var activeSystemClass = $('.list-group-item.active');

        //something is entered in search form
        $('#system-search').keyup(function () {
            var that = this;
            // affect all table rows on in systems table
            var tableBody = $('.table-list-search tbody');
            var tableRowsClass = $('.table-list-search tbody tr');
            $('.search-sf').remove();
            tableRowsClass.each(function (i, val) {

                //Lower text for case insensitive
                var rowText = $(val).text().toLowerCase();
                var inputText = $(that).val().toLowerCase();
                if (inputText != '')
                {
                    $('.search-query-sf').remove();
                    tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                            + $(that).val()
                            + '"</strong></td></tr>');
                }
                else
                {
                    $('.search-query-sf').remove();
                }

                if (rowText.indexOf(inputText) == -1)
                {
                    //hide rows
                    tableRowsClass.eq(i).hide();

                }
                else
                {
                    $('.search-sf').remove();
                    tableRowsClass.eq(i).show();
                }
            });
            //all tr elements are hidden
            if (tableRowsClass.children(':visible').length == 0)
            {
                tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
            }
        });
    });


</script>

<section class="account_setting account">
     <div class="container-fluid">
       <?php include 'profile_header.php'; ?>
    </div>
    <div class="container">
        <div class="row">
           <?php   include 'account_list.php';?>
         
            <!-- ///////////  div for client informations here/////////////////////////////////  -->

            <div class="col-sm-7  col-xs-12 col-lg-offset-1">
                <h3  class="text-left">Change Account Settings</h3>   
                <div class="setting">
                    <div id="account_info">
                        <?php
                        echo"
                           <P>Name: <br>{$account_setting['fristname']}</P><hr> 
                           <P>BirthdDay: <br>{$account_setting['birthday']}</P><hr>
                           <P>mobil number: <br>{$account_setting['telephone']}</P><hr>
                           <P>City: <br>{$account_setting['city']}</P><hr>    
                           <P>Address: <br>{$account_setting['address']}</P><hr>   
                           <P>username: <br> {$account_setting['username']}</P><hr>
                           <P>Email: <br>  {$account_setting['email']}</P><hr>
                           <p>Password: <br>  ********</p>";
                        ?>        
                        <!-- form to edite data-->              
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Change Account Settings</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="#">
                                            <div class="form-group">
                                                <label for="name" class="control-label">name:</label>
                                                <input type="text" required="" class="form-control" name="fristname" value="<?php echo $account_setting['fristname']; ?>" id="message-text"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Birthdate" class="control-label">Birthdate:</label>
                                                <input type="date" required="" class="form-control" name="birthday" value="<?php echo $account_setting['birthday']; ?>" id="message-text"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile number" class="control-label">mobil number:</label>
                                                <input type="tel" required="" class="form-control" name="telephone" value="<?php echo $account_setting['telephone']; ?>" id="message-text"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="username" class="control-label">Username:</label>
                                                <input type="text" required="" class="form-control" name="username" value="<?php echo $account_setting['username']; ?>" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label">Password:</label>
                                                <input type="password" required="" class="form-control" name="password" value="<?php echo $account_setting['password']; ?>" id="message-text"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="control-label">Email:</label>
                                                <input type="email" required="" class="form-control" name="email" value="<?php echo $account_setting['email']; ?>" id="message-text">
                                            </div>
                                            <div class="form-group">
                                                <label for="city" class="control-label">city:</label>
                                                <input type="text" required="" class="form-control" name="city" value="<?php echo $account_setting['city']; ?>" id="message-text"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="control-label">address:</label>
                                                <input type="text"required="" class="form-control" name="address" value="<?php echo $account_setting['address']; ?>" id="message-text"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Done" class="btn btn-danger" >
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><br>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edite Info</button> 
                        <!-- end form to edite data-->

                    </div>             
                </div>
            </div>
        </div>  
    </div>
</section>

<?php include 'fotter.php'; ?>



