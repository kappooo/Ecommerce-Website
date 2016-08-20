<style>
    
.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}


</style>

<div class="container">
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-7 col-xs-12">
      <div class="circle-tile ">
        <a href="?page=user"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded"> Users</div>
          <div class="circle-tile-number text-faded "><?php echo $data['user'][0];?></div>
          <a class="circle-tile-footer" href="?page=user">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
     
    <div class="col-lg-2 col-md-3 col-sm-7 col-xs-12">
      <div class="circle-tile ">
        <a href="?page=product"><div class="circle-tile-heading red"><i class="fa fa-cart-arrow-down fa-3x" aria-hidden="true"></i>


        </div></a>
        <div class="circle-tile-content red">
          <div class="circle-tile-description text-faded"> products </div>
          <div class="circle-tile-number text-faded "><?php echo $data['products'][0];?></div>
          <a class="circle-tile-footer" href="?page=product">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
      
      
        <div class="col-lg-2 col-md-3 col-sm-7 col-xs-12">
      <div class="circle-tile ">
        <a href="?page=pages"><div class="circle-tile-heading orange"><i class="fa fa-tasks fa-3x" aria-hidden="true"></i>
        </div></a>
        <div class="circle-tile-content orange">
          <div class="circle-tile-description text-faded"> Companies </div>
          <div class="circle-tile-number text-faded "><?php echo $data['company'][0];?></div>
          <a class="circle-tile-footer" href="?page=pages">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
      
      
      
        <div class="col-lg-2 col-md-3 col-sm-7 col-xs-12">
      <div class="circle-tile ">
        <a href="?page=cat"><div class="circle-tile-heading blue"><i class="fa fa-tasks fa-3x" aria-hidden="true"></i>

        </div></a>
        <div class="circle-tile-content blue">
          <div class="circle-tile-description text-faded"> Categories </div>
          <div class="circle-tile-number text-faded "><?php echo $data['cat'][0]['count(cat_id)'];?></div>
          <a class="circle-tile-footer" href="?page=cat">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
      
      
      <div class="clearfix"></div>
     
      
      
      
      
        <div class="col-lg-2 col-md-3 col-sm-7 col-xs-12">
      <div class="circle-tile ">
        <a href="?page=admin"><div class="circle-tile-heading green"><i class="fa fa-user fa-3x" aria-hidden="true" ></i>

        </div></a>
        <div class="circle-tile-content green">
          <div class="circle-tile-description text-faded"> Admins </div>
          <div class="circle-tile-number text-faded "><?php echo $data['admin'][0];?></div>
          <a class="circle-tile-footer" href="?page=admin">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
      
  
      
      
          <div class="col-lg-2 col-md-3 col-sm-7 col-xs-12">
      <div class="circle-tile ">
        <a href="?page=pay"><div class="circle-tile-heading gray"><i class="fa fa-credit-card fa-3x" aria-hidden="true" ></i>

        </div></a>
        <div class="circle-tile-content gray">
          <div class="circle-tile-description text-faded"> Payments </div>
          <div class="circle-tile-number text-faded "><?php echo $data['pay'][0];?></div>
          <a class="circle-tile-footer" href="?page=pay">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
      
      
      
          <div class="col-lg-2 col-md-3 col-sm-7 col-xs-12">
      <div class="circle-tile ">
        <a href="?page=comments"><div class="circle-tile-heading dark-gray"><i class="fa fa-comment fa-3x" aria-hidden="true"></i>


        </div></a>
        <div class="circle-tile-content dark-gray">
          <div class="circle-tile-description text-faded"> comments </div>
          <div class="circle-tile-number text-faded "><?php echo $data['pay'][0];?></div>
          <a class="circle-tile-footer" href="?page=comments">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 

      
  </div> 
</div>  
