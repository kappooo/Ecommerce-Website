            <div class="col-md-2   adv_ser">
                
                <?php 
                if($_GET['page']=='results.php')
                { $path='results.php&key='.$_GET['key'].'&searno=1';}
                else if($_GET['page']=='offers.php')
                {  $path='offers.php&searno=1';}
                else {
                     
                    $path="cat.php&cat_id=".$_GET['cat_id']."&cat_page_no=1";
            
                }
                ?>
                <form method="post" action="http://localhost/app/index.php?page=<?php echo $path;?>" class="advanced">
                    <?php if($_GET['page']!='cat.php'){?>
                    <h3>Categories</h3>
                    <hr>
                    <?php
                    for ($i = 0; $i < count($y); $i++) {
                        $ofecachcompany = $res->countrows('1', 1, "and cat_id='{$y[$i][0]['cat_id']}' $extra1");

                        echo '
                   <div class="checkbox checkbox-primary">';
                        if (isset($extra) && strpos($extra, "cat_id='" . $y[$i][0]['cat_id']))
                            echo '<input type="checkbox" id="checkboxcat' . $i . '" name="cat_' . $y[$i][0]['cat_id'] . '" checked="checked"/>';
                        else
                            echo '<input type="checkbox" id="checkboxcat' . $i . '" name="cat_' . $y[$i][0]['cat_id'] . '"/>';
                        echo '<label for="checkboxcat' . $i . '">
                           ' . $y[$i][0]['cat_name'] . ' <span class="noprocat">(' . $ofecachcompany[0] . ')<span>
                        </label>
                        
                     </div>';
                    }
                    }
                    ?>


                    <h3>Companies</h3>
                    <hr>
                    <?php
                    for ($i = 0; $i < count($x); $i++) {
                        if($_GET['page']=='cat.php')
                        {$res=$disp;
                        $ofecachcompany = $res->countrows('1', 1, "and type='{$x[$i][0]['page_name']}' and cat_id='{$_GET['cat_id']}'");}
                         else { $ofecachcompany = $res->countrows('1', 1, "and type='{$x[$i][0]['page_name']}'$extra1");}

                        echo '
                   <div class="checkbox checkbox-primary">';
                        if (isset($extra) && strpos($extra, $x[$i][0]['page_name']))
                            echo '<input type="checkbox" id="checkbox' . $i . '" name="com_' . $x[$i][0]['id'] . '" checked="checked"/>';
                        else
                            echo '<input type="checkbox" id="checkbox' . $i . '" name="com_' . $x[$i][0]['id'] . '"/>';
                        echo '<label for="checkbox' . $i . '">
                           ' . $x[$i][0]['page_name'] . ' <span class="noprocat">(' . $ofecachcompany[0] . ')<span>
                        </label>
                        
                     </div>';
                    }
                    ?>

                    <div class="col-sm-12 form-group">
                        <hr>
                        <h4>Sort by</h4>
                        <select name="sort"  class="form-control select-insurance-information">
                            <option value="def" <?php if (!isset($_SESSION['order'])) echo 'selected'; ?>>Defalut</option>
                            <option value="az" <?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'name') echo 'selected'; ?>>  A to Z</option>
                            <option value="za" <?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'name desc') echo 'selected'; ?>>  Z to A</option>
                            <option value="lh" <?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'price') echo 'selected'; ?>>  Price: Low to High</option>
                            <option value="hl" <?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'price desc') echo 'selected'; ?>> Price: High to low</option>
                        </select>
                        <hr>
                    </div>

                    <div class="col-sm-12 form-group">

                        <h4>products per page</h4>
                        <select name="pag"   class="form-control select-insurance-information">
                            <option value="9" <?php if (isset($_SESSION['perpage']) && $_SESSION['perpage'] == '9') echo 'selected'; ?>>9</option>
                            <option value="15" <?php if (isset($_SESSION['perpage']) && $_SESSION['perpage'] == '15') echo 'selected'; ?>> 15</option>
                            <option value="21" <?php if (isset($_SESSION['perpage']) && $_SESSION['perpage'] == '21') echo 'selected'; ?>>  21</option>

                        </select>
                        <hr/>
                    </div>

                    <div class="col-sm-12 form-group">

                        <h4>Range of price</h4>
                        <label>min</label>
                        <br>
                        <input type="text" name="minp" class="form-control left" value="<?php if (isset($_SESSION['min'])) echo $_SESSION['min']; ?>"/>
                        <br>    
                        <label>max</label>
                        <br>
                        <input type="text" name="maxp" class="form-control right" value="<?php if (isset($_SESSION['max'])) echo $_SESSION['max']; ?>"/>

                    </div>
                    <input type="submit" name="advanced" value="Search" class="btn btn-primary"/>

                    <br/><br/>
                    <input type="submit" name="clear" value="Clear" class="btn btn-danger"/>
                </form>
            </div>