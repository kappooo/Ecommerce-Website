<section class="compa_table">
    <div class="container">
        <div class="row">
            <div>
                <div class="f_table">
                    <table class="table table-responsive table-hover table-striped table-bordered">

                        <th style="width:22%">Network:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td style='width:26%;'>{$phone_1['network']}</td>" : "<td style='width:26%;'></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td style='width:26%;'>{$phone_2['network']}</td>" : "<td style='width:26%;'></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td style='width:26%;'>{$phone_3['network']}</td>" : "<td style='width:26%;'></td>";
                        echo '</tr>';
                        ?>

                        <th>Launch:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['launch']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td >{$phone_2['launch']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td>{$phone_3['launch']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>

                        <th>Body:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['features']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['features']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['features']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>

                        <th> Display: </th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['body']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['body']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['body']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>
                        <th > Platform: </th>
                        <?php
                        $td = ['OS', 'Chipset', 'CPU'];

                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['display']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['display']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['display']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>

                        <th > Memory: </th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['platform']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['platform']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['platform']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>

                        <th> Camera:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['memory']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['memory']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['memory']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>

                        <th>Sound:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['battery']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['battery']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['battery']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>

                        <th> Comms: </th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['camera']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['camera']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['camera']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>

                        <th >Battery:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['sound']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['sound']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['sound']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>
                        <th>Features:</th>
                        <?php
                        echo isset($_GET['id']) && $_GET['id'] != NULL ? "<td >{$phone_1['comms']}</td>" : "<td ></td>";
                        echo isset($_GET['id2']) && $_GET['id2'] != NULL ? "<td>{$phone_2['comms']}</td>" : "<td ></td>";
                        echo isset($_GET['id3']) && $_GET['id3'] != NULL ? "<td >{$phone_3['comms']}</td>" : "<td ></td>";
                        echo '</tr>';
                        ?>
                    </table>
                </div>    
            </div>
        </div>
    </div>
</section>
