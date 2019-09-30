<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js no-svg">

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<link rel="shortcut icon" href="https://www.viftech.com/wp-content/uploads/2017/02/f53758b57a0db38a849168429cfb8db4.ico.png" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5GAQWBQSo1bLazhoS6xCfXaiPHKKzAVp";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->



<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>




<div class="page_loader">
    <img src="http://new.viftech.linuxdemos.me/wp-content/uploads/2019/03/Viftech-Loader.gif" alt="Viftech Page Loader" />
</div><!-- End loader-wrapper -->
<!-- End loader -->


<!-- Top menu - With the Refrence of = https://azmind.com/bootstrap-4-navbar-tutorial/  -->


<nav class="navbar navbar-dark fixed-top navbar-expand-lg">

    <div class="container-fluid">

        <a class="navbar-brand" href="<?php echo get_site_url();?>">
                        <img src="https://www.viftech.com/wp-content/uploads/2015/06/viftech-logo.png" alt="Viftech Logo" style="
                display: block;
                margin: 0px;
            ">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        

            <?php 

       

        wp_nav_menu( array(

					'theme_location' => 'ThemeHeaderMenu',

                    'menu_class' => 'navbar-nav ml-auto',

                    'menu_id'           => "",

                    'container'         => "div",

					'container_class' => 'collapse navbar-collapse',

					'container_id' => 'navbarNav',

					'walker'        => new Main_Nav_Menu_Custom_Walker(),

            ) ); 

            

            ?>

        <!--</div>-->

    </div>

</nav>




<?php if(false): ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark pink darken-4">

  <!-- Navbar brand -->
  <!-- <a class="navbar-brand text-uppercase" href="#">Navbar</a> -->
  <img src="https://www.viftech.com/wp-content/uploads/2015/06/viftech-logo.png" class="viftech-logo mr-50"/>
  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent2">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">

      <!-- Features -->
      <li class="nav-item dropdown mega-dropdown active">
        <a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">About Us
          <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu mega-menu v-2 z-depth-1 pink darken-4 py-5 px-3"
          aria-labelledby="navbarDropdownMenuLink2">
          <div class="row">
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">About Us</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/careers/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Careers
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/contact-us/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Contact Us
                  </a>
                </li>
              </ul>
            </div>
            <!-- <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Related</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Quis nostrud exercitation
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Duis aute irure dolor in
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Laboris nisi ut aliquip ex ea commodo consequat
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Reprehenderit in voluptate
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Esse cillum dolore eu fugiat nulla pariatur
                  </a>
                </li>
              </ul>
            </div> -->
         
          
          </div>
        </div>
      </li>


 <!-- Features -->
 <li class="nav-item clr-cstm">
        <a href="https://viftech.linuxdemos.me/portfolio/" class="nav-link text-uppercase" id="navbarDropdownMenuLink2">Portfolio
        </a>
       
            <!-- <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Related</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Quis nostrud exercitation
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Duis aute irure dolor in
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Laboris nisi ut aliquip ex ea commodo consequat
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Reprehenderit in voluptate
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Esse cillum dolore eu fugiat nulla pariatur
                  </a>
                </li>
              </ul>
            </div> -->
         
          
       
      </li>

       <li class="nav-item dropdown mega-dropdown active">
        <a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Services
          <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu mega-menu v-2 z-depth-1 pink darken-4 py-5 px-3"
          aria-labelledby="navbarDropdownMenuLink2">
     

            <div class="row">
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Business Intelligence</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/bullseye/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Bullseye
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/pentaho/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Pentaho
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/power-bi/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Power BI
                  </a>
                </li>
              
               
              </ul>
            </div>
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Data Warehousing</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/data-warehouse-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Data Warehouse Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/etl/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>ETL
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/data-warehouse-integration/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Data Warehouse Integration
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/performance-optimization/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Performance Optimization
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/ssis/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>SSIS
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/ssas/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>SSAS    
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/ssrs/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>SSRS
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/sql-postgres/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>SQL/Postgres
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-6 col-xl-3 sub-menu mb-md-0 mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Mobile Development</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/hybrid-ionic/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Hybrid Ionic
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/android-app-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Native Android App Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/ios-app-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Native iOS App Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/react-native/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>React Native
                  </a>
                </li>
              </ul>
            </div>



      <div class="col-md-6 col-xl-3 sub-menu mb-0">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Hardware Generic</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/abap-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Hardware Generic
                  </a>
                </li>
               
               
              </ul>
            </div>


        




          </div>
     

     

        <div class="row">

            <div class="col-md-6 col-xl-3 sub-menu mb-0">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">SAP</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/abap-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>ABAP Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/fiori/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>FIORI
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/reporting/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Reporting
                  </a>
                </li>
              </ul>
            </div>

            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">SharePoint Development</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/sharepoint-apps/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>SharePoint Apps
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/sharepoint-branding/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Sharepoint Branding
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/sharepoint-consulting/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Sharepoint Consulting
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/microsoft-flow/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Microsoft FLow
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/sharepoint-mirgration/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Sharepoint Mirgration
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/sharepoint-online/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Sharepoint Online
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/sharepoint-on-premises/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Sharepoint On Premises
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/microsoft-power-apps/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Microsoft Power Apps
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/sharepoint-workflow/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Sharepoint Workflow
                  </a>
                </li>
              
                
              
               
              </ul>
            </div>
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Web Design and CMS</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/custom-website-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Custom Website Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/drupal-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Drupal Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/joomla-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Joomla development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/magento-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Magento Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/prestashop-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Prestashop Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/responsive-website-design/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Responsive Website Design
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/shopify-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Shopify Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/wordpress-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>WordPress Development
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-6 col-xl-3 sub-menu mb-md-0 mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Web Development</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/angular-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Angular
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/asp-net-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>ASP.NET Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/frontend-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Frontend Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/java-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Java
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/php-web-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>PHP Web Development
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/python-development/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Python
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/ruby-on-rails/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Ruby on Rails
                  </a>
                </li>
              </ul>
            </div>
         
          </div>


        </div>
      </li>
      <!-- Technology -->
      <li class="nav-item dropdown mega-dropdown active">
        <a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Product
          <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu mega-menu v-2 z-depth-1 pink darken-4 py-5 px-3"
          aria-labelledby="navbarDropdownMenuLink2">
          <div class="row">
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Products</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/bulls-eye/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Bulls Eye
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/crm/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>CRM
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/document-management-system/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Document Management System
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/eflow/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Eflow
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/general-ledger/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>General Ledger
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/hr-management-system/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>HR management system
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/university-management-system/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>University Management System
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/visitor-management-system/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Visitor Management System
                  </a>
                </li>
              </ul>
            </div>
          
          </div>
        </div>
      </li>

 <!-- Features -->
 <li class="nav-item clr-cstm">
        <a class="nav-link text-uppercase" id="navbarDropdownMenuLink2">Popular Request

        </a>
      
            <!-- <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Related</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Quis nostrud exercitation
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Duis aute irure dolor in
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Laboris nisi ut aliquip ex ea commodo consequat
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Reprehenderit in voluptate
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Esse cillum dolore eu fugiat nulla pariatur
                  </a>
                </li>
              </ul>
            </div> -->
      </li>

       <!-- Features -->
 <li class="nav-item clr-cstm">
        <a href="http://viftech.linuxdemos.me/blog" class="nav-link text-uppercase" id="navbarDropdownMenuLink2">Blog
        </a>
        
            <!-- <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Related</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Quis nostrud exercitation
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Duis aute irure dolor in
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Laboris nisi ut aliquip ex ea commodo consequat
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Reprehenderit in voluptate
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="#!">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Esse cillum dolore eu fugiat nulla pariatur
                  </a>
                </li>
              </ul>
            </div> -->
      </li>

      <li class="nav-item dropdown mega-dropdown active">
        <a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Industry
          <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu mega-menu v-2 z-depth-1 pink darken-4 py-5 px-3"
          aria-labelledby="navbarDropdownMenuLink2">
          <div class="row">
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Industry</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/banking/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Banking
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/energy/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Energy
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/government/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Government  
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/manufacturing/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Manufacture
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/pharma/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Pharma
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/petroleum/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Petroleum
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </li>



   <li class="nav-item dropdown mega-dropdown active">
        <a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Training
          <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu mega-menu v-2 z-depth-1 pink darken-4 py-5 px-3"
          aria-labelledby="navbarDropdownMenuLink2">
          <div class="row">
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
              <h6 class="sub-title text-uppercase font-weight-bold white-text">Training</h6>
              <ul class="list-unstyled">
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/training-programs/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Trainer’s Profile
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/testimonials/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Training Programs
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/testimonials/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Testimonials
                  </a>
                </li>
                <li>
                  <a class="menu-item pl-0" href="https://viftech.linuxdemos.me/training-calendar/">
                    <i class="fas fa-caret-right pl-1 pr-3"></i>Training Calendar
                  </a>
                </li>
              </ul>
            </div>


          
          
        </div>
      </li>
  
  
  
  
  
      
      <!-- Multi-level dropdown -->
     <!--- <li class="nav-item dropdown multi-level-dropdown">
        <a href="#" id="menu" data-toggle="dropdown"
          class="nav-link dropdown-toggle text-uppercase">Multi-level</a>
        <ul class="dropdown-menu mt-2 rounded-0 pink darken-4 border-0 z-depth-1">
          <li class="dropdown-item dropdown-submenu p-0">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-white w-100">Click Me! </a>
            <ul class="dropdown-menu ml-2 rounded-0 pink darken-4 border-0 z-depth-1">
              <li class="dropdown-item p-0">
                <a href="#" class="text-white w-100">Hey</a>
              </li>
              <li class="dropdown-item p-0">
                <a href="#" class="text-white w-100">Hi</a>
              </li>
              <li class="dropdown-item p-0">
                <a href="#" class="text-white w-100">Hello</a>
              </li>
            </ul>
          </li>
          <li class="dropdown-item dropdown-submenu p-0">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-white w-100">Click Me Too! </a>
            <ul class="dropdown-menu mr-2 rounded-0 pink darken-4 border-0 z-depth-1 r-100 l-auto">
              <li class="dropdown-item p-0">
                <a href="#" class="text-white w-100">How</a>
              </li>
              <li class="dropdown-item p-0">
                <a href="#" class="text-white w-100">are</a>
              </li>
              <li class="dropdown-item p-0">
                <a href="#" class="text-white w-100">you?</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>-->

    </ul>
    <!-- Links -->

    <!-- Search form -->
    <form class="form-inline">
      <div class="md-form my-0">
        <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> -->
        <button type="button" class="btn btn-quote">REQUEST A QUOTE</button>  
      </div>
    </form>

  </div>
  <!-- Collapsible content -->

</nav>
<!-- Navbar -->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

<?php endif; ?>