<section class="compa_table">
    <div class="container">
        <div class="row">
            <div>
                <div class="f_table">
                    <table class="table table-responsive table-hover table-striped table-bordered">

                        <th style="width: 22%;">PROCESSOR:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:26%;'>{$phone_1['network']}</td>" : "<td style='width:26%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width:26%;'>{$phone_2['network']}</td>" : "<td style='width:26%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:26%;'>{$phone_3['network']}</td>" : "<td style='width:26%;'></td>";
                        echo '</tr>';
                        ?>

                        <th >VIDEO MEMORY:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['launch']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['launch']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['launch']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>

                        <th>COLOR:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['features']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['features']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['features']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>

                        <th> RAM: </th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['body']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['body']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['body']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>
                        <th > STORAGE: </th>
                        <?php
                        $td = ['OS', 'Chipset', 'CPU'];

                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['display']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['display']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['display']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>

                        <th > DISPLAY: </th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['platform']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['platform']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['platform']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>

                        <th>CONNECTOR TYPE:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['memory']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['memory']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['memory']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>

                        <th>WARRANTY:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['battery']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['battery']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['battery']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>

                        <th> OS: </th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['camera']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['camera']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['camera']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>

                        <th >COMPONENT:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['sound']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['sound']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['sound']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>
                        <th>OPTICAL DRIVE:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:20%;'>{$phone_1['comms']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width: 20%;'>{$phone_2['comms']}</td>" : "<td style='width:20%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:20%;'>{$phone_3['comms']}</td>" : "<td style='width:20%;'></td>";
                        echo '</tr>';
                        ?>
                    </table>
                </div>    
            </div>
        </div>
    </div>
</section>
